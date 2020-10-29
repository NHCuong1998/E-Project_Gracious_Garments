<?php
require_once "DAO\LoaiBrandDAO.php";

class LoaiBrandBUS
{
    public static function KiemTraMaBrandTonTai($maSP)
    {
        return LoaiBrandDAO::KiemTraMaBrandTonTai($maSP);
    }

    public static function ThemBrand($maSP, $tenSP, $trangThai)
    {
        if (!LoaiBrandDAO::KiemTraMaBrandTonTai($maSP)) {
            return LoaiBrandDAO::ThemBrand($maSP, $tenSP, $trangThai);
        }
        return false;
    }

    public static function LayDSBrand()
    {
        return LoaiBrandDAO::LayDSBrand();
    }

    public static function LayTTBrand($maSP)
    {
        if (LoaiBrandDAO::KiemTraMaBrandTonTai($maSP)) {
            return LoaiBrandDAO::LayTTBrand($maSP);
        }
        return false;
    }

    public static function SuaBrand($maSP, $tenSP, $trangThai)
    {
        if (LoaiBrandDAO::KiemTraMaBrandTonTai($maSP)) {
            return LoaiBrandDAO::SuaBrand($maSP, $tenSP, $trangThai);
        }
        return false;
    }

    public static function XoaBrand($maSP)
    {
        if (LoaiBrandDAO::KiemTraMaBrandTonTai($maSP)) {
            return LoaiBrandDAO::XoaBrand($maSP);
        }
        return false;
    }
    
}

