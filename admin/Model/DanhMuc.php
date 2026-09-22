<?php 
include_once("pdo.php");

class DanhMuc {
    public function getAll() {
        $sql = "select * from legacy_categories";
        return pdo_query($sql);
    }

    public function insert($ten) {
        $sql = "insert into legacy_categories (name) values (?)";
        pdo_execute($sql, $ten);
    }

    public function getOne($id) {
        $sql = "select * from legacy_categories where id = ?";
        return pdo_query_one($sql, $id);
    }

    public function update($id, $ten) {
        $sql = "update legacy_categories set `name` = ? where id = ?";
        pdo_execute($sql, $ten, $id);
    }

    
    public function delete($id) {
        $sql = "update legacy_categories set deleted = 1 where id = ?";
        pdo_execute($sql, $id);
    }    
    public function restore($id) {
        $sql = "update legacy_categories set deleted = 0 where id = ?";
        pdo_execute($sql, $id);
    }
}

?>