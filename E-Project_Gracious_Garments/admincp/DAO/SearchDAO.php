<?php
require_once "connect.php";

class SearchDAO
{
    public static function ShowSearchResult($nameSearch)
    {
        $sql = "SELECT * FROM Account WHERE UserName LIKE ?";
        $dataType = "s";
        $params =  array("%" . $nameSearch . "%");
        return ExecuteSelectQuery($sql, $dataType, $params);

    }

}