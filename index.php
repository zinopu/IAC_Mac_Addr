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
        <style type="text/css">     
            body { background-color:#F2F2F2;}
            .dunkel {background-color:#DFDFE0; text-align:center; position:absolute; top:75px; left:32%; right:32%; height:300px; border-width:1px; border-style:solid; border-color:#8B8B8C;
                     border-radius: 6px;border-top-left-radius: 6px;border-top-right-radius: 6px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;
                    }

        </style>
    </head>
    <body>
        
    <div class="dunkel">
        <br><br><br>
        Hotspot MAC-Adresse<br><br>
        Bitte melden Sie sich an um Zugang zur Registrierung ihrer Geräte zu erhalten<br><br>
    
        <form action = "anmeldung.php" method = "post">
            Y-ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name = "ein_y-id" type="text" maxlength="5"><br><br>
            Passwort: &nbsp; <input name = "ein_passwort" type="password"><br><br>
            <input type = "submit" value="Anmelden">
            <input type = "reset">   
        </form>     
    </div>  
        
        
        <?php
        // put your code here
        ?>
    </body>
</html>