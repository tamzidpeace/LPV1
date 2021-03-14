<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
</head>
<body>
     <h1>Hello </h1>




     <script src="{{ asset('print_node.js') }}"></script>

     <script>
          function authenticate(authData) {
               console.log(authData);
          }

          function error(err) {
               console.error(err);
          }

          var ws = new PrintNode.WebSocket({
               apiKey: '_B8u8lIvSQlexkYNgJg9QBlXAZDNow9sXozbzqgNaZ4'
          }, authenticate, error);

     </script>

</body>
</html>
