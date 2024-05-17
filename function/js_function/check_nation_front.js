$(document).ready(function () {
  //   console.log("use check_nation_front.js");
  $(".result-data").hide();
  // Attach click event to the label, not directly to the file input
  $("#fileLabel").click(function () {});
});

function chlickSelect() {
  $(".fileInputCard").click();
}

function handleFileSelection() {
  var selectedFile = $("#fileInputCard")[0].files[0];

  if (selectedFile) {
    $("#fileName").html('<i class="bi bi-link-45deg"></i>' + selectedFile.name);
  } else {
    console.log("No file selected");
  }
}

function sendCheckCard() {
  $("#loadingIndicator").show();
  $(".btn-submit-card").prop("disabled", true);
  $(".loadingTextDefault").text("โปรดรอ...");

  if ($("#fileInputCard")[0].files.length > 0) {
    var selectedFile = $("#fileInputCard")[0].files[0];

    if (selectedFile.size > 2 * 1024 * 1024) {
      // File size is greater than 2 MB, show an alert or perform other actions
      notify("ไฟล์มีขนาดมากกว่า 2 MB", "error");

      // Optionally, you can reset the file input and perform other actions
      $("#fileInputCard").val("");
      $(".loadingTextDefault").text("ตรวจสอบข้อมูล");
      $(".btn-submit-card").prop("disabled", false);
      $("#loadingIndicator").hide();
    } else {
      var formData = new FormData($("#formCheckCard")[0]);
      var file = $("#fileInputCard")[0].files[0];
      var reader = new FileReader();
      reader.onload = function (e) {
        var imageURL = e.target.result;

        // Update the image source
        $("#previewImage").attr("src", imageURL).show();

        $.ajax({
          url: "function/check_national_front.php", // replace with your actual server-side endpoint
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            // Handle success response
            // console.log(response);

            document.getElementById("resultCardJson").innerHTML =
              displayJsonData(response.data);

            const data = response.data;

            if (
              data &&
              data.th_name !== undefined &&
              data.th_name !== null &&
              data.th_name !== ""
            ) {
              $("#id_number").text(data?.id_number);
              $("#th_init").text(data?.th_init);
              $("#th_fname").text(data?.th_fname);
              $("#th_lname").text(data?.th_lname);
              $("#th_name").text(data?.th_name);
              $("#en_init").text(data?.en_init);
              $("#en_fname").text(data?.en_fname);
              $("#en_lname").text(data?.en_lname);
              $("#en_name").text(data?.en_name);
              $("#th_dob").text(data?.th_dob);
              $("#en_dob").text(data?.en_dob);
              $("#address").text(data?.address);
              $("#province").text(data?.province);
              $("#sub_district").text(data?.sub_district);
              $("#postal_code").text(data?.postal_code);
              $("#home_address").text(data?.home_address);
              $("#gender").text(data?.gender);
              $("#religion").text(data?.religion);
              $("#th_issue").text(data?.th_issue);
              $("#en_issue").text(data?.en_issue);
              $("#th_expire").text(data?.th_expire);
              $("#en_expire").text(data?.en_expire);
              notify("สแกนข้อมูลสำเร็จ");
              $(".result-data").show();
            } else {
              $("#fileName").text('')
              notify("ไฟล์ไม่ใช่บัตรประชาชน", "error");
              $(".result-data").hide();
            }
          },
          error: function (xhr, status, error) {
            // Handle error response
            console.log(error);
            console.log(status);
            console.error(xhr.responseText);
            notify("รูปภาพไม่ถูกต้อง", "error");
            $("#fileInputCard").val("");
            $('#fileName').text("")
            $(".btn-submit-card").prop("disabled", false);
            $("#loadingIndicator").hide();
          },
          complete: function () {
            // Hide the loading indicator when the request is complete
            $("#loadingIndicator").hide();
            $(".loadingTextDefault").text("ตรวจสอบข้อมูล");
            $("#fileInputCard").val("");
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
