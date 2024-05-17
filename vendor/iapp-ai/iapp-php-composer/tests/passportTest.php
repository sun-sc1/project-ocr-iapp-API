<?php 
use PHPUnit\Framework\TestCase;
ini_set("include_path", "iapp-php-composer");
require_once 'iapp-php-composer/module_api.php';
include 'unittest.php';
$GLOBALS['apikey'] = $apikey;

class passportTest extends TestCase{
 
  public function testPassportOcr()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->passport_ocr("media/ukr-passport.jpeg");

      var_dump($result);
      $this->assertIsString($result);
    }   
}
?>