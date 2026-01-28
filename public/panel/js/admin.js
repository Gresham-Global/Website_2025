function deleteRecordWithSweetAlert(id, action_path, data_table_id) {
    var csrfToken = document.head.querySelector(
        'meta[name="csrf-token"]'
    ).content;
    console.log(
        id +
            " -- " +
            action_path +
            " -- " +
            data_table_id +
            " -- " +
            baseUrl +
            action_path
    );
    Swal.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this item!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: baseUrl + action_path,
                data: {
                    id: id,
                    _token: csrfToken,
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if (response && response.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: response.message,
                        });

                        var dataTable = $(data_table_id).DataTable();
                        dataTable.ajax.reload(null, false);
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: response.message,
                        });
                    }
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text:
                            "Failed to delete record --" +
                            status +
                            "--" +
                            error,
                    });
                },
            });
        }
    });
}

function deleteMediaRow(rowId, name) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = "/admin/media/delete";
    var data_table_id = "#media-table";
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

function deleteSeoRow(rowId, pageName) {
    var id = rowId;
    var action_path = "/admin/seo/delete"; // your SEO delete route
    var data_table_id = "#seo-table"; // your DataTable ID

    // Call the generic delete function with SweetAlert
    deleteRecordWithSweetAlert(id, action_path, data_table_id, pageName);
}

function deleteLifeRow(rowId, name) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = "/admin/life/delete";
    var data_table_id = "#life-table";
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

function deleteBannerRow(rowId, name) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = "/admin/banner/delete";
    var data_table_id = "#banner-table";
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

function deleteVideoRow(rowId, name) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = "/admin/event/delete";
    var data_table_id = "#event-table";
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

function deleteNewsRow(rowId, name) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = "/admin/newsandblog/delete";
    var data_table_id = "#newsandblog-table";
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

function deletePublicationRow(rowId, name) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = "/admin/publication/delete";
    var data_table_id = "#publications-table";
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

function deleteCareerRow(rowId, name) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = "/admin/career/delete";
    var data_table_id = "#career-table";
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

function deleteJobRow(rowId, email) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = "/admin/job-interested/delete";
    var data_table_id = "#job-table";
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

$(document).ready(function () {
    $(".alert-success").delay(5000).slideUp(300);
    $(".alert-danger").delay(5000).slideUp(300);
    if ($("#description").length) {
    $("#description").summernote({
        height: 300,
        toolbar: [
            ["style", ["style"]],
            ["font", ["bold", "underline", "clear", "fontsize", "fontname"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["table", ["table"]],
            ["insert", ["link"]],
            ["view", ["fullscreen", "codeview", "help"]],
        ],
        disableDragAndDrop: true,
        fontNames: ["Poppins"], // Only Poppins in dropdown
        fontSizes: ["8", "10", "12", "14", "16", "18", "24", "32", "48", "64", "80"], // up to 80px
        callbacks: {
            onInit: function() {
                $("#description").summernote("fontName", "Poppins"); // Default font
            }
        }
    });

    // Load Google Fonts Poppins
    $("<link>", {
        rel: "stylesheet",
        href: "https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
    }).appendTo("head");

    // Apply Poppins in editor content
    $("#description").next(".note-editor").find(".note-editable").css("font-family", "Poppins, sans-serif");
}


    if ($(".summernote-highlight").length) {
        $(".summernote-highlight").each(function () {
            $(this).summernote({
                height: 300,
                toolbar: [
                    ["style", ["style"]],
                    ["font", ["bold", "underline", "clear"]],
                    ["color", ["color"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["table", ["table"]],
                    ["insert", ["link", "picture"]],
                    ["view", ["fullscreen", "codeview", "help"]],
                ],
            });
        });
    }

    if ($("#description_ban").length) {
        $("#description_ban").summernote();
    }

    if ($("#description_bn").length) {
        $("#description_bn").summernote();
    }

    if ($("#admin_login").length) {
        $("#togglePassword").on("click", function () {
            const passwordField = $("#password");
            const icon = $(this).find(".material-symbols-outlined");
            if (passwordField.attr("type") === "password") {
                passwordField.attr("type", "text");
                icon.text("visibility");
            } else {
                passwordField.attr("type", "password");
                icon.text("visibility_off");
            }
        });

        $("#remembarbtn").on("click", function () {
            // Toggle the checked state of the checkbox
            $("#rememberCheckbox").prop("checked", function (i, checked) {
                return !checked;
            });
        });

        let correctAnswer;

        function generateMathProblem() {
            const num1 = Math.floor(Math.random() * 10) + 1;
            const num2 = Math.floor(Math.random() * 10) + 1;
            correctAnswer = num1 + num2;

            $("#num1").text(num1);
            $("#num2").text(num2);
        }
        generateMathProblem();
        $("#refresh-btn").on("click", function (event) {
            event.preventDefault();
            generateMathProblem();
            $("#robotAnswer").val("");
            $("#result-message").hide();
            $("#icon .material-symbols-outlined").text("robot"); // Reset icon to 'robot'
        });
        $.validator.addMethod(
            "captchaCorrect",
            function (value, element) {
                // Assuming the `correctAnswer` is available in the global scope
                return parseInt(value, 10) === correctAnswer;
            },
            "Incorrect captcha answer. Please try again."
        );
        $("#admin_login").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                robotAnswer: {
                    required: true,
                    captchaCorrect: true,
                },
            },
            messages: {
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address",
                },
                password: {
                    required: "Please enter a password",
                    minlength: "Password must be at least 8 characters",
                },
                robotAnswer: {
                    required: "Please enter captcha",
                    captchaCorrect:
                        "Incorrect captcha answer. Please try again.", // Custom message
                },
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") === "email") {
                    error.appendTo("#email-error");
                } else if (element.attr("name") === "password") {
                    error.appendTo("#password-error");
                } else if (element.attr("name") === "robotAnswer") {
                    error.appendTo("#robotAnswer-error");
                } else {
                    // Handle other elements if needed
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                return true;
            },
        });
    }

    if ($("#enquiries-table").length) {
        table = $("#enquiries-table").DataTable({
            aLengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            iDisplayLength: 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + "/admin/enquiries-all", // Your server-side controller URL
                type: "GET",
            },
            columns: [
                {
                    data: "id",
                    orderable: false, // Disable sorting for the Sr. No. column
                    render: function (data, type, row, meta) {
                        // Render Sr. No. as an incrementing number
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: "fullName",
                    name: "fullName",
                },
                {
                    data: "email",
                    name: "email",
                },
                {
                    data: "phone",
                    name: "phone",
                },
                {
                    data: "instituteName",
                    name: "instituteName",
                },
                {
                    data: "courseName",
                    name: "courseName",
                },
                {
                    data: "city",
                    name: "city",
                },
                {
                    data: "message",
                    name: "message",
                },
                {
                    data: "updatedAt",
                    name: "updatedAt",
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, "desc"]],
        });
        $("#downloadBtn").click(function () {
            let start_date = $("#start_date").val();
            let end_date = $("#end_date").val();
            if (start_date == "" || end_date == "") {
                $("#error-download")
                    .html("Please select both days for download the data")
                    .removeClass("hide");
                return false;
            }
            $("#error-download").addClass("hide");
            var downloadUrl =
                baseUrl +
                "/admin/enquiries-download?start_date=" +
                start_date +
                "&end_date=" +
                end_date;

            // Create an anchor element
            var link = document.createElement("a");

            // Set the download URL as the href attribute
            link.href = downloadUrl;

            // Set the target attribute to '_blank' to open in a new tab
            link.target = "_blank";

            // Trigger a click event on the anchor element
            link.click();
        });
    }

    if ($("#media-table").length) {
        table = $("#media-table").DataTable({
            aLengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            iDisplayLength: 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + "/admin/media-all", // Your server-side controller URL
                type: "GET",
            },
            columns: [
                {
                    data: "id",
                    orderable: false, // Disable sorting for the Sr. No. column
                    render: function (data, type, row, meta) {
                        // Render Sr. No. as an incrementing number
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: "title",
                    name: "title",
                },
                {
                    data: "short_description",
                    name: "short_description",
                },
                {
                    data: "media_link",
                    name: "media_link",
                },
                // {
                //     data: "thumbnail_image",
                //     name: "thumbnail_image",
                //     orderable: false,
                //     render: function (data, type, row) {
                //         // Show image preview if facilityIconUrl is available
                //         if (data) {
                //             return `<img src="${baseUrl}${data}" alt="Image" style="width:50px; height:50px; border-radius:5px;">`;
                //         } else {
                //             return `<span>No Image</span>`;
                //         }
                //     },
                // },
                {
                    data: "thumbnail_image",
                    name: "thumbnail_image",
                    orderable: false,
                    render: function (data, type, row) {
                        if (!data) {
                            return `<span>No Image</span>`;
                        }

                        let images = [];

                        // If data is JSON string
                        try {
                            images = JSON.parse(data);
                        } catch (e) {
                            images = [data]; // fallback (single image safety)
                        }

                        let html = "";

                        images.forEach(function (img) {
                            html += `
                <img 
                    src="${baseUrl}${img}" 
                    alt="Image" 
                    style="width:50px; height:50px; border-radius:5px; margin-right:5px;"
                >
            `;
                        });

                        return html;
                    },
                },
                {
                    data: "logo_image",
                    name: "logo_image",
                    orderable: false,
                    render: function (data, type, row) {
                        // Show image preview if facilityIconUrl is available
                        if (data) {
                            return `<img src="${baseUrl}${data}" alt="Image" style="width:50px; height:50px; border-radius:5px;">`;
                        } else {
                            return `<span>No Image</span>`;
                        }
                    },
                },
                {
                    data: "publish_date",
                    name: "publish_date",
                },
                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        var viewBlogUrl = baseUrl + "/blog/" + row.slug;
                        var editBlogUrl =
                            baseUrl + "/admin/media/edit/" + row.id;
                        var buttonsHtml =
                            // '<a href="' + viewBlogUrl + '" class="btn btn-warning btn-sm mr-1 mb-1" target="_blank"><span class="material-symbols-outlined">visibility</span></a>' +
                            '<a href="' +
                            editBlogUrl +
                            '" class="btn btn-primary btn-sm mr-1 mb-1"><span class="material-symbols-outlined">edit</span></a>' +
                            '<a href="javascript:void(0)" onclick="deleteMediaRow(' +
                            row.id +
                            ",'" +
                            row.title +
                            '\')"  class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> <span class="material-symbols-outlined">delete</span> </a>';

                        return buttonsHtml;
                    },
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, "desc"]],
        });
    }

    if ($("#life-table").length) {
        table = $("#life-table").DataTable({
            aLengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            iDisplayLength: 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + "/admin/life-all",
                type: "GET",
            },
            columns: [
                {
                    data: "id",
                    orderable: false, // Sr. No.
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: "title",
                    name: "title",
                },
                {
                    data: "thumbnail_image",
                    name: "thumbnail_image",
                    orderable: false,
                    render: function (data, type, row) {
                        if (data) {
                            return `<img src="${baseUrl}/${data}" 
     alt="Image"
     style="display:block; margin:0 auto; border-radius:5px; width:100%; height:auto; max-width:350px;">`;
                        } else {
                            return `<span>No Image</span>`;
                        }
                    },
                },
                {
                    data: "order",
                    name: "order",
                    orderable: true, // Make order column sortable
                },
                {
                    data: "status",
                    name: "status",
                    render: function (data, type, row) {
                        if (data == 1) {
                            return '<span class="material-symbols-outlined btn-success mx-auto" style="">mode_off_on</span>';
                        } else {
                            return '<span class="material-symbols-outlined btn-danger" style="">mode_off_on</span>';
                        }
                    },
                },
                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        var editLifeUrl =
                            baseUrl + "/admin/life/edit/" + row.id;
                        return (
                            '<a href="' +
                            editLifeUrl +
                            '" class="btn btn-primary btn-sm mr-1 mb-1">' +
                            '<span class="material-symbols-outlined">edit</span></a>' +
                            '<a href="javascript:void(0)" onclick="deleteLifeRow(' +
                            row.id +
                            ",'" +
                            row.title +
                            "')\" " +
                            'class="btn btn-danger btn-sm"> <span class="material-symbols-outlined">delete</span> </a>'
                        );
                    },
                },
            ],
            // Initial sorting by 'order' column ascending
            order: [[0, "asc"]], // Column index 3 = 'order'
        });
    }

    if ($("#add-media").length) {
        $.validator.addMethod("validWebp", function (value, element) {
            // Check if the file type is WebP
            return (
                this.optional(element) ||
                (element.files[0] && element.files[0].type === "image/webp")
            );
        });
        $.validator.addMethod(
            "checkFileSize",
            function (value, element, param) {
                // Check if file exists and its size is less than or equal to maxSize
                return (
                    this.optional(element) ||
                    (element.files[0] && element.files[0].size <= 500 * 1024)
                );
            }
        );
        $.validator.addMethod(
            "validImage",
            function (value, element) {
                if (this.optional(element)) {
                    return true;
                }

                const allowedExtensions = ["jpg", "jpeg", "png", "webp", "svg"];
                const fileName = value.toLowerCase();
                const extension = fileName.substring(
                    fileName.lastIndexOf(".") + 1
                );

                return allowedExtensions.includes(extension);
            },
            "Please upload a valid image file (jpg, jpeg, png, webp, svg)."
        );

        $("#add-media").validate({
            rules: {
                title: {
                    required: true,
                },
                short_description: {
                    required: true,
                },
                thumbnail_image: {
                    required: true,
                    validImage: true, // Custom method to check for valid WebP files
                    checkFileSize: true,
                },
                logo_image: {
                    required: true,
                    validImage: true, // Custom method to check for valid WebP files
                    checkFileSize: true,
                },
                media_link: {
                    required: true,
                    url: true, // Ensures it's a valid URL
                },
            },
            messages: {
                title: {
                    required: "Enter the media title",
                },
                short_description: {
                    required: "Enter a short description",
                },
                thumbnail_image: {
                    required: "Select the thumbnail image",
                    validImage: "Please upload a valid image file.",
                    checkFileSize: "Maximum file size is 500KB",
                },
                logo_image: {
                    required: "Select the logo image",
                    validImage: "Please select a valid logo image",
                    checkFileSize: "Maximum file size is 500KB",
                },
                media_link: {
                    required: "Enter the media link",
                    url: "Enter a valid URL",
                },
            },
            submitHandler: function (form) {
                var flag = 0;

                // Reset errors
                // $("#description_error").text('').css("display", "none");
                // $("#description_ban_error").text('').css("display", "none");

                // // Validate descriptions
                // if ($.trim($('#description').summernote('code')) === '') {
                //     $("#description_error").text("English description cannot be empty.").css("display", "block");
                //     flag = 1;
                // }
                // if ($.trim($('#description_ban').summernote('code')) === '') {
                //     $("#description_ban_error").text("Bangla description cannot be empty.").css("display", "block");
                //     flag = 1;
                // }

                if (flag === 1) return false;
                return true;
            },
        });
    }
    if ($("#edit_media").length) {
        $.validator.addMethod("validWebp", function (value, element) {
            // Check if the file type is WebP
            return (
                this.optional(element) ||
                (element.files[0] && element.files[0].type === "image/webp")
            );
        });
        $.validator.addMethod(
            "checkFileSize",
            function (value, element, param) {
                // Check if file exists and its size is less than or equal to maxSize
                return (
                    this.optional(element) ||
                    (element.files[0] && element.files[0].size <= 500 * 1024)
                );
            }
        );
        $.validator.addMethod(
            "validImage",
            function (value, element) {
                if (this.optional(element)) {
                    return true;
                }

                const allowedExtensions = ["jpg", "jpeg", "png", "webp", "svg"];
                const fileName = value.toLowerCase();
                const extension = fileName.substring(
                    fileName.lastIndexOf(".") + 1
                );

                return allowedExtensions.includes(extension);
            },
            "Please upload a valid image file (jpg, jpeg, png, webp, svg)."
        );
        $("#edit_media").validate({
            rules: {
                title: {
                    required: true,
                },
                short_description: {
                    required: true,
                },
                thumbnail_image: {
                    required: false,
                    validImage: true, // Custom method to check for valid WebP files
                    checkFileSize: true,
                },
                logo_image: {
                    required: false,
                    validImage: true, // Custom method to check for valid WebP files
                    checkFileSize: true,
                },
                media_link: {
                    required: true,
                    url: true, // Ensures it's a valid URL
                },
            },
            messages: {
                title: {
                    required: "Enter the media title",
                },
                short_description: {
                    required: "Enter a short description",
                },
                thumbnail_image: {
                    required: "Select the thumbnail image",
                    validImage: "Please upload a valid image file.",
                    checkFileSize: "Maximum file size is 500KB",
                },
                logo_image: {
                    required: "Select the logo image",
                    validImage: "Please select a valid WebP logo image",
                    checkFileSize: "Maximum file size is 500KB",
                },
                media_link: {
                    required: "Enter the media link",
                    url: "Enter a valid URL",
                },
            },
            submitHandler: function (form) {
                var flag = 0;

                // Reset errors
                // $("#description_error").text('').css("display", "none");
                // $("#description_ban_error").text('').css("display", "none");

                // // Validate descriptions
                // if ($.trim($('#description').summernote('code')) === '') {
                //     $("#description_error").text("English description cannot be empty.").css("display", "block");
                //     flag = 1;
                // }
                // if ($.trim($('#description_ban').summernote('code')) === '') {
                //     $("#description_ban_error").text("Bangla description cannot be empty.").css("display", "block");
                //     flag = 1;
                // }

                if (flag === 1) return false;
                return true;
            },
        });
    }

    if ($("#add-life").length) {
        $.validator.addMethod("validWebp", function (value, element) {
            // Check if the file type is WebP
            return (
                this.optional(element) ||
                (element.files[0] && element.files[0].type === "image/webp")
            );
        });
        $.validator.addMethod(
            "checkFileSize",
            function (value, element, param) {
                // Check if file exists and its size is less than or equal to maxSize
                return (
                    this.optional(element) ||
                    (element.files[0] && element.files[0].size <= 500 * 1024)
                );
            }
        );
        $.validator.addMethod(
            "validImage",
            function (value, element) {
                if (this.optional(element)) {
                    return true;
                }

                const allowedExtensions = ["jpg", "jpeg", "png", "webp", "svg"];
                const fileName = value.toLowerCase();
                const extension = fileName.substring(
                    fileName.lastIndexOf(".") + 1
                );

                return allowedExtensions.includes(extension);
            },
            "Please upload a valid image file (jpg, jpeg, png, webp, svg)."
        );

        $("#add-life").validate({
            rules: {
                title: {
                    required: true,
                },

                thumbnail_image: {
                    required: true,
                    validImage: true, // Custom method to check for valid WebP files
                    checkFileSize: true,
                },
            },
            messages: {
                title: {
                    required: "Enter the media title",
                },

                thumbnail_image: {
                    required: "Select the thumbnail image",
                    validImage: "Please upload a valid image file.",
                    checkFileSize: "Maximum file size is 500KB",
                },
            },
            submitHandler: function (form) {
                var flag = 0;

                // Reset errors
                // $("#description_error").text('').css("display", "none");
                // $("#description_ban_error").text('').css("display", "none");

                // // Validate descriptions
                // if ($.trim($('#description').summernote('code')) === '') {
                //     $("#description_error").text("English description cannot be empty.").css("display", "block");
                //     flag = 1;
                // }
                // if ($.trim($('#description_ban').summernote('code')) === '') {
                //     $("#description_ban_error").text("Bangla description cannot be empty.").css("display", "block");
                //     flag = 1;
                // }

                if (flag === 1) return false;
                return true;
            },
        });
    }
    if ($("#edit_life").length) {
        $.validator.addMethod("validWebp", function (value, element) {
            // Check if the file type is WebP
            return (
                this.optional(element) ||
                (element.files[0] && element.files[0].type === "image/webp")
            );
        });
        $.validator.addMethod(
            "checkFileSize",
            function (value, element, param) {
                // Check if file exists and its size is less than or equal to maxSize
                return (
                    this.optional(element) ||
                    (element.files[0] && element.files[0].size <= 500 * 1024)
                );
            }
        );
        $.validator.addMethod(
            "validImage",
            function (value, element) {
                if (this.optional(element)) {
                    return true;
                }

                const allowedExtensions = ["jpg", "jpeg", "png", "webp", "svg"];
                const fileName = value.toLowerCase();
                const extension = fileName.substring(
                    fileName.lastIndexOf(".") + 1
                );

                return allowedExtensions.includes(extension);
            },
            "Please upload a valid image file (jpg, jpeg, png, webp, svg)."
        );
        $("#edit_life").validate({
            rules: {
                title: {
                    required: true,
                },

                thumbnail_image: {
                    required: false,
                    validImage: true, // Custom method to check for valid WebP files
                    checkFileSize: true,
                },
            },
            messages: {
                title: {
                    required: "Enter the media title",
                },

                thumbnail_image: {
                    required: "Select the thumbnail image",
                    validImage: "Please upload a valid image file.",
                    checkFileSize: "Maximum file size is 500KB",
                },
            },
            submitHandler: function (form) {
                var flag = 0;

                // Reset errors
                // $("#description_error").text('').css("display", "none");
                // $("#description_ban_error").text('').css("display", "none");

                // // Validate descriptions
                // if ($.trim($('#description').summernote('code')) === '') {
                //     $("#description_error").text("English description cannot be empty.").css("display", "block");
                //     flag = 1;
                // }
                // if ($.trim($('#description_ban').summernote('code')) === '') {
                //     $("#description_ban_error").text("Bangla description cannot be empty.").css("display", "block");
                //     flag = 1;
                // }

                if (flag === 1) return false;
                return true;
            },
        });
    }

    if ($("#banner-table").length) {
        table = $("#banner-table").DataTable({
            aLengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            iDisplayLength: 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + "/admin/banner-all",
                type: "GET",
            },
            columns: [
                {
                    data: "id",
                    orderable: false, // Sr. No.
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: "title",
                    name: "title",
                },
                {
                    data: "banner_type",
                    name: "banner_type",
                },
                {
                    data: "image",
                    name: "image",
                    orderable: false,
                    render: function (data, type, row) {
                        if (data) {
                            return `<img src="${baseUrl}${data}" 
     alt="Image"
     style="display:block; margin:0 auto; border-radius:5px; width:100%; height:auto; max-width:350px;">`;
                        } else {
                            return `<span>No Image</span>`;
                        }
                    },
                },
                {
                    data: "mobile_image",
                    name: "mobile_image",
                    orderable: false,
                    render: function (data, type, row) {
                        if (data) {
                            return `<img src="${baseUrl}${data}" 
     alt="Image"
     style="display:block; margin:0 auto; border-radius:5px; width:100%; height:auto; max-width:350px;">`;
                        } else {
                            return `<span>No Image</span>`;
                        }
                    },
                },
                {
                    data: "order",
                    name: "order",
                    orderable: true, // Make order column sortable
                },
                {
                    data: "status",
                    name: "status",
                    render: function (data, type, row) {
                        if (data == 1) {
                            return '<span class="material-symbols-outlined btn-success mx-auto" style="">mode_off_on</span>';
                        } else {
                            return '<span class="material-symbols-outlined btn-danger" style="">mode_off_on</span>';
                        }
                    },
                },
                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        var editLifeUrl =
                            baseUrl + "/admin/banner/edit/" + row.id;
                        return (
                            '<a href="' +
                            editLifeUrl +
                            '" class="btn btn-primary btn-sm mr-1 mb-1">' +
                            '<span class="material-symbols-outlined">edit</span></a>' +
                            '<a href="javascript:void(0)" onclick="deleteBannerRow(' +
                            row.id +
                            ",'" +
                            row.title +
                            "')\" " +
                            'class="btn btn-danger btn-sm"> <span class="material-symbols-outlined">delete</span> </a>'
                        );
                    },
                },
            ],
            // Initial sorting by 'order' column ascending
            order: [[0, "asc"]], // Column index 3 = 'order'
        });
    }

    if ($("#add-banner").length) {
        $.validator.addMethod(
            "checkFileSize",
            function (value, element, param) {
                return (
                    this.optional(element) ||
                    (element.files[0] && element.files[0].size <= 1024 * 1024) // max 1MB
                );
            }
        );

        $.validator.addMethod(
            "validImage",
            function (value, element) {
                if (this.optional(element)) return true;
                const allowedExtensions = ["jpg", "jpeg", "png", "webp", "svg"];
                const extension = value.split(".").pop().toLowerCase();
                return allowedExtensions.includes(extension);
            },
            "Please upload a valid image file (jpg, jpeg, png, webp, svg)."
        );

        $("#add-banner").validate({
            rules: {
                title: { required: true },
                banner_type: { required: true },
                status: { required: true },
                image: {
                    required: true,
                    validImage: true,
                    checkFileSize: true,
                },
                order: { number: true, min: 0 },
            },
            messages: {
                title: { required: "Enter the banner title" },
                banner_type: { required: "Select banner type" },
                status: { required: "Select status" },
                image: {
                    required: "Select the banner image",
                    validImage: "Please select a valid image file",
                    checkFileSize: "Maximum file size is 1MB",
                },
                order: {
                    number: "Enter a valid number",
                    min: "Minimum value is 0",
                },
            },
            submitHandler: function (form) {
                return true;
            },
        });
    }

    // Edit Banner Form
    if ($("#edit-banner").length) {
        $("#edit-banner").validate({
            rules: {
                title: { required: true },
                banner_type: { required: true },
                status: { required: true },
                image: {
                    required: false, // optional on edit
                    validImage: true,
                    checkFileSize: true,
                },
                order: { number: true, min: 0 },
            },
            messages: {
                title: { required: "Enter the banner title" },
                banner_type: { required: "Select banner type" },
                status: { required: "Select status" },
                image: {
                    validImage: "Please select a valid image file",
                    checkFileSize: "Maximum file size is 1MB",
                },
                order: {
                    number: "Enter a valid number",
                    min: "Minimum value is 0",
                },
            },
            submitHandler: function (form) {
                return true;
            },
        });
    }

    if ($("#seo-table").length) {
        table = $("#seo-table").DataTable({
            aLengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            iDisplayLength: 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + "/admin/seo-all",
                type: "GET",
            },
            columns: [
                {
                    data: "id",
                    orderable: false, // Sr. No.
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: "page_name",
                    name: "page_name",
                },
                {
                    data: "page_url",
                    name: "page_url",
                },

                {
                    data: "meta_title",
                    name: "meta_title",
                },

                {
                    data: "meta_description",
                    name: "meta_description",
                },
                {
                    data: "meta_keywords",
                    name: "meta_keywords",
                },

                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        var editLifeUrl = baseUrl + "/admin/seo/edit/" + row.id;
                        return (
                            '<a href="' +
                            editLifeUrl +
                            '" class="btn btn-primary btn-sm mr-1 mb-1">' +
                            '<span class="material-symbols-outlined">edit</span></a>' +
                            '<a href="javascript:void(0)" onclick="deleteSeoRow(' +
                            row.id +
                            ",'" +
                            row.title +
                            "')\" " +
                            'class="btn btn-danger btn-sm"> <span class="material-symbols-outlined">delete</span> </a>'
                        );
                    },
                },
            ],
            // Initial sorting by 'order' column ascending
            order: [[0, "asc"]], // Column index 3 = 'order'
        });
    }

    if ($("#add-seo").length) {
        $("#add-seo").validate({
            rules: {
                page_url: {
                    required: true,
                },
                meta_title: {
                    maxlength: 255,
                },
                meta_description: {
                    maxlength: 500,
                },
                meta_keywords: {
                    maxlength: 255,
                },
            },
            messages: {
                page_url: {
                    required: "Please select a page",
                },
                meta_title: {
                    maxlength: "Meta title cannot exceed 255 characters",
                },
                meta_description: {
                    maxlength: "Meta description cannot exceed 500 characters",
                },
                meta_keywords: {
                    maxlength: "Meta keywords cannot exceed 255 characters",
                },
            },
            submitHandler: function (form) {
                return true;
            },
        });
    }

    if ($("#edit-seo").length) {
        $("#edit-seo").validate({
            rules: {
                page_url: {
                    required: true,
                },
                meta_title: {
                    maxlength: 255,
                },
                meta_description: {
                    maxlength: 500,
                },
                meta_keywords: {
                    maxlength: 255,
                },
            },
            messages: {
                page_url: {
                    required: "Please select a page",
                },
                meta_title: {
                    maxlength: "Meta title cannot exceed 255 characters",
                },
                meta_description: {
                    maxlength: "Meta description cannot exceed 500 characters",
                },
                meta_keywords: {
                    maxlength: "Meta keywords cannot exceed 255 characters",
                },
            },
            submitHandler: function (form) {
                return true;
            },
        });
    }

    //    ===================== Lakesh-Events Starts ==========================

    if ($("#event-table").length) {
        table = $("#event-table").DataTable({
            aLengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            iDisplayLength: 5,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + "/admin/event-all",
                type: "GET",
                data: function (d) {
                    d.page = d.start / d.length + 1;
                    d.perPage = d.length;
                    d.search = d.search.value;

                    const orderColumnIndex = d.order[0].column;
                    d.sort_column = d.columns[orderColumnIndex].data;
                    d.sort_direction = d.order[0].dir;
                },
            },
            columns: [
                {
                    data: "id",
                    orderable: false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: "title",
                    name: "title",
                },
                {
                    data: "short_description",
                    name: "short_description",
                },
                {
                    data: "description",
                    name: "description",
                },
                {
                    data: "video_link",
                    name: "video_link",
                },
                {
                    data: "status",
                    name: "status",
                    render: function (data, type, row) {
                        if (data == "1") {
                            return `<span class="badge badge-success">Published</span>`;
                        } else if (data == "0") {
                            return `<span class="badge badge-danger">Draft</span>`;
                        } else {
                            return `<span class="badge badge-secondary">${data}</span>`;
                        }
                    },
                },
                {
                    data: "thumbnail_image",
                    name: "thumbnail_image",
                    orderable: false,
                    render: function (data, type, row) {
                        const baseUrl =
                            window.location.protocol +
                            "//" +
                            window.location.host;
                        if (data) {
                            return `<img src="${baseUrl}${data}" alt="Image" style="width:50px; height:50px; border-radius:5px;">`;
                        } else {
                            return `<span>No Image</span>`;
                        }
                    },
                },
                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        var editBlogUrl =
                            baseUrl + "/admin/event/edit/" + row.id;
                        return `
                            <a href="${editBlogUrl}" class="btn btn-primary btn-sm mr-1 mb-1">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <a href="javascript:void(0)" onclick="deleteVideoRow(${row.id}, '${row.title}')" class="btn btn-danger btn-sm">
                                <span class="material-symbols-outlined">delete</span>
                            </a>`;
                    },
                },
            ],
            order: [[0, "desc"]],
        });
    }

    if ($("#add-event").length) {
        $.validator.addMethod(
            "validImage",
            function (value, element) {
                if (this.optional(element)) {
                    return true;
                }

                const allowedExtensions = [
                    "jpg",
                    "jpeg",
                    "png",
                    "gif",
                    "webp",
                    "bmp",
                    "svg",
                ];
                const fileName = value.toLowerCase();
                const extension = fileName.substring(
                    fileName.lastIndexOf(".") + 1
                );

                return allowedExtensions.includes(extension);
            },
            "Please upload a valid image file (jpg, jpeg, png, gif, webp, bmp, svg)."
        );

        jQuery.validator.addMethod(
            "noRandomNumbers",
            function (value, element) {
                if (this.optional(element)) return true;

                // Check if there are only digits (no spaces or letters)
                const containsOnlyDigits = /^\d+$/.test(value);
                if (containsOnlyDigits) {
                    return false; // Reject pure numbers like "2232424"
                }

                // Regex to check for standalone numbers (but allow things like "Top 10" or "Best 5 Tips")
                const hasStandaloneNumbers = /\b\d+\b/.test(value);

                // Allow numbers if they are part of a word or in valid contexts like years or common numeric phrases
                return (
                    !hasStandaloneNumbers ||
                    /\d{4}/.test(value) ||
                    /\b\d{1,2}\b/.test(value)
                );
            },
            "Title should not contain random numbers or sequences."
        );

        $.validator.addMethod(
            "checkFileSize",
            function (value, element, param) {
                // Check if file exists and its size is less than or equal to maxSize
                return (
                    this.optional(element) ||
                    (element.files[0] && element.files[0].size <= 500 * 1024)
                );
            }
        );

        jQuery.validator.addMethod(
            "maxLimit",
            function (value, element) {
                if (this.optional(element)) return true;
                return value.length <= 250;
            },
            "Please enter no more than 250 characters."
        );

        $("#add-event").validate({
            rules: {
                title: {
                    required: true,
                    noRandomNumbers: true,
                },
                short_description: {
                    required: true,
                },
                description: {
                    required: true,
                },
                thumbnail_image: {
                    required: true,
                    validImage: true,
                    checkFileSize: true,
                },
                video_link: {
                    required: false,
                    url: true, // Ensures it's a valid URL
                    maxLimit: true,
                },
                status: {
                    required: true,
                },
            },
            messages: {
                title: {
                    required: "Enter the event title",
                },
                short_description: {
                    required: "Enter a short description",
                },
                description: {
                    required: "Enter a description",
                },
                thumbnail_image: {
                    required: "Select the thumbnail image",
                    validImage: "Please upload a valid image file.",
                    checkFileSize: "Maximum file size is 500KB",
                },
                video_link: {
                    url: "Enter a valid URL",
                },
                status: {
                    required: "Select event status",
                },
            },
            highlight: function (element) {
                const errorId = $(element).attr("name") + "-error";
                $("#" + errorId).addClass("show-error");
            },
            unhighlight: function (element) {
                const errorId = $(element).attr("name") + "-error";
                $("#" + errorId).removeClass("show-error");
            },
            errorPlacement: function (error, element) {
                const errorId = element.attr("name") + "-error";
                if ($("#" + errorId).length) {
                    $("#" + errorId)
                        .html(error.text())
                        .addClass("show-error");
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                var flag = 0;

                // Uncomment below if Summernote validation is needed
                // if ($.trim($('#description').summernote('code')) === '' || $.trim($('#description').summernote('code')) === '<p><br></p>') {
                //     $("#description-error").text("English description cannot be empty.").addClass("show-error");
                //     flag = 1;
                // }

                if (flag === 1) return false;
                return true;
            },
        });
    }
    if ($("#edit_event").length) {
        $.validator.addMethod(
            "validImage",
            function (value, element) {
                if (this.optional(element)) {
                    return true;
                }

                const allowedExtensions = [
                    "jpg",
                    "jpeg",
                    "png",
                    "gif",
                    "webp",
                    "bmp",
                    "svg",
                ];
                const fileName = value.toLowerCase();
                const extension = fileName.substring(
                    fileName.lastIndexOf(".") + 1
                );

                return allowedExtensions.includes(extension);
            },
            "Please upload a valid image file (jpg, jpeg, png, gif, webp, bmp, svg)."
        );
        $.validator.addMethod(
            "checkFileSize",
            function (value, element, param) {
                // Check if file exists and its size is less than or equal to maxSize
                return (
                    this.optional(element) ||
                    (element.files[0] && element.files[0].size <= 500 * 1024)
                );
            }
        );
        jQuery.validator.addMethod(
            "maxLimit",
            function (value, element) {
                if (this.optional(element)) return true;
                return value.length <= 250;
            },
            "Please enter no more than 250 characters."
        );
        $("#edit_event").validate({
            rules: {
                title: {
                    required: true,
                },
                short_description: {
                    required: true,
                },
                description: {
                    required: true,
                },
                thumbnail_image: {
                    required: false,
                    validImage: true, // Custom method to check for valid WebP files
                    checkFileSize: true,
                },
                video_link: {
                    required: false,
                    url: true, // Ensures it's a valid URL
                    maxLimit: true,
                },
                status: {
                    required: true,
                },
            },
            messages: {
                title: {
                    required: "Enter the event title",
                },
                short_description: {
                    required: "Enter a short description",
                },
                description: {
                    required: "Enter a description",
                },
                thumbnail_image: {
                    required: "Select the thumbnail image",
                    validImage: "Please upload a valid image file.",
                    checkFileSize: "Maximum file size is 500KB",
                },
                video_link: {
                    required: "Enter the event link",
                    url: "Enter a valid URL",
                },
                status: {
                    required: "Select the status",
                },
            },
            submitHandler: function (form) {
                var flag = 0;

                // Reset errors
                // $("#description_error").text('').css("display", "none");
                // $("#description_ban_error").text('').css("display", "none");

                // // Validate descriptions
                // if ($.trim($('#description').summernote('code')) === '') {
                //     $("#description_error").text("English description cannot be empty.").css("display", "block");
                //     flag = 1;
                // }
                // if ($.trim($('#description_ban').summernote('code')) === '') {
                //     $("#description_ban_error").text("Bangla description cannot be empty.").css("display", "block");
                //     flag = 1;
                // }

                if (flag === 1) return false;
                return true;
            },
        });
    }

    // ========================= Lakesh-Events Ends===================================

    //    ===================== Lakesh-News and Blogs Starts ==========================

    if ($("#newsandblog-table").length) {
        table = $("#newsandblog-table").DataTable({
            aLengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            iDisplayLength: 5,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + "/admin/newsandblog-all", // Your controller endpoint
                type: "GET",
                // data: function (d) {
                //     // Add additional parameters to the request, such as sorting, search, etc.
                //     d.page = (d.start / d.length) + 1;  // Page number (DataTable uses start/length)
                //     d.perPage = d.length;  // Number of records per page
                //     d.search = d.search.value;  // Search value
                //     d.sort_column = d.order[0].column;  // Sort column
                //     d.sort_direction = d.order[0].dir;  // Sort direction (asc/desc)
                // }
                data: function (d) {
                    d.page = d.start / d.length + 1;
                    d.perPage = d.length;
                    d.search = d.search.value;

                    const orderColumnIndex = d.order[0].column;
                    d.sort_column = d.columns[orderColumnIndex].data; // Use column `data` key
                    d.sort_direction = d.order[0].dir;
                },
            },
            columns: [
                {
                    data: "id",
                    orderable: false, // Disable sorting for the Sr. No. column
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: "title",
                    name: "title",
                },
                {
                    data: "short_description",
                    name: "short_description",
                },
                {
                    data: "description",
                    name: "description",
                },
                {
                    data: "published_date",
                    name: "published_date",
                    render: function (data, type, row) {
                        if (!data) return "";
                        const dateObj = new Date(data);
                        const options = {
                            day: "numeric",
                            month: "long",
                            year: "numeric",
                            hour: "2-digit",
                            minute: "2-digit",
                            timeZone: "Asia/Kolkata",
                            timeZoneName: "short",
                        };
                        return dateObj
                            .toLocaleString("en-IN", options)
                            .replace("GMT+5:30", "IST");
                    },
                },
                {
                    data: "share_link",
                    name: "share_link",
                },
                {
                    data: "thumbnail_image",
                    name: "thumbnail_image",
                    orderable: false,
                    render: function (data, type, row) {
                        const baseUrl =
                            window.location.protocol +
                            "//" +
                            window.location.host;
                        if (data) {
                            return `<img src="${baseUrl}${data}" alt="Image" style="width:50px; height:50px; border-radius:5px;">`;
                        } else {
                            return `<span>No Image</span>`;
                        }
                    },
                },
                {
                    data: "status",
                    name: "status",
                    render: function (data, type, row) {
                        if (data === "active") {
                            return `<span class="badge badge-success">Published</span>`;
                        } else if (data === "inactive") {
                            return `<span class="badge badge-danger">Draft</span>`;
                        } else {
                            return `<span class="badge badge-secondary">${data}</span>`;
                        }
                    },
                },
                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        var viewBlogUrl = baseUrl + "/newsandblog/" + row.slug;
                        var editBlogUrl =
                            baseUrl + "/admin/newsandblog/edit/" + row.id;
                        var buttonsHtml =
                            '<a href="' +
                            editBlogUrl +
                            '" class="btn btn-primary btn-sm mr-1 mb-1"><span class="material-symbols-outlined">edit</span></a>' +
                            '<a href="javascript:void(0)" onclick="deleteNewsRow(' +
                            row.id +
                            ",'" +
                            row.title +
                            '\')" class="btn btn-danger btn-sm"> <span class="material-symbols-outlined">delete</span> </a>';

                        return buttonsHtml;
                    },
                },
            ],
            order: [[0, "desc"]], // Initial sorting by ID column in descending order
        });
    }

    if ($("#add-newsandblog").length) {
        $.validator.addMethod(
            "validImage",
            function (value, element) {
                if (this.optional(element)) {
                    return true;
                }

                const allowedExtensions = [
                    "jpg",
                    "jpeg",
                    "png",
                    "gif",
                    "webp",
                    "bmp",
                    "svg",
                ];
                const fileName = value.toLowerCase();
                const extension = fileName.substring(
                    fileName.lastIndexOf(".") + 1
                );

                return allowedExtensions.includes(extension);
            },
            "Please upload a valid image file (jpg, jpeg, png, gif, webp, bmp, svg)."
        );
        $.validator.addMethod(
            "checkFileSize",
            function (value, element, param) {
                // Check if file exists and its size is less than or equal to maxSize
                return (
                    this.optional(element) ||
                    (element.files[0] && element.files[0].size <= 500 * 1024)
                );
            }
        );
        // Validation for add-newsandblog form with showerror class support

        // jQuery.validator.addMethod("noNumbers", function (value, element) {
        //     return this.optional(element) || /^[^0-9]*$/.test(value);
        // }, "Title should not contain numbers");

        jQuery.validator.addMethod(
            "noRandomNumbers",
            function (value, element) {
                if (this.optional(element)) return true;

                // Check if there are only digits (no spaces or letters)
                const containsOnlyDigits = /^\d+$/.test(value);
                if (containsOnlyDigits) {
                    return false; // Reject pure numbers like "2232424"
                }

                // Regex to check for standalone numbers (but allow things like "Top 10" or "Best 5 Tips")
                const hasStandaloneNumbers = /\b\d+\b/.test(value);

                // Allow numbers if they are part of a word or in valid contexts like years or common numeric phrases
                return (
                    !hasStandaloneNumbers ||
                    /\d{4}/.test(value) ||
                    /\b\d{1,2}\b/.test(value)
                );
            },
            "Title should not contain random numbers or sequences."
        );

        jQuery.validator.addMethod(
            "maxLimit",
            function (value, element) {
                if (this.optional(element)) return true;
                return value.length <= 250;
            },
            "Please enter no more than 250 characters."
        );

        $("#add-newsandblog").validate({
            rules: {
                title: {
                    required: true,
                    noRandomNumbers: true,
                },
                short_description: {
                    required: true,
                },
                description: {
                    required: true,
                },
                thumbnail_image: {
                    required: true,
                    validImage: true,
                    checkFileSize: true,
                },
                published_date: {
                    required: true,
                    date: true,
                },
                share_link: {
                    required: false,
                    url: true,
                    maxLimit: true,
                },
            },
            messages: {
                title: {
                    required: "Enter the News and Blogs title",
                },
                short_description: {
                    required: "Enter a short description",
                },
                description: {
                    required: "Enter a  description",
                },
                thumbnail_image: {
                    required: "Select the thumbnail image",
                    validImage: "Please upload a valid image file.",
                    checkFileSize: "Maximum file size is 500KB",
                },
                published_date: {
                    required: "Enter the Published Date and time",
                    date: "Enter a valid Date and Time",
                },
                share_link: {
                    required: "Enter the social link",
                    url: "Please enter a valid URL",
                },
            },
            highlight: function (element) {
                const errorId = $(element).attr("name") + "-error";
                $("#" + errorId).addClass("show-error");
            },
            unhighlight: function (element) {
                const errorId = $(element).attr("name") + "-error";
                $("#" + errorId).removeClass("show-error");
            },
            errorPlacement: function (error, element) {
                const errorId = element.attr("name") + "-error";
                if ($("#" + errorId).length) {
                    $("#" + errorId)
                        .html(error.text())
                        .addClass("show-error");
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                var flag = 0;

                // Uncomment below if Summernote validation is needed
                // if ($.trim($('#description').summernote('code')) === '' || $.trim($('#description').summernote('code')) === '<p><br></p>') {
                //     $("#description-error").text("English description cannot be empty.").addClass("showerror");
                //     flag = 1;
                // }

                if (flag === 1) return false;
                return true;
            },
        });
    }
    if ($("#edit_newsandblog").length) {
        $.validator.addMethod(
            "validImage",
            function (value, element) {
                if (this.optional(element)) {
                    return true;
                }

                const allowedExtensions = [
                    "jpg",
                    "jpeg",
                    "png",
                    "gif",
                    "webp",
                    "bmp",
                    "svg",
                ];
                const fileName = value.toLowerCase();
                const extension = fileName.substring(
                    fileName.lastIndexOf(".") + 1
                );

                return allowedExtensions.includes(extension);
            },
            "Please upload a valid image file (jpg, jpeg, png, gif, webp, bmp, svg)."
        );
        $.validator.addMethod(
            "checkFileSize",
            function (value, element, param) {
                // Check if file exists and its size is less than or equal to maxSize
                return (
                    this.optional(element) ||
                    (element.files[0] && element.files[0].size <= 500 * 1024)
                );
            }
        );

        jQuery.validator.addMethod(
            "maxLimit",
            function (value, element) {
                if (this.optional(element)) return true;
                return value.length <= 250;
            },
            "Please enter no more than 250 characters."
        );
        $("#edit_newsandblog").validate({
            rules: {
                title: {
                    required: true,
                },
                short_description: {
                    required: true,
                },
                description: {
                    required: true,
                },
                thumbnail_image: {
                    required: false,
                    validImage: true, // Custom method to check for valid WebP files
                    checkFileSize: true,
                },
                published_date: {
                    required: true,
                    date: true, // Ensures it's a valid Date
                },
                share_link: {
                    required: false,
                    url: true, // Ensures it's a valid URL
                    maxLimit: true,
                },
            },
            messages: {
                title: {
                    required: "Enter the News and Blogs title",
                },
                short_description: {
                    required: "Enter a short description",
                },
                description: {
                    required: "Enter a description",
                },
                thumbnail_image: {
                    required: "Select the thumbnail image",
                    validImage: "Please upload a valid image file.",
                    checkFileSize: "Maximum file size is 500KB",
                },
                published_date: {
                    required: "Enter the Published Date",
                    date: "Enter a valid Date",
                },
                share_link: {
                    required: "Enter the share link",
                    url: "enter valid url", // Ensures it's a valid URL
                },
            },
            submitHandler: function (form) {
                var flag = 0;

                // Reset errors
                // $("#description_error").text('').css("display", "none");
                // $("#description_ban_error").text('').css("display", "none");

                // // Validate descriptions
                // if ($.trim($('#description').summernote('code')) === '') {
                //     $("#description_error").text("English description cannot be empty.").css("display", "block");
                //     flag = 1;
                // }
                // if ($.trim($('#description_ban').summernote('code')) === '') {
                //     $("#description_ban_error").text("Bangla description cannot be empty.").css("display", "block");
                //     flag = 1;
                // }

                if (flag === 1) return false;
                return true;
            },
        });
    }

    // ========================= Lakesh-News ans Blogs Ends===================================

    //    ===================== Lakesh-Publications Starts ==========================

    if ($("#publication-table").length) {
        table = $("#publication-table").DataTable({
            aLengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            iDisplayLength: 5,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + "/admin/publication-all", // Your controller endpoint
                type: "GET",
                // data: function (d) {
                //     // Add additional parameters to the request, such as sorting, search, etc.
                //     d.page = (d.start / d.length) + 1;  // Page number (DataTable uses start/length)
                //     d.perPage = d.length;  // Number of records per page
                //     d.search = d.search.value;  // Search value
                //     d.sort_column = d.order[0].column;  // Sort column
                //     d.sort_direction = d.order[0].dir;  // Sort direction (asc/desc)
                // }
                data: function (d) {
                    d.page = d.start / d.length + 1;
                    d.perPage = d.length;
                    d.search = d.search.value;

                    const orderColumnIndex = d.order[0].column;
                    d.sort_column = d.columns[orderColumnIndex].data; // Use column `data` key
                    d.sort_direction = d.order[0].dir;
                },
            },
            columns: [
                {
                    data: "id",
                    orderable: false, // Disable sorting for the Sr. No. column
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: "title",
                    name: "title",
                },
                {
                    data: "short_description",
                    name: "short_description",
                },
                {
                    data: "tags",
                    name: "tags",
                    orderable: false,
                    render: function (tags, type, row) {
                        if (!Array.isArray(tags) || tags.length === 0)
                            return "<span>No Tags</span>";
                        return tags.map((tag) => tag.name).join(", ");
                    },
                },
                {
                    data: "share_link",
                    name: "share_link",
                },
                {
                    data: "thumbnail_image",
                    name: "thumbnail_image",
                    orderable: false,
                    render: function (data, type, row) {
                        const baseUrl =
                            window.location.protocol +
                            "//" +
                            window.location.host;
                        if (data) {
                            return `<img src="${baseUrl}${data}" alt="Image" style="width:50px; height:50px; border-radius:5px;">`;
                        } else {
                            return `<span>No Image</span>`;
                        }
                    },
                },
                {
                    data: "banner_image",
                    name: "banner_image",
                    orderable: false,
                    render: function (data, type, row) {
                        const baseUrl =
                            window.location.protocol +
                            "//" +
                            window.location.host;
                        if (data) {
                            return `<img src="${baseUrl}${data}" alt="Image" style="width:50px; height:50px; border-radius:5px;">`;
                        } else {
                            return `<span>No Image</span>`;
                        }
                    },
                },
                {
                    data: "vertical_image",
                    name: "vertical_image",
                    orderable: false,
                    render: function (data, type, row) {
                        const baseUrl =
                            window.location.protocol +
                            "//" +
                            window.location.host;
                        if (data) {
                            return `<img src="${baseUrl}${data}" alt="Image" style="width:50px; height:50px; border-radius:5px;">`;
                        } else {
                            return `<span>No Image</span>`;
                        }
                    },
                },
                {
                    data: "report_pdf",
                    name: "report_pdf",
                    orderable: false,
                    render: function (data, type, row) {
                        const baseUrl =
                            window.location.protocol +
                            "//" +
                            window.location.host;
                        if (data) {
                            return `<a href="${baseUrl}${data}" target="_blank" class="pdf-link">View PDF</a>`;
                        } else {
                            return `<span>No PDF</span>`;
                        }
                    },
                },
                {
                    data: "status",
                    name: "status",
                    render: function (data, type, row) {
                        if (data === "active") {
                            return `<span class="badge badge-success">Published</span>`;
                        } else if (data === "inactive") {
                            return `<span class="badge badge-danger">Draft</span>`;
                        } else {
                            return `<span class="badge badge-secondary">${data}</span>`;
                        }
                    },
                },
                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        var viewBlogUrl = baseUrl + "/publication/" + row.slug;
                        var editBlogUrl =
                            baseUrl + "/admin/publication/edit/" + row.id;
                        var buttonsHtml =
                            '<a href="' +
                            editBlogUrl +
                            '" class="btn btn-primary btn-sm mr-1 mb-1"><span class="material-symbols-outlined">edit</span></a>' +
                            '<a href="javascript:void(0)" onclick="deletePublicationRow(' +
                            row.id +
                            ",'" +
                            row.title +
                            '\')" class="btn btn-danger btn-sm"> <span class="material-symbols-outlined">delete</span> </a>';

                        return buttonsHtml;
                    },
                },
            ],
            order: [[0, "desc"]], // Initial sorting by ID column in descending order
        });
    }

    if ($("#add-publications").length) {
        $("#report_pdf").on("change", function () {
            $("#add-publications").validate().element($(this));
        });
        $("#tags").select2({
            placeholder: "Select or add cities",
            tags: true, // allows creating new tags
            tokenSeparators: [","],
        });

        $.validator.addMethod(
            "validImage",
            function (value, element) {
                // Allow optional input fields (no file selected)
                if (this.optional(element)) {
                    return true;
                }

                const allowedExtensions = [
                    "jpg",
                    "jpeg",
                    "png",
                    "gif",
                    "webp",
                    "bmp",
                    "svg",
                ];

                // If the input element is a file input, get the file object directly
                const file = element.files[0];

                if (file) {
                    const fileName = file.name.toLowerCase();
                    const extension = fileName.substring(
                        fileName.lastIndexOf(".") + 1
                    );
                    console.log("File extension: " + extension);
                    console.log("Allowed extensions: " + allowedExtensions);

                    // Check if the extension is in the allowed list
                    return allowedExtensions.includes(extension);
                }

                // If no file is selected or the extension is invalid
                return false;
            },
            "Please upload a valid image file (jpg, jpeg, png, gif, webp, bmp, svg)."
        );

        $.validator.addMethod(
            "checkFileSize",
            function (value, element, param) {
                // Check if file exists and its size is less than or equal to maxSize
                return (
                    this.optional(element) ||
                    (element.files[0] && element.files[0].size <= 500 * 1024)
                );
            }
        );

        jQuery.validator.addMethod(
            "noNumbers",
            function (value, element) {
                return this.optional(element) || /^[^0-9]*$/.test(value);
            },
            "Title should not contain numbers"
        );

        jQuery.validator.addMethod(
            "maxLimit",
            function (value, element) {
                if (this.optional(element)) return true;
                return value.length <= 250;
            },
            "Please enter no more than 250 characters."
        );

        $.validator.addMethod(
            "acceptPdf",
            function (value, element, param) {
                console.log(
                    "accept method called with value: " +
                        value +
                        " and param: " +
                        param
                );
                // If no file selected, skip validation
                if (!value) return true;

                // Get file extension from the file name
                const extension = value.split(".").pop().toLowerCase();
                const allowedExtensions = param.split("|");

                return allowedExtensions.includes(extension);
            },
            $.validator.format(
                "Please upload a file with a valid extension: {0}"
            )
        );

        $.validator.addMethod(
            "maxFileSize",
            function (value, element, param) {
                if (element.files.length === 0) {
                    console.log("No file selected");
                    return true;
                }

                const fileSizeBytes = element.files[0].size;
                const fileSizeMB = (fileSizeBytes / (1024 * 1024)).toFixed(2);
                const fileSizeKB = (fileSizeBytes / 1024).toFixed(2);

                console.log(
                    `Validating file size: ${fileSizeBytes} bytes, ${fileSizeKB} KB, ${fileSizeMB} MB`
                );
                console.log(`Maximum allowed: ${param} MB`);

                return fileSizeBytes <= param * 1024 * 1024;
            },
            "File size must not exceed {0} MB."
        );
        $("#add-publications").validate({
            rules: {
                title: {
                    required: true,
                    noNumbers: true,
                },
                short_description: {
                    required: true,
                },
                description: {
                    required: true,
                },
                thumbnail_image: {
                    required: true,
                    validImage: true,
                    checkFileSize: true,
                },
                banner_image: {
                    required: true,
                    validImage: true,
                    checkFileSize: true,
                },
                mb_banner_image: {
                    required: true,
                    validImage: true,
                    checkFileSize: true,
                },
                vertical_image: {
                    required: true,
                    validImage: true,
                    checkFileSize: true,
                },
                report_pdf: {
                    required: true,
                    acceptPdf: "pdf", // Allow only PDF
                    maxFileSize: 2, // Limit size to 2MB
                },
                tags: {
                    required: true,
                },
                share_link: {
                    required: false,
                    url: true,
                    maxLimit: true,
                },
                "report_title[0]": {
                    required: true,
                },
                "report_image[0]": {
                    required: true,
                },
                "report_list[0][]": {
                    required: true,
                },
                "highlight_icon[0]": {
                    required: true,
                    // extension: "png|jpg|jpeg|webp|svg"
                    validImage: true,
                    checkFileSize: true,
                },
                "highlight_description[0]": {
                    required: true,
                },
            },
            messages: {
                title: {
                    required: "Enter the News and Blogs title",
                },
                short_description: {
                    required: "Enter a short description",
                },
                description: {
                    required: "Enter a description",
                },
                thumbnail_image: {
                    required: "Select the thumbnail image",
                    validImage: "Please upload a valid image file.",
                    checkFileSize: "Maximum file size is 500KB",
                },
                banner_image: {
                    required: "Select the Banner image",
                    validImage: "Please upload a valid image file.",
                    checkFileSize: "Maximum file size is 500KB",
                },
                mb_banner_image: {
                    required: "Select the Mobile Banner image",
                    validImage: "Please upload a valid image file.",
                    checkFileSize: "Maximum file size is 500KB",
                },
                vertical_image: {
                    required: "Select the Vertical image",
                    validImage: "Please upload a valid image file.",
                    checkFileSize: "Maximum file size is 500KB",
                },
                report_pdf: {
                    required: "Please upload a PDF file",
                    accept: "Please upload a valid PDF file.",
                    maxFileSize: "The file size must not exceed 2 MB.",
                },
                tags: {
                    required: "Enter the Tags",
                },
                share_link: {
                    required: "Enter the share link",
                    url: "Please enter a valid URL",
                },
                "report_title[0]": {
                    required:
                        "Please enter at least one title for Report List 1.",
                },
                "report_image[0]": {
                    required:
                        "Please enter at least one image for Report List 1.",
                },
                "report_list[0][]": {
                    required:
                        "Please enter at least one list for Report List 1.",
                },
                "highlight_icon[0]": {
                    required: "Select the Key Highlights Icon image",
                    validImage: "Please upload a valid image file.",
                    checkFileSize: "Maximum file size is 500KB",
                },
                "highlight_description[0]": {
                    required: "Please enter a description for Highlight 1.",
                },
            },
            // errorPlacement: function (error, element) {
            //         const name = element.attr("name");
            //         const elementId = element.attr("id"); // Get the actual element ID

            //         console.log('Input name:', name);
            //         console.log('Element ID:', elementId);

            //         let errorId = '';

            //         // If element has an ID, use that as base for error ID
            //         if (elementId) {
            //             errorId = elementId + '-error';
            //         } else {
            //             // Fallback to name-based ID generation
            //             if (name.includes('[]')) {
            //                 // Handle empty array notation like report_list[]
            //                 errorId = name.replace('[]', '') + '-error';
            //             } else if (name.includes('[') && name.includes(']')) {
            //                 // Handle indexed arrays like report_image[0]
            //                 errorId = name.replace(/\[/g, '_').replace(/\]/g, '') + '-error';
            //             } else {
            //                 // Simple names like vertical_image
            //                 errorId = name + '-error';
            //             }
            //         }

            //         console.log('Looking for error ID:', errorId);

            //         // Find the error container
            //         const errorContainer = $("#" + errorId);

            //         console.log('Found containers:', errorContainer.length);

            //         if (errorContainer.length > 0) {
            //             console.log('Using existing span:', errorId);

            //             // Clear previous errors and set new one
            //             errorContainer.text('').removeClass("hide-error show-error showerror");
            //             errorContainer.text(error.text()).addClass("show-error showerror");
            //         } else {
            //             console.log('Span not found, using fallback for:', name);

            //             // Try to find any error span near this element
            //             const nearbyErrorSpan = element.siblings('.error').first();
            //             if (nearbyErrorSpan.length > 0) {
            //                 console.log('Found nearby error span');
            //                 nearbyErrorSpan.text('').removeClass("hide-error show-error showerror");
            //                 nearbyErrorSpan.text(error.text()).addClass("show-error showerror");
            //             } else {
            //                 // Final fallback: insert after element
            //                 error.insertAfter(element);
            //             }
            //         }
            //     },
            errorPlacement: function (error, element) {
                // Check if the element has a specific ID or use its name attribute
                const elementId = element.attr("id");
                const errorId = elementId
                    ? elementId + "-error"
                    : element.attr("name") + "-error";

                // Find the error container based on the generated errorId
                const errorContainer = $("#" + errorId);

                // If the error container exists, display the error message inside it
                if (errorContainer.length > 0) {
                    errorContainer.text(error.text()).addClass("show-error");
                } else {
                    // If no error container exists, insert the error after the element
                    error.insertAfter(element);
                }
            },

            highlight: function (element) {
                const name = $(element).attr("name");

                // Escape '[]' brackets here as well
                const errorContainer = $(
                    "#" + name.replace(/\[\]/g, "\\[\\]") + "-error"
                );
                errorContainer.addClass("showerror");
            },
            unhighlight: function (element) {
                const name = $(element).attr("name");
                const elementId = $(element).attr("id");

                let errorId = "";

                if (elementId) {
                    errorId = elementId + "-error";
                } else if (name.includes("[]")) {
                    errorId = name.replace("[]", "") + "-error";
                } else if (name.includes("[") && name.includes("]")) {
                    errorId =
                        name.replace(/\[/g, "_").replace(/\]/g, "") + "-error";
                } else {
                    errorId = name + "-error";
                }

                const errorContainer = $("#" + errorId);

                if (errorContainer.length > 0) {
                    errorContainer
                        .text("")
                        .removeClass("show-error showerror")
                        .addClass("hide-error");
                } else {
                    $(element)
                        .siblings(".error")
                        .text("")
                        .removeClass("show-error showerror")
                        .addClass("hide-error");
                }
            },
            submitHandler: function (form) {
                var flag = 0;

                // Clear all previous error messages and reset visibility
                [
                    "title",
                    "short_description",
                    "description",
                    "thumbnail_image",
                    "tags",
                    "share_link",
                    "report_list[0][]",
                    "highlight_icon[0]",
                    "highlight_description-error-0",
                ].forEach(function (field) {
                    const errorContainer = `#${field}-error`;
                    $(errorContainer)
                        .text("")
                        .removeClass("show-error showerror")
                        .addClass("hide-error");
                });

                // Check Summernote content specifically for #description
                let summernoteVal = $.trim(
                    $("#description").summernote("code")
                );
                if (summernoteVal === "" || summernoteVal === "<p><br></p>") {
                    $("#description-error")
                        .text("English description cannot be empty.")
                        .removeClass("hide-error")
                        .addClass("show-error showerror");
                    flag = 1;
                }

                // Validate dynamic report list fields
                for (let i = 0; i < 3; i++) {
                    let reportListInput = $(
                        `input[name="report_list[${i}][]"]`
                    );
                    let reportListValue = $.trim(reportListInput.val());

                    if (!reportListValue) {
                        $(`#report_list[${i}][]-error`)
                            .text(
                                `Please enter at least one item for Report List ${
                                    i + 1
                                }.`
                            )
                            .removeClass("hide-error")
                            .addClass("show-error showerror");
                        flag = 1;
                    } else {
                        $(`#report_list[${i}][]-error`)
                            .text("")
                            .removeClass("show-error showerror")
                            .addClass("hide-error");
                    }
                }

                // Validate Highlight Description fields
                for (let i = 0; i < 3; i++) {
                    let highlightDescription = $(`#highlight_description_${i}`);
                    let highlightDescriptionVal = $.trim(
                        highlightDescription.val()
                    );

                    if (highlightDescriptionVal === "") {
                        $(`#highlight_description_${i}-error`)
                            .text(
                                `Please provide a description for Highlight ${
                                    i + 1
                                }.`
                            )
                            .removeClass("hide-error")
                            .addClass("show-error showerror");
                        flag = 1;
                    } else {
                        $(`#highlight_description_${i}-error`)
                            .text("")
                            .removeClass("show-error showerror")
                            .addClass("hide-error");
                    }
                }

                // If validation passes, submit the form
                if (flag === 0) {
                    form.submit();
                } else {
                    return false;
                }
            },
        });
    }
    if ($("#edit_publication").length) {
        $("#report_pdf").on("change", function () {
            $("#edit_publication").validate().element($(this));
        });

        $("#tags").select2({
            placeholder: "Select or add cities",
            tags: true, // allows creating new tags
            tokenSeparators: [","],
        });

        $.validator.addMethod(
            "validImage",
            function (value, element) {
                if (this.optional(element)) {
                    return true;
                }

                const allowedExtensions = [
                    "jpg",
                    "jpeg",
                    "png",
                    "gif",
                    "webp",
                    "bmp",
                    "svg",
                ];
                const fileName = value.toLowerCase();
                const extension = fileName.substring(
                    fileName.lastIndexOf(".") + 1
                );

                return allowedExtensions.includes(extension);
            },
            "Please upload a valid image file (jpg, jpeg, png, gif, webp, bmp, svg)."
        );
        $.validator.addMethod(
            "checkFileSize",
            function (value, element, param) {
                // Check if file exists and its size is less than or equal to maxSize
                return (
                    this.optional(element) ||
                    (element.files[0] && element.files[0].size <= 500 * 1024)
                );
            }
        );
        jQuery.validator.addMethod(
            "maxLimit",
            function (value, element) {
                if (this.optional(element)) return true;
                return value.length <= 250;
            },
            "Please enter no more than 250 characters."
        );

        $.validator.addMethod(
            "acceptPdf",
            function (value, element, param) {
                console.log(
                    "accept method called with value: " +
                        value +
                        " and param: " +
                        param
                );
                // If no file selected, skip validation
                if (!value) return true;

                // Get file extension from the file name
                const extension = value.split(".").pop().toLowerCase();
                const allowedExtensions = param.split("|");

                return allowedExtensions.includes(extension);
            },
            $.validator.format(
                "Please upload a file with a valid extension: {0}"
            )
        );

        $.validator.addMethod(
            "maxFileSize",
            function (value, element, param) {
                if (element.files.length === 0) {
                    console.log("No file selected");
                    return true;
                }

                const fileSizeBytes = element.files[0].size;
                const fileSizeMB = (fileSizeBytes / (1024 * 1024)).toFixed(2);
                const fileSizeKB = (fileSizeBytes / 1024).toFixed(2);

                console.log(
                    `Validating file size: ${fileSizeBytes} bytes, ${fileSizeKB} KB, ${fileSizeMB} MB`
                );
                console.log(`Maximum allowed: ${param} MB`);

                return fileSizeBytes <= param * 1024 * 1024;
            },
            "File size must not exceed {0} MB."
        );

        $("#edit_publication").validate({
            rules: {
                title: {
                    required: true,
                },
                short_description: {
                    required: true,
                },
                description: {
                    required: true,
                },
                thumbnail_image: {
                    required: false,
                    validImage: true, // Custom method to check for valid WebP files
                    checkFileSize: true,
                },
                report_pdf: {
                    required: false,
                    acceptPdf: "pdf", // Allow only PDF
                    maxFileSize: 2, // Limit size to 2MB
                },
                tags: {
                    required: true,
                },
                share_link: {
                    required: false,
                    url: true, // Ensures it's a valid URL
                    maxLimit: true,
                },
            },
            messages: {
                title: {
                    required: "Enter the Publications title",
                },
                short_description: {
                    required: "Enter a short description",
                },
                description: {
                    required: "Enter a description",
                },
                thumbnail_image: {
                    required: "Select the thumbnail image",
                    validImage: "Please upload a valid image file.",
                    checkFileSize: "Maximum file size is 500KB",
                },
                report_pdf: {
                    accept: "Please upload a valid PDF file.",
                    maxFileSize: "The file size must not exceed 2 MB.",
                },
                tags: {
                    required: "Enter the Tags",
                },
                share_link: {
                    required: "Enter the share link",
                    url: "enter valid url", // Ensures it's a valid URL
                },
            },
            // errorPlacement: function (error, element) {
            //     if (element.attr("name") === "report_pdf") {
            //         // Put error inside custom div
            //         error.appendTo("#report_pdf_error_container");
            //     } else {
            //         error.insertAfter(element);
            //     }
            // },
            // highlight: function (element) {
            //     $(element).addClass('error');
            // },
            // unhighlight: function (element) {
            //     $(element).removeClass('error');
            // },
            submitHandler: function (form) {
                var flag = 0;

                // Reset errors
                // $("#description_error").text('').css("display", "none");
                // $("#description_ban_error").text('').css("display", "none");

                // // Validate descriptions
                // if ($.trim($('#description').summernote('code')) === '') {
                //     $("#description_error").text("English description cannot be empty.").css("display", "block");
                //     flag = 1;
                // }
                // if ($.trim($('#description_ban').summernote('code')) === '') {
                //     $("#description_ban_error").text("Bangla description cannot be empty.").css("display", "block");
                //     flag = 1;
                // }

                if (flag === 1) return false;
                return true;
            },
        });
    }

    // ========================= Lakesh-Publications Ends===================================

    //    ===================== Lakesh-News and Blogs Cties Starts ==========================

    if ($("#cities-table").length) {
        table = $("#cities-table").DataTable({
            aLengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            iDisplayLength: 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + "/admin/event/cities/cities-all", // Update with your actual controller endpoint
                type: "GET",
                data: function (d) {
                    d.page = d.start / d.length + 1;
                    d.perPage = d.length;
                    d.search = d.search.value;
                    const orderColumnIndex = d.order[0].column;
                    d.sort_column = d.columns[orderColumnIndex].data; // Sort column name
                    d.sort_direction = d.order[0].dir;
                },
            },
            columns: [
                {
                    data: "id",
                    orderable: false, // Disable sorting for the news_id column
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                // {
                //     data: 'event_id',
                //     orderable: false,  // Disable sorting for the news_id column
                //     render: function (data, type, row, meta) {
                //         return meta.row + meta.settings._iDisplayStart + 1;
                //     }
                // },
                {
                    data: "event_name",
                    name: "event_name",
                },
                {
                    data: "cities",
                    name: "cities",
                },
                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        var editCityUrl =
                            baseUrl +
                            "/admin/event/cities/edit/" +
                            row.event_id;
                        var buttonsHtml =
                            '<a href="' +
                            editCityUrl +
                            '" class="btn btn-primary btn-sm mr-1 mb-1"><span class="material-symbols-outlined">edit</span></a>'; // +

                        // '<a href="javascript:void(0)" onclick="deleteCityRow(' + row.news_id + ',\'' + row.city_name + '\')" class="btn btn-danger btn-sm"> <span class="material-symbols-outlined">delete</span> </a>';

                        return buttonsHtml;
                    },
                },
            ],
            order: [[0, "desc"]], // Default sorting by news_id in descending order
        });
    }

    if ($("#add-city").length) {
        $("#city").select2({
            placeholder: "Select or add cities",
            tags: true, // allows creating new tags
            tokenSeparators: [","],
        });

        $("#add-city").validate({
            rules: {
                "city[]": {
                    required: true,
                    minlength: 1,
                },
                event_id: {
                    required: true,
                },
            },
            messages: {
                "city[]": {
                    required: "Enter the city name",
                },
                event_id: {
                    required: "Select the event",
                },
            },
            errorPlacement: function (error, element) {
                let name = element.attr("name");

                if (typeof name !== "undefined") {
                    name = name.replace(/\[\]$/, ""); // safely remove trailing [] if exists
                    const errorSpan = $("#" + name + "-error");

                    if (errorSpan.length) {
                        errorSpan.html(error.text()).show();
                    } else {
                        error.insertAfter(element);
                    }
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function (element) {
                let name = $(element).attr("name");
                if (typeof name !== "undefined") {
                    name = name.replace(/\[\]$/, "");
                    $("#" + name + "-error").addClass("show-error");
                }
            },
            unhighlight: function (element) {
                let name = $(element).attr("name");
                if (typeof name !== "undefined") {
                    name = name.replace(/\[\]$/, "");
                    $("#" + name + "-error")
                        .removeClass("show-error")
                        .empty()
                        .hide();
                }
            },
            submitHandler: function (form) {
                form.submit();
            },
        });
    }

    if ($("#edit-city-form").length) {
        $("#city").select2({
            placeholder: "Select or add cities",
            tags: true, // allows creating new tags
            tokenSeparators: [","],
        });
        $("#edit-cities").validate({
            rules: {
                city_name: {
                    required: true,
                },
                state: {
                    required: true,
                },
                country: {
                    required: true,
                },
            },
            messages: {
                city_name: {
                    required: "Enter the city name",
                },
                state: {
                    required: "Enter the State",
                },
                country: {
                    required: "Enter the Country name",
                },
            },
            submitHandler: function (form) {
                return true;
            },
        });
    }

    if ($("#add-city-image").length) {
        $("#event_id").on("change", function () {
            var eventId = $(this).val();

            if (eventId) {
                $.ajax({
                    url: "/admin/event/cities/" + eventId, // Define the route for fetching cities
                    type: "GET",
                    success: function (data) {
                        var citySelect = $("#city_id");
                        citySelect.empty(); // Clear the current options
                        citySelect.append(
                            '<option value="">Select City</option>'
                        ); // Add default option
                        if (data.cities.length > 0) {
                            // console.log(1);

                            // Loop through cities and append them to the select
                            data.cities.forEach(function (city) {
                                // console.log(city);
                                citySelect.append(
                                    '<option value="' +
                                        city.id +
                                        '">' +
                                        city.name +
                                        "</option>"
                                );
                            });
                        } else {
                            // console.log(2);
                            // var citySelect = $('#city');
                            // citySelect.empty(); // Clear the current options
                            // citySelect.append('<option value="">Select City</option>'); // Add default option
                            // Show SweetAlert2 if no cities are available
                            Swal.fire({
                                title: "No Cities Available!",
                                text: "Please add cities for the selected event.",
                                icon: "warning",
                                confirmButtonText: "OK",
                            });
                        }
                    },
                    error: function () {
                        Swal.fire({
                            title: "Error!",
                            text: "There was an error loading the cities. Please try again.",
                            icon: "error",
                            confirmButtonText: "OK",
                        });
                    },
                });
            } else {
                $("#city").empty();
                $("#city").append('<option value="">Select City</option>');
            }
        });

        // Add Image button click handler
        $("#add-image-btn").on("click", function () {
            var newImageDiv = $(".image-upload-div:first").clone(); // Clone first block

            // Clean file input and preview
            newImageDiv.find('input[type="file"]').val("");
            newImageDiv.find(".image-preview-container").html("");

            newImageDiv
                .find('input[type="file"]')
                .attr("accept", "image/png, image/jpeg, image/jpg, image/webp");
            // Remove IDs if duplicated
            newImageDiv.find('input[type="file"]').removeAttr("id");
            newImageDiv.find(".image-preview-container").removeAttr("id");

            // Append to container
            $("#image-upload-container").append(newImageDiv);

            // Add validation rule dynamically
            newImageDiv.find('input[type="file"]').each(function () {
                $(this).rules("add", {
                    required: true,
                    messages: {
                        required: "Please select an image",
                    },
                });
            });
        });

        // Image preview for a single file

        $("#add-city-image").validate({
            rules: {
                event_id: {
                    required: true,
                },
                city_id: {
                    required: true,
                },
                "city_images[]": {
                    required: true,
                    extension: "jpg|jpeg|png|webp",
                },
            },
            messages: {
                event_id: {
                    required: "Please select an event",
                },
                city_id: {
                    required: "Please select a city",
                },
                "city_images[]": {
                    required: "Please upload an image",
                    extension:
                        "Only image files are allowed (jpg, jpeg, png, webp)",
                },
            },
            errorPlacement: function (error, element) {
                const name = element.attr("name").replace("[]", "");
                const errorSpan = $("#" + name + "-error");

                if (errorSpan.length) {
                    errorSpan.html(error.text()).show();
                } else if (element.attr("type") === "file") {
                    error.insertAfter(element.closest(".input-group"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function (element) {
                const name = $(element).attr("name").replace("[]", "");
                $("#" + name + "-error").addClass("show-error");
            },
            unhighlight: function (element) {
                const name = $(element).attr("name").replace("[]", "");
                $("#" + name + "-error")
                    .removeClass("show-error")
                    .empty();
            },
            submitHandler: function (form) {
                form.submit(); // allow form to be submitted if valid
            },
        });
    }

    if ($("#edit-city-image").length) {
        // Add Image button click handler
        $("#add-image-btn").on("click", function () {
            var newImageInput = $(`
                <div class="form-group w-48 form-group-box image-upload-div mt-3">
                    <label class="fullName">Upload City Image (Max: 500KB, Recommended: 640x360px)</label>
                    <div class="input-group">
                        <input type="file" name="city_images[]" class="form-control city-image-input boxline"
                            accept="image/png, image/jpeg, image/jpg, image/webp" multiple onchange="previewImageEdit(this)">
                    </div>
                    <div class="image-preview-container mt-2"></div>
                    <button type="button" class="btn btn-danger btn-sm mt-2 remove-new-image">Remove</button>
                </div>
            `);

            $("#image-upload-container").append(newImageInput);

            // ✅ Apply validation rule to the new file input
            newImageInput.find('input[type="file"]').rules("add", {
                required: true,
                messages: {
                    required: "Select the image",
                },
            });
        });

        // Remove dynamically added image input
        $("#image-upload-container").on(
            "click",
            ".remove-new-image",
            function () {
                $(this).closest(".image-upload-div").remove();
            }
        );

        $("#edit-city-image").validate({
            rules: {
                event_id: {
                    required: true,
                },
                city_id: {
                    required: true,
                },
                "city_images[]": {
                    required: true,
                },
            },
            messages: {
                event_id: {
                    required: "Select the event",
                },
                city_id: {
                    required: "Select the city",
                },
                "city_images[]": {
                    required: "Select the image",
                },
            },
            errorPlacement: function (error, element) {
                if (element.attr("type") == "file") {
                    error.insertAfter(element.closest(".input-group"));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                return true;
            },
        });
    }

    if ($("#event-city-image-table").length) {
        table = $("#event-city-image-table").DataTable({
            aLengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            iDisplayLength: 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + "/admin/event/city/images-all", // Update with your actual controller endpoint
                type: "GET",
                data: function (d) {
                    d.page = d.start / d.length + 1;
                    d.perPage = d.length;
                    d.search = d.search.value;
                    const orderColumnIndex = d.order[0].column;
                    d.sort_column = d.columns[orderColumnIndex].data; // Sort column name
                    d.sort_direction = d.order[0].dir;
                },
            },
            columns: [
                {
                    data: "id",
                    orderable: false, // Disable sorting for the news_id column
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                // {
                //     data: 'event_id',
                //     orderable: false,  // Disable sorting for the news_id column
                //     render: function (data, type, row, meta) {
                //         return meta.row + meta.settings._iDisplayStart + 1;
                //     }
                // },
                {
                    data: "event_name",
                    name: "event_name",
                },
                {
                    data: "city_name",
                    name: "city_name",
                },
                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        var editCityUrl =
                            baseUrl +
                            "/admin/event/city/images/edit/" +
                            row.event_id +
                            "/" +
                            row.city_id;
                        var buttonsHtml =
                            '<a href="' +
                            editCityUrl +
                            '" class="btn btn-primary btn-sm mr-1 mb-1"><span class="material-symbols-outlined">edit</span></a>'; // +

                        // '<a href="javascript:void(0)" onclick="deleteCityRow(' + row.news_id + ',\'' + row.city_name + '\')" class="btn btn-danger btn-sm"> <span class="material-symbols-outlined">delete</span> </a>';

                        return buttonsHtml;
                    },
                },
            ],
            order: [[0, "desc"]], // Default sorting by news_id in descending order
        });
    }

    // ========================= Lakesh-News ans Blogs Cities Ends===================================

    //============ Tapas ===============================================

    if ($("#add-career").length) {
        // $('#description').summernote();
        if ($("#short_description").length) {
            $("#short_description").summernote({
                height: 200,
                toolbar: [
                    ["style", ["style"]],
                    ["font", ["bold", "underline", "clear"]],
                    ["color", ["color"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["table", ["table"]],
                    ["insert", ["link", "picture"]],
                    ["view", ["fullscreen", "codeview", "help"]],
                ],
            });
        }
        $.validator.addMethod(
            "validWebp",
            function (value, element) {
                // Allowed MIME types
                var allowedTypes = ["image/webp", "image/png", "image/jpeg"];

                // Check if file exists and is of an allowed type
                return (
                    this.optional(element) ||
                    (element.files[0] &&
                        allowedTypes.includes(element.files[0].type))
                );
            },
            "Please upload a valid image (webp, png, jpg, jpeg)."
        );
        $.validator.addMethod(
            "checkFileSize",
            function (value, element, param) {
                // Check if file exists and its size is less than or equal to maxSize
                return (
                    this.optional(element) ||
                    (element.files[0] && element.files[0].size <= 1024 * 1024)
                );
            }
        );

        $("#add-career").validate({
            rules: {
                title: {
                    required: true,
                },
                status: {
                    required: true,
                },
                cover_image: {
                    required: false,
                    validWebp: true, // Custom method to check for valid WebP files
                    checkFileSize: true,
                },
            },
            messages: {
                title: {
                    required: "Enter the title",
                },
                status: {
                    required: "Enter short description",
                },
                cover_image: {
                    required: "Select the thumbnail image",
                    validWebp:
                        "Please upload a valid image (webp, png, jpg, jpeg).",
                    checkFileSize: "Maximum file size is 1MB",
                },
            },

            submitHandler: function (form) {
                $("#description_error").text("").css("display", "none");
                if ($.trim($("#description").summernote("code")) === "") {
                    $("#description_error")
                        .text("description cannot be empty.")
                        .css("display", "block");
                    return false;
                }
                if ($.trim($("#short_description").summernote("code")) === "") {
                    $("#short_description_error")
                        .text("short description cannot be empty.")
                        .css("display", "block");
                    return false;
                }

                // alert("name: " + disciplineName + "\n description: " + description);

                return true;
            },
        });
    }

    if ($("#edit_career").length) {
        // $('#description').summernote();
        if ($("#short_description").length) {
            $("#short_description").summernote({
                height: 200,
                toolbar: [
                    ["style", ["style"]],
                    ["font", ["bold", "underline", "clear"]],
                    ["color", ["color"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["table", ["table"]],
                    ["insert", ["link", "picture"]],
                    ["view", ["fullscreen", "codeview", "help"]],
                ],
            });
        }

        $.validator.addMethod(
            "validWebp",
            function (value, element) {
                // Allowed MIME types
                var allowedTypes = ["image/webp", "image/png", "image/jpeg"];

                // Check if file exists and is of an allowed type
                return (
                    this.optional(element) ||
                    (element.files[0] &&
                        allowedTypes.includes(element.files[0].type))
                );
            },
            "Please upload a valid image (webp, png, jpg, jpeg)."
        );
        $.validator.addMethod(
            "checkFileSize",
            function (value, element, param) {
                // Check if file exists and its size is less than or equal to maxSize
                return (
                    this.optional(element) ||
                    (element.files[0] && element.files[0].size <= 1024 * 1024)
                );
            }
        );
        $("#edit_career").validate({
            rules: {
                title: {
                    required: true,
                },
                status: {
                    required: true,
                },
                cover_image: {
                    required: false,
                    validWebp: true, // Custom method to check for valid WebP files
                    checkFileSize: true,
                },
            },
            messages: {
                title: {
                    required: "Enter the title",
                },
                status: {
                    required: "Enter short description",
                },
                cover_image: {
                    required: "Select the thumbnail image",
                    validWebp:
                        "Please upload a valid image (webp, png, jpg, jpeg).",
                    checkFileSize: "Maximum file size is 1MB",
                },
            },

            submitHandler: function (form) {
                $("#description_error").text("").css("display", "none");
                if ($.trim($("#description").summernote("code")) === "") {
                    $("#description_error")
                        .text("description cannot be empty.")
                        .css("display", "block");
                    return false;
                }
                // alert("name: " + disciplineName + "\n description: " + description);

                return true;
            },
        });
    }

    if ($("#career-table").length) {
        table = $("#career-table").DataTable({
            aLengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            iDisplayLength: 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + "/admin/career-all", // Your server-side controller URL
                type: "GET",
            },
            columns: [
                {
                    data: "id",
                    orderable: false, // Disable sorting for the Sr. No. column
                    render: function (data, type, row, meta) {
                        // Render Sr. No. as an incrementing number
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: "title",
                    name: "title",
                },
                {
                    data: "short_description",
                    name: "short_description",
                },
                // {
                //     data: 'education_experience_card',
                //     name: 'education_experience_card'
                // },
                {
                    data: "created_at",
                    name: "created_at",
                },
                {
                    data: "status",
                    render: function (data, type, row) {
                        if (data === "active") {
                            return '<span class="badge badge-success">Published</span>';
                        } else if (data === "inactive") {
                            return '<span class="badge badge-danger">Draft</span>';
                        } else {
                            return '<span class="badge badge-secondary">Unknown</span>';
                        }
                    },
                },

                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        var viewBlogUrl = baseUrl + "/career/" + row.slug;
                        var editBlogUrl =
                            baseUrl + "/admin/career/edit/" + row.id;
                        var buttonsHtml =
                            // '<a href="' + viewBlogUrl + '" class="btn btn-warning btn-sm mr-1 mb-1" target="_blank"><span class="material-symbols-outlined">visibility</span></a>' +
                            '<a href="' +
                            editBlogUrl +
                            '" class="btn btn-primary btn-sm mr-1 mb-1"><span class="material-symbols-outlined">edit</span></a>' +
                            '<a href="javascript:void(0)" onclick="deleteCareerRow(' +
                            row.id +
                            ",'" +
                            row.title +
                            '\')"  class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> <span class="material-symbols-outlined">delete</span> </a>';

                        return buttonsHtml;
                    },
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, "desc"]],
        });
    }

    if ($("#job-table").length) {
        table = $("#job-table").DataTable({
            aLengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            iDisplayLength: 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + "/admin/job-interested-all", // Your server-side controller URL
                type: "GET",
            },
            columns: [
                {
                    data: "id",
                    orderable: false, // Disable sorting for the Sr. No. column
                    render: function (data, type, row, meta) {
                        // Render Sr. No. as an incrementing number
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: "fullname",
                    name: "fullname",
                },
                {
                    data: "email",
                    name: "email",
                },
                {
                    data: "phone_no",
                    name: "phone_no",
                },
                {
                    data: "career_title",
                    name: "career_title",
                },
                {
                    data: "created_at",
                    name: "created_at",
                },
                /* {
                    data: 'status',
                    name: 'status',
                   
                }, */

                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        //var viewBlogUrl = baseUrl + '/resume/' + row.slug;
                        var viewBlogUrl =
                            baseUrl + "/admin/job-interested/view/" + row.id;
                        var buttonsHtml =
                            // '<a href="' + viewBlogUrl + '" class="btn btn-warning btn-sm mr-1 mb-1" target="_blank"><span class="material-symbols-outlined">visibility</span></a>' +
                            // '<a href="' + viewBlogUrl + '" class="btn btn-primary btn-sm mr-1 mb-1"><span class="material-symbols-outlined">visibility</span></a>' +
                            // '<a href="javascript:void(0)" onclick="deleteJobRow(' + row.id + ',\'' + row.email + '\')"  class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> <span class="material-symbols-outlined">delete</span> </a>';
                            '<a href="' +
                            viewBlogUrl +
                            '" class="btn btn-primary btn-sm mr-1 mb-1"><span class="material-symbols-outlined">visibility</span></a>';

                        return buttonsHtml;
                    },
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, "desc"]],
        });
        $("#downloadBtn").click(function () {
            let start_date = $("#start_date").val();
            let end_date = $("#end_date").val();
            if (start_date == "" || end_date == "") {
                $("#error-download")
                    .html("Please select both days for download the data")
                    .removeClass("hide");
                return false;
            }
            $("#error-download").addClass("hide");
            var downloadUrl =
                baseUrl +
                "/admin/job-download?start_date=" +
                start_date +
                "&end_date=" +
                end_date;
            // var downloadUrl = baseUrl + "/admin/contact-download";

            // Create an anchor element
            var link = document.createElement("a");

            // Set the download URL as the href attribute
            link.href = downloadUrl;

            // Set the target attribute to '_blank' to open in a new tab
            link.target = "_blank";

            // Trigger a click event on the anchor element
            link.click();
        });
    }

    if ($("#contact-table").length) {
        table = $("#contact-table").DataTable({
            language: {
                lengthMenu: "Show _MENU_ Entries",
            },
            aLengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            iDisplayLength: 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + "/admin/contact-all", // Your server-side controller URL
                type: "GET",
                // data: {
                //     csrf_test_name: csrfToken,
                //     // Other data here
                // },
            },
            columns: [
                {
                    data: "id",
                    orderable: false, // Disable sorting for the Sr. No. column
                    render: function (data, type, row, meta) {
                        // Render Sr. No. as an incrementing number
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },

                {
                    data: "full_name",
                    name: "full_name",
                },
                {
                    data: "email",
                    name: "email",
                },
                {
                    data: "designation",
                    name: "designation",
                },
                {
                    data: "organisation",
                    name: "organisation",
                },
                {
                    data: "services",
                    name: "services",
                },
                {
                    data: "message",
                    name: "message",
                },

                {
                    data: "created_at", // Date column
                    name: "created_at",
                    render: function (data, type, row) {
                        const date = new Date(data);
                        const options = {
                            year: "numeric",
                            month: "short",
                            day: "numeric",
                            hour: "2-digit",
                            minute: "2-digit",
                            second: "2-digit",
                            hour12: true, // 12-hour format with AM/PM
                        };
                        return date.toLocaleDateString("en-US", options);
                    },
                },
                /* { 
                    data: "status",
                    name: "status",
                    render: function (data, type, row) {
                        return data == 'reject' ? '<span style="color:red;">Reject</span>' : '<span style="color:green;">'+data+'</span>';
                    }
                }, // Status
                
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        var editUrl = baseUrl + '/admin/contact/edit/' + row.id;
                        // var viewUrl = baseUrl + '/admin/institute-courses/details/' + row.id;

                        var buttonsHtml =
                            //'<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                            // '<a href="' + viewUrl + '" class="btn btn-primary btn-sm">View</a>' +
                            '<a href="javascript:void(0)" onclick="deleteFacultyRow(' + row.id + ',\'' + '/admin/contact/delete' + '\''+',\''+ '#contact-table' + '\')"  class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                        return buttonsHtml;
                    },
                }, */
            ],
            // Initial sorting by ID column in descending order
            order: [[0, "desc"]],
        });

        $("#downloadBtn").click(function () {
            let start_date = $("#start_date").val();
            let end_date = $("#end_date").val();
            if (start_date == "" || end_date == "") {
                $("#error-download")
                    .html("Please select both days for download the data")
                    .removeClass("hide");
                return false;
            }
            $("#error-download").addClass("hide");
            var downloadUrl =
                baseUrl +
                "/admin/contact-download?start_date=" +
                start_date +
                "&end_date=" +
                end_date;
            // var downloadUrl = baseUrl + "/admin/contact-download";

            // Create an anchor element
            var link = document.createElement("a");

            // Set the download URL as the href attribute
            link.href = downloadUrl;

            // Set the target attribute to '_blank' to open in a new tab
            link.target = "_blank";

            // Trigger a click event on the anchor element
            link.click();
        });

        //============  Contact end ========================================================================
    }

    if ($("#subscribe-table").length) {
        table = $("#subscribe-table").DataTable({
            language: {
                lengthMenu: "Show _MENU_ Entries",
            },
            aLengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            iDisplayLength: 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + "/admin/subscribe-all", // Your server-side controller URL
                type: "GET",
                // data: {
                //     csrf_test_name: csrfToken,
                //     // Other data here
                // },
            },
            columns: [
                {
                    data: "id",
                    orderable: false, // Disable sorting for the Sr. No. column
                    render: function (data, type, row, meta) {
                        // Render Sr. No. as an incrementing number
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },

                {
                    data: "email",
                    name: "email",
                },
                {
                    data: "created_at", // Date column
                    name: "created_at",
                    render: function (data, type, row) {
                        const date = new Date(data);
                        const options = {
                            year: "numeric",
                            month: "short",
                            day: "numeric",
                            hour: "2-digit",
                            minute: "2-digit",
                            second: "2-digit",
                            hour12: true, // 12-hour format with AM/PM
                        };
                        return date.toLocaleDateString("en-US", options);
                    },
                },
                /* { 
                    data: "status",
                    name: "status",
                    render: function (data, type, row) {
                        return data == 'reject' ? '<span style="color:red;">Reject</span>' : '<span style="color:green;">'+data+'</span>';
                    }
                }, // Status
                
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        var editUrl = baseUrl + '/admin/contact/edit/' + row.id;
                        // var viewUrl = baseUrl + '/admin/institute-courses/details/' + row.id;

                        var buttonsHtml =
                            //'<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                            // '<a href="' + viewUrl + '" class="btn btn-primary btn-sm">View</a>' +
                            '<a href="javascript:void(0)" onclick="deleteFacultyRow(' + row.id + ',\'' + '/admin/contact/delete' + '\''+',\''+ '#contact-table' + '\')"  class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                        return buttonsHtml;
                    },
                }, */
            ],
            // Initial sorting by ID column in descending order
            order: [[0, "desc"]],
        });

        $("#downloadBtn").click(function () {
            let start_date = $("#start_date").val();
            let end_date = $("#end_date").val();
            if (start_date == "" || end_date == "") {
                $("#error-download")
                    .html("Please select both days for download the data")
                    .removeClass("hide");
                return false;
            }
            $("#error-download").addClass("hide");
            var downloadUrl =
                baseUrl +
                "/admin/subscribe-download?start_date=" +
                start_date +
                "&end_date=" +
                end_date;
            // var downloadUrl = baseUrl + "/admin/contact-download";

            // Create an anchor element
            var link = document.createElement("a");

            // Set the download URL as the href attribute
            link.href = downloadUrl;

            // Set the target attribute to '_blank' to open in a new tab
            link.target = "_blank";

            // Trigger a click event on the anchor element
            link.click();
        });

        //============  Contact end ========================================================================
    }
    if ($("#publication-report-table").length) {
        table = $("#publication-report-table").DataTable({
            language: {
                lengthMenu: "Show _MENU_ Entries",
            },
            aLengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            iDisplayLength: 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + "/admin/publication-report-all", // Your server-side controller URL
                type: "GET",
                // data: {
                //     csrf_test_name: csrfToken,
                //     // Other data here
                // },
            },
            columns: [
                {
                    data: "id",
                    orderable: false, // Disable sorting for the Sr. No. column
                    render: function (data, type, row, meta) {
                        // Render Sr. No. as an incrementing number
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },

                {
                    data: "title",
                    name: "title",
                },
                {
                    data: "report_count",
                    name: "report_count",
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, "desc"]],
        });

        $("#downloadBtn").click(function () {
            let start_date = $("#start_date").val();
            let end_date = $("#end_date").val();
            // if (start_date == "" || end_date == "") {
            //     $('#error-download').html("Please select both days for download the data").removeClass("hide");
            //     return false;
            // }
            // $('#error-download').addClass("hide");
            var downloadUrl = baseUrl + "/admin/publication-download";
            // var downloadUrl = baseUrl + "/admin/contact-download";

            // Create an anchor element
            var link = document.createElement("a");

            // Set the download URL as the href attribute
            link.href = downloadUrl;

            // Set the target attribute to '_blank' to open in a new tab
            link.target = "_blank";

            // Trigger a click event on the anchor element
            link.click();
        });

        //============  Contact end ========================================================================
    }
    if ($("#publication-form-list-table").length) {
        table = $("#publication-form-list-table").DataTable({
            language: {
                lengthMenu: "Show _MENU_ Entries",
            },
            aLengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            iDisplayLength: 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + "/admin/publication-form-list-all", // Your server-side controller URL
                type: "GET",
                // data: {
                //     csrf_test_name: csrfToken,
                //     // Other data here
                // },
            },
            columns: [
                {
                    data: "id",
                    orderable: false, // Disable sorting for the Sr. No. column
                    render: function (data, type, row, meta) {
                        // Render Sr. No. as an incrementing number
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: "full_name",
                    name: "full_name",
                },
                {
                    data: "email_id",
                    name: "email_id",
                },
                {
                    data: "publication_title",
                    name: "publication_title",
                },
                {
                    data: "count",
                    name: "count",
                },
                {
                    data: "created_at", // Date column
                    name: "created_at",
                    render: function (data, type, row) {
                        const date = new Date(data);
                        const options = {
                            year: "numeric",
                            month: "short",
                            day: "numeric",
                            hour: "2-digit",
                            minute: "2-digit",
                            second: "2-digit",
                            hour12: true, // 12-hour format with AM/PM
                        };
                        return date.toLocaleDateString("en-US", options);
                    },
                },
                /* { 
                    data: "status",
                    name: "status",
                    render: function (data, type, row) {
                        return data == 'reject' ? '<span style="color:red;">Reject</span>' : '<span style="color:green;">'+data+'</span>';
                    }
                }, // Status
                
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        var editUrl = baseUrl + '/admin/contact/edit/' + row.id;
                        // var viewUrl = baseUrl + '/admin/institute-courses/details/' + row.id;

                        var buttonsHtml =
                            //'<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                            // '<a href="' + viewUrl + '" class="btn btn-primary btn-sm">View</a>' +
                            '<a href="javascript:void(0)" onclick="deleteFacultyRow(' + row.id + ',\'' + '/admin/contact/delete' + '\''+',\''+ '#contact-table' + '\')"  class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                        return buttonsHtml;
                    },
                }, */
            ],
            // Initial sorting by ID column in descending order
            order: [[0, "desc"]],
        });

        $("#downloadBtn").click(function () {
            let start_date = $("#start_date").val();
            let end_date = $("#end_date").val();
            if (start_date == "" || end_date == "") {
                $("#error-download")
                    .html("Please select both days for download the data")
                    .removeClass("hide");
                return false;
            }
            $("#error-download").addClass("hide");
            var downloadUrl =
                baseUrl +
                "/admin/publication-form-list-download?start_date=" +
                start_date +
                "&end_date=" +
                end_date;
            // var downloadUrl = baseUrl + "/admin/contact-download";

            // Create an anchor element
            var link = document.createElement("a");

            // Set the download URL as the href attribute
            link.href = downloadUrl;

            // Set the target attribute to '_blank' to open in a new tab
            link.target = "_blank";

            // Trigger a click event on the anchor element
            link.click();
        });

        //============  Contact end ========================================================================
    }
});

// Image preview for a single file
function previewImage(event) {
    const input = event.target;
    const file = input.files[0];

    if (file) {
        const validTypes = [
            "image/png",
            "image/jpeg",
            "image/webp",
            "image/svg+xml",
        ];
        const maxSize = 1048576; // 1MB

        if (!validTypes.includes(file.type)) {
            Swal.fire({
                title: "Invalid File Type!",
                text: "Only PNG, JPEG, JPG, WEBP and SVG images are allowed.",
                icon: "error",
                confirmButtonText: "OK",
            });
            input.value = "";
            return;
        }

        if (file.size > maxSize) {
            Swal.fire({
                title: "Error!",
                text: "File size must be less than 1MB.",
                icon: "error",
                confirmButtonText: "OK",
            });
            input.value = "";
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            let previewId = "";
            // alert(input.id)
            // Handle static input IDs
            switch (input.id) {
                case "thumbnail_image":
                    previewId = "thumbnail_preview";
                    break;
                case "banner_image":
                    previewId = "banner_preview";
                    break;
                case "mb_banner_image":
                    previewId = "mb_banner_preview";
                    break;
                case "vertical_image":
                    previewId = "vertical_preview";
                    break;
                case "report_image":
                    previewId = "report_preview";
                    break;

                default:
                    if (input.id.startsWith("report_image_")) {
                        // Dynamically replace the ID part to match the preview image ID
                        previewId = input.id.replace(
                            "report_image_",
                            "report_image_preview_"
                        );
                    }
                    break;
            }

            if (previewId) {
                const preview = document.getElementById(previewId);
                if (preview) {
                    preview.src = e.target.result;
                    preview.classList.add("show");
                }
            }
        };

        reader.readAsDataURL(file);
    }
}

function previewHighlightIcon(event, index) {
    const input = event.target;
    const file = input.files[0];

    if (file) {
        const validTypes = [
            "image/png",
            "image/jpeg",
            "image/webp",
            "image/svg+xml",
        ];
        const maxSize = 1048576; // 1MB

        // Check for valid image types
        if (!validTypes.includes(file.type)) {
            Swal.fire({
                title: "Invalid File Type!",
                text: "Only PNG, JPEG, JPG, WEBP, and SVG images are allowed.",
                icon: "error",
                confirmButtonText: "OK",
            });
            input.value = "";
            return;
        }

        // Check for max file size (1MB)
        if (file.size > maxSize) {
            Swal.fire({
                title: "Error!",
                text: "File size must be less than 1MB.",
                icon: "error",
                confirmButtonText: "OK",
            });
            input.value = "";
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            let previewId = "";

            // Use the dynamic index passed as a parameter
            previewId = `highlight_icon_preview_${index}`; // Generate the preview ID dynamically

            // If previewId is found, update the image preview
            const preview = document.getElementById(previewId);
            if (preview) {
                preview.src = e.target.result;
                preview.style.display = "block"; // Show the preview image
            }
        };

        reader.readAsDataURL(file); // Read the file as data URL for preview
    }
}

// document.addEventListener("DOMContentLoaded", function () {
//     const input = document.getElementById("report_pdf");
//     if (input) {
//         input.addEventListener("change", function (e) {
//             const file = e.target.files[0];
//             if (file && file.type === "application/pdf") {
//                 const reader = new FileReader();
//                 reader.onload = function (e) {
//                     const iframe = document.getElementById("pdf_preview");
//                     iframe.src = e.target.result;
//                     iframe.style.display = "block";
//                 };
//                 reader.readAsDataURL(file);
//             } else {
//                 Swal.fire('Invalid File', 'Please upload a valid PDF file.', 'error');
//                 e.target.value = '';
//                 const iframe = document.getElementById("pdf_preview");
//                 if (iframe) iframe.style.display = "none";
//             }
//         });
//     }
// });

function previewImageEdit(input) {
    var file = input.files[0]; // Selected file
    var previewContainer = $(input)
        .closest(".image-upload-div")
        .find(".image-preview-container");

    console.log(previewContainer);
    // Clear previous preview
    previewContainer.html("");

    if (file) {
        // File size limit: 1MB
        if (file.size > 1048576) {
            Swal.fire({
                title: "Error!",
                text: "File size must be less than 1MB.",
                icon: "error",
                confirmButtonText: "OK",
            });
            $(input).val("");
            return;
        }

        // Valid file types
        // var validExtensions = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp', 'image/svg'];
        const validExtensions = [
            "image/png",
            "image/jpeg",
            "image/webp",
            "image/svg+xml",
        ];

        if (!validExtensions.includes(file.type)) {
            Swal.fire({
                title: "Invalid File Type!",
                text: "Only PNG, JPEG, JPG, and WEBP images are allowed.",
                icon: "error",
                confirmButtonText: "OK",
            });
            $(input).val("");
            return;
        }

        // Show preview
        var reader = new FileReader();
        reader.onload = function (e) {
            var img = $("<img>", {
                src: e.target.result,
                alt: "Image Preview",
                style: "width: 300px; height: 300px; object-fit: cover;",
            });
            previewContainer.append(img);
        };
        reader.readAsDataURL(file);
    }
}

$(document).on("click", ".delete-existing-image", function () {
    var button = $(this);
    var imageId = button.data("image-id");

    // Optional: confirm before deletion
    Swal.fire({
        title: "Are you sure?",
        text: "This will remove the image from the form.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel",
    }).then((result) => {
        if (result.isConfirmed) {
            // Remove image preview block
            button.closest(".image-upload-div").remove();

            // Add imageId to the delete_image_ids field
            var deleteImageIdsField = $("#delete_image_ids");
            var currentValue = deleteImageIdsField.val();
            if (currentValue) {
                deleteImageIdsField.val(currentValue + "," + imageId);
            } else {
                deleteImageIdsField.val(imageId);
            }
        }
    });
});

jQuery(document).ready(function () {
    const maxFields = 5;

    jQuery(".add-report-list-btn").on("click", function () {
        const wrapperSelector = jQuery(this).data("wrapper");
        const wrapper = jQuery(wrapperSelector);

        const index = wrapperSelector.match(/\d+/)[0]; // get 0, 1, or 2
        const currentCount = wrapper.find(".report-list-item").length;

        if (currentCount < maxFields) {
            const fieldHtml = `
                <div class="input-group report-list-item mb-2">
                    <input type="text" 
                        name="report_list[${index}][]" 
                        id="report_list_${index}_${currentCount}"
                        class="form-control" 
                        placeholder="Enter report list item" required>
                    <button type="button" class="btn btn-sm btn-danger ms-2 remove-report-list">×</button>
                </div>`;
            wrapper.append(fieldHtml);
        } else {
            Swal.fire(
                "Limit Reached",
                "You can only add up to 5 list items.",
                "warning"
            );
        }
    });

    jQuery(document).on("click", ".remove-report-list", function () {
        jQuery(this).closest(".report-list-item").remove();
    });
});

$(document).ready(function () {
    //   $('#add-publications').removeAttr('novalidate');
    //   $('#edit_publication').removeAttr('novalidate');
});
$(document).ready(function () {
    // Check if the fields are hidden on page load and remove 'required' if hidden
    if ($("#highlight_description_0").css("display") === "none") {
        $("#highlight_description_0").removeAttr("required"); // Remove the 'required' attribute if hidden
    }

    if ($("#description").css("display") === "none") {
        $("#description").removeAttr("required"); // Remove the 'required' attribute if hidden
    }

    // Show the textarea (highlight_description_0) on a button click and re-add 'required'
    $("#showTextareaButton").click(function () {
        $("#highlight_description_0").show(); // Make the highlight_description_0 textarea visible
        $("#highlight_description_0").attr("required", "required"); // Add 'required' again when visible
    });

    // Show the description field on a button click and re-add 'required'
    $("#showDescriptionButton").click(function () {
        $("#description").show(); // Make the description textarea visible
        $("#description").attr("required", "required"); // Add 'required' again when visible
    });
});
