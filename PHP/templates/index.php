<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="author" content="">
		<title></title>
		<link rel="stylesheet" type="text/css" href="./css/design.css">
		<script src="../public/js/jquery-3.3.1.min.js"></script>
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

		<h1>Detect Faces:</h1>
		Enter the URL to an image that includes a face or faces, then click
		the <strong>Analyze face</strong> button.<br><br>
		Image to analyze: <input type="text" name="inputImage" id="inputImage"
			value="https://upload.wikimedia.org/wikipedia/commons/c/c3/RH_Louise_Lillian_Gish.jpg" />
		<button onclick="processImage()">Analyze face</button><br><br>
		<div id="wrapper" style="width:1020px; display:table;">
			<div id="jsonOutput" style="width:600px; display:table-cell;">
				Response:<br><br>
				<textarea id="responseTextArea" class="UIInput"
					style="width:580px; height:400px;"></textarea>
			</div>
			<div id="imageDiv" style="width:420px; display:table-cell;">
				Source image:<br><br>
				<img id="sourceImage" width="400" />
			</div>
		</div>

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
