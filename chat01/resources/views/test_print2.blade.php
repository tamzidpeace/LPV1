<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>hello world</h1>

    <button onclick="findPrinters();">abc</button>


<script src="{{ asset('js/qz-tray.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script>

    function findPrinters() {
        qz.websocket.connect().then(() => {
             qz.printers.find('epson');
        }).then((found) => {
            alert(found);
        });
    }

</script>
</body>
</html>
