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
$query = "select * from `advertisment` where `id` = '$pid'";
$filter_Result = mysqli_query($connect,$query);
while ($row=mysqli_fetch_array($filter_Result))
{
	$name=$row['name'];
	$description=$row['description'];
	$priceforperson=$row['priceforperson'];
	$picture=$row['picture'];
    $foodpriceforperson=$row['foodpriceforperson'];
    $startdate=$row['startdate'];
    $Finishdate=$row['finishdate'];
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
                                <a href="advertisment_admin.php">Powrót</a>
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
                <a href="advertisment_admin.php">Powrót</a>
            </li>
            <li>
                <a href="index.php">Strona domowa</a>
            </li>
        </ul>
        <br>

        <div class="container">
            <div class="row">
                <h4 class="center"><span class="teal-text">Edytuj</span> Ofertę</h4><br>
                <form class="col s12" action="edit_success.php" method="post">
                    <input type="hidden" name="id" VALUE="<?php echo $pid ?>">
                    <div class="row">
                        <div class="input-field col s12">
                            <input placeholder="Nazwa" name="name" type="text" class="validate"
                                value="<?php echo $name ?>">
                            <label for="name">Nazwa</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="description" type="text" class="validate" value="<?php echo $description ?>">
                            <label for="description">Opis</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="priceforperson" type="text" class="validate"
                                value="<?php echo $priceforperson ?>">
                            <label for="priceforperson">Cena / 1. osoba</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="foodpriceforperson" type="text" class="validate"
                                value="<?php echo $foodpriceforperson ?>">
                            <label for="foodpriceforperson">Wyżywienie / 1. osoba</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="startdate" type="text" class="datepicker" value="<?php echo $startdate ?>">
                            <label for="startdate">Od kiedy dostępna</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="finishdate" type="text" class="datepicker" value="<?php echo $Finishdate ?>">
                            <label for="finishdate">Do kiedy dostępna</label>
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