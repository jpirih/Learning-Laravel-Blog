@extends('base')

@section('title')
    Admin Dashboard
@endsection

@section('page-heading')
    Kekec-apps Admin Dashboard
@endsection


@section('content')
<div class="col-sm-6 col-sm-offset-3">
    <h3>Pregled uporabnikov</h3>
</div>
<div class="row">
    <div class="col-sm-9">
        <table class="table table-resposive table-bordered table-hover">
            <thead>
            <tr>
                <th>User name</th>
                <th>User Email</th>
                <th>User</th>
                <th>Author</th>
                <th>Admin</th>
                <th>Assign role</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="user_role"></td>
                        <td><input type="checkbox" {{ $user->hasRole('Author') ? 'checked' : '' }} name="author_role"></td>
                        <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="admin_role"></td>
                        {{ csrf_field() }}
                        <td>
                            <button class="btn btn-default" type="submit">Assign Roles</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection