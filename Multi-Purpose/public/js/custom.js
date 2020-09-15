// const { event } = require("jquery");

// add customer
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
                    $("#customer-tbody").empty();
                    load_data();
                } else {
                    swal('Error', 'Something went wrong!', 'error');
                }
            }
        });
    });
});

// view customer
function load_data() {
    $(document).ready(function () {
        jQuery.ajax({
            url: 'view-customer',
            method: 'GET',
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                for (let index = 0, count = 1; index < data.length; index++, count++) {
                    $("#customer-tbody").append('<tr><td>' + count + '</th> <th>' + data[index].name + '</th> <th>' + data[index].phone + '</th> <th>' + data[index].email + '</th> <th>' + data[index].created_at +
                        ' <td> <a data-toggle="modal" data-target="#show-customer" onclick="view(' + data[index].id + ')"  id="view" class="btn btn-outline-primary" href=""> View </a>  <a onclick="edit(' + data[index].id + ')" class="btn btn-outline-warning" data-toggle="modal" data-target="#editCustomer" href=""> Edit </a> <a onclick="destroy(' + data[index].id + ')" class="btn btn-outline-danger" href=""> Delete </a> </td>  </th> </tr>');
                }

            }
        });

    });
}

$(document).ready(function () {
    load_data();
});

//view single customer data
function view(id) {
    event.preventDefault();

    $.ajax({
        url: 'view-customer-single',
        method: 'GET',
        data: {
            id: id
        },
        dataType: 'JSON',
        success: function (data) {
            //console.log(data.name);
            $("#cus-name").text("Name: " + data.name);
            $("#cus-phone").text("Phone: " + data.phone);
            $("#cus-email").text("Email: " + data.email);
        }
    });
}

//delete customer
function destroy(id) {
    if (!confirm("Are You Sure to delete this"))
        event.preventDefault();
    else {
        event.preventDefault();
        $.ajax({
            url: 'destroy',
            type: 'GET',
            data: {
                id: id
            },
            dataType: 'JSON',
            success: function (data) {
                $("#customer-tbody").empty();
                load_data();
                swal('GREAT', 'Data Deleted', 'success');
            },
            error: function (data) {
                swal('OPPS!', 'something went wrong!', 'error');
            },
        });
    }
}

// edit customer
function edit(id) {
    event.preventDefault();
    //console.log(id);
    // $("#name").val("hello");
    $.ajax({
        url: 'view-customer-single',
        type: 'GET',
        dataType: 'JSON',
        data: {
            id: id
        },
        success: function (data) {
            name = $("#edit-name").val(data.name);
            phone = $("#edit-phone").val(data.phone);
            email = $("#edit-email").val(data.email);
            id = $("#edit-id").val(data.id);

            $("#customer-edit-form").on("submit", function (e) {
                e.preventDefault();
                var form = $(this);
                var url = form.attr("action");
                var type = form.attr("method");
                var data = form.serialize();
                // console.log(url);

                // insert data
                x= 1;
                $.ajax({
                    url: url,
                    data: data,
                    type: type,
                    dataType: "JSON",
                    success: function (data) {
                        console.log(data);
                        
                        if (data == 'success') {
                            x++;
                            $("#editCustomer").modal("hide");
                            swal('Great', 'Customer info Updated!', 'Success');                            
                            $("#customer-tbody").empty();
                            if(x<3) {
                            console.log(x);
                            load_data();
                            }
                            
                        } else {
                            swal('Error', 'Something went wrong!', 'error');
                        }
                    }
                });
            });
           
        },
    });
}
