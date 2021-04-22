<!-- log: update: 19/11/2020 status: done by: TLA -->
<?php
    $action=false;
    //xóa user
    if(isset($_POST['userID'])){
        $action=true;
        if($_POST['userID']!=1){
            include_once('connection.php'); 
            if(mysqli_query($conn,"DELETE FROM `user` WHERE `userID`=".$_POST['userID']) or die(mysqli_connect_error($conn)))
                echo '<script>alert("Xóa tài khoản thành công!");</script>';
            else 
                echo '<script>alert("Không thể xóa tài khoản này!");</script>';
            echo '<meta http-equiv="refresh" content="0;URL=./" />';
        }else echo '<script>alert("Không thể xóa tài khoản admin!");</script>';
    }
    //xoa card
    if(isset($_POST['cardID'])){
        $action=true;
        include_once('connection.php');
        mysqli_query($conn,"DELETE FROM `card` WHERE `cardID`=".$_POST['cardID']) or die(mysqli_connect_error($conn));
        echo '<script>alert("Xóa card thành công!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }
    if(!$action){
        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }
?>