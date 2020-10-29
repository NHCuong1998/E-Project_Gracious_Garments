<?php
require_once "connect.php";

class LoaiSPDAO
{
    public static function KiemTraMaLoaiTonTai($ID)
    {
        $sql = "SELECT COUNT(*) AS Quantity FROM ProductType WHERE ID = ?";
        $dataType = "i";
        $params = array($ID);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["Quantity"] > 0;
    }

    public static function LayDSLoai()
    {
        $sql = "SELECT * FROM ProductType";
        return ExecuteSelectQuery($sql);
    }

    public static function ThemLoai($ID, $Name, $Gender, $Status)
    {
        $sql = "INSERT INTO ProductType (ID, Name, Gender, Status) VALUES (?, ?, ?, ?)";
        $dataType = "issi";
        $params = array($ID, $Name, $Gender, $Status);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

    public static function LayTTLoai($ID)
    {
        $sql = "SELECT * FROM ProductType WHERE ID = ?";
        $dataType = "i";
        $params = array($ID);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc();
    }

    public static function SuaLoai($ID, $Name, $Gender, $Status)
    {
        $sql = "UPDATE ProductType SET Name = ?, Gender = ?, Status = ? WHERE ID = ?";
        $dataType = "ssii";
        $params = array($Name, $Gender, $Status, $ID);
        return ExecuteNonQuery($sql, $dataType, $params) >= 0;
    }

    public static function XoaLoai($ID)
    {
        $sql = "UPDATE ProductType SET Status = 0 WHERE ID = ?";
        $dataType = "i";
        $params = array($ID);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

}