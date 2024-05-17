<?php 
use \PHPUnit\Framework\TestCase;

ini_set("include_path", "iapp-php-composer");
require_once 'iapp-php-composer/module_api.php';
include 'unittest.php';
$GLOBALS['apikey'] = $apikey;

class thaiasrTest extends TestCase{
 
  public function testASR()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->asr("media/2ppl.wav");
  
      var_dump($result);
      $this->assertIsArray($result);
      // $this->assertObjectHasAttribute('speech', $tmp->speech);
    }
    
}

?>