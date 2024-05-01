$(document).ready(function () {
    getMessages(1,10);

    var count = 10;
    $('#view-more').on('click', function(){
        count += 10;
        getMessages(1,count);
    });

    function getMessages(page, page_size){
        
        var queryParams = {
            page: page,
            page_size: page_size
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
                    if(item.User.UserProfile.img_url){
                            img_url = BASE_URL +'img/uploads/'+ item.User.UserProfile.img_url;
                    }else{
                            img_url = BASE_URL +  "img/default-img.jpeg"
                    }
                    markup += '<a href="'+ BASE_URL + '/user/messages/details/' + item.Message.id +'" class="card-link col-md-12 d-flex justify-content-center">'+
                                '<div class="card my-3 w-100" style="max-width:80%;">'+
                                    '<div class="row g-0">'+
                                        '<div class="col-md-3 border-end">'+
                                            '<img height="120px" src="' + img_url + '" class="rounded-start" alt="...">'+
                                        '</div>'+
                                        '<div class="col-md-9 d-flex flex-column">'+
                                            '<div class="card-body">'+
                                                '<p class="card-text ellipsis-expand">'+ item.Message.content +'</p>'+
                                            '</div>'+
                                            '<div class="card-footer text-muted d-flex justify-content-between">' +
                                                '<span class="text-muted"> ' + item.User.name + '</span>'+
                                                '<span class="text-muted"> ' + timeSince(item.Message.created) + '</span>'+
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
