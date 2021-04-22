<?php
    session_start();
    if(isset($_POST['id'])){
    include_once('connection.php');
    include_once('./define/const.php');
    $result1 = mysqli_query($conn,"SELECT a.userFullName, b.*, c.LichSuGiaoDichNgay FROM user a JOIN card b ON a.userID=b.userID JOIN lichsugiaodich c ON b.cardID=c.cardID WHERE b.cardID =".$_POST['id']." AND c.LichSuGiaoDichLoai=".ThemCard) or die(mysqli_connect_error($conn));
    $row1=mysqli_fetch_array($result1, MYSQLI_ASSOC);
    $result2 = mysqli_query($conn,"SELECT c.userFullName, b.LichSuGiaoDichGiaTri, b.LichSuGiaoDichNgay FROM card a JOIN lichsugiaodich b ON a.cardID=b.cardID JOIN user c ON b.userID = c.userID WHERE a.cardID=".$_POST['id']." AND b.LichSuGiaoDichLoai=".LayCard) or die(mysqli_connect_error($conn));
    $row2=mysqli_fetch_array($result2, MYSQLI_ASSOC);
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

            <h5 class="modal-title" id="modalAddLabel">Chi Tiết</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

            </button>

        </div>

            <div class="modal-body">

                <div class="form-group row">

                    <div class="col-sm-6">Tên Thẻ:</div>

                    <div class="col-sm-6"><?php echo $nhaMang." ".number_format($row1['cardMenhGia'],0,",",'.')."đ" ?></div>

                </div>

                <div class="form-group row">

                    <div class="col-sm-6">Mã Thẻ:</div>

                    <div class="col-sm-6"><?php echo $row1['cardMaThe']; ?></div>

                </div>

                <div class="form-group row">

                    <div class="col-sm-6">Sê-Ri:</div>

                    <div class="col-sm-6"><?php echo $row1['cardSeRi']; ?></div>

                </div>

                <div class="form-group row">

                    <div class="col-sm-6">HSD:</div>

                    <div class="col-sm-6"><?php echo $row1['cardHSD']; ?></div>

                </div>
                <div class="form-group row">

                    <div class="col-sm-6">Giá Gốc:</div>

                    <div class="col-sm-6"><?php echo number_format($row1['cardGiaGoc'],0,",",'.')."đ" ?></div>

                </div>
                <div class="form-group row">

                    <div class="col-sm-6">Lợi Nhuận:</div>

                    <div class="col-sm-6"><?php echo number_format($row1['cardMenhGia']-$row1['cardGiaGoc']-$row1['cardChietKhau']-($row1['cardMenhGia']-$row2['LichSuGiaoDichGiaTri']),0,",",'.')."đ"; ?></div>

                </div>
                <hr>
                <div class="form-group row">

                    <div class="col-sm-6">Người Thêm:</div>

                    <div class="col-sm-6"><?php echo $row1['userFullName']; ?></div>

                </div>
                <div class="form-group row">

                    <div class="col-sm-6">Chiết Khấu Thêm:</div>

                    <div class="col-sm-6"><?php echo number_format($row1['cardChietKhau'],0,",",'.')."đ" ?></div>

                </div>
                <div class="form-group row">

                    <div class="col-sm-6">Ngày Thêm</div>

                    <div class="col-sm-6"><?php echo date_format(date_create($row1['LichSuGiaoDichNgay']),"d/m/Y H:i:s"); ?></div>

                </div>
                <hr>
                <div class="form-group row">

                    <div class="col-sm-6">Người Mua:</div>

                    <div class="col-sm-6"><?php echo $row2['userFullName']; ?></div>

                </div>
                <div class="form-group row">

                    <div class="col-sm-6">Chiết Khấu Mua:</div>

                    <div class="col-sm-6"><?php echo number_format($row1['cardMenhGia']-$row2['LichSuGiaoDichGiaTri'],0,",",'.')."đ"; ?></div>

                </div>
                <div class="form-group row">

                    <div class="col-sm-6">Ngày Mua:</div>

                    <div class="col-sm-6"><?php echo date_format(date_create($row2['LichSuGiaoDichNgay']),"d/m/Y H:i:s"); ?></div>

                </div>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>

    </div>

</div>

</div>
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