<?php 
function denglu (){
if(empty($_POST['username'])){
$GLOBALS['message']='请输入用户名';
return;
}
if(empty($_POST['password'])){
	$GLOBALS['message']='请输入密码';
	return;
}
  $username = $_POST["username"];
  $password = $_POST["password"];
  $text = file_get_contents('zhuce.txt');
  $array = explode("\n",$text);
  $count = count($array);
  for($i = 0 ; $i < $count ; $i++){          
            $inarray = explode("|",$array[$i]);
            if($username == $inarray[0]) {
                if($password == $inarray[1]) {
                    $GLOBALS['message']='登陆成功';
                    return;
                }else {
                    $GLOBALS['message'] = '密码错误';
                    return;
                }
            } else {
                $GLOBALS['message'] = '用户名不存在';
            }
        }

    }
if($_SERVER['REQUEST_METHOD']==='POST'){
	denglu();
}


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
	input{
		border: 0;
		outline: none
	}
	</style>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	<table border="1" cellspacing="0">
		<tr>
			<td><label for="username">用户名</label></td>
			<td><input type="text" name="username" id="username" value="<?php echo isset($_POST['username'])? $_POST['username']: '' ?>"></td>
		</tr>
		<tr>
			<td><label for="password">密码</label></td>
			<td><input type="password" name="password" id="password"></td>
		</tr>
		<tr>
			<td></td>
			<td><button>登录</button></td>
		</tr>
	<?php if (isset($message)): ?>
		<tr>
			<td><?php echo $message; ?></td>
		</tr>
	<?php endif ?>
	</table>
</form>
</body>
</html>