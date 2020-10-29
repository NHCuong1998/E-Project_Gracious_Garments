<?php
require_once "DAO\ModelDAO.php";

class ModelBUS
{  
    public static function KiemTraMaModelTonTai($maModel)
    {
        return ModelDAO::KiemTraMaModelTonTai($maModel);
    }
    public static function LayDSModel()
    {
        return ModelDAO::LayDSModel();
    }

    public static function ThemModel($maSP, $tenSP, $ID_ProductType, $ID_Brand)
    {
        if (!ModelDAO::KiemTraMaModelTonTai($maSP)) {
            return ModelDAO::ThemModel($maSP, $tenSP, $ID_ProductType, $ID_Brand);
        }
        return false;
    }

    public static function LayTTModel($maSP)
    {
        if (ModelDAO::KiemTraMaModelTonTai($maSP)) {
            return ModelDAO::LayTTModel($maSP);
        }
        return false;
    }

    public static function SuaModel($maSP, $tenSP, $ID_ProductType, $ID_Brand)
    {
        if (ModelDAO::KiemTraMaModelTonTai($maSP)) {
            return ModelDAO::SuaModel($maSP, $tenSP, $ID_ProductType, $ID_Brand);
        }
        return false;
    }

}

