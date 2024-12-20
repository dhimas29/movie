<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php foreach ($menu as $key => $value) : ?>
    <li><a href="{{ $value }}">{{ $key }}</a></li>
    <?php endforeach; ?>

    <h1>{{ $titlePage }}</h1>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Year</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $key => $movie)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $movie['title'] }}</td>
                    <td>{{ $movie['year'] }}</td>
                    <td>{{ $movie['genre'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <ul>
        @foreach ($config as $key => $value)
            <li>{{ $key }}: {{ $value }}</li>
        @endforeach
    </ul>


</body>

</html>
