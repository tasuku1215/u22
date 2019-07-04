<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <title></title>
    <link rel="stylesheet" type="text/css" href="./../public/js/jquery-3.3.1.min.js">
    <style>
        canvas {
            display: none;
        }

        video {
            margin-left: -3000px;
        }

        img {
            position: absolute;
            top: 0px;
            left: 0px;
        }

        input {
            position: absolute;
            top: 300px;
            left: 300px;
        }
    </style>
</head>

<body>
    <!-- HTML -->
    <!-- カメラの準備 -->
    <video id="camera" width="300px" autoplay></video>

    <!-- 記録用canvas -->
    <canvas id="canvas"></canvas>

    <!-- 記録用img -->
    <img id="img">

    <!-- 撮影トリガー 1-->
    <a id="rec" href="#">TAKE PICTURE</a>

    <!-- 撮影トリガー 2-->
    <input type="button" value="REC" onclick="take_picture()">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.contents').hide();
            $('.more').on('click', function() {
                if (!$('.contents').hasClass('open')) {
                    $('.contents').slideDown('').addClass('open');
                    $('.more').text('Close');
                } else {
                    $('.contents').slideUp().removeClass('open');
                    $('.more').text('Choose');
                }
            });
        });
    </script>
    <p>表示しておくコンテンツ</p>
    <div class="contents">
        <img src="./../img/真顔.png" alt="">
        <img src="./../img/笑顔.png" alt="">
        <img src="./../img/怒り.png" alt="">
        <img src="./../img/泣顔.png" alt="">
        <img src="./../img/イタズラ顔.png" alt="">
    </div>
    <a class="more" href="#">Choose</a>
</body>

<script>
    //Javascript
    //video element
    var video = document.getElementById('camera');

    // getUserMedia によるカメラ映像の取得
    var media = navigator.mediaDevices.getUserMedia({
        video: true,
        audio: false,
    });
    //リアルタイムに再生（ストリーミング）させるためにビデオタグに流し込む
    media.then((stream) => {
        video.srcObject = stream;
    });

    //video element（プレビュー画面）をクリックして撮影
    video.addEventListener("click", function() {
        take_picture()
    });

    //テキストクリック撮影（撮影トリガー 1）
    $("#rec").click(function() {
        take_picture()
    });

    //撮影関数
    function take_picture() {
        //videoのstreamをcanvasに書き出す方法
        var canvas = document.getElementById('canvas');
        var ctx = canvas.getContext('2d');
        //videoの縦幅横幅を取得
        var w = video.offsetWidth;
        var h = video.offsetHeight;
        canvas.setAttribute("width", w);
        canvas.setAttribute("height", h);
        ctx.drawImage(video, 0, 0, w, h);

        //canvasを更にimgに書き出す方法
        var img = document.getElementById('img');
        img.src = canvas.toDataURL('image/png');
    }
</script>

</html>