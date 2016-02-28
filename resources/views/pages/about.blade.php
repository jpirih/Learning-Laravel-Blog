@extends('base')

@section('title')
    O meni
@endsection

@section('page-heading')
    O meni
@endsection

@section('description')
    Nekaj stvari zelo na kratko o meni
    Vse kar piše je res je pa tudi res da ni vse napisno :)
@endsection

@section('content')
<div class="col-sm-6 col-sm-offset-3">
    <h2 class="sredinsko">Janko Pirih</h2>
    <div class="sredinsko">
        <img src="https://scontent-vie1-1.xx.fbcdn.net/hphotos-xaf1/v/t1.0-9/602661_4159091249390_596006088_n.jpg?oh=166d03b5d65b7bd35e24aafa8edbb6e5&oe=5764EC2C" alt="mojaSlika"/></a>
    </div>
    <br>
    <!-- TAbela osnovni podatki -->
    <div class=>
        <table class="table table-bordered table-responsive">
            <tr>
                <th colspan="2">Osnovni Podatki</th>
            </tr>
            <tbody>
            <tr>
                <td class="krepko">Izobrazba</td>
                <td>diplomirani ekonomist (VS) - brez prakse</td>
            </tr>
            <tr>
                <td class="krepko">Domači Kraj</td>
                <td>Podlanišče</td>
            </tr>
            <tr>
                <td class="krepko">Občina</td>
                <td>Cerkno</td>
            </tr>
            <tr>
                <td class="krepko">Upravna enota</td>
                <td>Idrija</td>
            </tr>
            <tr>
                <td class="krepko">Rojen</td>
                <td>20.8.1988</td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- O meni -->

    <h3>O Meni</h3>
    <p>
        Torej nekaj zelo na kratko o meni, samo zato da tisi podatki v tabeli pod sliko dobijo nekaj smisla.
        Sem Janko Pirih po izobrazbi sicer diplomiran ekonomist vendar ekonoije prav nič ne pogrešam. Sam zase rad rečem:
        <span class="italic">"Jest sn an čest  nawadn dilat pa tihu bit wajen pub :)."</span>   Iz tega sledi za vse, ki niste razumenli navedenega,
        da primem za vsako delo, ki ga je potrebno opraviti, rad imam kratka in jasna navodila. Rad ima ljudi, ki govorijo malo
        pa še to kratko in jedrnato brez nepotrebnih olepšav in dolovezenja.
    </p>
    <p>
        Drugače pa bolj na klasičen način Rodil sem se 20. avgusta 1988 v porodnišnici Kranj očetu Janezu in Mami Olgi. Imam tri
        mlajše sestre od kateri sta dve že poročeni. Skupaj živimo na srednje veliki kmetiji
        <span><a href="https://www.facebook.com/na.lanisah?ref=profile">Na lanišeh</a></span> pod
        Ermanovcem na nadmorski višini 920 metov. Oče je doma na kmetiji  mami pa je zaposlena v podjetju
        <span><a href="http://www.termopol.si/tps/">Termopol d.o.o</a></span>.
    </p>

</div>

</div>
</div>

@endsection
