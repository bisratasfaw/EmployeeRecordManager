<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css"> 
</head>
<body class="body">
    <h1>WELCOME TO EMPLOYEE MANAGER</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                 &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; 
                    <img src="logo2.png" alt="" style="size:10px; align-content: center;">
                </td>
            </tr>
            <tr>
            <td>
        <label for="username"><B>Username</B></label>
            </td>
             <td>
                &nbsp; &nbsp;
        <input type="text" class="username" name="username" id="username">
            </td>
    </tr>
    <tr>   
        <td>
        <label for="password"><B>Password</B></label>
        </td>
    <td>
        &nbsp; &nbsp;
       <input type="password" name="password" id="password">
    </td>
    </tr>
    <tr>
        <td>
            &nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="LogIn" name="login">
    </td>
    </tr>
    <tr>
        <td>
            &nbsp; &nbsp; &nbsp; &nbsp;
            <input type="reset" value="Reset" name="reset">
       
    </td>
    </tr>
    </table>
    </form>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "employee database");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        
        $myusername = mysqli_real_escape_string($conn,$_POST['username']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
        
        $sql = "SELECT id FROM login WHERE UserName = '$myusername' and Password = '$mypassword'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        $count = mysqli_num_rows($result);
        
          
        if($count == 1) {
           
           header("location: main.php");
        }else {
            echo "<script type='text/javascript'>alert('INCORRECT LOGIN');</script>";
        }
     }

?>
    
</body>
</html>