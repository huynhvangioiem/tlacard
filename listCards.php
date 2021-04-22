<?php

    session_start();

    if(isset($_POST['userType'])){

        include_once('define/const.php');

        if($_SESSION['userType']==seller){

            include_once('connection.php');

            $userID=$_SESSION['userID'];

            $result = mysqli_query($conn,"SELECT * FROM card WHERE card.userID=$userID ORDER BY `cardStatus`, cardID DESC") or die(mysqli_connect_error($conn));

?>

<!-- html -->

<div class="col-sm-12" id="addcard">

    <div class="modal fade" id="modalAddCard" data-backdrop="static" data-keyboard="false" tabindex="-1"

        aria-labelledby="modalAddLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header text-center">

                    <h5 class="modal-title" id="modalAddLabel">Thêm Card</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    <div class="text-cneter">Vui lòng điền chính xác các thông tin bên dưới kèm ảnh chụp rõ các thông số

                        card bao gồm cả giá mua! card hợp lễ sẽ được phê duyệt trong vòng 24h, nếu không hợp lệ card sẽ

                        bị

                        bỏ qua và xóa khỏi hệ thống mà không cần thông báo!</div>

                </div>

                <form method="post" action="addCard.php" enctype="multipart/form-data" name="formAdd" id="formAdd"

                    class="formAdd">

                    <div class="modal-body">

                        <div class="form-group  row">

                            <label for="nhaMang" class="col-sm-4 col-form-label">Nhà Mạng</label>

                            <div class="col-sm-8">

                                <select name="nhaMang" id="nhaMang" class="form-control" required="required">

                                    <option value="">--Vui lòng chọn nhà mạng--</option>

                                    <option value="VT">Viettel</option>

                                    <option value="VN">Vinaphone</option>

                                    <option value="MB">Mobifone</option>

                                    <option value="VNM">Vietnamobile</option>

                                </select>

                            </div>

                        </div>

                        <div class="form-group  row">

                            <label for="menhGia" class="col-sm-4 col-form-label">Mệnh giá</label>

                            <div class="col-sm-8">

                                <select name="menhGia" id="menhGia" class="form-control" required="required">

                                    <option value="">--Vui lòng chọn Mệnh giá--</option>

                                    <option value="1">10.000đ</option>

                                    <option value="2">20.000đ</option>

                                    <!-- <option value="3">30.000đ</option> -->

                                    <option value="4">50.000đ</option>

                                    <option value="5">100.000đ</option>

                                    <!-- <option value="6">200.000đ</option> -->

                                </select>

                            </div>

                        </div>

                        <div class="form-group  row">

                            <label for="giaGoc" class="col-sm-4 col-form-label">Giá gốc săn được</label>

                            <div class="col-sm-8">

                                <input type="number" min="0" max="200000" name="giaGoc" id="giaGoc" class="form-control"

                                    value="" required="required" placeholder="Vui lòng nhập giá săn được!">

                            </div>

                        </div>

                        <div class="form-group  row">

                            <label for="seRi" class="col-sm-4 col-form-label">Số Sê-Ri</label>

                            <div class="col-sm-8">

                                <input type="text" name="seRi" id="seRi" class="form-control" value=""

                                    required="required" placeholder="Vui lòng nhập số sê ri!" pattern="^[0-9]{10,16}$">

                            </div>

                        </div>

                        <div class="form-group  row">

                            <label for="maCard" class="col-sm-4 col-form-label">Mã thẻ cào</label>

                            <div class="col-sm-8">

                                <input type="text" name="maCard" id="maCard" class="form-control" value=""

                                    required="required" placeholder="Nhập chính xác mã thẻ cào vào đây!"

                                    pattern="^[0-9]{10,16}$">

                            </div>

                        </div>

                        <div class="form-group  row">

                            <label for="hsd" class="col-sm-4 col-form-label">Hạn sử dụng</label>

                            <div class="col-sm-8">

                                <input type="date" name="hsd" id="hsd" class="form-control" value="" required="required"

                                    title="">

                            </div>

                        </div>

                        <div class="form-group  row">

                            <label for="hsd" class="col-sm-4 col-form-label">Hình Ảnh</label>

                            <div class="col-sm-8">

                                <input class="" type="file" name="hinhAnh" required="required">

                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="reset" class="btn btn-secondary">Reset</button>

                        <button type="submit" name="btnAddCard" class="btn btn-primary">Save</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<div class="text-center col-sm-12 bg-info p-2 mt-1">

    <h3 class="mb-0 text-white">Danh Sách Card</h3>

</div>

<div class="table-responsive text-center">

    <table class="table table-hover table-striped" id="listCards">

        <thead>

            <tr>

                <th class="align-middle">STT</th>

                <th class="align-middle">Nhà Mạng</th>

                <th class="align-middle">Mệnh Giá</th>

                <th class="align-middle">Giá gốc</th>

                <th class="align-middle">HSD</th>

                <th class="align-middle">Số SêRi</th>

                <th class="align-middle">Mã Thẻ</th>

                <th class="align-middle">Chiết Khấu</th>

                <th class="align-middle">Hình Ảnh</th>

                <th class="align-middle">Trạng Thái</th>

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

                <td class="align-middle">

                    <a href="./imgcards/<?php echo $row['cardHinhAnh']; ?>" target="_blank">

                        <img src="./imgcards/<?php echo $row['cardHinhAnh']; ?>" height="30px" class="img-responsive">

                    </a>

                </td>

                <td class="align-middle">

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

                </td>

            </tr>

            <?php $stt++;

                }

            ?>

        </tbody>

    </table>

</div>

<div class="col-sm-12 text-center"><button id="btnAddCard" class="btn btn-info" type="button">Thêm Card</button></div>

<!-- ./html -->

<!-- script -->

<script>

$(document).ready(function () {

    var table = $("#listCards").DataTable({

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

$('#btnAddCard').click(function() {

    $('#modalAddCard').modal({

        backdrop: 'static'

    });

});

</script>

<!-- ./script -->

<?php

        }

    }else{

        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';

        echo '<meta http-equiv="refresh" content="0;URL=./" />';

    }

?>