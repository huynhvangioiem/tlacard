<?php
    session_start();
    if(isset($_POST['userID'])){
        include_once('connection.php');
        $result = mysqli_query($conn,"SELECT * FROM `user` WHERE userID=".$_POST['userID']) or die(mysqli_connect_error($conn));
        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<div class="modal fade" id="modalResetpass" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="modalAddLabel">Đổi Mật Khẩu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="./resetpass.php" enctype="multipart/form-data" onsubmit="return checkData();" name="formResetpass" id="formResetpass" class="formResetpass">
                <div class="modal-body">
                    <div class="form-group  row">
                        <label for="nhaMang" class="col-sm-4 col-form-label">UserName:</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="userID" id="userID" class="form-control" value="<?php echo $row['userID'] ?>">
                            <input type="text" name="userName" disabled id="userName" class="form-control" value="<?php echo $row['userName'] ?>">
                        </div>
                    </div>
                    <div class="form-group  row">
                        <label for="nhaMang" class="col-sm-4 col-form-label">Mật Khẩu Mới:</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" id="password" class="form-control" value=""
                                required="required" placeholder="Vui lòng nhập mật khẩu mới!" pattern="^[a-z0-9_-]{8,16}$"
                                title="Bao gồm chữ cái viết thường và chữ số, độ dài từ 8 đến 16 ký tự!">
                        </div>
                    </div>
                    <div class="form-group  row">
                        <label for="nhaMang" class="col-sm-4 col-form-label">Check Mật Khẩu:</label>
                        <div class="col-sm-8">
                            <input type="password" name="checkPassword" id="checkPassword" class="form-control" value=""
                                required="required" placeholder="Vui lòng nhập lại mật khẩu!">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btnResetpass" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#modalResetpass').modal({
        backdrop: 'static'
    });
    function checkData() {
        var pass = $('#password').val();
        var checkPass = $('#checkPassword').val();
        if (pass != checkPass) {
            alert("Xác nhận mật khẩu chưa đúng vui lòng kiểm tra lại!");
            $('#checkPassword').val("");
            return false;
        }
        return true;
    }
</script>
<?php
        if(isset($_POST['btnResetpass'])){
            $pass= $_POST["password"];
            $pass=md5($pass);
            mysqli_query($conn,"UPDATE `user` SET `userPassword`='$pass' WHERE `userID`=".$_POST['userID']) or die(mysqli_connect_error($conn));
            echo '<script>alert("Đổi mật khẩu thành công!");</script>';
            echo '<meta http-equiv="refresh" content="0;URL=./" />';
            if($_POST['userID']==$_SESSION['userID']) session_destroy();
        }
    }else{
        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }
?>