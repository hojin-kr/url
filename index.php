<?php
require 'vendor/autoload.php';

use Hojin\Url\App\Redirect;
use Hojin\Url\DS\Datastore;
use Hojin\Url\Logger\Logger;

$requestUri = substr($_SERVER["REQUEST_URI"] ?? "/", 1);
(new Logger)->instance()->info("Request Uri", ["requestUri"=>$_SERVER["REQUEST_URI"]]);

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

// is Create link
if (!empty($_POST)) {
    if (!isset($_POST['source'])) {
        // todo do not set source
    }
    validator($_POST['source'], "source");
    if (!isset($_POST['destination'])) {
        // todo do not set destination
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

// ip based locale
// ipinfo after job view complete
// $ipinfo = json_decode(file_get_contents("https://api.ip.pe.kr/json"));
// (new Logger)->instance()->info("IP INFO", [$ipinfo]);
// if (isset($ipinfo->country_code) && $ipinfo->country_code == "KR") {
// }

// view
include "src/App/View.php";