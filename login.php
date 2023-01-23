<?php
            include("config.php");
            session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link  href="reg.php">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
</head>

<body>
    <div class="center">
        <h1>تسجيل الدخول</h1>
        <form method="POST">
            <div class="txt_field">
                <label for="id">الرقم الاكاديمي</label>
                <span><input type="text"  id="id" name="id"></span>
            </div>
            <div class="txt_field">
                <label for="pass">كلمة المرور</label>
                <span><input type="pass"  id="pass" name="pass"></span>
            </div>
            <input type="submit" value="تسجيل الدخول" name="submit">
            <div class="padding"></div>
            <input type="submit" value="تسجيل الدخول موظفين" style="background-color: red;" name='emp'>
            <a href="reg.php" style="float:left;margin-left:45%;margin-top:10px;text-decoration:none;color:black;font-size:20px;">للتسجيل</a>
        </form><?php
                    if(isset($_POST['submit']))
                    {
                        $id = $_POST['id'];
                        $mypassword =$_POST['pass']; 
                            if (!empty($id) && !empty($mypassword)){

                        $sql = "SELECT id,password FROM user WHERE 
                        id = '$id' and password = '$mypassword'";
                        $result=mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result)>0)
                        {
                            $_SESSION['login_user'] = $id;
                            header("location: home.php");
                        }
                        else 
                            echo '<h3 style="color:red;text-align:center;">الرقم الاكاديمي او كلمة المرور المدخلة خطاء</h3>';
                            }
                            else{ echo "<h2 style='color:red;text-align:center;'>يجيب ادخال الرقم الاكاديمي وكلمة المرور للدخول<h2>";}
                }
                if (isset($_POST['emp'])){
                     header("location: login_emp.php");
                }
                    mysqli_close($conn);
?>
</div>
</body>

</html>