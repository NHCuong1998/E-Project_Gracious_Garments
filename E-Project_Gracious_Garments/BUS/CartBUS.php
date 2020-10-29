<?php 
    require_once "DAO\CartDAO.php";
    require_once "DAO\TaiKhoanDAO.php";

    Class CartBUS
    {
        public static function GetListCart($username)
        {
            return CartDAO::GetListCart($username);
        }
        public static function GetIDAccount($username)
        {
            return CartDAO::GetIDAccount($username);
        }

        public static function AddCart($username, $idproduct, $quantity)
        {   
            $idaccount = CartDAO::GetIDAccount($username);            
            if(!CartDAO::CheckCart($idaccount, $idproduct)){                
                return CartDAO::AddCart($idaccount, $idproduct, $quantity);
            } else{
                return CartDAO::AddQuantity($idaccount, $idproduct, $quantity);
            }
        }
        public static function ReduceQuantity($username, $idproduct, $quantity)
        {
            $idaccount = CartDAO::GetIDAccount($username);   
            $getquantity = CartDAO::GetQuantityCart($idaccount, $idproduct);
                        
                if($getquantity ==1){
                    return CartDAO::ReduceQuantity($idaccount, $idproduct, 0);
                }
                return CartDAO::ReduceQuantity($idaccount, $idproduct, $quantity);                
        }
        public static function DeleteCart($username, $idproduct)
        {
            $idaccount = CartDAO::GetIDAccount($username);
            return CartDAO::DeleteCart($idaccount, $idproduct);
        }
        public static function DeleteAllCart($username)
        {
            $idaccount = CartDAO::GetIDAccount($username);
            return CartDAO::DeleteAllCart($idaccount);
        }

        public static function DemGHTheoTK($ID_Account)
        {
            if (TaiKhoanDAO::KiemTraTKTonTai($ID_Account)) {
                return CartDAO::DemGHTheoTK($ID_Account);
            }
            return 0;
        }

    }
?>