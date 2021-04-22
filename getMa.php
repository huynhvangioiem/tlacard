<?php

    session_start();
    if(isset($_POST["cardID"])){

        include_once('connection.php');

        include_once('define/const.php');

        include_once('define/funtion.php');

        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardID`=".$_POST['cardID']) or die(mysqli_connect_error($conn));

        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        if($row['cardStatus']!=daban){
            $nhaMang;

            switch ($row['cardNhaMang']) {

                case Viettel:

                    $nhaMang = "Viettel";

                    break;

                case Mobifone:

                    $nhaMang = "Mobifone";

                    break;

                case Vinaphone:

                    $nhaMang = "Vinaphone";

                    break;

                case Vietnamobile:

                    $nhaMang = "Vietnamobile";

                    break;

            };

            //truy van chiet khau cua nguoi dang lay card

            $resultuser = mysqli_query($conn,"SELECT userChietKhau FROM `user` WHERE `userID`=".$_SESSION["userID"]) or die(mysqli_connect_error($conn));

            $rowuser=mysqli_fetch_array($resultuser, MYSQLI_ASSOC);

            //tinh so tien chiet khau va so tien phai tra cho card dang lay

            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowuser['userChietKhau']/100;

            $von=$row['cardMenhGia']-$ck;

            //kiem tra ng lay card co du tien de mua khong, thuc hien tru so du

            if(truSoDu($von,$_SESSION['userID'],$conn)){

                //cap nhat trang thai card

                mysqli_query($conn,"UPDATE `card` SET `cardStatus` = ".daban." WHERE `cardID`=".$_POST['cardID']) or die(mysqli_connect_error($conn));

                lichSuGiaoDich(LayCard,$von,$_SESSION['userID'],$_POST['cardID'],$conn);

?>

<div class="modal fade detailsModal" id="detailsModal" tabindex="-1" data-keyboard="false"
    aria-labelledby="detailsModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header text-center">

                <h5 class="modal-title" id="detailsModalLabel">Chi tiết thẻ cào</h5>

            </div>

            <div class="modal-body">

                <table class="table table-light">

                    <tbody>

                        <tr>

                            <td>Tên Thẻ:</td>

                            <td><?php echo $nhaMang; ?> <?php echo number_format($row['cardMenhGia'],0,",",'.')."đ"; ?>

                            </td>

                        </tr>

                        <tr>

                            <td>Mã Thẻ:</td>

                            <td><?php echo $row['cardMaThe']; ?></td>

                        </tr>

                        <tr>

                            <td>Số sê-ri:</td>

                            <td><?php echo $row['cardSeRi']; ?></td>

                        </tr>

                        <tr>

                            <td>HSD:</td>

                            <td><?php echo $row['cardHSD']; ?></td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <div class="modal-footer text-center">

                <button type="button" class="btn btn-primary" onclick="window.location='./'" data-dismiss="modal">Xác
                    Nhận Đã Hoàn Thành</button>

            </div>

        </div>

    </div>

</div>

<script>
$('#detailsModal').modal({

    // backdrop: 'static'

});
</script>

<?php

            }else{

                echo '<script>alert("Số dư của bạn không đủ để thực hiện giao dịch này!");</script>';

                echo '<meta http-equiv="refresh" content="0;URL=./" />';

            }
        }else{
            echo '<script>alert("Đã có người mua trước đó. Vui lòng thao tác lại!");</script>';
            echo '<meta http-equiv="refresh" content="0;URL=./" />'; 
        }
    
    }else{

        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';

        echo '<meta http-equiv="refresh" content="0;URL=./" />';

    }

?>