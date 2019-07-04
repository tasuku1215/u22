<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>UPLOAD</title>
        <link rel="stylesheet" type="text/css" href="./css/upload.css">
        <script src="../public/js/jquery-3.3.1.min.js"></script>
        <script src="../public/js/upload.js"></script>
    </head>
    <body>
        <header>
            <h1>UPLOAD</h1>
        </header>

        <form action="" method="post" enctype="multipart/form-data">
            <div id="drag-drop-area">
                <div class="drag-drop-inside">
                    <p class="drag-drop-info">Drop file</p>
                    <p>or</p>
                        Send these files:
                        <input id="fileInput" type="file" name="upfile[]" multiple><br/><br/>
                        <!--        <input type="file" name="upfile[]"/><br/>-->
                        <input type="submit" value="Send files"/>
                </div>
            </div>
        </form>
    </body>
<html>
<?php
if (!empty($_FILES)) {
    for ($i = 0; $i < count($_FILES["upfile"]["tmp_name"]); $i++) {
        if (is_uploaded_file($_FILES["upfile"]["tmp_name"][$i])) {
            $fileName = "files/" . date("[Y-m-d_His]") . $_FILES["upfile"]["name"][$i];
            if (file_exists($fileName) === false) {
                if (move_uploaded_file($_FILES["upfile"]["tmp_name"][$i], $fileName)) {
                    chmod($fileName, 0644);
                    echo $_FILES["upfile"]["name"][$i] . "をアップロードしました。<br>";
                } else {
                    echo "アップロードエラー";
                }
            } else {
                echo "既にファイルが存在します。少し時間をおいてやり直してください。";
            }
        } else {
            echo "ファイルが選択されていません";
        }
    }
}
?>
