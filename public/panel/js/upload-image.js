$(document).ready(function() {
    //console.log('NNN', apiUrl);
    $(document).on('change', '#profile_image', function() {
        previewAndUploadImage(this, '#preview_profile_image_tag', 'profile_image');
    });

    $(document).on('change', '#cover_image', function() {
        previewAndUploadImage(this, '#preview_cover_image_tag', 'cover_image');
    });
    $(document).on('change', '#certificate_image', function() {
        previewAndUploadImage(this, '#preview_certificate_image_tag', 'certificate_image');
    });
    $(document).on('change', '#nirf_ranking_certificate_image', function() {
        previewAndUploadImage(this, '#preview_nirf_ranking_certificate_image_tag', 'nirf_ranking_certificate_image');
    });

    function previewAndUploadImage(input, previewTag, imageType) {
        previewImage(input, previewTag);
        // uploadImage(imageType);
    }

    function previewImage(input, previewTag) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $(previewTag).attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }

    function uploadImage(imageType) {
        console.log('uuuu', apiUrl);
        var formData = new FormData();
        var inputFile = $('#' + imageType)[0].files[0];

        formData.append('image', inputFile);

        $.ajax({
            url: apiUrl + '/upload-image',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(imageType + ' upload success:', response);
                if (imageType === 'profile_image') {
                    $('#uploaded_profile_path').val(response.data.filename);
                } else if (imageType === 'cover_image') {
                    $('#uploaded_cover_path').val(response.data.filename);
                }
            },
            error: function(error) {
                console.error(imageType + ' upload error:', error);
                // Handle error response
            }
        });
    }
});