@extends('base')

@section('title')
    Uredi objavo
@endsection

@section('page-heading')
    Uredi objavo: {{ $post->title }}
@endsection

@section('description')
    Tukaj lahko urejaš posamezne post. Lahko kaj dopišeš ali pa
    spremeniš kategorijo po želji
@endsection

@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3>Statistika</h3>
                <div class="well">
                    <p>
                        <span class="krepko">Id objave: </span> {{ $post->id }}
                        <span class="krepko"> | Objavlejno: </span> {{ $post->created_at }} <br>
                        <span class="krepko"> Spremenjeno: </span> {{ $post->updated_at }} <br>
                        <span class="krepko">Kategorije:  </span>
                        @foreach($post->categories as $category )
                            <span>
                                    <span>{{ $category->name }}, </span>
                                </span>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <!-- form validation errors -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="title">Naslov</label>
                            <input type="text" id="title" name="title" value="{{ $post->title }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="content">Vsebina Objave</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">
                        {{ $post->body }}
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
                        <br>
                        <!-- gumbi -->
                        <div class="form-group">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success btn-block">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    Update
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
        </div>
    </div>

@endsection