$(document).ready(function () {
    let currentHref = "";

    function showPopup(href) {
        currentHref = href;
        $("#downloadPopup").show();
        $("body").css("overflow", "hidden");
    }

    function hidePopup() {
        $("#downloadPopup").hide();
        $("body").css("overflow", "auto");
        $("#downloadForm")[0].reset();
        $("#loadingMsg").hide();
        $("#submitBtn").prop("disabled", false).text("Submit");
    }

    function downloadPDF(href) {
        const link = $("<a>", {
            href: href,
            download: "",
            target: "_blank",
        }).appendTo("body");

        link[0].click();
        link.remove();
    }

    $(document).on("click", ".downloadReportForm", function (e) {
        e.preventDefault();
        const href = $(this).attr("href");
        if (href) showPopup(href);
    });

    $("#closePopup, #downloadPopup").on("click", function (e) {
        if (e.target === this || $(e.target).is("#closePopup")) hidePopup();
    });

    $(document).on("keydown", function (e) {
        if (e.key === "Escape" && $("#downloadPopup").is(":visible"))
            hidePopup();
    });

    function showError(message) {
        $("#allerror").html(message).addClass("text-danger");
        return false;
    }

    // Disable submit button by default
$("#submitBtn").prop("disabled", true);

// Real-time validation check
function checkFormValidity() {
    var name = $("#fullName").val().trim();
    var email = $("#emailId").val().trim();

    // Name validation
    if (!name) return $("#submitBtn").prop("disabled", true);
    if (/[^a-zA-Z \-]/.test(name)) return $("#submitBtn").prop("disabled", true);

    // Email validation
    if (!email) return $("#submitBtn").prop("disabled", true);

    var emailReg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailReg.test(email)) return $("#submitBtn").prop("disabled", true);

    // Disallowed domains
    var disallowedDomains = [
        "gmail.com", "yahoo.com", "hotmail.com", "outlook.com",
        "live.com", "aol.com", "msn.com", "icloud.com",
        "me.com", "mail.com", "gmx.com", "protonmail.com", "yandex.com"
    ];

    var emailDomain = email.split('@')[1].toLowerCase();
    if (disallowedDomains.includes(emailDomain)) {
        return $("#submitBtn").prop("disabled", true);
    }

    // All validations passed
    $("#submitBtn").prop("disabled", false);
}

// Run validation while typing / on blur
$("#fullName, #emailId").on("keyup blur", checkFormValidity);


// ======================
// YOUR ORIGINAL CODE
// ======================
$("#downloadForm").on("submit", function (e) {
    e.preventDefault();

    var name = $("#fullName").val();
    var email = $("#emailId").val();

    // Validate name
    if (!name) return showError("Enter your full name");
    if (/[^a-zA-Z \-]/.test(name)) return showError("Enter only alphabets in name");

    // Validate email
    if (!email) return showError("Enter Your Email Address");

    var emailReg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailReg.test(email)) return showError("Enter a valid Email Address");

    // Disallowed domains
    var disallowedDomains = [
        "gmail.com", "yahoo.com", "hotmail.com", "outlook.com",
        "live.com", "aol.com", "msn.com", "icloud.com",
        "me.com", "mail.com", "gmx.com", "protonmail.com", "yandex.com"
    ];

    var emailDomain = email.split('@')[1].toLowerCase();
    if (disallowedDomains.includes(emailDomain)) {
        return showError("Please use your official or institutional email address.");
    }

    // Show loading state
    $("#submitBtn").prop("disabled", true).text("Processing...");
    // $("#loadingMsg").show().text("Processing...");

    const formData = {
        full_name: $("#fullName").val(),
        email_id: $("#emailId").val(),
        report_url: $("#reportUrl").val(),
        publicationTitle: $("#publicationTitle").val(),
        publicationId: $("#publicationId").val(),
        _token: $('meta[name="csrf-token"]').attr("content"),
    };

    $.ajax({
        url: "/publications/download-report",
        method: "POST",
        data: formData,
        dataType: "json",
        success: function (response) {
            $("#loadingMsg").text(response.message);

            if (response.success) {
                Swal.fire({
                    icon: "success",
                    title: "Successful",
                    text: response.message,
                    customClass: {
                        popup: "downloadReportPopup",
                    },
                });

                setTimeout(function () {
                    hidePopup();
                    $("#submitBtn").prop("disabled", false).text("Submit");
                }, 3000);
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: response.message,
                    customClass: {
                        popup: "downloadReportPopup",
                    },
                });

                $("#submitBtn").prop("disabled", false).text("Submit");
            }
        },
        error: function (xhr, status, error) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "An error occurred: " + error,
            });

            $("#loadingMsg").text("An error occurred: " + error);
            $("#submitBtn").prop("disabled", false).text("Submit");
        },
    });
});

    // Function to trigger the PDF download
    // function downloadPDF(pdfUrl) {
    //     const link = document.createElement('a');
    //     link.href = pdfUrl;
    //     link.download = '';  // You can specify a file name here, or leave it empty to use the default name
    //     link.target = '_blank';
    //     link.click();
    // }
    function downloadPDF(pdfUrl, publicationTitle) {
        const link = document.createElement("a");

        // Generate a file name from the publication title and ensure it’s URL-safe
        const fileName = `${publicationTitle
            .replace(/\s+/g, "_")
            .toLowerCase()}.pdf`;

        link.href = pdfUrl;
        link.download = fileName; // Use the publication title as the file name
        link.target = "_blank";
        link.click();
    }
});

$(document).on("click", ".downloadReportForm", function (e) {
    e.preventDefault(); // Prevent the default action of the anchor tag

    // Get the href (PDF URL) and custom data attributes (publication title and ID)
    const reportUrl = $(this).attr("href");
    const title = $(this).data("title"); // Publication title
    const publicationId = $(this).data("id"); // Publication ID

    // Set the values in the form
    $("#reportUrl").val(reportUrl); // Hidden input for PDF URL
    $("#publicationTitle").val(title); // Hidden input for Publication Title
    $("#publicationId").val(publicationId); // Hidden input for Publication ID

    // Show the popup
    showPopup(reportUrl);
});

// Example function to show the popup
function showPopup(reportUrl) {
    $("#downloadPopup").show();
    $("body").addClass("popup-open");
}
$(document).on("click", "#closePopup", function () {
    hidePopup();
});

function hidePopup() {
    $("#downloadPopup").hide();
    $("body").removeClass("popup-open");
}
