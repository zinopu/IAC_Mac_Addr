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
            <br><br><br><h1>Vielen Dank fuer ihre Registrierung</h1>
        
            </div>   
        
        <?php       
        session_start();
        class input_PC{
            public $cl_Vorname;
            public $cl_Nachname;
            public $cl_email;
            public $cl_yid;
            public $cl_mac_1;
            public $cl_mac_2;
            public $cl_mac_3;
            public $cl_mac_4;
            public $cl_mac_5;
            public $cl_mac_6;
            private $cl_fehler;
            private $cl_anzahl_yid;
            
            private function mac_addr(){
                $mac_addr = strtolower($this->cl_mac_1 . ':' . $this->cl_mac_2 . ':' . $this->cl_mac_3 . ":" . $this->cl_mac_4 . ":" . $this->cl_mac_5 . ":" . $this->cl_mac_6);
                return $mac_addr;
            }
            
            private function Name(){
                $name = $this->cl_Vorname . ' ' .$this->cl_Nachname;     // Mit oder ohne Leerzeichen
                return $name;
            }
            
            private function check_Felder(){
                $fehler = 0;
                $this->cl_fehler = 0;
                
                // ungÃ¼ltige Zeichen && Feld leer    '/^.[a-z]{0,20}$/i'  ohne Leerzeichen und ohne Bindestrich
                if (!preg_match('/.[a-z\s-]{2,30}/i', $this->cl_Vorname)) {
                    $fehler = 1;
                    $this->cl_fehler = 1;
                    echo 'Fehler: Eingabefeld Vorname, ungueltige Eingabe.<br>';
                }
                
                // ungÃ¼ltige Zeichen && Feld leer
                if (!preg_match('/^.[a-z]{2,30}$/i', $this->cl_Nachname)) {
                    $fehler = 1;
                    $this->cl_fehler = 1;
                    echo 'Fehler: Eingabefeld Nachname, ungueltige Eingabe.<br>';
                }
                
                // ungÃ¼ltige MAC-Adresse
                If (!preg_match('/^.[a-f0-9]+:+.[a-f0-9]+:+.[a-f0-9]+:+.[a-f0-9]+:+.[a-f0-9]+:+.[a-f0-9]{1}$/i', $this->mac_addr())) {
                    $fehler = 1;
                    $this->cl_fehler = 1;
                    echo 'Fehler: Eingabfeld MAC-Adresse, ungueltige Eingabe.<br>';
                }
                                
                //LÃ¤nge der MAC-Adresse
                $laenge = strlen($this->mac_addr());
                if($laenge != 17){
                    $fehler = 1;
                    $this->cl_fehler = 1;
                    echo 'Fehler: Eingabfeld MAC-Adresse, ungueltige Eingabe(Laenge).<br>';
                            
                }
                                
                //ungÃ¼ltige Email-Adresse NICHT FERTIG
                //if(!preg_match("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[d-e]{2,4}$",  $this->cl_email)){
                //    $fehler = 1;
                //    $this->cl_fehler = 1;
                //    echo 'Fehler: Eingabfeld E-Mail, ungueltige E-Mail Adresse.<br>';
                //}
                ///////////////////////////////////////////////
                
                //MAXIMAL ANZAHL AN registrierten GERÃ„TEN abfragen
//                $cl_handle_o_1 = fopen ("list_w_email.txt", "r");
//                while(!feof($cl_handle_o_1))
//                {
//                  echo fgets($cl_handle_o_1) . '<br>';
//                    if(preg_match($this->mac_addr(), fgets($cl_handle_o_1)))
//                    {
//                        $fehler = 1;
//                        $this->cl_fehler = 1;
//                        echo 'Mac-Adresse bereits registriert.<br>';
//                    }
//                }
//                fclose($cl_handle_o_1);
                
                ///////////////////////////////////////////////Neuer Ansatz
                //////////////////PFAD EDIT////////////////////////////////////
                $list_txt_w_email = file("/var/www/iac_mac/IAC_Mac_Addr-master/list_w_email.txt");
                ////////////////////////////////////////////////////////////////////////
                $pattern1 = "'^(" . $this->mac_addr() . ")$'";
                echo $pattern1 . '<br><br><br>';
                foreach ($list_txt_w_email as $zeile)
                    {
                        echo $zeile.'<br>';
                        if(preg_match($pattern1, $zeile))
                        {
                            $fehler = 1;
                            $this->cl_fehler = 1;
                            echo 'Mac-Adresse bereits registriert.<br>';                                    
                        }
                    }  
                
                ///////////////   ANZAHL DER Y-ID's ///////////////   
                $this->cl_anzahl_yid = 0;
                $pattern_yid = "'/\b" . $this->cl_yid . "\b/i'";
                echo '<br><br><br>' . $pattern_yid;
                foreach ($list_txt_w_email as $zeile)
                    {
                        if(preg_match($pattern_yid, $zeile))
                        {
                            $this->cl_anzahl_yid = $this->cl_anzahl_yid + 1;
                                                                                            
                        }
                    }   
                ////// ZU VIELE REG_GERAETE = FEHLER /////
                if($this->cl_anzahl_yid >= 3)
                    {
                        $this->cl_fehler = 1;
                        $fehler = 1;
                        echo 'Sie haben bereits 3 MAC-Adressen registriert.<br>';
                    }
                    
                    
                    
                     
            }
            private function func_add_mac_w_Email(){
                $erg = $this->Name(). ';' . $this->mac_addr() . ';0;1;0;0;0;' . $this->cl_email . ';' . $this->cl_yid;
                $text_w_email = fopen ( "list_w_email.txt", "a" );
                fwrite ( $text_w_email, $erg);
                fwrite ( $text_w_email, "\n");
                fclose ( $text_w_email);    
            }
            
            private function func_add_mac_addr(){
                $erg1 = $this->Name(). ';' . $this->mac_addr() . ';0;1;0;0;0';
                $text1 = fopen ( "list.txt", "a" );
                fwrite ( $text1, $erg1 );
                fwrite ( $text1, "\n");
                fclose ( $text1);                       
            }
            
            
            // NICHT FERTIG HAUPTAUFRUF ///
            public function func_check_mac_addr(){
                $this->check_Felder();
                if ($this->cl_fehler === 1)
                {
                    echo '<br>Sie haben falsche Eingaben getÃ¤tigt.<br>';
                }
                else
                {
                    $this->func_add_mac_addr();
                    $this->func_add_mac_w_Email();
                }
                
            }
            
        }
        
        
        ////////// START PROG ////////////
             
        $newdata = new input_PC;    
         
        $newdata -> cl_Vorname = $_POST["ein_vorname"];
        $newdata -> cl_Nachname = $_POST["ein_nachname"];
        $newdata -> cl_email = $_POST["ein_email"];
        $newdata -> cl_yid = $_SESSION["y_id"];
        $newdata -> cl_mac_1 = $_POST["ein_mac_1"];
        $newdata -> cl_mac_2 = $_POST["ein_mac_2"];
        $newdata -> cl_mac_3 = $_POST["ein_mac_3"];
        $newdata -> cl_mac_4 = $_POST["ein_mac_4"];
        $newdata -> cl_mac_5 = $_POST["ein_mac_5"];
        $newdata -> cl_mac_6 = $_POST["ein_mac_6"];
        $newdata -> func_check_mac_addr();
        
        //////////////// test_output /////////////////////////
        echo '<br><br>E-Mail: ' . $newdata->cl_email . "<br>";
        echo 'Y-ID: ' . $newdata->cl_yid . "<br>";
        echo 'Vorname: ' . $newdata->cl_Vorname . "<br>";
       
            
        //echo 'VAR2' . $newdata->cl_Vorname . 'VAR2' . "<br>";
        //test_output//echo 'VAR4' . $newdata->cl_mac_1 . 'VAR4' . "<br>";
        //echo 'VAR3' . $newdata->cl_Nachname . 'VAR3' . "<br>";
        //echo 'VAR2' . $newdata->cl_Vsssorname . 'VAR2' . "<br>";
        
        //$handle_o = fopen("list.txt", "r");
        //echo $handle_o;
        //
        //$theData = fread($handle_o, filesize("list.txt"));
        //$theData = fgets($handle_o, filesize("list.txt"));
        //$a = fgets($handle_o);
        //echo $newdata->mac_addr() . '    $newdata<br>';
        //echo $a .         '$a<br>';
        
        //echo substr_count($a, $newdata->mac_addr());
                
        
        //echo $theData;
        ?>
            

    </body>
</html>
