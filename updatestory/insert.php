<?php
//1. POSTデータ取得
$hero   = $_POST["hero"];
$setting  = $_POST["setting"];
$first_scene = $_POST["first_scene"];
$choice1_text   = $_POST["choice1_text"];
$choice2_text    = $_POST["choice2_text"];


//2. DB接続します
include("funcs.php");
$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_cm_table(hero,setting,first_scene,choice1_text,choice2_text)VALUES(:hero,:setting,:first_scene,:choice1_text,:choice2_text");
$stmt->bindValue(':hero',   $hero,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':setting',  $setting,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':first_scene',    $age,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':choice1_text', $choice1_text, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':choice2_text', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect("index.php");
}

