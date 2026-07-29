<?php
include_once("views/layouts/header.php");
?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form thêm danh mục</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="index.php?action=storedanhmuc" method="post">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Tên danh mục</label>
                                    <input type="text" id="first-name-vertical" class="form-control" 
                                    name="ten" placeholder="Điền tên danh mục vào đây">
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Thêm</button>
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