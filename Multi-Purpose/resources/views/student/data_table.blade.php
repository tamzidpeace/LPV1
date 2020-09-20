<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     {{-- styles --}}
     <link rel="stylesheet" href="css/app.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
     {{--  styles end--}}
     <title>Document</title>
</head>

<body>
     <div class="container">
          <div class="row">
               <table id="reportTable" class="display table table-bordered">
                    <thead>
                         <tr>
                              <th scope="col">SL</th>
                              <th scope="col">Name</th>
                              <th scope="col">Phone</th>
                              <th scope="col">Email</th>
     
                         </tr>
                    </thead>
                    <tbody>
                         @php
                         $x = 1
                         @endphp
                         @foreach ($customers as $record)
                         <tr>
                              <th scope="row">{{ $x++ }}</th>
                              <td>{{ $record->name }}</td>
                              <td>{{ $record->phone }}</td>
                              <td>{{ $record->email }}</td>
                         </tr>
                         @endforeach
                    </tbody>
     
               </table>
     
          </div>
     </div>

     {{-- script --}}
     <script src="js/app.js"></script>
     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js">
     </script>
     <script>
          $(document).ready( function () {
               $('#reportTable').DataTable();
          });
     </script>
     {{-- script end --}}
</body>

</html>