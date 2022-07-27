@extends('layout.admin.main')

@section('title', $user->id !== null ? 'Update User' : 'Create A New User ')
@section('content')
    {{-- {{dd(empty($user->password))}} --}}
    {{-- @dd(empty($user->id)) --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                    <div class="card card-blue">
                        <div>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            @endif
                        </div>
                        <div class="card-header">
                            @if (!empty($user->id))
                                <h3 class="card-title">Update User</h3>
                            @else
                                <h3 class="card-title">Create A New User</h3>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (!empty($user->id))
                                <form action="{{ route('users.update', $user->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                @else
                                    <form action="{{ route('users.store') }}" method="post"
                                        enctype="multipart/form-data">
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-sm-8">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" type="text" class="form-control" placeholder="Enter ..."
                                            value="{{ $user->name }}">
                                    </div>
                                </div>

                                <div class="col-sm-8">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="text" class="form-control" placeholder="Enter ..."
                                            value="{{ $user->email }}">
                                    </div>
                                </div>

                                @if (empty($user->id))
                                    <div class="col-sm-8">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="password" type="password" class="form-control"
                                                placeholder="Enter ..." value="">
                                        </div>
                                    </div>
                                @endif

                                <div class="col-sm-8">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input name="code" type="text" class="form-control" placeholder="Enter ..."
                                            value="{{ $user->code }}">
                                    </div>
                                </div>

                                <div class="col-sm-8">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input name="username" type="text" class="form-control" placeholder="Enter ..."
                                            value="{{ $user->name }}">
                                    </div>
                                </div>

                                @if (!empty($user->avatar))
                                    <div class="col-sm-8">
                                        <!-- text input -->
                                        <img class="img-lg" src="{{ asset($user->avatar) }}" alt="">
                                    </div>
                                @endif
                                <div class="col-sm-8">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <input name="avatar" type="file" class="form-control-file"
                                            placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class='form-group'>
                                        <label for="">Phân quyền: </label>
                                        <div class="form-check">
                                            <input type="radio" name='role' value="1" class="form-check-input"
                                                {{ isset($user) && $user->role == 1 ? 'checked' : '' }}> Giáo viên
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name='role' value="0" class="form-check-input"
                                                {{ isset($user) && $user->role == 0 ? 'checked' : '' }}> Sinh viên
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class='form-group'>
                                        <label for="">Trạng thái: </label>
                                        <div class='form-group'>
                                            <div class="form-check">
                                                <input type="radio" name='status' value="1" class="form-check-input"
                                                    {{ isset($user) && $user->status == 1 ? 'checked' : '' }}> Kích
                                                hoạt
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name='status' value="0" class="form-check-input"
                                                    {{ isset($user) && $user->status == 0 ? 'checked' : '' }}> Ngừng kích
                                                hoạt
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-1">
{{-- @dd($user) --}}
                                    <!-- select -->
                                    @if (!empty($user->id))
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    @else
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    @endif
                                </div>
                                <div class="col-sm-1">
                                    <!-- select -->
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                </div>
                            </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
