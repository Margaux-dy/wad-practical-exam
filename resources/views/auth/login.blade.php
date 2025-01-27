<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        /* General Reset */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #140101;
            background-image: url('https://i.pinimg.com/736x/d8/e7/a4/d8e7a474548b150b558f9e9331326ea5.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: rgb(204, 131, 204);
            padding: 30px 40px;
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #020b14;
            font-size: 24px;
        }

        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            position: relative;
        }

        .message.success {
            background: #27ae60;
            color: white;
        }

        .message.error {
            background: #e74c3c;
            color: rgb(20, 3, 3);
        }

        .message button {
            background: transparent;
            border: none;
            color: white;
            font-size: 18px;
            position: absolute;
            top: 5px;
            right: 10px;
            cursor: pointer;
        }

        form div {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #042546;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #bdc3c7;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            background: #3498db;
            color: white;
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background: #2980b9;
        }

        .register-link {
            margin-top: 15px;
            font-size: 14px;
        }

        .register-link a {
            color: #130c75;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>

        @if (session()->has('success'))
            <div class="message success">
                <button onclick="this.parentElement.style.display='none'">&times;</button>
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="message error">
                <button onclick="this.parentElement.style.display='none'">&times;</button>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="Enter your email">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Enter your password">
            </div>

            <div>
                <button type="submit">Login</button>
            </div>
        </form>

        <p class="register-link">
            Don't have an account? <a href="{{ route('showRegisterForm') }}">Register here</a>
        </p>
    </div>
</body>

</html>
