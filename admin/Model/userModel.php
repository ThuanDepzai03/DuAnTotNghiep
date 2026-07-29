<?php
include_once("pdo.php");

class UserModel
{

    // 1. Kiểm tra đăng nhập
    public function checkLogin($user, $pass)
    {
        $sql = "SELECT * FROM nguoidung WHERE user = ? AND pass = ? AND role = 1";
        return pdo_query_one($sql, $user, $pass);
    }

    // 2. Lấy danh sách tất cả user (Để hiện ra bảng danh sách)
    public function getAllUsers()
    {
        $sql = "SELECT * FROM nguoidung ORDER BY id DESC";
        return pdo_query($sql);
    }

    // 3. Lấy 1 user theo ID (Để sửa)
    public function getUserById($id)
    {
        $sql = "SELECT * FROM nguoidung WHERE id = ?";
        return pdo_query_one($sql, $id);
    }

    // --- ĐÂY LÀ HÀM BẠN ĐANG THIẾU ---
    // 4. Thêm tài khoản mới
    public function insertUser($user, $pass, $email, $address, $tel, $role)
    {
        $sql = "INSERT INTO nguoidung(user, pass, email, address, tel, role) VALUES(?, ?, ?, ?, ?, ?)";
        pdo_execute($sql, $user, $pass, $email, $address, $tel, $role);
    }

    // 5. Cập nhật tài khoản
    public function updateUser($id, $user, $pass, $email, $address, $tel, $role)
    {
        $sql = "UPDATE nguoidung SET user=?, pass=?, email=?, address=?, tel=?, role=? WHERE id=?";
        pdo_execute($sql, $user, $pass, $email, $address, $tel, $role, $id);
    }

    // 6. Xóa tài khoản
    public function deleteUser($id)
    {
        $sql = "DELETE FROM nguoidung WHERE id=?";
        pdo_execute($sql, $id);
    }
    //  Đếm tổng thành viên
    public function getCount()
    {
        $sql = "SELECT count(*) as total FROM nguoidung";
        $row = pdo_query_one($sql);
        return $row['total'];
    }
}
