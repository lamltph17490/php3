@extends('layout.admin.main')

@section('title', 'User List')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">User List</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <a href="{{ route('users.create') }}"><button class="btn btn-primary">Create</button></a>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Code</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th>Permission</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user_list as $user)
                {{-- {{dd($user->avatar)}} --}}
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img width="100px" height="auto" src="{{ asset($user->avatar) }}" alt=""></td>
                        <td>{{ $user->role == 0 ? 'admin' : 'client' }}</td>
                        <td>
                            @if ($user->status == 0)
                                <a href=""><button class="btn btn-success"><i class="fa-solid fa-check"></i>
                                    </button></a>
                            @else
                                <a href=""><button class="btn btn-danger"><i
                                            class="fa-solid fa-x"></i></button></a>
                            @endif
                        </td>
                        <td>
                            <form action="{{route('users.edit', $user->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">update</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('users.delete', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div>
            {{ $user_list->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection
