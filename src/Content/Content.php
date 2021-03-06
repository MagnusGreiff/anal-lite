<?php

namespace Radchasay\Content;

class Content implements \Anax\Common\AppInjectableInterface
{
    use \Anax\Common\AppInjectableTrait;


    public function getAllContent()
    {
        $sql = "SELECT * FROM content";
        $res = $this->app->db->executeFetchAll($sql);
        return $res;
    }

    public function getAllContentWhereId($id)
    {
        $sql = "SELECT * FROM content WHERE id = ?";
        $res = $this->app->db->executeFetch($sql, [$id]);
        return $res;
    }

    private function slugify($str)
    {
        $str = mb_strtolower(trim($str));
        $str = str_replace(array('å', 'ä', 'ö'), array('a', 'a', 'o'), $str);
        $str = preg_replace('/[^a-z0-9-]/', '-', $str);
        $str = trim(preg_replace('/-+/', '-', $str), '-');
        return $str;
    }

    public function updateContentWhereId()
    {
        $sql = "UPDATE content SET title=?, path=?, slug=?, data=?, type=?, filter=?, published=?, updated=? WHERE id = ?;";
        $cUpdated = date("Y-m-d H:i:s");
        $cTitle = $this->app->request->getPost("contentTitle");
        $cPath = $this->app->request->getPost("contentPath");
        if (!$cPath) {
            $cPath = null;
        }
        $cSlug = $this->app->request->getPost("contentSlug");
        if (!$cSlug) {
            $cSlug = $this->slugify($cTitle);
        }
        $cData = $this->app->request->getPost("contentData");
        $cType = $this->app->request->getPost("contentType");
        $cFilter = $this->app->request->getPost("contentFilter");
        $cPublished = $this->app->request->getPost("contentPublish");
        if (!$cPublished) {
            $cPublished = date("Y-m-d H:i:s");
        }
        $cId = $this->app->request->getPost("contentId");
        $selectSlug = "SELECT slug FROM content WHERE id = ?";
        $getslug = $this->app->db->executeFetch($selectSlug, [$cId]);
        if ($getslug[0] == $cSlug) {
            $this->app->db->execute($sql, [$cTitle, $cPath, $cSlug, $cData, $cType, $cFilter, $cPublished, $cUpdated, $cId]);
            $this->app->response->redirect("?route=edit&id=$cId");
        } else {
            if (!$this->exists($cSlug)) {
                $this->app->db->execute($sql, [$cTitle, $cPath, $cSlug, $cData, $cType, $cFilter, $cPublished, $cUpdated, $cId]);
                $this->app->response->redirect("?route=edit&id=$cId");
            } else {
                echo "<h4 style='width: 200px;;'>Slug already exists. Please choose another one.</h4>";
            }
        }
    }

    private function exists($slug)
    {
        $row = $this->app->db->executeFetch("SELECT * FROM content WHERE slug='$slug'");
        return !$row ? false : true;
    }

    public function insertIntoDatabase($title)
    {
        $sql = "INSERT INTO content (title) VALUES (?)";
        $this->app->db->execute($sql, [$title]);
        $id = $this->app->db->lastInsertId();
        $edit = $this->app->url->create("admin/editPost");
        $this->app->response->redirect("$edit?route=edit&id=$id");
    }

    public function deleteContent()
    {
        $id = $this->app->request->getGet("id");
        $sql = "UPDATE content SET deleted=NOW() WHERE id = ?";
        $this->app->db->execute($sql, [$id]);
        $showPosts = $this->app->url->create("admin/posts");
        $this->app->response->redirect($showPosts);
    }

    public function showPages()
    {
        $sql = <<<EOD
SELECT
    *,
    CASE 
        WHEN (deleted <= NOW()) THEN "isDeleted"
        WHEN (published <= NOW()) THEN "isPublished"
        ELSE "notPublished"
    END AS status
FROM content
WHERE type=? AND path IS NOT NULL 
;
EOD;
        $res = $this->app->db->executeFetchAll($sql, ["page"]);
        return $res;
    }

    public function showBlogs()
    {
        $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
    FROM content
WHERE type=? AND published IS NOT NULL 
ORDER BY published DESC
;
EOD;
        $res = $this->app->db->executeFetchAll($sql, ["post"]);
        return $res;
    }

    public function showPage()
    {
        $getRoute = $this->app->request->getGet("route");
        $pages = $this->app->url->create("content/pages");
        if ($getRoute == "") {
            $this->app->response->redirect($pages);
        }
        $sql = "SELECT * FROM content WHERE path = ?";
        $res = $this->app->db->executeFetch($sql, [$getRoute]);
        return $res;
    }

    public function showBlog()
    {
        $getRoute = $this->app->request->getGet("route");
        $blogs = $this->app->url->create("content/blogs");
        if ($getRoute == "") {
            $this->app->response->redirect($blogs);
        }
        $sql = "SELECT * FROM content WHERE slug = ?";
        $res = $this->app->db->executeFetch($sql, [$getRoute]);
        return $res;
    }
}
