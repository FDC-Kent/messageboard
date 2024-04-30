$(document).ready(function(){
    $('#receiverId').select2({
        templateResult: function(data) {
            if (!data.id) { console.log(data);return data.text; }
            var $result = $("<span><img src=" + data.element.dataset.image + " class='img-option' />" + data.text + "</span>");
            return $result;
        },
        templateSelection: function (data) {
          if (!data.id) { console.log(data);return data.text; }
          var $span = $("<span><img src=" + data.element.dataset.image + " class='img-option' />" + data.text + "</span>");
          return $span;
        }
    });
});