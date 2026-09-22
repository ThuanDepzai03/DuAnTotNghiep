<?php
include_once("pdo.php");

class SanPham
{
    public function getAll()
    {
        $sql = "select * from legacy_products";
        return pdo_query($sql);
    }

    public function insert($ten, $gia, $moTa, $idDanhMuc, $anh)
    {
        $sql = "insert into legacy_products (name, price, img, mota, iddm) values (?, ?, ?, ?, ?)";
        pdo_execute($sql, $ten, $gia, $anh, $moTa, $idDanhMuc);
    }

    public function getOne($id)
    {
        $sql = "select * from legacy_products where id = ?";
        return pdo_query_one($sql, $id);
    }

    public function update($id, $ten, $gia, $moTa, $idDanhMuc, $anh)
    {
        if ($anh == null) {
            $sql = "update legacy_products set `name` = ?, price = ?, mota = ?, iddm = ? where id = ?";
            pdo_execute($sql, $ten, $gia, $moTa, $idDanhMuc, $id);
        } else {
            $sql = "update legacy_products set `name` = ?, price = ?, img = ?, mota = ?, iddm = ? where id = ?";
            pdo_execute($sql, $ten, $gia, $anh, $moTa, $idDanhMuc, $id);
        }
    }


    public function delete($id)
    {
        $sql = "update legacy_products set deleted = 1 where id = ?";
        pdo_execute($sql, $id);
    }
    public function restore($id)
    {
        $sql = "update legacy_products set deleted = 0 where id = ?";
        pdo_execute($sql, $id);
    }
    public function getCount()
    {
        $sql = "SELECT count(*) as total FROM legacy_products WHERE deleted = 0";
        $row = pdo_query_one($sql);
        return $row['total'];
    }
}
