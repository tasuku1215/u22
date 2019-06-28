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

	function processImage() {
		// Replace <Subscription Key> with your valid subscription key.
		var subscriptionKey = "2f4592e0800c4aaaaf5ceb504f62348e";

		// NOTE: You must use the same region in your REST call as you used to
		// obtain your subscription keys. For example, if you obtained your
		// subscription keys from westus, replace "westcentralus" in the URL
		// below with "westus".
		//
		// Free trial subscription keys are generated in the "westus" region.
		// If you use a free trial subscription key, you shouldn't need to change
		// this region.
		var uriBase =
			"https://westcentralus.api.cognitive.microsoft.com/face/v1.0/detect";

		// Request parameters.
		var params = {
			"returnFaceId": "true",
			"returnFaceLandmarks": "false",
			"returnFaceAttributes":
				"age,gender,headPose,smile,facialHair,glasses,emotion," +
				"hair,makeup,occlusion,accessories,blur,exposure,noise"
		};

		// Display the image.
		var sourceImageUrl = document.getElementById("inputImage").value;
		document.querySelector("#sourceImage").src = sourceImageUrl;

		// Perform the REST API call.
		$.ajax({
			url: uriBase + "?" + $.param(params),

			// Request headers.
			beforeSend: function(xhrObj){
				xhrObj.setRequestHeader("Content-Type","application/json");
				xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key", subscriptionKey);
			},

			type: "POST",

			// Request body.
			data: '{"url": ' + '"' + sourceImageUrl + '"}',
		})

		.done(function(data) {
			// Show formatted JSON on webpage.
			$("#responseTextArea").val(JSON.stringify(data, null, 2));
		})

		.fail(function(jqXHR, textStatus, errorThrown) {
			// Display error message.
			var errorString = (errorThrown === "") ?
				"Error. " : errorThrown + " (" + jqXHR.status + "): ";
			errorString += (jqXHR.responseText === "") ?
				"" : (jQuery.parseJSON(jqXHR.responseText).message) ?
					jQuery.parseJSON(jqXHR.responseText).message :
						jQuery.parseJSON(jqXHR.responseText).error.message;
			alert(errorString);
		});
	};
</script>

</html>