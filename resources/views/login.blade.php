<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body class="body">
    <form method="POST" action="{{ route('login') }}">
        @csrf
    
        <h1 class="h1">Sign in</h1>
        
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        </div>
    
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required autocomplete="current-password">
        </div>
    
        <button type="submit">Submit</button>
    </form>
</body>
</html>