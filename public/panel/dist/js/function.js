function deleteRecordSweetAlert(id, action_path, data_table_id) {
    var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
    console.log(id+"--"+ action_path+"--"+ data_table_id+"--"+baseUrl + action_path);
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

                        var oTable = $(data_table_id).dataTable();
                        oTable.fnDraw(false);
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
function deleteRecordSweetAlertReload(id, action_path, data_table_id) {
    var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

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

                        setTimeout(function() {
                            location.reload();
                        }, 5000);
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
                        text: 'Failed to delete record',
                    });
                }
            });
        }
    });
}

function ajaxFunctionCall(data) {
    $.ajax({
        url: baseUrl + '/register',
        dataType: 'json',
        data: data,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            //var returnedData = JSON.parse(response);

            if (response.status == 'success') {
                localStorage.setItem('access_token_api', response.data.access_token);
                localStorage.setItem('refresh_token_api', response.data.refresh_token);
                window.location.href = baseUrl + '/details/';
            } else {
                alert("Please Try later");
            }
        }
    });
}

////Institutes ///
function initializeDataTable(tableId, dataUrl, columns, buttons = []) {
    $(tableId).DataTable({
        dom: 'lBfrtip', // Add the 'B' button for export
        buttons: buttons,
        processing: true,
        serverSide: true,
        searching: true,
        ajax: {
            url: dataUrl,
            data: function(d) {
                if (d && typeof d.length !== 'undefined') {
                    d.per_page = d.length;
                    d.page = Math.ceil(d.start / d.length) + 1;
                    d.sort_column = d.columns[d.order[0].column].data; // Get the column name to sort
                    d.sort_direction = d.order[0].dir;
                } else {
                    console.error('Length is undefined or not an object');
                }
            },
        },
        columns: columns,
        pagingType: 'full_numbers',
        lengthMenu: [10, 25, 50, 100],
        pageLength: 10,
        debug: true, // Enable debug mode
        initComplete: function(settings, json) {
            console.log('AAA', json); // Log the response to the console
        },
        drawCallback: function(settings) {
            console.log('gggg', settings.fnRecordsTotal());
            // Check if there are no records
            if (settings.fnRecordsTotal() === 0 || isNaN(settings.fnRecordsTotal())) {
                // Hide pagination and info
                //console.log('No Record');
                $(tableId + '_paginate, ' + tableId + '_info').hide();
            } else {
                // Show pagination and info
                // console.log('Found Record');
                $(tableId + '_paginate, ' + tableId + '_info').show();
            }
        },
        error: function(xhr, error, thrown) {
            console.log('DataTables error:', error);
        },
        responsive: true,
    });
}

function setupFormValidation(formId, customRules = {}, customMessages = {}) {
    $('#' + formId).validate({
        rules: Object.assign({
            name: {
                required: true,
                maxlength: 255,
            },
            profile_image: {
                required: function(element) {
                    return $("#" + formId + " #uploaded_profile_path").val() === "";
                },
            },
            cover_image: {
                required: function(element) {
                    return $("#" + formId + " #uploaded_cover_path").val() === "";
                },
            },
            address1: {
                required: true,
            },
            address2: {
                required: true,
            },
            country_id: {
                required: true,
                digits: true,
            },
            state: {
                required: true,
            },
            pin_code: {
                required: true,
                digits: true,
            },
        }, customRules),
        messages: Object.assign({
            country_id: {
                digits: "Please enter only numeric values for Country ID.",
            },
            pin_code: {
                digits: "Please enter only numeric values for Pin Code.",
            },
        }, customMessages),
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('text-danger');
            error.insertAfter(element);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass(errorClass).addClass(validClass);
        },
        submitHandler: function(form) {
            form.submit();
        },
    });
}