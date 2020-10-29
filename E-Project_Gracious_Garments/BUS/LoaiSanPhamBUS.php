<?php
require "DAO\LoaiSanPhamDAO.php";

class LoaiSanPhamBUS
{
    public static function KiemTraMaBrandTonTai($maBrand)
    {
        return LoaiBrandDAO::KiemTraMaBrandTonTai($maBrand);
    }

    public static function LayDSBrand()
    {
        return LoaiBrandDAO::LayDSBrand();
    }

    public static function KiemTraMaLoaiSPTonTai($maLoaiSP)
    {
        return LoaiSanPhamDAO::KiemTraMaLoaiSPTonTai($maLoaiSP);
    }

    public static function LayDSLoaiSP()
    {
        return LoaiSanPhamDAO::LayDSLoaiSP();
    }
}