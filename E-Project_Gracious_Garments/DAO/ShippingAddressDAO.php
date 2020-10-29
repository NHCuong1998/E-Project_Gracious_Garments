<?php 
    require_once "connect.php";

    Class ShippingAddressDAO
    {
        public static function CheckAddress($idaccount)
        {
            $sql = "SELECT COUNT(*) AS Amount FROM ShippingAddress WHERE ID_Account = ?";
            $dataType = "i";
            $params = array($idaccount);
            return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["Amount"]>0;
        }

        public static function GetAddress($idaccount)
        {   
            $sql = "SELECT * FROM ShippingAddress WHERE ID_Account = ?";
            $dataType = "i";
            $params = array($idaccount);
            return ExecuteSelectQuery($sql, $dataType, $params);
        }

        public static function AddAddress($idaccount, $fullname, $phonenumber, $address)
        {
            $sql = "INSERT INTO ShippingAddress (ID_Account, FullName, PhoneNumber, Address) VALUE (?, ?, ?, ?) ";
            $dataType = "isss";
            $params = array($idaccount, $fullname, $phonenumber, $address);
            return ExecuteNonQuery($sql, $dataType, $params) ==1 ;
        }

        public static function UpdateAddress($idaccount, $fullname, $phonenumber, $address)
        {
            $sql = "UPDATE ShippingAddress SET FullName = ?, PhoneNumber = ?, Address = ? WHERE ID_Account = ?";
            $dataType = "sssi";
            $params = array($fullname, $phonenumber, $address, $idaccount);
            return ExecuteNonQuery($sql, $dataType, $params) == 1;
        }

    }
?>