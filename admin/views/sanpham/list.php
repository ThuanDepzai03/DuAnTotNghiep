<?php
include_once("views/layouts/header.php");
?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Quản lý sản phẩm</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <a href="?action=createsanpham" class="btn btn-primary"> Thêm </a>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th class="col-1">Id</th>
                            <th class="col-1">Danh mục</th>
                            <th class="col-2">Tên sản phẩm</th>
                            <th class="col-1">Giá sp</th>
                            <th class="col-2">Ảnh</th>
                            <th class="col-3">Mô tả</th>
                            <th class="col-2">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allSanPham as $item) { ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['tendanhmuc'] ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['price'] ?></td>
                                <td><img width="100px" src="./<?= $item['img'] ?>" alt=""></td>
                                <td><?= $item['mota'] ?></td>
                                <td>
                                    <a href="index.php?action=editsanpham&id=<?= $item['id'] ?>"
                                        class="btn btn-secondary">Sửa</a>
                                    <?php if ($item['deleted'] == 0) { ?>
                                        <a href="index.php?action=deletesanpham&id=<?= $item['id'] ?>"
                                           onclick="return confirm('Bạn có muốn xóa không?')" class="btn btn-danger">Xóa</a>
                                    <?php } else { ?>
                                        <a href="index.php?action=restoresanpham&id=<?= $item['id'] ?>"
                                           onclick="return confirm('Bạn có muốn khôi phục không?')" class="btn btn-warning">Khôi phục</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
<?php
include_once("views/layouts/footer.php");
?>