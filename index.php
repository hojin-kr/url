<?php
require 'vendor/autoload.php';

use Hojin\Url\App\Redirect;
use Hojin\Url\DS\Article;
use Hojin\Url\DS\Url;
use Hojin\Url\Logger\Logger;

// force tls
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    if (!in_array($_SERVER['HTTP_HOST'],["localhost:8080"])) {
        header('Location: '.'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        exit;
    }
}

const RESERVED_KEYWORD = ["article"];

$requestUri = substr($_SERVER["REQUEST_URI"] ?? "/", 1);
(new Logger)->info("index", ["request"=>$_SERVER["REQUEST_URI"]]);
$params = explode("/", $requestUri);
// API GET Route
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    switch ($params[0]) {
        case 'article':
            echo json_encode((new Article)->get($params[1]));
            exit;
            break;
        default:
            // Redirect Request
            $redirect = new Redirect;
            if ($redirect->isRedirect($requestUri)) {
                $data = (new Url)->get($requestUri);
                if (!isset($data["destination"]) || $data["destination"] == "") {
                    include "src/App/View.php";
                    exit;
                }
                $redirect->Redirect($data["destination"]);
                exit;
            }
            break;
    }
}
// API POST Route
if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST)) {
    // Reserved keyword
    if (in_array($_POST['destination'], RESERVED_KEYWORD)) {
        echo 500;
        exit;
    }
    // Shorten URL
    if (!isset($_POST['source']) || !isset($_POST['destination'])) {
        echo 500;
        exit;
    }
    if (!(new Url)->set($_POST['source'], $_POST['destination'])) {
        echo 500;
        exit;
    }
    echo 200;
    exit;
}

// view
include "src/App/View.php";