<?php include_once("views/layouts/header.php"); ?>

<style>
    .filter-card {
        background-color: #1c1f2b !important;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        border: 1px solid #3a3f50;
    }

    .form-control,
    .form-select {
        background-color: #2a2f40 !important;
        border: 1px solid #3a3f50 !important;
        color: #fff !important;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #ff2e63 !important;
        box-shadow: none;
    }

    label {
        font-weight: 600;
        color: #e2e8f0;
        margin-bottom: 5px;
        font-size: 0.9rem;
    }

    ::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }

    /* Icon lịch màu trắng */
</style>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Quản lý hóa đơn</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hóa Đơn</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">

        <div class="filter-card">
            <form action="index.php" method="GET">
                <input type="hidden" name="action" value="listhoadon">

                <div class="row">
                    <div class="col-md-3 mb-2">
                        <label>Từ khóa</label>
                        <input type="text" name="keyword" class="form-control"
                            value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>"
                            placeholder="Tên khách, SĐT...">
                    </div>

                    <div class="col-md-3 mb-2">
                        <label>Trạng thái</label>
                        <select name="trangthai" class="form-select">
                            <option value="">-- Tất cả --</option>
                            <?php foreach (Helper::TRANGTHAITHANHTOAN as $key => $val): ?>
                                <option value="<?= $key ?>"
                                    <?= (isset($_GET['trangthai']) && $_GET['trangthai'] !== "" && $_GET['trangthai'] == $key) ? 'selected' : '' ?>>
                                    <?= $val ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-2 mb-2">
                        <label>Từ ngày</label>
                        <input type="date" name="date_from" class="form-control"
                            value="<?= $_GET['date_from'] ?? '' ?>">
                    </div>

                    <div class="col-md-2 mb-2">
                        <label>Đến ngày</label>
                        <input type="date" name="date_to" class="form-control"
                            value="<?= $_GET['date_to'] ?? '' ?>">
                    </div>

                    <div class="col-md-2 mb-2 d-flex align-items-end gap-2">
                        <button type="submit" class="btn btn-primary w-100" style="background: linear-gradient(90deg, #ff2e63, #ff4d7a); border:none;">
                            <i class="bi bi-search"></i> Lọc
                        </button>
                        <a href="index.php?action=listhoadon" class="btn btn-secondary" title="Reset">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Khách Hàng</th>
                                <th>SĐT</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($allHoaDon)): ?>
                                <?php foreach ($allHoaDon as $item): ?>
                                    <tr>
                                        <td>#<?= $item['id'] ?></td>
                                        <td><?= $item['tenkhachhang'] ?></td>
                                        <td><?= $item['sdt'] ?></td>
                                        <td><?= date("d/m/Y H:i", strtotime($item['ngaygiodat'])) ?></td>
                                        <td style="color: #ff2e63; font-weight: bold;">
                                            <?= number_format($item['tongtien']) ?> ₫
                                        </td>
                                        <td>
                                            <?php
                                            // Hiển thị trạng thái bằng Badge màu sắc cho đẹp
                                            $statusColors = [
                                                0 => 'bg-info',      // Mới đặt
                                                1 => 'bg-warning',   // Đang giao
                                                2 => 'bg-success',   // Thành công
                                                3 => 'bg-danger',    // Đã hủy
                                                4 => 'bg-secondary'  // Hoàn trả
                                            ];
                                            $bgClass = $statusColors[$item['trangthai']] ?? 'bg-secondary';
                                            ?>
                                            <span class="badge <?= $bgClass ?>">
                                                <?= Helper::TRANGTHAITHANHTOAN[$item['trangthai']] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="index.php?action=chitiethoadon&id=<?= $item['id'] ?>" class="btn btn-sm btn-primary">
                                                <i class="bi bi-eye"></i> Chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center py-4">Không tìm thấy đơn hàng nào phù hợp!</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
</div>

<?php include_once("views/layouts/footer.php"); ?>