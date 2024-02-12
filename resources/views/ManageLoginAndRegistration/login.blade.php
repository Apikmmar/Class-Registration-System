<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Class Registration System</title>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success" id="success-message">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger" id="success-message">
                {{ session('error') }}
            </div>
        @endif
        <br><br>
        <div class="d-flex justify-content-center align-items-end">
            <div class="text-center">
                <img src="{{ asset('default-image/lecture.png') }}" alt="image" class="lecimg2">
                <h3 class="mt-3">CLASS REGISTRATION SYSTEM</h3>
            </div>
        </div>        
        <br>
        <div class="d-flex justify-content-center align-items-center">
            <form action="" method="POST">
                <div style="width: 500px">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address:</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="password" name="password" required>
                    </div>
                    <div>
                        <label for="exampleFormControlInput1" class="form-label">Role:</label>
                        <select name="role_id" class="form-control" required>
                            <option selected>Select</option>
                            <option value="1">Administrator</option>
                            <option value="2">Student</option>
                            <option value="3">Teacher</option>
                        </select>
                    </div>
                </div>
                <br>
                <div>
                    <input type="submit" name="login" value="Login" class="btn btn-primary">
                    <input type="reset" value="Reset" class="btn btn-danger">
                </div>
            </form>
        </div>
        </div>
</body>
</html>