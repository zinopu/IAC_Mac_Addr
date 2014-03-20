<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
session_start();
//PFAD EDITIEREN
require_once '/var/www/iac_mac/IAC_Mac_Addr-master/libraries/adLDAP.php';

$adLDAP = new LDAP\adLDAP\adLDAP;
$_SESSION["y_id"] = $_POST["ein_y-id"];

//DEBUG
//echo 'YID: ' . $_SESSION["y_id"] . '<br>';
//echo 'PW: ' . $_POST["ein_passwort"] . '<br>';

//LDAP LIBRARIE TRY SERVER NOCH ANGEBEN 
// a2enmod ldap NICHT VERGESSEN

//$ldap_output = $adLDAP ->authenticate($_SESSION["y_id"], $_POST["ein_passwort"]);
//echo 'VAR2: ' . $ldap_output . '<br>';

if ($adLDAP ->authenticate($_SESSION["y_id"], $_POST["ein_passwort"]) === TRUE)
{
    echo '<html>
        <head>
        <meta charset="UTF-8">
        <title>Hotspot MAC-Adresse</title>
        <link rel="stylesheet" media="screen" href="iac.css"> 
    </head>
    <body>

    <div class="logo"><img src="logo.jpg" width="133px" height="37px" alt="logo"></div>

    <div class="dunkel">
        <h1>Registrierung: MAC-Adresse</h1>

        <form action="save.php" method="post">
 
            <div class="boxcenter">
    
                <div class="links">Vorname:</div>
                <div class="rechts"><input name="ein_vorname" type="text" class="eingaben"></div>
                <div class="clear"></div>

                <div class="links">Name:</div>
                <div class="rechts"><input name="ein_nachname" type="text" class="eingaben"></div>
                <div class="clear"></div>

                <div class="links">E-Mail:</div>
                <div class="rechts"><input name="ein_email" type="text" class="eingaben"></div>
                <div class="clear"></div>

                <div class="links">MAC-Adresse:</div>
                <div class="rechts">
                    <input name="ein_mac_1" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">:
                    <input name="ein_mac_2" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">:
                    <input name="ein_mac_3" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">:
                    <input name="ein_mac_4" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">:
                    <input name="ein_mac_5" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">:
                    <input name="ein_mac_6" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">
                </div>
                <div class="clear"></div>

                <div class="links"></div>
                <div class="rechts"><input type="submit" style="width:196px"></div>
                <div class="clear"></div>

             </div> <!-- /boxcenter -->
           </p>
       </form>
    </div>  <!-- /dunkel -->
</form>     
</body>
</html>';

}
else
{
    echo '
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Hotspot MAC-Adresse</title>
            <link rel="stylesheet" media="screen" href="iac.css"> 
        </head>
        <body>

        <div class="logo"><img src="logo.jpg" width="133px" height="37px" alt="logo"></div>

        <div class="dunkel">
            <br>
            Bad Login: Username oder Passwort falsch
        </div>
        </body>
    </html>';
}
        


?>
