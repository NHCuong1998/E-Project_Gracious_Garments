<?php 
    require_once "connect.php";
    
    Class InvoiceDAO
    {
        public static function GetListInvoice($idaccount)
        {
            $sql = "SELECT * FROM Invoice WHERE ID_Account = ?";
            $dataType = "i";
            $params = array($idaccount);
            return ExecuteSelectQuery($sql, $dataType, $params);
        }
        public static function AddInvoice($idaccount, $date, $fullname, $address, $phonenumber, $total, $status)
        {
            $sql = "INSERT INTO Invoice (ID_Account, IssuedDate, FullName, Address, PhoneAddress, ToTal, Status) VALUE (?, ?, ?, ?, ?, ?, ?)";
            $dataType = "issssii";
            $params = array($idaccount, $date, $fullname, $address, $phonenumber, $total, $status);
            return ExecuteNonQuery($sql, $dataType, $params) == 1;
        }
        public static function GetInvoice($id)
        {
            $sql = "SELECT * FROM Invoice WHERE ID = ?";
            $dataType = "i";
            $params = array($id);
            return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc();
        }
        public static function GetInvoiceDetail($idinvoice)
        {
            $sql = "SELECT inde.*, Image, Total FROM Invoice Join InvoiceDetail inde ON Invoice.ID = inde.ID_Invoice Join Product ON inde.ID_Product = Product.ID WHERE ID_Invoice = ?";
            $dataType = "i";
            $params = array($idinvoice);
            return ExecuteSelectQuery($sql, $dataType, $params);
        }

        public static function GetIDInvoice($idaccount, $date, $total)
        {
            $sql = "SELECT ID FROM Invoice WHERE ID_Account = ? AND IssuedDate = ? AND Total = ?";
            $dataType = "isi";
            $params = array($idaccount, $date, $total);
            return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc();
        }

        public static function addInvoiceDetail($idinvoice, $idproduct,$nameproduct, $quantity, $price)
        {
            $sql = "INSERT INTO InvoiceDetail (ID_Invoice, ID_Product, Name_Product, Quantity, Price) VALUE (?, ?, ?, ?, ?)";
            $dataType = "iisii";
            $params = array($idinvoice, $idproduct, $nameproduct, $quantity, $price);
            return ExecuteNonQuery($sql, $dataType, $params) == 1;
        }

        public static function LayMaHDLonNhat()
        {
            $sql = "SELECT ID AS MaHDMax FROM Invoice ORDER BY ID DESC";
            return ExecuteSelectQuery($sql)->fetch_assoc()["MaHDMax"];
        }
    }

?>