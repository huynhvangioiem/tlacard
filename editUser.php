<!-- log: update: 19/11/2020 status: done! by: TLA -->
<?php 
    if(isset($_POST['userID'])){
        include_once('connection.php');
        $result = mysqli_query($conn,"SELECT * FROM `user` WHERE userID=".$_POST['userID']) or die(mysqli_connect_error($conn));
        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<div class="modal fade" id="modalEditUser" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="modalAddLabel">Chỉnh Sửa Thông Tin User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="update.php" enctype="multipart/form-data"
                name="formEditUser" id="formEditUser" class="formEditUser">
                <div class="modal-body">
                    <div class="form-group  row">
                        <label for="nhaMang" class="col-sm-4 col-form-label">UserName:</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="userID" id="userID" class="form-control" value="<?php echo $row['userID'] ?>">
                            <input type="text" name="userName" disabled id="userName" class="form-control" value="<?php echo $row['userName'] ?>">
                        </div>
                    </div>
                    <div class="form-group  row">
                        <label for="nhaMang" class="col-sm-4 col-form-label">Họ Tên:</label>
                        <div class="col-sm-8">
                            <input type="text" name="Name" id="Name" class="form-control" value="<?php echo $row['userFullName'] ?>" required="required"
                                placeholder="Vui lòng nhập họ và tên!">
                        </div>
                    </div>
                    <div class="form-group  row">
                        <label for="nhaMang" class="col-sm-4 col-form-label">SĐT:</label>
                        <div class="col-sm-8">
                            <input type="tel" name="sdt" id="sdt" class="form-control" value="<?php echo $row['userSDT'] ?>" required="required"
                                placeholder="Vui lòng nhập tên đăng nhập!" pattern="^0[0-9]{9}$"
                                title="Vui lòng nhập vào số điện thoại Việt Nam hợp lệ!">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input" class="col-sm-4 control-label">Loại Tài Khoản:</label>
                        <div class="col-sm-8">
                            <select name="userType" id="userType" disabled class="form-control">
                                <option value="">-- Select One --</option>
                                <option value="-1" <?php if($row['userType']==-1) echo "selected" ?>>admin - Quản trị viên</option>
                                <option value="0" <?php if($row['userType']==0) echo "selected" ?>>buyer - Người mua</option>
                                <option value="1" <?php if($row['userType']==1) echo "selected" ?>>seller - Người bán</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group  row">
                        <label for="nhaMang" class="col-sm-4 col-form-label">Chiết Khấu (%):</label>
                        <div class="col-sm-8">
                            <input type="number" name="chietKhau" id="chietKhau" class="form-control" value="<?php echo $row['userChietKhau'] ?>"
                                required="required" min="0" max="100" placeholder="Vui lòng nhập số % chiết khấu!"
                                title="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" name="btnEditUser" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#modalEditUser').modal({
        backdrop: 'static'
    });
</script>
<?php
    }else{
        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }
?>