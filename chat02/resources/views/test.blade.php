<!DOCTYPE html>
<html>

<head>
     <title>Pusher Test</title>
     <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
     <script src="{{ asset('js/app.js') }}"></script>
     <script>
          // Enable pusher logging - don't include this in production
          
               Pusher.logToConsole = true;

               var pusher = new Pusher('ad979503ca10db7d98b2', {
               cluster: 'ap2'
               });

               var channel = pusher.subscribe('notify-channel');
               channel.bind('notify-event', function(data) {
               //alert(JSON.stringify(data));
               console.log(data);               
               $('#count').text(data.notify);
               });
          
    
     </script>

     <script>
          function test() {
               var count = $('#count').text();
               $.ajax({
                    url: 'test2',
                    type: 'get',
                    
                    data: {id: count},
                    success: function(result) {
                         console.log(result);
                         // console.log(count++);
                         // $('#count').text(count);
                         
                    },
                    error: function(error) {
                         console.log(error);
                    }
               });
          }

     </script>
</head>

<body>
     <button onclick="test();" type="button">Submit</button>
     <h1>Pusher Test</h1>
     <p>
          Try publishing an event to channel <code>my-channel</code>
          with event name <code>my-event</code>.
     </p>

     <h1 id="count">1</h1>
</body>

</html>