<?php 
    if(isset($_POST['userID'])){
        include_once('connection.php');
        include_once('./define/funtion.php');
        include_once('define/const.php');
        $result = mysqli_query($conn,"SELECT * FROM `user` WHERE userID=".$_POST['userID']) or die(mysqli_connect_error($conn));
        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
        switch ($row['userType']) {
            case buyer:
?>
<!-- nap -->
<div class="modal fade" id="modalQlSodu" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="modalAddLabel">Nạp tiền cho tài khoản: <?php echo $row['userName'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="./sodu.php" enctype="multipart/form-data" name="formSodu" id="formSodu" class="formSodu">
                <div class="modal-body">
                    <div class="form-group  row">
                        <label for="nhaMang" class="col-sm-4 col-form-label">UserName:</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="userID" id="userID" class="form-control"
                                value="<?php echo $row['userID'] ?>">
                            <input type="text" name="userName" disabled id="userName" class="form-control"
                                value="<?php echo $row['userName'] ?>">
                        </div>
                    </div>
                    <div class="form-group  row">
                        <label for="nhaMang" class="col-sm-4 col-form-label">Số tiền:</label>
                        <div class="col-sm-8">
                            <input type="number" name="sotien" id="sotien" class="form-control" value=""
                                required="required" min="50000" placeholder="nhập vào số tiền cần nạp!">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btnSodu" class="btn btn-primary">Nạp</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
                //xu ly nap
                if(isset($_POST['btnSodu'])){
                    $sotien= $_POST["sotien"];
                    $userID= $_POST["userID"];
                    congSoDu($sotien,$userID,$conn);
                    congSoDu($sotien,1,$conn);
                    lichSuGiaoDich(CongSoDu,$sotien,$userID,NULL,$conn);
                    echo '<script>alert("Nạp tiền thành công!");</script>';
                    echo '<meta http-equiv="refresh" content="0;URL=./" />';
                }
                break;
            case seller:
?>
                <!-- rut -->
<div class="modal fade" id="modalQlSodu" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="modalAddLabel">Rút tiền cho tài khoản: <?php echo $row['userName'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="./sodu.php" enctype="multipart/form-data" name="formSodu" id="formSodu" class="formSodu">
                <div class="modal-body">
                    <div class="form-group  row">
                        <label for="nhaMang" class="col-sm-4 col-form-label">UserName:</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="userID" id="userID" class="form-control"
                                value="<?php echo $row['userID'] ?>">
                            <input type="text" name="userName" disabled id="userName" class="form-control"
                                value="<?php echo $row['userName'] ?>">
                        </div>
                    </div>
                    <div class="form-group  row">
                        <label for="nhaMang" class="col-sm-4 col-form-label">Số tiền:</label>
                        <div class="col-sm-8">
                            <input type="number" name="sotien" id="sotien" class="form-control" value=""
                                required="required" min="50000" placeholder="nhập vào số tiền cần rút!">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btnSodu" class="btn btn-primary">Rút</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
                //xu ly rut
                if(isset($_POST['btnSodu'])){
                    $sotien= $_POST["sotien"];
                    $userID= $_POST["userID"];
                    if(truSoDu($sotien,$userID,$conn)){
                        truSoDu($sotien,1,$conn);
                        lichSuGiaoDich(TruSoDu,$sotien,$userID,NULL,$conn);
                        echo '<script>alert("Rút tiền thành công!");</script>';
                        echo '<meta http-equiv="refresh" content="0;URL=./" />';
                    }else{
                        echo '<script>alert("Thất bại! Số dư tài khoản không đủ để thực hiện.");</script>';
                        echo '<meta http-equiv="refresh" content="0;URL=./" />';
                    }
                }
                break;
            default:
                echo '<script>alert("Không thể thực hiện đối với admin!");</script>';
                break;
        }
?>
<script>
$('#modalQlSodu').modal({
    backdrop: 'static'
});
</script>
<?php
    }else{
        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }
?>