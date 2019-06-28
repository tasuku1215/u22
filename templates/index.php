<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <title></title>
    <style>
        video {
            border: 1px solid black;
            width: 95%;
        }
    </style>
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
        video: true, //ビデオを取得する
        //使うカメラをインカメラか背面カメラかを指定する場合には
        //video: { facingMode: "environment" },//背面カメラ
        //video: { facingMode: "user" },//インカメラ
        audio: false, //音声が必要な場合はture
    });
    //リアルタイムに再生（ストリーミング）させるためにビデオタグに流し込む
    media.then((stream) => {
        video.srcObject = stream;
    });
</script>

</html>