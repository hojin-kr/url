<?php

require 'vendor/autoload.php';

use Hojin\Url\App\Redirect;
use Hojin\Url\DS\Datastore;
use Hojin\Url\Logger\Logger;

$requestUri = substr($_SERVER["REQUEST_URI"] ?? "/", 1);
(new Logger)->instance()->info("Request Uri", ["requestUri"=>$_SERVER["REQUEST_URI"]]);
$redirect = new Redirect;
if ($redirect->isRedirect($requestUri)) {
    $data = (new Datastore)->get($requestUri);
    if (!isset($data["destination"])) {
        // todo do not set destination
    }
    $redirect->Redirect($data["destination"]);
}

if (!empty($_POST)) {
    if (!isset($_POST['source'])) {
        // todo do not set source
    }
    if (!isset($_POST['destination'])) {
        // todo do not set destination
    }
    $data = (new Datastore)->set($_POST['source'], $_POST['destination']);
    echo "OK";
}