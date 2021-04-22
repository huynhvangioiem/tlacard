<?php 
// log: update: 19/11/2020 status: done! by: TLA
    if(isset($_POST['userName'])){
        include_once('connection.php');
        $userName=$_POST['userName'];        
        $resultLogin = mysqli_query($conn,"Select * From user Where userName='$userName'") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($resultLogin)==1) echo false;
        else echo true;
    }else{
        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }
?>