<?php include_once("views/layouts/header.php"); ?>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Cập nhật tài khoản</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="index.php?action=updateuser" method="post">
                    <div class="form-body">
                        <div class="row">

                            <input type="hidden" name="id" value="<?= $user['id'] ?>">

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Tên đăng nhập</label>
                                    <input required type="text" class="form-control" name="user"
                                        value="<?= $user['user'] ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input required type="text" class="form-control" name="pass"
                                        value="<?= $user['pass'] ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input required type="email" class="form-control" name="email"
                                        value="<?= $user['email'] ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="address"
                                        value="<?= $user['address'] ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="tel"
                                        value="<?= $user['tel'] ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <fieldset class="form-group">
                                    <label>Vai trò</label>
                                    <select name="role" class="form-select">
                                        <option value="0" <?= $user['role'] == 0 ? 'selected' : '' ?>>Khách hàng (User)</option>
                                        <option value="1" <?= $user['role'] == 1 ? 'selected' : '' ?>>Quản trị viên (Admin)</option>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" name="btn_update" class="btn btn-warning me-1 mb-1">Cập nhật</button>
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