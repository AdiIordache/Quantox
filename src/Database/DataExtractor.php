<?php
namespace Quantox\Database;

class DataExtractor extends Connection
{
    public function getStudent()
    {
        $id = 1;
        $sql = "SELECT * FROM students where id = {$id}";
        $result = $this->connect()->query($sql);
        var_dump($result);
        return $result;
    }
}
