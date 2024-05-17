$(document).ready(function () {
  $(".result-data-slip").hide();
  // Attach click event to the label, not directly to the file input
});

function sendCheckSlip() {
  $("#loadingIndicator").show();
  $(".btn-submit-card").prop("disabled", true);
  $(".loadingTextDefault").text("โปรดรอ...");

  if ($("#fileInputCard")[0].files.length > 0) {
    if (selectedFile.size > 2 * 1024 * 1024) {
      // File size is greater than 2 MB, show an alert or perform other actions
      notify("ไฟล์มีขนาดมากกว่า 30 MB", "error");

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
          url: "function/check_ocr_plaintext.php", // replace with your actual server-side endpoint
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            // Handle success response
            console.log(response);
            //   $("#resultTextSlip").text(response.data);

            // Display the formatted HTML on the page
            document.getElementById("resultTextSlip").innerHTML =
              formatJsonResponseMySelf(JSON.parse(response.data));

            document.getElementById("resultTextSlipJson").innerHTML =
              formatJsonResponseHtml(JSON.parse(response.data));
            $(".result-data-slip").show();
            notify("สแกนข้อมูลสำเร็จ");
          },
          error: function (xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
            $(".btn-submit-card").prop("disabled", false);
          },
          complete: function () {
            // Hide the loading indicator when the request is complete
            $("#loadingIndicator").hide();
            $(".btn-submit-card").prop("disabled", false);
            $(".loadingTextDefault").text("ตรวจสอบข้อมูล");
          },
        });
      };
      reader.readAsDataURL(file);
    }
  } else {
    // Handle case where no file is selected
    console.log("No file selected");
    notify("กรูณาเลือกไฟล์ก่อน", "warning");
    $("#loadingIndicator").hide();
    $(".btn-submit-card").prop("disabled", false);
    $(".loadingTextDefault").text("ตรวจสอบข้อมูล");
  }
}
function formatJsonResponseMySelf(data) {
  var result = "<div>";

  // Display each item in the 'text' array
  if (data.hasOwnProperty("text") && Array.isArray(data.text)) {
    data.text.forEach(function (item) {
      // Replace '\n' with '<br>'
      item = item.replace(/\n/g, "<br>");
      result += "<div>" + item + "</div>";
    });
  }

  result += "</div>";
  return result;
}

function formatJsonResponseHtml(data) {
  var result = "<div>";

  // Display each key-value pair
  for (var key in data) {
    if (data.hasOwnProperty(key)) {
      // Skip the "Time" key
      if (key === "Time") {
        continue;
      }

      var value = data[key];

      // Handle 'text' array separately
      if (key === "text" && Array.isArray(value)) {
        result += "<div><strong>" + key + "</strong>: ";

        // Iterate over the elements in the 'value' array
        for (var i = 0; i < value.length; i++) {
          result += value[i] + " ";
        }

        result += "</div>";
      } else {
        // Handle nested objects or arrays recursively
        if (typeof value === "object" && value !== null) {
          value = formatJsonResponseHtml(value);
        }
        result += "<div><strong>" + key + "</strong>: " + value + "</div>";
      }
    }
  }

  result += "</div>";
  return result;
}
