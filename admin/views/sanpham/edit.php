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

                            <!-- PHẦN ẢNH ĐẠI DIỆN -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Ảnh đại diện sản phẩm</label>
                                    <input  type="file" id="first-name-vertical" class="form-control" name="anh" accept="image/*">
                                    <small class="text-muted">Chỉ cập nhật nếu muốn thay đổi ảnh đại diện</small>
                                </div>
                            </div>

                            <!-- PHẦN NHIỀU ẢNH -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="gallery-images">Thêm nhiều ảnh vào gallery (hỗ trợ thêm, sắp xếp và xóa)</label>
                                    <input type="file" id="gallery-images" class="form-control" name="gallery_images[]" accept="image/*" multiple>
                                    <small class="text-muted">Chọn từ 1 đến 10 ảnh. Bạn có thể sắp xếp thứ tự ảnh dưới đây</small>
                                </div>

                                <!-- PREVIEW EXISTING IMAGES -->
                                <div class="mt-3">
                                    <label>Ảnh hiện tại trong gallery:</label>
                                    <input type="hidden" id="delete-images" name="delete_images" value="">
                                    <div id="existing-images-container" class="d-flex flex-wrap gap-2" style="gap: 10px;">
                                        <?php if(isset($productImages) && count($productImages) > 0): ?>
                                            <?php foreach($productImages as $index => $img): ?>
                                                <div class="position-relative" style="position: relative; display: inline-block;" id="img-<?= $img['id'] ?>">
                                                    <img src="<?= $img['img'] ?>" alt="Product Image" style="width: 100px; height: 100px; object-fit: cover; border: 1px solid #ddd; border-radius: 4px;">
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="markDeleteImage(<?= $img['id'] ?>)" style="position: absolute; top: -5px; right: -5px; padding: 2px 6px; font-size: 12px;">×</button>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p class="text-muted">Chưa có ảnh nào trong gallery</p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- PREVIEW NEW IMAGES -->
                                <div class="mt-3">
                                    <label>Xem trước ảnh mới:</label>
                                    <div id="preview-container" class="d-flex flex-wrap gap-2" style="gap: 10px; display: none;">
                                    </div>
                                    <p id="no-preview" class="text-muted">Chưa chọn ảnh nào</p>
                                </div>
                            </div>

                            <!-- PHẦN MÔ TẢ -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Mô tả sản phẩm (hỗ trợ HTML cơ bản)</label>
                                    <textarea id="description-editor" required class="form-control" name="mota" 
                                        placeholder="Điền mô tả sản phẩm - hỗ trợ thêm ảnh, định dạng chữ..."><?=  $sanPham['mota'] ?></textarea>
                                    <small class="text-muted">
                                        Bạn có thể sử dụng: &lt;b&gt;in đậm&lt;/b&gt;, &lt;i&gt;in nghiêng&lt;/i&gt;, &lt;br&gt;xuống dòng, &lt;img src="url"&gt; để thêm ảnh
                                    </small>
                                </div>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="insertImageToDescription()">Thêm ảnh vào mô tả</button>
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="insertBoldToDescription()"><b>In đậm</b></button>
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="insertItalicToDescription()"><i>In nghiêng</i></button>
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="insertLineBreakToDescription()">Xuống dòng</button>
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

<script>
// Preview ảnh mới được chọn
document.getElementById('gallery-images').addEventListener('change', function(e) {
    const previewContainer = document.getElementById('preview-container');
    const noPreview = document.getElementById('no-preview');
    previewContainer.innerHTML = '';
    
    if(this.files.length > 0) {
        noPreview.style.display = 'none';
        previewContainer.style.display = 'flex';
        
        Array.from(this.files).slice(0, 10).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.style.position = 'relative';
                div.style.display = 'inline-block';
                div.innerHTML = `
                    <img src="${e.target.result}" style="width: 100px; height: 100px; object-fit: cover; border: 1px solid #ddd; border-radius: 4px;">
                    <small style="position: absolute; bottom: 2px; right: 2px; background: rgba(0,0,0,0.6); color: white; padding: 2px 4px; border-radius: 2px; font-size: 11px;">${file.name.substring(0, 10)}...</small>
                `;
                previewContainer.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    } else {
        noPreview.style.display = 'block';
        previewContainer.style.display = 'none';
    }
});

// Đánh dấu xóa ảnh hiện tại
function markDeleteImage(id) {
    if(confirm('Xóa ảnh này?')) {
        const imgElement = document.getElementById('img-' + id);
        if(imgElement) {
            imgElement.style.opacity = '0.5';
            imgElement.innerHTML += '<div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,0,0,0.3); border-radius: 4px;"></div>';
        }
        
        // Thêm ID vào danh sách xóa
        const deleteInput = document.getElementById('delete-images');
        const currentValue = deleteInput.value;
        if(currentValue) {
            deleteInput.value = currentValue + ',' + id;
        } else {
            deleteInput.value = id;
        }
    }
}

// Hàm chèn ảnh vào mô tả
function insertImageToDescription() {
    const url = prompt('Nhập URL ảnh hoặc đường dẫn:');
    if(url) {
        const textarea = document.getElementById('description-editor');
        const imageHtml = '<img src="' + url + '" style="max-width: 100%; height: auto; margin: 10px 0;"> ';
        textarea.value += imageHtml;
    }
}

// Hàm chèn in đậm
function insertBoldToDescription() {
    const textarea = document.getElementById('description-editor');
    const selectedText = textarea.value.substring(textarea.selectionStart, textarea.selectionEnd);
    if(selectedText) {
        const boldText = '<b>' + selectedText + '</b>';
        textarea.value = textarea.value.substring(0, textarea.selectionStart) + boldText + textarea.value.substring(textarea.selectionEnd);
    }
}

// Hàm chèn in nghiêng
function insertItalicToDescription() {
    const textarea = document.getElementById('description-editor');
    const selectedText = textarea.value.substring(textarea.selectionStart, textarea.selectionEnd);
    if(selectedText) {
        const italicText = '<i>' + selectedText + '</i>';
        textarea.value = textarea.value.substring(0, textarea.selectionStart) + italicText + textarea.value.substring(textarea.selectionEnd);
    }
}

// Hàm xuống dòng
function insertLineBreakToDescription() {
    const textarea = document.getElementById('description-editor');
    textarea.value += '<br>';
}
</script>

<?php
include_once("views/layouts/footer.php");
?>