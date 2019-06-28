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
    <video id="video" autoplay></video>
    <h2>PCのカメラをjsで起動する方法がわからんw</h2>
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