<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>login</title>
</head>

<body>
    <div class="container">
        <div class="card mt-5 w-50 mx-auto">
            <br>
            <h5 class="mx-3">Login System</h5>
            <div class="card-body">
                <form action=" {{ url('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                            value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="passwordLabel" class="form-label">Password</label>
                        <input type="password" class="form-control" id="passwordLabel" name="password" value="">
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">login</button>
                </form>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"> </script>
</body>

</html>
