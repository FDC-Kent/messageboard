$(document).ready(function(){

    $('#MessagePostMessageForm').on('submit', function(e){
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: BASE_URL + 'api/message/send',
            type: 'POST',
            data: formData,
            success: function(response) {
                if(response.status == 'success'){
                    window.location.href = BASE_URL + 'messages';
                }
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    });

    $('#receiverId').select2({
        templateResult: function(data) {
            if (!data.id) { return data.text; }
            var img;
           
            if(!data.element.dataset.img){
                img = BASE_URL + 'img/default-img.jpeg';
            }else{
                img = BASE_URL + 'img/uploads/'+ data.element.dataset.img;
            }

            var $result = $("<span><img height='30px' width='30px' src=" + img + " class='img-option me-2' />" + data.text + "</span>");
            return $result;
        },
        templateSelection: function (data) {
          if (!data.id) { return data.text; }
          var img;

          if(!data.element.dataset.img){
            img = BASE_URL + 'img/default-img.jpeg';
            }else{
                img = BASE_URL + 'img/uploads/'+ data.element.dataset.img;
            }

          var $span = $("<span><img height='25px' width='25px' src=" + img + " class='img-option pe-1' /><span>" + data.text + "</span>");
          return $span;
        }
    });
});