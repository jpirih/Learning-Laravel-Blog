@extends('base')

@section('title')
    Glavna stran
@endsection
        <!-- glavni naslov strani -->
@section('page-heading')
    Moje pisarije - pregeld vseh
@endsection

        <!-- opis pod naslovom -->
@section('description')
    Zdravo znašel si se na mojem blogu na njem bom pisal samo lepe stvari,
    vse kar se mi bo pozitivnega zgodilo :)
@endsection

@section('content')
        <!-- levi stolpec opozorilo blog v izdelavi -->
    <div class="col-sm-3">
       <h4>Aplikcaije</h4>
        <div class="list-group">
            <a href="/" class="list-group-item active">Blog</a>
            <a href="http://pohod.kekec-apps.com" class="list-group-item">Hobby PD</a>
            <a href="http://trgovina.kekec-apps.com" class="list-group-item">Hobby Market</a>
            <a href="http://invoice.kekec-apps.com" class="list-group-item">Invoice Manager</a>
            <a href="http://janko-home-page.appspot.com/" class="list-group-item">Aplikacije Python</a>
        </div>
    </div>
    <!--  osrednji del seznam vseh objav veliki modri box-i-->
    <div class="col-sm-6">
        @if(session('status'))
                <div class="alert alert-success">
                    <span class="glyphicon glyphicon-check"></span>
                    {{session('status')}}
                </div>
        @endif
        <!-- za prikazovanje skrbi SiteController -> funkcija index() -->
        <div class="panel panel-primary">
            <div class="panel-body">
                @if(count($posts)== 0)
                    <div class="well">
                        <h2> Ni objav </h2>
                        <p>
                            Pred dodajanjem nove objave poglje Dashboard
                            če so dodane kategorije. Če jih želiiš jih tam lahko dodaš
                            Za pisanje prve objave  pa klikni gumb nova objavi
                        </p>
                    </div>
                @else
                    @foreach($posts as $post)
                        <div class="well">
                            <h2> {{ $post->title }} </h2>
                            <p>
                                {{ $post->content }}
                            </p>
                            <p>
                                <sapn class="krepko">Datum objave: </sapn> {{ $post->date_published }}
                            </p>
                            <p>
                                <a href="{{ route('details', ['id' => $post->id]) }}" class="btn-primary btn">
                                    Podrobnosti ...
                                </a>
                            </p>
                        </div>
                    @endforeach
                            <!-- linki za paginacijo postov -->
                    {!! $posts->links() !!}
                @endif
            </div>
        </div>

    </div>
    <!-- desni meni Gumb za nove objave -->
    <div class="col-sm-3">
        <div>
            <a href="{{ route('new_post') }}" class="btn btn-block btn-success"><span class="glyphicon glyphicon-plus"></span>
                Nova objava
            </a>
        </div>
        <hr>
        <!-- tabela najnovejši trije za prikazovanje skrbi SiteController ->index funkcija -->
        <h4>Najnovejše tri</h4>
        <table class="table table-responsive table-bordered">
            <tr class="glava">
                <th>Naslov</th>
                <th>Napisano</th>
            </tr>
            @foreach($newPosts as $item)
                <tr>
                    <td><a href="{{ route('details', ['id' => $item->id])  }}">{{ $item->title }}</a></td>
                    <td>{{ $item->created_at}}</td>
                </tr>
            @endforeach

        </table>
        <!-- link na tabelo vseh objav  -->
        <a href="/zbirnik-objav" class="btn btn-primary btn-block">
            <span class="glyphicon glyphicon-th-list"></span>
            Dashboard
        </a>
    </div>
@endsection