$(document).ready(function() {
    $(".alert-success").delay(5000).slideUp(300);
    $(".alert-danger").delay(5000).slideUp(300);

    if ($('#user_register').length) {

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            if (value.slice(0, 1) == " ") {
                console.log(value);
                return false;
            } else {
                //console.log(value.slice(0,1));

                return this.optional(element) || /^[a-z ]+$/i.test(value);
            }

        }, "Please enter valid name");

        $("#user_register").validate({
            rules: {
                name: 'required',
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                c_password: {
                    required: true,
                    equalTo: '#password', // Ensure it matches the password field
                },
            },
            messages: {
                name: 'Please enter your name',
                email: {
                    required: 'Please enter your email',
                    email: 'Please enter a valid email address',
                },
                password: {
                    required: 'Please enter a password',
                    minlength: 'Password must be at least 8 characters',
                },
                c_password: {
                    required: 'Please confirm your password',
                    equalTo: 'Passwords do not match',
                },
            },
            submitHandler: function(form) {
                var first_name = $('#user_register #name').val();
                var email = $('#user_register #email').val();
                var password = $('#user_register #password').val();
                var c_password = $('#user_register #c_password').val();
                var data = "name=" + first_name + "&email=" + email + "&password=" + password + "&c_password=" + c_password;
                ajaxFunctionCall(data);
            }
        });
    }
    $('#start_date_time').datetimepicker({
        format: 'DD/MM/YYYY',
    });

    // Initialize DateTimePicker for end_date_time
    $('#end_date_time').datetimepicker({
        format: 'DD/MM/YYYY',
    });

    // var dataTable = $('#enquiries-table').DataTable({
    //     dom: 'lBfrtip', // Add the 'B' button for export
    //     buttons: [{
    //         extend: 'csv',
    //         text: 'Export All',
    //         action: function(e, dt, button, config) {
    //             var allData = dt.rows().data().toArray(); // Get all records
    //             var filteredData = dt.rows({
    //                 search: 'applied'
    //             }).data().toArray(); // Get filtered records

    //             // Combine all records and filtered records
    //             var combinedData = allData.concat(filteredData);

    //             // Export all records
    //             button.text('Exporting...');
    //             $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config, combinedData);

    //             // Reset the button text
    //             button.text('Export All');
    //         }
    //     }, ],
    //     processing: true,
    //     serverSide: true,
    //     searching: true,
    //     ajax: {
    //         url: baseUrl + '/admin/fetch-enquiries',
    //         data: function(d) {
    //             if (d && typeof d.length !== 'undefined') {
    //                 d.per_page = d.length;
    //                 d.page = Math.ceil(d.start / d.length) + 1;
    //                 d.sort_column = d.columns[d.order[0].column].data; // Get the column name to sort
    //                 d.sort_direction = d.order[0].dir;
    //                 d.start_date = $('#start_date').val();
    //                 d.end_date = $('#end_date').val();

    //             } else {
    //                 console.error('Length is undefined or not an object');
    //             }

    //         },
    //     },
    //     columns: [{
    //             data: 'full_name',
    //             name: 'full_name'
    //         },
    //         {
    //             data: 'email',
    //             name: 'email'
    //         },
    //         {
    //             data: null,
    //             render: function(data, type, row) {
    //                 // Concatenate country_code and phone
    //                 return row.country_code + ' ' + row.phone;
    //             }
    //         },
    //         {
    //             data: 'course.name',
    //             name: 'course.name',
    //             orderable: false,
    //         },
    //         {
    //             data: 'utm_source',
    //             name: 'utm_source'
    //         },
    //         {
    //             data: 'utm_medium',
    //             name: 'utm_medium'
    //         },
    //         {
    //             data: 'utm_campaign',
    //             name: 'utm_campaign'
    //         },
    //         {
    //             data: 'created_at',
    //             name: 'created_at',
    //             render: function(data, type, row) {
    //                 // Format date using moment.js or any other date formatting library
    //                 return moment(data).format('YYYY-MM-DD HH:mm');
    //             }
    //         }
    //     ],
    //     orderable: false,
    //     pagingType: 'full_numbers',
    //     lengthMenu: [10, 25, 50, 100],
    //     pageLength: 10,
    //     debug: true, // Enable debug mode
    //     initComplete: function(settings, json) {
    //         console.log('AAA', json); // Log the response to the console
    //     },
    //     drawCallback: function(settings) {
    //         console.log('gggg', settings.fnRecordsTotal());
    //         // Check if there are no records
    //         if (settings.fnRecordsTotal() === 0 || isNaN(settings.fnRecordsTotal())) {
    //             // Hide pagination and info
    //             //console.log('No Record');
    //             $('#enquiries-table_paginate, #enquiries-table_info').hide();
    //         } else {
    //             // Show pagination and info
    //             // console.log('Found Record');
    //             $('#enquiries-table_paginate, #enquiries-table_info').show();
    //         }
    //     },
    //     error: function(xhr, error, thrown) {
    //         console.log('DataTables error:', error);
    //     },
    //     responsive: true,
    // });

    $('#start_date_time').on('change.datetimepicker', function(e) {
         setTimeout(function() {
            // Trigger DataTables reload when start_date_time changes
            var start_date = $('#start_date_time').data('datetimepicker').date();
            $('#start_date').val(start_date);
            var end_date = $('#end_date_time').data('datetimepicker').date();
            $('#end_date').val(end_date);
            console.log('start', start_date);
            dataTable.ajax.reload();
        }, 500);
    });

    $('#end_date_time').on('change.datetimepicker', function(e) {
         setTimeout(function() {
            // Trigger DataTables reload when end_date_time changes
            var end_date = $('#end_date_time').data('datetimepicker').date();
            $('#end_date').val(end_date);
            var start_date = $('#start_date_time').data('datetimepicker').date();
            $('#start_date').val(start_date);
            console.log('end', end_date);
            dataTable.ajax.reload();
        }, 500);
    });
    $(document).on('click', '.reset_table', function() {
        $('#start_date_time').data('datetimepicker').clear();
        $('#end_date_time').data('datetimepicker').clear();
        $('#start_date').val('');
        $('#end_date').val('');
        $('#enquiries-table_filter input[type="search"]').val('').trigger('input');

        dataTable.ajax.reload();
    });

    // Usage for Institutes table
    initializeDataTable(
        '#institutes-table',
        baseUrl + '/admin/fetch-institutes',
        [
            {
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
                data: 'email',
                name: 'email'
            },
            {
                data: 'phone',
                name: 'phone'
            },
            // {
            //     data: 'website',
            //     name: 'website'
            // },
            // {
            //     data: 'coedStatus',
            //     name: 'coedStatus'
            // },
            // {
            //     data: 'campusSize',
            //     name: 'campusSize'
            // },
            // {
            //     data: 'campusType',
            //     name: 'campusType'
            // },
            // {
            //     data: null,
            //     render: function(data, type, row) {
            //         return row.address1 + ' ' + row.address2 + ' ' + row.state + ' ' + row.pin_code;
            //     },
            // },
            {
                data: null,
                render: function(data, type, row) {
                    var editUrl = baseUrl + '/admin/institutes/edit/' + row.id;
                    var viewUrl = baseUrl + '/admin/institutes/details/' + row.id;

                    var buttonsHtml =
                        '<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                        // '<a href="' + viewUrl + '" class="btn btn-primary btn-sm">View</a>' +
                        '<a href="javascript:void(0)" data-id="' + row.id + '" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                    return buttonsHtml;
                },
            },
        ],
        // [{
        //     extend: 'csv',
        //     text: 'Export All',
        //     action: function(e, dt, button, config) {
        //         var allData = dt.rows().data().toArray();
        //         var filteredData = dt.rows({
        //             search: 'applied'
        //         }).data().toArray();
        //         var combinedData = allData.concat(filteredData);

        //         button.text('Exporting...');
        //         $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config, combinedData);

        //         button.text('Export All');
        //     },
        // }, ]
    );
    initializeDataTable(
        '#enquiries-table',
        baseUrl + '/admin/enquiries-all',
        [
            {
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
                name: 'email'
            },
            {
                data: 'phone',
                name: 'phone'
            },
            {
                data: 'instituteName',
                name: 'instituteName'
            },
            // {
            //     data: 'courseName',
            //     name: 'courseName'
            // },
            {
                data: 'updatedAt',
                name: 'updatedAt'
            },
            // {
            //     data: 'coedStatus',
            //     name: 'coedStatus'
            // },
            // {
            //     data: 'campusSize',
            //     name: 'campusSize'
            // },
            // {
            //     data: 'campusType',
            //     name: 'campusType'
            // },
            // {
            //     data: null,
            //     render: function(data, type, row) {
            //         return row.address1 + ' ' + row.address2 + ' ' + row.state + ' ' + row.pin_code;
            //     },
            // },
            // {
            //     data: null,
            //     render: function(data, type, row) {
            //         var editUrl = baseUrl + '/admin/institutes/edit/' + row.id;
            //         var viewUrl = baseUrl + '/admin/institutes/details/' + row.id;

            //         var buttonsHtml =
            //             '<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
            //             // '<a href="' + viewUrl + '" class="btn btn-primary btn-sm">View</a>' +
            //             '<a href="javascript:void(0)" data-id="' + row.id + '" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

            //         return buttonsHtml;
            //     },
            // },
        ],
        // [{
        //     extend: 'csv',
        //     text: 'Export All',
        //     action: function(e, dt, button, config) {
        //         var allData = dt.rows().data().toArray();
        //         var filteredData = dt.rows({
        //             search: 'applied'
        //         }).data().toArray();
        //         var combinedData = allData.concat(filteredData);

        //         button.text('Exporting...');
        //         $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config, combinedData);

        //         button.text('Export All');
        //     },
        // }, ]
    );

    // Usage for Courses table
    initializeDataTable(
        '#institute-courses-table',
        baseUrl + '/admin/fetch-institute-courses',
        [{
                data: 'name',
                name: 'name'
            },
            {
                data: 'short_name',
                name: 'short_name'
            },
            {
                data: 'duration',
                name: 'duration'
            },
            {
                data: null,
                render: function(data, type, row) {
                    var editUrl = baseUrl + '/admin/institute-courses/edit/' + row.id;
                    var viewUrl = baseUrl + '/admin/institute-courses/details/' + row.id;

                    var buttonsHtml =
                        '<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                        '<a href="' + viewUrl + '" class="btn btn-primary btn-sm">View</a>' +
                        '<a href="javascript:void(0)" data-id="' + row.id + '" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                    return buttonsHtml;
                },
            },
        ],
        // [{
        //     extend: 'csv',
        //     text: 'Export All',
        //     action: function(e, dt, button, config) {
        //         var allData = dt.rows().data().toArray();
        //         var filteredData = dt.rows({
        //             search: 'applied'
        //         }).data().toArray();
        //         var combinedData = allData.concat(filteredData);

        //         button.text('Exporting...');
        //         $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config, combinedData);

        //         button.text('Export All');
        //     },
        // }, ]
    );

    // Usage for Courses table
    initializeDataTable(
        '#courses-table',
        baseUrl + '/admin/fetch-courses',
        [{
                data: 'name',
                name: 'name',
                orderable: true
            },
            {
                data: 'short_name',
                name: 'short_name',
                orderable: true
            },
            {
                data: 'branch.name',
                name: 'branch.name',
                orderable: false
            },
            {
                data: 'course_level.name',
                name: 'course_level.name',
                orderable: false
            },
            {
                data: 'qualification',
                name: 'qualification',
                orderable: true
            },
            {
                data: 'subject',
                name: 'subject',
                orderable: true
            },
            {
                data: null,
                render: function(data, type, row) {
                    var editUrl = baseUrl + '/admin/courses/edit/' + row.id;
                    var viewUrl = baseUrl + '/admin/courses/details/' + row.id;

                    var buttonsHtml =
                        '<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                        '<a href="' + viewUrl + '" class="btn btn-primary btn-sm">View</a>' +
                        '<a href="javascript:void(0)" data-id="' + row.id + '" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                    return buttonsHtml;
                },
                orderable: false,
            },

        ],
        // [{
        //     extend: 'csv',
        //     text: 'Export All',
        //     action: function(e, dt, button, config) {
        //         var allData = dt.rows().data().toArray();
        //         var filteredData = dt.rows({
        //             search: 'applied'
        //         }).data().toArray();
        //         var combinedData = allData.concat(filteredData);

        //         button.text('Exporting...');
        //         $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config, combinedData);

        //         button.text('Export All');
        //     },
        // }, ]
    );

    // Usage for Brands table
    initializeDataTable(
        '#branch-table',
        baseUrl + '/admin/fetch-branch',
        [{
                data: 'name',
                name: 'name'
            },
            {
                data: null,
                render: function(data, type, row) {
                    var editUrl = baseUrl + '/admin/branch/edit/' + row.id;
                      var buttonsHtml =
                        '<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                       '<a href="javascript:void(0)" data-id="' + row.id + '" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                    return buttonsHtml;
                },
            },
        ],
        // [{
        //     extend: 'csv',
        //     text: 'Export All',
        //     action: function(e, dt, button, config) {
        //         var allData = dt.rows().data().toArray();
        //         var filteredData = dt.rows({
        //             search: 'applied'
        //         }).data().toArray();
        //         var combinedData = allData.concat(filteredData);

        //         button.text('Exporting...');
        //         $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config, combinedData);

        //         button.text('Export All');
        //     },
        // }, ]
    );

    // Usage for Course Level table
    initializeDataTable(
        '#course_level-table',
        baseUrl + '/admin/fetch-course_level',
        [{
                data: 'name',
                name: 'name'
            },
            {
                data: null,
                render: function(data, type, row) {
                    var editUrl = baseUrl + '/admin/course-level/edit/' + row.id;
                      var buttonsHtml =
                        '<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                       '<a href="javascript:void(0)" data-id="' + row.id + '" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                    return buttonsHtml;
                },
            },
        ],
        // [{
        //     extend: 'csv',
        //     text: 'Export All',
        //     action: function(e, dt, button, config) {
        //         var allData = dt.rows().data().toArray();
        //         var filteredData = dt.rows({
        //             search: 'applied'
        //         }).data().toArray();
        //         var combinedData = allData.concat(filteredData);

        //         button.text('Exporting...');
        //         $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config, combinedData);

        //         button.text('Export All');
        //     },
        // }, ]
    );

     // Call the initializeDataTable function
    initializeDataTable(
        '#scholarship-table',
        baseUrl + '/admin/fetch-scholarships',
        [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'institute.name',
                name: 'institute.name'
            },
            {
                data: 'course.name',
                name: 'course.name'
            },
            {
                data: 'level_of_study',
                name: 'level_of_study'
            },
            {
                data: 'description',
                name: 'description'
            },
            {
                data: null,
                render: function(data, type, row) {
                  var viewUrl = baseUrl + '/admin/institutes/'+row.institute_id+'/scholarships';

                    var buttonsHtml =
                       '<a href="' + viewUrl + '" class="btn btn-primary btn-sm">View</a>';
             
                    return buttonsHtml;
                },
            },
            
            
        ]
    );


    // Usage for Institutes table
    initializeDataTable(
        '#course-specialization-master-table',
        baseUrl + '/admin/fetch-course-specialization-master',
        [
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'description',
                name: 'description'
            },
            {
                data: null,
                render: function(data, type, row) {
                    var editUrl = baseUrl + '/admin/course-specialization-master/edit/' + row.id;
                    var viewUrl = baseUrl + '/admin/course-specialization-master/details/' + row.id;

                    var buttonsHtml =
                        '<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                        '<a href="javascript:void(0)" data-id="' + row.id + '" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                    return buttonsHtml;
                },
            },
        ]
    );

    // Usage for Institutes table
    initializeDataTable(
    '#course-specialization-table',
        baseUrl + '/admin/fetch-course-specialization',
        [
            { data: 'id', name: 'id' },
            {
                data: 'course_master.name',
                name: 'course_master.name',
                render: function(data, type, row) {
                    return data; // Assuming 'course.name' is a direct property of the row
                },
            },
            {
                data: 'specialization_master.name',
                name: 'specialization_master.name',
                render: function(data, type, row) {
                    return data; // Assuming 'specialization_master.name' is a direct property of the row
                },
            },
            {
                data: null,
                render: function(data, type, row) {
                    var editUrl = baseUrl + '/admin/course-specialization/edit/' + row.id;
                    var viewUrl = baseUrl + '/admin/course-specialization/details/' + row.id;

                    var buttonsHtml =
                        '<a href="' + editUrl + '" class="btn btn-info btn-sm">Edit</a>' +
                        '<a href="javascript:void(0)" data-id="' + row.id + '" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm delete btn-sm btn btn-danger"> Delete </a>';

                    return buttonsHtml;
                },
            },
        ]
    );


    if ($('#institute-scholarship-table').length) {
        // Initialize DataTable
        //$('#institute-scholarship-table').DataTable();
    }

   

    $("#edit-courses").validate({
        rules: {
            name: {
                required: true,
                // Add more validation rules as needed
            },
            short_name: {
                required: true,
            },
            branch_id: {
                required: true,
            },
            course_level_id: {
                required: true,
            },
            qualification: {
                required: true,
            },
            subject: {
                required: true,
            },
            description: {
                required: true,
            },
            // Add more rules for other fields
        },
        messages: {
            // Define custom error messages if needed
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('text-danger');
            error.insertAfter(element);
        },
    });

    // Usage
    // setupFormValidation('add-institute');
    setupFormValidation('edit-institute');
    setupFormValidation('add-branch');
    setupFormValidation('edit-branch');
    setupFormValidation('add-course-level');
    setupFormValidation('add-course-specialization-master');
    setupFormValidation('edit-course-specialization-master');

    setupFormValidation('add-courses', {
            short_name: {
                required: true,
            },
            branch_id: {
                required: true,
            },
            course_level_id: {
                required: true,
            },
            // Add more specific rules as needed
        }, {
            branch_id: {
                required: "Please select a branch.",
            },
            course_level_id: {
                required: "Please select a course level.",
            },
            // Add more specific messages as needed
        });
    setupFormValidation('edit-courses', {
            short_name: {
                required: true,
            },
            branch_id: {
                required: true,
            },
            course_level_id: {
                required: true,
            },
            // Add more specific rules as needed
        }, {
            branch_id: {
                required: "Please select a branch.",
            },
            course_level_id: {
                required: "Please select a course level.",
            },
            // Add more specific messages as needed
        });

    // Setup scholarship form validation
        setupFormValidation('add-scholarship', {
            institute_id: {
                required: true,
            },
            course_id: {
                required: true,
            },
            level_of_study: {
                required: true,
            },
            description: {
                required: true,
                maxlength: 255,
            },
            eligibility: {
                required: true,
            },
            applicability: {
                required: true,
            },
            rank: {
                required: true,
                digits: true,
            },
            number_of_scholarship: {
                required: true,
                digits: true,
            },
            amount: {
                required: true,
                digits: true,
            },
        });

        setupFormValidation('add-course-specialization', {
            course_id: {
                required: true,
            },
            specialization_id: {
                required: true,
            },
            course_level_id: {
                required: true,
            },
            // Add more specific rules as needed
        }, {
            course_id: {
                required: "Please select a course.",
            },
            specialization_id: {
                required: "Please select a specialization.",
            },
            // Add more specific messages as needed
        });
        
    

    $('body').on('click', '#institutes-table .delete', function() {
        var id = $(this).data('id');
        var action_path = '/admin/institutes/delete-institute';
        var data_table_id = '#institutes-table';
        deleteRecordSweetAlert(id, action_path, data_table_id);
    });
    $('body').on('click', '#branch-table .delete', function() {
        var id = $(this).data('id');
        var action_path = '/admin/branch/delete-branch';
        var data_table_id = '#branch-table';
        deleteRecordSweetAlert(id, action_path, data_table_id);
    });
    $('body').on('click', '#course_level-table .delete', function() {
        var id = $(this).data('id');
        var action_path = '/admin/course-level/delete-course_level';
        var data_table_id = '#course_level-table';
        deleteRecordSweetAlert(id, action_path, data_table_id);
    });

    $('body').on('click', '#courses-table .delete', function() {
        var id = $(this).data('id');
        var action_path = '/admin/courses/delete-courses';
        var data_table_id = '#courses-table';
        deleteRecordSweetAlert(id, action_path, data_table_id);
    });

    $('body').on('click', '#institute-scholarship-table .delete', function() {
        var id = $(this).data('id');
        var action_path = '/admin/scholarships/delete-scholarship';
        var data_table_id = '#institute-scholarship-table';
        deleteRecordSweetAlertReload(id, action_path, data_table_id);
    });

    $('body').on('click', '#course-specialization-master-table .delete', function() {
        var id = $(this).data('id');
        var action_path = '/admin/course-specialization-master/delete-course-specialization-master';
        var data_table_id = '#course-specialization-master-table';
        deleteRecordSweetAlert(id, action_path, data_table_id);
    });
    $('body').on('click', '#course-specialization-table .delete', function() {
        var id = $(this).data('id');
        var action_path = '/admin/course-specialization/delete-course-specialization';
        var data_table_id = '#course-specialization-table';
        deleteRecordSweetAlert(id, action_path, data_table_id);
    });

    /////Institutes End ///////
});