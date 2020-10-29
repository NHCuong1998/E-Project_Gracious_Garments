<?php 
    require_once "connect.php";

    Class ImageDAO
    {
        public static function CheckImage($username)
        {
            $sql = "SELECT *FROM Account WHERE UserName = ?";
            $dataType = "s";
            $params = array($username);
            return ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc();
        }

        public static function UpImage( $username, $filename)
        {
            $sql = "UPDATE Account SET ProfilePicture = ? WHERE UserName = ?";
            $dataType = "ss";
            $params = array($filename, $username);
            return ExecuteNonQuery($sql, $dataType,$params) ==1;
        }

    }

?>