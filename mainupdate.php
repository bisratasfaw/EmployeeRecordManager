<?php

include_once "main.php";
include_once "connection.php";
$cl=new main($db->getConn());
$db=new connection;
echo "in add page"


if ($_SERVER["REQUEST_METHOD"] == "POST"){
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

?>