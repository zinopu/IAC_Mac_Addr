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
            
            
            public function mac_addr(){
                $this->cl_mac_ins = $this->cl_mac_1 . ':' . $this->cl_mac_2 . ':' . $this->cl_mac_3 . ":" . $this->cl_mac_4 . ":" . $this->cl_mac_5 . ":" . $this->cl_mac_6;
                return $this->cl_mac_ins;
            }
            
            public function Name(){
                $this->cl_Name = $this->cl_Vorname . ' ' .$this->cl_Nachname;     // Mit oder ohne Leerzeichen
                return $this->cl_Name;
            }
        }
             
        
        $newdata = new input_PC;    
         
        $newdata -> cl_Vorname = $_POST["ein_vorname"];
        $newdata -> cl_Nachname = $_POST["ein_nachname"];
        $newdata -> cl_mac_1 = $_POST["ein_mac_1"];
        $newdata -> cl_mac_2 = $_POST["ein_mac_2"];
        $newdata -> cl_mac_3 = $_POST["ein_mac_3"];
        $newdata -> cl_mac_4 = $_POST["ein_mac_4"];
        $newdata -> cl_mac_5 = $_POST["ein_mac_5"];
        $newdata -> cl_mac_6 = $_POST["ein_mac_6"];
         
        //echo 'VAR4' . $newdata->cl_mac_1 . 'VAR4' . "<br />";
        ////echo 'VAR3' . $newdata->cl_Nachname . 'VAR3' . "<br />";
        ////echo 'VAR2' . $newdata->cl_Vorname . 'VAR2' . "<br />";
        //test_output
     
        
        echo 'Output: ' . $newdata->Name(). ':' . $newdata->mac_addr() . ':0:1:0:0:0<br />';
        
     
        
        ?>
        
        
        
        

    </body>
</html>
