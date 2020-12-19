<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Bulk Import</title>
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

     <div class="container mt-5">

          <div class="row">
               <div class="col-6">
                    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group">
                              <label for="file">Choose File</label>
                              <input type="file" name="file" class="form-control">
                         </div>

                         <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
               </div>
          </div>

     </div>

     <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>