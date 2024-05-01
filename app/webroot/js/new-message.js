$(document).ready(function(){

    $('#MessageSendMessageForm').on('submit', function(e){
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: BASE_URL + 'api/message/send',
            type: 'POST',
            data: formData,
            success: function(response) {
                // Handle success
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    });

    $('#receiverId').select2({
        templateResult: function(data) {
            console.log(data)
            if (!data.id) { console.log(data);return data.text; }
            var img;
           
            if(!data.element.dataset.img){
                img = BASE_URL + 'img/default-img.jpeg';
            }else{
                img = BASE_URL + 'img/uploads/'+ data.element.dataset.img;
            }

            var $result = $("<span><img height='25px' width='25px' src=" + img + " class='img-option' me-2 />" + data.text + "</span>");
            return $result;
        },
        templateSelection: function (data) {
            console.log(data)
          if (!data.id) { console.log(data);return data.text; }
          var img;

          if(!data.element.dataset.img){
            img = BASE_URL + 'img/default-img.jpeg';
            }else{
                img = BASE_URL + 'img/uploads/'+ data.element.dataset.img;
            }

          var $span = $("<span><img height='25px' width='25px' src=" + img + " class='img-option me-2' />" + data.text + "</span>");
          return $span;
        }
    });
});