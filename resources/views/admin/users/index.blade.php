<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2>Data User</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
        + Tambah User
    </a>


    <table class="table table-bordered">

        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>


        <tbody>

        @foreach($users as $user)

            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>{{ $user->name }}</td>

                <td>{{ $user->email }}</td>

                <td>
                    {{ $user->role }}
                </td>


                <td>

                    <a href="{{ route('users.edit',$user->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>


                    <form action="{{ route('users.destroy',$user->id) }}"
                          method="POST"
                          style="display:inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus user ini?')">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

</body>
</html>