<?php
namespace Hojin\Url\DS;

use Exception;
use Google\Cloud\Datastore\DatastoreClient;
use Hojin\Url\Logger\Logger;
use Google\Cloud\Datastore\Query\Query;

class Datastore
{
    public function get(string $source) : ?array
    {
        (new Logger)->info("get/url", ["source"=>$source]);
        try {
            $datastore = new DatastoreClient();
            $source64Encoded = base64_encode($source);
            $key = $datastore->key('url', $source64Encoded);
            $entity = $datastore->lookup($key);
        } catch (Exception $e) {
            (new Logger)->error("get/url/error", ["source"=>$source, "error"=>$e->getMessage() ?? ""]);
        }
        return [
            "destination"=>base64_decode($entity['destination'] ?? ""),
        ];
    }

    public function set(string $source, string $destination) : bool
    {
        $source64Encoded = base64_encode($source);
        $destination64Encoded = base64_encode($destination);
        (new Logger)->info("set/url", ["source"=>$source,"destination"=>$destination]);
        try {
            $datastore = new DatastoreClient();
            $key = $datastore->key('url', $source64Encoded);
            $data = $datastore->entity($key);
            $data['destination'] = $destination64Encoded;
            $datastore->insert($data);
        } catch (Exception $e) {
            (new Logger)->error("set/url/error", ["source"=>$source,"destination"=>$destination, "error"=>$e->getMessage() ?? ""]);
            return false;
        }
        return true;
    }

    public function getArticle(string $page) : ?array
    {
        (new Logger)->info("get/article", ["page"=>$page]);
        try {
            $datastore = new DatastoreClient();
            $key = $datastore->key('article', $page);
            $entity = $datastore->lookup($key);
        } catch (Exception $e) {
            (new Logger)->error("get/article/error", ["page"=>$page, "error"=>$e->getMessage() ?? ""]);
        }
        return [
            "articles"=>json_decode($entity['articles']),
        ];
    }

    public function setArticle(string $title, string $content, string $link) : bool
    {
        (new Logger)->info("set/article", ["title"=>$title,"content"=>$content, "link"=>$link]);
        try {
            $time = time();
            $datastore = new DatastoreClient();
            $key = $datastore->key('article', date("Y-n", $time));
            $lookup = $datastore->lookup($key);
            $entity = $datastore->entity($key);
            if (!empty($lookup) && isset($lookup['articles'])) {
                $articles = json_decode($lookup['articles'], true);
            }
            $articles[$time] = [
                'title'=>$title,
                'content'=>$content,
                'link'=>$link,
                'like'=>0,
                'created'=>$time,
            ];
            $entity["articles"] = json_encode($articles);
            if (!empty($lookup) && isset($lookup['articles'])) {
                $datastore->upsert($entity);
            } else {
                $datastore->insert($entity);
            }

        } catch (Exception $e) {
            (new Logger)->error("set/article/error", ["title"=>$title,"content"=>$content, "link"=>$link, "error"=>$e->getMessage() ?? ""]);
            return false;
        }
        return true;
    }
}

