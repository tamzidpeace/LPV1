<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <div id="wrapper">
        <form action="upload_file.php" method="post" enctype="multipart/form-data">
            <input placeholder="upload" type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple />
            <input type="submit" name='submit_image' value="Upload Image" />
        </form>
        <div id="image_preview"></div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() 
        { 
         $('form').ajaxForm(function() 
         {
          alert("Uploaded SuccessFully");
         }); 
        });
        
        function preview_image() 
        {
         var total_file=document.getElementById("upload_file").files.length;
         for(var i=0;i<total_file;i++)
         {
          $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
         }
        }
    </script>
</body>

</html>