<?php 
use \PHPUnit\Framework\TestCase; 

ini_set("include_path", "iapp-php-composer");
require_once 'iapp-php-composer/module_api.php';
include 'unittest.php';
$GLOBALS['apikey'] = $apikey;

class powerocrTest extends TestCase{
 
  public function testPowerOcr()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->power_ocr("media/power.txt");
      var_dump($result);
      $this->assertEquals('success', $result->message, "Water File OCR API is not working.");
    }
    
}

?>