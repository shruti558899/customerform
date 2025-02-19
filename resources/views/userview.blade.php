<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title></title>
    <style>
        .btn-primary-btn {
            background-color: blue;
            color: white;
            border-radius: 1em;

        }
    </style>
</head>

<body>
    <h2>customer list
        <a href="/api/user" class="btn btn-primary-btn">previous</a>
    </h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        @foreach ($data as $datas)
            <tr>
                <td>{{ $datas->name }}</td>
                <td>{{ $datas->address }}</td>
                <td>{{ $datas->email }}</td>
                <td>{{ $datas->password }}</td>
                <td><a href="{{url('/user/edit/{$id}')}}" class="btn btn-primary-btn">Edit</a></td>
                <td><a href="{{url('/user/delete/{$id}')}}" class="btn btn-primary-btn">Delete</a></td>
            </tr>
        @endforeach
    </table>
</body>

</html>