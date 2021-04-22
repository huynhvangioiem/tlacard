<?php

    session_start();

    if(isset($_POST['userType'])){

    include_once('connection.php');

    include_once('./define/const.php');
?>

<div class="details"></div>

<div class="text-center col-sm-12 bg-info p-2 mt-1 mb-2">

    <h3 class="mb-0 text-white">Thống Kê</h3>

</div>
<?php
    if($_SESSION['userType']==admin){
        $result = mysqli_query($conn,"SELECT card.*, lichsugiaodich.LichSuGiaoDichGiaTri FROM `card` LEFT JOIN lichsugiaodich ON card.cardID=lichsugiaodich.cardID WHERE lichsugiaodich.LichSuGiaoDichLoai=".LayCard." ORDER BY cardID DESC") or die(mysqli_connect_error($conn));
?>
<div class="table-responsive">

<table class="table table-hover table-striped text-center" id="transactionHistory">

    <thead>

        <tr>

            <th class="align-middle">STT</th>

            <th class="align-middle">Nhà Mạng</th>

            <th class="align-middle">Mệnh Giá</th>

            <th class="align-middle">Giá gốc</th>

            <th class="align-middle">CK Người Bán</th>
            <th class="align-middle">CK Người Mua</th>
            <th class="align-middle">Lợi Nhuận</th>

            <th class="align-middle">Chi Tiết</th>

        </tr>

    </thead>

    <tbody>

        <?php

            $stt=1;

            $tongMG=0;

            $tongGC=0;

            $tongCKBan=0;
            $tongCKMua=0;

            $TongLNTT=0;

            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $ckMua=$row['cardMenhGia']-$row['LichSuGiaoDichGiaTri'];
                $LNTT=$row['cardMenhGia']-$row['cardGiaGoc']-$row['cardChietKhau']-$ckMua;

                $tongMG+=$row['cardMenhGia'];

                $tongGC+=$row['cardGiaGoc'];

                $tongCKBan+=$row['cardChietKhau'];
                $tongCKMua+=$ckMua;

                $TongLNTT+=$LNTT;

        ?>

        <tr>

            <td class="align-middle"><?php echo $stt; ?></td>

            <td class="align-middle">

                <?php

                    switch ($row['cardNhaMang']) {

                        case Viettel:

                            echo "Viettel";

                            break;

                        case Mobifone:

                            echo "Mobifone";

                            break;

                        case Vinaphone:

                            echo "Vinaphone";

                            break;

                        case Vietnamobile:

                            echo "Vietnamobile";

                            break;

                    }

                ?>

            </td>

            <td class="align-middle"><?php echo number_format($row['cardMenhGia'],0,",",'.')."đ"; ?></td>

            <td class="align-middle"><?php echo number_format($row['cardGiaGoc'],0,",",'.');?>đ</td>
            <td class="align-middle"><?php echo number_format($row['cardChietKhau'],0,",",'.')."đ"; ?></td>

            <td class="align-middle"><?php echo number_format($ckMua,0,",",'.')."đ"; ?></td>

            <td class="align-middle"><?php echo number_format($LNTT,0,",",'.')."đ"; ?></td>

            <td class="align-middle">

                <button onclick="return chitiet(<?php echo $row['cardID'] ?>);"
                    class="btn btn-light p-0" type="button">

                    <img src="./icon/edit.png" height="20px" alt="">

                </button>

            </td>

        </tr>

        <?php $stt++;

            }

        ?>

    </tbody>

    <tfoot>

        <th colspan="2" class="align-middle">Tổng Cộng</th>

        <th class="align-middle"><?php echo number_format($tongMG,0,",",'.')."đ"; ?></th>

        <th class="align-middle"><?php echo number_format($tongGC,0,",",'.')."đ"; ?></th>

        <th class="align-middle"><?php echo number_format($tongCKBan,0,",",'.')."đ"; ?></th>
        <th class="align-middle"><?php echo number_format($tongCKMua,0,",",'.')."đ"; ?></th>

        <th class="align-middle"><?php echo number_format($TongLNTT,0,",",'.')."đ"; ?></th>

        <th class="align-middle">-</th>

    </tfoot>

</table>

</div>
<?php
    }else{
        $result = mysqli_query($conn,"SELECT * FROM `lichsugiaodich` JOIN card ON lichsugiaodich.cardID=card.cardID WHERE lichsugiaodich.`userID`=".$_SESSION['userID']." ORDER BY `LichSuGiaoDichID` DESC") or die(mysqli_connect_error($conn));
?>
<div class="table-responsive">

    <table class="table table-hover table-striped text-center" id="transactionHistory">

        <thead>

            <tr>

                <th class="align-middle">STT</th>

                <th class="align-middle">Nhà Mạng</th>

                <th class="align-middle">Mệnh Giá</th>

                <?php if($_SESSION['userType']!=buyer) echo '<th class="align-middle">Giá gốc</th>' ?>

                <th class="align-middle">Giá Trị GD</th>

                <th class="align-middle">Lợi Nhuận</th>

                <th class="align-middle">Ngày GD</th>

                <th class="align-middle">Chi Tiết GD</th>

            </tr>

        </thead>

        <tbody>

            <?php

                $stt=1;

                $tongMG=0;

                $tongGC=0;

                $tongGT=0;

                $TongLNTT=0;

                while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){

                    $date=date_create($row['LichSuGiaoDichNgay']);

                    if($row['LichSuGiaoDichLoai']==ThemCard){

                        $LNTT=$row['cardChietKhau'];

                    }else $LNTT=$row['cardMenhGia']-$row['LichSuGiaoDichGiaTri'];

                    $tongMG+=$row['cardMenhGia'];

                    $tongGC+=$row['cardGiaGoc'];

                    $tongGT+=$row['LichSuGiaoDichGiaTri'];

                    $TongLNTT+=$LNTT;

            ?>

            <tr>

                <td class="align-middle"><?php echo $stt; ?></td>

                <td class="align-middle">

                    <?php

                        switch ($row['cardNhaMang']) {

                            case Viettel:

                                echo "Viettel";

                                break;

                            case Mobifone:

                                echo "Mobifone";

                                break;

                            case Vinaphone:

                                echo "Vinaphone";

                                break;

                            case Vietnamobile:

                                echo "Vietnamobile";

                                break;

                        }

                    ?>

                </td>

                <td class="align-middle"><?php echo number_format($row['cardMenhGia'],0,",",'.')."đ"; ?></td>

                <?php if($_SESSION['userType']!=buyer) echo '<td class="align-middle">'.number_format($row['cardGiaGoc'],0,",",'.').'đ</td>' ?>
                <td class="align-middle"><?php echo number_format($row['LichSuGiaoDichGiaTri'],0,",",'.')."đ"; ?></td>

                <td class="align-middle"><?php echo number_format($LNTT,0,",",'.')."đ"; ?></td>

                <td class="align-middle"><?php echo date_format($date,"d/m/Y H:i:s"); ?></td>

                <td class="align-middle">

                    <button onclick="return chiTietGD(<?php echo $row['LichSuGiaoDichID'] ?>);"
                        class="btn btn-light p-0" type="button">

                        <img src="./icon/edit.png" height="20px" alt="">

                    </button>

                </td>

            </tr>

            <?php $stt++;

                }

            ?>

        </tbody>

        <tfoot>

            <th colspan="2" class="align-middle">Tổng Cộng</th>

            <th class="align-middle"><?php echo number_format($tongMG,0,",",'.')."đ"; ?></th>

            <th class="align-middle"><?php echo number_format($tongGC,0,",",'.')."đ"; ?></th>

            <th class="align-middle"><?php echo number_format($tongGT,0,",",'.')."đ"; ?></th>

            <th class="align-middle"><?php echo number_format($TongLNTT,0,",",'.')."đ"; ?></th>

            <th class="align-middle">-</th>

            <th class="align-middle">-</th>

        </tfoot>

    </table>

</div>
<?php
    }
?>

<script>
$(document).ready(function() {

    var table = $("#transactionHistory").DataTable({

        responsive: true,

        "language": {

            "lengthMenu": "Hiển thị _MENU_ dòng dữ liệu trên một trang",

            "info": "Hiển thị trang _PAGE_ trên _PAGES_",

            "infoEmpty": "Dữ liệu rỗng",

            "processing": "Đang xử lý...",

            "search": "Tìm kiếm",

            "loadingRecords": "Đang load dữ liệu...",

            "zeroRecords": "Không tìm thấy dữ liệu",

            "infoFiltered": "(Được lọc từ _MAX_ dòng dữ liệu)",

            "paginate": {

                "first": "|<",

                "last": ">|",

                "next": ">>",

                "previous": "<<"

            }

        },

        "lengthMenu": [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "Tất cả"]
        ]

    });

});


function chitiet(id) {

var xhttp;

xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {

        $(".details").html(this.responseText);

    }

};

xhttp.open("POST", "chitietcard.php", true);

xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

xhttp.send("id=" + id);

}
function chiTietGD(id) {

    var xhttp;

    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            $(".details").html(this.responseText);

        }

    };

    xhttp.open("POST", "chiTietGd.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send("idGd=" + id);

}
</script>

<?php

    }else{

        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';

        echo '<meta http-equiv="refresh" content="0;URL=./" />';

    }

?>