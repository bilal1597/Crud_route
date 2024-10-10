<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            Crud System
            <a href="/add/users" class="btn btn-success float-end">Add User</a>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf


                <table class="table table-sm table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile No.</th>
                        <th scope="col">Email</th>
                        <th scope="col">Registration</th>
                        <th scope="col">Last Update</th>
                        <th scope="col" colspan="2">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        {{-- @if (count($all_users) > 0) --}}
                            @foreach ($all_users as $item)
                                <tr>
                                    <td>{{$item-> id}} </td>
                                    <td>{{$item->name}} </td>
                                    <td>{{$item-> mobile_no}} </td>
                                    <td>{{$item-> email}} </td>
                                    <td>{{$item-> created_at}} </td>
                                    <td>{{$item-> updated_at}} </td>
                                    <td>
                                        <a href="/edit/{{ $item-> id}}" class="btn btn-info">Edit</a>
                                    </td>
                                    {{-- <td><a href="/delete/{{$item ->  id}}" class="btn btn-danger">Delete</a></td> --}}
                                    <td>
                                        <form action="{{ route('delete.User', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">
                                                Delete
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        {{-- @else
                        <tr>
                            <th>No data found</th>
                        </tr>
                        @endif --}}
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>
