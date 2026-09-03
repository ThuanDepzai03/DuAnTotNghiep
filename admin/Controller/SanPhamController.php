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
            
            // Lấy tất cả ảnh gallery của sản phẩm
            include_once("Model/ProductImageModel.php");
            $productImageModel = new ProductImageModel();
            $productImages = $productImageModel->getByProductId($id);
            
            // Chuyển đổi đường dẫn ảnh để phù hợp với view
            foreach ($productImages as &$img) {
                $img['img'] = str_replace('\\', '/', $img['img']);
            }
            
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
            
            // Xử lý ảnh đại diện
            if (isset($_FILES['anh']) && $_FILES['anh']['name'] != '') {
                $linkAnhSanPham = $this->sanPham->getOne($id)['img'];
                $imageName = "image/" . uniqid() . "_" . $_FILES['anh']['name'];
                move_uploaded_file($_FILES['anh']['tmp_name'], $imageName);
                if (file_exists($linkAnhSanPham)) {
                    unlink($linkAnhSanPham);
                }
            }
            
            $this->sanPham->update($id, $ten, $gia, $moTa, $idDanhMuc, $imageName);
            
            // Xử lý multiple gallery images
            $this->handleGalleryImages($id);
            
            header("Location:index.php?action=listsanpham");
        }
    }

    /**
     * Xử lý upload multiple gallery images
     */
    private function handleGalleryImages($productId)
    {
        // Xử lý xóa ảnh cũ nếu có
        if (isset($_POST['delete_images'])) {
            $deleteImages = explode(',', $_POST['delete_images']);
            foreach ($deleteImages as $imageId) {
                if (!empty($imageId)) {
                    $this->deleteProductImage(trim($imageId));
                }
            }
        }
        
        // Xử lý upload ảnh mới
        if (isset($_FILES['gallery_images'])) {
            $files = $_FILES['gallery_images'];
            $uploadCount = count($files['name']);
            
            for ($i = 0; $i < $uploadCount; $i++) {
                if ($files['error'][$i] == 0 && $files['size'][$i] > 0) {
                    // Tạo tên file duy nhất
                    $originalName = $files['name'][$i];
                    $imageName = "image/gallery/" . uniqid() . "_" . $originalName;
                    
                    // Tạo folder nếu chưa tồn tại
                    if (!is_dir("image/gallery")) {
                        mkdir("image/gallery", 0755, true);
                    }
                    
                    // Upload file
                    if (move_uploaded_file($files['tmp_name'][$i], $imageName)) {
                        // Lưu vào database
                        $this->saveProductImage($productId, $imageName, $i);
                    }
                }
            }
        }
    }

    /**
     * Lưu ảnh sản phẩm vào database
     */
    private function saveProductImage($productId, $imagePath, $sortOrder = 0)
    {
        include_once("Model/ProductImageModel.php");
        $productImageModel = new ProductImageModel();
        $productImageModel->insert($productId, $imagePath, $sortOrder);
    }

    /**
     * Xóa ảnh sản phẩm
     */
    public function deleteProductImage($imageId)
    {
        include_once("Model/ProductImageModel.php");
        $productImageModel = new ProductImageModel();
        $image = $productImageModel->getOne($imageId);
        
        if ($image && file_exists($image['img'])) {
            unlink($image['img']);
        }
        
        $productImageModel->delete($imageId);
    }

    /**
     * Xóa ảnh sản phẩm (từ form/request)
     */
    public function deleteProductImageAction()
    {
        if (isset($_POST['image_id'])) {
            $this->deleteProductImage($_POST['image_id']);
            header("Location:" . $_SERVER['HTTP_REFERER']);
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
