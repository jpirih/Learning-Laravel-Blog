@extends('base')

@section('title')
    Admin user management page
@endsection

@section('page-heading')
    Users overview and assigning roles
@endsection

@section('content')
    <div class="col-sm-6 col-sm-offset-3">
    <h3>Pregled uporabnikov</h3>
</div>
<div class="row">
    <div class="col-sm-9">
        @if(session('status'))
            <p class="alert alert-success">
                <span class="glyphicon glyphicon-check"></span>
                {{ session('status') }}
            </p>
        @endif
        <table class="table table-responsive table-bordered table-hover">
            <thead>
            <tr class="table-header">
                <th>User First Name</th>
                <th>User Last Name</th>
                <th>User Nickname</th>
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
                        <td><a href="{{ route('user.profile', ['id' => $user->id]) }}">{{ $user->first_name }}</a></td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->nickname }}</td>
                        <td>{{ $user->email }}</td>
                        <form action="{{ route('assign.roles') }}" method="post">
                            <input type="hidden" value="{{ $user->email }}" name="email">
                            <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="user_role"></td>
                            <td><input type="checkbox" {{ $user->hasRole('Moderator') ? 'checked' : '' }} name="author_role"></td>
                            <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="admin_role"></td>
                            <td>
                                {{ csrf_field() }}
                                <button class="btn btn-default" type="submit">Assign Roles</button>
                            </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection