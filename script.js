$(document).ready(function () {
  $("#registrationForm").on("submit", function (e) {
    e.preventDefault(); // Prevent default form submission

    const formData = $(this).serialize(); // Serialize form data

    $.ajax({
      url: "process.php",
      type: "POST",
      data: formData,
      success: function (response) {
        const data = JSON.parse(response); // Parse JSON response
        if (data.success) {
          $("#success-message").removeClass("hidden");
          $("#output").html(`
              <strong>Name:</strong> ${data.name}<br>
              <strong>Email:</strong> ${data.email}<br>
              <strong>Phone:</strong> ${data.phone}
            `);
        } else {
          alert("Submission failed!");
        }
      },
      error: function () {
        alert("An error occurred while processing the form.");
      },
    });
  });
});
