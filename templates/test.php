<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <title></title>
    <link rel="stylesheet" type="text/css" href="./../public/js/jquery-3.3.1.min.js">
</head>

<body>
    <!-- HTML -->
    <!-- カメラの準備 -->
    <video id="camera" width="720px" autoplay></video>

    <!-- 記録用canvas -->
    <canvas id="canvas"></canvas>

    <!-- 記録用img -->
    <img id="img">

    <!-- 撮影トリガー 1-->
    <a id="rec" href="#">TAKE PICTURE</a>

    <!-- 撮影トリガー 2-->
    <input type="button" value="REC" onclick="take_picture()">
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