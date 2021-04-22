<?php 

    session_start();

    if(isset($_POST['userType'])){

        include_once('define/const.php');

        if($_SESSION['userType']==admin){

            include_once('connection.php');

            $result = mysqli_query($conn,"SELECT card.*, userFullName FROM `card` JOIN user ON card.userID=user.userID WHERE `cardStatus`=".choduyet." ORDER BY card.cardID DESC") or die(mysqli_connect_error($conn));

            $result1 = mysqli_query($conn,"SELECT card.*, userFullName FROM `card` JOIN user ON card.userID=user.userID WHERE `cardStatus`=".daduyet." ORDER BY card.cardID DESC ") or die(mysqli_connect_error($conn));

?>

<!-- html -->

<div id="adcard"></div>

<!-- danh sach card can phe duyet -->

<div class="text-center col-sm-12 bg-info text-white p-2 mt-1">

    <h3 class="mb-0">Danh Sách Card Cần Phê Duyệt</h3>

</div>

<div class="table-responsive text-center">

    <table class="table table-hover table-striped">

        <thead>

            <tr>

            <th class="align-middle">STT</th>

                <th class="align-middle">Nhà Mạng</th>

                <th class="align-middle">Mệnh Giá</th>

                <th class="align-middle">Giá Gốc</th>

                <th class="align-middle">HSD</th>

                <th class="align-middle">Số SêRi</th>

                <th class="align-middle">Mã Thẻ</th>

                <th class="align-middle">Chiết Khấu</th>

                <th class="align-middle">Người Thêm</th>

                <th class="align-middle">Hình Ảnh</th>

                <th class="align-middle" colspan="2">Lựa Chọn</th>

            </tr>

        </thead>

        <tbody>

            <?php

                $stt=1;

                while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){

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

                <td class="align-middle"><?php echo number_format($row['cardGiaGoc'],0,",",'.')."đ"; ?></td>

                <td class="align-middle"><?php echo $row['cardHSD']; ?></td>

                <td class="align-middle"><?php echo $row['cardSeRi']; ?></td>

                <td class="align-middle"><?php echo $row['cardMaThe']; ?></td>

                <td class="align-middle"><?php echo number_format($row['cardChietKhau'],0,",",'.')."đ"; ?></td>

                <td class="align-middle"><?php echo $row['userFullName']; ?></td>

                <td class="align-middle">

                    <a href="./imgcards/<?php echo $row['cardHinhAnh']; ?>" target="_blank">

                        <img src="./imgcards/<?php echo $row['cardHinhAnh']; ?>" height="30px" class="img-responsive">

                    </a>

                </td>

                <td class="align-middle pr-1"><button class="btn btn-primary" type="button" onclick="return duyet(<?php echo $row['cardID'] ?>);">Duyệt</button></td>

                <td class="align-middle pl-1"><button class="btn btn-warning" type="button" onclick="return xoa(<?php echo $row['cardID'] ?>);">Xóa</button></td>

            </tr>

            <?php $stt++;

                }

            ?>

        </tbody>

    </table>

</div>

<!-- danh sach card cua he thong -->

<div class="text-center col-sm-12 bg-success text-white p-2 mt-1">

    <h3 class="mb-0">Danh Sách Card Của Hệ Thống</h3>

</div>

<div class="table-responsive text-center">

    <table class="table table-hover table-striped" id="listCard">

        <thead>

            <tr>

                <th class="align-middle">STT</th>

                <th class="align-middle">Nhà Mạng</th>

                <th class="align-middle">Mệnh Giá</th>

                <th class="align-middle">Giá Gốc</th>

                <th class="align-middle">HSD</th>

                <th class="align-middle">Số SêRi</th>

                <th class="align-middle">Mã Thẻ</th>

                <th class="align-middle">Chiết Khấu</th>

                <th class="align-middle">Người Thêm</th>

                <th class="align-middle">Hình Ảnh</th>

            </tr>

        </thead>

        <tbody>

            <?php

                $stt=1;

                $tongMG=0;

                $tongGG=0;

                $tongCK=0;

                while($row=mysqli_fetch_array($result1, MYSQLI_ASSOC)){

                    $tongMG+=$row['cardMenhGia'];

                    $tongGG+=$row['cardGiaGoc'];

                    $tongCK+=$row['cardChietKhau'];

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

                <td class="align-middle"><?php echo number_format($row['cardGiaGoc'],0,",",'.')."đ"; ?></td>

                <td class="align-middle"><?php echo $row['cardHSD']; ?></td>

                <td class="align-middle"><?php echo $row['cardSeRi']; ?></td>

                <td class="align-middle"><?php echo $row['cardMaThe']; ?></td>

                <td class="align-middle"><?php echo number_format($row['cardChietKhau'],0,",",'.')."đ"; ?></td>

                <td class="align-middle"><?php echo $row['userFullName']; ?></td>

                <td class="align-middle">

                    <a href="./imgcards/<?php echo $row['cardHinhAnh']; ?>" target="_blank">

                        <img src="./imgcards/<?php echo $row['cardHinhAnh']; ?>" height="30px" class="img-responsive">

                    </a>

                </td>

                <!-- <td class="align-middle">

                    <?php

                        switch ($row['cardStatus']) {

                            case choduyet:

                                echo '<div class="p-1 bg-danger text-white">Chờ duyệt</div>';

                                break;

                            case daduyet:

                                echo '<div class="p-1 bg-success text-white">Đã duyệt</div>';

                                break;

                            case daban:

                                echo '<div class="p-1 bg-warning text-white">Đã bán</div>';

                                break;

                        }

                    ?>

                </td> -->

            </tr>

            <?php $stt++;

                }

            ?>

        </tbody>

        <tfoot>

            <tr>

                <th colspan="2" class="align-middle">Tổng Cộng</th>

                <th class="align-middle"><?php echo number_format($tongMG,0,",",'.')."đ"; ?></th>

                <th class="align-middle"><?php echo number_format($tongGG,0,",",'.')."đ"; ?></th>

                <th class="align-middle">-</th>

                <th class="align-middle">-</th>

                <th class="align-middle">-</th>

                <th class="align-middle"><?php echo number_format($tongCK,0,",",'.')."đ"; ?></th>

                <th class="align-middle">-</th>

                <th class="align-middle">-</th>

            </tr>

        </tfoot>

    </table>

</div>

<!-- ./html -->

<script>

$(document).ready(function () {

    var table = $("#listCard").DataTable({

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

        "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "Tất cả"]]

    });

});

    function duyet(params) {

        if (confirm("Bạn chắc chắn rằng card đã được kiểm tra và chính xác?")) {

            var xhttp;

            xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {

                    $("#adcard").html(this.responseText);

                }

            };

            xhttp.open("POST", "duyetcard.php", true);

            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send("cardID="+params);

        }

    }

    function xoa(params) {

        if (confirm("Bạn chắc chắn muốn xóa card này vì không chính xác thông tin?")) {

            var xhttp;

            xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {

                    $("#adcard").html(this.responseText);

                }

            };

            xhttp.open("POST", "del.php", true);

            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send("cardID="+params);

        }

    }

</script>

<?php

        }

    }else{

        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';

        echo '<meta http-equiv="refresh" content="0;URL=./" />';

    }

?>