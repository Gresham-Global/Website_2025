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
                    if (response.data && response.data.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.data.message,
                        });

                        var dataTable = $(data_table_id).DataTable();
                        dataTable.ajax.reload(null, false);

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.data.message,
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
function deleteDisciplineRow(rowId,name) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = '/admin/master/discipline/delete';
    var data_table_id = '#discipline-table';
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
    // Swal.fire({
    //     icon: 'info',
    //     title: 'Delete',
    //     html:"Are you sure you want to delete this discipline <strong>"+name+"</strong>?",
    //     showDenyButton: true,
    //     showCancelButton: false,
    //     confirmButtonText: 'Yes',
    //     denyButtonText: `No`,
    // }).then((result) => {
    //     if (result.isConfirmed) {
    //         alert("Hii");
    //         // var data = "status=1&paricipation_type=0&id="+rowId; 
    //         $.ajax({
    //             url: baseUrl + '/admin/master/discipline/' + rowId+'/delete',
    //             dataType: 'json',
    //             // data: data,
    //             type: 'POST',
    //             success: function(response) {
    //                 console.log(response);
    //                 if (response.status == '1') {
    //                     // Get the current page before the update
    //                     // var currentPage = table.page.info().page;

    //                     // var row = table.row($('a[data-id="' + id + '"]').closest('tr')); // Assuming 'table' is your DataTables instance
    //                     // row.data()['status'] = 'Under Review'; // Update the status value
                       
    //                     // // Redraw the table to reflect the changes
    //                     // //table.draw();

    //                     // // Redraw the table to reflect the changes
    //                     // table.draw(false);

    //                     // // Go back to the current page
    //                     // table.page(currentPage).draw('page');
    //                 }
    //                 else
    //                 {
    //                     Swal.fire({
    //                         icon: 'error',
    //                         title: 'Oops...',
    //                         text: 'Something went wrong!',
    //                     })
    //                 }
                    
    //             }
    //         });                                
    //     }
    // });
    // Add your actual delete logic here, such as making an AJAX request to delete the discipline row.
    //     // Example: 
    //     // $.ajax({
    //     //     url: '/deleteDisciplineRow/' + rowId,
    //     //     method: 'DELETE',
    //     //     success: function(response) {
    //     //         // Handle success
    //     //         table.ajax.reload(); // Reload the DataTable after successful deletion
    //     //     },
    //     //     error: function(error) {
    //     //         // Handle error
    //     //     }
    //     // });
}

function deleteFacilityCategoryRow(rowId,name) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = '/admin/master/facility-category/delete';
    var data_table_id = '#facility-category-table';
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

function deleteFacilityRow(rowId,name) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = '/admin/master/facility/delete';
    var data_table_id = '#facility-table';
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}   

function deletePlacementCompaniesRow(rowId,name) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = '/admin/master/placement-companies/delete';
    var data_table_id = '#placement-companies-table';
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

function deleteCourseRow(rowId,name) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = '/admin/master/course/delete';
    var data_table_id = '#course-table';
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

function deleteSpecializationMasterRow(rowId,name) {
    // Your delete logic here
    //console.log('Delete row with ID:', rowId);
    var id = rowId;
    var action_path = '/admin/master/specialization-master/delete';
    var data_table_id = '#specialization-master-table';
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

function deleteBlogRow(rowId,name) {
    var id = rowId;
    var action_path = '/admin/blog/delete';
    var data_table_id = '#blog-table';
    deleteRecordWithSweetAlert(id, action_path, data_table_id);
}

$(document).ready(function() {
    $(".alert-success").delay(5000).slideUp(300);
    $(".alert-danger").delay(5000).slideUp(300);
    
    if ($('#add-institute').length) {
        $("#add-institute").validate({
            rules: {
                name: {
                    required: true,
                },
                email:{
                    required: true,
                    email: true,
                },
                phoneNumber:{
                    required: true,
                },
                website:{
                    required: true,
                    url:true
                },
                establish_date:{
                    required: true,
                },
                institute_type:{
                    required: true,
                },
                coed_status:{
                    required: true,
                },
                pre_interview:{
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Enter the institute name",
                },
                email:{
                    required:"Enter the email",
                    email:"Enter the correct email"
                },
                phoneNumber:{
                    required: "Enter the phone number",
                },
                website:{
                    required:"Enter the website url",
                    url:"Enter the correct website url"
                },
                establish_date:{
                    required: "Enter the institute establish date",
                },
                institute_type:{
                    required: "Select the institute type",
                },
                coed_status:{
                    required: "Select the coed status",
                },
                pre_interview:{
                    required: "Select the pre interview",
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") === "institute_type") {
                    // Show the error message
                    $("#institute_type-error").css("display", "block");
                    // Append the error message to the label
                    error.appendTo("#institute_type-error");
                } else if (element.attr("name") === "coed_status") {
                    error.appendTo("#coed_status-error");
                } else if (element.attr("name") === "pre_interview") {
                    error.appendTo("#pre_interview-error");
                } else {
                    // Handle other elements if needed
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                var disciplineName = $('#name').val();
                var description = $('#description').val();           
                 
               // alert("name: " + disciplineName + "\n description: " + description);
               
                return true;
            }
        });
    }
    if ($('#add_discipline').length) {
        $("#add_discipline").validate({
            rules: {
                name: {
                    required: true,
                },
                name_bn: {
                    required: true,
                },
                discipline_icon_url: {
                    required: true,
                    validImage: true, // Custom method to check for valid WebP files
                    checkFileSize:true
                }
            },
            messages: {
                name: {
                    required: "Enter the name",
                },
                name_bn:{
                    required:"Enter the name"
                },
                discipline_icon_url:{
                    required:"Select Icon",
                    validImage: "Please select a valid SVG / Webp image file",
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
                var disciplineName = $('#name').val();
                var disciplineNameBn = $('#name_bn').val();
                var description = $('#description').val();           
                var descriptionBn = $('#description_bn  ').val();           
                 
               // alert("name: " + disciplineName + "\n description: " + description);
               
                return true;
            }
        });
        $.validator.addMethod('validImage', function(value, element) {
            // Check if the file type is WebP
            return this.optional(element) || ((element.files[0] && element.files[0].type === 'image/svg+xml') || (element.files[0] && element.files[0].type === 'image/svg') || (element.files[0] && element.files[0].type === 'image/webp'));
        });
        $.validator.addMethod('checkFileSize', function(value, element, param) {
            // Check if file exists and its size is less than or equal to maxSize
            return this.optional(element) || (element.files[0] && element.files[0].size <= 500 * 1024);
        });
    }
    if ($('#add_course').length) {
        $.validator.addMethod('validImage', function(value, element) {
            // Check if the file type is WebP
            return this.optional(element) || ((element.files[0] && element.files[0].type === 'image/svg+xml') || (element.files[0] && element.files[0].type === 'image/svg') || (element.files[0] && element.files[0].type === 'image/webp'));
        });
        $.validator.addMethod('checkFileSize', function(value, element, param) {
            // Check if file exists and its size is less than or equal to maxSize
            return this.optional(element) || (element.files[0] && element.files[0].size <= 500 * 1024);
        });
        $("#add_course").validate({
            rules: {
                name: {
                    required: true,
                },
                name_bn: {
                    required: true,
                },
                short_name: {
                    required: true,
                },
                short_name_bn: {
                    required: true,
                },
                discipline_id: {
                    required: true,
                },
                program_level: {
                    required: true,
                },
                // eligibility: {
                //     required: false,
                // },
                // eligibility_bn: {
                //     required: false,
                // },
                // description: {
                //     required: false,
                // },
                // description_bn: {
                //     required: false,
                // },
                specialization_master_id: {
                    required: true,
                },
                banner_image: {
                    required: false,
                    validImage: true, // Custom method to check for valid WebP files
                    checkFileSize:true
                },
                 mb_banner_image: {
                    required: false,
                    validImage: true, // Custom method to check for valid WebP files
                    checkFileSize:true
                }
            },
            messages: {
                name: {
                    required:"Enter the name",
                },
                name_bn: {
                    required:"Enter the name",
                },
                short_name:{
                    required:"Enter the short name"
                },
                short_name_bn:{
                    required:"Enter the short name"
                },
                discipline_id:{
                    required:"Select the discipline"
                },
                program_level:{
                    required:"Select the program level"
                },
                // eligibility:{
                //     required:"Enter the eligibility"
                // },
                // eligibility_bn:{
                //     required:"Enter the eligibility"
                // },
                // description:{
                //     required:"Enter the description"
                // },
                // description_bn:{
                //     required:"Enter the description"
                // },
                specialization_master_id:{
                    required:"Select specialization"
                },
                banner_image:{
                    validImage: "Please select a valid SVG / Webp image file",
                    checkFileSize: "Maximum file size is 500KB",
                },
                mb_banner_image:{
                    validImage: "Please select a valid SVG / Webp image file",
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
                //var amount = $('#amount').val();
                //var description = $('#description').val();           
                 
                //alert("amount: " + amount + "\n description: " + description);
                return true;
            }
        });
    }
    if ($('#add_specialization_master').length) {
        $("#add_specialization_master").validate({
            rules: {
                name: {
                    required: true,
                },
                description:{
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Enter the name",
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
                return true;
            }
        });
    }
    if ($('#add_facility_category').length) {
        $("#add_facility_category").validate({
            rules: {
                name: {
                    required: true,
                },
                description:{
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Enter the name",
                },
                description:{
                    required:"Enter the description"
                }
                
            },
            submitHandler: function (form) {
                var amount = $('#amount').val();
                var description = $('#description').val();           
                 
                // alert("amount: " + amount + "\n description: " + description);
                return true;
            }
        });
    }
    if ($('#add_facility').length) {
        $("#add_facility").validate({
            rules: {
                name: {
                    required: true,
                },
                description:{
                    required: true,
                },
                facility_category_id:{
                    required: true,
                },
                facility_icon_url:{
                    required: true,
                }
                
            },
            messages: {
                name: {
                    required: "Enter the name",
                },
                description:{
                    required:"Enter the description"
                },
                facility_category_id: {
                    required: "Select facility category",
                },
                facility_icon_url:{
                    required:"Enter the facility icon url"
                }
                
            },
            submitHandler: function (form) {
                return true;
            }
        });
    }
    if ($('#edit_facility').length) {
        $("#edit_facility").validate({
            rules: {
                name: {
                    required: true,
                },
                description:{
                    required: true,
                },
                facility_category_id:{
                    required: true,
                }
                
            },
            messages: {
                name: {
                    required: "Enter the name",
                },
                description:{
                    required:"Enter the description"
                },
                facility_category_id: {
                    required: "Select facility category",
                }                
            },
            submitHandler: function (form) {
                return true;
            }
        });
    }
    if ($('#add_placement_companies').length) {
        $("#add_placement_companies").validate({
            rules: {
                name: {
                    required: true,
                },
                details:{
                    required: true,
                },
                logo:{
                    required: true,
                },
                status:{
                    required: true,
                }
                
            },
            messages: {
                name: {
                    required: "Enter the placement company name",
                },
                details:{
                    required:"Enter the placement company details"
                },
                logo:{
                    required:"Add the placement company logo"
                },
                status: {
                    required: 'Please select a active status',
                }
                
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") === "status") {        
                    // console.log(error);            
                    // error.appendTo("#status-error");
                    $("#status-error").html("Please select a active status")
                    $("#status-error").css("display", "block");
                }
                else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                return true;
            }
        });
    }
    if ($('#edit_placement_companies').length) {
        $("#edit_placement_companies").validate({
            rules: {
                name: {
                    required: true,
                },
                details:{
                    required: true,
                }
                
            },
            messages: {
                name: {
                    required: "Enter the placement company name",
                },
                details:{
                    required:"Enter the placement company details"
                },
                
            },
            submitHandler: function (form) {
                return true;
            }
        });
    }
    if ($('#discipline-table').length) {
       
        table = $('#discipline-table').DataTable({
            "aLengthMenu": [
                [10,25,50,100],
                [10,25,50,100]
            ],
            "iDisplayLength": 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + '/admin/master/discipline-all', // Your server-side controller URL
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
                    data: 'disciplineName',
                    name: 'name'
                },
                {
                    data: 'disciplineDescription',
                    name: 'description'
                },
                {
                    // data: 'facilityIconUrl',
                    // name: 'name',
                    // orderable: false,
                    data: 'disciplineIconUrl',
                    name: 'IconUrl',
                    orderable: false,
                    render: function(data, type, row) {
                        // Show image preview if facilityIconUrl is available
                        return row.disciplineIconUrl
                            ? '<a href="' + row.disciplineIconUrl + '" target="blank"> <img src="' + row.disciplineIconUrl + '" alt="Icon" style="max-width: 100px; max-height: auto;"></a>'
                            : '';
                    },
                },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        var editUrl = baseUrl + '/admin/master/discipline/' + row.id+'/edit';
                        var viewUrl = baseUrl + '/admin/institute-courses/details/' + row.id;

                        var buttonsHtml =
                            '<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                            // '<a href="' + viewUrl + '" class="btn btn-primary btn-sm">View</a>' +
                            '<a href="javascript:void(0)" onclick="deleteDisciplineRow(' + row.id + ',\'' + row.disciplineName + '\')"  class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                        return buttonsHtml;
                    },
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, 'desc']]
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
                url: baseUrl + '/admin/master/course-all', // Your server-side controller URL
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
                    name: 'name'
                },
                // {
                //     data: 'courseShortName',
                //     name: 'name'
                // },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        
                        return row['courseDiscipline']['DisciplineName'];
                    },
                },
                // {
                //     data: 'courseDescription',
                //     name: 'description'
                // },
                {
                    data: 'courseEligibility',
                    name: 'name'
                },
                {
                    data: 'courseSubject',
                    name: 'description'
                },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        var editUrl = baseUrl + '/admin/master/course/' + row.id+'/edit';
                        var viewUrl = baseUrl + '/admin/institute-courses/details/' + row.id;

                        var buttonsHtml =
                            '<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                            // '<a href="' + viewUrl + '" class="btn btn-primary btn-sm">View</a>' +
                            '<a href="javascript:void(0)" onclick="deleteCourseRow(' + row.id + ',\'' + row.disciplineName + '\')"  class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                        return buttonsHtml;
                    },
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, 'desc']]
        });
    }
    if ($('#specialization-master-table').length) {
       
        table = $('#specialization-master-table').DataTable({
            "aLengthMenu": [
                [10,25,50,100],
                [10,25,50,100]
            ],
            "iDisplayLength": 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + '/admin/master/specialization-master-all', // Your server-side controller URL
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
                    data: 'specializationMasterName',
                    name: 'name'
                },
                {
                    data: 'specializationMasterDescription',
                    name: 'description'
                },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        var editUrl = baseUrl + '/admin/master/specialization-master/' + row.id+'/edit';
                        var viewUrl = baseUrl + '/admin/institute-courses/details/' + row.id;

                        var buttonsHtml =
                            '<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                            // '<a href="' + viewUrl + '" class="btn btn-primary btn-sm">View</a>' +
                            '<a href="javascript:void(0)" onclick="deleteSpecializationMasterRow(' + row.id + ',\'' + row.specializationMasterName + '\')"  class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                        return buttonsHtml;
                    },
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, 'desc']]
        });
    }
    if ($('#facility-category-table').length) {
       
        table = $('#facility-category-table').DataTable({
            "aLengthMenu": [
                [10,25,50,100],
                [10,25,50,100]
            ],
            "iDisplayLength": 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + '/admin/master/facility-category-all', // Your server-side controller URL
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
                    data: 'facilityCategoryName',
                    name: 'name'
                },
                {
                    data: 'facilityCategoryDescription',
                    name: 'description',
                    // render: function(data, type, row) {
                    //     // Check if the value is null, and display "NA" in that case
                    //     return data !== null ? data : 'NA';
                    // }
                },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        var editUrl = baseUrl + '/admin/master/facility-category/' + row.id+'/edit';
                        var viewUrl = baseUrl + '/admin/institute-courses/details/' + row.id;

                        var buttonsHtml =
                            '<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                            // '<a href="' + viewUrl + '" class="btn btn-primary btn-sm">View</a>' +
                            '<a href="javascript:void(0)" onclick="deleteFacilityCategoryRow(' + row.id + ',\'' + row.disciplineName + '\')"  class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                        return buttonsHtml;
                    },
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, 'desc']]
        });
    }
    if ($('#facility-table').length) {
       
        table = $('#facility-table').DataTable({
            "aLengthMenu": [
                [10,25,50,100],
                [10,25,50,100]
            ],
            "iDisplayLength": 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + '/admin/master/facility-all', // Your server-side controller URL
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
                    data: 'facilityName',
                    name: 'name'
                },
                {
                    data: 'facilityDescription',
                    name: 'description',
                    // render: function(data, type, row) {
                    //     // Check if the value is null, and display "NA" in that case
                    //     return data !== null ? data : 'NA';
                    // }
                },
                {
                    // data: 'facilityIconUrl',
                    // name: 'name',
                    // orderable: false,
                    data: 'facilityIconUrlPath',
                    name: 'IconUrl',
                    orderable: false,
                    render: function(data, type, row) {
                        // Show image preview if facilityIconUrl is available
                        return row.facilityIconUrlPath
                            ? '<a href="' + row.facilityIconUrlPath + '" target="blank"> <img src="' + row.facilityIconUrlPath + '" alt="Icon" style="max-width: 100px; max-height: auto;"></a>'
                            : '';
                    },
                },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        
                        return row['facilityCategory']['category_name'];
                    },
                },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        var editUrl = baseUrl + '/admin/master/facility/' + row.id+'/edit';
                        var viewUrl = baseUrl + '/admin/institute-courses/details/' + row.id;

                        var buttonsHtml =
                            '<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                            // '<a href="' + viewUrl + '" class="btn btn-primary btn-sm">View</a>' +
                            '<a href="javascript:void(0)" onclick="deleteFacilityRow(' + row.id + ',\'' + row.disciplineName + '\')"  class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                        return buttonsHtml;
                    },
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, 'desc']]
        });
    }
    if ($('#placement-companies-table').length) {
       
        table = $('#placement-companies-table').DataTable({
            "aLengthMenu": [
                [10,25,50,100],
                [10,25,50,100]
            ],
            "iDisplayLength": 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + '/admin/master/placement-companies-all', // Your server-side controller URL
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
                    data: 'placementCompaniesName',
                    name: 'placementCompaniesName'
                },
                {
                    data: 'placementCompaniesDetail',
                    name: 'placementCompaniesDetail',
                    // render: function(data, type, row) {
                    //     // Check if the value is null, and display "NA" in that case
                    //     return data !== null ? data : 'NA';
                    // }
                },
                {
                    // data: 'facilityIconUrl',
                    // name: 'name',
                    // orderable: false,
                    data: 'placementCompaniesStatus',
                    name: 'placementCompaniesStatus',
                    orderable: true,
                    render: function(data, type, row) {
                        // Show image preview if facilityIconUrl is available
                        return row.placementCompaniesStatus==1 
                            ? 'Yes'
                            : 'No';
                    },
                },
                {
                    // data: 'facilityIconUrl',
                    // name: 'name',
                    // orderable: false,
                    data: 'placementCompaniesLogoPath',
                    name: 'placementCompaniesLogoPath',
                    orderable: false,
                    render: function(data, type, row) {
                        // Show image preview if facilityIconUrl is available
                        return row.placementCompaniesLogoPath
                            ? '<a href="' + row.placementCompaniesLogoPath + '" target="blank"> <img src="' + row.placementCompaniesLogoPath + '" alt="Icon" style="max-width: 100px; max-height: auto;"></a>'
                            : '';
                    },
                },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        var editUrl = baseUrl + '/admin/master/placement-companies/' + row.placementCompaniesId+'/edit';
                        // var viewUrl = baseUrl + '/admin/institute-courses/details/' + row.id;

                        var buttonsHtml =
                            '<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                            // '<a href="' + viewUrl + '" class="btn btn-primary btn-sm">View</a>' +
                            '<a href="javascript:void(0)" onclick="deletePlacementCompaniesRow(' + row.placementCompaniesId + ',\'' + row.placementCompaniesName + '\')"  class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                        return buttonsHtml;
                    },
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, 'desc']]
        });
    }
    if ($('#enquiries-table1').length) {
       
        table = $('#enquiries-table').DataTable({
            "aLengthMenu": [
                [10,25,50,100],
                [10,25,50,100]
            ],
            "iDisplayLength": 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + '/admin/enquiries-all', // Your server-side controller URL
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
                    data: 'fullName',
                    name: 'fullName'
                },
                {
                    data: 'email',
                    name: 'email',
                    // render: function(data, type, row) {
                    //     // Check if the value is null, and display "NA" in that case
                    //     return data !== null ? data : 'NA';
                    // }
                },
                {
                    data: 'phone',
                    name: 'phone',
                    // orderable: true,
                    // render: function(data, type, row) {
                    //     // Show image preview if facilityIconUrl is available
                    //     return row.countryCode+" "+row.phone;
                    // },
                },
                {
                    data: 'courseName',
                    name: 'courseName',
                    
                },
                {
                    data: 'updatedAt',
                    name: 'updatedAt',
                    
                }
            ],
            // Initial sorting by ID column in descending order
            order: [[0, 'desc']]
        });


        $('#downloadBtn').click(function(){
            alert("Hii");
        });

    }

    if ($('#blog-table').length) {
       
        table = $('#blog-table').DataTable({
            "aLengthMenu": [
                [10,25,50,100],
                [10,25,50,100]
            ],
            "iDisplayLength": 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: baseUrl + '/admin/blog-all', // Your server-side controller URL
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
                        var viewBlogUrl = baseUrl + '/blog-detail/' + row.slug;
                        var editBlogUrl = baseUrl + '/admin/blog/edit/' + row.id;
                        var buttonsHtml =
                            '<a href="' + viewBlogUrl + '" class="btn btn-warning btn-sm" target="_blank">View</a>' +
                            '<a href="' + editBlogUrl + '" class="btn btn-primary btn-sm">Edit</a>' +
                            '<a href="javascript:void(0)" onclick="deleteBlogRow(' + row.id + ',\'' + row.title + '\')"  class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';
                            
                        return buttonsHtml;
                    },
                },
            ],
            // Initial sorting by ID column in descending order
            order: [[0, 'desc']]
        });
    }
    if ($('#enquiries-table').length) {
       

        $('#downloadBtn').click(function(){
            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();
            if(start_date=="" || end_date=="")
            {
                $('#error-download').html("Please select both days for download the data").removeClass("hide");
                return false;
            }
            $('#error-download').addClass("hide");
            var downloadUrl = baseUrl + "/admin/enquiries-download?start_date="+start_date+"&end_date="+end_date;

            // Create an anchor element
            var link = document.createElement('a');

            // Set the download URL as the href attribute
            link.href = downloadUrl;

            // Set the target attribute to '_blank' to open in a new tab
            link.target = '_blank';

            // Trigger a click event on the anchor element
            link.click();

            // $.ajax({
            //     type: "get",
            //     url: baseUrl + "/admin/enquiries-download",
            //     data: {
            //         start_date: start_date,
            //         end_date:end_date,
            //     },
            //     dataType: 'json',
            //     success: function(response) {
            //         console.log(response);
            //         if (response.data && response.data.status) {
            //             Swal.fire({
            //                 icon: 'success',
            //                 title: 'Success',
            //                 text: response.data.message,
            //             });

            //             var dataTable = $(data_table_id).DataTable();
            //             dataTable.ajax.reload(null, false);

            //         } else {
            //             Swal.fire({
            //                 icon: 'error',
            //                 title: 'Error',
            //                 text: response.data.message,
            //             });
            //         }
            //     },
            //     error: function(xhr, status, error) {
            //         // Swal.fire({
            //         //     icon: 'error',
            //         //     title: 'Error',
            //         //     text: status+'--'+error,
            //         // });
            //     }
            // });
        });

    }

   

   
});

function toggleUniversityDiv(value) {
    if (value) {
        $('#select_university_div').hide(); // Show select_university_div
    } else {
        $('#select_university_div').show(); // Hide select_university_div
        if($('#select_university_div').hasClass("hide"))
            $('#select_university_div').removeClass("hide")
    }
}