//hien thi login form

$('#loginModal').modal({

    backdrop: 'static'

});

//function

function adForUser() {

    var xhttp;

    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            $("#admin").html(this.responseText);

        }

    };

    xhttp.open("POST", "userManagement.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send("userType=admin");

}

function listcard() {

    var xhttp;

    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            $("#seller").html(this.responseText);

        }

    };

    xhttp.open("POST", "listCards.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send("userType=sller");

}

function listcardForAd() {

    var xhttp;

    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            $("#admin").html(this.responseText);

        }

    };

    xhttp.open("POST", "./listcardForAd.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send("userType=admin");

}

function buyer(mang) {

    var xhttp;

    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            $("#buyer").html(this.responseText);

        }

    };

    xhttp.open("POST", "./buy.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send("mang="+mang);

}

function lsgd() {

    var xhttp;

    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            $("#admin,#seller,#buyer").html(this.responseText);

        }

    };

    xhttp.open("POST", "./lichSuGiaoDich.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send("userType=all");

}

function thongKe() {

    var xhttp;

    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            $("#seller,#buyer,#admin").html(this.responseText);

        }

    };

    xhttp.open("POST", "./thongke.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send("userType=all");

}

function resetPassword(params) {

    if (confirm("Bạn chắc chắc rằng tài khoản này cần đặt lại mật khẩu?")) {

        var xhttp;

        xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                $("#seller,#buyer").html(this.responseText);

            }

        };

        xhttp.open("POST", "resetpass.php", true);

        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhttp.send("userID=" + params);

    }

}

$(document).ready(function (e) {

    //hien thi noi dung quan tri khi loadded

    listcard();

    listcardForAd();

    buyer("all");

    //ajax hien thi admin_For_user khi click btn

    $("#btnUser").click(function () {

        adForUser();

    });

    //hien thi lich su gia dich khi click btn_lsgd

    $("#btn_lsgd").click(function () {

        lsgd();

    });

    $("#btn_tk").click(function () {
        thongKe();

    });

    //sort buyer card

    $('#forVT').click(function (e) {

        buyer("VT");

    })

    $('#forVN').click(function (e) {

        buyer("VN");

    })

    $('#forMB').click(function (e) {

        buyer("MB");

    })

    $('#forVNM').click(function (e) {

        buyer("VNM");

    })

    $('#forFs').click(function (e) {

        buyer("Fs");

    })

    /*

    //CountdownTimer

    var countDownDate = new Date("2020-09-10 15:00:00").getTime();

    var x = setInterval(function () {

        var now = new Date().getTime();

        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));

        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        hours = hours + days * 24;

        if (hours < 10) hours = "0" + hours;

        if (minutes < 10) minutes = "0" + minutes;

        if (seconds < 10) seconds = "0" + seconds;

        $('#Countdown').text(hours + ":" + minutes + ":" + seconds);

    }, 1000);

    */



});