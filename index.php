<?php

require 'vendor/autoload.php';

use Hojin\Url\App\Redirect;
use Hojin\Url\DS\Datastore;

$requestUri = $_SERVER["REQUEST_URI"] ?? "/";

$redirect = new Redirect;
if ($redirect->isRedirect($requestUri)) {
    $data = (new Datastore)->get($requestUri);
    $redirect->Redirect($data["target"]);
}

if (!empty($_POST) && isset($_POST['target']) && isset($_POST['url'])) {
    $data = (new Datastore)->set($_POST['url'], $_POST['target']);
}