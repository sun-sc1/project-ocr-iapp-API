<?php 
use \PHPUnit\Framework\TestCase;
ini_set("include_path", "iapp-php-composer");
require_once 'iapp-php-composer/module_api.php';
include 'unittest.php';
$GLOBALS['apikey'] = $apikey;
class idcardTest extends TestCase{
    //  var $apikey;
    // public function apikey($apikey){
    //    $apikey = $GLOBALS['apikey'];
    // }
 
  public function testIdcardFront()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual-> idcard_front("media/id-card-front.jpg");
      var_dump($result);
      
      $this->assertEquals("23/20 หมู่ที่ 6 ต.กะทู้ อ.กะทู้ จ.ภูเก็ต", $result->address , "IdCard Front API is not working");
    }

    public function testIdcardBack()
    {
      $actual = new api;
      $actual->apikey($GLOBALS['apikey']);
      $result = $actual->idcard_back("media/id-card-back.jpg");
      var_dump($result);
      $this->assertEquals("JT0-1740123-05", $result->back_number , "IdCard Back API is not working");
    }
    
}












?>