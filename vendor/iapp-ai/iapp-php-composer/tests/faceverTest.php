<?php 
use \PHPUnit\Framework\TestCase;
ini_set("include_path", "iapp-php-composer");
require_once 'iapp-php-composer/module_api.php';
include 'unittest.php';
$GLOBALS['apikey'] = $apikey;

class faceverTest extends TestCase{
 
  public function testFaceVer1()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->face_ver1("media/face.jpg", "media/face.jpg", "demo", "0.7");
      var_dump($result);
      $this->assertEquals("successfully performed", $result->message, "Face v1 API is not working.");
    }

  public function testFaceVer1Config()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->face_ver1_config("0.5", "0.5", "iApp", "iApp");
      var_dump($result);
      $this->assertEquals("the minimum score of comparison and detection has been successfully configured.", $result->message, "Face v1 Config API is not working.");
    }

    public function testFaceVer2()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->face_ver2("media/face.jpg", "media/face.jpg");
      var_dump($result);
      $this->assertEquals("successfully performed", $result->message, "Face v2 API is not working.");
    }
}

?>