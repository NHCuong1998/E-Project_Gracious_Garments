<?php
require_once "DAO\TaiKhoanDAO.php";

class TaiKhoanBUS
{
    public static function ThemTK($username, $mk, $email, $sdt, $diaChi, $hoTen,$gioitinh, $laAdmin, $anhDaiDien, $trangThai)
    {
        if (!TaiKhoanDAO::KiemTraTKTonTai($username)) {
            return TaiKhoanDAO::ThemTK($username, $mk, $email, $sdt, $diaChi, $hoTen,$gioitinh, $laAdmin, $anhDaiDien, $trangThai);
        }
        return false;
    }

    public static function DangNhap($username, $mk)
    {
        if (TaiKhoanDAO::KiemTraTKTonTai($username)) {
            return $mk == TaiKhoanDAO::LayMK($username);
        }
        return false;
    }

    public static function SuaThongTin($username, $password, $email, $phonenumber, $address, $fullname, $gender, $isadmin, $status)
    {
        TaiKhoanDAO::SuaThongTin($username, $password, $email, $phonenumber, $address, $fullname, $gender, $isadmin, $status);      
    }
    
    public static function LayThongTinTKadmin($username)
    {
        return TaiKhoanDAO::LayThongTinTKadmin($username);
    }

    public static function LayThongTinTK($username)
    {
        return TaiKhoanDAO::LayThongTinTK($username);
    }

    public static function XoaTK($ID)
    {
        return TaiKhoanDAO::XoaTK($ID);
    }

    public static function LayDSTaiKhoan()
    {
        return TaiKhoanDAO::LayDSTaiKhoan();
    }
}
