<?php 
    session_start();
    if(isset($_POST['btnLogOut'])){
        session_destroy();
        echo '<script>alert("Đăng xuất thành công!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }else{
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }
?>