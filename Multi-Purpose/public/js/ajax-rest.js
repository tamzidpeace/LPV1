$("#cus-id").keyup(function(){
     var id = $(this).val();
     //console.log(id);
     $.ajax({
          url: 'auto-complete-data',
          type: 'GET',
          dataType: 'JSON',
          data: {id:id},
          success: function(data) {
               //console.log(data);
               $("#cus-name").val(data.name);
               $("#cus-email").val(data.email);               
          },
     });
});