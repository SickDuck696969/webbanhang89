<?php
session_start();
require_once 'app/models/ProductModel.php'; // Load model cần thiết nếu dùng chung ở nhiều nơi

// Lấy URL từ GET, ví dụ: Product/add/123
$url = $_GET['url'] ?? '';

$baseFolder = 'webbanhang'; // Tên folder dự án nếu chạy qua localhost/webbanhang

// Nếu URL có chứa 'webbanhang' ở đầu, bỏ đi
if (strpos($url, $baseFolder) === 0) {
    $url = substr($url, strlen($baseFolder));
    $url = ltrim($url, '/');
}

// Làm sạch và tách URL
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

// Xác định tên controller
$controllerName = isset($url[0]) && $url[0] !== '' ? ucfirst($url[0]) . 'Controller' : 'DefaultController';

// Xác định action
$action = isset($url[1]) && $url[1] !== '' ? $url[1] : 'index';

// Kiểm tra file controller tồn tại
$controllerFile = 'app/controllers/' . $controllerName . '.php';
if (!file_exists($controllerFile)) {
    die('Controller Not Found: ' . $controllerName);
}
require_once $controllerFile;

// Kiểm tra class tồn tại
if (!class_exists($controllerName)) {
    die('Controller class "' . $controllerName . '" not found.');
}

$controller = new $controllerName();

// Kiểm tra method (action) tồn tại
if (!method_exists($controller, $action)) {
    die('Action "' . $action . '" not found in controller "' . $controllerName . '"');
}

// Lấy các tham số còn lại và gọi controller
$params = array_slice($url, 2);
call_user_func_array([$controller, $action], $params);
