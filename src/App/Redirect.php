<?php

namespace Hojin\Url\App;

use Hojin\Url\Logger\Logger;

class Redirect
{
    function Redirect($url)
    {
        (new Logger)->instance()->info("Redirect", [$url]);
        $url = base64_decode($url);
        header("Location: $url");
    }

    public function isRedirect(string $requestUri) : bool
    {
        // Redirect 정보를 로그로 남겨서 나중에 통계로 사용
        (new Logger)->instance()->debug("requestUri", [$requestUri, count(explode("/", $requestUri)), explode("/", $requestUri)]);
        if (explode("/", $requestUri)[1] != "") {
            return true;
        }
        return false;
    }
}