<?php include_once("views/layouts/header.php"); ?>

<div class="col-12">
    <div class="card" style="background-color: #1c1f2b; color: #ffffff;">
        <div class="card-header" style="background-color: #1c1f2b; border-bottom: 1px solid #3a3f50;">
            <h4 class="card-title" style="color: #ffffff;">Chi tiết hoá đơn số #<?= $id ?></h4>
            <a href="index.php?action=listhoadon" class="btn btn-primary btn-sm" style="float:right;">Quay lại danh sách</a>
        </div>
        <div class="card-content">
            <div class="card-body">

                <div class="form-body" style="background-color: #1c1f2b; padding: 20px; border-radius: 8px;">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label style="color: #e2e8f0; font-weight: 600;">Tên khách hàng</label>
                                <input value="<?= $hoaDon['tenkhachhang'] ?>" type="text" class="form-control" readonly style="background-color: #2a2f40; color: #ffffff; border: 1px solid #3a3f50;">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label style="color: #e2e8f0; font-weight: 600;">Số điện thoại</label>
                                <input value="<?= $hoaDon['sdt'] ?>" type="text" class="form-control" readonly style="background-color: #2a2f40; color: #ffffff; border: 1px solid #3a3f50;">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label style="color: #e2e8f0; font-weight: 600;">Địa chỉ giao hàng</label>
                                <input value="<?= $hoaDon['diachi'] ?>" type="text" class="form-control" readonly style="background-color: #2a2f40; color: #ffffff; border: 1px solid #3a3f50;">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label style="color: #e2e8f0; font-weight: 600;">Ngày đặt</label>
                                <input value="<?= $hoaDon['ngaygiodat'] ?>" type="text" class="form-control" readonly style="background-color: #2a2f40; color: #ffffff; border: 1px solid #3a3f50;">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label style="color: #e2e8f0; font-weight: 600;">Thanh toán</label>
                                <input value="<?= $hoaDon['pttt'] == 0 ? "Tiền mặt (COD)" : "Chuyển khoản" ?>" type="text" class="form-control" readonly style="background-color: #2a2f40; color: #ffffff; border: 1px solid #3a3f50;">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label style="font-weight: bold; color: #ff2e63;">Cập nhật Trạng thái</label>
                                <form action="index.php?action=update_status" method="POST" class="d-flex gap-2">
                                    <input type="hidden" name="id" value="<?= $hoaDon['id'] ?>">
                                    <select name="trangthai" id="select_trangthai" class="form-select" style="background-color: #2a2f40; color: #ffffff; border: 1px solid #3a3f50;">
                                        <option value="0" <?= $hoaDon['trangthai'] == 0 ? 'selected' : '' ?>>Đơn hàng mới</option>
                                        <option value="1" <?= $hoaDon['trangthai'] == 1 ? 'selected' : '' ?>>Đang Giao</option>
                                        <option value="2" <?= $hoaDon['trangthai'] == 2 ? 'selected' : '' ?>>Thành Công</option>
                                        <option value="3" <?= $hoaDon['trangthai'] == 3 ? 'selected' : '' ?>>Đã Hủy</option>
                                        <option value="4" <?= $hoaDon['trangthai'] == 4 ? 'selected' : '' ?>>Hoàn trả</option>
                                    </select>
                                    <button type="submit" class="btn btn-warning btn-sm">Lưu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <hr style="border-color: #3a3f50;">

                <h5 class="mt-4" style="color: #ffffff;">Sản phẩm đã mua</h5>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0" style="color: #ffffff; border-color: #3a3f50;">
                        <thead style="background-color: #2a2f40;">
                            <tr>
                                <th style="color: #ffffff;">Ảnh</th>
                                <th style="color: #ffffff;">Tên sản phẩm</th>
                                <th style="color: #ffffff;">Số lượng</th>
                                <th style="color: #ffffff;">Đơn giá</th>
                                <th style="color: #ffffff;">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($allCTHD) && is_array($allCTHD)):
                                foreach ($allCTHD as $sp):
                                    $thanhTien = $sp['gia'] * $sp['soluong'];
                            ?>
                                    <tr style="background-color: #1c1f2b;">
                                        <td>
                                            <img src="../admin/<?= htmlspecialchars($sp['img'] ?? '') ?>" width="50" style="object-fit: contain; border-radius: 4px;">
                                        </td>
                                        <td><?= $sp['name'] ?></td>
                                        <td><?= $sp['soluong'] ?></td>
                                        <td><?= number_format($sp['gia']) ?> ₫</td>
                                        <td style="font-weight:bold; color: #ff2e63;"><?= number_format($thanhTien) ?> ₫</td>
                                    </tr>
                            <?php endforeach;
                            endif; ?>

                            <tr style="background-color: #2a2f40;">
                                <td colspan="4" class="text-end" style="font-weight: bold; color: #ffffff;">TỔNG THANH TOÁN:</td>
                                <td style="font-weight: bold; color: #ff2e63; font-size: 1.2em;">
                                    <?= number_format($hoaDon['tongtien']) ?> VND
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("views/layouts/footer.php"); ?>

<script>
    var trangThaiHienTai = <?= $hoaDon['trangthai'] ?>;
    var menu = document.getElementById('select_trangthai');
    for (var i = 0; i < menu.options.length; i++) {
        if (parseInt(menu.options[i].value) < trangThaiHienTai) {
            menu.options[i].disabled = true;
            menu.options[i].style.color = "#666"; // Màu xám cho option bị disable
        }
    }
</script>