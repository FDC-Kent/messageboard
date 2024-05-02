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
                var markup = '',
                    data = res.data,
                    img_url = '';

                for(let item of data){
                    if(item.Receiver.UserProfile.img_url){
                            img_url = BASE_URL +'img/uploads/'+ item.Receiver.UserProfile.img_url;
                    }else{
                            img_url = BASE_URL +  "img/default-img.jpeg"
                    }
                    let params = new URLSearchParams(window.location.search);

                    // Append new parameters or update existing ones
                    params.set('sender_id', item.Sender.id);
                    params.set('receiver_id', item.Receiver.id);
                    
                    markup += '<a class="link" href="'+ BASE_URL + 'user/messages/details?' + params.toString() +'">'+
                                    '<div class="message-card received">'+
                                        '<div class="card">'+
                                            '<div class="card-body d-flex align-items-center justify-content-start">'+
                                            '<img height="50px" width="50px" src="' + img_url + '" alt="User Image" class="me-2"> '+
                                            '<div class="flex-grow-1">'+
                                                '<p class="mb-1 message-text">"' + item.Message.content + '"</p>'+
                                                '<div class="d-flex justify-content-between align-items-center">'+
                                                    '<small class="text-muted">' + item.Receiver.name + '</small>'+
                                                    '<small class="text-muted">' + timeAgo(item.Message.created) + '</small>'+
                                                '</div>'+
                                            '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</a>';
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
            },
            error: function (err) {
                console.log(err)
            }
        });

    }
});
