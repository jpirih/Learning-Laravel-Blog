@extends('base')

@section('title')
    Zbirni pregled objav
@endsection

@section('page-heading')
    Blog Dashboard
@endsection

@section('description')
    To je zbirni pregled vseh objav. Za ogled podrobnosti posamezne
    objave klikni na naslov.
@endsection

@section('content')
    <div class="col-sm-4 col-sm-offset-2">
        <h2>Kategorije</h2>
        <br>
        <!-- create new dategory form validation  -->
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table class="table table-bordered table-responsive table-striped">
            <thead>
            <tr>
                <td colspan="2">
                    <form action="{{route('crete_category')}}" method="post" class="form-inline">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="text" name="category_name" placeholder="Naziv" class="form-control">
                            </div>
                            <span class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </span>
                        </div>
                    </form>
                </td>
            </tr>
            <tr>
                <th># Id</th>
                <th>Naziv</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>

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
                        <td><a href="{{ route('details', ['id' => $post->id]) }}">{{ $post->title }}</a></td>
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