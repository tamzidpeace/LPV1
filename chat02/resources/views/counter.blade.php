<html>

<head>
     <title>Pusher Test</title>
     <script src="https://ajax.googleapis.com/ajax/libs/d3js/6.3.1/d3.min.js"></script>
     <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
     <script>
          // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('ad979503ca10db7d98b2', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('form-submitted', function(data) {
      console.log(data.text);
      $('#test').text(data.text);
    });
     </script>
</head>

<body>
     <h1 id="test">Pusher Test</h1>
     <p>
          Try publishing an event to channel <code>my-channel</code>
          with event name <code>my-event</code>.
     </p>

     <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>