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
            <br><br><br><h1>Vielen Dank für ihre Registrierung</h1>
        
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
            private $cl_erg;
            private $cl_handle_w;
            private $cl_handle_o;
            private $cl_fehler;
            
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
                
                // ungültige Zeichen && Feld leer    '/^.[a-z]{0,20}$/i'  ohne Leerzeichen und ohne Bindestrich
                if (!preg_match('/.[a-z\s-]{2,30}/i', $this->cl_Vorname)) {
                    $fehler = 1;
                    $this->cl_fehler = 1;
                    echo 'Fehler: Eingabefeld Vorname, ungültige Eingabe.<br>';
                }
                
                // ungültige Zeichen && Feld leer
                if (!preg_match('/^.[a-z]{2,30}$/i', $this->cl_Nachname)) {
                    $fehler = 1;
                    $this->cl_fehler = 1;
                    echo 'Fehler: Eingabefeld Nachname, ungültige Eingabe.<br>';
                }
                
                // ungültige MAC-Adresse
                If (!preg_match('/^.[a-f0-9]+:+.[a-f0-9]+:+.[a-f0-9]+:+.[a-f0-9]+:+.[a-f0-9]+:+.[a-f0-9]{1}$/i', $this->mac_addr())) {
                    $fehler = 1;
                    $this->cl_fehler = 1;
                    echo 'Fehler: Eingabfeld MAC-Adresse, ungültige Eingabe.<br>';
                }
                                
                //Länge der MAC-Adresse
                $laenge = strlen($this->mac_addr());
                if($laenge != 17){
                    $fehler = 1;
                    $this->cl_fehler = 1;
                    echo 'Fehler: Eingabfeld MAC-Adresse, ungültige Eingabe(Laenge).<br>';
                            
                }
                                
                //ungültige Email-Adresse NICHT FERTIG
                //if(!preg_match("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[d-e]{2,4}$",  $this->cl_email)){
                //    $fehler = 1;
                //    $this->cl_fehler = 1;
                //    echo 'Fehler: Eingabfeld E-Mail, ungültige E-Mail Adresse.<br>';
                //}
                
                
                //MAXIMAL ANZAHL AN registrierten GERÄTEN abfragen
                     
            }
            private function func_add_mac_w_Email(){
                $this->cl_erg = $this->Name(). ';' . $this->mac_addr() . ';0;1;0;0;0;' . $this->cl_email . ';' . $this->cl_yid;
                $this->cl_handle_w = fopen ( "list_w_email.txt", "a" );
                fwrite ( $this->cl_handle_w, $this->cl_erg );
                fwrite ( $this->cl_handle_w, "\n");
                fclose ( $this->cl_handle_w);    
            }
            
            private function func_add_mac_addr(){
                $this->cl_erg = $this->Name(). ';' . $this->mac_addr() . ';0;1;0;0;0';
                $this->cl_handle_w = fopen ( "list.txt", "a" );
                fwrite ( $this->cl_handle_w, $this->cl_erg );
                fwrite ( $this->cl_handle_w, "\n");
                fclose ( $this->cl_handle_w);                       
            }
            
            
            // NICHT FERTIG
            public function func_check_mac_addr(){
                $this->check_Felder();
                if ($this->cl_fehler === 1)
                {
                    echo 'Bitte neue Eingaben tätigen';
                }
                else
                {
                
                    $this->cl_handle_o = fopen ("list.txt", "r");
                    $a = 0;
                    
                
                    while(!feof($this->cl_handle_o))
                    {
                        //echo fgets($this->cl_handle_o). "//////2///////";
                        //$comp = substr_count(fgets($this->cl_handle_o), $newdata->mac_addr());
                        $strspn = strspn($this->mac_addr() , fgets($this->cl_handle_o));
                        $ereg = ereg($this->mac_addr(), fgets($this->cl_handle_o));
                        //echo $strspn;
                        echo $ereg;
                    
                        if($strspn === $this->mac_addr())
                        {
                            echo 'korrekt' . "<br>";
                            $a = $a + 1;
                        }
                        else ///// DEBUG_INFO
                        {
                            echo 'falsch' . "<br>";
                            //break;
                        }                   
                    }
                
                    fclose($this->cl_handle_o);
                
                    if($a === 0){
                        $this->func_add_mac_addr();
                        $this->func_add_mac_w_Email();
                    
                    }
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
        //$newdata -> func_add_mac_addr();
        
        //test_output
        echo 'VAR4' . $newdata->cl_email . 'VAR4' . "<br>";
        echo 'VAR3' . $newdata->cl_yid . 'VAR3' . "<br>";
        echo 'VAR5 - ' . $newdata->cl_Vorname . ' - VAR5' . "<br>";
       
            
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
