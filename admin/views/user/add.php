<?php include_once("views/layouts/header.php"); ?>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Thêm tài khoản Admin / User</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="index.php?action=storeuser" method="post">
                    <div class="form-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Tên đăng nhập (Username)</label>
                                    <input required type="text" name="user" class="form-control" placeholder="Ví dụ: admin123">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input required type="password" name="pass" class="form-control" placeholder="Nhập mật khẩu...">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input required type="email" name="email" class="form-control" placeholder="name@example.com">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ...">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" name="tel" class="form-control" placeholder="0912345678">
                                </div>
                            </div>

                            <div class="col-12">
                                <fieldset class="form-group">
                                    <label>Vai trò</label>
                                    <select name="role" class="form-select">
                                        <option value="0">Khách hàng (User)</option>
                                        <option value="1">Quản trị viên (Admin)</option>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" name="btn_add" class="btn btn-primary me-1 mb-1">Thêm tài khoản</button>
                                <a href="index.php?action=listuser" class="btn btn-light-secondary me-1 mb-1">Hủy bỏ</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once("views/layouts/footer.php"); ?>