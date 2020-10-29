<?php
require_once "DAO\InvoiceDetailDAO.php";

class IDBUS
{
    public static function KiemTraMaIDTonTai($ID)
    {
        return IDDAO::KiemTraMaIDTonTai($ID);
    }

    public static function ThemID($ID_Invoice, $ID_Product, $Name_Product, $Quantity, $Price)
    {
        if (!IDDAO::KiemTraMaIDTonTai($ID_Invoice)) {
            return IDDAO::ThemID($ID_Invoice, $ID_Product, $Name_Product, $Quantity, $Price);
        }
        return false;
    }

    public static function LayDSID()
    {
        return IDDAO::LayDSID();
    }

    public static function LayTTID($ID)
    {
        if (IDDAO::KiemTraMaIDTonTai($ID)) {
            return IDDAO::LayTTID($ID);
        }
        return false;
    }

    public static function SuaID($ID_Invoice, $ID_Product, $Name_Product, $Quantity, $Price)
    {
        if (IDDAO::KiemTraMaIDTonTai($ID_Invoice)) {
            return IDDAO::SuaID($ID_Invoice, $ID_Product, $Name_Product, $Quantity, $Price);
        }
        return false;
    }
    
}

