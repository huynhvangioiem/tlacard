<?php
    date_default_timezone_set('asia/ho_chi_minh');
    function congSoDu($sotien,$userid,$conn){
        $resultuser = mysqli_query($conn,"SELECT `userSoDu` FROM `user` WHERE `userID`=".$userid) or die(mysqli_connect_error($conn));
        $rowuser=mysqli_fetch_array($resultuser, MYSQLI_ASSOC);
        $sodu=$rowuser['userSoDu'];
        $sodu+=$sotien;
        mysqli_query($conn,"UPDATE `user` SET `userSoDu` = $sodu WHERE `user`.`userID` =".$userid) or die(mysqli_connect_error($conn));
    }
    function truSoDu($sotien,$userid,$conn){
        $resultuser = mysqli_query($conn,"SELECT `userSoDu` FROM `user` WHERE `userID`=".$userid) or die(mysqli_connect_error($conn));
        $rowuser=mysqli_fetch_array($resultuser, MYSQLI_ASSOC);
        $sodu=$rowuser['userSoDu'];
        if($sodu<$sotien){
            return false;
        }else {
            $sodu-=$sotien;
            mysqli_query($conn,"UPDATE `user` SET `userSoDu` = $sodu WHERE `user`.`userID` =".$userid) or die(mysqli_connect_error($conn));
            return true;
        }
    }
    function lichSuGiaoDich($loai,$giaTri,$userID,$cardID,$conn){
        $date=date("Y-m-d H:i:s");
        if($cardID!=NULL){
            mysqli_query($conn,"INSERT INTO `lichsugiaodich`(`LichSuGiaoDichLoai`, `LichSuGiaoDichNgay`, `LichSuGiaoDichGiaTri`, `userID`, `cardID`) VALUES ($loai,'$date',$giaTri,$userID,$cardID)") or die(mysqli_connect_error($conn));
        }else {
            mysqli_query($conn,"INSERT INTO `lichsugiaodich`(`LichSuGiaoDichLoai`, `LichSuGiaoDichNgay`, `LichSuGiaoDichGiaTri`, `userID`) VALUES ($loai,'$date',$giaTri,$userID)") or die(mysqli_connect_error($conn));  
        }
    }
?>