<?php 
    require_once "DAO\ImageDAO.php";

    Class ImageBUS
    {   
        public static function CheckImage($username)
        { 
            return ImageDAO::CheckImage($username);
            
        }

        public static function UpImageBUS($username, $filename)
        {
            return ImageDAO::UpImage($username, $filename);
        }


    }
?>