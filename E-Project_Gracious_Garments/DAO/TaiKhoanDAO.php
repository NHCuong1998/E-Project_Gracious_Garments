<?php
require_once "connect.php";

class TaiKhoanDAO
{
    public static function KiemTraTKTonTai($username)
    {
        $sql = "SELECT COUNT(*) AS SoLuong FROM Account WHERE UserName = ?";
        $dataType = "s";
        $params = array($username);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["SoLuong"] > 0;
    }

    public static function ThemTK($username, $mk, $email, $sdt, $diaChi, $hoTen,$gioitinh, $laAdmin, $anhDaiDien, $trangThai)
    {
        $sql = "INSERT INTO account (username, Password, Email, phonenumber, address, fullname ,gender, isadmin, profilepicture, status) VALUES (?, ?, ?,?,?,?,?,?,?,? )";
        $dataType = "sssssssisi";
        $params = array($username, $mk, $email, $sdt, $diaChi, $hoTen,$gioitinh, $laAdmin, $anhDaiDien, $trangThai);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

    public static function LayMK($username)
    {
        $sql = "SELECT Password FROM Account WHERE UserName = ?";
        $dataType = "s";
        $params = array($username);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["Password"];
    }

    public static function SuaThongTin($username, $password, $email, $phonenumber, $address, $fullname, $gender, $isadmin, $status)
    {
        $sql = "UPDATE Account SET PassWord = ?, Email = ?, PhoneNumber = ?, Address = ?, FullName = ?, Gender = ?, IsAdmin = ?, Status = ? WHERE UserName = ?" ;
        $dataType = "ssssssiis";
        $params = array($password, $email, $phonenumber, $address, $fullname, $gender, $isadmin, $status, $username);
        return ExecuteNonQuery($sql, $dataType, $params) == 1;
    }
    public static function LayThongTinTK($username){
        $sql = "SELECT * FROM Account Where UserName = ? ";
        $dataType = "s";
        $params = array($username);
        return ExecuteSelectQuery($sql, $dataType, $params);
    }

    public static function LayThongTinTKAdmin($username){
        $sql = "SELECT * FROM Account Where UserName = ? ";
        $dataType = "s";
        $params = array($username);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc();
    }

    public static function XoaTK($ID)
    {
        $sql = "UPDATE Account SET Status = 0 WHERE ID = ?";
        $dataType = "s";
        $params = array($ID);
        return ExecuteNonQuery($sql, $dataType, $params) == 1;
    }

    public static function LayDSTaiKhoan()
    {
        $sql = "SELECT * FROM ACcount";
        return ExecuteSelectQuery($sql);
    }

    

} 