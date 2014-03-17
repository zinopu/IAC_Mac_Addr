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
            <br /><br /><br /><h1>Vielen Dank für ihre Registrierung</h1>
        
            </div>   
        
        <?php       
          
        class input_PC{
            public $cl_Vorname;
            public $cl_Nachname;
            private $cl_Name;
            public $cl_mac_1;
            public $cl_mac_2;
            public $cl_mac_3;
            public $cl_mac_4;
            public $cl_mac_5;
            public $cl_mac_6;
            private $cl_mac_ins = 1;
            private $cl_erg;
            private $cl_handle_w;
            private $cl_handle_o;
            
            private function mac_addr(){
                $this->cl_mac_ins = strtolower($this->cl_mac_1 . ':' . $this->cl_mac_2 . ':' . $this->cl_mac_3 . ":" . $this->cl_mac_4 . ":" . $this->cl_mac_5 . ":" . $this->cl_mac_6);
                return $this->cl_mac_ins;
            }
            
            private function Name(){
                $this->cl_Name = $this->cl_Vorname . ' ' .$this->cl_Nachname;     // Mit oder ohne Leerzeichen
                return $this->cl_Name;
            }
            
            public function func_check_mac_addr(){
                $this->cl_handle_o = fopen ("list.txt", "r");
                $a = 0;
                //$b = 1;
                $laenge = strlen($this->mac_addr());
                
                while(!feof($this->cl_handle_o))
                {
                    //echo fgets($this->cl_handle_o). "//////2///////";
                    //$comp = substr_count(fgets($this->cl_handle_o), $newdata->mac_addr());
                    $strspn = strspn($this->mac_addr() , fgets($this->cl_handle_o));
                    echo $strspn;
                    
                    if($strspn === $this->mac_addr())
                    {
                        echo 'korrekt' . "<br />";
                        $a = $a + 1;
                    }
                    else ///// DEBUG_INFO
                    {
                        echo 'falsch' . "<br />";
                        //break;
                    }
                    
                }
                fclose($this->cl_handle_o);
                
                //if($laenge != 17){
                //    $b = 0;
                //    echo 'ungültige MAC-Adresse';
                //}    
                
                if($a === 0){
                    if($laenge === 17){
                        $this->func_add_mac_addr();
                    }
                    
                }
                
            }
            
            public function func_add_mac_addr(){
                $this->cl_erg = $this->Name(). ';' . $this->mac_addr() . ';0;1;0;0;0';
                $this->cl_handle_w = fopen ( "list.txt", "a" );
                fwrite ( $this->cl_handle_w, $this->cl_erg );
                fwrite ( $this->cl_handle_w, "\n");
                fclose ( $this->cl_handle_w);                       
            }
                                               
        }
        ////////// START PROG ////////////
        $newdata = new input_PC;    
         
        $newdata -> cl_Vorname = $_POST["ein_vorname"];
        $newdata -> cl_Nachname = $_POST["ein_nachname"];
        $newdata -> cl_mac_1 = $_POST["ein_mac_1"];
        $newdata -> cl_mac_2 = $_POST["ein_mac_2"];
        $newdata -> cl_mac_3 = $_POST["ein_mac_3"];
        $newdata -> cl_mac_4 = $_POST["ein_mac_4"];
        $newdata -> cl_mac_5 = $_POST["ein_mac_5"];
        $newdata -> cl_mac_6 = $_POST["ein_mac_6"];
        $newdata -> func_check_mac_addr();
        //$newdata -> func_add_mac_addr();
        
        //test_output
        //echo 'VAR4' . $newdata->cl_mac_1 . 'VAR4' . "<br />";
        //echo 'VAR3' . $newdata->cl_Nachname . 'VAR3' . "<br />";
        //echo 'VAR2' . $newdata->cl_Vorname . 'VAR2' . "<br />";
        //test_output//echo 'VAR4' . $newdata->cl_mac_1 . 'VAR4' . "<br />";
        //echo 'VAR3' . $newdata->cl_Nachname . 'VAR3' . "<br />";
        //echo 'VAR2' . $newdata->cl_Vsssorname . 'VAR2' . "<br />";
        
        //$handle_o = fopen("list.txt", "r");
        //echo $handle_o;
        //
        //$theData = fread($handle_o, filesize("list.txt"));
        //$theData = fgets($handle_o, filesize("list.txt"));
        //$a = fgets($handle_o);
        //echo $newdata->mac_addr() . '    $newdata<br />';
        //echo $a .         '$a<br />';
        
        //echo substr_count($a, $newdata->mac_addr());
                
        
        //echo $theData;
        ?>
        
        
        
        

    </body>
</html>
