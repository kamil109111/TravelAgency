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
  

	if (isset($_POST['search']))
	{
		$valueToSearch = $_POST['valueToSearch'];
		// search in all table columns
		// using concat mysql function
		$query = "SELECT * FROM `orders` WHERE CONCAT(`id`) LIKE '%".$valueToSearch."%'";
		$search_result = filterTable($query);	
	}
	else
	{
		$query = "SELECT * FROM `orders`";
		$search_result = filterTable($query);
	}

	function filterTable($query)
	{
        require_once "connect.php";
		$filter_Result = mysqli_query($connect, $query);
		return $filter_Result;
	}	
	
?>


<!DOCTYPE html>
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

<body class="scrollspy">
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
                            <a href="index.php">Strona domowa</a>
                        </li>
                        <li>
                            <a href="admin.php">Panel administratora</a>
                        </li>
                        <li>
                            <a href="#search">Wyszukaj</a>
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
            <a href="admin.php">Panel administratora</a>
        </li>
        <li>
            <a href="#search">Wyszukaj</a>
        </li>
    </ul>

    <!-- Section: Search -->

    <section id="search" class="section section-search teal darken-1 white-text center scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h3>Wyszukaj Zamówienie</h3>
                    <div class="input-field">
                        <form action="orders_admin.php" method="post">
                            <input type="text" name="valueToSearch" class="white grey-text autocomplete"
                                id="autocomplete-input" placeholder="Id zamówienia...">
                            <input type="submit" name="search" value="Szukaj">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="advert" class="section section-popular scrollspy">
        <div class="container">
            <div class="row">

                <!--Nagłówek sekcji-->
                <h4 class="center"><span class="teal-text">Zarządzaj</span> Zamówieniami</h4>

                <br><br>

                <a href="add_order.php" class="waves-effect waves-light btn-large"><i
                        class="material-icons right">add</i>Dodaj ofertę</a>

                <br><br>

                <!-- Oferty z bazy danych -->

                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nazwa</th>
                            <th>Użytkownik</th>
                            <th>Od</th>
                            <th>Do</th>
                            <th>Ilość osób</th>
                            <th>Wyżywienie</th>
                            <th>Suma</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <?php while($row = mysqli_fetch_array($search_result)):?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><a
                                    href='details_for_admin.php?pid=<?php echo $row['ad_id']?>'><?php echo $row['ad_id'];?></a>
                            </td>
                            <td><a
                                    href='details_of_user.php?uid=<?php echo $row['user_id']?>'><?php echo $row['user_id'];?></a>
                            </td>
                            <td><?php echo $row['first_date'];?></td>
                            <td><?php echo $row['second_date'];?></td>
                            <td><?php echo $row['persons'];?></td>
                            <td><?php if ($row['food'] == 1){echo "TAK";}else{echo "NIE";};?></td>

                            <td><?php echo $row['overall'];?></td>
                            <td><?php echo $row['status'];?></td>
                            <td><a href='edit_order.php?pid=<?php echo $row['id']?>'>
                                    <span class="waves-effect blue darken-3 waves-light btn"><i
                                            class="material-icons">edit</i>edytuj</span>
                                </a>
                            </td>
                            <td><a href='delete_order_success.php?pid=<?php echo $row['id']?>'>
                                    <span class="waves-effect red darken-3 waves-light btn"><i
                                            class="material-icons">delete_forever</i>usuń</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    <?php endwhile;?>
                </table>
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