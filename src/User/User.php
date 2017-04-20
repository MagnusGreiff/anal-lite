<?php

namespace Radchasay\User;

class User implements \Anax\Common\AppInjectableInterface
{
    use \Anax\Common\AppInjectableTrait;


    public function addUser($user, $pass, $age, $type, $emailPart1, $emailPart2)
    {
        $this->app->db->execute("INSERT into setup_user (name, pass, age, type, email) VALUES ('$user', '$pass', '$age', '$type', '$emailPart1@$emailPart2')");
    }

    public function getHash($email)
    {
        $res = $this->app->db->executeFetchAll("SELECT pass FROM setup_user WHERE email='$email'")[0];
        return $res["pass"];
    }

    public function changePassword($email, $pass)
    {
        $this->app->db->execute("UPDATE setup_user SET pass='$pass' WHERE email='$email'");
    }


    public function updateProfile($userEmail, $name, $age, $type, $email)
    {
        $this->app->db->execute("UPDATE setup_user SET name='$name', age='$age', type='$type', email='$email' WHERE email='$userEmail'");
    }


    public function exists($email)
    {
        $row = $this->app->db->executeFetch("SELECT * FROM setup_user WHERE email='$email'");
        return !$row ? false : true;
    }

    public function searchUsers($searchTerm)
    {
        $sql = "SELECT name, age, email, type FROM setup_user WHERE name LIKE  CONCAT(\"%\", ?, \"%\");";
        $resultset = $this->app->db->executeFetchAll($sql, [$searchTerm]);
        $table = "<table id='searchResult'>";
        $table .= "<tr><th>Name</th>";
        $table .= "<th>Age</th>";
        $table .= "<th>Type</th>";
        $table .= "<th>Email</th>";
        $table .= "</tr>";
        foreach ($resultset as $item) {
            $table .= "<tr>";
            $table .= "<td>" . $item["name"] . "</td>";
            $table .= "<td>" . $item["age"] . "</td>";
            $table .= "<td>" . $item["type"] . "</td>";
            $table .= "<td>" . $item["email"] . "</td>";
            $table .= "</tr>";
        }
        $table .= "</table>";

        echo $table;
    }

    public function showAllUsers($hits, $page, $orderBy, $order)
    {
        $defaultRoute = "?route=show-all-paginate&";
        $count = "SELECT COUNT(name) AS max FROM setup_user;";
        $resCount = $this->app->db->executeFetchAll($count);
        if (!(is_numeric($hits) && $hits > 0 && $hits <= 8)) {
            $redirectHits = $this->mergeQueryString(["hits" => 2], $defaultRoute);
            $this->app->response->redirect($redirectHits);
        }

        $max = ceil($resCount[0]["max"] / $hits);
        if (!(is_numeric($hits) && $page > 0 && $page <= $max)) {
            $redirectPages = $this->mergeQueryString(["page" => 1], $defaultRoute);
            $this->app->response->redirect($redirectPages);
        }
        $offset = $hits * ($page - 1);

        $sql = "SELECT name, age, email, type FROM setup_user ORDER BY $orderBy $order LIMIT $hits OFFSET $offset";
        /*}*/
        $resSql = $this->app->db->executeFetchAll($sql);

        $ipp = "<p>";
        $mqs2 = $this->mergeQueryString(["hits" => 2], $defaultRoute);
        $mqs4 = $this->mergeQueryString(["hits" => 4], $defaultRoute);
        $mqs8 = $this->mergeQueryString(["hits" => 8], $defaultRoute);
        $ipp .= "<a href='$mqs2'>2</a> |";
        $ipp .= "<a href='$mqs4'>4</a> |";
        $ipp .= "<a href='$mqs8'>8</a>";
        $ipp .= "</p>";
        echo $ipp;

        $table = "<table>";
        $table .= "<tr><th>Name" . $this->orderby("name", $defaultRoute) . "</th>";
        $table .= "<th>Age" . $this->orderby("age", $defaultRoute) . "</th>";
        $table .= "<th>Type" . $this->orderby("type", $defaultRoute) . "</th>";
        $table .= "<th>Email" . $this->orderby("email", $defaultRoute) . "</th>";
        $table .= "</tr>";
        foreach ($resSql as $item) {
            $table .= "<tr>";
            $table .= "<td>" . $item["name"] . "</td>";
            $table .= "<td>" . $item["age"] . "</td>";
            $table .= "<td>" . $item["type"] . "</td>";
            $table .= "<td>" . $item["email"] . "</td>";
            $table .= "</tr>";
        }
        $table .= "</table>";

        echo $table;

        $pages = "<p> Pages: ";
        for ($i = 1; $i <= $max; $i++) {
            $test = $this->mergeQueryString(["page" => $i], $defaultRoute);
            $pages .= "<a href='$test'> $i </a>";
        }
        $pages .= "</p>";
        echo $pages;
    }

    public function deleteUser($email)
    {
        $this->app->db->execute("DELETE FROM setup_user WHERE email='$email'");
        $this->app->response->refresh(1);
    }

    public function mergeQueryString($options, $prepend = "?")
    {
        // Parse querystring into array
        $query = [];
        parse_str($_SERVER["QUERY_STRING"], $query);

        // Merge query string with new options
        $query = array_merge($query, $options);

        // Build and return the modified querystring as url
        return $prepend . http_build_query($query);
    }


    public function orderby($column, $route)
    {
        return <<<EOD
<span class='orderby'>
<a href="{$route}orderby={$column}&order=asc">&darr;</a>
<a href="{$route}orderby={$column}&order=desc">&uarr;</a>
</span>
EOD;
    }
}
