<?php
include_once("Model/HoaDon.php");

class HoaDonController
{
    private $hoaDon;

    public function __construct()
    {
        $this->hoaDon = new HoaDon();
    }

    // --- PHƯƠNG THỨC LIST (LỌC) ---
    public function index()
    {
        // 1. Lấy dữ liệu từ URL (Form tìm kiếm gửi lên)
        // Dùng toán tử ?? "" để nếu không có dữ liệu thì mặc định là rỗng
        $keyword   = $_GET['keyword'] ?? "";
        $trangthai = $_GET['trangthai'] ?? "";
        $dateFrom  = $_GET['date_from'] ?? "";
        $dateTo    = $_GET['date_to'] ?? "";

        // 2. Gọi Model để lấy danh sách theo điều kiện lọc
        // Hàm getAllByFilter này bạn đã thêm vào Model ở bước trước
        $allHoaDon = $this->hoaDon->getAllByFilter($keyword, $trangthai, $dateFrom, $dateTo);

        // 3. Gửi dữ liệu sang View
        include_once("./views/hoadon/list.php");
    }

    public function chiTietHoaDon()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $hoaDon = $this->hoaDon->getOne($id);
            $allCTHD = $this->hoaDon->getAllCthdByIdHoaDon($id);
            include_once("./views/hoadon/detail.php");
        }
    }

    public function update_status()
    {
        if (isset($_POST['id']) && isset($_POST['trangthai'])) {
            $id = $_POST['id'];
            $trangthai = $_POST['trangthai'];

            // Gọi Model cập nhật
            $this->hoaDon->updateStatus($id, $trangthai);

            // Cập nhật xong reload lại trang chi tiết
            echo "<script>alert('Cập nhật trạng thái thành công!'); window.location.href='index.php?action=chitiethoadon&id=$id';</script>";
        }
    }
}
