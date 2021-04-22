<?php
    $action=false;
    //update user
    if(isset($_POST['btnEditUser'])){
        include_once('connection.php');
        $action=true;
        $userID= $_POST['userID'];
        $fullName= $_POST["Name"];
        $tel=$_POST['sdt'];
        $chietKhau=$_POST['chietKhau'];
        mysqli_query($conn,"UPDATE `user` SET `userFullName`='$fullName',`userSDT`= '$tel',`userChietKhau`='$chietKhau' WHERE `userID`=".$userID) or die(mysqli_connect_error($conn));
        echo '<script>alert("Chỉnh sửa thành công!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }
    //dang nhap trai phep
    if(!$action){
        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }
?>