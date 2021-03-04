<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Login</title>
</head>
    <body>
        <div class="container">
            <form method="POST" action="">
                @csrf
                @if($errors->has('email'))
                    @foreach($errors->get('email') as $email)
                        <div class="alert alert-danger" role="alert">
                            {{ $email }}
                        </div>
                    @endforeach
                @endif
                <div class="form-group py-3">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                @if($errors->has('password'))
                    @foreach($errors->get('password') as $password)
                        <div class="alert alert-danger" role="alert">
                            {{ $password }}
                        </div>
                    @endforeach
                @endif
                <div class="form-group py-3">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" value="{{ old('password') }}"  name="password" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary py-3">Submit</button>
            </form>
        </div>
    </body>
</html>

