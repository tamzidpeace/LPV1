<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <script src="{{ asset('js/app.js') }}" ></script>
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     <title>Document</title>
</head>
<body>
     

     <script>
          var channel = Echo.private('test');
          channel.listen('.my-event', function (data) {
          alert(JSON.stringify(data));
     // console.log(channel);
});
     </script>
</body>
</html>