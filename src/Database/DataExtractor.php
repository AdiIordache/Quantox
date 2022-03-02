<?php
namespace Database;

use Quantox\Database\Connection;

class DataExtractor extends Connection
{
    public function getStudent($id)
    {
        $sql = "SELECT * FROM students where id = {$id}";

        return $this->connect()->query($sql)->fetch_assoc();
    }
}
