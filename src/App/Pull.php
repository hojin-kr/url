<?php

namespace Hojin\Url\App;

use Hojin\Url\Logger\Logger;

class Pull
{
    function Redirect($url)
    {
        $url = base64_decode($url);
        header("Location: $url");
        (new Logger)->instance()->debug("Redirect", [$url]);
    }
}