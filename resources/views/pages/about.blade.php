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
            <li><a href="#tabs-3">Programiranje</a></li>
            <li><a href="#tabs-4">Ostale aktivnosti</a></li>
        </ul>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div id="tabs-1">
                    <h2 class="sredinsko">Janko Pirih</h2>
                    <div class="sredinsko">
                        <img src="http://i.imgur.com/H8bWfnK.jpg" alt="mojaSlika"/></a>
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
                    <h3>Programiranje</h3>
                    
                    <p>
                        Zgodba o mojem programiranju se je začela bolj resno nekje v letu 2014. Ko sem se 
                        učenja programiranja najprej lotil sam s pomočjo raznih tutorialov na spletu. 
                        Potem pa sem jeseni leta 2015 odkril tečaje, ki jih organizira 
                        <span class="krepko"><a href="https://www.smartninja.org/" target="_blank">SmartNinja</a></span>
                        Takrat je učenje postalo veliko bolj zabavno in učinkovito (hitrejše).
                    </p>
                    <p>
                        Pri smart naslednje tečaje:
                        <ul>
                            <li>Vikend Programiranja (HTML, CSS, Bootstrap)</li>
                            <li>Web development 1 (HTML, CSS, Bootstrap, Python, Google App Engine)</li>
                            <li>Web development 2 (HTML, CSS, Bootstrap, MySQL, PHP, Laravel, Javascript)</li>
                            <li>Android development(Java Android, XML)</li>
                            <li>AngularJS</li>
                        </ul>
                    </p>
                    <p>
                        Poleg znanja, ki sem ga pridobil na tečajih še vedno rad raziskujem tudi sam in se vedno učim
                        česa novega.  Kar nekaj od tega je tudi na mojem <span class="krepko"><a href="https://github.com/jpirih">Github-u</a></span>
                        Pa tudi tam ni čisto vsega.
                    </p>

                    <p>
                        Za enkrat še nisem delal na nobenem večjem projektu. Bom pa zelo vesel, če me bo kontaktiral,
                        kdo, ki misli, da bi mu lahko s svojim znanjem in delovno zagnanostjo pomagal.
                    </p>

                </div>
                <div id="tabs-4">
                    <h3>Delovne izkušnje in ostale aktivnosti</h3>
                    <p>
                        Na tem mestu bi rad napisal še nekaj stvari, ki še niso omenjene v prejšnjih zavihkih.
                    </p>

                    <h4>Delovne izkušnje</h4>
                    <ol>
                        <li>Eta Cerkno</li>
                        <li>EF UL demonstrator</li>
                        <li>Termopol Sovoedenj</li>
                        <li>Stotnkar d.o.o.</li>
                    </ol>

                    <h4>Domače aktivnosti</h4>
                    <p>
                        Zgoraj sem na hitro naštel moje delovne iskušnje  naštete so samo tiste, za katere
                        sem bil dosedaj plačan :).  Drugače pa ja  rad delam veliko različnih stvari v življenju.
                        skratka zelo težko sem primiru.
                    </p>
                    <p>
                        Kljub temu, da me delo z račualniki in programiranje zelo veseli, nisem človek, ki bi lahko
                        10 ur na dan sedel za računalnikom.  Doma imamo kmetijo, tako, da kar nekaj časa, ko sem doma
                        vzame tudi to delo.  Tukaj še ena za vse tiste, ki mislite, da je delo na kemtiji sezonsko
                        <span class="krepko">ni res</span> delo je seveda  različno tudi do letnega časa pa še od monogo
                        drugega, ga je pa vedno ogoromno. Pa še ena za vse  tiste, ki mislite, da je življenje na ketih
                        romantično tudi to <span class="krepko">ni res</span>. Seveda je veliko lepih trenutkov, posebno
                        če si jih zanmo ustvariti sami. Ni pa kakšne filemske romantike.
                    </p>
                    <p>
                        Poleg tega, pa se z veseljem lotim kašnega prostovalnega dela, se pač sproti pokaže. :)
                    </p>


                </div>

            </div>

        </div>
    </div>


<script>
    $('#tabs').tabs();
</script>
@endsection
