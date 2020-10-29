<?php
require_once "DAO\SanPhamDAO.php";

class SanPhamBUS
{
    public static function ThemSP($maSP, $tenSP, $thongTin, $giaTien, $soLuongTonKho, $maLoaiSP, $maModel, $size, $mau, $anhMinhHoa, $trangThai, $laTrend)
    {
        if (!SanPhamDAO::KiemTraSPTonTai($maSP)) {
            return SanPhamDAO::ThemSP($maSP, $tenSP, $thongTin, $giaTien, $soLuongTonKho, $maLoaiSP, $maModel, $size, $mau, $anhMinhHoa, $trangThai, $laTrend);
        }
        return false;
    }

    public static function LayDSSP()
    {
        return SanPhamDAO::LayDSSP();
    }

    public static function LayTTSP($maSP)
    {
        if (SanPhamDAO::KiemTraSPTonTai($maSP)) {
            return SanPhamDAO::LayTTSP($maSP);
        }
        return false;
    }

    public static function SuaSP($maSP, $tenSP, $thongTin, $giaTien, $soLuongTonKho, $maLoaiSP, $maModel, $size, $mau, $anhMinhHoa, $trangThai, $laTrend)
    {
        if (SanPhamDAO::KiemTraSPTonTai($maSP)) {
            return SanPhamDAO::SuaSP($maSP, $tenSP, $thongTin, $giaTien, $soLuongTonKho, $maLoaiSP, $maModel, $size, $mau, $anhMinhHoa, $trangThai, $laTrend);
        }
        return false;
    }

    public static function XoaSP($maSP)
    {
        if (SanPhamDAO::KiemTraSPTonTai($maSP)) {
            return SanPhamDAO::XoaSP($maSP);
        }
        return false;
    }

    public static function ShowSearchResult($nameSearch)

    {
        return SanPhamDAO::ShowSearchResult($nameSearch);
    }
}