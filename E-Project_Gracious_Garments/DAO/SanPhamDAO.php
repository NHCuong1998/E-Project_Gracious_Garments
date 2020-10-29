<?php
require_once "connect.php";

class SanPhamDAO
{
    public static function KiemTraMaLoaiSPTonTai($maSP)
    {
        $sql = "SELECT COUNT(*) AS Quantity FROM ProductType WHERE ID = ?";
        $dataType = "i";
        $params = array($maSP);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["Quantity"] > 0;
    }

     public static function LayDSSanPham()
    {
        $sql = "SELECT * FROM Product";
        return ExecuteSelectQuery($sql);
    }

    public static function LayTTSP($maSP)
    {
        $sql = "SELECT * FROM Product WHERE ID = ?";
        $dataType = "i";
        $params = array($maSP);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc();
    }

    public static function LayDSSanPhamTheoLoai($maLoai)
    {
        $sql = "SELECT * FROM Product WHERE ID_ProductType = ?";
        $dataType = "s";
        $params = array($maLoai);
        return ExecuteSelectQuery($sql, $dataType, $params);
    }

    public static function LayDSSanPhamTheoBrand($maBrand)
    {
        $sql = "SELECT p.* 
                FROM Product p INNER JOIN model m ON p.ID_Model = m.ID 
                               INNER JOIN Brand b ON m.ID_Brand = b.ID
                WHERE b.ID = ?";
        $dataType = "s";
        $params = array($maBrand);
        return ExecuteSelectQuery($sql, $dataType, $params);
    }

    public static function LayDSSanPhamTheoTrend()
    {
        $sql = "SELECT * FROM Product WHERE isTrending = 1";
        return ExecuteSelectQuery($sql);
    }
    
    public static function LayDSSanPhamDefault($ProdId)
    {
        $sql = "SELECT * FROM Product WHERE ID = ?";
        $dataType = "i";
        $params = array($ProdId);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc();

    }

    public static function ShowSearchResult($nameSearch)
    {
        $sql = "SELECT * FROM Product WHERE Name LIKE ?";
        $dataType = "s";
        $params =  array("%" . $nameSearch . "%");
        return ExecuteSelectQuery($sql, $dataType, $params);

    }

    public static function LayDSSanPhamTheoBrand2($IdModelaa)
    {
        $sql = "SELECT DISTINCT p.* 
                FROM ((Product p INNER JOIN model m ON p.ID_Model = m.ID) 
                               INNER JOIN Brand b ON m.ID_Brand = b.ID)
                WHERE p.ID_Model = ?
                LIMIT 5 
                ";
        $dataType = "s";
        $params = array($IdModelaa);
        return ExecuteSelectQuery($sql, $dataType, $params);
    }

    public static function SuaSP_GiamSoLuongTonKho($idproduct, $quantity)
    {
        $sql = "UPDATE Product SET Quantity = Quantity - ? WHERE ID = ?";
        $dataType = "ii";
        $params = array($quantity, $idproduct);
        return ExecuteNonQuery($sql, $dataType, $params) == 1;
    }
}