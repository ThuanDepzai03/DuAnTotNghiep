<?php 
include_once("pdo.php");

class DanhMuc {
    public function getAll() {
        $sql = "select * from danhmuc";
        return pdo_query($sql);
    }

    public function insert($ten) {
        $sql = "insert into danhmuc (name) values (?)";
        pdo_execute($sql, $ten);
    }

    public function getOne($id) {
        $sql = "select * from danhmuc where id = ?";
        return pdo_query_one($sql, $id);
    }

    public function update($id, $ten) {
        $sql = "update danhmuc set `name` = ? where id = ?";
        pdo_execute($sql, $ten, $id);
    }

    
    public function delete($id) {
        $sql = "update danhmuc set deleted = 1 where id = ?";
        pdo_execute($sql, $id);
    }    
    public function restore($id) {
        $sql = "update danhmuc set deleted = 0 where id = ?";
        pdo_execute($sql, $id);
    }
}

?>