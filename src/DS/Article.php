<?php
namespace Hojin\Url\DS;

use Exception;
use Google\Cloud\Datastore\DatastoreClient;
use Hojin\Url\Logger\Logger;

class Article
{

    public function get(string $page) : ?array
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

    public function set(string $title, string $content, string $link) : bool
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

