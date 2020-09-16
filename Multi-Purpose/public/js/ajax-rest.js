$("#cus-id").keyup(function () {
    var id = $(this).val();
    //console.log(id);
    $.ajax({
        url: 'auto-complete-data',
        type: 'GET',
        dataType: 'JSON',
        data: {
            id: id
        },
        success: function (data) {
            console.log(data);
            $("#cus-name").val(data.name);
            $("#cus-email").val(data.email)

        },
        error: function (data) {
            console.log("something went wrong");
            $("#form-data")[0].reset();
        },
    });
});

$("#search").keyup(function(){
     var search = $(this).val();
     //console.log(search);    
     $.ajax({
          url: 'auto-search',
          type: 'GET',
          dataType: 'JSON',
          data: {search:search},
          success: function(data) {
               console.log(data);
               for (let index = 0; index < 1; index++) {
                    $("#search-res").fadeIn();
                    $("#search-res").append('<ul class="dropdown-menu" style="display:block; position:relative"><li class="dropdown-item" >' + data[index].name + '</li></ul>');
                    
                    
               }
          } ,
          error: function(data) {
               console.log(data);
               $("#search-res").fadeOut();
          }
     });
});