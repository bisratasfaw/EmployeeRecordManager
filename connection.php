 <?php

 class connect{

private $DB_host="localhost";
private $DB_user="root";
private $DB_pass="";
private $DB ="employee database";
public $dbc=null;

function getConn(){

$this->dbc=new mysqli($this->DB_host,$this->DB_user,$this->DB_pass,$this->DB);

    if ($this->dbc->connect_error){
        ECHO "derswal";
        
        die('couldnt connect'. $dbc->connect_error);
        
    }

    ECHO "derswal2";
}


 }

?>