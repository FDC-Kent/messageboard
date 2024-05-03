$(document).ready(function () {
    
    getMessages(1,10);
    var count = 10;
    
    $('#view-more').on('click', function(){
        count += 10;
        getMessages(1,count);
    });

    $('#search-msg').on('change, keypress, keyup', function(e){
        getMessages(1,10);
    });

    $('#reply-message-form').on('submit', function(e){
        e.preventDefault();
        $this = $(this);
        var urlParams = getUrlParams();
        var formData = $(this).serialize();
        var receiverId;

        if(urlParams.receiver_id == USER_ID){
            receiverId = urlParams.sender_id;
        }else{
            receiverId = urlParams.receiver_id;
        }
        formData += '&data[Message][receiver_id][]='+receiverId;

        $.ajax({
            url: BASE_URL + 'api/message/send',
            type: 'POST',
            data: formData,
            success: function(response) {
                if(response.status == 'success'){
                    getMessages(1,10);
                    $this[0].reset();
                }
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    });

    function getMessages(page, page_size){
        var urlParams = getUrlParams();
        var search = $('#search-msg').val();

        var queryParams = {
            search: search,
            page: page,
            page_size: page_size,
        };

        Object.assign(queryParams, urlParams); 

        var url = BASE_URL + 'api/message';
        url += '?' + $.param(queryParams);

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (res) {
                var markup = '',
                    data = res.data,
                    imgUrl = '';

                var name = '';
                var status = false;

                for(let item of data){
                    if(USER_ID != item.Message.sender_id){
                        status = 'received';
                    }else{
                        status = 'sent';
                    }
                    
                    if(USER_ID != item.Message.sender_id || USER_ID != item.Message.receiver_id ){
                        name = item.Receiver.name;
                        if(item.Receiver.UserProfile.img_url){
                            imgUrl = BASE_URL +'img/uploads/'+ item.Receiver.UserProfile.img_url;
                        }else{
                            imgUrl = BASE_URL +  "img/default-img.jpeg"
                        }
                    }else{
                        name = item.Sender.name;
                        if(item.Sender.UserProfile.img_url){
                            imgUrl = BASE_URL +'img/uploads/'+ item.Sender.UserProfile.img_url;
                        }else{
                            imgUrl = BASE_URL +  "img/default-img.jpeg"
                        }
                    }
                    
                    markup += '<div class="position-relative">'+
                                    '<div class="message-card ' + status + '">'+
                                        '<div class="card">'+
                                            '<div class="card-body d-flex align-items-center justify-content-start">'+
                                            '<img height="50px" width="50px" src="' + imgUrl + '" alt="User Image" class="me-2"> '+
                                            '<div class="flex-grow-1">'+
                                                '<p class="mb-1 message-text">"' + item.Message.content + '"</p>'+
                                                '<div class="d-flex justify-content-between align-items-center">'+
                                                    '<small class="text-muted">' + name + '</small>'+
                                                    '<small class="text-muted">' + timeAgo(item.Message.created) + '</small>'+
                                                '</div>'+
                                            '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div>'+
                                        '<button type="button" data-id="' + item.Message.id + '" class="btn btn-danger position-absolute btn-msg-delete">delete</button>'+
                                    '</div>'+
                                '</div>';
                }
                
                if(data.length == 0){
                    $('#message-list').html('<p class="mt-5 bg-light text-center p-5">No message available.</p>');
                }else{
                    $('#message-list').html(markup);
                }

                if(res.data.length == res.totalCount){
                    $('#view-more').addClass('d-none');
                }else{
                    $('#view-more').removeClass('d-none');
                }

                $('#message-list .btn-msg-delete').on('click', function(e){
                    e.preventDefault();
                    deleteMessage($(this).data('id'));
                })
            },
            error: function (err) {
                console.log(err)
            }
        });

    }

     // Function to get URL parameters
     function getUrlParams() {
        var params = {};
        var queryString = window.location.search.substring(1);
        var vars = queryString.split("&");
        for (var i=0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            params[pair[0]] = decodeURIComponent(pair[1]);
        }
        return params;
    }

    function deleteMessage(msgId) {
        $.ajax({
          url: BASE_URL + 'api/message/delete/'+ msgId, 
          type: 'POST',
          dataType: 'json',
          followRedirects: false, 
          success: function(response) {
            console.log(response);
            getMessages(1,10);
            console.log('Message deleted successfully');
          },
          error: function(xhr, status, error) {
            console.error('Error deleting message:', error);
          }
        });
      }
});
