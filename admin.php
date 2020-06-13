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

<body id="admin" class="scrollspy">
    <!--Górne menu pasek sticky -->
    <div class="navbar-fixed">
        <nav class="teal">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo">Panel administratora</a>
                    <a href="#" data-target="mobile-nav" class="sidenav-trigger">
                        <!--Jeśli zmniejszymy okno pojawi się hamburger menu -->
                        <i class="material-icons">menu</i>
                    </a>
                    <!--Elementy menu -->
                    <!--Wyrównanie do prawej i chowaj jeśli zmniejszy się okno -->
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a href="index.php">Strona domowa</a>
                        </li>
                        <li>
                            <a href="advertisment_admin.php">Zarządzaj ofertami</a>
                        </li>
                        <li>
                            <a href="index.php">Zarządzaj zamówieniami</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!--Hamburger menu, jeśli okno zostanie zmniejszone -->
    <ul class="sidenav" id="mobile-nav">
        <li>
            <a href="index.php">Strona domowa</a>
        </li>
        <li>
            <a href="advertisment_admin.php">Zarządzaj ofertami</a>
        </li>
        <li>
            <a href="index.php">Zarządzaj zamówieniami</a>
        </li>
    </ul>


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