$(document).ready(function () {

    $('#UserChangePasswordForm').on('submit', function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var $this = $(this);
        // Send AJAX request
        $.ajax({
            type: "POST",
            url: BASE_URL + "api/changePassword", // Replace with your PHP script URL
            data: formData,
            dataType: "json",
            success: function (response) {
                // Handle successful response
                if (response.success) {
                    $('#response-msg').text(response.message);
                    $('#response-msg').addClass('alert-success');
                    $('#response-msg').removeClass('alert-danger d-none');
                    $this[0].reset();
                } else {
                    if (response.errors) {
                        $('#response-msg').empty();
                        for (let item of Object.values(response.errors)) {
                            $('#response-msg').append('<p>' + item + '</p>');
                        }
                    }
                    $('#response-msg').text(response.message);
                    $('#response-msg').addClass('alert-danger');
                    $('#response-msg').removeClass('alert-success d-none');
                }
            },
            error: function (xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            }
        });
    })
});