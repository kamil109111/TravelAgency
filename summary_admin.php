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
  

if(isset($_POST['name']))
{
    $name=$_POST['name'];	

}


require_once "connect.php";
$query = "select * from `advertisment` where `name` = '$name'";
$filter_Result = mysqli_query($connect,$query);
while ($row=mysqli_fetch_array($filter_Result))
{
	
	$id=$row['id'];
	$priceforperson=$row['priceforperson'];	
    $foodpriceforperson=$row['foodpriceforperson'];    
    $date1=$_POST['first_date'];
    $date2=$_POST['second_date'];
    $persons=$_POST['persons'];	

}

$days = round((strtotime($date2)-strtotime($date1))/86400); 

if(isset($_POST['food']))
{
    $foodprice=$persons*$foodpriceforperson*$days;
    $food=1;
}
else
{
    $foodprice=0;
    $food=0;
}

$accprice=$persons*$days*$priceforperson;

$overall=$accprice+$foodprice;

	

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
                                <a href="orders_admin.php">Wróć do listy zamówień</a>
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
                <a href="orders_admin.php">Wróć do listy zamówień</a>
            </li>
            <li>
                <a href="index.php">Strona domowa</a>
            </li>
        </ul>

        <section id="summary">
            <div class="container">
                <h2 class="center">
                    <span class="teal-text">Podsumowanie</span>
                    <hr>
                </h2>
                <h3><?php echo $name ?> </h3>
                <h5>Od: <?php echo $date1 ?></h5>
                <h5>Do: <?php echo $date2 ?></h5>
                <h5>Ilość dni: <?php echo $days ?></h5>
                <h5>Ilość osób: <?php echo $persons ?></h5>
                <h5>Wyżywienie: <?php echo $foodprice ?> zł</h5>
                <h5>Zakwaterowanie: <?php echo $accprice ?> zł</h5>
                <hr>
                <h4>Łączna cena: <?php echo $overall ?> zł</h4>
                <form action="success_admin.php" method="post">
                    <input type="hidden" name="id" VALUE="<?php echo $id ?>">
                    <input type="hidden" name="date1" VALUE="<?php echo $date1 ?>">
                    <input type="hidden" name="date2" VALUE="<?php echo $date2 ?>">
                    <input type="hidden" name="persons" VALUE="<?php echo $persons ?>">
                    <input type="hidden" name="food" VALUE="<?php echo $food ?>">
                    <input type="hidden" name="overall" VALUE="<?php echo $overall ?>">
                    <div class="center">
                        <input type="submit" class="waves-effect waves-light btn-large pulse" value="Potwierdź" />
                    </div>
                </form>

                <br><br>

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
                });

                //Selector
                const os = document.querySelectorAll('select');
                M.FormSelect.init(os, {});
                </script>

    </body>

</html>