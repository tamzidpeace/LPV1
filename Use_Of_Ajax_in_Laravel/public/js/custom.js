$(function () {
    $("#mForm").on("submit", function (e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr("action");
        var type = form.attr("method");

        console.log(url + "  " + type);
    });
});
