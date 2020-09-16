<!DOCTYPE html>
<html lang="en">

<head>

     <link rel="stylesheet" href="css/app.css">

     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <title>Document</title>
</head>

<body>

     <div class="container">
          <div class="row">
               <form>
                    <div class="form-group">
                         <label for="Customer ID">Customer ID</label>
                         <input type="number" class="form-control" name="cus-id" id="cus-id" placeholder="Enter Customer ID">                         
                    </div>
                    <div class="form-group">
                         <label for="Customer Name">Customer Name</label>
                         <input type="text" class="form-control" name="cus-name" id="cus-name" value="" placeholder="Enter Customer Name">                         
                    </div>
                    <div class="form-group">
                         <label for="Customer ID">Customer Email</label>
                         <input type="email" class="form-control" name="cus-email" id="cus-email" value="" placeholder="Enter Customer Email">                         
                    </div>                    
                    <button type="submit" class="btn btn-primary">Submit</button>
               </form>
          </div>
     </div>


     {{-- script --}}
     <script src="js/app.js"></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script>
          $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
     </script>
     <script src="js/ajax-rest.js"></script>
     {{-- end script --}}
</body>

</html>