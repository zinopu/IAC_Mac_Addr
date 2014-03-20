<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hotspot MAC-Adresse</title>
        <link rel="stylesheet" media="screen" href="iac.css"> 
    </head>
    <body>

    <div class="logo"><img src="logo.jpg" width="133px" height="37px" alt="logo"></div>

    <div class="dunkel">
        <h1>Hotspot MAC-Adresse</h1>

        <form action = "anmeldung.php" method = "post">

            <p>Bitte melden Sie sich an um Zugang zur Registrierung ihrer GerÃ¤te zu erhalten<br>
            <br>

            <div class="boxcenter">

                <div class="links">Y-ID:</div>
                <div class="rechts"><input name="ein_y-id" type="text" maxlength="5" class="eingaben"></div>
                <div class="clear"></div>

                <div class="links">Passwort:</div>
                <div class="rechts"><input name="ein_passwort" type="password" class="eingaben"></div>
                <div class="clear"></div>

                <div class="links"></div>
                <div class="rechts"><input type="submit" value="Anmelden" style="width:196px"></div>
                <div class="clear"></div>

             </div> <!-- /boxcenter -->
           </p>
       </form>
    </div>  <!-- /dunkel -->
    </body>
</html>     