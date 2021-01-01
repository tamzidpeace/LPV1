<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
     <h1>Test Print</h1>




     <!--script::begin-->
     <script src="{{ asset('js/app.js') }}"></script>
     <script src="{{ asset('js/test_print.js') }}"></script>


     <script>                  
          let impresora = new Impresora();
          
          impresora.write("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero repudiandae nihil laborum sequi inventore ipsa nulla accusamus natus unde! Aliquid quam, incidunt facere non eos quisquam molestiae repudiandae laudantium nesciunt.");
          impresora.cut();
          impresora.cutPartial(); // use both because sometimes cut and/or cutPartial do not work
          impresora.end()
          .then(valor => {
          loguear("Al imprimir: " + valor);
    });

     </script>

     <!--script::end-->
</body>


</html>
