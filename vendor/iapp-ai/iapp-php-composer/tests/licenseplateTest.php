<?php 
use \PHPUnit\Framework\TestCase;
ini_set("include_path", "iapp-php-composer");
require_once 'iapp-php-composer/module_api.php';
include 'unittest.php';
$GLOBALS['apikey'] = $apikey;

class licenseplateTest extends TestCase{
 
  public function testLicensePlate()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->license_plate("media/plate.jpg");

      var_dump($result);
      $this->assertEquals('success', $result->message, "License Plate OCR API is not working");
    }
    
}

?>