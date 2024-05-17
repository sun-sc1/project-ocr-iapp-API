<?php 
use \PHPUnit\Framework\TestCase;
ini_set("include_path", "iapp-php-composer");
require_once 'iapp-php-composer/module_api.php';
include 'unittest.php';
$GLOBALS['apikey'] = $apikey;

class facedetectTest extends TestCase{
 
  public function testFaceDetectSingle()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->face_detect_single("media/face.jpg");
      var_dump($result);
      $this->assertEquals("successfully performed", $result->message, "Face Detect Single API is not working");
    }
    public function testFaceDetectMulti()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->face_detect_multi("media/multi_face.jpg","iApp");
      var_dump($result);
      $this->assertEquals("successfully performed", $result->message, "Face Detect Multi API is not working");
    }

    public function testFaceDetectConfig()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->face_detect_config("iApp", "iApp");
      var_dump($result);
      $this->assertEquals("the minimum score has been successfully shown.", $result->message, "Face Detect Config API is not working");
    }
}

?>