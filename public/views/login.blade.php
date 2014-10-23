<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="css/styling/login.css">
</head>

<body>
<p class="logo">Book Io</p>
<div class="login-info">
{{ Form::open(array(
'url' => '/login',
) )  }}

{{ Form::text('username', Input::old('username'), array(
'placeholder'   => 'Username',
'id'            => 'username',
'class'        => 'login-field'
)
) }}

{{ Form::password('password', array(
'placeholder'   => 'Password',
'id'            => 'password',
'class'         => 'login-field'
)
) }}

@if(Session::has('error'))
<p style="color: red; font-size: 14px">Invalid username or password</p>
@endif

{{ Form::submit('Login') }}

{{ Form::close() }}
</div>
</body>
</html>