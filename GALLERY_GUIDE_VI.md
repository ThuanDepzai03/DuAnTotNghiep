# Hướng Dẫn Sử Dụng Tính Năng Gallery Sản Phẩm

## Tổng Quan Các Thay Đổi

Hệ thống sản phẩm đã được cập nhật để hỗ trợ:

1. ✅ Upload **nhiều ảnh** vào gallery sản phẩm
2. ✅ Hiển thị gallery với **mũi tên điều hướng** cho khách hàng
3. ✅ Thêm **ảnh vào mô tả** sản phẩm
4. ✅ Hỗ trợ **định dạng HTML cơ bản** trong mô tả

---

## 1. Phần Admin - Chỉnh Sửa Sản Phẩm

### Vị Trí: `/admin/views/sanpham/edit.php`

#### A. Ảnh Đại Diện (Thumbnail)

- **Input**: File upload đơn
- **Cách thay đổi**: Chọn file ảnh mới để thay đổi ảnh đại diện
- **Chú ý**: Chỉ thay đổi nếu muốn cập nhật

#### B. Multiple Gallery Images (Ảnh Gallery Nhiều)

- **Input**: File upload hỗ trợ chọn nhiều file cùng lúc (Ctrl+Click)
- **Tối đa**: 10 ảnh
- **Tính năng**:
    - ✅ Xem trước ảnh mới trước khi upload
    - ✅ Xem danh sách ảnh hiện tại
    - ✅ Xóa ảnh cũ (click nút ×)
    - ✅ Tự động sắp xếp theo thứ tự upload

#### C. Mô Tả Sản Phẩm với Hỗ Trợ HTML

**Textarea** cho phép nhập mô tả với các công cụ định dạng:

- **In đậm** (Bold): `<b>Nội dung</b>`
- **In nghiêng** (Italic): `<i>Nội dung</i>`
- **Xuống dòng**: `<br>`
- **Thêm ảnh**: `<img src="URL_ảnh">`
- **Thẻ khác**: `<p>`, `<ul>`, `<li>` (an toàn)

**Công cụ nhanh**:

- Chọn text → Click nút "In đậm" hoặc "In nghiêng"
- Click "Thêm ảnh vào mô tả" → Nhập URL ảnh
- Click "Xuống dòng" để thêm break

**Ví dụ mô tả**:

```html
<b>Đặc điểm sản phẩm:</b><br />
<img src="https://example.com/image.jpg" /><br />
<i>Được sản xuất tại Nhật Bản</i><br />
<p>Chất lượng cao, giá tốt</p>
```

---

## 2. Phần Client - Hiển Thị Chi Tiết Sản Phẩm

### Vị Trí: `/resources/views/client/detail.blade.php`

#### A. Gallery Ảnh với Navigation

**Giao diện**:

```
┌─────────────────────────────┐
│   < [Ảnh sản phẩm] >        │
│                             │
│   [1/5]                     │
└─────────────────────────────┘
   [T1] [T2] [T3] [T4] [T5]
```

**Tính năng**:

- ✅ Mũi tên **Previous** (◀) - Xem ảnh trước
- ✅ Mũi tên **Next** (▶) - Xem ảnh tiếp theo
- ✅ **Thumbnails** nhỏ - Click để chọn ảnh trực tiếp
- ✅ **Counter** - Hiển thị ảnh thứ mấy (ví dụ: 2/5)
- ✅ **Keyboard Navigation** - Phím mũi tên trái/phải để chuyển ảnh

**Ví dụ sử dụng**:

1. Click mũi tên phải (▶) để xem ảnh tiếp theo
2. Click vào thumbnail để chọn ảnh cụ thể
3. Dùng phím ← → trên bàn phím để điều hướng

#### B. Mô Tả Sản Phẩm

- Hiển thị HTML an toàn
- Hỗ trợ **ảnh, định dạng chữ, danh sách**
- Responsive (tự động thích ứng màn hình)

---

## 3. Cấu Trúc Database

### Bảng: `product_images`

```sql
- id (bigint)
- product_id (bigint) - Tham chiếu đến sản phẩm
- image_url (varchar) - Đường dẫn ảnh
- sort_order (int) - Thứ tự hiển thị
- created_at (timestamp)
- updated_at (timestamp)
```

### Bảng: `sanpham` (Cũ)

```sql
- id
- mota - Lưu mô tả với HTML
- img - Ảnh đại diện
- ... (các cột khác)
```

---

## 4. Các File Thay Đổi

| File                                      | Thay Đổi                                   |
| ----------------------------------------- | ------------------------------------------ |
| `admin/views/sanpham/edit.php`            | Thêm form cho multiple images + mô tả HTML |
| `admin/Controller/SanPhamController.php`  | Thêm logic xử lý multiple images           |
| `admin/Model/ProductImageModel.php`       | **NEW** - Model cho ảnh sản phẩm           |
| `admin/index.php`                         | Thêm route cho deleteProductImage          |
| `resources/views/client/detail.blade.php` | Gallery + keyboard navigation              |

---

## 5. Hướng Dẫn Sử Dụng Chi Tiết

### Bước 1: Chỉnh Sửa Sản Phẩm

1. Đăng nhập Admin → Danh sách sản phẩm
2. Click "Sửa" sản phẩm cần cập nhật
3. Scroll xuống phần "**Thêm nhiều ảnh vào gallery**"

### Bước 2: Upload Ảnh Mới

1. Click "Chọn file" → Chọn từ 1-10 ảnh
2. Hoặc Ctrl+Click để chọn nhiều file
3. Xem trước ảnh ở phần "**Xem trước ảnh mới**"

### Bước 3: Xóa Ảnh Cũ

1. Tìm ảnh cần xóa ở "**Ảnh hiện tại trong gallery**"
2. Click nút **×** (hoặc **—**) góc trên bên phải
3. Ảnh sẽ được làm mờ, biểu thị sẽ xóa

### Bước 4: Cập Nhật Mô Tả

1. Scroll xuống "**Mô tả sản phẩm**"
2. Nhập/chỉnh sửa mô tả
3. Dùng công cụ nhanh:
    - Chọn text → "In đậm" → `<b>text</b>`
    - "Thêm ảnh vào mô tả" → Nhập URL
    - "Xuống dòng" → `<br>`

### Bước 5: Lưu Thay Đổi

1. Click nút **"Sửa"** ở dưới cùng
2. Chờ upload hoàn tất
3. Trang sẽ tự động quay lại danh sách

---

## 6. Xem Kết Quả

### Trên Trang Chi Tiết Sản Phẩm

1. Mở sản phẩm vừa cập nhật
2. Nếu có nhiều ảnh → Sẽ thấy mũi tên **< >**
3. Click mũi tên để xem gallery
4. Click thumbnail nhỏ để chọn nhanh
5. Mô tả sẽ hiển thị với **ảnh, chữ đặc, chữ nghiêng**

---

## 7. Ghi Chú & Lưu Ý

⚠️ **An Toàn Dữ Liệu**:

- Chỉ cho phép HTML tags: `<b>`, `<i>`, `<br>`, `<img>`, `<p>`, `<ul>`, `<li>`
- Tự động loại bỏ script, style, và tags nguy hiểm

⚠️ **Hiệu Suất**:

- Tối đa 10 ảnh gallery (để tránh lag)
- Kích thước ảnh nên < 5MB mỗi cái

⚠️ **Đường Dẫn Ảnh**:

- Gallery: `image/gallery/unique_name.jpg`
- Thumbnail: `image/unique_name.jpg`

---

## 8. Troubleshooting

### Problem: Upload ảnh không thành công

**Giải pháp**:

1. Kiểm tra folder `image/gallery/` có tồn tại?
2. Kiểm tra quyền ghi file (chmod 755)
3. Kiểm tra kích thước file < 5MB

### Problem: Ảnh không hiển thị

**Giải pháp**:

1. Kiểm tra URL ảnh có đúng không?
2. Ảnh có trong folder `public/image/`?
3. Kiểm tra database `product_images` có dữ liệu?

### Problem: Mô tả HTML không hiển thị

**Giải pháp**:

1. Kiểm tra dùng đúng tags: `<b>`, `<i>`, `<br>`
2. Không dùng `<script>`, `<style>`
3. Reload trang để xem kết quả mới

---

## 9. Ví Dụ Hoàn Chỉnh

### Mô Tả Sản Phẩm Mẫu:

```html
<b>Điện Thoại iPhone 15 Pro Max</b><br />
<img src="https://example.com/iphone15.jpg" /><br />
<p><b>Đặc điểm:</b></p>
<ul>
    <li>Màn hình: 6.7 inch Super Retina XDR</li>
    <li>Chip: A17 Pro</li>
    <li>Camera: 48MP Main</li>
</ul>
<br />
<i>Giá tốt nhất thị trường - Bảo hành 12 tháng</i>
```

---

**Hoàn tất! Hệ thống đã sẵn sàng sử dụng. 🎉**
