<?php
require_once "connect.php";

class TaiKhoanDAO
{
    public static function KiemTraTKTonTai($tenTK)
    {
        $sql = "SELECT COUNT(*) AS SoLuong FROM Account WHERE UserName = ?";
        $dataType = "s";
        $params = array($tenTK);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["SoLuong"] > 0;
    }

    public static function ThemTK($tenTK, $mk, $email, $sdt, $diaChi, $hoTen, $gioiTinh, $laAdmin, $anhDaiDien, $trangThai)
    {
        $sql = "INSERT INTO Account (UserName, Password, Email, PhoneNumber, Address, FullName, Gender, IsAdmin, ProfilePicture, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $dataType = "sssssssisi";
        $params = array($tenTK, $mk, $email, $sdt, $diaChi, $hoTen, $gioiTinh, $laAdmin, $anhDaiDien, $trangThai);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

    public static function LayDSTK()
    {
        $sql = "SELECT * FROM Account";
        return ExecuteSelectQuery($sql);
    }

    public static function LayTTTK($tenTK)
    {
        $sql = "SELECT * FROM Account WHERE UserName = ?";
        $dataType = "s";
        $params = array($tenTK);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc();
    }

    public static function LayMK($tenTK)
    {
        $sql = "SELECT Password FROM Account WHERE UserName = ?";
        $dataType = "s";
        $params = array($tenTK);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["Password"];
    }

    public static function SuaTK($tenTK, $mk, $email, $sdt, $diaChi, $hoTen, $gioiTinh, $laAdmin, $anhDaiDien, $trangThai)
    {
        $sql = "UPDATE Account SET Password = ?, Email = ?, PhoneNumber = ?, Address = ?, FullName = ?, Gender = ?,  IsAdmin = ?, ProfilePicture = ?, Status = ? WHERE UserName = ?";
        $dataType = "ssssssisis";
        $params = array($mk, $email, $sdt, $diaChi, $hoTen, $gioiTinh, $laAdmin, $anhDaiDien, $trangThai, $tenTK);
        return ExecuteNonQuery($sql, $dataType, $params) >= 0; 
    }

    public static function XoaTK($tenTK)
    {
        $sql = "UPDATE Account SET Status = 0 WHERE UserName = ?";
        $dataType = "s";
        $params = array($tenTK);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

    public static function LayThongTinTKAdmin($username){
        $sql = "SELECT * FROM Account Where UserName = ? ";
        $dataType = "s";
        $params = array($username);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc();
    }
}