<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="css/app.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
     <title>@yield('title')</title>
</head>

<body>

     @section('sidebar')
    
     @show
          
     <div class="container">
          @yield('content')
     </div>
     

     <script src="{{ asset('js/app.js') }}"></script>
     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
     <script>
          $(document).ready( function () {
              $('#reportTable').DataTable();
          });
      </script>
</body>

</html>