<?php
namespace Hojin\Url\DS;

use Exception;
use Google\Cloud\Datastore\DatastoreClient;
use Hojin\Url\Logger\Logger;

class Datastore
{
    public function get(string $source) : ?array
    {
        (new Logger)->info("get/datastore", ["source"=>$source]);
        // todo Cache
        try {
            $datastore = new DatastoreClient();
            $source64Encoded = base64_encode($source);
            $key = $datastore->key('url', $source64Encoded);
            $entity = $datastore->lookup($key);
        } catch (Exception $e) {
            (new Logger)->error("get/datastore", ["message"=>$e->getMessage()]);
        }
        return [
            "destination"=>base64_decode($entity['destination'] ?? ""),
        ];
    }

    public function set(string $source, string $destination) : bool
    {
        $source64Encoded = base64_encode($source);
        $destination64Encoded = base64_encode($destination);
        (new Logger)->info("set/datastore", ["source"=>$source,"destination"=>$destination]);
        // todo Cache
        try {
            $datastore = new DatastoreClient();
            $key = $datastore->key('url', $source64Encoded);
            $data = $datastore->entity($key);
            $data['destination'] = $destination64Encoded;
            $datastore->insert($data);
        } catch (Exception $e) {
            (new Logger)->error("set/datastore", ["message"=>$e->getMessage()]);
            return false;
        }
        return true;
    }
}

