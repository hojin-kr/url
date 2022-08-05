<?php

namespace Hojin\Url\App;

use Hojin\Url\Logger\Logger;

class Redirect
{
    function Redirect($url)
    {
        (new Logger)->instance()->info("Redirect", [$url]);
        header("Location: $url");
    }

    public function isRedirect(string $requestUri) : bool
    {
        (new Logger)->instance()->debug("requestUri", [$requestUri, count(explode("/", $requestUri)), explode("/", $requestUri)]);
        if (explode("/", $requestUri)[0] != "") {
            return true;
        }
        return false;
    }
}