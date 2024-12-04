$(document).ready(function () {
  $("#registrationForm").submit(function (event) {
    event.preventDefault(); // Prevent form submission

    // Collect form data
    const formData = {
      name: $("#name").val(),
      email: $("#email").val(),
      password: $("#password").val(),
    };

    // Display the output
    $("#output").html(`
          <h2>Registration Successful</h2>
          <p><strong>Name:</strong> ${formData.name}</p>
          <p><strong>Email:</strong> ${formData.email}</p>
      `);
  });
});
