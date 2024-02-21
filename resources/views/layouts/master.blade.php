<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('default-image/lecture.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Class Registration System</title>
</head>
<body class="body">
    <div class="row row-default">
        <div class="col-3 sidebar">
            @include('layouts.sidebar')
        </div>
        <div class="col col-content">
            @yield('content')
        </div>
    </div>
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
            $(document).ready(function(){
            console.log('jquery is attack');

            setTimeout(function(){
                $('#success-message').fadeOut('slow');
            }, 3000);

            $("#flexCheckChecked").change(function() {
                var passwordInput = $('input[name="password"]');
                var icInput = $('input[name="ic"], input[name="user_ic"]');
                
                if ($(this).is(":checked")) {
                    passwordInput.val(icInput.val());
                } else {
                    passwordInput.val("");
                }
            });

        });
    </script>
</body>
</html>