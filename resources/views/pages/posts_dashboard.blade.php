@extends('base')

@section('title')
    Zbirni pregled objav
@endsection

@section('page-heading')
    Zbirni pregled vseh objav
@endsection

@section('description')
    To je zbirni pregled vseh objav. Za ogled podrobnosti posamezne
    objave klikni na naslov.
@endsection

@section('content')
    <div class="col-sm-8 col-sm-offset-2">
        <table class="table table-bordered table-responsive">
            <tr>
                <th># Id</th>
                <th>Naslov</th>
                <th>Objavljeno</th>
                <th>Zadnja sprmemeba</th>
            </tr>
           @foreach($posts as $post)
               <tr>
                   <td>{{ $post->id }}</td>
                   <td><a href="/objava/{{ $post->id }}">{{ $post->title }}</a></td>
                   <td>{{ $post->created_at }}</td>
                   <td>{{ $post->updated_at }}</td>
               </tr>
           @endforeach
        </table>
    </div>
@endsection