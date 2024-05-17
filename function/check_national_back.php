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
        $res = $object->idcard_back($file_path);

  



        // Set success message in response
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
