<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="main.css"> 
</head>
<script type="text/javascript" src="java.js"></script>
<body class="body">
    <div>
        <header><h1>Main Page</h1></header>
    </div>
    <div class="leftmenu" style="float: left;">
    <form action="" method="post">
        <table>
            <tr><td><button onclick="addbtn()">Refresh</button></td></tr>
            <tr><td><input type="submit" value="&nbsp;view Employee" name="viwe" class="v" onclick="view()"></td></tr>
            <!-- <tr><td><button onclick="upd()">Update Employee</button></td></tr>
            <tr><td><button onclick="del()">Delete Record</button></td></tr> -->
    </table>
    </form>
    </div>
    <div class="mainbody1" id="m1">
    <form  method="post" class="sub">
        <table style="width:50%; font-size: 28px; float: right;">
      
            <tr><td>
        <label for="firstname">First Name</label><br>
        <input type="text" name="firstname" id="firstnmae">
    </td>
    <td>
        <label for="middlename">Middle Name</label><br>
        <input type="text" name="middlename" id="middlename">
    </td>
    <td>
        <label for="lastname">Last Name</label><br>
        <input type="text" name="lastname" id="lastname"> 
    </td>
    <tr>
        <td>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email">
        </td>
        <td>
            <label for="phone">Phone Number</label><br>
            <input type="text" name="phone" id="phone">
        </td>
        <td>
            <label for="address">Address</label><br>
            <input type="text" name="address" id="address">
        </td>
    </tr>
    <tr>
        <td>
        <label for="dob">DOB</label><br>
        <input type="date" name="dob" id="dob">
    </td>
    <td>
        <label for="gender">Gender</label><br>
       <input type="radio" name="gender" id="male" value="Male"><label for="">M</label>&nbsp;&nbsp;
       <input type="radio" name="gender" id="female" value="female"><label for="">F</label>
       
    </td>
    <td>
        <label for="role">Role</label>
        <select name="role" id="role">
        <option value="entry">Entry</option>
        <option value="Manager">Management</option>
        <option id="ad"  value="Admin">Administrator</option>
    </select>

    </td>
</tr>

    
    <tr>
        <td>
            <input type="submit" value="Add" name="Add" >
            
        </td>
    </tr> 
    </table>
    </form>

    <!-- document.getElementsByClassName('appBanner').style.visibility='hidden'; -->


    </div>
    <div class="search">
        <form  method="post">
        <label for="search">Search by ID</label><input type="search" name="search" id="search">
        <input type="submit" value="Search" name="searchid" id="searchid"><br>
        <input type="submit" value="delete" name="delete" id="delete">
        
        </form>
    </div>

    <div class="updateDiv">
    <form  method="post"> 
        <label for="idup"></label><input type="text" name="idup" id="idup">
        <select name="field" id="field">
            <option value="FirstName">firstname</option>
            <option value="MiddleName">middlename</option>
            <option value="LastName">lastname</option>
            <option value="Phone">phone</option>
            <option value="Email">email</option>
            <option value="address">Address</option>
            <option value="DOB">date of birth</option>
            <option value="Gender">Gender</option>
        </select>
        <input type="text" name="upvalue" id="upvalue">

        <input type="submit" value="update" name="update" >

</form>

    </div>

    <div class="footer">
       <a href="help.php"><img src="help.png" alt=""></a>
  </div>



    <?php
    $conn = mysqli_connect("localhost", "root", "", "employee database");

include_once "mainadd.php";
$cl=new main($conn);



// if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['Add'])){
    $fn=$_POST['firstname'];
    $mn=$_POST['lastname'];
    $ln=$_POST['middlename'];
    $ph=$_POST['phone'];
    $em=$_POST['email'];
    $R=$_POST['role'];
    $add=$_POST['address'];
    $Gen=$_POST['gender'];
    $dob=$_POST['dob'];

    $cl->fn=$fn;
    $cl->ln=$ln;
    $cl->mn=$mn;
    $cl->ph=$ph;
    $cl->em=$em;
    $cl->add=$add;
    $cl->R=$R;
    $cl->dob=$dob;
    $cl->Gen=$Gen;
   
    $cl->addEmp();

}

 if(array_key_exists('viwe', $_POST)) { 
    $cl->showEmp();
} 

if(isset($_POST['searchid'])){
$id=$_POST['search'];
$cl->Search($id);
}

if(isset($_POST['delete'])){
 $id=$_POST['search'];
 
 $cl->deleteEmp($id);
}

if(isset($_POST['update'])){
$idup=$_POST['idup'];
$value=$_POST['upvalue'];
$property=$_POST['field'];

$sql="UPDATE person SET  $property=' $value ' WHERE ID = $idup";
$result = mysqli_query( mysqli_connect("localhost", "root", "","employee database"), $sql); 

if ($result) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: ";
}


}
?>

</body>
</html>