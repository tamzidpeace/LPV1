// add customer
$(function () {
    $("#customer-form").on("submit", function (e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr("action");
        var type = form.attr("method");
        var data = form.serialize();
        // console.log(url);

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
                    loadAfterAdd();                    
                } else {
                    swal('Error', 'Something went wrong!', 'error');
                }
            }
        });
    });
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
                swal('GREAT', 'Data Deleted', 'success');
                loadAfterAdd();
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

                $.ajax({
                    url: url,
                    data: data,
                    type: type,
                    dataType: "JSON",
                    success: function (data) {
                        console.log(data);

                        if (data == 'success') {
                            $("#editCustomer").modal("hide");
                            swal('Great', 'Customer info Updated!', 'Success');
                            //console.log(x);
                            loadAfterAdd();
                        } else {
                            swal('Error', 'Something went wrong!', 'error');
                        }
                    }
                });
            });

        },
    });
}

function loadAfterAdd() {
    $.ajax({
        url: 'load-after-add',
        type: 'get',
        dataType: 'HTML',
        success: function (data) {
            //console.log(data);
            $("#showAllDataHere").html(data);
        },
    });
}
