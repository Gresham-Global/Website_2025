function deleteRecordWithSweetAlert(id, action_path, data_table_id) {
    var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
    console.log(id+" -- "+ action_path+" -- "+ data_table_id+" -- "+baseUrl + action_path);
    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this item!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: baseUrl + action_path,
                data: {
                    id: id,
                    _token: csrfToken
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    console.log(response.success);
                    if (response && response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        });

                        var dataTable = $(data_table_id).DataTable();
                        dataTable.ajax.reload(null, false);

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to delete record --'+status+'--'+error,
                    });
                }
            });
        }
    });
}

function deleteInstituteCourseRow(rowId,name) {
    // Your delete logic here
    console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = '/institute/course/delete';
    var data_table_id = '#course-table';
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

function deleteInstituteContactRow(rowId,name) {
    // Your delete logic here
    console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = '/institute/contact/delete';
    var data_table_id = '#contact-table';
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

function deleteStudentTestimonialsRow(rowId,name) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = '/institute/student-testimonials/delete';
    var data_table_id = '#student-testimonials-table';
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

function deleteInstituteVideoRow(rowId,name) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = '/institute/video/delete';
    var data_table_id = '#video-table   ';
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

function deleteGalleryRow(rowId,name) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = '/institute/gallery/delete';
    var data_table_id = '#gallery-table';
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

function deleteInstituteFaqsRow(rowId,name) {
    // Your delete logic here
    console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = '/institute/faqs/delete';
    var data_table_id = '#faqs-table';
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

$(document).ready(function() {
    $(".alert-success").delay(5000).slideUp(300);
    $(".alert-danger").delay(5000).slideUp(300);
    if ($('#description').length) {
        $('#description').summernote();
    }
    if ($('#description_ban').length) {
        $('#description_ban').summernote();
    }
    if ($('#description_bn').length) {
        $('#description_bn').summernote();
    }
    if ($('#long_description').length) {
        $('#long_description').summernote();
    }
    if ($('#long_description_ban').length) {
        $('#long_description_ban').summernote();
    }
    if ($('#admission_information_en').length) {
        $('#admission_information_en').summernote();
    }
    if ($('#admission_information_bn').length) {
        $('#admission_information_bn').summernote();
    }
    if ($('#important_dates_en').length) {
        $('#important_dates_en').summernote();
    }
    if ($('#important_dates_bn').length) {
        $('#important_dates_bn').summernote();
    }
    if ($('#rankings_en').length) {
        $('#rankings_en').summernote();
    }
    if ($('#rankings_bn').length) {
        $('#rankings_bn').summernote();
    }
    if ($('#placement_en').length) {
        $('#placement_en').summernote();
    }
    if ($('#placement_bn').length) {
        $('#placement_bn').summernote();
    } 
    if ($('#research_collaboration_en').length) {
        $('#research_collaboration_en').summernote();
    }
    if ($('#research_collaboration_bn').length) {
        $('#research_collaboration_bn').summernote();
    }
    if ($('#hostel_en').length) {
        $('#hostel_en').summernote();
    }
    if ($('#hostel_bn').length) {
        $('#hostel_bn').summernote();
    }
    
        
    if ($('#institute_login').length) {
        $("#togglePassword").on("click", function() {
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
    
        $("#remembarbtn").on("click", function() {
            // Toggle the checked state of the checkbox
            $("#rememberCheckbox").prop("checked", function(i, checked) {
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
        $("#refresh-btn").on("click", function(event) {
            event.preventDefault();
            generateMathProblem();
            $("#robotAnswer").val("");
            $("#result-message").hide();
            $("#icon .material-symbols-outlined").text("robot"); // Reset icon to 'robot'
        });
        $.validator.addMethod("captchaCorrect", function(value, element) {
            // Assuming the `correctAnswer` is available in the global scope
            return parseInt(value, 10) === correctAnswer;
        }, "Incorrect captcha answer. Please try again.");
        $("#institute_login").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                robotAnswer:{
                    required: true,
                    captchaCorrect: true
                }

            },
            messages: {
                email: {
                    required: 'Please enter your email',
                    email: 'Please enter a valid email address',
                },
                password: {
                    required: 'Please enter a password',
                    minlength: 'Password must be at least 8 characters',
                },
                robotAnswer: {
                    required: 'Please enter captcha',
                    captchaCorrect: 'Incorrect captcha answer. Please try again.', // Custom message
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") === "email") {
                    error.appendTo("#email-error");
                } else if (element.attr("name") === "password") {
                    error.appendTo("#password-error");
                } 
                else if (element.attr("name") === "robotAnswer") {
                    error.appendTo("#robotAnswer-error");
                } 
                else {
                    // Handle other elements if needed
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                return true;
            }
        });
    }
    if ($('#add-institute').length) {

        
        $("#add-institute").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                name: {
                    required: true,
                },
                website: {
                    required: true,
                    url: true,
                },
                establish_date:{
                    required: true
                },
                institute_type:{
                    required:true
                },
                coed_status:{
                    required:true
                },
                pre_interview:{
                    required:true
                },
                profile_image:{
                    required:false,
                    validWebp: true, // Custom method to check for valid WebP files
                    checkFileSize:true
                },
                cover_image:{
                    required:false,
                    validWebp: true, // Custom method to check for valid WebP files
                    checkFileSize:true
                }

            },
            messages: {
                email: {
                    required: 'Please enter your email',
                    email: 'Please enter a valid email address',
                },
                name: {
                    required: 'Please enter a institute name',
                },
                website: {
                    required: 'Please enter your institute website',
                    url: 'Please enter a valid institute website address',
                },
                establish_date: {
                    required: 'Please enter a establish date',
                },
                establish_date: {
                    required: 'Please enter a establish date',
                },
                institute_type: {
                    required: 'Please select a institute type',
                },
                coed_status: {
                    required: 'Please enter a coed status',
                },
                pre_interview: {
                    required: 'Please select a pre interview',
                },
                profile_image: {
                    required: "Select photo",
                    validWebp: "Please select a valid WebP image file",
                    checkFileSize: "Maximum file size is 500KB",
                },
                cover_image: {
                    required: "Select photo",
                    validWebp: "Please select a valid WebP image file",
                    checkFileSize: "Maximum file size is 500KB",
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") === "establish_date") {
                    error.appendTo("#establish_date-error");
                }
                else if (element.attr("name") === "institute_type") {
                    error.appendTo("#institute_type-error");
                }
                else if (element.attr("name") === "coed_status") {
                    error.appendTo("#institute_type-error");
                }
                else if (element.attr("name") === "pre_interview") {
                    error.appendTo("#institute_type-error");
                }
                else if (element.attr("name") === "cover_image") {
                    error.appendTo("#cover_image-error");
                }else if (element.attr("name") === "profile_image") {
                    error.appendTo("#profile_image-error");
                } 
                else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                //var email = $('#add-institute #email').val();
                //var password = $('#add-institute #name').val();
                
                //alert("Emailinstitute: " + email + "\nPasswordinstitute: " + password);
                return true;
            }
        });
        $.validator.addMethod('validWebp', function(value, element) {
            // Check if the file type is WebP
            return this.optional(element) || (element.files[0] && element.files[0].type === 'image/webp');
        });
        $.validator.addMethod('checkFileSize', function(value, element, param) {
            // Check if file exists and its size is less than or equal to maxSize
            return this.optional(element) || (element.files[0] && element.files[0].size <= 500 * 1024);
        });
    }
    if ($('#institute_rating').length) {
        $("#institute_rating").validate({
            rules: {
                nirf_ranking: {
                    required: true,
                },
                naac_rating: {
                    required: true,
                },
            },
            messages: {
                nirf_ranking: {
                    required: 'Please enter institute nirf ranking',
                },
                naac_rating: {
                    required: 'Please enter institute naac rating',
                }
            },
            submitHandler: function(form) {
                // var nirf_ranking = $('#nirf_ranking').val();
                // var naac_rating = $('#naac_rating').val();                
                // alert("nirf_ranking: " + nirf_ranking + "\naac_rating: " + naac_rating);
                return true;
            }
        });
    }
    if ($('#socialMediaLinksForm').length) {
        $("#socialMediaLinksForm").validate({
            rules: {
                facebookLink: {
                    url: true,
                },
                linkedinLink: {
                    url: true,
                },
                twitterLink: {
                    url: true,
                },
                instagramLink: {
                    url: true,
                },
            },
            messages: {
                facebookLink: {
                    url: 'Please enter a valid URL',
                },
                linkedinLink: {
                    url: 'Please enter a valid URL',
                },
                twitterLink: {
                    url: 'Please enter a valid URL',
                },
                instagramLink: {
                    url: 'Please enter a valid URL',
                },
            },
            submitHandler: function (form) {
                // Your custom submission logic here
                //alert("Form submitted!");
                // return false; // Prevent the form from actually submitting
                return true; // allowed the form from actually submitting
            }
        });
    }
    if ($('#institute_address').length) {
        $("#institute_address").validate({
            rules: {
                address_line_1: {
                    required: true,
                },
                address_line_1_ban: {
                    required: true,
                },
                city: {
                    required: false,
                },
                state: {
                    required: false,
                },
                pincode: {
                    required: false,
                }
            },
            messages: {
                address_line_1: {
                    required: 'Please enter address line 1',
                },
                address_line_1_ban: {
                    required: 'Please enter address line 1',
                },
                city: {
                    required: 'Please enter city',
                },
                state: {
                    required: 'Please enter state',
                },
                pincode: {
                    required: 'Please enter pincode',
                }
            },
            submitHandler: function(form) {
                // var nirf_ranking = $('#nirf_ranking').val();
                // var naac_rating = $('#naac_rating').val();                
                // alert("nirf_ranking: " + nirf_ranking + "\naac_rating: " + naac_rating);
                return true;
            }
        });
    } 
    if ($('#campus_details').length) {
        $("#campus_details").validate({
            rules: {
                campus_size: {
                    required: true,
                },
                campus_type: {
                    required: true,
                },
            },
            messages: {
                campus_size: {
                    required: 'Please enter institute campus size',
                },
                campus_type: {
                    required: 'Please enter institute campus type',
                }
            },
            submitHandler: function(form) {
                // var campus_size = $('#campus_size').val();
                // var campus_type = $('#campus_type').val();                
                // alert("campus_size: " + campus_size + "\ncampus_type: " + campus_type);
                return true;
            }
        });
    }
    if ($('#institute_details').length) {
        $("#institute_details").validate({
            rules: {
                overview: {
                    required: true,
                    maxlength: 1000,
                },
                overview_ban: {
                    required: true,
                    maxlength: 1000,
                },
                long_description: {
                    required: function() {
                        // Check if Summernote is empty
                        return ($.trim($('#long_description').summernote('code')) === '');
                    },
                },
                long_description_ban: {
                    required: function() {
                        // Check if Summernote is empty
                        return ($.trim($('#long_description_ban').summernote('code')) === '');
                    },
                }
            },
            messages: {
                overview: {
                    required: "Overview is required.",
                    maxlength: "Overview cannot exceed 1000 characters.",
                },
                overview_ban: {
                    required: "Overview is required.",
                    maxlength: "Overview cannot exceed 1000 characters.",
                },
                long_description: {
                    required: "Long description cannot be empty.",
                },
                long_description_ban: {
                    required: "Long description cannot be empty.",
                }
            },
            submitHandler: function (form) {
                $("#long_description_error").text('').css("display", "none");
                if ($.trim($('#long_description').summernote('code')) === '') 
                {    
                    $("#long_description_error").text("Long description cannot be empty.").css("display", "block");
                    return false; 
                }   
                // var overview = $('#overview').val();
                // var long_description = $('#long_description').val();           
                 
                //alert("overview: " + overview + "\nlong_description: " + long_description);
                return true;
            }
        });
    }

    if ($('#course-table').length) {
        
        table = $('#course-table').DataTable({
            "aLengthMenu": [
                [10,25,50,100],
                [10,25,50,100]
            ],
            "iDisplayLength": 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + '/institute/course-all', // Your server-side controller URL
                type: 'GET',
                // data: {
                //     csrf_test_name: csrfToken,
                //     // Other data here
                // },
            },
            columns: [{
                    data: 'id',
                    orderable: false, // Disable sorting for the Sr. No. column
                    render: function(data, type, row, meta) {
                        // Render Sr. No. as an incrementing number
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: 'courseName',
                    name: 'courseName',
                    orderable: false,
                },
                {
                    data: 'specializationName',
                    name: 'specializationName',
                    orderable: false,
                },
                {
                    data: 'totalSeats',
                    name: 'totalSeats',
                    orderable: false,
                },
                {
                    data: null,
                    name: 'duration',
                    orderable: false,
                    render: function(data, type, row) {
                        var duration = '';
                        if (row.durationYears) {
                            duration += row.durationYears + ' years';
                        }
                        if (row.durationMonths) {
                            if (duration !== '') {
                                duration += ' ';
                            }
                            duration += row.durationMonths + ' months';
                        }
                        return duration !== '' ? duration : 'N/A';
                    }
                },
                {
                    data: 'examinationPattern',
                    name: 'examinationPattern',
                    orderable: false,
                },
                {
                    data: 'educationMode',
                    name: 'educationMode',
                    orderable: false,
                    render: function(data, type, row) {
                        // Check if the data is not null or undefined
                        if (data) {
                            // Convert 'half_yearly' to 'Half Yearly'
                            return data.charAt(0).toUpperCase() + data.slice(1).replace('_', ' ');
                        } else {
                            return ''; // Return empty string if data is null or undefined
                        } 
                    }
                },
                {
                    data: 'scholarshipAvailable',
                    name: 'scholarshipAvailable',
                    orderable: false,
                    render: function(data) {
                        return data == 1 ? 'Yes' : 'No';
                    }
                },
                {
                    data: 'hasPlacement',
                    name: 'hasPlacement',
                    orderable: false,
                    render: function(data) {
                        return data == 1 ? 'Yes' : 'No';
                    }
                },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        if (row && typeof row === 'object' && Object.keys(row).length > 0) {
                            var editUrl = baseUrl + '/institute/course/' + row.id + '/edit';
                            var viewUrl = baseUrl + '/institute/course/' + row.id + '/view';
                            var buttonsHtml = '<a href="' + editUrl + '" class="material-symbols-outlined">Edit</a><a href="' + viewUrl + '" class="material-symbols-outlined">visibility</a><a href="javascript:void(0)" onclick="deleteInstituteCourseRow(' + row.id + ',\'' + row.hasPlacement + '\')"  class="material-symbols-outlined">delete</a>';
                            return buttonsHtml;
                        } else {
                            return '';
                        }
                    },
                   
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, 'desc']]
        });
    }

    if ($('#add_course').length) {
        $('#description').summernote();
        $("#course").change(function(){
            var course = $(this).val();
            //alert(course);
            $.ajax({
                url: baseUrl+'/institute/specialization-course/'+course, // Replace 'your-route-url' with the actual route URL in your Laravel project
                method: 'GET', // Use the appropriate HTTP method (GET, POST, etc.) for your route
                success: function(response) {
                    // Handle the successful response from the server
                    // console.log(response);
                    //alert('Success: ' + response);
                    $('#specialization_id').empty();

                    if(response.success)
                    {
                        var option = $('<option></option>');
                            
                        // Set the value and text of the option element
                        option.val("").text("Select Specialization");
                        
                        // Append the option to the select tag
                        $('#specialization_id').append(option);
                        response.data.forEach(function(item) {
                            // Create an option element
                            var option = $('<option></option>');
                            
                            // Set the value and text of the option element
                            option.val(item.id).text(item.name);
                            
                            // Append the option to the select tag
                            $('#specialization_id').append(option);
                        });
                    }
                    else
                    {
                        var option = $('<option></option>');
                            
                        // Set the value and text of the option element
                        option.val("").text("No specialization found");
                        
                        // Append the option to the select tag
                        $('#specialization_id').append(option);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors if the request fails
                    alert('Error: ' + error);
                }
            });
        });
        $('#duration_years,#duration_months, input[name="fee_cycle"]').change(function() {
            var years = parseInt($('#duration_years').val());
            var months = parseInt($('#duration_months').val());
            var feeCycle = $('input[name="fee_cycle"]:checked').val();
            //alert(years+" -- "+months+" -- "+feeCycle);
            var container = $('#additionalFieldsContainer');
            console.log(years==0);
            years=0;//comment this line if the dyanamic fee details has to show
            months=0;//comment this line if the dyanamic fee details has to show
            if(!(years==0 && months==0) && feeCycle!=undefined)
            {
                var count=0;
                switch (feeCycle) {
                    case "Yearly":                        
                        count=years+((months>0)?1:0);
                        break;
                    case "Semester":                 
                        count=(years*2)+((months>0 && months<7)?1:(months>6)?2:0);       
                        break;
                    default:
                        break;
                }
                container.empty();
                container.append('<h3>Fee Details</h3>');
                feeCycle = (feeCycle=="Yearly")?"Year":feeCycle;
                for (var i = 1; i <= count; i++) {
                    var section = `
                        <h4 class="text-center">${i} ${feeCycle}</h4>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Currency</label>
                                    <input type="text" id="currency${i}" name="currency[]" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Tuition Fees</label>
                                    <input type="number" id="tuition_fees${i}"name="tuition_fees[]" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Application Fees</label>
                                    <input type="number" id="application_fees${i}"name="application_fees[]" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Total Fees</label>
                                    <input type="number" id="total_fee${i}"name="total_fee[]" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="number" id="fee_year${i}" name="fee_year[]" class="form-control" required >
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label>Education Mode</label>
                                    <select class="form-control" name="fee_education_mode[]" id="fee_education_mode${i}" required>
                                        <option>Select education mode</option>
                                        <option value="online">Online</option>
                                        <option value="offline">Offline</option>
                                        <option value="both">Both</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="hr-border">
                    `;
                    container.append(section);
                }
            }
            else
            {
                //container.empty();//uncomment this line if the dyanamic fee details has to show
            }
        });
        $.validator.addMethod("validDuration", function (value, element) {
            var years = parseInt($("#duration_years").val(), 10);
            var months = parseInt(value, 10);
            return !(years === 0 && months === 0);
        }, "If duration years is 0, months should be greater than 0");
        $("#add_course").validate({
            rules: {
                course: {
                    required: true,
                },
                qualifications: {
                    required: false,
                },
                total_seats:{
                    required: false,
                    number: true,
                    min:1
                },
                examination_pattern:{
                    required: true,
                },
                scholarship:{
                    required: true,
                },
                placement:{
                    required: true,
                },
                duration_years: {
                    required: true,
                    min: 0,
                    max: 10
                },
                duration_months: {
                    required: true,
                    min: 0,
                    max: 11,
                    validDuration: true  // Using the custom rule
                },
                fee_cycle:{
                    required: true,
                },
                education_mode:{
                    required:true
                },
                currency: {
                    required: true,
                },
                tuition_fees:{
                    required: false,
                    number: true,
                    min:1
                },
                application_fees:{
                    required: false,
                    number: true,
                    min:1
                },
                total_fee: {
                    required: false,
                    number: true,
                    min:1
                }
            },
            messages: {
                scholarship: {
                    required: "Select scholarship",
                },
                placement: {
                    required: "Select placement",
                },
                course: {
                    required: "Select course",
                },
                qualifications:{
                    required:"Enter the qualifications"
                },
                total_seats:{
                    required:"Enter the total seats",
                    number: "Please enter a valid number",
                    min: "Total seats must be at least 1"
                },
                tuition_fees:{
                    required:"Enter the tution fees",
                    number: "Please enter a tution fees in number",
                    min: "Tuition fees must be at least 1"
                },
                application_fees:{
                    required:"Enter the application fees",
                    number: "Please enter a application fees in number",
                    min: "Application fees must be at least 1"
                },
                total_fee:{
                    required:"Enter the total fees",
                    number: "Please enter a total fees in number",
                    min: "Application fees must be at least 1"
                },
                examination_pattern:{
                    required:"select the examination pattern"
                },
                duration_years: {
                    required: "Select the duration (years)",
                    min: "Duration must be at least 0",
                    max: "Duration must be at most 10"
                },
                duration_months: {
                    required: "Select the duration (months)",
                    min: "Duration must be at least 0 months",
                    max: "Duration must be at most 11"
                },
                fee_cycle:{
                    required:"select the fee cycle"
                },
                education_mode:{
                    required:"select the education mode"
                },
                currency: {
                    required: "This field is required for currency.",
                },
                
            },
            errorPlacement: function(error, element) {
                
                if (element.attr("name") === "scholarship") {
                    error.appendTo("#scholarship_error");
                } else if (element.attr("name") === "placement") {
                    error.appendTo("#placement_error");
                } else if (element.attr("name") === "duration_years" || element.attr("name") === "duration_months") {
                    error.appendTo("#duration_error"); // Display error in a common element for duration
                } else {
                    // Handle other elements if needed
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                /*
                if ($.trim($('#description').summernote('code')) === '' || $.trim($('#description').summernote('code')) ==="<p><br></p>" ) 
                {    
                    $("#description_error").text("description cannot be empty.").css("display", "block");
                    return false; 
                }
                */
                              return true;
            }
        });
    }

    if ($('#add_admission').length) {
        $("#add_admission").validate({
            rules: {
            },
            messages: {
            },
            submitHandler: function (form) {
                var flag=0;
                $("#admission_information_en_error").text('').css("display", "none");
                if ($.trim($('#admission_information_en').summernote('code')) === '') 
                {    
                    $("#admission_information_en_error").text("Admission Information - EN cannot be empty.").css("display", "block");
                    //return false; 
                    flag=1;
                } 
                $("#admission_information_bn_error").text('').css("display", "none");
                if ($.trim($('#admission_information_bn').summernote('code')) === '') 
                {    
                    $("#admission_information_bn_error").text("Admission Information - BN cannot be empty.").css("display", "block");
                    // return false;
                    flag=1; 
                }   

                return flag?false:true;
            }
        });
    }

    if ($('#contact-table').length) {
       
        table = $('#contact-table').DataTable({
            "aLengthMenu": [
                [10,25,50,100],
                [10,25,50,100]
            ],
            "iDisplayLength": 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + '/institute/contact-all', // Your server-side controller URL
                type: 'GET',
                // data: {
                //     csrf_test_name: csrfToken,
                //     // Other data here
                // },
            },
            columns: [{
                    data: 'id',
                    orderable: false, // Disable sorting for the Sr. No. column
                    render: function(data, type, row, meta) {
                        // Render Sr. No. as an incrementing number
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'designation',
                    name: 'designation',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'phoneNumber',
                    name: 'phoneNumber',
                },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        var editUrl = baseUrl + '/institute/contact/' + row.id+'/edit';
                        var buttonsHtml =
                            '<a href="' + editUrl + '" class="material-symbols-outlined">edit_square</a>' +
                            '<a href="javascript:void(0)" onclick="deleteInstituteContactRow(' + row.id + ',\'' + row.name + '\')"  class="material-symbols-outlined">delete</a>';

                        return buttonsHtml;
                    },
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, 'desc']]
        });
    }

    if ($('#add_contact').length) {
       
        $("#add_contact").validate({
            rules: {
                email: {
                    required: false,
                    email: false,
                },
                name: {
                    required: false,
                },
                name_ban: {
                    required: false,
                },
                designation:{
                    required: false
                },
                gender:{
                    required:false
                },
                country_code:{
                    required:false
                },
                phone_number:{
                    required:true,
                    number:true
                }
            },
            messages: {
                email: {
                    required: 'Please enter your email',
                    email: 'Please enter a valid email address',
                },
                name: {
                    required: 'Please enter a contact person name',
                },
                designation: {
                    required: 'Please enter a contact person designation',
                },
                gender: {
                    required: 'Please select a gender',
                },
                country_code: {
                    required: 'Please enter a country code',
                },
                phone_number: {
                    required: 'Please enter phone number',
                    number: 'Please enter only numbers',
                },
            },
            errorPlacement: function(error, element) {
                console.log(element.attr("name"));
                if (element.attr("name") === "gender") {
                    error.appendTo("#gender-error");
                }
                else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                //var email = $('#add-institute #email').val();
                //var password = $('#add-institute #name').val();
                
                //alert("Emailinstitute: " + email + "\nPasswordinstitute: " + password);
                return true;
            }
        });
    }

    if ($('#student-testimonials-table').length) {
    
        table = $('#student-testimonials-table').DataTable({
            "aLengthMenu": [
                [10,25,50,100],
                [10,25,50,100]
            ],
            "iDisplayLength": 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + '/institute/student-testimonials-all', // Your server-side controller URL
                type: 'GET',
            },
            columns: [{
                    data: 'id',
                    orderable: false, // Disable sorting for the Sr. No. column
                    render: function(data, type, row, meta) {
                        // Render Sr. No. as an incrementing number
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: 'studentTestimonialsProfile',
                    name: 'studentTestimonialsProfile'
                },
                {
                    data: 'studentTestimonialsDesignation',
                    name: 'studentTestimonialsDesignation',
                },
                {
                    data: 'studentTestimonialsDescription',
                    name: 'studentTestimonialsDescription',
                },
                {
                    data: 'studentTestimonialsProfileImagePath',
                    name: 'studentTestimonialsProfileImagePath',
                    orderable: false,
                    render: function(data, type, row) {
                        // Show image preview if facilityIconUrl is available
                        return row.studentTestimonialsProfileImagePath
                            ? '<a href="' + row.studentTestimonialsProfileImagePath + '" target="blank"> <img src="' + row.studentTestimonialsProfileImagePath + '" alt="Icon" style="max-width: 100px; max-height: auto;"></a>'
                            : '';
                    },
                },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        var editUrl = baseUrl + '/institute/student-testimonials/' + row.studentTestimonialsId+'/edit';
                        // var viewUrl = baseUrl + '/admin/institute-courses/details/' + row.id;

                        var buttonsHtml =
                            '<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                            // '<a href="' + viewUrl + '" class="btn btn-primary btn-sm">View</a>' +
                            '<a href="javascript:void(0)" onclick="deleteStudentTestimonialsRow(' + row.studentTestimonialsId + ',\'' + row.studentTestimonialsProfile + '\')"  class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                        return buttonsHtml;
                    },
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, 'desc']]
        });
    }

    if ($('#add_student_testimonials').length) {
        $("#add_student_testimonials").validate({
            rules: {
                name: {
                    required: true,
                },
                designation: {
                    required: true,
                },
                description: {
                    required: true,
                },
                student_photo:{
                    required: true,
                    validWebp: true, // Custom method to check for valid WebP files
                    checkFileSize:true
                }
            },
            messages: {
                rank: {
                    required: "Enter the name",
                },
                designation: {
                    required: "Enter the designation",
                },
                student_photo: {
                    required: "Select photo",
                    validWebp: "Please select a valid WebP image file",
                    checkFileSize: "Maximum file size is 500KB",
                },
                description:{
                    required:"Enter the description"
                }
                
            },
            // errorPlacement: function(error, element) {
                
            //     if (element.attr("name") === "scholarship") {
            //         error.appendTo("#scholarship_error");
            //     } else if (element.attr("name") === "placement") {
            //         error.appendTo("#placement_error");
            //     } else if (element.attr("name") === "duration_years" || element.attr("name") === "duration_months") {
            //         error.appendTo("#duration_error"); // Display error in a common element for duration
            //     } else {
            //         // Handle other elements if needed
            //         error.insertAfter(element);
            //     }
            // },
            submitHandler: function (form) {
                // var amount = $('#amount').val();
                // var description = $('#description').val();           
                 
                // alert("amount: " + amount + "\n description: " + description);
                return true;
            }
        });
        // Custom method for validating WebP file type
        $.validator.addMethod('validWebp', function(value, element) {
            // Check if the file type is WebP
            return this.optional(element) || (element.files[0] && element.files[0].type === 'image/webp');
        });
        $.validator.addMethod('checkFileSize', function(value, element, param) {
            // Check if file exists and its size is less than or equal to maxSize
            return this.optional(element) || (element.files[0] && element.files[0].size <= 500 * 1024);
        });
    }

    if ($('#edit_student_testimonials').length) {
        $("#edit_student_testimonials").validate({
            rules: {
                name: {
                    required: true,
                },
                designation: {
                    required: true,
                },
                description: {
                    required: true,
                },
                student_photo:{
                    required: false,
                    validWebp: true, // Custom method to check for valid WebP files
                    checkFileSize:true
                }
            },
            messages: {
                rank: {
                    required: "Enter the name",
                },
                designation: {
                    required: "Enter the designation",
                },
                description:{
                    required:"Enter the description"
                },
                student_photo: {
                    required: "Select photo",
                    validWebp: "Please select a valid WebP image file",
                    checkFileSize: "Maximum file size is 500KB",
                }
                
            },
            // errorPlacement: function(error, element) {
                
            //     if (element.attr("name") === "scholarship") {
            //         error.appendTo("#scholarship_error");
            //     } else if (element.attr("name") === "placement") {
            //         error.appendTo("#placement_error");
            //     } else if (element.attr("name") === "duration_years" || element.attr("name") === "duration_months") {
            //         error.appendTo("#duration_error"); // Display error in a common element for duration
            //     } else {
            //         // Handle other elements if needed
            //         error.insertAfter(element);
            //     }
            // },
            submitHandler: function (form) {
                // var amount = $('#amount').val();
                // var description = $('#description').val();           
                 
                // alert("amount: " + amount + "\n description: " + description);
                return true;
            }
        });
        // Custom method for validating WebP file type
        $.validator.addMethod('validWebp', function(value, element) {
            // Check if the file type is WebP
            return this.optional(element) || (element.files[0] && element.files[0].type === 'image/webp');
        });
        $.validator.addMethod('checkFileSize', function(value, element, param) {
            // Check if file exists and its size is less than or equal to maxSize
            return this.optional(element) || (element.files[0] && element.files[0].size <= 500 * 1024);
        });
    }

    if ($('#video-table').length) {
       
        table = $('#video-table').DataTable({
            "aLengthMenu": [
                [10,25,50,100],
                [10,25,50,100]
            ],
            "iDisplayLength": 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + '/institute/video-all', // Your server-side controller URL
                type: 'GET',
                // data: {
                //     csrf_test_name: csrfToken,
                //     // Other data here
                // },
            },
            columns: [{
                    data: 'id',
                    orderable: false, // Disable sorting for the Sr. No. column
                    render: function(data, type, row, meta) {
                        // Render Sr. No. as an incrementing number
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: 'title',
                    name: 'title',
                    orderable: false,
                },
                {
                    data: 'titleBan',
                    name: 'titleBan',
                    orderable: false,
                },
                {
                    data: 'youtubeId',
                    name: 'youtubeId',
                    orderable: false,
                },
                {
                    data: 'youtubeId',
                    name: 'youtubeId',
                    orderable: false,
                    render: function(data, type, row) {
                        // Assuming data contains the YouTube video ID
                        var youtubeUrl = "https://www.youtube.com/watch?v=" + data;
                        return '<a href="' + youtubeUrl + '" target="_blank">' + youtubeUrl + '</a>';
                    }
                },                
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        var editUrl = baseUrl + '/institute/video/' + row.id+'/edit';
                        var buttonsHtml =
                            '<a href="' + editUrl + '" class="material-symbols-outlined">edit_square</a>' +
                            '<a href="javascript:void(0)" onclick="deleteInstituteVideoRow(' + row.id + ',\'' + row.name + '\')"  class="material-symbols-outlined">Delete</a>';

                        return buttonsHtml;
                    },
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, 'desc']]
        });
    }

    if ($('#add_video').length) {

        $("#add_video").validate({
            rules: {
                title: {
                    required: true,
                },
                title_ban: {
                    required: true,
                },
                youtube_id:{
                    required: true
                }
            },
            messages: {
                title: {
                    required: 'Please enter an English video title',
                },
                title_ban: {
                    required: 'Please enter a Bengali video title',
                },
                youtube_id: {
                    required: 'Please enter a YouTube ID',
                }
            },
            errorPlacement: function(error, element) {
                console.log(element.attr("name"));
                error.insertAfter(element); // Insert error message after the input element
            },
            submitHandler: function(form) {
                //alert($("#title").val());
                return true;
            }
        });
    }

    if ($('#gallery-table').length) {
       
        table = $('#gallery-table').DataTable({
            "aLengthMenu": [
                [10,25,50,100],
                [10,25,50,100]
            ],
            "iDisplayLength": 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + '/institute/gallery-all', // Your server-side controller URL
                type: 'GET',
                // data: {
                //     csrf_test_name: csrfToken,
                //     // Other data here
                // },
            },
            columns: [{
                    data: 'id',
                    orderable: false, // Disable sorting for the Sr. No. column
                    render: function(data, type, row, meta) {
                        // Render Sr. No. as an incrementing number
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'titleBan',
                    name: 'titleBan'
                },
                {
                    // data: 'facilityIconUrl',
                    // name: 'name',
                    // orderable: false,
                    data: 'imagePath',
                    name: 'imagePath',
                    orderable: false,
                    render: function(data, type, row) {
                        // Show image preview if facilityIconUrl is available
                        return row.imagePath
                            ? '<a href="' + row.imagePath + '" target="blank"> <img src="' + row.imagePath + '" alt="Icon" style="max-width: 100px; max-height: auto;"></a>'
                            : '';
                    },
                },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        var editUrl = baseUrl + '/institute/gallery/' + row.id+'/edit';
                        // var viewUrl = baseUrl + '/admin/institute-courses/details/' + row.id;

                        var buttonsHtml =
                            '<a href="' + editUrl + '" class="material-symbols-outlined">Edit</a>' +
                            // '<a href="' + viewUrl + '" class="btn btn-primary btn-sm">View</a>' +
                            '<a href="javascript:void(0)" onclick="deleteGalleryRow(' + row.id + ',\'' + row.title + '\')"  class="material-symbols-outlined"> Delete </a>';

                        return buttonsHtml;
                    },
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, 'desc']]
        });
    }

    if ($('#add_gallery').length) {
        $("#add_gallery").validate({
            rules: {
                title: {
                    required: true,
                },
                title_ban: {
                    required: true,
                },
                photo: {
                    required: true,
                    // accept: "image/webp",
                    validWebp: true, // Custom method to check for valid WebP files
                    checkFileSize:true
                    // filesize: 500000, // 500KB in bytes
                }
            },
            messages: {
                title: {
                    required: "Enter the title in english",
                },
                title_ban: {
                    required: "Enter the title in bangla",
                },
                photo: {
                    required: "Select photo",
                    validWebp: "Please select a valid WebP image file",
                    checkFileSize: "Maximum file size is 500KB",
                }
                
            },
            submitHandler: function (form) {
                // var amount = $('#amount').val();
                // var description = $('#description').val();           
                 
                // alert("amount: " + amount + "\n description: " + description);
                return true;
            }
        });
        // Custom method for validating WebP file type
        $.validator.addMethod('validWebp', function(value, element) {
            // Check if the file type is WebP
            return this.optional(element) || (element.files[0] && element.files[0].type === 'image/webp');
        });
        $.validator.addMethod('checkFileSize', function(value, element, param) {
            // Check if file exists and its size is less than or equal to maxSize
            return this.optional(element) || (element.files[0] && element.files[0].size <= 500 * 1024);
        });
    }
    if ($('#edit_gallery').length) {
        $("#edit_gallery").validate({
            rules: {
                title: {
                    required: true,
                },
                title_ban: {
                    required: true,
                },
                photo: {
                    required: false,
                    // accept: "image/webp",
                    validWebp: true, // Custom method to check for valid WebP files
                    checkFileSize:true
                    // filesize: 500000, // 500KB in bytes
                }
            },
            messages: {
                title: {
                    required: "Enter the title in english",
                },
                title_ban: {
                    required: "Enter the title in bangla",
                },
                photo: {
                    required: "Select photo",
                    validWebp: "Please select a valid WebP image file",
                    checkFileSize: "Maximum file size is 500KB",
                }
                
            },
            submitHandler: function (form) {
                // var amount = $('#amount').val();
                // var description = $('#description').val();           
                 
                // alert("amount: " + amount + "\n description: " + description);
                return true;
            }
        });
        // Custom method for validating WebP file type
        $.validator.addMethod('validWebp', function(value, element) {
            // Check if the file type is WebP
            return this.optional(element) || (element.files[0] && element.files[0].type === 'image/webp');
        });
        $.validator.addMethod('checkFileSize', function(value, element, param) {
            // Check if file exists and its size is less than or equal to maxSize
            return this.optional(element) || (element.files[0] && element.files[0].size <= 500 * 1024);
        });
    }
    if ($('#add_faqs').length) {
        $("#add_faqs").validate({
            rules: {
                question: {
                    required: true,
                },
                answer: {
                    required: true,
                },
                content_type: {
                    required: true,
                },
                question_ban: {
                    required: true,
                },
                answer_ban: {
                    required: true,
                },
                content_type_ban: {
                    required: true,
                }
            },
            messages: {
                question: {
                    required: "Enter the question",
                },
                answer: {
                    required: "Enter the answer",
                },
                content_type:{
                    required:"Enter the content type"
                },
                question_ban: {
                    required: "Enter the question in bangla",
                },
                answer_ban: {
                    required: "Enter the answer in bangla",
                },
                content_type_ban:{
                    required:"Enter the content type in bangla"
                }
                
            },
            submitHandler: function (form) {
                return true;
            }
        });
    }
    if ($('#faqs-table').length) {
       
        table = $('#faqs-table').DataTable({
            "aLengthMenu": [
                [10,25,50,100],
                [10,25,50,100]
            ],
            "iDisplayLength": 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + '/institute/faqs-all', // Your server-side controller URL
                type: 'GET',
                // data: {
                //     csrf_test_name: csrfToken,
                //     // Other data here
                // },
            },
            columns: [{
                    data: 'id',
                    orderable: false, // Disable sorting for the Sr. No. column
                    render: function(data, type, row, meta) {
                        // Render Sr. No. as an incrementing number
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: 'question',
                    name: 'question'
                },
                {
                    data: 'answer',
                    name: 'answer',
                },
                {
                    data: 'contentType',
                    name: 'contentType',
                },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        var editUrl = baseUrl + '/institute/faqs/' + row.id+'/edit';
                        var buttonsHtml =
                            '<a href="' + editUrl + '" class="material-symbols-outlined">Edit</a>' +
                            '<a href="javascript:void(0)" onclick="deleteInstituteFaqsRow(' + row.id + ',\'' + row.InstituteFaqsQuestion + '\')"  class="material-symbols-outlined"> Delete </a>';

                        return buttonsHtml;
                    },
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, 'desc']]
        });
    }
});