<?php
include('components/head.php');
include('components/loader.php');
include('components/header.php');

include('components/slide.php');
include('components/service.php');

// include('components/modal.php');
?>

<div id="about" class="about-us section">
  <div class="container">

    <!-- front-card -->
    <div class="row ">
      <div class="col-lg-12 align-self-center">
        <div class="section-heading text-center">
          <h4>เลือกไฟล์ <em>บัตรประชาชน</em> ของคุณ</h4>
          <img src="assets/images/heading-line-dec.png" alt="">
        </div>

        <div class="row ">
          <div class="col-12">
            <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action active text-center" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">หน้าบัตร</a>
              <a class="list-group-item list-group-item-action text-center" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">หลังบัตร</a>
            </div>
          </div>
          <div class="col-12">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                <div class="row mt-4">
                  <div class="col-12">

                    <form action="" id="formCheckCard" enctype="multipart/form-data">
                      <div class="d-flex justify-content-center">
                        <div class="box-file-card">
                          <div class="bg-white px-2 text-choose-file py-2 click-choose-file w-100 h-100" style="opacity: 0.1;">

                          </div>
                          <div class="d-flex justify-content-center box-text-file">
                            <h4 class="text-center text-dark bg-white shadow" style="margin:0 auto;padding: 11px;border-radius: 25px;" onclick="chlickSelect()">เลือกไฟล์ของคุณ</h3>
                          </div>
                          <input type="file" id="fileInputCard" name="id_card_front" class="d-none file fileInputCard" accept="image/*" onchange="handleFileSelection()">
                        </div>
                      </div>

                      <p id="fileName" class="text-center text-dark mt-2"></p>
                      <p class="text-danger text-center mt-2">**รองรับเฉพาะ JPG, JPEG, PNG file ขนาด 800px x 800px - 4000px x 4000px, ขนาดไฟล์ไม่เกิน 2MB</p>
                    </form>


                    <div class="col-12">
                      <div class="text-center d-block mt-3">
                        <button type="button" class="btn btn-submit-card " onclick="sendCheckCard()">
                          <div class="spinner-border  spinner-border-sm" id="loadingIndicator" role="status" style="display: none;">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                          <span class="text-white loadingTextDefault">ตรวจสอบข้อมูล</span>

                          </i>
                        </button>
                      </div>

                      <div class="result-data">
                        <h2 class="text-center my-4">ผลลัพธ์</h2>

                        <div class="col-12">
                          <div class="d-flex justify-content-center">
                            <img id="previewImage" src="" alt="" class="rounded-3" style="width:400px;height: 254px; object-fit:cover;">
                          </div>
                        </div>

                        <h2 class="fw-light text-start text-dark fs-4 mt-3">ข้อมูลบัตรประชาชน</h2>

                        <div class="card shadow border-0 mt-3 mb-4">
                          <div class="card-body" style="height:400px; overflow:scroll;">
                            <?php include('components/resultResponse.php'); ?>
                          </div>
                        </div>

                        <span class="fw-light text-start text-dark fs-4">JSON Response</span>
                        <div class="card shadow border-0 mt-3 mb-4">
                          <div class="card-body" style="height:400px; overflow:scroll;">
                            <div id="resultCardJson"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- back card -->
              <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                <div class="row mt-4">
                  <div class="col-12">

                    <form action="" id="formCheckCardBack" enctype="multipart/form-data">
                      <div class="d-flex justify-content-center">
                        <div class="box-file-card-back">
                          <div class="bg-white px-2 text-choose-file py-2 click-choose-file w-100 h-100" style="opacity: 0.1;" onclick="chlickSelectBack()">

                          </div>
                          <div class="d-flex justify-content-center box-text-file">
                            <h4 class="text-center text-dark bg-white shadow" style="margin:0 auto;padding: 11px;border-radius: 25px;">เลือกไฟล์ของคุณ</h3>
                          </div>
                          <input type="file" id="fileInputCardBack" name="id_card_front" class="d-none file fileInputCardBack" accept="image/*" onchange="handleFileSelectionBack()">
                        </div>
                      </div>

                      <p id="fileNameBack" class="text-center text-dark mt-2"></p>
                      <p class="text-danger text-center mt-2">**รองรับเฉพาะ JPG, JPEG, PNG file ขนาด 800px x 800px - 4000px x 4000px, ขนาดไฟล์ไม่เกิน 2MB</p>
                    </form>


                    <div class="col-12">
                      <div class="text-center d-block mt-3" onclick="sendCheckCardBack()">
                        <button type="button" class="btn btn-submit-card ">
                          <div class="spinner-border  spinner-border-sm" id="loadingIndicator" role="status" style="display: none;">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                          <span class="text-white loadingTextDefault">ตรวจสอบข้อมูล</span>

                          </i>
                        </button>
                      </div>

                      <div class="result-data">
                        <h2 class="text-center my-4">ผลลัพธ์</h2>

                        <div class="col-12">
                          <div class="d-flex justify-content-center">
                            <img id="previewImageBack" src="" alt="" class="rounded-3" style="width:400px;height: 254px;object-fit:cover;">
                          </div>
                        </div>

                        <h2 class="fw-light text-start text-dark fs-4">ข้อมูลหลังบัตรประชาชน</h2>

                        <div class="card shadow border-0 mt-3 mb-4">
                          <div class="card-body" style="height:400px; overflow:scroll;">
                            <?php include('components/resultResponseBack.php'); ?>

                          </div>
                        </div>

                        <span class="fw-light text-start text-dark fs-4">JSON Response</span>
                        <div class="card shadow border-0 mt-3 mb-4">
                          <div class="card-body" style="height:400px; overflow:scroll;">
                            <div id="resultCardJsonBack"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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