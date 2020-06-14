<?php

 session_start();

 if(isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany']==true))     
 {
     if(isset($_SESSION['typeofuser'])&&($_SESSION['typeofuser']=='admin'))
     {
        
     }
     else
     {
        header('Location: index.php');
		exit();
     }
 }
 else
     {
        header('Location: login.php');
		exit();
     }

if(isset($_GET['pid']))
{
	$pid=$_GET['pid'];	
}

require_once "connect.php";
$query = "select * from `orders` where `id` = '$pid'";
$filter_Result = mysqli_query($connect,$query);
while ($row=mysqli_fetch_array($filter_Result))
{
    $ad_id=$row['ad_id'];
    $first_date=$row['first_date'];
	$second_date=$row['second_date'];
	$persons=$row['persons'];
    $food=$row['food'];
   
}



?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
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

<body>


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
                                <a href="orders_admin.php">Powrót</a>
                            </li>
                            <li>
                                <a href="index.php">Strona domowa</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!--Hamburger menu, jeśli okno zostanie zmniejszone -->
        <ul class="sidenav" id="mobile-nav">
            <li>
                <a href="orders_admin.php">Powrót</a>
            </li>
            <li>
                <a href="index.php">Strona domowa</a>
            </li>
        </ul>
        <br>

        <div class="container">
            <div class="row">
                <h4 class="center"><span class="teal-text">Edytuj</span> Zamówienie</h4><br>
                <form class="col s12" action="edit_summary_admin.php" method="post">
                    <input type="hidden" name="pid" VALUE="<?php echo $pid ?>">
                    <input type="hidden" name="ad_id" VALUE="<?php echo $ad_id ?>">
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="first_date" type="text" class="datepicker" value="<?php echo $first_date ?>">
                            <label for="first_date">Od kiedy</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="second_date" type="text" class="datepicker" value="<?php echo $second_date ?>">
                            <label for="second_date">Do kiedy</label>
                        </div>
                        <div>
                            <div class="input-field col s12">
                                <input type="text" name="persons" value="<?php echo $persons ?>">
                                <label for="persons">Ilość osób</label>
                            </div>
                        </div>
                        <div>
                            <label>
                                <input type="checkbox" name="food" class="filled-in" 
                                    value="<?php echo $food ?>" />
                                <span>Wyżywienie</span>
                            </label>
                        </div>

                    </div>
                    <input type="submit" value="Aktualizuj" class="btn">
                </form>
            </div>
        </div>


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

        //Datapicker

        const dp = document.querySelectorAll('.datepicker');
        M.Datepicker.init(dp, {
            showClearBtn: true,
            format: "yyyy/mm/dd",
        });

        //Selector
        const os = document.querySelectorAll('select');
        M.FormSelect.init(os, {});
        </script>

    </body>

</html>