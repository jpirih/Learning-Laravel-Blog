@extends('base');

@section('title')
    User Profile | {{ $user->nickname }}
@endsection

@section('page-heading')
    Moj Profil
@endsection

@section('content')
    <div class="row">

        <div class="col-sm-8 col-sm-offset-2">
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
        </div>
    </div>

@endsection