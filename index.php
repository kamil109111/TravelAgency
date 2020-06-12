<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js"
        integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous">
    </script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Twoje wczasy</title>
</head>

<body id="home" class="scrollspy">
    <!--Górne menu pasek sticky -->
    <div class="navbar-fixed">
        <nav class="teal">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo">Twoje wczasy</a>
                    <a href="#" data-target="mobile-nav" class="sidenav-trigger">
                        <!--Jeśli zmniejszymy okno pojawi się hamburger menu -->
                        <i class="material-icons">menu</i>
                    </a>
                    <!--Elementy menu -->
                    <!--Wyrównanie do prawej i chowaj jeśli zmniejszy się okno -->
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a href="admin.php">Panel administratora</a>
                        </li>
                        <li>
                            <a href="#home">Strona domowa</a>
                        </li>
                        <li>
                            <a href="#search">Wyszukaj</a>
                        </li>
                        <li>
                            <a href="advertisment.php">Oferty</a>
                        </li>
                        <li>
                            <a href="#popular">Popularne miejsca</a>
                        </li>
                        <li>
                            <a href="#gallery">Galeria</a>
                        </li>
                        <li>
                            <a href="#contact">Kontakt</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!--Hamburger menu, jeśli okno zostanie zmniejszone -->
    <ul class="sidenav" id="mobile-nav">
        <li>
            <a href="admin.php">Panel administratora</a>
        </li>
        <li>
            <a href="#home">Strona domowa</a>
        </li>
        <li>
            <a href="#search">Wyszukaj</a>
        </li>
        <li>
            <a href="advertisment.php">Oferty</a>
        </li>
        <li>
            <a href="#popular">Popularne miejsca</a>
        </li>
        <li>
            <a href="#gallery">Galeria</a>
        </li>
        <li>
            <a href="#contact">Kontakt</a>
        </li>
    </ul>

    <!-- Section: Slider -->
    <!-- 3 obrazki wyświetlane na zmianę -->
    <section class="slider">
        <ul class="slides">
            <li>
                <img src="img/1.jpg">
                <!-- random image -->
                <div class="caption center-align">
                    <h2>Wakacje twoich marzeń!</h2>
                    <h5 class="light grey-text text-lighten-3 hide-on-small-only">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Quidem, provident eos dicta unde debitis</h5>
                </div>
            </li>
            <li>
                <img src="img/2.jpg">
                <!-- random image -->
                <div class="caption left-align">
                    <h2>Z nami nareszcie odpoczniesz ...</h2>
                    <h5 class="light grey-text text-lighten-3 hide-on-small-only">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Possimus delectus inventore neque impedit</h5>
                </div>
            </li>
            <li>
                <img src="img/3.jpg">
                <!-- random image -->
                <div class="caption right-align">
                    <h2>... chociaż nigdy nie wiadomo</h2>
                    <h5 class="light grey-text text-lighten-3 hide-on-small-only">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Sunt ipsum molestias excepturi doloremque</h5>
                </div>
            </li>
        </ul>
    </section>

    <!-- Section: Search -->

    <section id="search" class="section section-search teal darken-1 white-text center scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h3>Wyszukaj Ofertę</h3>
                    <div class="input-field">
                        <input type="text" class="white grey-text autocomplete" id="autocomplete-input"
                            placeholder="Egipt, Hiszpania, itp...">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Icon Boxes -->
    <!-- Trzy boxy z ikonami-->

    <section class="section section-icons grey lighten-4 center">
        <div class="container">
            <div class="row">
                <div class="col s12 m4">
                    <div class="card-panel" style="height: 365px;">
                        <!-- Wybór ikony, rozmiaru i koloru  -->
                        <i class="material-icons large teal-text">airplanemode_active</i>
                        <h4>Najszersza oferta biur podróży</h4>
                        <p>Wszyscy najwięksi organizatorzy w jednym miejscu!</p>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card-panel" style="height: 365px;">
                        <i class="material-icons large teal-text">attach_money</i>
                        <h4>Gwarancja ceny</h4>
                        <p>Wycieczki kosztują dokładnie tyle, ile u organizatorów. Porównaj i oszczędź!</p>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card-panel" style="height: 365px;">
                        <i class="material-icons large teal-text">beach_access</i>
                        <h4>Miliony zadowoloych klientów</h4>
                        <p>Gwarantujemy bezpieczne wakacje od 2001 r. Bądź spokojny o swój wypoczynek!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Popular Places -->
    <section id="popular" class="section section-popular scrollspy">
        <div class="container">
            <div class="row">
                <!--Nagłówek sekcji-->
                <h4 class="center">
                    <span class="teal-text">Popularne</span> Miejsca</h4>
                <div class="col s12 m4">
                    <div class="card" style="height: 365px;">
                        <div class="card-image">
                            <img src="images/meksyk.jpg" alt="">
                            <span class="card-title">Meksyk</span>
                        </div>
                        <div class="card-content">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum ea deserunt officia, dicta
                            sint perferendis.
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card" style="height: 365px;">
                        <div class="card-image">
                            <img src="images/bahamy.jpg" alt="">
                            <span class="card-title">Bahamy</span>
                        </div>
                        <div class="card-content">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum ea deserunt officia, dicta
                            sint perferendis.
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card" style="height: 365px;">
                        <div class="card-image">
                            <img src="images/grecja.jpg" alt="">
                            <span class="card-title">Grecja</span>
                        </div>
                        <div class="card-content">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum ea deserunt officia, dicta
                            sint perferendis.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Follow -->
    <!-- Sekcja z linkami do mediów społecznościowych-->

    <section class="section section-follow teal darken-2 white-text center">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h4>Śledź nas!</h4>
                    <p>Śledź nasze media społecznościwe i zgarniaj oferty specjalne</p>
                    <a href="face.html" class="white-text">
                        <i class="fab fa-facebook fa-4x"></i>
                    </a>
                    <a href="#" class="white-text">
                        <i class="fab fa-twitter fa-4x"></i>
                    </a>
                    <a href="#" class="white-text">
                        <i class="fab fa-linkedin fa-4x"></i>
                    </a>
                    <a href="#" class="white-text">
                        <i class="fab fa-google-plus fa-4x"></i>
                    </a>
                    <a href="#" class="white-text">
                        <i class="fab fa-pinterest fa-4x"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Gallery -->
    <!-- -->

    <section id="gallery" class="section section-gallery scrollspy">
        <div class="container">
            <h4 class="center">
                <span class="teal-text">Galeria</span> Zdjęć
            </h4>
            <div class="row">
                <div class="col s12 m3">
                    <img src="https://source.unsplash.com/1600x900/?beach" alt="" class="materialboxed responsive-img">
                </div>
                <div class="col s12 m3">
                    <img src="https://source.unsplash.com/1600x900/?travel" alt="" class="materialboxed responsive-img">
                </div>
                <div class="col s12 m3">
                    <img src="https://source.unsplash.com/1600x900/?nature" alt="" class="materialboxed responsive-img">
                </div>
                <div class="col s12 m3">
                    <img src="https://source.unsplash.com/1600x900/?beach, travel" alt=""
                        class="materialboxed responsive-img">
                </div>
            </div>

            <div class="row">
                <div class="col s12 m3">
                    <img src="https://source.unsplash.com/1600x900/?water" alt="" class="materialboxed responsive-img">
                </div>
                <div class="col s12 m3">
                    <img src="https://source.unsplash.com/1600x900/?building" alt=""
                        class="materialboxed responsive-img">
                </div>
                <div class="col s12 m3">
                    <img src="https://source.unsplash.com/1600x900/?trees" alt="" class="materialboxed responsive-img">
                </div>
                <div class="col s12 m3">
                    <img src="https://source.unsplash.com/1600x900/?cruise" alt="" class="materialboxed responsive-img">
                </div>
            </div>

            <div class="row">
                <div class="col s12 m3">
                    <img src="https://source.unsplash.com/1600x900/?beaches" alt=""
                        class="materialboxed responsive-img">
                </div>
                <div class="col s12 m3">
                    <img src="https://source.unsplash.com/1600x900/?traveling" alt=""
                        class="materialboxed responsive-img">
                </div>
                <div class="col s12 m3">
                    <img src="https://source.unsplash.com/1600x900/?bridge" alt="" class="materialboxed responsive-img">
                </div>
                <div class="col s12 m3">
                    <img src="https://source.unsplash.com/1600x900/?beach, travel,boat" alt=""
                        class="materialboxed responsive-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Contact -->
    <section id="contact" class="section section-contact scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12 m6">
                    <div class="card-panel teal white-text center">
                        <i class="material-icons">email</i>
                        <h5>Napisz do nas!</h5>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo praesentium fugit tempore hic
                            enim possimus molestias
                            quisquam impedit corrupti eveniet.</p>
                    </div>
                    <ul class="collection white-header">
                        <li class="collection-item">
                            <h4> Adres:</h4>
                        </li>
                        <li class="collection-item">Biuro podróży "Twoje wczasy"</li>
                        <li class="collection-item">ul. Szkolna 17 </li>
                        <li class="collection-item">12-432 Białystok</li>
                    </ul>
                </div>
                <div class="col s12 m6">
                    <div class="card-panel grey lighten-3">
                        <h5>Wypełij formularz</h5>
                        <div class="input-field">
                            <input type="text" placeholder="Imię">
                        </div>
                        <div class="input-field">
                            <input type="text" placeholder="Email">
                        </div>
                        <div class="input-field">
                            <input type="text" placeholder="Nr. telefonu">
                        </div>
                        <div class="input-field">
                            <textarea class="materialize-textarea" placeholder="Wpisz wiadomość"></textarea>
                        </div>
                        <input type="submit" value="Wyślij" class="btn">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="section teal darken-2 white-text center">
        <p class="flow-text">Twoje Wczasy &copy; 2020 </p>
    </footer>




    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
    // Skrypt inicjalizujący sidenav
    const sideNav = document.querySelector('.sidenav');
    M.Sidenav.init(sideNav, {});

    // Slider
    const slider = document.querySelector('.slider');
    M.Slider.init(slider, {

        // takie kropeczki pod spodem    
        indicators: true,
        // wiadomo wysokość
        height: 500,
        // szybkość przejść
        transition: 500,
        // szybkość zmieniania slajdów
        interval: 6000
    });

    // Autocomplete do wyszukiwarki
    const ac = document.querySelector('.autocomplete');
    M.Autocomplete.init(ac, {
        data: {
            "Egipt": null,
            "Meksyk": null,
            "Hiszpania": null,
            "USA": null,
            "Bahamy": null,
            "Jamajka": null,
            "Austria": null,
        }
    });

    // Material Boxed
    // Żeby można było powiększyć obraz z galerii
    const mb = document.querySelectorAll('.materialboxed');
    M.Materialbox.init(mb, {});

    // ScrollSpy
    // Po kliknięciu w menu na jakiś link, strona nie będzię przeskakiwać tylko przewijać do danej sekcji 
    const ss = document.querySelectorAll('.scrollspy');
    M.ScrollSpy.init(ss, {});
    </script>

</body>

</html>