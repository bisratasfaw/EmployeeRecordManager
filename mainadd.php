<?php

class main{
    public $fn=null;
    public $mn=null;
    public $ln=null;
    public $em=null;
    public $ph=null;
    public $R=null;
    public $s=null;
    public $add=null;
    public $dob=null;
    public $Gen=null;
    public $emid=null;
    public $property=null;
    public $value= null;
    

private $conn;

public function __construct($db){
    $this->conn=$db;
}


function Login(){
  if(isset($_POST['login'])){
   $sql="SELECT * from login where UserName = $this->user and Password=$this->pass ";
   $result = mysqli_query($this->conn, $sql);
   if ($result){
     echo "logged in";
     header("Location:main.php");

   }
   else
   {
    echo "<script type='text/javascript'>alert('INCORRECT LOGIN');</script>";
   }
  }
}

function addEmp(){
   

    $cmd="INSERT into person(FirstName,MiddleName,LastName,Email,Phone,DOB,Role,address,Gender)
    values('{$this->fn}','{$this->mn}','{$this->ln}','{$this->em}','{$this->ph}','{$this->dob}','{$this->R}','{$this->add}','{$this->Gen}')";
    // $result=$this->conn->query($cmd);
    $result = mysqli_query($this->conn, $cmd);
    if($this->R =="Admin" ||$this->R == "Manager" ){
        $val=$this->fn.$this->ln;
        $comand="INSERT into login(UserName,Password,Role) values('{$val}','{$val}','{$this->R}')";
        $result = mysqli_query($this->conn, $comand);
    }
    if($result){
        echo "sucsessfully inserted";
    }
}

function showEmp(){

    $sql = "SELECT * FROM person";
    $result = mysqli_query($this->conn, $sql);
    

if ($result->num_rows > 0) {
  // output data of each row
  echo"<table style='border:2px;'><tr><td>ID</td><td>firstname</td><td>middlename</td><td>lastname</td><td>email</td>
  <td>phone</td><td>date of birth</td><td>role</td><td>address</td><td>gender</td> </tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["ID"]. "</td><td> " . $row["FirstName"]. "</td><td> " . $row["MiddleName"]. "</td><td>". $row["LastName"]."</td><td> ". $row["Email"]."</td><td> "
    . $row["Phone"]."</td><td> ". $row["DOB"]."</td><td> ". $row["Role"]."</td><td> ". $row["address"]."</td><td> ". $row["Gender"]."</td></tr> ";
  }
  echo "</table>";
} else {
  echo "0 results";
}

}
function Search($id){
    $this->emid=$id;
    $sql = "SELECT * FROM person where ID = $id ";
    $result = mysqli_query($this->conn, $sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo"<table style='border:2px;'><tr><td>ID</td><td>firstname</td><td>middlename</td><td>lastname</td><td>email</td>
        <td>phone</td><td>date of birth</td><td>role</td><td>address</td><td>gender</td> </tr>";
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["ID"]. "</td><td> " . $row["FirstName"]. "</td><td> " . $row["MiddleName"]. "</td><td>". $row["LastName"]."</td><td> ". $row["Email"]."</td><td> "
          . $row["Phone"]."</td><td> ". $row["DOB"]."</td><td> ". $row["Role"]."</td><td> ". $row["address"]."</td><td> ". $row["Gender"]."</td></tr> ";
        }
        echo "</table>";
      } else {
        echo "0 results";
      }



}
function deleteEmp($id){
   

    $sql = "Delete  FROM person where ID = $id ";
    $result = mysqli_query($this->conn, $sql); 

    if ($result) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: ";
      }

}

function update(){



}

}

?>