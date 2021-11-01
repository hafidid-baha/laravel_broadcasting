<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Broadcasting</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="container min-vh-100">
    <div class="row justify-content-center">

        <div class="col-6 p-5 mt-5 border border-primary rounded text-center">
            <h5>Scan The Bellow Qr Code</h5>
            <p>using our android app to get your subscrption pocess done!</p>
            {!! $code !!}


        </div>
    </div>
    <div class="row justify-content-center">

        <div class="col-6 p-5 mt-1 border border-primary rounded text-center">
            <p>your hash is unique just like you : {{ $hash }}</p>
        </div>

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var channel = Echo.channel('subscribe');
        channel.listen('SubscribeEvent', function(data) {
            // alert(JSON.stringify(data));
            // alert("event has been fired");
            window.location.href = "{{ route('congratulations') }}";
        });
    </script>
</body>

</html>
