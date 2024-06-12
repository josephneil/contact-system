<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="registration.css">
</head>
<body>
    <form method="POST" action="{{ route('register') }}">
        @csrf 

        <h1>Register</h1>
        
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        </div>
    
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
    
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required autocomplete="new-password">
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password">
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
    
        <button type="submit">Register</button>
    </form>
</body>
</html>