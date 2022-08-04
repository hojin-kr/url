<?php
namespace Hojin\Url\DS;

use Google\Cloud\Datastore\DatastoreClient;
use Hojin\Url\Logger\Logger;

class Datastore
{
    public function get(string $url) : ?array
    {
        (new Logger)->instance()->info("Datastore get", [$url]);
        $datastore = new DatastoreClient();

        $key = $datastore->key('url', base64_encode($url));
        $entity = $datastore->lookup($key);
        return [
            "url"=>$entity['url'],
            "target"=>$entity['target'],
        ];
    }

    public function set(string $url, string $target) : bool
    {
        (new Logger)->instance()->info("Datastore set", [$url]);
        $datastore = new DatastoreClient();

        // Create an entity
        $key = $datastore->key('url', base64_encode($url));
        $data = $datastore->entity($key);
        $data['url'] = base64_encode($url);
        $data['target'] = base64_encode($target);
        $datastore->insert($data);
        return true;
    }
}

