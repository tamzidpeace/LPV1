// const { ajax } = require("jquery");

$(document).ready(function(){
    $("#addNew").click(function(){
      $("#p-form").show();
    });
    $("#close-form").click(function(){
      $("#p-form").hide();
    });
  });


  $("#data-form").on("submit", function(e) {
    e.preventDefault();

    var name = $("#name").val();
    var price = $("#price").val();
    
    var method = $(this).attr("method");
    var action = $(this).attr("action");
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
   

    $.ajax({
        url: action,
        type: method,
        
        data : {name:name, price:price,},
        dataType: "json",
        success: function(data) {
            $("#name").val("");
            $("#price").val("");
        },

        error: function() {

        }
    })
  })