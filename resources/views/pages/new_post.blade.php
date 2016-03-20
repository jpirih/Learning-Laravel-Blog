@extends('base')
@section('title')
    Nova objava
@endsection
        <!-- naslov strani -->
@section('page-heading')
    Napiši novo objavo
@endsection
        <!-- opis pod naslovom -->
@section('description')
    Spodnji obrazec ti daje možnost da napišeš novo blog objavo
    Izkoristi možnosti in napiši kaj lepega :)
@endsection

@section('content')
        <!-- obrazec za vnos objave  obrazec prikazuje PostController funkcija-> writeNewPost  -->
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-primary">
            <div class="panel-body">
                <!-- PostController funkcija ->savePost() -->
                <form action="" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="title">Naslov</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content">Vsebina Objave</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control">

                </textarea>
                    </div>
                    <!-- Kategorije -->
                    <div class="form-group">
                        <label for="categories">Kategorije</label>
                        <!-- seznam kategorij se poslje v view znotraj funcije PostController -> writeNewPost -->
                        @foreach($categories as $category)
                            <input type="checkbox" class="checkbox-inline" name="categories[]" value="{{ $category->id }}"> {{ $category->name }}
                        @endforeach
                    </div>
                    <!-- Izberi datum objave -->
                    <div class="form-group">
                        <label for="date_published">Izberi datum objave</label>
                        <input type="text" name="date_published" id="date_published" class="form-control">
                    </div>
                    <br>
                    <!-- gumbi -->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success btn-block">
                                <span class="glyphicon glyphicon-pencil"></span>
                                Objavi
                            </button>
                        </div>
                        <div class="col-sm-6">
                            <button type="reset" class="btn btn-warning">
                                <span class="glyphicon glyphicon-refresh"></span>
                                Izbriši
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- moj javacript -->
        <script>
            // datepicker za datum objave
            $('#date_published').datepicker({
                dateFormat:'dd.mm.yy',
                ShowOtherMonths: true,
                SelectOtherMonths: true
            });
            // auto complete title

                var words = [
                    "test",
                    "objava",
                    "delovanje",
                    "Upam",
                    "petek",
                    "sobota",
                    "nedelja"];

                $('#title').autocomplete({source: words});
        </script>
    </div>
@endsection