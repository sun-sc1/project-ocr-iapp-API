$(document).ready(function () {
    //   console.log("use check_nation_front.js");
    $(".result-data").hide();
    // Attach click event to the label, not directly to the file input
    $("#fileLabel").click(function () {});
  });
  
  function chlickSelectBack() {
    console.log('back');
    $(".fileInputCardBack").click();
  }
  
  function handleFileSelectionBack() {
    var selectedFile = $("#fileInputCardBack")[0].files[0];
  
    if (selectedFile) {
      $("#fileNameBack").html('<i class="bi bi-link-45deg"></i>' + selectedFile.name);
    } else {
      console.log("No file selected");
    }
  }
  
  function sendCheckCardBack() {
    $("#loadingIndicator").show();
    $(".btn-submit-card").prop("disabled", true);
    $(".loadingTextDefault").text("โปรดรอ...");
  
    if ($("#fileInputCardBack")[0].files.length > 0) {
      var selectedFile = $("#fileInputCardBack")[0].files[0];
  
      if (selectedFile.size > 2 * 1024 * 1024) {
        // File size is greater than 2 MB, show an alert or perform other actions
        notify("ไฟล์มีขนาดมากกว่า 2 MB", "error");
  
        // Optionally, you can reset the file input and perform other actions
        $("#fileInputCardBack").val("");
        $(".loadingTextDefault").text("ตรวจสอบข้อมูล");
        $(".btn-submit-card").prop("disabled", false);
        $("#loadingIndicator").hide();
      } else {
        var formData = new FormData($("#formCheckCardBack")[0]);
        var file = $("#fileInputCardBack")[0].files[0];

        var reader = new FileReader();
        reader.onload = function (e) {
          var imageURL = e.target.result;
  
          // Update the image source
          $("#previewImageBack").attr("src", imageURL).show();
  
          $.ajax({
            url: "function/check_national_back.php", // replace with your actual server-side endpoint
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
              // Handle success response
              console.log(response);
  
              document.getElementById("resultCardJsonBack").innerHTML =
                displayJsonData(response.data);
  
              const data = response.data;
              console.log(data);
  
              if (response?.status == "success") {
                $('#back_number').text(data?.back_number)
                notify(data?.error_message,'success');
                $(".result-data").show();
              } else {
                notify("เกิดข้อผิดพลาดบางอย่าง", "error");
                $(".result-data").hide();
              }
            },
            error: function (xhr, status, error) {
              // Handle error response
              console.error(xhr.responseText);
              notify("รูปภาพไม่ถูกต้อง", "error");
              $("#fileNameBack").val("");
              $("#fileInputCardBack").val("");
              $(".btn-submit-card").prop("disabled", false);
              $("#loadingIndicator").hide();
            },
            complete: function () {
              // Hide the loading indicator when the request is complete
              $("#loadingIndicator").hide();
              $(".loadingTextDefault").text("ตรวจสอบข้อมูล");
              $("#fileInputCardBack").val("");
              $(".btn-submit-card").prop("disabled", false);
            },
          });
        };
        reader.readAsDataURL(file);
      }
    } else {
      // Handle case where no file is selected
      notify("กรูณาเลือกไฟล์ก่อน", "warning");
      console.log("No file selected");
      $("#loadingIndicator").hide();
      $(".btn-submit-card").prop("disabled", false);
      $(".loadingTextDefault").text("ตรวจสอบข้อมูล");
    }
  }
  
  function formatJsonResponse(data) {
    var result = "<div>";
  
    for (var key in data) {
      if (data.hasOwnProperty(key)) {
        var value = data[key];
        result += "<div><strong>" + key + ":</strong> " + value + "</div>";
      }
    }
  
    result += "</div>";
    return result;
  }
  
  function notify(title, icon = "success") {
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      },
    });
    Toast.fire({
      icon,
      title,
    });
  }
  
  function displayJsonData(data) {
    var result = "<ul>";
  
    // Display each key-value pair
    for (var key in data) {
      if (data.hasOwnProperty(key)) {
        var value = data[key];
        result += "<li><strong>" + key + ":</strong> " + value + "</li>";
      }
    }
  
    result += "</ul>";
    return result;
  }
  