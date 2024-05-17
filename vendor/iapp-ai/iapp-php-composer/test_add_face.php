<?php
set_include_path(get_include_path() . PATH_SEPARATOR . "vendor/pear/http_request2/");
set_include_path(get_include_path() . PATH_SEPARATOR . "vendor/pear/net_url2/");
require 'vendor/autoload.php';
echo(get_include_path());

require_once 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('https://api.iapp.co.th/face_recog_add');
$request->setMethod(HTTP_Request2::METHOD_POST);
$request->setConfig(array(
  'follow_redirects' => TRUE
));
$request->setHeader(array(
  'apikey' => '******** API KEY *********'
));
$request->addPostParameter(array(
  'company' => 'Test-PHP-iApp',
  'name' => 'Panuphong',
  'password' => '1234'
));
$request->addUpload('file', '/Users/kobkrit/git/php_iapp_ai/media/face.jpg', 'face.jpg', '<Content-Type Header>');
try {
  $response = $request->send();
  if ($response->getStatus() == 200) {
    echo $response->getBody();
  }
  else {
    echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
    $response->getReasonPhrase();
  }
}
catch(HTTP_Request2_Exception $e) {
  echo 'Error: ' . $e->getMessage();
}