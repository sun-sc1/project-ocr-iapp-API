<?php 
use \PHPUnit\Framework\TestCase;

ini_set("include_path", "iapp-php-composer");
require_once 'iapp-php-composer/module_api.php';
include 'unittest.php';
$GLOBALS['apikey'] = $apikey;

class thaiqgenTest extends TestCase{
 
  public function testThaiQGen()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->thai_qgen("แค็วม์เป็นแค่หมู่บ้านใช่หรือไม่");
      var_dump($result);
      $this->assertIsObject($result);
      // $this->assertObjectHasAttribute('context', $result->context);
    }
    
}

?>