<!DOCTYPE html>
<html id="kontakt" class="zapytanie-o-produkt">
   <head>
      <meta charset="utf-8">
      <title>D.A. Film - Arkusze i płachty PE </title>
      <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Quattrocento+Sans&amp;subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="styles/normalize.css">
      <link rel="stylesheet" href="styles/skeleton.css">
      <link rel="stylesheet" href="styles/main.css">
      <link rel="stylesheet" href="/styles/new.css">
   </head>
   <body>
      <nav class="group main-nav">
         <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="oferta.html">Oferta</a></li>
            <li><a href="kalkfolii.html">Kalkulator folii</a></li>
            <li><a href="onas.html">O Nas</a></li>
            <li><a href="#">Kontakt</a></li>
            <li><a href="warsprzed.html">Warunki sprzedaży</a></li>
         </ul>
      </nav>
      <header>
         <div class="header-box">
            <h1>Formularz zapytania o produkt</h1>
            <div class="text-box">
               <p>
                  Zawsze jesteśmy do dyspozycji naszych klientów i
                  pomagamy przy doborze odpowiednich produktów. Zapraszamy do kontaktu.
               </p>
            </div>
         </div>
      </header>
      <main class="container">
         <section id="contact-form">

            <?php
               $action=$_REQUEST['action'];
               if ($action=="")    /* display the contact form */
                   {
                   ?>
                   <form id="zapytanie-form" class="" action="" method="POST" enctype="multipart/form-data">
                   <input type="hidden" name="action" value="submit">
                   Imię i Nazwisko / Firma:<br>
                   <input name="name" type="text" value="" size="50"/><br>
                   Twój email:<br>
                   <input name="email" type="text" value="" size="50"/><br>

                   <h3>Wybierz produkt którym jesteś zainteresowany</h3>
                   <select class="product-select" name="nazwa-produktu">
                      <option value="worki śmieciowe">Worki śmieciowe</option>
                      <option value="worki azbest UE niebieskie">Worki na azbest - Standard UE, niebieskie, drukowane</option>
                      <option value="worki azbest UE bezbarwne druk">Worki na azbest - Standard UE, bezbarwne, drukowane</option>
                      <option value="worki azbest UE bezbarwne">Worki na azbest - Standard UE, bezbarwne</option>
                      <option value="worki azbest UK">Worki na azbest - Standard UK</option>
                   </select>

                   <h3>Wymiary:</h3>
                     <label for="szerokosc">szerokość</label>
                     <input type="text" name="szerokosc" value="">

                     <label for="zakladka">zakładka</label>
                     <input type="text" name="zakladka" value="">

                     <label for="dlugosc">długość</label>
                     <input type="text" name="dlugosc" value="">

                     <label for="grubosc">grubość</label>
                     <input type="text" name="grubosc" value="">

                     <label for="kolor">kolor</label>
                     <input type="text" name="kolor" value="">

                     <label for="ilosc">ilość</label>
                     <input type="text" name="ilosc" value="">

                     <h3>Sposób pakowania</h3>
                     <select class="product-select" name="sposob-pakowania">
                        <option value="kartony">kartony</option>
                        <option value="euro-box">euro-box</option>
                        <option value="zrolowane">zrolowane</option>
                        <option value="perforowane na rolce">perforowane na rolce</option>
                        <option value="worki zbiorcze">worki zbiorcze</option>
                     </select>

                     <h3>Dodatki</h3>
                     <input type="checkbox" name="dodatki" value="uv"> UV <br>
                     <input type="checkbox" name="dodatki" value="antislip"> Anti Slip <br>
                     <input type="checkbox" name="dodatki" value="antiblock"> Anti block <br>
                     <input type="checkbox" name="dodatki" value="roughsurface"> Rough surface <br>
                     <input type="checkbox" name="dodatki" value="antirust"> Anti rust <br>



                     </select>




                   <br>Dodatkowe uwagi:<br>
                   <textarea name="message" cols="50" rows="100"></textarea><br>
                   <input type="submit" value="Wyślij"/>
                   </form>
                   <?php
                   }
               else                /* send the submitted data */
                   {
                   /* dane nadawcy */
                   $name=$_REQUEST['name'];
                   $email=$_REQUEST['email'];

                   /* Dane produktu */
                   $nazwaProduktu=$_REQUEST['nazwa-produktu'];
                   $szerokosc=$_REQUEST['szerokosc'];
                   $zakladka=$_REQUEST['zakldaka'];
                   $dlugosc=$_REQUEST['dlugosc'];
                   $grubosc=$_REQUEST['grubosc'];
                   $kolor=$_REQUEST['kolor'];
                   $ilosc=$_REQUEST['ilosc'];
                   $pakowanie=$_REQUEST['sposob-pakowania'];


                   $message='<strong>'.$nazwaProduktu.'</strong><br>'.
                            'Szerokość: '.$szerokosc.'metry<br>'.
                            'Zakładka: '.$zakladka.'metry<br>'.
                            'Długość: '.$dlugosc.'metry<br>'.
                            'Grubość: '.$grubosc.'mikrony<br>'.
                            'Kolor: '.$kolor.'<br>'.
                            'Ilość: '.$ilosc.' sztuk<br><br>'.
                            'Sposób pakowanie: '.$pakowanie.'<br>'.
                            'Dodatki: '.$dodatki.'<br>'.
                            '<strong>Uwagi:</strong><br>'.$_REQUEST['message'];



                   if (($name=="")||($email=="")||($message==""))
                       {
               		echo "Wszystkie pola są wymagane, prosimy wypełnić <a href=\"\">formularz</a> ponownie.";
               	    }
                   else{
               	    $from="Od: $name<$email>\r\nReturn-path: $email";
                       $subject="Wiadomość wysłana za pomocą formularza kontaktowego";
               		   mail("philliplawniczak@gmail.com", $subject, $message, $from);
               		echo $message;
               	    }
                   }
               ?>
         </section>
      </main>
      <footer class="group">
         <span class="copy">Phillip Ławniczak &copy; 2017</span>
         <nav class="footer-nav">
            <a href="#">Polityka prywatności</a>
            <a href="#">Kontakt</a>
         </nav>
      </footer>

   <script src="" type="text/javascript"></script>
   </body>
</html>
