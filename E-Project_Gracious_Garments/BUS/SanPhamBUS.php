<?php
require "DAO\SanPhamDAO.php";

class SanPhamBUS
{

    public static function LayDSSanPham()
    {
        return SanPhamDAO::LayDSSanPham();
    }

    
    public static function LayTTSP($maSP)
    {
        if (SanPhamDAO::KiemTraSPTonTai($maSP)) {
            return SanPhamDAO::LayTTSP($maSP);
        }
        return false;
    }
    public static function LayDSSanPhamTheoLoai($maType)
    {
        return SanPhamDAO::LayDSSanPhamTheoLoai($maType);
    }

    public static function LayDSSanPhamTheoBrand($maBrand)
    {
        return SanPhamDAO::LayDSSanPhamTheoBrand($maBrand);
    }

    public static function LayDSSanPhamDefault($ProdId)
    {
        return SanPhamDAO::LayDSSanPhamDefault($ProdId);
    }

    public static function LayDSSanPhamTheoTrend()
    {
        return SanPhamDAO::LayDSSanPhamTheoTrend();
    }

    public static function ShowSearchResult($nameSearch)

    {
        return SanPhamDAO::ShowSearchResult($nameSearch);
    }

    public static function LayDSSanPhamTheoBrand2($IdModelaa)
    {
        return SanPhamDAO::LayDSSanPhamTheoBrand2($IdModelaa)
        ;
    }

    public static function SuaSP_GiamSoLuongTonKho($idproduct, $quantity)
    {
        return SanPhamDAO::SuaSP_GiamSoLuongTonKho($idproduct, $quantity);
    }
    
}