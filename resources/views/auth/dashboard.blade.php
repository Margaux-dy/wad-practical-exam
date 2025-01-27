<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
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

        p {
            color: #7f8c8d;
            margin-bottom: 20px;
        }

        .messages {
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

        .posts {
            text-align: left;
            margin-top: 20px;
        }

        .posts h2 {
            font-size: 20px;
            color: black;
            margin-bottom: 15px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background: #ecf0f1;
            border: 1px solid #bdc3c7;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
        }

        li h3 {
            margin: 0 0 10px;
            color: #2c3e50;
        }

        li p {
            margin: 0 0 10px;
            color: #7f8c8d;
        }

        .timestamp {
            font-size: 12px;
            color: #95a5a6;
        }

        li a, li button {
            text-decoration: none;
            background: #3498db;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        li a:hover, li button:hover {
            background: #2980b9;
        }

        form {
            display: inline;
        }

        .create-button {
            display: block;
            background: #e67e22;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
        }

        .create-button:hover {
            background: #d35400;
        }

        button {
            cursor: pointer;
        }

        form button {
            background: #e74c3c;
        }

        form button:hover {
            background: #c0392b;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="messages">
            @if (session('success'))
                <div class="success">
                    <button onclick="this.parentElement.style.display='none'">&times;</button>
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <h1>Welcome to Your Dashboard, {{ Auth::user()->name }}!</h1>
        <p>Manage your posts or log out when you're done.</p>

        <div class="posts">
            <h2>Your Posts</h2>
            @if ($posts->isEmpty())
                <p>You don't have any posts yet.</p>
                <a href="{{ route('create') }}" class="create-button">Create Your First Post</a>
            @else
                <ul>
                    @foreach ($posts as $post)
                        <li>
                            <h3>{{ $post->title }}</h3>
                            <p>{{ $post->body }}</p>
                            <div class="timestamp">
                                <strong>Created at:</strong> {{ $post->created_at->format('F j, Y, g:i a') }}
                            </div>
                            <div>
                                <a href="{{ route('edit', $post->id) }}">Edit</a>
                                <form action="{{ route('delete', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('create') }}" class="create-button">Create New Post</a>
            @endif
        </div>
            <br>
        <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</body>

</html>
