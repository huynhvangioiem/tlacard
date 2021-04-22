<?php

    session_start();

    if(isset($_POST['userType'])){

    include_once('connection.php');

    include_once('./define/const.php');

    if($_SESSION['userType']!=admin){

        $result = mysqli_query($conn,"SELECT lichsugiaodich.*,user.userFullName FROM `lichsugiaodich` JOIN user ON user.userID=lichsugiaodich.userID Where lichsugiaodich.userID=".$_SESSION['userID']." ORDER BY `LichSuGiaoDichID` DESC") or die(mysqli_connect_error($conn));

    }else $result = mysqli_query($conn,"SELECT lichsugiaodich.*,user.userFullName FROM `lichsugiaodich` JOIN user ON user.userID=lichsugiaodich.userID ORDER BY `LichSuGiaoDichID` DESC") or die(mysqli_connect_error($conn));

?>

<div class="details"></div>

<div class="text-center col-sm-12 bg-info p-2 mt-1 mb-2">

    <h3 class="mb-0 text-white">Lịch Sử Giao Dịch</h3>

</div>

<div class="table-responsive">

    <table class="table table-hover table-striped text-center" id="transactionHistory">

        <caption>List of Transaction history</caption>

        <thead>

            <tr>

                <th class="align-middle">STT</th>

                <th class="align-middle">Loại GD</th>

                <th class="align-middle">Thời Gian</th>

                <th class="align-middle">Giá Trị</th>

                <th class="align-middle">Người Thực Hiện</th>

                <th class="align-middle">Chi Tiết GD</th>

            </tr>

        </thead>

        <tbody>

            <?php

                $stt=1;

                while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){

                    $type;

                    switch ($row['LichSuGiaoDichLoai']) {

                        case LayCard:

                            $type="Lấy card";

                            break;

                        case ThemCard:

                            $type="Thêm card";

                            break;

                        case CongSoDu:

                            $type="Nạp Tiền";

                            break;

                        case TruSoDu:

                            $type="Rút Tiền";

                            break;

                    }

                    $date=date_create($row['LichSuGiaoDichNgay']);

            ?>

            <tr>

                <td class="align-middle"><?php echo $stt; ?></td>

                <td class="align-middle"><?php echo $type; ?></td>

                <td class="align-middle"><?php echo date_format($date,"d/m/Y H:i:s"); ?></td>

                <td class="align-middle"><?php echo number_format($row['LichSuGiaoDichGiaTri'],0,",",'.')."đ"; ?></td>

                <td class="align-middle"><?php echo $row['userFullName']; ?></td>

                <td class="align-middle">

                    <button onclick="return chiTietGD(<?php echo $row['LichSuGiaoDichID'] ?>);" class="btn btn-light p-0" type="button">

                        <img src="./icon/edit.png" height="20px" alt="">

                    </button>

                </td>

            </tr>

            <?php $stt++;

                }

            ?>

        </tbody>

    </table>

</div>

<script>

    $(document).ready(function () {

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

            "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "Tất cả"]]

        });

    });

    function chiTietGD(id) {

        var xhttp;

        xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {

            if (this.readyState == 4 && this.status == 200) {

                $(".details").html(this.responseText);

            }

        };

        xhttp.open("POST", "chiTietGd.php", true);

        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhttp.send("idGd="+id);

    }

</script>

<?php

    }else{

        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';

        echo '<meta http-equiv="refresh" content="0;URL=./" />';

    }

?>