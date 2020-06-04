<?php

	if (isset($_POST['search']))
	{
		$valueToSearch = $_POST['valueToSearch'];
		// search in all table columns
		// using concat mysql function
		$query = "SELECT * FROM `advertisment` WHERE CONCAT(`name`) LIKE '%".$valueToSearch."%'";
		$search_result = filterTable($query);	
	}
	else
	{
		$query = "SELECT * FROM `advertisment`";
		$search_result = filterTable($query);
	}

	function filterTable($query)
	{
		$connect = mysqli_connect("localhost", "root", "", "travel_agency");
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
        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl"
          crossorigin="anonymous"></script>
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
                              <a href="index.php">Strona domowa</a>
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
          <a href="#search">Wyszukaj</a>
        </li>
    </ul>   

  <!-- Section: Search -->

  <section id="search" class="section section-search teal darken-1 white-text center scrollspy">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <h3>Wyszukaj Ofertę</h3>
          <div class="input-field">
          <form action="advertisment.php" method="post"> 
            <input type="text" name="valueToSearch" class="white grey-text autocomplete" id="autocomplete-input" placeholder="Egipt, Hiszpania, itp...">
            <input type="submit" name="search" value="Szukaj">
          </div>
        </div>
      </div>
    </div>
  </section>


    

      <!-- Section: Popular Places -->
  <section id="advert" class="section section-popular scrollspy">
    <div class="container">
      <div class="row">
        <!--Nagłówek sekcji-->
        <h4 class="center">
          <span class="teal-text">Nasze</span> Oferty</h4>

          <?php while($row = mysqli_fetch_array($search_result)):?>
               
        <div class="col s12 m4">
          <div class="card" style="height: 365px; max-width: 260px">
            <div class="card-image">
              <img src="images/<?php echo $row['picture'];?>" alt="">
              <span class="card-title"><?php echo $row['name'];?></span>
            </div>
            <div class="card-content">
              <div >
              <h5 class="left-align">
               <span class="teal-text">Cena / 1 os.:</span></h5>
              <h4><?php echo $row['priceforperson'];?> zł </h4>
                 
               </div>   
            </div>
          </div>
        </div>
        <?php endwhile;?>
        
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