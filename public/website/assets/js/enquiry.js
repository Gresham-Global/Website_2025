$("#submit_footer,#submit_contact, #submit_modal").click(function (e) {
    var clickedID = $(this).attr("id"); // Get the ID of the clicked element
    var form_value = clickedID === "submit_contact" ? "_contact" : clickedID === "submit_modal" ? "_modal" : "";
    $("#allerror" + form_value)
        .html("")
        .removeClass("text-success1 text-danger");

    e.preventDefault();

    var name = $.trim($("#full_name" + form_value).val());
    var email = $.trim($("#email" + form_value).val());
    var designation = $.trim($("#designation" + form_value).val());
    var organisation = $.trim($("#organisation" + form_value).val());
    var services = $.trim($("#servicess" + form_value).val());
    var message = $.trim($("#message" + form_value).val());
    console.log("services", services);
    if (!name) {
        $("#allerror" + form_value)
            .html("Enter your name")
            .addClass("text-danger");
        return false;
    }
    if (/[^a-zA-Z \-]/.test(name)) {
        $("#allerror" + form_value)
            .html("Enter only alphabets in name")
            .addClass("text-danger");
        return false;
    }
    if (!email) {
        $("#allerror" + form_value)
            .html("Enter Your Email Address")
            .addClass("text-danger");
        return false;
    }
    var emailReg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailReg.test(email)) {
        $("#allerror" + form_value)
            .html("Enter a valid Email Address")
            .addClass("text-danger");
        return false;
    }
    var disallowedDomains = [
        "gmail.com", "yahoo.com", "hotmail.com", "outlook.com",
        "live.com", "aol.com", "msn.com", "icloud.com",
        "me.com", "mail.com", "gmx.com", "protonmail.com",
        "yandex.com", "zoho.com", "tutanota.com", "rediffmail.com",
        "rocketmail.com", "ymail.com", "inbox.com", "fastmail.com",
        "hushmail.com"
    ];

    var emailDomain = email.split('@')[1].toLowerCase();
    if (disallowedDomains.includes(emailDomain)) {

        $("#allerror" + form_value)
            .html("Please use your official or institutional email address.")
            .addClass("text-danger");
        return false;
    }
    if (!designation) {
        $("#allerror" + form_value)
            .html("Enter a designation")
            .addClass("text-danger");
        return false;
    }
    if (!organisation) {
        $("#allerror" + form_value)
            .html("Enter an organisation")
            .addClass("text-danger");
        return false;
    }
    if (!services) {
        $("#allerror" + form_value)
            .html("Select a service")
            .addClass("text-danger");
        return false;
    }
    if (!message) {
        $("#allerror" + form_value)
            .html("Enter a message")
            .addClass("text-danger");
        return false;
    }

    // Disable button to prevent multiple clicks
    $("#" + clickedID).prop("disabled", true);
    // console.log("Base URL:", baseurl);
    // console.log("Final URL:", baseurl + "submit-enquiry");
    $.ajax({
        url: baseurl + "submit-enquiry",
        type: "POST",
        dataType: "json",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"), // CSRF token
            full_name: name,
            email: email,
            designation: designation,
            organisation: organisation,
            services: services,
            message: message,
        },
        success: function (response) {
            console.log(response);
            if (response.status) {
                // Show success alert
                Swal.fire({
                    title: 'Success!',
                    text: 'Enquiry submitted successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });

                // Clear all fields
                $("#full_name" + form_value).val("");
                $("#email" + form_value).val("");
                $("#designation" + form_value).val("");
                $("#organisation" + form_value).val("");
                $("#services" + form_value).prop("selectedIndex", 0);
                $("#message" + form_value).val("");

                // Enable button after submission
                $("#" + clickedID).prop("disabled", false);

                // Optional: Clear message area
                $("#allerror" + form_value)
                    .removeClass("text-danger")
                    .removeClass("text-success1")
                    .html("");

            } else {
                let errorMessage = response.message || "Please try again.";

                // Show error alert
                Swal.fire({
                    title: 'Error!',
                    text: errorMessage,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });

                $("#" + clickedID).prop("disabled", false);
            }
        },
        error: function (xhr, status, error) {
            console.log("AJAX request failed:", status, error);
            $("#allerror" + form_value)
                .html("Something went wrong. Please try again.")
                .addClass("text-danger");
            $("#" + clickedID).prop("disabled", false);
        },
    });
});

$(".subscribeBox button").on("click", function () {
    let email = $("#email_subscribe").val().trim();

    var emailReg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailReg.test(email)) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Please enter a valid email address!",
        });
        return false;
    }
    /*  if (email === '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please enter an email address!'
        });
        return;
    } */

    $.ajax({
        url: baseurl + "subscribe-newsletter", // Make sure this route is defined in web.php
        type: "POST",
        data: {
            email: email,
            _token: $('meta[name="csrf-token"]').attr("content"), // CSRF Token
        },
        success: function (response) {
            if (response.status) {
                Swal.fire({
                    icon: "success",
                    title: "Subscribed!",
                    text: response.message,
                });
                $("#email_subscribe").val(""); // Clear input after success
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: response.message,
                });
            }
        },
        error: function (xhr) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong! Please try again.",
            });
        },
    });
});

$(document).ready(function () {
    $("#services_contact, #services").select2({
        placeholder: "Select Services",
    });
});
