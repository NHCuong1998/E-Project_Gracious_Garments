<?php
require_once "DAO\InvoiceDAO.php";

class InvoiceBUS
{
    public static function KiemTraMaInvoiceTonTai($ID)
    {
        return InvoiceDAO::KiemTraMaInvoiceTonTai($ID);
    }

    public static function ThemInvoice($ID, $ID_Account, $Date, $FullName, $Address, $Phone, $Total, $Status)
    {
        if (!InvoiceDAO::KiemTraMaInvoiceTonTai($ID)) {
            return InvoiceDAO::ThemInvoice($ID, $ID_Account, $Date, $FullName, $Address, $Phone, $Total, $Status);
        }
        return false;
    }

    public static function LayDSInvoice()
    {
        return InvoiceDAO::LayDSInvoice();
    }

    public static function LayTTInvoice($ID)
    {
        if (InvoiceDAO::KiemTraMaInvoiceTonTai($ID)) {
            return InvoiceDAO::LayTTInvoice($ID);
        }
        return false;
    }

    public static function SuaInvoice($ID, $ID_Account, $Date, $FullName, $Address, $Phone, $Total, $Status)
    {
        if (InvoiceDAO::KiemTraMaInvoiceTonTai($ID)) {
            return InvoiceDAO::SuaInvoice($ID, $ID_Account, $Date, $FullName, $Address, $Phone, $Total, $Status);
        }
        return false;
    }

    public static function XoaInvoice($ID)
    {
        if (InvoiceDAO::KiemTraMaInvoiceTonTai($ID)) {
            return InvoiceDAO::XoaInvoice($ID);
        }
        return false;
    }
    
}

