<?php
header('content-type: application/json; charset=utf-8');

$result_array = [];
$result_array["msg"] = 'success!';

if (isset($_GET['image_url']) && $_GET['image_url'] != '') {
	$send_json = json_encode($_GET);

	// faceAPIに飛ばす
	
	// 帰ってきた表情jsonを楽曲マッピングデータの関数に飛ばす
	
	// 帰ってきた楽曲タイトルを返す

	$send_json = json_encode(array('ttl' => 'test_title'));
	$result_array = array_merge($result_array, json_decode($send_json, true));	// 第2引数trueで戻り値を連想配列化
}
else {
	$result_array["msg"] = 'error: image_url is required';
}

echo json_encode($result_array);