@extends('base')

@section('title')
    Glavna stran
@endsection
        <!-- glavni naslov strani -->
@section('page-heading')
    Kekec-apps.com Domača stran / Home Page
@endsection

        <!-- opis pod naslovom -->
@section('description')
    Ena ne ravno čisto običajna spletna stran :)
@endsection

@section('content')

    <!--  osrednji del seznam vseh objav veliki modri box-i-->
    <div class="col-sm-9">
        @if(session('status'))
                <div class="alert alert-success">
                    <span class="glyphicon glyphicon-check"></span>
                    {{session('status')}}
                </div>
        @endif
        <!-- za prikazovanje skrbi SiteController -> funkcija index() -->
            <div>
                <img src="http://i.imgur.com/X0qP02C.jpg?2" alt="porezen" class="img img-rounded img-responsive index-img">
            </div>
            <br>
        <div class="info-box">
            <h2>Dobrodošli</h2>
            <p>
                Dobrodošli na spletni strani kekec-apps.com. To spletno stran sem postavil s prva z namenom, da
                bi lahko zainteresiranim pokazal nekaj spletnih (strani/aplikacij), ki sem jih izdelal. S programiranjem
                se ukvarjam ljubiteljsko. Rad pa bi nekoč (čimprej) tudi delal kot programer. Pa so mi svetovali,
                da je lažje če imaš nekje zbrane aplikacije, da se jih da videt kako delujejo.
            </p>
            <p>
                Poleg tega pa ta strežnik uporabljam tudi za poganjanje aplikacij, ki jih uporabljam za osebno rabo
                in niso javno dostopne.
            </p>
            <div class="well">
                <h4>Opomba</h4>
                <p>
                    Vsi podatki znotraj aplikacij so zgolj "dummy data" namenjeni samo za to, da vidite kako stvari
                    delujejo.
                </p>
            </div>
            <p>
                <a href="{{ route('blog')}}" class="btn btn-primary btn-lg">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    Vstop
                </a>
            </p>
        </div>

    </div>
    <!-- desni meni Gumb za nove objave -->
    <div class="col-sm-3">
        <div>
            <a href="{{ route('blog') }}" class="btn btn-block btn-success"><span class="glyphicon glyphicon-align-justify"></span>
                Blog
            </a>
        </div>
        <hr>
        <!-- tabela najnovejši trije za prikazovanje skrbi SiteController ->index funkcija -->
        <h4>Najnovejše na Blogu </h4>
        <table class="table table-responsive table-bordered">
            <tr class="glava">
                <th>Naslov</th>
                <th>Napisano</th>
            </tr>
            @foreach($newPosts as $item)
                <tr>
                    <td><a href="{{ route('posts.show', ['id' => $item->id])  }}">{{ $item->title }}</a></td>
                    <td>{{ $item->created_at}}</td>
                </tr>
            @endforeach

        </table>
        <!-- link na tabelo vseh objav  -->
        <a href="{{ route('blog') }}" class="btn btn-block btn-success"><span class="glyphicon glyphicon-align-justify"></span>
            Blog
        </a>
    </div>
@endsection