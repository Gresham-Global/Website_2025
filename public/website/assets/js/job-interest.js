$("#job-submit-button").click(function(e) {
    e.preventDefault();
    var clickedID = $(this).attr('id');
    var form = $("#jobApplicationForm")[0];
    var form_value = ""; // In case used for dynamic form parts later

    $('#allerror').html("").removeClass("text-success1 text-danger");

    // Trimmed input values
    var fullname = $.trim($("#fullname").val());
    var email = $.trim($("#email").val());
    var phone_no = $.trim($("#phone_no").val());
    var city = $.trim($("#city").val());
    // var interest_description = $.trim($("#interest_description").val());
    var tellus_yourself = $.trim($("#tellus_yourself").val());
    var resume = $("#resume")[0].files[0];
    var career_id = $.trim($("#career_id").val());
    var work_experience = $("#work_experience").val();
    var termsAccepted = $("#termsCheck").is(":checked");

    // Validation messages
    if (!fullname) {
        $('#allerror').html("Enter your name").addClass("text-danger");
        return false;
    }
    if (/[^a-zA-Z \-]/.test(fullname)) {
        $('#allerror').html("Enter only alphabets in name").addClass("text-danger");
        return false;
    }
    if (!email) {
        $('#allerror').html("Enter Your Email Address").addClass("text-danger");
        return false;
    }
    var emailReg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailReg.test(email)) {
        $('#allerror').html("Enter a valid Email Address").addClass("text-danger");
        return false;
    }
    if (!phone_no) {
        $('#allerror').html("Enter your phone number").addClass("text-danger");
        return false;
    }
    if (!/^\d{10,15}$/.test(phone_no)) {
        $('#allerror').html("Enter a valid phone number (10-15 digits)").addClass("text-danger");
        return false;
    }
    if (!city) {
        $('#allerror').html("Enter your city").addClass("text-danger");
        return false;
    }
    if (!work_experience) {
        $('#allerror').html("Select your work experience").addClass("text-danger");
        return false;
    }
    // if (!interest_description) {
    //     $('#allerror').html("Enter your interest description").addClass("text-danger");
    //     return false;
    // }
    if (!tellus_yourself) {
        $('#allerror').html("Enter about yourself").addClass("text-danger");
        return false;
    }
    if (!resume) {
        $('#allerror').html("Please upload your CV/Resume").addClass("text-danger");
        return false;
    }

    // var allowedExtensions = ["pdf", "doc", "docx" ];
    var allowedExtensions = ["pdf", "doc", "docx", "ppt", "pptx"];

    var fileName = resume.name;
    var fileSize = resume.size;
    var fileExtension = fileName.split('.').pop().toLowerCase();

    if (!allowedExtensions.includes(fileExtension)) {
        $('#allerror').html("Only .pdf, .doc, .docx, .ppt, or .pptx files are allowed").addClass("text-danger");
        return false;
    }
    if (fileSize > 10485760) {
        $('#allerror').html("File size must be less than 10MB").addClass("text-danger");
        return false;
    }
    if (!termsAccepted) {
        $('#allerror').html("Please accept the terms and conditions").addClass("text-danger");
        return false;
    }

    // Disable submit button
    $("#" + clickedID).prop('disabled', true);

    var formData = new FormData(form);
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

    $.ajax({
        url: baseurl + "job-interest",
        type: 'POST',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            if (response.status) {
                $('#allerror')
                    .html("Enquiry submitted successfully!")
                    .removeClass("text-danger")
                    .addClass("text-success1");
                form.reset();
                $("#" + clickedID).prop('disabled', false);
                setTimeout(function() {
                    $('#allerror').removeClass("text-success1").addClass("text-danger").html("");
                }, 10000);
            } else {
                $('#allerror').html(response.message || "Please try again.").addClass("text-danger");
                $("#" + clickedID).prop('disabled', false);
            }
        },
        error: function(xhr, status, error) {
            console.log("AJAX Error:", status, error);
            $('#allerror').html("Something went wrong. Please try again.").addClass("text-danger");
            $("#" + clickedID).prop('disabled', false);
        }
    });
});
