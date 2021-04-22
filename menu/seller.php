<!-- log: update: 19/11/2020 status: coding! by: TLA -->
<?php
    if(isset($_SESSION['userID'])) {
        include_once('connection.php');
        $user = mysqli_query($conn,"Select * From user Where userID=".$_SESSION['userID']) or die(mysqli_connect_error($conn));
        $rowUser=mysqli_fetch_array($user,MYSQLI_ASSOC);

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-warning menu">
    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="my-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a href="./"><button id="" class="btn btn-success" type="button">Trang Chủ</button></a></li>
            <li class="nav-item"><button id="btn_lsgd" class="btn btn-primary" type="button">LS Giao Dịch</button></li>
            <li class="nav-item"><button id="btn_tk" class="btn btn-info" type="button">Thống Kê</button></li>
            <!-- <li class="nav-item"><button id="huongDan" class="btn btn-secondary" type="button">Hướng Dẫn</button></li> -->
        </ul>
        <div class="btn-group profile">
            <button type="button" class="btn profile btn-light"><?php echo $rowUser["userFullName"]." | ".number_format($rowUser["userSoDu"],0,",",'.')."đ"; ?></button>
            <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
                <button class="dropdown-item btn" name="btnresetpass" type="button" onclick="return resetPassword(<?php echo $_SESSION['userID'] ?>)">Đổi mật khẩu</button>
                <form action="logout.php" method="post"><button class="dropdown-item btn" name="btnLogOut" type="submit">Đăng xuất</button></form>
            </div>
        </div>
    </div>
</nav>
<?php 
    }else{
        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=../" />';
    }
?>