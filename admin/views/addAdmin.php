<div class="main-content">
    <h3 class="title-page">Thêm tài khoản Admin / User</h3>

    <form action="index.php?action=storeuser" method="POST" class="form-add">
        <div class="form-group">
            <label>Tên đăng nhập:</label>
            <input type="text" name="user" class="form-control" required placeholder="Ví dụ: admin2">
        </div>

        <div class="form-group">
            <label>Mật khẩu:</label>
            <input type="password" name="pass" class="form-control" required placeholder="Nhập mật khẩu...">
        </div>

        <div class="form-group">
            <label>Họ và tên / Email:</label>
            <input type="email" name="email" class="form-control" required placeholder="email@gmail.com">
        </div>

        <div class="form-group">
            <label>Địa chỉ:</label>
            <input type="text" name="address" class="form-control" placeholder="Hải Phòng...">
        </div>

        <div class="form-group">
            <label>Số điện thoại:</label>
            <input type="text" name="tel" class="form-control">
        </div>

        <div class="form-group">
            <label>Vai trò (Quyền):</label>
            <select name="role" class="form-control">
                <option value="0">Khách hàng (User)</option>
                <option value="1" selected>Quản trị viên (Admin)</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <button type="submit" name="btn_add" class="btn btn-primary">Thêm mới</button>
            <a href="index.php" class="btn btn-secondary">Hủy bỏ</a>
        </div>
    </form>
</div>

<style>

</style>