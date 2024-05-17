<?php 
use \PHPUnit\Framework\TestCase;

ini_set("include_path", "iapp-php-composer");
require_once 'iapp-php-composer/module_api.php';
include 'unittest.php';
$GLOBALS['apikey'] = $apikey;

class facerecogTest extends TestCase{
 
  public function testFaceRecogSingle()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->face_recog_single("media/face.jpg", "Test-PHP-iApp");
      var_dump($result);
      $this->assertEquals("successfully performed", $result->message , "Face Recog Single API is not working.");
    }
    public function testFaceRecogMulti()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->face_recog_multi("media/face.jpg", "Test-PHP-iApp");
      var_dump($result);
      $this->assertEquals("successfully performed", $result->message , "Face Recog Multi API is not working.");
    }

    public function testFaceRecogFacecrop()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->face_recog_facecrop("media/face.jpg", "Test-PHP-iApp");
      var_dump($result);
      $this->assertEquals("successfully performed", $result->message , "Face Recog Facecrop API is not working.");
    }

    public function testFaceRecogAdd()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->face_recog_add("media/face.jpg", "Test-PHP-iApp", "Kevin", "1234");
      var_dump($result);
      $this->assertEquals("face duplicate not saved.", $result->message ,"Face Recog Add API is not working.");
    }

    public function testFaceRecogImport()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->face_recog_import("media/import.csv", "Test-PHP-iApp", "1234");
      var_dump($result);
      $this->assertEquals("successfully performed", $result->message, "Face Recog Import API is not working.");
    }
    public function testFaceRecogCheck()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->face_recog_check("Test-PHP-iApp", "1234");
      var_dump($result);
      $this->assertEquals("successfully performed", $result->message, "Face Recog Check API is not working.");
    }
    public function testFaceRecogExport()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->face_recog_export("iApp", "csv", "iApp");
      var_dump($result);
      $this->assertEquals($result, $result, "Face Recog Export API is not working.");
    }
    public function testFaceRecogRemove()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->face_recog_remove("Test-PHP-iApp", "Panupong","1234","220727-1" );
      var_dump($result);
      $this->assertEquals("face removed successfully", $result->message,  "Face Recog Remove API is not working.");
    }

    public function testFaceRecogConfig()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->face_recog_config("iApp", "iApp");
      var_dump($result);
      $this->assertEquals("the minimum score has been successfully shown.", $result->message,  "Face Recog Config API is not working.");
    }
}

?>