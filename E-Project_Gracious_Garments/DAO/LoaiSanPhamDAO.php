<?php
require_once "connect.php";

class LoaiBrandDAO
{
    public static function KiemTraMaBrandTonTai($maBrand)
    {
        $sql = "SELECT COUNT(*) AS Quantity FROM Brand WHERE ID = ?";
        $dataType = "s";
        $params = array($maBrand);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["Quantity"] > 0;
    }

    public static function LayDSBrand()
    {
        $sql = "SELECT * FROM Brand";
        return ExecuteSelectQuery($sql);
    }
}

class LoaiSanPhamDAO
{
    public static function KiemTraMaLoaiSPTonTai($maLoaiSP)
    {
        $sql = "SELECT COUNT(*) AS Quantity FROM ProductType WHERE ID = ?";
        $dataType = "s";
        $params = array($maLoaiSP);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["Quantity"] > 0;
    }

    public static function LayDSLoaiSP()
    {
        $sql = "SELECT * FROM ProductType";
        return ExecuteSelectQuery($sql);
    }

   
}
