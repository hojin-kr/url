<?php
require 'vendor/autoload.php';

use Hojin\Url\App\Redirect;
use Hojin\Url\DS\Datastore;
use Hojin\Url\Logger\Logger;

putenv("GOOGLE_APPLICATION_CREDENTIALS=url-358416-56080cd2195d.json");
putenv("GOOGLE_CLOUD_PROJECT=url-358416");
putenv("PROJECT_ID=url-358416");

$requestUri = substr($_SERVER["REQUEST_URI"] ?? "/", 1);
(new Logger)->info("index", ["request"=>$_SERVER["REQUEST_URI"]]);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // API ROUTE
    $params = explode("/", $requestUri);
    if (in_array($params[0], ["article"])) {
        echo json_encode((new Datastore)->getArticle($params[1]));
        exit;
    }
    // if Redirect Request
    $redirect = new Redirect;
    if ($redirect->isRedirect($requestUri)) {
        $data = (new Datastore)->get($requestUri);
        if (!isset($data["destination"]) || $data["destination"] == "") {
            include "src/App/View.php";
            exit;
        }
        $redirect->Redirect($data["destination"]);
        exit;
    }
}

// is Create link
if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST)) {
    // set article
    if (isset($_POST['Auth'])) {
        // Only Auth User
        if ($_POST['Auth'] != getenv("AUTH_CODE")) {
            echo 500;
            exit;
        }
        if (in_array(explode("/", $requestUri)[0], ["article"])) {
            (new Datastore)->setArticle($_POST['title'],$_POST['content'],$_POST['link']);
        }
        exit;
    }
    if (!isset($_POST['source'])) {
        // todo do not set source
        echo 500;
        exit;
    }
    validator($_POST['source'], "source");
    if (!isset($_POST['destination'])) {
        // todo do not set destination
        echo 500;
        exit;
    }
    validator($_POST['destination'], "destination");
    if (!(new Datastore)->set($_POST['source'], $_POST['destination'])) {
        echo 500;
        exit;
    }
    echo 200;
    exit;
}

// todo move anthoerclass
function validator(string $target, string $type="test") : bool
{
    return true;
}

// view
include "src/App/View.php";