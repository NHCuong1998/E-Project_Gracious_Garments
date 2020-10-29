<?php
require_once "connect.php";

class ModelDAO
{
    public static function KiemTraMaModelTonTai($maModel)
    {
        $sql = "SELECT COUNT(*) AS Quantity FROM Model WHERE ID = ?";
        $dataType = "i";
        $params = array($maModel);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["Quantity"] > 0;
    }
    
    public static function LayDSModel()
    {
        $sql = "SELECT * FROM Model";
        return ExecuteSelectQuery($sql);
    }

    public static function ThemModel($maSP, $tenSP, $ID_ProductType, $ID_Brand)
    {
        $sql = "INSERT INTO Model (ID, NameModel, ID_ProductType, ID_Brand) VALUES (?, ?, ?, ?)";
        $dataType = "isii";
        $params = array($maSP, $tenSP, $ID_ProductType, $ID_Brand);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

    public static function LayTTModel($maSP)
    {
        $sql = "SELECT * FROM Model WHERE ID = ?";
        $dataType = "i";
        $params = array($maSP);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc();
    }

    public static function SuaModel($maSP, $tenSP, $ID_ProductType, $ID_Brand)
    {
        $sql = "UPDATE Model SET NameModel = ?, ID_ProductType = ?, ID_Brand = ? WHERE ID = ?";
        $dataType = "siii";
        $params = array($tenSP, $ID_ProductType, $ID_Brand, $maSP);
        return ExecuteNonQuery($sql, $dataType, $params) >= 0;
    }
}