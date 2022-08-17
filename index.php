<?php
require 'vendor/autoload.php';

use Hojin\Url\App\Redirect;
use Hojin\Url\DS\Article;
use Hojin\Url\DS\Url;
use Hojin\Url\Logger\Logger;

putenv("GOOGLE_APPLICATION_CREDENTIALS=url-358416-56080cd2195d.json");
putenv("GOOGLE_CLOUD_PROJECT=url-358416");
putenv("PROJECT_ID=url-358416");

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
    // Auth API
    if (isset($_POST['Auth'])) {
        // Only Auth User
        if ($_POST['Auth'] != getenv("AUTH_CODE")) {
            echo 500;
            exit;
        }
    }
    switch ($params[0]) {
        case 'article':
            if (!isset($_POST['id'])) {
                (new Article)->set($_POST);
            } else {
                (new Article)->update($_POST);
            }
            break;
        default:
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
            break;
    }
    exit;
}

// view
include "src/App/View.php";