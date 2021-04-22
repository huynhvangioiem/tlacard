<?php 
    session_start();
    if(isset($_POST['btnAddCard'])){
        include_once('define/const.php');
        include_once('connection.php');
        //lay gia tri post
        $nhaMang=$_POST['nhaMang'];
        $menhGia=$_POST['menhGia'];
        $giaGoc=$_POST['giaGoc'];
        $HSD=$_POST['hsd'];
        $seri=$_POST['seRi'];
        $maThe=$_POST['maCard'];
        $hinhAnh=$_FILES['hinhAnh'];
        $tenhinh =$hinhAnh['name'];
        $userID=$_SESSION['userID'];
        //lay so %chiet khau cua user tai thoi diem them card
        $result = mysqli_query($conn,"SELECT `userChietKhau` FROM `user` WHERE `userID`=".$userID) or die(mysqli_connect_error($conn));
        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
        //tinh toan can thiet
        $status=choduyet;
        switch ($menhGia) {
            case MG10K:
                $menhGia=10000;
                break;
            case MG20K:
                $menhGia=20000;
                break;
            case MG30K:
                $menhGia=30000;
                break;
            case MG50K:
                $menhGia=50000;
                break;
            case MG100K:
                $menhGia=100000;
                break;
            case MG200K:
                $menhGia=200000;
                break;
        }
        $chietKhau=($menhGia-$giaGoc)*$row['userChietKhau']/100;
        //them vao
        mysqli_query($conn,"INSERT INTO `card`(`cardNhaMang`, `cardMenhGia`, `cardGiaGoc`, `cardHSD`, `cardSeRi`, `cardMaThe`, `cardStatus`, `cardHinhAnh`, `userID`,cardChietKhau) VALUES ('$nhaMang',$menhGia,$giaGoc,'$HSD','$seri','$maThe',$status,'$tenhinh',$userID,$chietKhau)") or die(mysqli_connect_error($conn));
        copy ($hinhAnh['tmp_name'],"imgcards/".$tenhinh);
        echo '<script>alert("Card đã được thêm Thành Công và đang chờ duyệt!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }else{
        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }
?>