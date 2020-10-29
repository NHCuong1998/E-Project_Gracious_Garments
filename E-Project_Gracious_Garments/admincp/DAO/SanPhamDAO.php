<?php
require_once "connect.php";

class SanPhamDAO
{
    public static function KiemTraSPTonTai($maSP)
    {
        $sql = "SELECT COUNT(*) AS SoLuong FROM Product WHERE ID = ?";
        $dataType = "i";
        $params = array($maSP);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["SoLuong"] > 0;
    }

    public static function ThemSP($maSP, $tenSP, $thongTin, $giaTien, $soLuongTonKho, $maLoaiSP, $maModel, $size, $mau, $anhMinhHoa, $trangThai, $laTrend)
    {
        $sql = "INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $dataType = "issiiiisssii";
        $params = array($maSP, $tenSP, $thongTin, $giaTien, $soLuongTonKho, $maLoaiSP, $maModel, $size, $mau, $anhMinhHoa, $trangThai, $laTrend);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

    public static function LayDSSP()
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

    public static function SuaSP($maSP, $tenSP, $thongTin, $giaTien, $soLuongTonKho, $maLoaiSP, $maModel, $size, $mau, $anhMinhHoa, $trangThai, $laTrend)
    {
        $sql = "UPDATE Product SET Name = ?, Description = ?, Price = ?, Quantity = ?, ID_ProductType = ?,ID_Model = ?, Size = ?, Colour = ?, Image = ?, Status = ?, Istrending = ? WHERE ID = ?";
        $dataType = "ssiiiisssiii";
        $params = array($tenSP, $thongTin, $giaTien, $soLuongTonKho, $maLoaiSP, $maModel, $size, $mau, $anhMinhHoa, $trangThai, $laTrend, $maSP);
        return ExecuteNonQuery($sql, $dataType, $params) >= 0;
    }

    public static function XoaSP($maSP)
    {
        $sql = "UPDATE Product SET Status = 0 WHERE ID = ?";
        $dataType = "i";
        $params = array($maSP);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

    public static function ShowSearchResult($nameSearch)
    {
        $sql = "SELECT * FROM Product WHERE Name LIKE ?";
        $dataType = "s";
        $params =  array("%" . $nameSearch . "%");
        return ExecuteSelectQuery($sql, $dataType, $params);

    }

}