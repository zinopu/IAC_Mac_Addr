<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
    <div align ="center">
        <br /><br /><br />
        Hotspot MAC-Adresse<br /><br />
        Bitte melden Sie sich an um Zugang zur Registrierung ihrer Geräte zu erhalten<br /><br />
    
        <form action = "anmeldung.php" method = "post">
            Y-ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name = "ein_y-id" type="text" maxlength="5"><br /><br />
            Passwort: &nbsp; <input name = "ein_passwort" type="password"><br /><br />
            <input type = "submit" value="Anmelden">
            <input type = "reset">   
        </form>     
    </div>  
        
        
        <?php
        // put your code here
        ?>
    </body>
</html>



<?php
//
//$ldaphost = "ldap.yourdomain.com";
//
///*for a SSL secured ldap_connect()
//
//$ldaphost = "ldap.yourdomain.com"; */
//
//$ldapport = 389;
//
//$ds = ldap_connect($ldaphost, $ldapport)
//or die("Could not connect to $ldaphost");
//
//if ($ds) {
//
//$username = "some_user";
//$upasswd = "secret";
//$binddn = "uid=$username,ou=people,dc=yourdomain,dc=com";
//
//$ldapbind = ldap_bind($ds, $binddn, $upasswd);
//                           
//if ($ldapbind) {
//
//print "Congratulations! $some_user is authenticated.";}
//
//else {
//
//print "Nice try, kid. Better luck next time!";}}
//
?>