<?php
require_once "connect.php";

class IDDAO
{
    public static function KiemTraMaIDTonTai($ID_Invoice)
    {
        $sql = "SELECT COUNT(*) AS Quantity FROM InvoiceDetail WHERE ID_Invoice = ?";
        $dataType = "i";
        $params = array($ID_Invoice);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["Quantity"] > 0;
    }

    public static function LayDSID()
    {
        $sql = "SELECT * FROM InvoiceDetail ";
        return ExecuteSelectQuery($sql);
    }

    public static function ThemID($ID_Invoice, $ID_Product, $Name_Product, $Quantity, $Price)
    {
        $sql = "INSERT INTO InvoiceDetail (ID_Invoice, ID_Product, Name_Product, Quantity, Price) VALUES (?, ?, ?)";
        $dataType = "iisii";
        $params = array($ID_Invoice, $ID_Product, $Name_Product, $Quantity, $Price);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

    public static function LayTTID($ID_Invoice)
    {
        $sql = "SELECT * FROM InvoiceDetail WHERE ID_Invoice = ?";
        $dataType = "i";
        $params = array($ID_Invoice);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc();
    }

    public static function SuaID($ID_Invoice, $ID_Product, $Name_Product, $Quantity, $Price)
    {
        $sql = "UPDATE InvoiceDetail SET ID_Product = ?, Name_Product = ?, Quantity = ?, Price = ? WHERE ID_Invoice = ?";
        $dataType = "isiii";
        $params = array($ID_Product, $Name_Product, $Quantity, $Price, $ID_Invoice);
        return ExecuteNonQuery($sql, $dataType, $params) >= 0;
    }
}