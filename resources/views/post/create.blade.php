<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Post</title>
    <style>
        /* General Reset */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #333;
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
            background: rgb(211, 139, 211);
            width: 100%;
            max-width: 400px;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #2c3e50;
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
            color: white;
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
            color: #34495e;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #bdc3c7;
            border-radius: 5px;
            box-sizing: border-box;
            resize: none;
        }

        textarea {
            height: 100px;
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
            transition: background 0.3s ease;
        }

        button:hover {
            background: #2980b9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Create Post</h1>

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

        <form action="{{ route('store') }}" method="POST">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="Enter the title">
            </div>

            <div>
                <label for="body">Body</label>
                <textarea name="body" id="body" required placeholder="Enter the post content">{{ old('body') }}</textarea>
            </div>

            <div>
                <button type="submit">Create Post</button>
            </div>
        </form>
    </div>
</body>

</html>
