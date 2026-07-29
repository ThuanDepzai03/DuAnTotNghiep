<?php
include_once("Model/UserModel.php");

class UserController
{

    // --- PHẦN 1: ĐĂNG NHẬP / ĐĂNG XUẤT ---
    public function login()
    {
        include "views/login.php";
    }

    public function check_login()
    {
        if (isset($_POST['btn_login'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $userModel = new UserModel();
            $result = $userModel->checkLogin($user, $pass);

            if ($result) {
                $_SESSION['admin_logged'] = true;
                $_SESSION['admin_name'] = $result['hovaten'];
                header("Location: index.php");
            } else {
                $error = "Sai tài khoản hoặc không có quyền Admin!";
                include "views/login.php";
            }
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: index.php?action=login");
    }

    // --- PHẦN 2: QUẢN LÝ TÀI KHOẢN (Danh sách) ---
    public function index()
    {
        $userModel = new UserModel();
        $listUser = $userModel->getAllUsers();
        // Kiểm tra xem file list.php đã tạo chưa, nếu chưa thì tạo ở admin/views/user/list.php
        include "views/user/list.php";
    }

    // --- PHẦN 3: THÊM TÀI KHOẢN ---
    // Đây là hàm mà bạn đang bị báo lỗi thiếu (undefined method create)
    public function create()
    {
        include "views/user/add.php";
    }

    public function store()
    {
        if (isset($_POST['btn_add'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $role = $_POST['role'];

            $userModel = new UserModel();
            $userModel->insertUser($user, $pass, $email, $address, $tel, $role);

            echo "<script>alert('Thêm tài khoản thành công!'); window.location.href='index.php?action=listuser';</script>";
        }
    }

    // --- PHẦN 4: SỬA TÀI KHOẢN ---
    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $userModel = new UserModel();
            $user = $userModel->getUserById($id);
            include "views/user/edit.php";
        }
    }

    public function update()
    {
        if (isset($_POST['btn_update'])) {
            $id = $_POST['id'];
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $role = $_POST['role'];

            $userModel = new UserModel();
            $userModel->updateUser($id, $user, $pass, $email, $address, $tel, $role);

            echo "<script>alert('Cập nhật thành công!'); window.location.href='index.php?action=listuser';</script>";
        }
    }

    // --- PHẦN 5: XÓA TÀI KHOẢN ---
    public function delete()
    {
        if (isset($_GET['id'])) {
            $userModel = new UserModel();
            $userModel->deleteUser($_GET['id']);
            echo "<script>alert('Đã xóa thành công!'); window.location.href='index.php?action=listuser';</script>";
        }
    }
}
