<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
</head>
<body>
<h1>Test Print</h1>

<button type="button" onclick="printJS({printable:'Scan_Info.pdf', showModal:false})">
    Print PDF
</button>


<!--script::begin-->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>


<script>


</script>

<!--script::end-->
</body>


</html>
