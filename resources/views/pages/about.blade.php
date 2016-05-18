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
    <div id="tabs">
        <div class="col-sm-12">
        <ul>
            <li><a href="#tabs-1">Osnovni podatki</a></li>
            <li><a href="#tabs-2">O meni</a></li>
            <li><a href="#tabs-3">Delovne izkušnje</a></li>
            <li><a href="#tabs-4">Ostale aktivnosti</a></li>
        </ul>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div id="tabs-1">
                    <h2 class="sredinsko">Janko Pirih</h2>
                    <div class="sredinsko">
                        <img src="https://scontent-vie1-1.xx.fbcdn.net/hphotos-xaf1/v/t1.0-9/602661_4159091249390_596006088_n.jpg?oh=166d03b5d65b7bd35e24aafa8edbb6e5&oe=5764EC2C" alt="mojaSlika"/></a>
                    </div>
                    <br>
                    <!-- TAbela osnovni podatki -->
                        <table class="table table-responsive table-bordered table-striped">
                            <thead>
                            <tr>
                                <th colspan="2" class="glava">Osnovni Podatki</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="krepko glava">Izobrazba</td>
                                <td>diplomirani ekonomist (VS) - brez prakse</td>
                            </tr>
                            <tr>
                                <td class="krepko glava">Domači Kraj</td>
                                <td>Podlanišče</td>
                            </tr>
                            <tr>
                                <td class="krepko glava">Občina</td>
                                <td>Cerkno</td>
                            </tr>
                            <tr>
                                <td class="krepko glava">Upravna enota</td>
                                <td>Idrija</td>
                            </tr>
                            <tr>
                                <td class="krepko glava">Rojen</td>
                                <td>20.8.1988</td>
                            </tr>
                            <tr>
                                <td class="krepko glava">Linki</td>
                                <td>
                                    <a href="https://github.com/jpirih" target="_blank">Github</a> <br>
                                    <a href="https://www.linkedin.com/in/janko-pirih-295bab14" target="_blank">LinkedIn</a> <br>
                                    <a href="https://www.facebook.com/janko.pirih" target="_blank">Facebook</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                </div>

                <div id="tabs-2">
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
                <div id="tabs-3">
                    <h3>Delovne izkušnje</h3>
                    <ol>
                        <li>Eta Cerkno</li>
                        <li>EF UL demonstrator</li>
                        <li>Termopol Sovoedenj</li>
                    </ol>
                </div>
                <div id="tabs-4">
                    <h3>Ostale aktivnosti</h3>
                    <p>
                        Torej na tem mestu še neakj ostalih stvari, ki niso naštete v ostalih
                        zavihkih
                    </p>

                    <h4>Domače aktivnosti</h4>
                    <ul>
                        <li>Pomoč pri  zunannjih opravili odvisno do dela  - trenutno lubadar (sept/okt 2015)</li>
                        <li>Razna gosopodinjska opravila - podporne aktivnosti</li>
                        <li>Delo v hlevu - (glejštajne)</li>
                        <li>Predelava mleka izdelava mlečnih izdelkov (poltrdi sir, skuta, jogurt, mladi sir)</li>
                        <li>Razno ostalo</li>
                    </ul>

                    <h4>Izobraževanje</h4>
                    <ul>
                        <li> Predelava mleka - BC Naklo</li>
                        <li>Računalniištvo(programiranje, operacijski sistemi, baze podatkov...)</li>
                    </ul>

                    <h4>Dodatno</h4>
                    <ul>
                        <li>Prostovoljno delo - mladinske skupine</li>
                        <li>Sosedska pomoč - Žernade</li>
                    </ul>

                </div>

            </div>

        </div>
    </div>


<script>
    $('#tabs').tabs();
</script>
@endsection
