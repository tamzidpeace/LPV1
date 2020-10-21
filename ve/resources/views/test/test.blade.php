<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>TimeZone</title>
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
     
     
     @php
         echo count($timezonelist);
         for ($i=0; $i < count($timezonelist); $i++) { 
              echo $timezonelist[$i] . "</br>";
         }
     @endphp

     <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>