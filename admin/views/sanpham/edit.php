<?php
include_once("views/layouts/header.php");
?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form sửa sản phẩm</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="index.php?action=updatesanpham" enctype="multipart/form-data" method="post">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <fieldset class="form-group">
                                    <label for="first-name-vertical">Danh mục</label>
                                    <select name="danhmuc" class="form-select" id="basicSelect">
                                        <?php foreach ($allDanhMuc as $item) { ?>
                                            <option <?= $sanPham['iddm'] == $item['id'] ? "selected" : "" ?>  value="<?=  $item['id'] ?>"><?=  $item['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Tên sản phẩm</label>
                                    <input  required type="text" id="first-name-vertical" class="form-control" name="ten"
                                        placeholder="Điền tên sản phẩm vào đây" value="<?=  $sanPham['name'] ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Giá sản phẩm</label>
                                    <input required type="number" id="first-name-vertical" class="form-control" name="gia"
                                        placeholder="Điền giá sản phẩm vào đây" value="<?=  $sanPham['price'] ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Ảnh sản phẩm</label>
                                    <input  type="file" id="first-name-vertical" class="form-control" name="anh">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Mô tả sản phẩm</label>
                                    <input required type="text" id="first-name-vertical" class="form-control" name="mota"
                                        placeholder="Điền mô tả sản phẩm vào đây" value="<?=  $sanPham['mota'] ?>">
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?= $sanPham['id'] ?>">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Sửa</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Làm mới</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once("views/layouts/footer.php");
?>