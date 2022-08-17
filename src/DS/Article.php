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

    public function set(array $data) : bool
    {
        ["title"=>$title,"content"=>$content, "link"=>$link, "locale"=>$locale, "status"=>$status] = $data;
        (new Logger)->info("set/article", $data);
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
                'created'=>$time,
                'locale'=>$locale,
                'status'=>$status,
            ];
            $entity["articles"] = json_encode($articles);
            if (!empty($lookup) && isset($lookup['articles'])) {
                $datastore->upsert($entity);
            } else {
                $datastore->insert($entity);
            }
        } catch (Exception $e) {
            (new Logger)->error("set/article/error", $data);
            return false;
        }
        return true;
    }

    public function update(array $data) : bool
    {
        ["title"=>$title,"content"=>$content, "link"=>$link, "id"=>$id, "date"=>$date, "locale"=>$locale, "status"=>$status] = $data;
        (new Logger)->info("update/article", $data);
        try {
            $time = time();
            $datastore = new DatastoreClient();
            $key = $datastore->key('article', (isset($date) ? $date : date("Y-n", $time)));
            $lookup = $datastore->lookup($key);
            $entity = $datastore->entity($key);
            $articles = json_decode($lookup['articles'], true);
            if (!isset($articles[$id])) {
                throw new Exception("not set article");
            }
            $articles[$id] = [
                'title'=>$title,
                'content'=>$content,
                'link'=>$link,
                'created'=>$time,
                'locale'=>$locale,
                'status'=>$status,
            ];
            $entity["articles"] = json_encode($articles);
            $datastore->upsert($entity);
        } catch (Exception $e) {
            (new Logger)->error("update/article/error", $data);
            return false;
        }
        return true;
    }
}

