<?php 
// 判断请求方式
if($_SERVER['REQUEST_METHOD']==='post'){
	var_dump($_POST);
}

// 当前页面
echo $_SERVER['PHP_SELF'];  

// 表单中使用radio一定要为相同的name设置不同的value  让服务端可以辨别  未选中不提交
// checkbox未选中不提交 选中提交value  如果多选 name+[] 接收的数组
// select 默认提交value  没有value 提交文本