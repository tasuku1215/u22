<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <title></title>
    <link rel="stylesheet" type="text/css" href="./css/design.css">
</head>

<body>
    <h1>templates/index</h1>
    <article id="video_art">
        <video id="video" autoplay></video>
    </article>
    <article id="button_art">
        <button id="analysis">解析</button>
        <button id="play">再生</button>
    </article>
</body>
<script>
    //動画流す準備
    var video = document.getElementById("video");
    // getUserMedia によるカメラ映像の取得
    var media = navigator.mediaDevices.getUserMedia({
        video: true,
        audio: false,
    });
    //リアルタイムに再生（ストリーミング）させるためにビデオタグに流し込む
    media.then((stream) => {
        video.srcObject = stream;
    });
</script>

</html>