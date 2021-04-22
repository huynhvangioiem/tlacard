<?php
    session_start();
    if(isset($_POST['mang'])){
        include_once('define/const.php');
        if($_SESSION['userType']==buyer){
            include_once('connection.php');
            $resultUser = mysqli_query($conn,"SELECT * FROM `user` WHERE `userID`=".$_SESSION['userID']) or die(mysqli_connect_error($conn));
            $rowUser=mysqli_fetch_array($resultUser,MYSQLI_ASSOC);
?>
<div id="detail"></div>
<div class="col-sm-12">
    <!-- <div class="row main Fs">
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vt10.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Bắt đầu sau: <span id="Countdown"></span></div>
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 8.000đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 2.000đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning">Đặt Mua</button>
                </div>
            </div>
        </div>
    </div> -->
    <div class="row main VT">
        <!-- VT 10K -->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardNhaMang`='".Viettel."' AND `cardStatus`=".daduyet." AND  `cardMenhGia`= 10000") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($result)==0){
        ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vt10.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 9.700đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 300đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning" onclick="return datmua('VT10');">Đặt Mua</button>
                </div>
            </div>
        </div>
        <?php 
        }else{
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowUser['userChietKhau']/100;
            $von=$row['cardMenhGia']-$ck;
        ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vt10.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: <?php echo number_format($von,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: <?php echo number_format($ck,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success"
                        onclick="return getMa(<?php echo $row['cardID']; ?>);">Lấy Mã</button>
                </div>
                <span class="kho">SL: <?php echo mysqli_num_rows($result); ?></span>
            </div>
        </div>
        <?php
        }
        ?>
        <!-- VT 20K -->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardNhaMang`='".Viettel."' AND `cardStatus`=".daduyet." AND  `cardMenhGia`= 20000") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($result)==0){
        ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vt20.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 19.300đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 700đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning" onclick="return datmua('VT20');">Đặt Mua</button>
                </div>
            </div>
        </div>
        <?php 
        }else{
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowUser['userChietKhau']/100;
            $von=$row['cardMenhGia']-$ck;
        ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vt20.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: <?php echo number_format($von,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: <?php echo number_format($ck,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success"
                        onclick="return getMa(<?php echo $row['cardID']; ?>);">Lấy Mã</button>
                </div>
                <span class="kho">SL: <?php echo mysqli_num_rows($result); ?></span>
            </div>
        </div>
        <?php
        }
        ?>
        <!-- VT 50K -->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardNhaMang`='".Viettel."' AND `cardStatus`=".daduyet." AND  `cardMenhGia`= 50000") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($result)==0){
        ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vt50.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 48.250đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 1.750đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning" onclick="return datmua('VT50');">Đặt Mua</button>
                </div>
            </div>
        </div>
        <?php 
        }else{
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowUser['userChietKhau']/100;
            $von=$row['cardMenhGia']-$ck;
        ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vt50.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: <?php echo number_format($von,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: <?php echo number_format($ck,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success"
                        onclick="return getMa(<?php echo $row['cardID']; ?>);">Lấy Mã</button>
                </div>
                <span class="kho">SL: <?php echo mysqli_num_rows($result); ?></span>
            </div>
        </div>
        <?php
        }
        ?>
        <!-- VT 100K -->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardNhaMang`='".Viettel."' AND `cardStatus`=".daduyet." AND  `cardMenhGia`= 100000") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($result)==0){
        ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vt100.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 96.500đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 3.500đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning" onclick="return datmua('VT100');">Đặt Mua</button>
                </div>
            </div>
        </div>
        <?php 
        }else{
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowUser['userChietKhau']/100;
            $von=$row['cardMenhGia']-$ck;
        ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vt100.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: <?php echo number_format($von,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: <?php echo number_format($ck,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success"
                        onclick="return getMa(<?php echo $row['cardID']; ?>);">Lấy Mã</button>
                </div>
                <span class="kho">SL: <?php echo mysqli_num_rows($result); ?></span>
            </div>
        </div>
        <?php
        }
    ?>
    </div>
    <div class="row main VN">
        <!-- vn 10K -->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardNhaMang`='".Vinaphone."' AND `cardStatus`=".daduyet." AND  `cardMenhGia`= 10000") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($result)==0){
        ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vn10.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 9.700đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 300đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning" onclick="return datmua('VN10');">Đặt Mua</button>
                </div>
            </div>
        </div>
        <?php 
        }else{
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowUser['userChietKhau']/100;
            $von=$row['cardMenhGia']-$ck;
        ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vn10.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: <?php echo number_format($von,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: <?php echo number_format($ck,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success"
                        onclick="return getMa(<?php echo $row['cardID']; ?>);">Lấy Mã</button>
                </div>
                <span class="kho">SL: <?php echo mysqli_num_rows($result); ?></span>
            </div>
        </div>
        <?php
        }
    ?>
        <!-- vn 20K -->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardNhaMang`='".Vinaphone."' AND `cardStatus`=".daduyet." AND  `cardMenhGia`= 20000") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($result)==0){
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vn20.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 19.300đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 700đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning" onclick="return datmua('VN20');">Đặt Mua</button>
                </div>
            </div>
        </div>
        <?php 
        }else{
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowUser['userChietKhau']/100;
            $von=$row['cardMenhGia']-$ck;
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vn20.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: <?php echo number_format($von,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: <?php echo number_format($ck,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success"
                        onclick="return getMa(<?php echo $row['cardID']; ?>);">Lấy Mã</button>
                </div>
                <span class="kho">SL: <?php echo mysqli_num_rows($result); ?></span>
            </div>
        </div>
        <?php
        }
    ?>
        <!-- vn 50K -->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardNhaMang`='".Vinaphone."' AND `cardStatus`=".daduyet." AND  `cardMenhGia`= 50000") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($result)==0){
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vn50.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 48.250đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 1.750đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning" onclick="return datmua('VN50');">Đặt Mua</button>
                </div>
            </div>
        </div>
        <?php 
        }else{
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowUser['userChietKhau']/100;
            $von=$row['cardMenhGia']-$ck;
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vn50.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: <?php echo number_format($von,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: <?php echo number_format($ck,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success"
                        onclick="return getMa(<?php echo $row['cardID']; ?>);">Lấy Mã</button>
                </div>
                <span class="kho">SL: <?php echo mysqli_num_rows($result); ?></span>
            </div>
        </div>
        <?php
        }
    ?>
        <!-- vn 100K -->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardNhaMang`='".Vinaphone."' AND `cardStatus`=".daduyet." AND  `cardMenhGia`= 100000") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($result)==0){
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vn100.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 96.500đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 3.500đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning" onclick="return datmua('VN100');">Đặt Mua</button>
                </div>
            </div>
        </div>
        <?php 
        }else{
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowUser['userChietKhau']/100;
            $von=$row['cardMenhGia']-$ck;
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vn100.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: <?php echo number_format($von,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: <?php echo number_format($ck,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success"
                        onclick="return getMa(<?php echo $row['cardID']; ?>);">Lấy Mã</button>
                </div>
                <span class="kho">SL: <?php echo mysqli_num_rows($result); ?></span>
            </div>
        </div>
        <?php
        }
    ?>
    </div>
    <div class="row main MB">
        <!-- mb 10K -->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardNhaMang`='".Mobifone."' AND `cardStatus`=".daduyet." AND  `cardMenhGia`= 10000") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($result)==0){
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/mb10.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 9.700đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 300đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning" onclick="return datmua('MB10');">Đặt Mua</button>
                </div>
            </div>
        </div>
        <?php 
        }else{
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowUser['userChietKhau']/100;
            $von=$row['cardMenhGia']-$ck;
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/mb10.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: <?php echo number_format($von,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: <?php echo number_format($ck,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success"
                        onclick="return getMa(<?php echo $row['cardID']; ?>);">Lấy Mã</button>
                </div>
                <span class="kho">SL: <?php echo mysqli_num_rows($result); ?></span>
            </div>
        </div>
        <?php
        }
    ?>
        <!-- mb 20K -->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardNhaMang`='".Mobifone."' AND `cardStatus`=".daduyet." AND  `cardMenhGia`= 20000") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($result)==0){
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/mb20.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 19.300đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 700đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning" onclick="return datmua('MB20');">Đặt Mua</button>
                </div>
            </div>
        </div>
        <?php 
        }else{
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowUser['userChietKhau']/100;
            $von=$row['cardMenhGia']-$ck;
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/mb20.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: <?php echo number_format($von,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: <?php echo number_format($ck,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success"
                        onclick="return getMa(<?php echo $row['cardID']; ?>);">Lấy Mã</button>
                </div>
                <span class="kho">SL: <?php echo mysqli_num_rows($result); ?></span>
            </div>
        </div>
        <?php
        }
    ?>
        <!-- mb 50K -->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardNhaMang`='".Mobifone."' AND `cardStatus`=".daduyet." AND  `cardMenhGia`= 50000") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($result)==0){
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/mb50.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 48.250đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 1.750đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning" onclick="return datmua('MB50');">Đặt Mua</button>
                </div>
            </div>
        </div>
        <?php 
        }else{
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowUser['userChietKhau']/100;
            $von=$row['cardMenhGia']-$ck;
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/mb50.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: <?php echo number_format($von,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: <?php echo number_format($ck,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success"
                        onclick="return getMa(<?php echo $row['cardID']; ?>);">Lấy Mã</button>
                </div>
                <span class="kho">SL: <?php echo mysqli_num_rows($result); ?></span>
            </div>
        </div>
        <?php
        }
    ?>
        <!-- mb 100K -->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardNhaMang`='".Mobifone."' AND `cardStatus`=".daduyet." AND  `cardMenhGia`= 100000") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($result)==0){
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/mb100.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 96.500đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 3.500đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning" onclick="return datmua('MB100');">Đặt Mua</button>
                </div>
            </div>
        </div>
        <?php 
        }else{
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowUser['userChietKhau']/100;
            $von=$row['cardMenhGia']-$ck;
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/mb100.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: <?php echo number_format($von,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: <?php echo number_format($ck,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success"
                        onclick="return getMa(<?php echo $row['cardID']; ?>);">Lấy Mã</button>
                </div>
                <span class="kho">SL: <?php echo mysqli_num_rows($result); ?></span>
            </div>
        </div>
        <?php
        }
    ?>
    </div>
    <div class="row main VNM">
        <!-- vnm 10K -->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardNhaMang`='".Vietnamobile."' AND `cardStatus`=".daduyet." AND  `cardMenhGia`= 10000") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($result)==0){
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vnm10.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 9.700đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 300đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning" onclick="return datmua('VNM10');">Đặt Mua</button>
                </div>
            </div>
        </div>
        <?php 
        }else{
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowUser['userChietKhau']/100;
            $von=$row['cardMenhGia']-$ck;
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vnm10.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: <?php echo number_format($von,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: <?php echo number_format($ck,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success"
                        onclick="return getMa(<?php echo $row['cardID']; ?>);">Lấy Mã</button>
                </div>
                <span class="kho">SL: <?php echo mysqli_num_rows($result); ?></span>
            </div>
        </div>
        <?php
        }
    ?>
        <!-- vnm 20K -->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardNhaMang`='".Vietnamobile."' AND `cardStatus`=".daduyet." AND  `cardMenhGia`= 20000") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($result)==0){
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vnm20.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 19.300đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 700đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning" onclick="return datmua('VNM20');">Đặt Mua</button>
                </div>
            </div>
        </div>
        <?php 
        }else{
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowUser['userChietKhau']/100;
            $von=$row['cardMenhGia']-$ck;
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vnm20.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: <?php echo number_format($von,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: <?php echo number_format($ck,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success"
                        onclick="return getMa(<?php echo $row['cardID']; ?>);">Lấy Mã</button>
                </div>
                <span class="kho">SL: <?php echo mysqli_num_rows($result); ?></span>
            </div>
        </div>
        <?php
        }
    ?>
        <!-- vnm 50K -->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardNhaMang`='".Vietnamobile."' AND `cardStatus`=".daduyet." AND  `cardMenhGia`= 50000") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($result)==0){
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vnm50.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 48.250đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 1.750đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning" onclick="return datmua('VNM50');">Đặt Mua</button>
                </div>
            </div>
        </div>
        <?php 
        }else{
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowUser['userChietKhau']/100;
            $von=$row['cardMenhGia']-$ck;
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vnm50.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: <?php echo number_format($von,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: <?php echo number_format($ck,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success"
                        onclick="return getMa(<?php echo $row['cardID']; ?>);">Lấy Mã</button>
                </div>
                <span class="kho">SL: <?php echo mysqli_num_rows($result); ?></span>
            </div>
        </div>
        <?php
        }
    ?>
        <!-- vnm 100K -->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `card` WHERE `cardNhaMang`='".Vietnamobile."' AND `cardStatus`=".daduyet." AND  `cardMenhGia`= 100000") or die(mysqli_connect_error($conn));
        if(mysqli_num_rows($result)==0){
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vnm100.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: 96.500đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: 3.500đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-warning" onclick="return datmua('VNM100');">Đặt Mua</button>
                </div>
            </div>
        </div>
        <?php 
        }else{
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $ck=($row['cardMenhGia']-$row['cardGiaGoc'])*$rowUser['userChietKhau']/100;
            $von=$row['cardMenhGia']-$ck;
    ?>
        <div class="col-sm-2 item text-center">
            <div class="row">
                <img class="rounded img-fluid" src="./img/vnm100.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm">Vốn: <?php echo number_format($von,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">LNTT: <?php echo number_format($ck,0,",",'.'); ?>đ</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success"
                        onclick="return getMa(<?php echo $row['cardID']; ?>);">Lấy Mã</button>
                </div>
                <span class="kho">SL: <?php echo mysqli_num_rows($result); ?></span>
            </div>
        </div>
        <?php
        }
    ?>
    </div>
</div>
<script>
function getMa(id) {
    if (confirm("Sau khi bấm 'OK' thẻ cào này sẽ được tính cho bạn. Bạn chắc chắn muốn mua thẻ cào này?")) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#detail").html(this.responseText);
            }
        };
        xhttp.open("POST", "./getMa.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cardID=" + id);
    }
}

function datmua(params) {
    if (confirm("Bạn đang cần thẻ cào " + params + ". Bạn muốn đặt mua nó?")) {
        alert('Tính năng đang trong quá trình phát triển, vui lòng quay lại sau!');
    }
}
<?php 
    if($_POST['mang']=="VT") echo "$('.VN, .MB, .VNM, .Fs').hide(); $('.VT').show();";
    if($_POST['mang']=="VN") echo "$('.VT, .MB, .VNM, .Fs').hide(); $('.VN').show();";
    if($_POST['mang']=="MB") echo "$('.VN, .VT, .VNM, .Fs').hide(); $('.MB').show();";
    if($_POST['mang']=="VNM") echo "$('.VN, .MB, .VT, .Fs').hide(); $('.VNM').show();";
    if($_POST['mang']=="Fs") echo "$('.VN, .MB, .VT, .VNM').hide(); $('.Fs').show();";
?>
</script>
<?php
        }
    }else{
        echo '<script>alert("Trang web không khả dụng. Vui lòng quay lại!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=./" />';
    }
?>