<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>

<body>
{{ Form::open(array(
'url' => '/login',
) )  }}

{{ Form::text('username', Input::old('username'), array(
'placeholder'   => 'Username',
'id'            => 'username'
)
) }}

{{ Form::password('password', array(
'placeholder'   => 'Password',
'id'            => 'password'
)
) }}

@if(Session::has('error'))
<p style="color: red; font-size: 10px">Invalid username or password</p>
@endif

{{ Form::submit('Login') }}

{{ Form::close() }}
</body>
</html>