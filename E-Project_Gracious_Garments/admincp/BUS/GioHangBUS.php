<?php
require_once "DAO\GioHangDAO.php";
require_once "DAO\TaiKhoanDAO.php";

class GioHangBUS
{
    public static function DemGHTheoTK($tenTK)
    {
        if (TaiKhoanDAO::KiemTraTKTonTai($tenTK)) {
            return GioHangDAO::DemGHTheoTK($tenTK);
        }
        return 0;
    }

    public static function LayDSGHTheoTK($tenTK)
    {
        if (TaiKhoanDAO::KiemTraTKTonTai($tenTK)) {
            return GioHangDAO::LayDSGHTheoTK($tenTK);
        }
        return false;
    }

    public static function ThemGH($tenTK, $maSP, $soLuong)
    {
        if (TaiKhoanDAO::KiemTraTKTonTai($tenTK)) {
            if (GioHangDAO::KiemTraGHTonTai($tenTK, $maSP)) {
                GioHangDAO::SuaGH_TangSoLuong($tenTK, $maSP, $soLuong);
            } else {
                GioHangDAO::ThemGH($tenTK, $maSP, $soLuong);
            }
        }
        return false;
    }

    public static function SuaGH($tenTK, $maSP, $soLuong)
    {
        if (TaiKhoanDAO::KiemTraTKTonTai($tenTK)) {
            return GioHangDAO::SuaGH($tenTK, $maSP, $soLuong);
        }
        return false;
    }

    public static function XoaGH($tenTK)
    {
        if (TaiKhoanDAO::KiemTraTKTonTai($tenTK)) {
            return GioHangDAO::XoaGH($tenTK);
        }
        return false;
    }

    public static function XoaSPTrongGH($tenTK, $maSP)
    {
        if (TaiKhoanDAO::KiemTraTKTonTai($tenTK)) {
            return GioHangDAO::XoaSPTrongGH($tenTK, $maSP);
        }
        return false;
    }
}