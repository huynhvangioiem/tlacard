<?php 
//log: create: 23/11/2020 status: done! by: TLA
    session_start();
    if(isset($_POST['cardID'])){
        include_once('define/const.php');
        include_once('define/funtion.php');
        include_once('connection.php');
        //cap nhat trang thai card
        mysqli_query($conn,"UPDATE `card` SET `cardStatus` = ".daduyet." WHERE `card`.`cardID`=".$_POST["cardID"]) or die(mysqli_connect_error($conn));
        //truy van thong tin card
        $result = mysqli_query($conn,"Select * FROM card WHERE cardID =".$_POST['cardID']) or die(mysqli_connect_error($conn));
        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
        //tinh toan
        $sotien=$row["cardGiaGoc"]+$row["cardChietKhau"];
        //cong so du cho nguoi ban
        congSoDu($sotien,$row['userID'],$conn);
        //them vao lich su giao dich
        lichSuGiaoDich(ThemCard,$sotien,$row['userID'],$row['cardID'],$conn);
        echo '<script>alert("Thành công! card đã được thêm vào hệ thống.");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }else{
        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }
?>