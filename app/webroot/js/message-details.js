$(document).ready(function () {
    getMessages(1,10);

    var count = 10;

    


    $('#view-more').on('click', function(){
        count += 10;
        getMessages(1,count);
    });

    $('#reply-message-form').on('submit', function(e){
        e.preventDefault();

        var urlParams = getUrlParams();
        var formData = $(this).serialize();
        
        formData += '&data[Message][receiver_id][]='+urlParams.receiver_id;

        $.ajax({
            url: BASE_URL + 'api/message/send',
            type: 'POST',
            data: formData,
            success: function(response) {
                if(response.status == 'success'){
                    getMessages(1,10);
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
        var queryParams = {
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
                    img_url = '';

                var status = false;

                for(let item of data){
                    if(item.Receiver.UserProfile.img_url){
                            img_url = BASE_URL +'img/uploads/'+ item.Receiver.UserProfile.img_url;
                    }else{
                            img_url = BASE_URL +  "img/default-img.jpeg"
                    }

                    if(queryParams.sender_id == item.Sender.id){
                        status = 'sent';
                    }else{
                        status = 'received';
                    }
                    
                    markup += '<div>'+
                                    '<div class="message-card ' + status + '">'+
                                        '<div class="card">'+
                                            '<div class="card-body d-flex align-items-center justify-content-start">'+
                                            '<img height="50px" width="50px" src="' + img_url + '" alt="User Image" class="me-2"> '+
                                            '<div class="flex-grow-1">'+
                                                '<p class="mb-1 message-text">"' + item.Message.content + '"</p>'+
                                                '<div class="d-flex justify-content-between align-items-center">'+
                                                    '<small class="text-muted">' + item.Sender.name + '</small>'+
                                                    '<small class="text-muted">' + timeAgo(item.Message.created) + '</small>'+
                                                '</div>'+
                                            '</div>'+
                                            '</div>'+
                                        '</div>'+
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
});
