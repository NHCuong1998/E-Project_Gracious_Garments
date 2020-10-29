<?php
require_once "DAO\LoaiSPDAO.php";

class LoaiSPBUS
{
    public static function KiemTraMaLoaiTonTai($ID)
    {
        return LoaiSPDAO::KiemTraMaLoaiTonTai($ID);
    }

    public static function ThemLoai($ID, $Name, $Gender, $Status)
    {
        if (!LoaiSPDAO::KiemTraMaLoaiTonTai($ID)) {
            return LoaiBrandDAO::ThemBrand($ID, $Name, $Gender, $Status);
        }
        return false;
    }

    public static function LayDSLoai()
    {
        return LoaiSPDAO::LayDSLoai();
    }

    public static function LayTTLoai($ID)
    {
        if (LoaiSPDAO::KiemTraMaLoaiTonTai($ID)) {
            return LoaiSPDAO::LayTTLoai($ID);
        }
        return false;
    }

    public static function SuaLoai($ID, $Name, $Gender, $Status)
    {
        if (LoaiSPDAO::KiemTraMaLoaiTonTai($ID)) {
            return LoaiSPDAO::SuaLoai($ID, $Name, $Gender, $Status);
        }
        return false;
    }

    public static function XoaLoai($maSP)
    {
        if (LoaiSPDAO::KiemTraMaLoaiTonTai($maSP)) {
            return LoaiSPDAO::XoaLoai($maSP);
        }
        return false;
    }
    
}

