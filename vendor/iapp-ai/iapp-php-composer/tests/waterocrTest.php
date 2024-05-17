<?php 
use \PHPUnit\Framework\TestCase; 

ini_set("include_path", "iapp-php-composer");
require_once 'iapp-php-composer/module_api.php';
include 'unittest.php';
$GLOBALS['apikey'] = $apikey;

class waterocrTest extends TestCase{
 
  public function testwaterOcrFile()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->water_file_ocr("media/water-meter.jpg");
      // var_dump($result);
      $this->assertEquals('success', $result->message, "Water File OCR API is not working.");
    }

    public function testwaterOcrBase64()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->water_base64_ocr("media/water-meter.txt");

      $this->assertEquals('success', $result->message, "Water base64 OCR API is not working.");
    }
    
}

?>