$(document).ready(function () {
    getMessages(1,10);

    var count = 10;
    $('#view-more').on('click', function(){
        count += 10;
        getMessages(1,count);
    });

   
    
    function getMessages(page, page_size){

        var queryParams = {
            user_id: USER_ID,
            page: page,
            page_size: page_size,
        };

        var url = BASE_URL + 'api/message';
        url += '?' + $.param(queryParams);

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (res) {
                var markup = '';
                var data = res.data;
                var imgUrl = '';
                var name = '';

                var senderId, receiverId;

                for(let item of data){
                    
                    senderId = item.Message.sender_id;
                    receiverId = item.Message.receiver_id;

                   

                    let params = new URLSearchParams(window.location.search);

                    // Append new parameters or update existing ones
                    params.set('sender_id', item.Sender.id);
                    params.set('receiver_id', item.Receiver.id);
                   
                    if( 
                        USER_ID == item.Message.sender_id ||
                        USER_ID != item.Message.sender_id && USER_ID != item.Message.receiver_id ||
                         USER_ID == item.Message.sender_id && USER_ID != item.Message.sender_id
                        ){
                        name = item.Receiver.name;
                        if(item.Receiver.UserProfile.img_url){
                            imgUrl = BASE_URL +'img/uploads/'+ item.Receiver.UserProfile.img_url;
                        }else{
                            imgUrl = BASE_URL +  "img/default-img.jpeg"
                        }
                    }else{
                        name = item.Sender.name;
                        if(item.Receiver.UserProfile.img_url){
                            imgUrl = BASE_URL +'img/uploads/'+ item.Receiver.UserProfile.img_url;
                        }else{
                            imgUrl = BASE_URL +  "img/default-img.jpeg"
                        }
                    }
                    
                    markup += 
                                    '<div class="message-card received position-relative">'+
                                    '<a class="link" href="'+ BASE_URL + 'user/messages/details?' + params.toString() +'">'+
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
                                '</a>'+
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
                    deleteMessage(senderId, receiverId);
                })
            },
            error: function (err) {
                console.log(err)
            }
        });

   
    }

    function deleteMessage(senderId, reveiverId) {
        $.ajax({
          url: BASE_URL + 'api/message/delete/all/'+ senderId + '/' + reveiverId,
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
