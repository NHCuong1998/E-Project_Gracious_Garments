<?php
require_once "connect.php";

class GioHangDAO
{
    public static function DemGHTheoTK($tenTK)
    {
        $sql = "SELECT SUM(SoLuong) AS SoLuong FROM GioHang WHERE TenTaiKhoan = ?";
        $dataType = "s";
        $params = array($tenTK);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["SoLuong"] ?? 0;
    }

    public static function KiemTraGHTonTai($tenTK, $maSP)
    {
        $sql = "SELECT COUNT(*) AS SoLuong FROM GioHang WHERE TenTaiKhoan = ? AND MaSP = ?";
        $dataType = "ss";
        $params = array($tenTK, $maSP);
        return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["SoLuong"] > 0;
    }

    public static function LayDSGHTheoTK($tenTK)
    {
        $sql = "SELECT * FROM GioHang GH INNER JOIN SanPham SP ON GH.MaSP = SP.MaSP WHERE TenTaiKhoan = ? ORDER BY GH.MaSP ASC";
        $dataType = "s";
        $params = array($tenTK);
        return ExecuteSelectQuery($sql, $dataType, $params);
    }

    public static function ThemGH($tenTK, $maSP, $soLuong)
    {
        $sql = "INSERT INTO GioHang (TenTaiKhoan, MaSP, SoLuong) VALUES (?, ?, ?)";
        $dataType = "ssi";
        $params = array($tenTK, $maSP, $soLuong);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

    public static function SuaGH($tenTK, $maSP, $soLuong)
    {
        $sql = "UPDATE GioHang SET SoLuong = ? WHERE TenTaiKhoan = ? AND MaSP = ?";
        $dataType = "sss";
        $params = array($soLuong, $tenTK, $maSP);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

    public static function SuaGH_TangSoLuong($tenTK, $maSP, $soLuong)
    {
        $sql = "UPDATE GioHang SET SoLuong = SoLuong + ? WHERE TenTaiKhoan = ? AND MaSP = ?";
        $dataType = "sss";
        $params = array($soLuong, $tenTK, $maSP);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

    public static function XoaGH($tenTK)
    {
        $sql = "DELETE FROM GioHang WHERE TenTaiKhoan = ?";
        $dataType = "s";
        $params = array($tenTK);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }

    public static function XoaSPTrongGH($tenTK, $maSP)
    {
        $sql = "DELETE FROM GioHang WHERE TenTaiKhoan = ? AND MaSP = ?";
        $dataType = "ss";
        $params = array($tenTK, $maSP);
        return ExecuteNonQuery($sql, $dataType, $params) > 0;
    }
}