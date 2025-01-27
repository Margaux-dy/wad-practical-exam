<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    <style>
        /* General Reset */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://i.pinimg.com/736x/d8/e7/a4/d8e7a474548b150b558f9e9331326ea5.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .container {
            background: rgb(231, 195, 231);
            width: 90%;
            max-width: 600px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            padding: 20px 30px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .message {
            margin-bottom: 20px;
        }

        .success {
            background-color: #27ae60;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            position: relative;
        }

        .success button {
            background: transparent;
            border: none;
            color: white;
            font-size: 18px;
            position: absolute;
            top: 5px;
            right: 10px;
            cursor: pointer;
        }

        .error {
            background-color: #e74c3c;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            position: relative;
        }

        .error button {
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

        input[type="text"],
        textarea {
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Post</h1>

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

        <form action="{{ route('update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required placeholder="Enter the title">
            </div>

            <div>
                <label for="body">Body</label>
                <textarea name="body" id="body" rows="4" required placeholder="Enter the post content">{{ old('body', $post->body) }}</textarea>
            </div>

            <div>
                <button type="submit">Update Post</button>
            </div>
        </form>
    </div>
</body>

</html>
