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
$query = "select * from `users` where `id` = '$pid'";
$filter_Result = mysqli_query($connect,$query);
while ($row=mysqli_fetch_array($filter_Result))
{
	$first_name=$row['first_name'];
	$last_name=$row['last_name'];
	$phone=$row['phone'];
	$login=$row['login'];
    $email=$row['email'];
 
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
                                <a href="users_admin.php">Powrót</a>
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
                <a href="users_admin.php">Powrót</a>
            </li>
            <li>
                <a href="index.php">Strona domowa</a>
            </li>
        </ul>
        <br>

        <div class="container">
            <div class="row">
                <h4 class="center"><span class="teal-text">Edytuj</span> Ofertę</h4><br>
                <form class="col s12" action="edit_user_success.php" method="post">
                    <input type="hidden" name="id" VALUE="<?php echo $pid ?>">
                    <div class="row">
                        <div class="input-field col s12">
                            <input placeholder="Nazwa" name="login" type="text" class="validate"
                                value="<?php echo $login ?>">
                            <label for="name">Login</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="first_name" type="text" class="validate" value="<?php echo $first_name ?>">
                            <label for="description">Imię</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="last_name" type="text" class="validate"
                                value="<?php echo $last_name ?>">
                            <label for="priceforperson">Nazwisko</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="email" type="text" class="validate"
                                value="<?php echo $email ?>">
                            <label for="email">E-mail</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="phone" type="text" class="validate" value="<?php echo $phone ?>">
                            <label for="startdate">Telefon</label>
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