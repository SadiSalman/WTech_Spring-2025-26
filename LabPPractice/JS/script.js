document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // stop default submission

        let fname = document.getElementById("fname").value.trim();
        let lname = document.getElementById("lname").value.trim();
        let email = document.getElementById("email").value.trim();
        let phone = document.getElementById("phone").value.trim();
        let message = document.getElementById("message").value.trim();

        // Validation
        if (fname === "" || lname === "" || email === "" || phone === "" || message === "") {
            alert("Field Value need to be filled up");
            return;
        }

        // Print values in console
        console.log("First Name:", fname);
        console.log("Last Name:", lname);
        console.log("Email:", email);
        console.log("Phone:", phone);
        console.log("Message:", message);

        alert("Form submitted successfully!");
    });
});
