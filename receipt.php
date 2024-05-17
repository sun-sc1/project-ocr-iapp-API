<?php
include('components/head.php');
include('components/loader.php');
include('components/header.php');
include('components/slide.php');
include('components/service.php');
?>
<div id="about" class="about-us section">
    <div class="container">

        <div class="row ">
            <div class="col-12 col-lg-6 mb-2">
                <img src="https://storage.googleapis.com/ai-api/AI%20API%20Image/documentocr_trial1.png" alt="" class="px-5 img-fluid" >
               
            </div>
            <div class="col-12 col-lg-6 ">
                <img src="https://storage.googleapis.com/ai-api/AI%20API%20Image/document_trial2.png" alt="" class="px-5 img-fluid">
            </div>
            <div class="col-lg-12 align-self-center mt-4">
                <div class="section-heading text-center">
                    <h4>เลือกรูปภาพ <em>ใบเสร็จหรือไฟล์งาน</em> ของคุณ</h4>
                    <img src="assets/images/heading-line-dec.png" alt="">
                    <span class="text-danger mt-3 d-block"></span>
                </div>
                <div class="row">
                    <div class="col-12">

                        <form action="" id="formCheckCard" enctype="multipart/form-data">
                            <div class="d-flex justify-content-center">
                                <div class="box-file">
                                    <div class="bg-white px-2 text-choose-file py-2 click-choose-file w-100 h-100" style="opacity: 0.1;" onclick="chlickSelect()">

                                    </div>
                                    <div class="d-flex justify-content-center box-text-file">
                                        <h4 class="text-center text-dark bg-white shadow" style="margin:0 auto;padding: 11px;border-radius: 25px;" onclick="chlickSelect()">เลือกไฟล์ของคุณ</h3>
                                    </div>
                                    <input type="file" id="fileInputCard" name="slip" class="d-none file fileInputCard" accept="image/*" onchange="handleFileSelection()">
                                </div>
                            </div>
                            <p id="fileName" class="text-center text-dark mt-2"></p>
                            <span class="text-danger mt-3 d-block text-center">ตัวอย่างรูป : รองรับเฉพาะ PDF, PNG, GIF, JPG, JPEG file ขนาดไฟล์ไม่เกิน 30MB</span>
                        </form>

                        <div class="col-12 ">
                            <div class="text-center d-block mt-3" onclick="sendCheckSlip()">
                                <button type="button" class="btn btn-submit-card ">
                                    <div class="spinner-border  spinner-border-sm" id="loadingIndicator" role="status" style="display: none;">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <span class="text-white loadingTextDefault">ตรวจสอบข้อมูล</span>

                                    </i>
                                </button>
                            </div>
                            <div class="result-data-slip">
                                <h2 class="my-4">ผลลัพธ์</h2>
                                <span class="fw-light text-start text-dark fs-4 ">ข้อมูลบนเอกสาร</span>
                                <div class="card shadow border-0 mt-3 mb-4">
                                    <div class="card-body" style="height:400px; overflow:scroll;">
                                        <div id="resultTextSlip"></div>
                                    </div>
                                </div>
                                <span class="fw-light text-start text-dark fs-4">JSON Response</span>
                                <div class="card shadow border-0 mt-3 mb-4">
                                    <div class="card-body" style="height:400px; overflow:scroll;">
                                        <div id="resultTextSlipJson"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include('components/footer.php') ?>