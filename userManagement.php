<?php
    if(isset($_POST['userType'])){
        include_once('define/const.php');
        session_start();
        if($_SESSION["userType"]==admin){
            include_once('connection.php');
            $result = mysqli_query($conn,"SELECT * FROM `user`") or die(mysqli_connect_error($conn));
?>
<div id="editUser">
    <div class="modal fade" id="modalAddUser" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="modalAddLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="modalAddLabel">Thêm User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="adduser.php" onsubmit="return checkAdd();" enctype="multipart/form-data"
                    name="formAddUser" id="formAddUser" class="formAddUser">
                    <div class="modal-body">
                        <div class="form-group  row">
                            <label for="nhaMang" class="col-sm-4 col-form-label">UserName:</label>
                            <div class="col-sm-8">
                                <input type="text" name="userName" id="userName" class="form-control" value=""
                                    required="required" placeholder="Vui lòng nhập tên đăng nhập!"
                                    pattern="^[a-z0-9_-]{3,16}$"
                                    title="Bao gồm chữ cái viết thường và chữ số, độ dài từ 3 đến 16 ký tự!">
                            </div>
                        </div>
                        <div class="form-group  row">
                            <label for="nhaMang" class="col-sm-4 col-form-label">Mật Khẩu:</label>
                            <div class="col-sm-8">
                                <input type="password" name="password" id="password" class="form-control" value=""
                                    required="required" placeholder="Vui lòng nhập mật khẩu!"
                                    pattern="^[a-z0-9_-]{8,16}$"
                                    title="Bao gồm chữ cái viết thường và chữ số, độ dài từ 8 đến 16 ký tự!">
                            </div>
                        </div>
                        <div class="form-group  row">
                            <label for="nhaMang" class="col-sm-4 col-form-label">Check Mật Khẩu:</label>
                            <div class="col-sm-8">
                                <input type="password" name="checkPassword" id="checkPassword" class="form-control"
                                    value="" required="required" placeholder="Vui lòng nhập lại mật khẩu!">
                            </div>
                        </div>
                        <div class="form-group  row">
                            <label for="nhaMang" class="col-sm-4 col-form-label">Họ Tên:</label>
                            <div class="col-sm-8">
                                <input type="text" name="Name" id="Name" class="form-control" value=""
                                    required="required" placeholder="Vui lòng nhập họ và tên!">
                            </div>
                        </div>
                        <div class="form-group  row">
                            <label for="nhaMang" class="col-sm-4 col-form-label">SĐT:</label>
                            <div class="col-sm-8">
                                <input type="tel" name="sdt" id="sdt" class="form-control" value="" required="required"
                                    placeholder="Vui lòng nhập tên đăng nhập!" pattern="^0[0-9]{9}$"
                                    title="Vui lòng nhập vào số điện thoại Việt Nam hợp lệ!">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input" class="col-sm-4 control-label">Loại Tài Khoản:</label>
                            <div class="col-sm-8">
                                <select name="userType" id="userType" required="required" class="form-control">
                                    <option value="">-- Vui lòng chọn loại tài khoản --</option>
                                    <option value="-1">admin - Quản trị viên</option>
                                    <option value="0">buyer - Người mua</option>
                                    <option value="1">seller - Người bán</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group  row">
                            <label for="nhaMang" class="col-sm-4 col-form-label">Chiết Khấu (%):</label>
                            <div class="col-sm-8">
                                <input type="number" name="chietKhau" id="chietKhau" class="form-control" value=""
                                    required="required" min="0" max="100" placeholder="Vui lòng nhập số % chiết khấu!"
                                    title="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" name="btnAddUser" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 title text-center bg-info p-2 mt-1">
    <h3 class="mb-0">Quản Lý User</h3>
</div>
<div class="col-sm-12">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover table-striped text-center" id="listUser">
                <thead>
                    <tr>
                        <th class="align-middle">STT</th>
                        <th class="align-middle">UserName</th>
                        <th class="align-middle">Họ Tên</th>
                        <th class="align-middle">SĐT</th>
                        <th class="align-middle">Ngày Tạo</th>
                        <th class="align-middle">Số Dư</th>
                        <th class="align-middle">Loại Tài Khoản</th>
                        <th class="align-middle">Chiết Khấu</th>
                        <th class="align-middle">Nạp Rút</th>
                        <th class="align-middle">Reset</th>
                        <th class="align-middle">Sửa</th>
                        <th class="align-middle">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt=1;
                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                ?>
                    <tr>
                        <td class="align-middle"><?php echo $stt; ?></td>
                        <td class="align-middle"><?php echo $row['userName']; ?></td>
                        <td class="align-middle"><?php echo $row['userFullName']; ?></td>
                        <td class="align-middle"><?php echo $row['userSDT']; ?></td>
                        <td class="align-middle"><?php echo $row['userNgayTao']; ?></td>
                        <td class="align-middle"><?php echo number_format($row['userSoDu'],0,",",'.')."đ"; ?></td>
                        <td class="align-middle">
                            <?php
                            switch ($row['userType']) {
                                case -1:
                                    echo "admin";
                                    break;
                                case 0:
                                    echo "buyer";
                                    break;
                                case 1:
                                    echo "seller";
                                    break;
                            }
                        ?>
                        </td>
                        <td class="align-middle"><?php echo $row['userChietKhau']; ?>%</td>
                        <td class="align-middle">
                            <button onclick="return sodu(<?php echo $row['userID'] ?>)" class="btn btn-light p-1"
                                type="button">
                                <img src="./icon/bank.png" height="25px" alt="">
                            </button>
                        </td>
                        <td class="align-middle">
                            <button onclick="return resetPassword(<?php echo $row['userID'] ?>)"
                                class="btn btn-light p-1" type="button">
                                <img src="./icon/password.png" height="25px" alt="">
                            </button>
                        </td>
                        <td class="align-middle">
                            <button onclick="return editUser(<?php echo $row['userID'] ?>)" class="btn btn-light p-1"
                                type="button">
                                <img src="./icon/edit.png" height="25px" alt="">
                            </button>
                        </td>
                        <td class="align-middle">
                            <button onclick="return delUser(<?php echo $row['userID'] ?>)" class="btn btn-light p-1"
                                type="button">
                                <img src="./icon/delete.png" height="25px" alt="">
                            </button>
                        </td>
                    </tr>
                    <?php $stt++;}?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-sm-12 text-center">
    <button class="btn btn-success" id="btnAddUser" type="button">Thêm Tài Khoản</button>
</div>
<script>
$(document).ready(function () {
    var table = $("#listUser").DataTable({
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
//hien thi modal adduser
$('#btnAddUser').click(function() {
    $('#modalAddUser').modal({
        backdrop: 'static'
    });
});
//kiem tra ten dang nhap da ton tai
$("#userName").blur(function() {
    var userName = $("#userName").val();
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (!this.responseText) {
                alert("Tên đăng nhập đã tồn tại");
                $("#userName").val("");
            }
        }
    };
    xhttp.open("POST", "checkAdduser.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("userName=" + userName);
});
//kiem tra du lieu nhap vao
function checkAdd() {
    var pass = $('#password').val();
    var checkPass = $('#checkPassword').val();
    if (pass != checkPass) {
        alert("Xác nhận mật khẩu chưa đúng vui lòng kiểm tra lại!");
        $('#checkPassword').val("");
        return false;
    }
    return true;
}
//chinh sua user
function editUser(params) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $("#editUser").html(this.responseText);
        }
    };
    xhttp.open("POST", "editUser.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("userID=" + params);
}

function resetPassword(params) {
    if (confirm("Bạn chắc chắc rằng tài khoản này cần đặt lại mật khẩu?")) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#editUser").html(this.responseText);
            }
        };
        xhttp.open("POST", "resetpass.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("userID=" + params);
    }
}

function sodu(params) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $("#editUser").html(this.responseText);
        }
    };
    xhttp.open("POST", "sodu.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("userID=" + params);
}
//Xoa user
function delUser(params) {
    if (confirm("Bạn chắc chắn muốn xóa tài khoản này?")) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#editUser").html(this.responseText);
            }
        };
        xhttp.open("POST", "del.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("userID=" + params);
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