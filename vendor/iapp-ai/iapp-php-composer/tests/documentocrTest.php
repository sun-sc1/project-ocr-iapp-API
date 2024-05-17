<?php 
use PHPUnit\Framework\TestCase;
ini_set("include_path", "iapp-php-composer");
require_once 'iapp-php-composer/module_api.php';
include 'unittest.php';
$GLOBALS['apikey'] = $apikey;

class documentOcrTest extends TestCase{
 
  public function testDocumentPlaintext()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->document_ocr_plaintext("media/pdf01.pdf");

      var_dump(json_decode($result));
      $this->assertIsString($result);

    } 
    public function testDocumentJsonLayout()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->document_ocr_json_layout("media/pdf01.pdf");

      var_dump($result);
      $this->assertIsObject($result);
    
    }   
    public function testDocumentDocx()
    {
      $actual = new api;
      $actual-> apikey($GLOBALS['apikey']);
      $result = $actual->document_ocr_docx("media/pdf01.pdf");

      var_dump($result);
      $this->assertIsString($result);
    
    }  
}
?>