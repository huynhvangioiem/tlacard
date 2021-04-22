<?php 
    if(isset($_POST['btnAddUser'])){
        include_once('connection.php');
        $userName=$_POST['userName'];
        $password=$_POST['password'];
        $password=md5($password);
        $fullName=$_POST['Name'];
        $tel=$_POST['sdt'];
        $userType=$_POST['userType'];
        $chietKhau=$_POST['chietKhau'];
        $dateCreated = date("Y-m-d");
        mysqli_query($conn,"INSERT INTO `user`(`userName`, `userPassword`, `userFullName`, `userSDT`, `userNgayTao`, `userSoDu`, `userType`, `userChietKhau`) 
        VALUES ('$userName','$password','$fullName','$tel','$dateCreated',0,$userType,$chietKhau)") or die(mysqli_connect_error($conn));
        echo '<script>alert("Thêm user Thành Công!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }else{
        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }
?>