<html>
	<head>
		<title>Face Detect Sample</title>
	</head>
	<body>
	<?php
		// Replace <Subscription Key> with a valid subscription key.
		$ocpApimSubscriptionKey = '2f4592e0800c4aaaaf5ceb504f62348e';

		// You must use the same location in your REST call as you used to obtain
		// your subscription keys. For example, if you obtained your subscription keys
		// from westus, replace "westcentralus" in the URL below with "westus".
		$uriBase = 'https://eastasia.api.cognitive.microsoft.com/face/v1.0';

		$imageUrl =
			'https://pbs.twimg.com/profile_images/822841847911325697/HavjpWCA_400x400.jpg';

		// This sample uses the PHP5 HTTP_Request2 package
		// (https://pear.php.net/package/HTTP_Request2).
		require_once 'HTTP/Request2.php';

		$request = new Http_Request2($uriBase . '/detect');
		$url = $request->getUrl();

		$headers = array(
			// Request headers
			'Content-Type' => 'application/json',
			'Ocp-Apim-Subscription-Key' => $ocpApimSubscriptionKey
		);
		$request->setHeader($headers);

		$parameters = array(
			// Request parameters
			'returnFaceId' => 'true',
			'returnFaceLandmarks' => 'false',
			'returnFaceAttributes' => 'age,gender,headPose,smile,facialHair,glasses,' .
				'emotion,hair,makeup,occlusion,accessories,blur,exposure,noise');
		$url->setQueryVariables($parameters);

		$request->setMethod(HTTP_Request2::METHOD_POST);

		// Request body parameters
		$body = json_encode(array('url' => $imageUrl));

		// Request body
		$request->setBody($body);

		try
		{
			$response = $request->send();
			echo "<pre>" .
				json_encode(json_decode($response->getBody()), JSON_PRETTY_PRINT) . "</pre>";
		}
		catch (HttpException $ex)
		{
			echo "<pre>" . $ex . "</pre>";
		}
	?>
	</body>
</html>