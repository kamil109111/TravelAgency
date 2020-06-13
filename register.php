<?php

 session_start();
 
 /*Sprawdzamy czy przycisk zarejestruj sie został kliknięty*/
 /*poprzez sprawdzenie czy zmienna w emaili w POST została ustawiona*/
 if (isset($_POST['email']))
 {
	 //Udana walidaja
	 $wszystko_OK=true;
	 
	 //Sprawdzenie poprawności nickaname
	 $login = $_POST['login'];
	 
	 //Sprawdzenie długości nicka
	 if ((strlen($login)<3) || (strlen($login)>20))
	 {
		 $wszystko_OK=false;
		 $_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
	 }
	 //Sprawdzamy czy nick składa się ze znaków alfanumerycznych
	 if (ctype_alnum($login)==false)
	 {
		$wszystko_OK=false;
		$_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)!";
	 }
	 
	 //Sprawdzenie poprawności email
	 $email = $_POST['email'];
	 //Funkcja która usuwa niepoprawne znaki z email
	 $emailB = filter_var($email,FILTER_SANITIZE_EMAIL);
	 
	 //Sprawdzany walidację emailB lub czy email różni się od emaila po sanityzacji
	 if ((filter_var($emailB,FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
	 {
		$wszystko_OK=false;
		$_SESSION['e_email']="Podaj poprawny adres e-mail!";
     }
     
     $first_name=$_POST['first_name'];
     $last_name=$_POST['last_name'];
     $phone=$_POST['phone'];
	 
	 //Sprawdzenie poprawnośći hasłą
	 $haslo1 = $_POST['haslo1'];
	 $haslo2 = $_POST['haslo2'];
	 
	 if((strlen($haslo1)<8) || (strlen($$haslo1)>20))
	 {
		$wszystko_OK=false;
		$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
	 }
	 
	 //Sprawdzenie czy haslo1 i haslo2 są takie same
	 if ($haslo1!=$haslo2)
	 {
		$wszystko_OK=false;
		$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
	 }
	 
	 //PASSWORD_DEFAULT to stała oznaczająca: użyj najsilniejszego algorytmu hashujacego, jaki jest dostępny
	 $haslo_hash = password_hash($haslo1,PASSWORD_DEFAULT);
	 
	 //Czy zaakceptowano regulamin
	 if(!isset($_POST['regulamin']))
	 {
		$wszystko_OK=false;
		$_SESSION['e_regulamin']="Potwiedź akceptację regulaminu!";
	 }
	 
	 //Czy jesteś robotem?
	 
	 $sekret = "6Ld3QfUUAAAAANQ0O1mXQsnz13V0zLq7wigtiPdw";
	 
	 //file_get_content, czyli pobierz zawartość pliku do zmiennej
	 $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
	 
	 $odpowiedz = json_decode($sprawdz);
	 
	 if($odpowiedz->success==false)
	 {
		$wszystko_OK=false;
		$_SESSION['e_bot']="Potwiedź że nie jesteś robotem!";
	 }
	 
	 //Łączenie z bazą danych
	 //try .. catch czyli np. spróbuj (try) połączyć się z bazą danych i złap (catch) pojawiające się błędy.
	 
	 require_once "connect.php";
	 
	 //Informujemy php że zamiast ostrzeżeń chcemy rzucać wyjątki, po to by użytkownik nie widział ostrzeżeń i poufnych danych
	 mysqli_report(MYSQLI_REPORT_STRICT);	
	 
	 try
	 {
		 
		 
		 if($connect->connect_errno!=0)
			{
				//Rzuć nowym wyjątkiem, po to by funkcja catch go złapała
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy email już istnieje?
				$rezultat = $connect->query("SELECT id FROM users WHERE email='$email'");
				
				if(!$rezultat) throw new Exception($connect->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";	
				}
				
				//Czy nick już istnieje?
				$rezultat = $connect->query("SELECT id FROM users WHERE `login`='$login'");
				
				if(!$rezultat) throw new Exception($connect->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Wybierz inny login.";	
				}
				
				if($wszystko_OK==true)
				{
					//Wszystkie testy zaliczone, dodajemy gracza do bazy
					
					if($connect->query("INSERT INTO users VALUES (NULL,'$login','$haslo_hash','$email','$first_name','$last_name','$phone','')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: welcome.php');				
					}	
					else
					{
						throw new Exception($connect->error);
					}
				}
				
				$connect->close();
			}
	 }	 
	 catch(Exception $e)
	 {
		echo '<span style="color:red;">"Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
		echo '<br/>Informacja developerska: '.$e;		
	 }	 
 }
 
 
?>

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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js"
        integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous">
    </script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Twoje wczasy</title>

    <style>
    .error {
        color: red;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    </style>

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
    </ul>
    <br><br>

    <div class="row">
        <h4 class="center"><span class="teal-text">Rejestracja</span></h4>

        <div class="container">
            <div class="col s12 m12">
                <br><br>


                <form method="post">

                    Login:<br /><input type="text" name="login" /><br />


                    <?php
    //Sprawdzamy czy e_nick został ustawiony
    
    if (isset($_SESSION['e_nick']))
    {
        echo'<div class="error">'.$_SESSION['e_nick'].'</div>';
        unset($_SESSION['e_nick']);
    }		
    ?>

                    Imię:<br /><input type="text" name="first_name" /><br />

                    Nazwisko:<br /><input type="text" name="last_name" /><br />

                    Numer telefonu:<br /><input type="text" name="phone" /><br />


                    E-mail:<br /><input type="text" name="email" /><br />

                    <?php
    //Sprawdzamy czy e_email został ustawiony
    
    if (isset($_SESSION['e_email']))
    {
        echo'<div class="error">'.$_SESSION['e_email'].'</div>';
        unset($_SESSION['e_email']);
    }		
    ?>

                    Twoje hasło:<br /><input type="password" name="haslo1" /><br />

                    <?php
    //Sprawdzamy czy e_haslo został ustawiony
    
    if (isset($_SESSION['e_haslo']))
    {
        echo'<div class="error">'.$_SESSION['e_haslo'].'</div>';
        unset($_SESSION['e_haslo']);
    }		
    ?>


                    Powtórz hasło:<br /><input type="password" name="haslo2" /><br /><br />

                    <br />
                    <p>
                        <label>
                            <input type="checkbox" name="regulamin" class="filled-in" />
                            <span>Akceptuję regulamin</span>
                        </label>
                    </p>




                    <?php
    //Sprawdzamy czy e_haslo został ustawiony
    
    if (isset($_SESSION['e_regulamin']))
    {
        echo'<div class="error">'.$_SESSION['e_regulamin'].'</div>';
        unset($_SESSION['e_regulamin']);
    }		
    ?>
                    <br />

                    <div class="g-recaptcha" data-sitekey="6Ld3QfUUAAAAAOiR2EHHq1J7-BJH9E2HTAbl50Vq"></div>
                    <?php
    //Sprawdzamy czy e_bot został ustawiony
    
    if (isset($_SESSION['e_bot']))
    {
        echo'<div class="error">'.$_SESSION['e_bot'].'</div>';
        unset($_SESSION['e_bot']);
    }		
    ?>

                    <br />

                    <input type="submit" value="Zarejestruj się" class="btn" />

                </form>
            </div>
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

    //Selector
    const os = document.querySelectorAll('select');
    M.FormSelect.init(os, {});
    </script>

</body>

</html>