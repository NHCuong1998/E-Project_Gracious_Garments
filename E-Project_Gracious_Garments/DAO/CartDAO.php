<?php 
    require_once "connect.php";

    Class CartDAO
    {   
        public  static function GetListCart($username)
        {
            $sql = "SELECT Image, Name, Price, Cart.Quantity, ID_Product FROM Account JOIN Cart ON Account.ID = Cart.ID_Account JOIN Product ON Cart.ID_Product = Product.ID WHERE UserName = ? ";
            $dataType = "s";
            $params = array($username);
            return ExecuteSelectQuery($sql, $dataType, $params);
        }

        public static function CheckCart($idaccount, $idproduct)
        {
            $sql = "SELECT COUNT(*) AS Amount From Cart WHERE ID_Account = ? AND ID_Product = ? ";
            $dataType = "ii";
            $params = array($idaccount, $idproduct);
            return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["Amount"]>0;
        }

        public static function GetIDAccount($username)
        {
            $sql = "SELECT ID FROM Account WHERE UserName = ?";
            $dataType = "s";
            $params = array($username);           
            return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["ID"];
        }

        public static function AddCart($idaccount, $idproduct, $quantity)
        {
            $sql = "INSERT INTO Cart (ID_Account, ID_Product, Quantity) VALUE (?, ?, ?)";
            $dataType = "iii";
            $params = array($idaccount, $idproduct, $quantity);
            return ExecuteNonQuery($sql, $dataType, $params) == 1 ;
        }
        public static function AddQuantity($idaccount, $idproduct, $quantity)
        {
            $sql = "UPDATE Cart SET Quantity = Quantity + ? WHERE ID_Account = ? AND ID_Product = ?";
            $dataType = "iii";
            $params = array($quantity, $idaccount, $idproduct);
            return ExecuteNonQuery($sql, $dataType, $params)==1;
        }
        public static function GetQuantityCart($idaccount, $idproduct)
        {
            $sql = "SELECT Quantity FROM Cart WHERE ID_Account = ? AND ID_Product = ?";
            $dataType = "ii";
            $params = array($idaccount, $idproduct);
            return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["Quantity"];
        }

        public static function ReduceQuantity($idaccount, $idproduct, $quantity)
        {
            $sql = "UPDATE Cart SET Quantity = Quantity - ? WHERE ID_Account = ? AND ID_Product = ?";
            $dataType = "iii";
            $params = array($quantity, $idaccount, $idproduct);
            return ExecuteSelectQuery($sql, $dataType, $params);
        }
        public static function DeleteCart($idaccount, $idproduct)
        {
            $sql = "DELETE  FROM  Cart Where ID_Account = ? AND ID_Product = ?";
            $dataType = "ii";
            $params = array($idaccount, $idproduct);
            return ExecuteNonQuery($sql, $dataType,$params) ;
        }
        public static  function DeleteAllCart($idaccount)
        {
            $sql = "DELETE FROM Cart WHERE ID_Account = ?";
            $dataType = "i";
            $params = array($idaccount);
            return ExecuteNonQuery($sql, $dataType, $params) == 1;
        }

        public static function DemGHTheoTK($ID_Account)
    {
        $sql = "SELECT SUM(Quantity) AS SoLuong FROM Cart WHERE ID_Account = ?";
        $dataType = "i";
        $params = array($ID_Account);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["SoLuong"] ?? 0;
    }
    }

?>