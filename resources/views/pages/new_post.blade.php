@extends('base')
'
@section('title')
    Nova objava
@endsection

@section('page-heading')
    Napiši novo objavo
@endsection

@section('description')
    Spodnji obrazec ti daje možnost da napišeš novo blog objavo
    Izkoristi možnosti in napiši kaj lepega :)
@endsection

@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        <form action="" method="post">
            <div class="form-group">
                <label for="title">Naslov</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">Vsebina Objave</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control">

                </textarea>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    Objavi
                </button>
            </div>
        </form>
    </div>
@endsection