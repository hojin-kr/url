<?php

require 'vendor/autoload.php';

use Hojin\Url\App\Redirect;
use Hojin\Url\DS\Datastore;

$requestUri = $_SERVER["REQUEST_URI"] ?? "/";

$redirect = new Redirect;
if ($redirect->isRedirect($requestUri)) {
    $data = (new Datastore)->get($requestUri);
    if ($data['isVaild'] ?? false) {
        $redirect->Redirect($data["target"]);
    }
}