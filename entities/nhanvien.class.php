<?php 
require_once ("./config/db.class.php");
class nhanvien{
        public $nhanvienID;
        public $nhanvienName;
        public $phongbanID;
        public $phai;
        public $luong;
        public $noisinh; 

        public function __construct($nv_id,$nv_name,$phongban_id,$luong,$phai,$noisinh){
            $this->nhanvienID = $nv_id;
            $this->nhanvienName = $nv_name;
            $this->phongbanID = $phongban_id;
            $this->luong = $luong;
            $this->phai = $phai;
            $this->noisinh = $noisinh;
        }
        public function save(){
            $db = new Db();
            $sql = "INSERT INTO NHANVIEN(MA_NV, TEN_NV, PHAI, NOI_SINH, MA_PHONG, LUONG) VALUES
            ('$this->nhanvienID', '$this->nhanvienName', '$this->phai', '$this->noisinh', '$this->phongbanID', '$this->luong')";
            $result = $db->query_execute($sql);
            return $result;
        }
        public static function list_nv(){
            $db = new Db();
            $sql = "SELECT * FROM NHANVIEN";
            $result = $db->select_to_array($sql);
            return $result;
        }
        public static function delete($Ma_NV){
            $db = new Db();
            $sql = "DELETE FROM NHANVIEN WHERE Ma_NV = '$Ma_NV'";
            $result = $db->query_execute($sql);
            return $result;
        }
        
        public function update(){
            $db = new Db();
            $sql = "UPDATE NHANVIEN SET TEN_NV = '$this->nhanvienName', PHAI = '$this->phai', NOI_SINH = '$this->noisinh', MA_PHONG = '$this->phongbanID', LUONG = '$this->luong' WHERE MA_NV = '$this->nhanvienID'";
            $result = $db->query_execute($sql);
            return $result;
        }
}


?>