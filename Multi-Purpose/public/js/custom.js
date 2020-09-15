$(function() {
    $("#customer-form").on("submit", function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr("action");
        var type = form.attr("method");
        var data = form.serialize();
        //console.log(data);

        $.ajax({
            url: url,
            data: data,
            type: type,
            dataType:"JSON",
            success: function(data) {
                //console.log(data);
                if(data == 'success') {
                    $("#addCustomer").modal("hide");
                    swal('Great', 'New Customer Added!', 'Success');
                } else {
                    swal('Error', 'Something went wrong!', 'error');
                }
            }       
        });
    });
});