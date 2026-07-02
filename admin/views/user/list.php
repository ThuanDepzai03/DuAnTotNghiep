<?php include_once("views/layouts/header.php"); ?>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Quản lý tài khoản</h4>
            <a href="index.php?action=createuser" class="btn btn-primary btn-sm" style="float:right;">+ Thêm mới</a>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listUser as $u): ?>
                                <tr>
                                    <td class="text-bold-500"><?= $u['id'] ?></td>
                                    <td><?= $u['user'] ?></td>
                                    <td><?= $u['email'] ?></td>
                                    <td>
                                        <?php if ($u['role'] == 1): ?>
                                            <span class="badge bg-success">Admin</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">User</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="index.php?action=edituser&id=<?= $u['id'] ?>" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Sửa
                                        </a>
                                        <a href="index.php?action=deleteuser&id=<?= $u['id'] ?>"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
                                            class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Xóa
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("views/layouts/footer.php"); ?>