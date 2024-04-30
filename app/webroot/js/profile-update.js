$(document).ready(function () {
    $("#birth-date").datepicker({
        dateFormat: "yy-mm-dd",
    });

    $('#image-upload').change(function () {
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image-preview img').attr('src', e.target.result);
        }

        reader.readAsDataURL(file);
    });

    $('#select-image').on('click', function () {
        $('#image-upload').click();
    });

    $('#profile-form').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData();

        var fileInput = document.getElementById('image-upload');
        var img_val = $('#imgDefaultValue').val(), img_url = '';

        if (img_val != '') {
            img_url = img_val;
        } else {
            img_url = selectedFile;
        }

        var selectedFile = fileInput.files[0] ? fileInput.files[0] : '';

        formData.append('data[UserProfile][name]', $('#UserProfileName').val());
        formData.append('data[UserProfile][email]', $('#UserProfileEmail').val());
        formData.append('data[UserProfile][birth_date]', $('#birth-date').val());
        formData.append('data[UserProfile][gender]', $('#UserProfileGender').val());
        formData.append('data[UserProfile][hubby]', $('#UserProfileHubby').val());
        formData.append('data[UserProfile][img_url]', img_url);
        formData.append('data[UserProfile][file]', selectedFile);

        $.ajax({
            url: BASE_URL + 'api/user/update',
            type: 'POST',
            data: formData,
            contentType: false, // Important for FormData
            processData: false, // Important for FormData
            enctype: 'multipart/form-data',
            success: function (response) {
                // Handle successful response
                $('#error-msg').removeClass('d-none');
                $('#error-msg').empty();
                if (response.code == 200) {
                    $('#error-msg').removeClass('alert-danger');
                    $('#error-msg').addClass('alert-success');

                    $('#error-msg').append('<span>' + response.message + '</span>');

                    window.location.href = BASE_URL + 'user/profile';

                } else {
                    if (response.errors[0] == 'Email is already taken.') {
                        $('#error-msg').append('<p>' + response.errors[0] + '</p>');
                    } else {
                        for (let item of Object.values(response.errors[0])) {
                            $('#error-msg').append('<p>' + item + '</p>');
                        }
                    }

                    $('#error-msg').removeClass('alert-success');
                    $('#error-msg').addClass('alert-danger');
                }
            },
            error: function (xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
                console.log(error);
                console.log(status)
            }
        });
    });
});