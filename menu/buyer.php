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
            <li class="nav-item active"><button id="forVT" class="btn btn-success" type="button">Viettel</button></li>
            <li class="nav-item"><button id="forVN" class="btn btn-info" type="button">Vinaphone</button></li>
            <li class="nav-item"><button id="forMB" class="btn btn-primary" type="button">Mobifone</button></li>
            <li class="nav-item"><button id="forVNM" class="btn btn-secondary" type="button">VNM</button></li>
            <li class="nav-item"><button id="forFs" class="btn btn-danger" type="button">Flash Sale</button>
            </li>
        </ul>
        <div class="btn-group profile">
            <button type="button" class="btn profile btn-light"><?php echo $rowUser["userFullName"]." | ".number_format($rowUser["userSoDu"],0,",",'.')."đ"; ?></button>
            <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
                <button class="dropdown-item btn" id="btn_lsgd" type="button">Lịch Sử Giao Dịch</button>
                <button class="dropdown-item btn" id="btn_tk" type="button">Thống Kê</button>
                <!-- <button class="dropdown-item btn" id="huongDan" type="button">Hướng Dẫn</button> -->
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