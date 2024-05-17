<?php
// namespace App;

ini_set("include_path", "iapp-php-composer");
require_once 'iapp-php-composer/module_api.php';

################### API KEY ####################

$object = new api;
$object->apikey("******** API KEY *********");
// $object->apikey("******** API KEY *********");

################### Image Recognition ####################

// $object->idcard_front("media/id-card-front.jpg");
// $object->idcard_back("media/id-card-back.jpg");
// $object->license_plate("media/plate.jpg");
// $object->bookbank_ocr("/Users/iapp/php_iapp_ai/media/bookbank.jpg");
// echo $object->passport_ocr("/Users/iapp/php_iapp_ai/media/ukr-passport.jpeg");
// $res = $object->document_ocr_plaintext("/Users/iapp/php_iapp_ai/media/pdf01.pdf");
// var_dump(json_decode($res));
// $res = $object->document_ocr_json_layout("/Users/iapp/php_iapp_ai/media/pdf01.pdf");
// var_dump($res);
// echo $object->document_ocr_docx("/Users/iapp/php_iapp_ai/media/pdf01.pdf");
// $object->signature_detection("media/signature.jpg");
// $object->water_file_ocr("media/water-meter.jpg");
// $object->water_base64_ocr("media/water-meter.txt");
// $object->img_bg_removal("media/face.jpg");
// echo $object->img_bg_removal("media/base64.txt");

// $taskGuid =$object->faceliveness_detection("media/face.jpg");
// var_dump($taskGuid);

// print_r($object->info_faceliveness("bc212656-9b1e-4a2a-9890-61f07c874d8f"));

// $object->face_ver1("media/face.jpg", "media/face.jpg", "", "");
// $object->face_ver1_config("0.5", "0.5", "iApp", "1234");

// $object->face_ver2("media/face.jpg", "media/face.jpg");

// $object->face_detect_single("media/face.jpg");
// $object->face_detect_multi("media/multi_face.jpg","iApp");
// $object->face_detect_config("0.5","iApp", "iapp");

// $object->face_recog_single("media/face.jpg", "iApp");
// $object->face_recog_multi("media/face.jpg", "iApp");
// $object->face_recog_facecrop("media/face.jpg", "iApp");
// $object->face_recog_add("media/face.jpg", "iApp", "Panupong", "1234");
// $object->face_recog_import("media/import.csv", "iApp", "1234");
// $object->face_recog_check("iApp", "1234");
// $object->face_recog_export("iApp", "1234");
// $object->face_recog_remove("iApp", "Panupong","1234","211026", "211026-3" );
// $object->face_recog_config("0.5","0.5","iApp", "iapp");

################### Thai Natural Language Processing ####################

// $object->thai_qa("แค็วม์เป็นแค่หมู่บ้านใช่หรือไม่", "จังหวัดแค็วม์โปแลนด์ wojewdztwochemskie คือหน่วยการปกครองท้องถิ่นของประเทศโปแลนด์ในช่วงปี ค.ศ.1975 - ค.ศ.1998 จังหวัดได้รับการรวมเข้ากับจังหวัดลูบลินมีเมืองหลักคือแค็วม์ใน ปี ค.ศ.1998 มีพื้นที่ประมาณ 3865 ตารางกิโลเมตรและมีประชากร 248800 คน");
$res = $object->thai_qgen("ผมพูดภาษาไทย");
var_dump($res);
// $object->thai_text_sum("พล.อ.ประยุทธ์ จันทร์โอชา นายกรัฐมนตรีและรัฐมนตรีว่าการกระทรวงกลาโหม กล่าวถึงกระแสข่าววิพากษ์วิจารณ์นายกรัฐมนตรี อ่านกระดาษเปล่าบนเครื่องบินระหว่างเดินทางมาประเทศญี่ปุ่น ว่า แค่นายกรัฐมนตรีอ่านหนังสือยังนำรูปไปวิพากษ์วิจารณ์ได้ กล่าวหาว่าแทนที่จะอ่านหนังสือเตรียมประชุม ทั้งที่ความจริงหนังสือที่หยิบมาอ่านนั้น เป็นหนังสือของสายการบินที่วางไว้ จึงหยิบขึ้นมาดูเท่านั้น", '84');
// $object->thai_qa();
// $res = $object->eng_thai_translation("ผมพูดภาษาไทย");
// var_dump(json_decode($res));

################### Voice and Speech ####################

// $object->asr("media/data.wav");
// $object->kaitom_tts("แค็วม์เป็นแค่หมู่บ้านใช่หรือไม่");
// $object->cee_tts("แค็วม์เป็นแค่หมู่บ้านใช่หรือไม่");

################### Optimization and Prediction ####################
// Available Soon








?> 