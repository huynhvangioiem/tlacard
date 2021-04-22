<?php

    session_start();

    if(isset($_POST['idGd'])){

    include_once('connection.php');

    include_once('./define/const.php');

    $result = mysqli_query($conn,"SELECT lichsugiaodich.*,user.userFullName FROM `lichsugiaodich` JOIN user ON user.userID=lichsugiaodich.userID Where LichSuGiaoDichID=".$_POST['idGd']) or die(mysqli_connect_error($conn));

    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);

    $date=date_create($row['LichSuGiaoDichNgay']);

    if($row['LichSuGiaoDichLoai']==CongSoDu||$row['LichSuGiaoDichLoai']==TruSoDu){

?>

<div class="modal fade" id="chitietGd" data-backdrop="static" data-keyboard="false" tabindex="-1"

    aria-labelledby="modalAddLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header text-center">

                <h5 class="modal-title" id="modalAddLabel">Chi Tiết Giao Dịch</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

                <div class="modal-body">

                    <div class="form-group row">

                        <div class="col-sm-6">Số Tiền:</div>

                        <div class="col-sm-6"><?php echo number_format($row['LichSuGiaoDichGiaTri'],0,",",'.')."đ"; ?></div>

                    </div>

                    <div class="form-group row">

                        <div class="col-sm-6">Giao Dịch:</div>

                        <div class="col-sm-6">

                            <?php

                                switch ($row['LichSuGiaoDichLoai']) {

                                    case CongSoDu:

                                        echo "Nạp tiền vào tài khoản";

                                        break;

                                    case TruSoDu:

                                        echo "Rút tiền từ tài khoản";

                                        break;

                                }

                            ?>

                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-sm-6">Người Thực Hiện:</div>

                        <div class="col-sm-6"><?php echo $row['userFullName']; ?></div>

                    </div>

                    <div class="form-group row">

                        <div class="col-sm-6">Ngày Tạo:</div>

                        <div class="col-sm-6"><?php echo date_format($date,"d/m/Y H:i:s"); ?></div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

                </div>

        </div>

    </div>

</div>

<?php

    };

    if($row['LichSuGiaoDichLoai']==ThemCard||$row['LichSuGiaoDichLoai']==LayCard){

        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardID`=".$row['cardID']) or die(mysqli_connect_error($conn));

        $row1=mysqli_fetch_array($result,MYSQLI_ASSOC);

        $nhaMang;

        switch ($row1['cardNhaMang']) {

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

?>

<div class="modal fade" id="chitietGd" data-backdrop="static" data-keyboard="false" tabindex="-1"

    aria-labelledby="modalAddLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header text-center">

                <h5 class="modal-title" id="modalAddLabel">Chi Tiết Giao Dịch</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="form-group row">

                    <div class="col-sm-6">Số Tiền:</div>

                    <div class="col-sm-6"><?php echo number_format($row['LichSuGiaoDichGiaTri'],0,",",'.')."đ"; ?></div>

                </div>

                <div class="form-group row">

                    <div class="col-sm-6">Giao Dịch:</div>

                    <div class="col-sm-6">

                        <?php

                            switch ($row['LichSuGiaoDichLoai']) {

                                case ThemCard:

                                    echo "Thêm card";

                                    break;

                                case LayCard:

                                    echo "Lấy card";

                                    break;

                            }

                        ?>

                    </div>

                </div>

                <div class="form-group row">

                    <div class="col-sm-6">Người Thực Hiện:</div>

                    <div class="col-sm-6"><?php echo $row['userFullName']; ?></div>

                </div>

                <div class="form-group row">

                    <div class="col-sm-6">Ngày Giao Dịch:</div>

                    <div class="col-sm-6"><?php echo date_format($date,"d/m/Y H:i:s"); ?></div>

                </div>

                <hr>

                <div class="form-group row">

                    <div class="col-sm-6">Tên Thẻ:</div>

                    <div class="col-sm-6"><?php echo $nhaMang; ?> <?php echo number_format($row1['cardMenhGia'],0,",",'.')."đ"; ?></div>

                </div>

                <div class="form-group row">

                    <div class="col-sm-6">Mã thẻ:</div>

                    <div class="col-sm-6"><?php echo $row1['cardMaThe']; ?></div>

                </div>

                <div class="form-group row">

                    <div class="col-sm-6">Seri:</div>

                    <div class="col-sm-6"><?php echo $row1['cardSeRi']; ?></div>

                </div>

                <div class="form-group row">

                    <div class="col-sm-6">HSD:</div>

                    <div class="col-sm-6"><?php echo $row1['cardHSD']; ?></div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>

        </div>

    </div>

</div>

<?php    

    }

?>

<script>

    $('#chitietGd').modal({

        backdrop: 'static'

    });

</script>

<?php

    }else{

        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';

        echo '<meta http-equiv="refresh" content="0;URL=./" />';

    }

?>