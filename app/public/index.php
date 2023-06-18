<?php
session_start();
require __DIR__ . '/../routers/patternrouter.php';
require __DIR__ . '/../services/custompagesservice.php';

$customPageService = new CustompagesService();
if(!isset($_SESSION['customPageService'])){
    $_SESSION['customPageService'] = $customPageService->checkIfPagesExists();
}

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new PatternRouter();
$router->route($uri);