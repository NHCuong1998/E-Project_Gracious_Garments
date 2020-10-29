<?php
require_once "connect.php";

class LoaiBrandDAO
{
    public static function KiemTraMaBrandTonTai($maSP)
    {
        $sql = "SELECT COUNT(*) AS Quantity FROM Brand WHERE ID = ?";
        $dataType = "i";
        $params = array($maSP);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["Quantity"] > 0;
    }

    public static function LayDSBrand()
    {
        $sql = "SELECT * FROM Brand";
        return ExecuteSelectQuery($sql);
    }

    public static function ThemBrand($maSP, $tenSP, $trangThai)
    {
        $sql = "INSERT INTO Brand (ID, Name, Status) VALUES (?, ?, ?)";
        $dataType = "isi";
        $params = array($maSP, $tenSP, $trangThai);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

    public static function LayTTBrand($maSP)
    {
        $sql = "SELECT * FROM Brand WHERE ID = ?";
        $dataType = "i";
        $params = array($maSP);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc();
    }

    public static function SuaBrand($maSP, $tenSP, $trangThai)
    {
        $sql = "UPDATE Brand SET Name = ?, Status = ? WHERE ID = ?";
        $dataType = "sii";
        $params = array($tenSP, $trangThai, $maSP);
        return ExecuteNonQuery($sql, $dataType, $params) >= 0;
    }

    public static function XoaBrand($maSP)
    {
        $sql = "UPDATE Brand SET Status = 0 WHERE ID = ?";
        $dataType = "i";
        $params = array($maSP);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

}