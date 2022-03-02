<?php

namespace Quantox\Database;

use mysqli;
class Connection
{

    public function connect(): mysqli
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbName = 'students';

        return new mysqli($servername, $username, $password, $dbName);
    }
}
