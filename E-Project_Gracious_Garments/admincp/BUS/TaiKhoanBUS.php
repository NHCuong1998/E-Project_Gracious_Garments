<?php
require_once "DAO\TaiKhoanDAO.php";

class TaiKhoanBUS
{
    public static function ThemTK($tenTK, $mk, $email, $sdt, $diaChi, $hoTen, $gioiTinh, $laAdmin, $anhDaiDien, $trangThai)
    {
        if (!TaiKhoanDAO::KiemTraTKTonTai($tenTK)) {
            return TaiKhoanDAO::ThemTK($tenTK, $mk, $email, $sdt, $diaChi, $hoTen, $gioiTinh, $laAdmin, $anhDaiDien, $trangThai);
        }
        return false;
    }

    public static function DangNhap($tenTK, $mk)
    {
        if (TaiKhoanDAO::KiemTraTKTonTai($tenTK)) {
            return $mk == TaiKhoanDAO::LayMK($tenTK);
        }
        return false;
    }

    public static function LayDSTK()
    {
        return TaiKhoanDAO::LayDSTK();
    }

    public static function LayTTTK($tenTK)
    {
        if (TaiKhoanDAO::KiemTraTKTonTai($tenTK)) {
            return TaiKhoanDAO::LayTTTK($tenTK);
        }
        return false;
    }

    public static function SuaTK($tenTK, $mk, $email, $sdt, $diaChi, $hoTen, $gioiTinh, $laAdmin, $anhDaiDien, $trangThai)
    {
        if (TaiKhoanDAO::KiemTraTKTonTai($tenTK)) {
            return TaiKhoanDAO::SuaTK($tenTK, $mk, $email, $sdt, $diaChi, $hoTen, $gioiTinh, $laAdmin, $anhDaiDien, $trangThai);
        }
        return false;
    }

    public static function XoaTK($tenTK)
    {
        if (TaiKhoanDAO::KiemTraTKTonTai($tenTK)) {
            return TaiKhoanDAO::XoaTK($tenTK);
        }
        return false;
    }

    public static function LayThongTinTKadmin($username)
    {
        return TaiKhoanDAO::LayThongTinTKadmin($username);
    }
}