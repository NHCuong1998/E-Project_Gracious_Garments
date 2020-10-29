<?php
require_once "connect.php";

class InvoiceDAO
{
    public static function KiemTraMaInvoiceTonTai($maSP)
    {
        $sql = "SELECT COUNT(*) AS Quantity FROM Invoice WHERE ID = ?";
        $dataType = "i";
        $params = array($maSP);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["Quantity"] > 0;
    }

    public static function LayDSInvoice()
    {
        $sql = "SELECT * FROM Invoice";
        return ExecuteSelectQuery($sql);
    }

    public static function ThemInvoice($ID, $ID_Account, $Date, $FullName, $Address, $Phone, $Total, $Status)
    {
        $sql = "INSERT INTO Invoice (ID, ID_Account, IssuedDate, Address, PhoneAddress, Total, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ? )";
        $dataType = "iiii";
        $params = array($ID, $ID_Account, $Date, $FullName, $Address, $Phone, $Total, $Status);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

    public static function LayTTInvoice($ID)
    {
        $sql = "SELECT * FROM Invoice WHERE ID = ?";
        $dataType = "i";
        $params = array($ID);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc();
    }

    public static function SuaInvoice($ID, $ID_Account, $Date, $FullName, $Address, $Phone, $Total, $Status)
    {
        $sql = "UPDATE Invoice SET ID_Account = ?, IssuedDate = ?, FullName = ?, Address = ?, PhoneAddress = ?, Total = ?, Status = ?  WHERE ID = ?";
        $dataType = "issssiii";
        $params = array($ID_Account, $Date, $FullName, $Address, $Phone, $Total, $Status,$ID);
        return ExecuteNonQuery($sql, $dataType, $params) >= 0;
    }

    public static function XoaInvoice($ID)
    {
        $sql = "UPDATE Invoice SET Status = 0 WHERE ID = ?";
        $dataType = "i";
        $params = array($ID);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

}