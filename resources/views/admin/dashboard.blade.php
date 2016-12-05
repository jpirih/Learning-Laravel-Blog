@extends('base')

@section('title')
    Admin Dashboard
@endsection

@section('page-heading')
    Kekec-apps Admin Dashboard
@endsection


@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        <div class="alert alert-info">
            <span class="glyphicon glyphicon-info-sign"></span>
            Adminstratorjev pogled na celotno dogajanje
        </div>
        <hr>
        <!-- dashboard navigation -->
        <div class="btn-group btn-group-lg" role="group" aria-label="...">
            <a href="{{ route('admin-users') }}" class="btn btn-default">Users</a>
            <a href="#" class="btn btn-default">Blog</a>
        </div>
            
        </div>

@endsection