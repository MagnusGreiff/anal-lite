<?php

namespace Radchasay\Database;

class Connect implements \Anax\Common\ConfigureInterface, \Anax\Common\AppInjectableInterface
{
    use \Anax\Common\ConfigureTrait;
    use \Anax\Common\AppInjectableTrait;
    private $db;

    public function connect()
    {
        try {
            $db = new \PDO($this->config[0], $this->config[1], $this->config[2]);
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->db = $db;
            $this->execute('set character_set_client=utf8');
            $this->execute('set character_set_connection=utf8');
            $this->execute('set character_set_results=utf8');
            $this->execute('set character_set_server=utf8');
        } catch (\PDOException $e) {
            echo "Failed to connect to the database using DSN:<br>$this->config[dsn]<br>";
        }
    }


    public function executeFetchAll($sql, $param = [])
    {
        $sth = $this->execute($sql, $param);
        $res = $sth->fetchAll();
        if ($res === false) {
            $this->statementException($sth, $sql, $param);
        }
        return $res;
    }


    /**
     * @param       $sql
     * @param array $param
     * @return mixed
     * @throws \Radchasay\Database\Exception
     */
    public function executeFetch($sql, $param = [])
    {
        $sth = $this->execute($sql, $param);
        $res = $sth->fetch();
        return $res;
    }


    /**
     * @param       $sql
     * @param array $param
     * @return mixed
     * @throws \Radchasay\Database\Exception
     */
    public function execute($sql, $param = [])
    {
        $sth = $this->db->prepare($sql);
        if (!$sth) {
            $this->statementException($sth, $sql, $param);
        }

        $status = $sth->execute($param);
        if (!$status) {
            $this->statementException($sth, $sql, $param);
        }

        return $sth;
    }


    /**
     * Through exception with detailed message.
     *
     * @param PDOStatement $sth statement with error
     * @param string $sql statement to execute
     * @param array $param to match ? in statement
     *
     * @return void
     *
     * @throws Exception
     */
    private function statementException($sth, $sql, $param)
    {
        throw new Exception(
            $sth->errorInfo()[2]
            . "<br><br>SQL ("
            . substr_count($sql, "?")
            . " params):<br><pre>$sql</pre><br>PARAMS ("
            . count($param)
            . "):<br><pre>"
            . implode($param, "\n")
            . "</pre>"
            . ((count(array_filter(array_keys($param), 'is_string')) > 0)
                ? "WARNING your params array has keys, should only have values."
                : null)
        );
    }


    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }
}
