<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Pet</title>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>
        <h1>Edit Pet</h1>

        @if ($errors->any())
            <div style="color: red;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('pets.update', $pet['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $pet['name'] }}" required>
            </div><br>
            <div>
                <label for="status">Status:</label>
                <input type="text" name="status" id="status" value="{{ $pet['status'] }}" required>
            </div><br>
            <button id="upd_pet" type="submit">Update Pet</button>
        </form><br>

        <a href="{{ route('pets.index') }}">Back to List</a>
    </body>
</html>
