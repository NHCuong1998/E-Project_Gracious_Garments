<?php
require_once "DAO\SearchDAO.php";

class SearchBUS
{
    public static function ShowSearchResult($nameSearch)

    {
        return SearchDAO::ShowSearchResult($nameSearch);
    }
}