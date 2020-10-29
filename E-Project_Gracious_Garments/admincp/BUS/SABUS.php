<?php
require_once "DAO\SADAO.php";

class SABUS
{
    public static function KiemTraMaSATonTai($ID)
    {
        return SADAO::KiemTraMaSATonTai($ID);
    }

    public static function ThemSA($ID, $ID_Account, $FullName, $PhoneNumber, $Address)
    {
        if (!SADAO::KiemTraMaSATonTai($ID)) {
            return SADAO::ThemSA($ID, $ID_Account, $FullName, $PhoneNumber, $Address);
        }
        return false;
    }

    public static function LayDSSA()
    {
        return SADAO::LayDSSA();
    }

    public static function LayTTSA($ID)
    {
        if (SADAO::KiemTraMaSATonTai($ID)) {
            return SADAO::LayTTSA($ID);
        }
        return false;
    }

    public static function SuaSA($ID, $ID_Account, $FullName, $PhoneNumber, $Address)
    {
        if (SADAO::KiemTraMaSATonTai($ID)) {
            return SADAO::SuaSA($ID, $ID_Account, $FullName, $PhoneNumber, $Address);
        }
        return false;
    }

}

