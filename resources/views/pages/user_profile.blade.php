@extends('base')
@section('title')
    User Profile | {{ $user->nickname }}
@endsection

@section('page-heading')
    Moj Profil
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Podatki o uporabniku</h3>
                    <h4>{{ $user->first_name }}  {{ $user->last_name }} - <span class="text-muted">{{ $user->nickname }}</span></h4>
                    <p>
                        <span class="krepko">Tip uporabnika: </span> {{ $user->roles()->first()->name }} <br>
                        <span class="krepko">Email: </span> {{ $user->email }}
                    </p>
                </div>
                <div class="panel-footer">
                    <a href="{{ route('blog') }}" class="btn btn-danger">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        Nazaj - Back
                    </a>
                    @if($user->hasRole('Admin'))
                        <a href="{{ route('admin-dashboard') }}" class="btn btn-success">Admin Dashboard</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            @if(count($posts) === 0)
                <div class="alert alert-info">
                    <span class="glyphicon glyphicon-info-sign"></span>
                    Nisi še napisal nobene objave - There is no post created by this user
                </div>
            @else
                <h2>Zbirni pregled vseh objav</h2>
                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                    <tr class="glava">
                        <th># Id</th>
                        <th>Naslov</th>
                        <th>Datum objave</th>
                        <th>Napisano</th>
                        <th>Zadnja sprmemeba</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></td>
                            <td>{{$post->date_published}}</td>
                            <td>{{ $post->created_at->format('d.M.Y H:i:s') }}</td>
                            <td>{{ $post->updated_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection