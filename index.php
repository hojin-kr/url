<?php

require 'vendor/autoload.php';

use Hojin\Url\App\Push;
use Hojin\Url\DS\Datastore;
use Hojin\Url\Logger\Logger;

$log = (new Logger)->instance();
$log->debug("start");

$data = (new Datastore)->get("test");
$log->debug("ds get", $data);


$app = (new Push);

$app->Redirect($data['target']);

$log->info('Redirect', ["url"=>$data['target']]);