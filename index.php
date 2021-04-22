<?php 

    session_start();

    include_once('define/const.php');

    date_default_timezone_set('asia/ho_chi_minh');

?>

<!-- //chinh sua xiu thoi lam gi cang  ha may-->

<!DOCTYPE html>

<html lang="vi">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TLA Card</title>

    <link rel="icon" href="./img/Untitled.png">

    <link rel="stylesheet" type="text/css" href="style.css" />

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"

        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body class="body">

    <?php if(!isset($_SESSION["userID"])) include_once('modal/login.html'); ?>

    <div class="container">

        <?php 

            if(isset($_SESSION["userID"])){

                include_once('banner/banner.html');

                if($_SESSION["userType"]==admin) {

                    include_once('menu/admin.php');

                    echo '<div class="row main" id="admin"></div>';

                }

                if($_SESSION["userType"]==seller){

                    include_once('menu/seller.php');

                    echo '<div class="row main" id="seller"></div>';

                }

                if($_SESSION["userType"]==buyer){

                    include_once('menu/buyer.php');

                    echo '<div class="row" id="buyer"></div>';

                }

                include_once('./footer/footer.html'); 

            }

        ?>

    </div>

</body>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"

    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">

</script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"

    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">

</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"

    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">

</script>

<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script><!-- dataTable JavaScript -->

<!-- Optional JavaScript -->

<script src="myscript.js"></script>



</html>
