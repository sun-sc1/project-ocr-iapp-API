<?php 
use \PHPUnit\Framework\TestCase;
ini_set("include_path", "iapp-php-composer");
require_once 'iapp-php-composer/module_api.php';
include 'unittest.php';
$GLOBALS['apikey'] = $apikey;
$taskGuid='';
$GLOBALS['taskGuid'] = $taskGuid;


class facelivenessTest extends TestCase{
 
  public function testFaceLiveness()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->faceliveness_detection("media/face.jpg");
      $GLOBALS['taskGuid'] = $result;
      
      // var_dump($result);
      $this->assertIsString($result);
      return $result;
    }

  public function testFaceLivenessInfo()
    {
      $GLOBALS['taskGuid'];
      // print_r($GLOBALS['taskGuid']);
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $status = NULL;
      while($status == NULL){
        $resp = $actual->info_faceliveness($GLOBALS['taskGuid']);
        $obj = json_decode($resp);
        $tmp  = (object)$obj;
        $status = $tmp ->status;
        // var_dump($status);
      }
      // var_dump($resp);
    $this->assertEquals('C', $tmp->status, "FaceLiveness Info API is not working.");
  }   
    
}

?>