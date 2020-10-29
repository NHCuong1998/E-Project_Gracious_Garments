<?php
require_once "connect.php";

class SADAO
{
    public static function KiemTraMaSATonTai($ID)
    {
        $sql = "SELECT COUNT(*) AS Quantity FROM ShippingAddress WHERE ID = ?";
        $dataType = "i";
        $params = array($ID);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["Quantity"] > 0;
    }

    public static function LayDSSA()
    {
        $sql = "SELECT * FROM ShippingAddress";
        return ExecuteSelectQuery($sql);
    }

    public static function ThemSA($ID, $ID_Account, $FullName, $PhoneNumber, $Address)
    {
        $sql = "INSERT INTO ShippingAddress (ID, ID_Account, FullName, PhoneNumber, Address) VALUES (?, ?, ?, ?, ?)";
        $dataType = "iisss";
        $params = array($ID, $ID_Account, $FullName, $PhoneNumber, $Address);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

    public static function LayTTSA($ID)
    {
        $sql = "SELECT * FROM ShippingAddress WHERE ID = ?";
        $dataType = "i";
        $params = array($ID);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc();
    }

    public static function SuaSA($ID, $ID_Account, $FullName, $PhoneNumber, $Address)
    {
        $sql = "UPDATE ShippingAddress SET ID_Account = ?, FullName = ?, PhoneNumber = ?, Address = ? WHERE ID = ?";
        $dataType = "isssi";
        $params = array($ID_Account, $FullName, $PhoneNumber, $Address, $ID);
        return ExecuteNonQuery($sql, $dataType, $params) >= 0;
    }

}