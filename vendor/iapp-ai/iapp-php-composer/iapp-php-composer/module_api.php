<?php 
// namespace App;

ini_set("include_path", "vendor/pear/http_request2/");
require_once 'HTTP/Request2.php';
require 'vendor/autoload.php';      

/**
*  A sample class
*
*  Use this section to define what this class is doing, the PHPDocumentator will use this
*  to automatically generate an API documentation using this information.
*
*  @author yourname
*/


class api{

  ################### API KEY ####################
  public function apikey($apikey){
    $GLOBALS['apikey'] = $apikey;
  }

  ################### Image Recognition ####################
  public function idcard_front($filepath){
      $filename = basename($filepath);
      $request = new HTTP_Request2();
      $request->setUrl('https://api.iapp.co.th/thai-national-id-card/v3/front');
      $request->setMethod(HTTP_Request2::METHOD_POST);
      $request->setConfig(array(
       'follow_redirects' => TRUE));
      $request->setHeader(array(
       'apikey' => $GLOBALS['apikey']
      ));
      $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
      try {
       $response = $request->send();
       if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
       }
       else {
        
         echo 'IdCardFrontAPI Error with HTTP status: ' . $response->getStatus() . ' ' .
         $response->getReasonPhrase();
       }
      }
      catch(HTTP_Request2_Exception $e) {
       echo 'Error: ' . $e->getMessage();
      }
   }

   public function idcard_back($filepath){
    $filename = basename($filepath);
    $request = new HTTP_Request2();
   $request->setUrl('https://api.iapp.co.th/thai-national-id-card/v3/back');
   $request->setMethod(HTTP_Request2::METHOD_POST);
   $request->setConfig(array(
    'follow_redirects' => TRUE
   ));
   $request->setHeader(array(
    'apikey' => $GLOBALS['apikey']
   ));
   $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
   try {
    $response = $request->send();
    if ($response->getStatus() == 200) {
      return json_decode($response->getBody());
    }
    else {
      echo 'IdCardBackAPI Error with HTTP status: ' . $response->getStatus() . ' ' .
      $response->getReasonPhrase();
    }
   }
   catch(HTTP_Request2_Exception $e) {
    echo 'Error: ' . $e->getMessage();
   }
  }
  public function license_plate($filepath){
    $filename = basename($filepath);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/license-plate-recognition/file');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
     'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
     'apikey' => $GLOBALS['apikey']
    ));
    $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
    try {
     $response = $request->send();
     if ($response->getStatus() == 200) {
      return json_decode($response->getBody());
     }
     else {
       echo 'LicensePlateAPI Error with HTTP status: ' . $response->getStatus() . ' ' .
       $response->getReasonPhrase();
     }
    }
    catch(HTTP_Request2_Exception $e) {
     echo 'Error: ' . $e->getMessage();
    }
  }
  public function bookbank_ocr($filepath){
    $filename = basename($filepath);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/book-bank-ocr/file');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
   }
  
  
   public function passport_ocr($filepath){
    $filename = basename($filepath);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/passport-ocr/ocr');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return $response->getBody();
      }
      else {
        echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function document_ocr_plaintext($filepath){
    $filename = basename($filepath);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/document-ocr/ocr');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return $response->getBody();
      }
      else {
        echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function document_ocr_json_layout($filepath){
    $filename = basename($filepath);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/document-ocr/layout');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function document_ocr_docx($filepath){
    $filename = basename($filepath);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/document-ocr/docx');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return $response->getBody();
      }
      else {
        echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function water_file_ocr($filepath){
    $filename = basename($filepath);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/meter-number-ocr/file');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'WaterFileAPI Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function water_base64_ocr($filepath){
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/meter-number-ocr/base64');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' =>  $GLOBALS['apikey'],
      'Content-Type' => 'application/json'
    ));
    $file = fopen($filepath, "r");
    $base64 = fread($file, filesize($filepath));
    $text = '{"image": "' .$base64.'"}';
    // print_r($text);
    $request->setBody($text);

    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'WaterBase64API Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function power_ocr($filepath){
    $request = new HTTP_Request2();
    $request->setUrl('https://titipakorn.xyz/ocr/api/predict/ocr_detect/');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' =>  $GLOBALS['apikey'],
      'Content-Type' => 'application/json'
    ));
    $file = fopen($filepath, "r");
    $base64 = fread($file, filesize($filepath));
    $text = '{"image": "' .$base64.'"}';
    // print_r($text);
    $request->setBody($text);
    
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'PowerOcrAPI Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function img_bg_removal($filepath){
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/face-extractor/predict');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey'],
      'Content-Type' => 'application/json'
    ));

    $file = fopen($filepath, "r");
    $base64 = fread($file, filesize($filepath));
    $text = '{"content": "' .$base64.'"}';
    // print_r($text);
    $request->setBody($text);

    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'ImgBgRemoval Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }   
  }
  public function faceliveness_detection($filepath){
    $filename = basename($filepath);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/passive-face-liveness-detection');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
     'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
     'apikey' => $GLOBALS['apikey']
    ));
    $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
    try {
     $response = $request->send();
     if ($response->getStatus() == 200) {
       return $response->getBody();
     }
     else {
       echo 'FaceLivenessAPI Error with HTTP status: ' . $response->getStatus() . ' ' .
       $response->getReasonPhrase();
     }
    }
    catch(HTTP_Request2_Exception $e) {
     echo 'Error: ' . $e->getMessage();
    }
  }
  public function info_faceliveness($taskGuid){
    $request = new HTTP_Request2();
    $url = 'https://api.iapp.co.th/passive-face-liveness-detection/'.trim($taskGuid,'"');
    // print_r($url);
    $request->setUrl($url);
    $request->setMethod(HTTP_Request2::METHOD_GET);
    $request->setConfig(array(
     'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
     'apikey' => $GLOBALS['apikey']
    ));
    try {
     $response = $request->send();
     if ($response->getStatus() == 200) {
       return $response->getBody();
     }
     else {

       echo 'FaceLivenessInfo Error with HTTP status: ' . $response->getStatus() . ' ' .
       $response->getReasonPhrase();
     }
    }
    catch(HTTP_Request2_Exception $e) {
     echo 'Error: ' . $e->getMessage();
    }
  }
  public function face_ver1($filepath1, $filepath2, $company_name, $min_score){
    $filename1 = basename($filepath1);
    $filename2 = basename($filepath2);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/face_compare');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    $request->addPostParameter(array(
      'company' => $company_name,
      'min_score' => $min_score
    ));

    // Use score of each company
    $request->addUpload('file1', $filepath1, $filename1, '<Content-Type Header>');
    $request->addUpload('file2', $filepath2, $filename2, '<Content-Type Header>');


    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'FaceV1 Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
        echo "\n";
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function face_ver1_config($detect_val, $compare_val, $company_name, $password){
    $request = new HTTP_Request2();

    $request->setUrl('https://api.iapp.co.th/face_config_score');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    $request->addPostParameter(array(
      'company' => $company_name,
      'detection' => $detect_val,
      'comparison' => $compare_val,
      'password' => $password
    ));
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'FaceDetect Config Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
        echo "\n";
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function face_ver2($filepath1, $filepath2){
    $filename1 = basename($filepath1);
    $filename2 = basename($filepath2);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/face-verification/v2/face_compare');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    $request->addUpload('file1', $filepath1, $filename1, '<Content-Type Header>');
    $request->addUpload('file2', $filepath2, $filename2, '<Content-Type Header>');
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'FaceV2 Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
        echo "\n";
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function face_detect_single($filepath){
    $filename = basename($filepath);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/face_detect_single');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));

    $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'FaceDetect Single Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
        echo "\n";
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function face_detect_multi($filepath, $company_name){
    $filename = basename($filepath);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/face_detect_multi');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' =>  $GLOBALS['apikey']
    ));

    // Use score of each company
    $request->addPostParameter(array(
      'company' => $company_name 
    ));

    // Use default score
    //$request->addPostParameter(array(
    //  'company' => '{Your Company Name}'
    //));

    $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'FaceDetect Multi Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
        echo "\n";
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function face_detect_config($company_name, $password ){
    $request = new HTTP_Request2();

    $request->setUrl('https://api.iapp.co.th/face_config_score');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    $request->addPostParameter(array(
      'company' => $company_name,
      'password' => $password
    ));
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'FaceDetect Config Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
        echo "\n";
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function face_recog_single($filepath, $company_name){
    $filename = basename($filepath);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/face_recog_single');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    $request->addPostParameter(array(
      'company' => $company_name
    ));
    $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'FaceRecog Single Error with  HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
        echo "\n";
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function face_recog_multi($filepath, $company_name){
    $filename = basename($filepath);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/face_recog_multi');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    $request->addPostParameter(array(
      'company' => $company_name
    ));
    $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'FaceRecog Multi Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
        echo "\n";
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function face_recog_facecrop($filepath, $company_name){
    $filename = basename($filepath);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/face_recog_facecrop');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    $request->addPostParameter(array(
      'company' => $company_name
    ));
    $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'FaceRecog Facecrop Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
        echo "\n";
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function face_recog_add($filepath, $company_name, $name, $password){
    $filename = basename($filepath);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/face_recog_add');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    $request->addPostParameter(array(
      'company' => $company_name,
      'name' => $name,
      'password' => $password
    ));
    $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
    // echo("Request");
    // var_dump($request);

    try {
      $response = $request->send();
      // echo("Response");
      // var_dump($response);
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'FaceRecog Add Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
        echo "\n";
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function face_recog_import($filepath, $company_name, $password){
    $filename = basename($filepath);
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/face_recog_import');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    $request->addPostParameter(array(
      'company' => $company_name,
      'password' => $password
    ));
    $request->addUpload('file', $filepath, $filename, '<Content-Type Header>');
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'FaceRecog Import Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
        echo "\n";
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function face_recog_check($company_name, $password){
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/face_recog_check');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' =>  $GLOBALS['apikey']
    ));
    $request->addPostParameter(array(
      'company' => $company_name,
      'password' => $password
    ));
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'FaceRecog Check Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
        echo "\n";
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }

  }
  public function face_recog_export($company_name, $filetype, $password){
    $request = new HTTP_Request2();
    
    $request->setUrl('https://api.iapp.co.th/face_recog_export');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' =>  $GLOBALS['apikey']
    ));
    $request->addPostParameter(array(
      'company' => $company_name,
      'type_file' => $filetype,
      'password' => $password,
    ));
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return $response->getBody();
      }
      else {
        echo 'FaceRecog Export Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
        echo "\n";
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function face_recog_remove($company_name, $name, $password, $date_faceid){

    $request = new HTTP_Request2();
    
    $request->setUrl('https://api.iapp.co.th/face_recog_remove');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' =>  $GLOBALS['apikey']
    ));
    $request->addPostParameter(array(
      'company' => $company_name,
      'name' => $name,
      'password' => $password,
      'face_id' => $date_faceid
    ));
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'FaceRecog Export Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
        echo "\n";
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function face_recog_config($company_name,$password){
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/face_config_score');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' =>  $GLOBALS['apikey']
    ));
    $request->addPostParameter(array(
      'company' => $company_name,
      'password' => $password
    ));
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'FaceRecog Config Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
        echo "\n";
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }

################### Voice and Speech ####################
  public function asr($filepath){
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/asr');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' =>  $GLOBALS['apikey']
    ));
    $request->addUpload('file', $filepath, $filepath, '<Content-Type Header>');
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'ASR Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function kaitom_tts($text){
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/thai-tts-kaitom/tts?text='.$text);
    $request->setMethod(HTTP_Request2::METHOD_GET);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return $response->getBody();
      }
      else {
        echo 'Kaitom Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }   
  public function cee_tts($text){
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/thai-tts-cee/tts?text='.$text);
    $request->setMethod(HTTP_Request2::METHOD_GET);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return $response->getBody();
      }
      else {
        echo 'Cee Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }

################### Thai Natural Language Processing ####################
  public function thai_qa($quest, $docs){
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/thai-qa/inference');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
  
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey'],
      'Content-Type' => 'application/json'
    ));

    $text = '{ "question": "' .$quest. '" , "document": "'.$docs.'"}';
    // print_r($text);
    $request->setBody($text);
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        // print_r($response->getBody());
        return $response->getBody();
      }
      else {
        echo 'ThaiQA Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function thai_qgen($text){
    $request = new HTTP_Request2();
    $request->setUrl('http://api.iapp.co.th/qa-generator-th?text='.$text.'&apikey='.$GLOBALS['apikey']);
    $request->setMethod(HTTP_Request2::METHOD_GET);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'ThaiQGen Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function thai_text_sum($text, $output_length){
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/text-summarization?text='.$text.'&output_length='.$output_length);
    $request->setMethod(HTTP_Request2::METHOD_GET);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' => $GLOBALS['apikey']
    ));
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return json_decode($response->getBody());
      }
      else {
        echo 'ThaiTextSum Error with HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
        echo "\n";
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  public function eng_thai_translation($text){
    $request = new HTTP_Request2();
    $request->setUrl('https://api.iapp.co.th/translate/auto?text='.$text);
    $request->setMethod(HTTP_Request2::METHOD_GET);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'apikey' =>  $GLOBALS['apikey']
    ));
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return $response->getBody();
      }
      else {
        echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }



#TODO: NOT YET READY
  // public function signature_detection($filepath){
  //   $filename = basename($filepath);
  //   $request = new HTTP_Request2();
  //   $request->setUrl('https://api.iapp.co.th/book-bank-ocr/file');
  //   $request->setMethod(HTTP_Request2::METHOD_POST);
  //   $request->setConfig(array(
  //     'follow_redirects' => TRUE
  //   ));
  //   $request->setHeader(array(
  //     'apikey' => $GLOBALS['apikey']
  //   ));
  //   $request->addUpload('file', $filename, $filepath, '<Content-Type Header>');
  //   try {
  //     $response = $request->send();
  //     if ($response->getStatus() == 200) {
  //       return $response->getBody();
  //     }
  //     else {
  //       echo 'SignatureAPI Error with HTTP status: ' . $response->getStatus() . ' ' .
  //       $response->getReasonPhrase();
  //     }
  //   }
  //   catch(HTTP_Request2_Exception $e) {
  //     echo 'Error: ' . $e->getMessage(); 
  //   }
  // }




}
?>
