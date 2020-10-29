<?php 
    require_once "DAO\InvoiceDAO.php";
    require_once "DAO\CartDAO.php";
    Class InvoiceBUS
    {
        public static function GetListInvoice($username)
        {
            $idaccount = CartDAO::GetIDAccount($username);
            return InvoiceDAO::GetListInvoice($idaccount);
        }

        public static function AddInvoice($username, $date, $fullname, $address, $phonenumber, $total, $status)
        {
            $idaccount = CartDAO::GetIDAccount($username);
            return InvoiceDAO::AddInvoice($idaccount, $date, $fullname, $address, $phonenumber, $total, $status);
        }

        public static function GetInvoice($id)
        {
            return InvoiceDAO::GetInvoice($id);
        }

        public static function GetInvoiceDetail($idinvoice)
        {
            return InvoiceDAO::GetInvoiceDetail($idinvoice);
        }

        public static function GetIDInvoice($username, $date, $total)
        {   
            $idaccount = CartDAO::GetIDAccount($username);
            return InvoiceDAO::GetIDInvoice($idaccount, $date, $total);
        }
        
        public static function AddInvoiceDetail($idinvoice, $idproduct,$nameproduct, $quantity, $price)
        {   
            return InvoiceDAO::AddInvoiceDetail($idinvoice, $idproduct,$nameproduct, $quantity, $price);
        }

        public static function GetInvoiceMax()
        {
            return InvoiceDAO::LayMaHDLonNhat();
        }
    }
?>