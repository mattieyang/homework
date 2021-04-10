<?php
$content = $_POST['content'];
$username = $_POST['username'];

if( trim($content) == '' or trim($username) == '' ){
    echo '用户名、留言内容不能为空';
    exit;
}
if($username =='admin'||$username=='root'||$username=='习近平'){
    echo'用户名不能为敏感词';
    exit;
}

include('db.php');

$sql = "insert into msg (username,content) values ('{$username}', '{$content}')";
$sth = $pdo->prepare($sql);
$sth->execute();

header('location:bootstrap.php');
?>