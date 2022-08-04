<?php

namespace Hojin\Url\DS;

class Datastore
{
    public function get(string $url) : ?array
    {
        return [
            "id"=>"23423432",
            "url"=>base64_encode($url),
            "target"=>base64_encode("https://google.com"),
            "updated"=>time(),
            "created"=>time()-100,
        ];
    }

    public function set(string $url) : ?array
    {
        return [
            "id"=>"23423432",
            "url"=>base64_encode($url),
            "target"=>base64_encode("https://google.com"),
            "updated"=>time(),
            "created"=>time()-100,
        ];
    }
}

