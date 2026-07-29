<?php

use function PHPSTORM_META\map;

include_once("Model/SanPham.php");
class SanPhamController
{
    private $sanPham;
    private $danhMuc;

    public function __construct()
    {
        $this->sanPham = new SanPham();
        $this->danhMuc = new DanhMuc();
    }

    // Phương thức list
    public function index()
    {
        $allSanPham = $this->sanPham->getAll();
        foreach ($allSanPham as $key => $item) {
            $allSanPham[$key]['tendanhmuc'] = $this->danhMuc->getOne($item['iddm'])['name'];
        }
        include_once("./views/sanpham/list.php");
    }

    public function create()
    {
        $allDanhMuc = $this->danhMuc->getAll();
        include_once("./views/sanpham/create.php");
    }

    public function store()
    {
        if (isset($_POST['ten'])) {
            $ten = $_POST['ten'];
            $gia = $_POST['gia'];
            $moTa = $_POST['mota'];
            $idDanhMuc = $_POST['danhmuc'];
            if (isset($_FILES['anh'])) {
                // B1:xem có ảnh gửi đến không
                // B2: Đặt lại tên ảnh bao gồm cả đường dẫn (Để không trùng khi vào db)
                $imageName = "image/" . uniqid() . "_" . $_FILES['anh']['name'];
                move_uploaded_file($_FILES['anh']['tmp_name'], $imageName);
                var_dump($imageName);
                $this->sanPham->insert($ten, $gia, $moTa, $idDanhMuc, $imageName); // Gọi function insert ở model.
            }
            header("Location:index.php"); // Điều hướng trở lại trang index
        }
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $allDanhMuc = $this->danhMuc->getAll();
            $id = $_GET['id'];
            $sanPham = $this->sanPham->getOne($id);
            include_once("./views/sanpham/edit.php");
        }
    }

    public function update()
    {
        if (isset($_POST['ten'])) {
            $id = $_POST['id'];
            $ten = $_POST['ten'];
            $gia = $_POST['gia'];
            $moTa = $_POST['mota'];
            $idDanhMuc = $_POST['danhmuc'];
            $imageName = null;
            if (isset($_FILES['anh']) && $_FILES['anh']['name'] != '') {
                $linkAnhSanPham = $this->sanPham->getOne($id)['img'];
                $imageName = "image/" . uniqid() . "_" . $_FILES['anh']['name'];
                move_uploaded_file($_FILES['anh']['tmp_name'], $imageName);
                if (file_exists($linkAnhSanPham)) {
                    unlink($linkAnhSanPham);
                }
            }
            $this->sanPham->update($id, $ten, $gia, $moTa, $idDanhMuc, $imageName); // Gọi function insert ở model.
            header("Location:index.php?action=listsanpham"); // Điều hướng trở lại trang index
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->sanPham->delete($id);
            header("Location:index.php?action=listsanpham");
        }
    }

    public function restore()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->sanPham->restore($id);
            header("Location:index.php?action=listsanpham");
        }
    }
}
