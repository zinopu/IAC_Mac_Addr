<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
session_start();
require_once '/var/www/ftp/IACBox_MAC_Addr/libraries/adLDAP.php';

class ldap_login{
    public $cl_Zugang = 0;
    private $cl_ldaphost = "localhost";
    private $cl_ldapport = 389;
    public $cl_id;
    public $cl_password;
    private $cl_ds;
    
    public function ldap_connect_bind()
    {
        $this->cl_ds = ldap_connect($this->cl_ldaphost, $this->cl_ldapport)
                or die("Could not connect to $this->cl_ldaphost");
        
        if ($this->cl_ds) 
        {
            $ldapbind = ldap_bind($this->cl_ds, "uid =$this->cl_id,ou=people,dc=yourdomain,d=com", $this->cl_password);
            
            if($ldapbind)
                {
                    echo 'Congratulations! $some_user is authenticated.';
                    $this->cl_Zugang = 1;
                    return $this->cl_Zugang;
                }
                else
                {
                    echo '<h3>Wrong password. Please try again</h3>';
                    $this->cl_Zugang = 0;
                    return $this->cl_Zugang;
                }
            ldap_close($this->cl_ds);
        }
        
    }
    
    public function ldap_connection_bind_2()
    {
        $ldap = ldap_connect($this->cl_ldaphost);
        if ($bind = ldap_bind($ldap, $this->cl_id, $this->cl_password)) {
        echo 'hi';
        } else {
        echo 'error message';
        }
        ldap_close($ldap);
    }         
}

//if ($ds) {
//
//$username = "some_user";
//$upasswd = "secret";
//$binddn = "uid=$username,ou=people,dc=yourdomain,dc=com";
//
//$ldapbind = ldap_bind($ds, $binddn, $upasswd);
//                           
//    if ($ldapbind) 
//    {
//        echo 'Congratulations! $some_user is authenticated.';
//        $Zugang = 1;
//    }
//    else
//    {
//        echo 'Nice try, kid. Better luck next time!';    
//    }
//    
//}
//

$_SESSION["y_id"] = $_POST["ein_y-id"];

//LDAP LIBRARIE TRY SERVER NOCH ANGEBEN 
// a2enmod ldap NICHT VERGESSEN
//$adLDAP = new LDAP\adLDAP\adLDAP;
//$adLDAP ->set_ad_username($_POST["ein_y-id"]);
//$adLDAP ->set_ad_password($_POST["ein_passwort"]);
//$adLDAP ->authenticate($_POST["ein_y-id"], $_POST["ein_passwort"])
//echo 'VAR6' . $adLDAP->set_ad_username($_POST["ein_y-id"]) . 'VAR6' . "<br>";
//echo 'VAR7' . $adLDAP->set_ad_password($_POST["ein_passwort"]) . 'VAR7' . "<br>";


$anmeldung = new ldap_login;
$anmeldung -> cl_Zugang = 0 ;
$anmeldung -> cl_id = $_SESSION["y_id"];
$anmeldung -> cl_password = $_POST["ein_passwort"];

echo 'VAR4' . $anmeldung->cl_id . 'VAR4' . "<br>";
echo 'VAR5' . $anmeldung->cl_password . 'VAR5' . "<br>";



//if ($anmeldung -> ldap_connect_bind() === TRUE)
if (1 == 1)
{
    echo '<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">     
            body { background-color:#F2F2F2;}
            .dunkel {background-color:#DFDFE0; text-align:center; position:absolute; top:75px; left:32%; right:32%; height:350px; border-width:1px; border-style:solid; border-color:#8B8B8C;
                     border-radius: 6px;border-top-left-radius: 6px;border-top-right-radius: 6px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;
                    }
        </style>
    </head>
    <body>
        <div class ="dunkel">
        <br><br><br>
        Registrierung: MAC-Adresse<br><br>
        <form action = "save.php" method = "post">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspVorname:  <input name = "ein_vorname" type="text"><br><br>
            &nbsp&nbsp&nbsp&nbspNachname: <input name = "ein_nachname" type="text"><br><br>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspE-Mail:   <input name = "ein_email" type="text"><br><br>
            MAC-Adresse:<input name = "ein_mac_1" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">:
                        <input name = "ein_mac_2" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">:
                        <input name = "ein_mac_3" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">:
                        <input name = "ein_mac_4" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">:
                        <input name = "ein_mac_5" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">:
                        <input name = "ein_mac_6" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">
                        <br><br>
        <input type = "submit">
        <input type = "reset">
        </form>     
        </div>
        </body>
        </html>';
}
else
{
        echo 'Bad Login';
}
        


?>


<!--<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         //START HTML 
        
<div align ="center">
    <br><br><br>Registrierung: MAC-Adresse<br><br>
    <form action = "save.php" method = "post">
        Vorname:  <input name = "ein_vorname" type="text"><br><br>
        Nachname: <input name = "ein_nachname" type="text"><br><br>
        E-Mail:   <input name = "ein_email" type="text"><br><br>
        MAC-Adresse: <input name = "ein_mac_1" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">:
                     <input name = "ein_mac_2" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">:
                     <input name = "ein_mac_3" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">:
                     <input name = "ein_mac_4" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">:
                     <input name = "ein_mac_5" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">:
                     <input name = "ein_mac_6" type="text" size="2" maxlength="2" style="height: 15px; width: 20px;">
                     <br><br>
    <input type = "submit">
    <input type = "reset">   
    </form>     
</div>        
        
    </body>
</html>  
-->



