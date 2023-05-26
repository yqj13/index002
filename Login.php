<?php
session_start(); // 启动会话

if (isset($_SESSION['username'])) { // 已登录，跳转到首页
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // 接收登录表单提交
    // 数据库验证用户信息
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 假设数据库用户名为 "admin"，密码为 "123456"
    if ($username === 'admin' && $password === '123456') {
        $_SESSION['username'] = $username; // 登录成功，记录会话
        header("Location: index.php"); // 跳转到首页
        exit();
    } else { // 登录失败
        echo "用户名或密码错误，请重新登录";
    }
}
?>