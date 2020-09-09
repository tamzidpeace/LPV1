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
            return readAllData();
        },
        
        error: function() {

        }
        
        
    })
  });

  function readAllData() {
    //console.log("started");
    var url = $("#getDataUrl").val();
    var x = 1;
    $.get(url, function(data) {
      data.forEach(function(value) {
        //console.log(value.name);
        var tr = $("<tr/>");
        tr.append($("<td/>", {
          text: x++
        })).append($("<td/>", {
          text: value.name
        })).append($("<td/>", {
          text: value.price 
        })).append($("<td/>", {
          html: `
          <div class="btn btn-group">
              <div style="margin:2px;" class="btn btn-primary" id="editBtn" data-id="`+value.id+`">Edit</div>
              <div style="margin:2px;" class="btn btn-info" id="viewBtn" data-id="`+value.id+`">View</div>
              <div style="margin:2px;" class="btn btn-danger" id="deleteBtn" data-id="`+value.id+`">Delete</div>
            </div> `
            
        }));




        $("#showAllData").append(tr);
      })
    })
  }

  $("#showAllData").delegate("#editBtn", "click", function() {
    var id = $(this).data("id");
    console.log(id);
  })

  $("#showAllData").delegate("#viewBtn", "click", function() {
    var id = $(this).data("id");
    console.log(id);
  })

  $("#showAllData").delegate("#deleteBtn", "click", function() {
    var id = $(this).data("id");
    console.log(id);
  })

  window.onload = readAllData();