<?php
ini_set("include_path", "iapp-php-composer");
require_once 'iapp-php-composer/module_api.php';
include('../config/conntect.php');


################### API KEY ####################

$object = new api;

$object->apikey($API_KEY);

################### ID CARD OCR API ####################
// OCR on ID Card Front Side, Back Side, and Photocopied of ID Card

// Check if a file is uploaded
$response = []; // Initialize an associative array for the response

if (isset($_FILES['id_card_front']) && $_FILES['id_card_front']['error'] == 0) {
    // Define the file path
    $file_path = "media/" . basename($_FILES['id_card_front']['name']);

    // Move the uploaded file to the specified path
    if (move_uploaded_file($_FILES['id_card_front']['tmp_name'], $file_path)) {
        // Call API with the file path
        $res = $object->idcard_front($file_path);
        // Set success message in response
        if ($res && isset($res->address)) {

            $query = $conn->query("INSERT INTO `users`(`address`, `district`, `en_dob`, `en_expire`, `en_fname`, `en_init`, `en_issue`, `en_lname`, `en_name`, `gender`, `home_address`, `id_number`, `postal_code`, `province`, `religion`, `sub_district`, `th_dob`, `th_expire`, `th_fname`, `th_init`, `th_issue`, `th_lname`, `th_name`)
            VALUES ('$res->address','$res->district','$res->en_dob','$res->en_expire','$res->en_fname','$res->en_init','$res->en_issue','$res->en_lname','$res->en_name','$res->gender','$res->home_address','$res->id_number','$res->postal_code','$res->province','$res->religion','$res->sub_district','$res->th_dob','$res->th_expire','$res->th_fname','$res->th_init','$res->th_issue','$res->th_lname','$res->th_name')");
        }

        $response['status'] = 'success';
        $response['data'] = $res;
    } else {
        // Set error message in response
        $response['status'] = 'error';
        $response['message'] = 'Failed to move the uploaded file.';
    }
} else {
    // Set error message in response
    $response['status'] = 'error';
    $response['message'] = 'No file uploaded or an error occurred.';
}

// Output the JSON response
header('Content-Type: application/json');
echo json_encode($response);
