$(document).ready(function () {
    $( "#birth-date" ).datepicker({
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

        formData.append('data[UserProfile][name]', $('#UserProfileName').val());
        formData.append('data[UserProfile][birthdate]', $('#birth-date').val());
        formData.append('data[UserProfile][gender]', $('#UserProfileGender').val());
        formData.append('data[UserProfile][hubby]', $('#UserProfileHubby').val());
        formData.append('data[UserProfile][img]', $('#image-upload').val());

        console.log(formData);
        $.ajax({
            url: BASE_URL + 'api/user/update',
            type: 'POST',
            data: formData,
            contentType: false, // Important for FormData
            processData: false, // Important for FormData
            enctype: 'multipart/form-data',
            success: function (response) {
                console.log(response)
                // Handle successful response
                $('#error-msg').removeClass('d-none');
                $('#error-msg').empty();
                if (response.success) {
                    for (let item of Object.values(response.errors)) {
                        $('#error-msg').append('<p>' + item + '</p>');
                    }
                } else {
                    $('#error-msg').append('<span>' + response.message + '</span>');
                    $('#error-msg').removeClass('alert-danger');
                    $('#error-msg').addClass('alert-success');

                    // window.location.href = BASE_URL + 'user/profile';

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