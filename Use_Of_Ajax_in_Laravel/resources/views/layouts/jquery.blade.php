<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--    styles--}}
    <link rel="stylesheet" href="{{url('css/app.css')}}">

</head>
<body>


<button style="margin: 20px;" id="one" class="one btn btn-primary">Button 1</button>

<div id="div1" style="background: red; height: 100px; width: 100px; margin: 20px;"></div>

<div id="div2" style="background: blue; height: 100px; width: 100px; margin: 20px;"></div>

<div id="div3" style="background: green; height: 100px; width: 100px; margin: 20px;"></div>

<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Col One</th>
        <th>Col Two</th>
        <th>Col Two</th>
        <th>Col Two</th>
        <th>Col Two</th>
    </tr>
    <tr>
        <td>a</td>
        <td>1</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
    </tr>
    <tr> <td>b</td> <td>3</td> <td>4</td> </tr>
    <tr> <td>c</td> <td>5</td> <td>6</td> </tr>


</table>



{{--scripts--}}
<script src="{{asset('js/app.js')}}"></script>
<script !src="">

    $(document).ready(function () {
        $("#name").click(function () {
            $(this).hide();
        });
    });

    $(document).ready(function () {
        $("#one").click(function () {

            $("#div1").toggle(100);
            $("#div2").fadeIn();
            $("#div3").fadeOut();
        });
    });

</script>

</body>
</html>
