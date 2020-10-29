<?php 
    require_once "DAO\ShippingAddressDAO.php";
    require_once "DAO\CartDAO.php";

    Class ShippingAddressBUS
    {
        public static function CheckAddress($username)
        {   
            $idaccount = CartDAO::GetIDAccount($username);
            return ShippingAddressDAO::CheckAddress($idaccount);
        }
        public static function GetAddress($username)
        {
            $idaccount = CartDAO::GetIDAccount($username);            
            return ShippingAddressDAO::GetAddress($idaccount);
        }
        public static function AddAddress($username, $fullname, $phonenumber, $address)
        {   
            $idaccount = CartDAO::GetIDAccount($username);
            if(ShippingAddressDAO::CheckAddress($idaccount)){
                return ShippingAddressDAO::UpdateAddress($idaccount, $fullname, $phonenumber, $address);
            }else{
                return shippingAddressDAO::AddAddress($idaccount, $fullname, $phonenumber, $address);
            }
        }
    }

?>