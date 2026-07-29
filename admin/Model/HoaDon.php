<?php
include_once("pdo.php");

class HoaDon
{
    // --- 1. CÁC HÀM CƠ BẢN (CRUD) ---
    public function getAll()
    {
        $sql = "select * from hoadon ORDER BY id DESC";
        return pdo_query($sql);
    }
    public function getOne($id)
    {
        $sql = "select * from hoadon where id = ?";
        return pdo_query_one($sql, $id);
    }

    public function updateStatus($id, $trangthai)
    {
        $sql = "UPDATE hoadon SET trangthai = ? WHERE id = ?";
        pdo_execute($sql, $trangthai, $id);
    }
    public function getAllCthdByIdHoaDon($id_hoadon)
    {
        $sql = "SELECT ct.*, sp.name, sp.img FROM chitiethoadon ct JOIN sanpham sp ON ct.id_sanpham = sp.id WHERE ct.id_hoadon = ?";
        return pdo_query($sql, $id_hoadon);
    }
    // --- HÀM LỌC  ---
    public function getAllByFilter($keyword = "", $trangthai = "", $dateFrom = "", $dateTo = "")
    {
        $sql = "SELECT * FROM hoadon WHERE 1=1";
        $params = [];

        // 1. Lọc theo tên hoặc SĐT
        if (!empty($keyword)) {
            $sql .= " AND (tenkhachhang LIKE ? OR sdt LIKE ?)";
            $params[] = "%$keyword%";
            $params[] = "%$keyword%";
        }

        // 2. Lọc theo trạng thái (Kiểm tra khác rỗng vì trạng thái 0 vẫn là hợp lệ)
        if ($trangthai !== "") {
            $sql .= " AND trangthai = ?";
            $params[] = $trangthai;
        }

        // 3. Lọc theo ngày bắt đầu
        if (!empty($dateFrom)) {
            $sql .= " AND DATE(ngaygiodat) >= ?";
            $params[] = $dateFrom;
        }

        // 4. Lọc theo ngày kết thúc
        if (!empty($dateTo)) {
            $sql .= " AND DATE(ngaygiodat) <= ?";
            $params[] = $dateTo;
        }

        $sql .= " ORDER BY id DESC";

        return pdo_query($sql, ...$params);
    }

    // --- 2. CÁC HÀM THỐNG KÊ (DASHBOARD) ---

    // Đếm tổng đơn
    public function getCount()
    {
        $sql = "SELECT count(*) as total FROM hoadon";
        $row = pdo_query_one($sql);
        return $row['total'];
    }

    // Doanh thu HÔM NAY
    public function getDoanhThuHomNay()
    {
        $sql = "SELECT SUM(tongtien) as total FROM hoadon WHERE trangthai = 2 AND DATE(ngaygiodat) = CURDATE()";
        $row = pdo_query_one($sql);
        return $row['total'] ?? 0;
    }

    // Doanh thu 30 NGÀY QUA (Tháng này)
    public function getDoanhThu30DayAgo()
    {
        $sql = "SELECT SUM(tongtien) as total FROM hoadon WHERE trangthai = 2 AND ngaygiodat >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
        $row = pdo_query_one($sql);
        return $row['total'] ?? 0;
    }

    // Doanh thu NĂM NAY
    public function getDoanhThuNamNay()
    {
        $sql = "SELECT SUM(tongtien) as total FROM hoadon WHERE trangthai = 2 AND YEAR(ngaygiodat) = YEAR(CURDATE())";
        $row = pdo_query_one($sql);
        return $row['total'] ?? 0;
    }

    // Tổng doanh thu TOÀN THỜI GIAN
    public function getTongDoanhThu()
    {
        $sql = "SELECT SUM(tongtien) as total FROM hoadon WHERE trangthai = 2";
        $row = pdo_query_one($sql);
        return $row['total'] ?? 0;
    }

    // Dữ liệu BIỂU ĐỒ 30 NGÀY
    public function getDuLieuBieuDo30Day()
    {
        $sql = "SELECT DATE(ngaygiodat) as ngay, SUM(tongtien) as tong_tien 
                FROM hoadon WHERE trangthai = 2 AND ngaygiodat >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)
                GROUP BY DATE(ngaygiodat) ORDER BY ngay ASC";
        return pdo_query($sql);
    }

    // Dữ liệu BIỂU ĐỒ 1 NĂM
    public function getDuLieuBieuDoYear()
    {
        $sql = "SELECT DATE_FORMAT(ngaygiodat, '%Y-%m') as thang, SUM(tongtien) as tong_tien 
                FROM hoadon WHERE trangthai = 2 AND ngaygiodat >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)
                GROUP BY DATE_FORMAT(ngaygiodat, '%Y-%m') ORDER BY thang ASC";
        return pdo_query($sql);
    }

    // Dữ liệu BIỂU ĐỒ 999 NGÀY
    public function getDuLieuBieuDo999Day()
    {
        $sql = "SELECT DATE(ngaygiodat) as ngay, SUM(tongtien) as tong_tien 
                FROM hoadon WHERE trangthai = 2 AND ngaygiodat >= DATE_SUB(CURDATE(), INTERVAL 999 DAY)
                GROUP BY DATE(ngaygiodat) ORDER BY ngay ASC";
        return pdo_query($sql);
    }
}
