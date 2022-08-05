<?php
namespace Hojin\Url\DS;

use Google\Cloud\Datastore\DatastoreClient;
use Hojin\Url\Logger\Logger;

class Datastore
{
    public function get(string $source) : ?array
    {
        (new Logger)->instance()->info("Datastore get", [$source]);
        $datastore = new DatastoreClient();
        $source64Encoded = base64_encode($source);
        $key = $datastore->key('url', $source64Encoded);
        $entity = $datastore->lookup($key);
        if (!isset($entity)) {
            // todo do not set source
        }
        return [
            "destination"=>base64_decode($entity['destination']),
        ];
    }

    public function set(string $source, string $destination) : bool
    {
        $source64Encoded = base64_encode($source);
        $destination64Encoded = base64_encode($destination);
        (new Logger)->instance()->info("Datastore set", [$source,$destination]);
        $datastore = new DatastoreClient();
        $key = $datastore->key('url', $source64Encoded);
        $data = $datastore->entity($key);
        $data['destination'] = $destination64Encoded;
        $datastore->insert($data);
        return true;
    }
}

