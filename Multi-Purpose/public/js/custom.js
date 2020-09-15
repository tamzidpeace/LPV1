$(function () {
    $("#customer-form").on("submit", function (e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr("action");
        var type = form.attr("method");
        var data = form.serialize();
        // console.log(url);

        // insert data
        $.ajax({
            url: url,
            data: data,
            type: type,
            dataType: "JSON",
            success: function (data) {
                //console.log(data);
                if (data == 'success') {
                    $("#addCustomer").modal("hide");
                    swal('Great', 'New Customer Added!', 'Success');
                } else {
                    swal('Error', 'Something went wrong!', 'error');
                }
            }
        });
    });
});

// view customer
$(document).ready(function () {
    jQuery.ajax({
        url: 'view-customer',
        method: 'GET',
        dataType: "JSON",
        success: function (data) {
            console.log(data);
            for (let index = 0, count=1; index < data.length; index++, count++) {
                $("#customer-tbody").append('<tr><td>'+ count +'</th> <th>'+ data[index].name +'</th> <th>'+ data[index].phone +'</th> <th>'+ data[index].email +'</th> <th>'+ data[index].created_at 
                 +' <td> <a data-toggle="modal" data-target="#show-customer" onclick="view('+data[index].id +')"  id="view" class="btn btn-outline-primary" href=""> View </a>  <a class="btn btn-outline-warning" href=""> Edit </a> <a class="btn btn-outline-danger" href=""> Delete </a> </td>  </th> </tr>');
            }

        }
    });
});

function view(id) {   
    event.preventDefault();
    
    $.ajax({
        url: 'view-customer-single',
        method: 'GET',
        data: {id:id},
        dataType: 'JSON',
        success: function(data) {
            //console.log(data.name);
            $("#cus-name").text("Name: " + data.name);
            $("#cus-phone").text("Phone: " + data.phone);
            $("#cus-email").text("Email: " + data.email);
        } 
    });
}