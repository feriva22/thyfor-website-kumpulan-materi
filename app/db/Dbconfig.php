<?php
class Dbconfig {
    protected $serverName;
    protected $userName;
    protected $passCode;
    protected $dbName;
    protected $port;

    function Dbconfig() {
        $this->serverName = 'db';
        $this->userName = 'root';
        $this->passCode = 'root';
        $this->dbName = 'thyfor';
        $this->port = 3306;
    }
}
?>