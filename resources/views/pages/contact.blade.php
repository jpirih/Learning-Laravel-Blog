@extends('base')

@section('title')
    Kontakt in Lokacija
@endsection

@section('page-heading')
    Kontakt in Lokacija
@endsection
@section('description')
    Zelo lahko me najdeš :)
@endsection

@section('content')
    <div class="col-sm-6">
        <h3>Kontaktni podatki</h3>
        <div class="list-group">
            <div class="list-group-item">
                Janko Pirih <br>
                Podlanišče 15 <br>
                5282 Cerkno <br>
                e-pošta: <a href="mailto://janko.pirih@gmail.com">janko.pirih@gmail.com</a> <br>
                Facebook: <a href="https://www.facebook.com/janko.pirih">Moj facebook profil</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>Lokacija</h2>
            <p>
                Ta razdelek sem želel dodati, za vse tiste, ki mislijo, da živim na koncu sveta. Citat enega
                dostavljalca hitre pošte, ko sem ga le pregovoril naj mi paket prosim prinese domov:
                <span class="italic">Pa kje vi to žvite :)</span>
            </p>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p>Ker so nekateri podatki že zgoraj dodam na tem mestu samo še zemljevid - Vir google- maps</p>
                <div class="col-sm-6 col-sm-offset-3">
                    <iframe   width="100%" height="480px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2765.8399544322733!2d14.031119999999994!3d46.11409599999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477ae62aa0a1fc03%3A0x83f0940e07c4f71!2sPodlani%C5%A1%C4%8De+15%2C+5282+Cerkno!5e0!3m2!1ssl!2ssi!4v1444150600601" frameborder="0" allowfullscreen>                               </iframe>
                </div>
            </div>
        </div>
    </div>
@endsection