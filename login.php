<?php 
    session_start();
    if (isset($_POST['btnLogin'])) {
        include_once('connection.php');
        $userName=$_POST['userName'];
        $password=$_POST['password'];
        $password=md5($password);
        $resultLogin = mysqli_query($conn,"Select * From user Where userName='$userName' and userPassword='$password'") or die(mysqli_connect_error($conn));
		if(mysqli_num_rows($resultLogin)==1){
			$rowUser=mysqli_fetch_array($resultLogin,MYSQLI_ASSOC);	
            $_SESSION["userID"]=$rowUser['userID'];
            $_SESSION["userType"]=$rowUser["userType"];
            echo '<script>alert("Đăng nhập thành công!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=./" />';
		}else {
            echo '<meta http-equiv="refresh" content="0;URL=./" />';
            echo '<script>alert("Tên đăng nhập hoặc mật khẩu không đúng.\nVui lòng kiểm tra lại!");</script>';
        }
    }else{
        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }
?>