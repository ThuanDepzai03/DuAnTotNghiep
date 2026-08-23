# AE Phoenic Store

Website thương mại điện tử bán điện thoại, máy tính bảng và phụ kiện. Dự án có khu vực khách hàng và trang quản trị riêng.

## 1. Mục tiêu dự án

- Xây dựng quy trình mua hàng trực tuyến từ xem sản phẩm đến thanh toán.
- Quản lý sản phẩm, danh mục, biến thể, hình ảnh, đơn hàng và người dùng.
- Hỗ trợ voucher giảm giá và voucher miễn phí vận chuyển.
- Cho phép khách hàng theo dõi đơn hàng và gửi đánh giá.
- Cung cấp dashboard quản trị cho nhân viên cửa hàng.

## 2. Công nghệ sử dụng

| Thành phần | Công nghệ |
|---|---|
| Backend | PHP 8.3+, Laravel 13 |
| Database | MySQL |
| Frontend | Blade, HTML, CSS, JavaScript, Bootstrap |
| Build tool | Vite 8 |
| Thanh toán | COD, VNPay sandbox |
| Địa chỉ | API `provinces.open-api.vn` v2 qua Laravel proxy |
| Kiểm thử | PHPUnit |
| Quản lý mã nguồn | Git |

## 3. Chức năng chính

### Khách hàng

- Xem trang chủ, cửa hàng, tin tức và thông tin giới thiệu.
- Tìm kiếm, lọc và xem chi tiết sản phẩm.
- Chọn biến thể, số lượng và thêm sản phẩm vào giỏ hàng.
- Cập nhật hoặc xóa sản phẩm trong giỏ.
- Đăng ký, đăng nhập, xác thực email và đăng xuất.
- Nhập địa chỉ giao hàng theo luồng tỉnh/thành phố → phường/xã.
- Chọn giao tận nơi hoặc nhận tại cửa hàng.
- Áp dụng voucher đơn hàng hoặc voucher miễn phí vận chuyển.
- Thanh toán COD hoặc chuyển sang VNPay sandbox.
- Xem lịch sử, trạng thái và chi tiết đơn hàng.
- Đánh giá sản phẩm sau khi mua.
- Quản lý sản phẩm yêu thích và trò chuyện hỗ trợ.

### Quản trị viên

- Đăng nhập khu vực quản trị.
- Xem dashboard và thống kê doanh thu.
- Quản lý danh mục, thương hiệu, sản phẩm và biến thể.
- Quản lý hình ảnh sản phẩm và banner.
- Quản lý người dùng và quyền truy cập.
- Xem, cập nhật trạng thái và xử lý đơn hàng.
- Tạo, sửa, xóa và bật/tắt voucher.
- Quản lý liên hệ, đánh giá và tin nhắn hỗ trợ.

## 4. Phân tích công việc của các thành viên

Phần phân công dưới đây được tổng hợp từ lịch sử Git và cấu trúc mã nguồn. Các bí danh `thuanvillager243-dev` và `thuandz` cùng dùng email `thuanvillager243@gmail.com`, được gộp thành một thành viên là **Thuan**.

### Thành viên 1 - Thuan - Trưởng nhóm và thành viên tích hợp chính

**Nhiệm vụ đã thực hiện:**

- Khảo sát quy trình bán hàng của cửa hàng điện thoại và xác định nhóm người dùng: khách hàng, quản trị viên.
- Phân tích các nghiệp vụ chính: xem sản phẩm, chọn biến thể, giỏ hàng, đặt hàng, voucher, thanh toán và theo dõi đơn.
- Xây dựng phạm vi dự án, yêu cầu chức năng, yêu cầu bảo mật và các trường hợp ngoại lệ.
- Thiết kế luồng tổng thể từ trang chủ đến khi đơn hàng được tạo thành công.
- Trực tiếp phát triển và hoàn thiện nhiều module: trang chủ, header, checkout, voucher, địa chỉ giao hàng và xác thực tài khoản.
- Xây dựng, chỉnh sửa và tích hợp logic checkout: thông tin người nhận, phí vận chuyển, voucher, COD, VNPay và tạo đơn hàng.
- Tích hợp API địa chỉ hiện hành qua backend Laravel, xử lý tỉnh/thành phố, phường/xã, trạng thái loading và lỗi request.
- Sửa các lỗi phát sinh trong code của các thành viên khác để các module hoạt động đồng bộ với route, database và session chung.
- Rà soát toàn bộ luồng liên quan giữa frontend, controller, model, migration và dữ liệu thực tế; sửa lỗi tương thích thay vì chỉ sửa riêng giao diện.
- Phân chia module cho các thành viên, theo dõi tiến độ và hỗ trợ giải quyết các phần bị lỗi hoặc chưa hoàn thiện.
- Quản lý branch, pull request, quy tắc commit, xử lý xung đột và đồng bộ code từ nhánh chính.
- Tổng hợp nội dung báo cáo, chuẩn bị slide, kịch bản demo và thuyết trình.

**Sản phẩm bàn giao:**

- Danh sách yêu cầu nghiệp vụ và use case.
- Sơ đồ luồng mua hàng và phân quyền.
- Kế hoạch tiến độ, biên bản họp và nội dung báo cáo.
- Bản tích hợp cuối cùng đã được kiểm tra trước khi trình bày.
- Các bản sửa lỗi liên module, bao gồm checkout, voucher, địa chỉ, xác thực và giao diện.

**Phần phối hợp:** rà soát chức năng của cả ba thành viên còn lại, thống nhất tên trường dữ liệu, route và quy trình xử lý lỗi; trực tiếp sửa và tích hợp những phần chưa chạy đúng trong code của các thành viên khác.

### Thành viên 2 - Backend và cơ sở dữ liệu

**Nhiệm vụ đã thực hiện:**

- Thiết kế cấu trúc database cho sản phẩm, danh mục, thương hiệu, thuộc tính, biến thể, hình ảnh, người dùng, đơn hàng và voucher.
- Viết migration và model Eloquent, thiết lập quan hệ giữa sản phẩm, biến thể, đơn hàng và người dùng.
- Xây dựng đăng ký, đăng nhập, đăng xuất, xác thực email và phân quyền khách hàng/quản trị viên.
- Xử lý thêm, cập nhật, xóa sản phẩm trong giỏ hàng và tách giỏ theo tài khoản khách hàng.
- Xây dựng nghiệp vụ checkout: kiểm tra đăng nhập, kiểm tra giỏ, validate dữ liệu, tạo đơn hàng và chi tiết đơn hàng.
- Tính tổng tiền, phí vận chuyển, giảm giá theo phần trăm/giá cố định và voucher miễn phí vận chuyển.
- Tích hợp VNPay sandbox và xử lý trạng thái thanh toán.
- Xây dựng endpoint Laravel proxy cho API địa chỉ tỉnh/thành phố và phường/xã.
- Xử lý transaction database để tránh tạo đơn dở dang khi có lỗi.

**Nhóm file phụ trách:**

- `app/Models/`
- `app/Http/Controllers/AuthController.php`
- `app/Http/Controllers/Client/CartController.php`
- `app/Http/Controllers/Client/CheckoutController.php`
- `app/Http/Controllers/Client/PaymentController.php`
- `database/migrations/`
- `database/seeders/`
- `routes/web.php`

**Sản phẩm bàn giao:** database chạy được bằng migration, API/route nghiệp vụ, dữ liệu mẫu và các chức năng backend có thể tích hợp với giao diện.

### Thành viên 3 - Frontend và trải nghiệm người dùng

**Nhiệm vụ đã thực hiện:**

- Xây dựng giao diện Blade cho trang chủ, cửa hàng, chi tiết sản phẩm, giỏ hàng, checkout và tài khoản.
- Thiết kế form nhập thông tin người nhận gồm họ tên, số điện thoại, tỉnh/thành phố, phường/xã và địa chỉ chi tiết.
- Xây dựng luồng địa chỉ hai cấp theo API hiện tại: tỉnh/thành phố → phường/xã.
- Đảm bảo frontend chỉ gọi route Laravel, không gọi API địa chỉ bên ngoài trực tiếp từ trình duyệt.
- Xử lý trạng thái loading, lỗi API, reset phường/xã khi đổi tỉnh và chống response cũ ghi đè.
- Hiển thị lại giá trị địa chỉ đã có trong session/database khi mở checkout.
- Cập nhật phí giao hàng và tổng thanh toán ngay khi thay đổi địa chỉ.
- Tạo tương tác cho số lượng sản phẩm, xóa sản phẩm, chọn hình thức nhận hàng và phương thức thanh toán.
- Kiểm tra responsive trên màn hình desktop và mobile.

**Nhóm file phụ trách:**

- `resources/views/layouts/`
- `resources/views/client/`
- `resources/views/checkout.blade.php`
- `resources/views/account/`
- `public/css/`
- `public/js/`
- `resources/js/`

**Sản phẩm bàn giao:** giao diện hoàn chỉnh, form checkout sử dụng được, thông báo lỗi dễ hiểu và trải nghiệm mua hàng nhất quán.

### Thành viên 4 - Quản trị, kiểm thử và tài liệu

**Nhiệm vụ đã thực hiện:**

- Xây dựng giao diện dashboard quản trị và các màn hình quản lý dữ liệu.
- Quản lý danh mục, thương hiệu, sản phẩm, biến thể, hình ảnh và banner.
- Quản lý danh sách người dùng, quyền truy cập và trạng thái tài khoản.
- Quản lý đơn hàng, xem chi tiết đơn và cập nhật trạng thái xử lý.
- Quản lý voucher: tạo mã, chọn loại giảm, thời gian sử dụng, số lượng và trạng thái hoạt động.
- Quản lý phản hồi liên hệ, đánh giá sản phẩm và tin nhắn hỗ trợ.
- Viết và chạy feature test cho đăng ký, đăng nhập, quyền admin và các route chính.
- Kiểm tra thủ công các luồng hợp lệ, dữ liệu thiếu, giỏ hàng rỗng, voucher hết hạn và thanh toán thất bại.
- Ghi nhận lỗi, mô tả cách tái hiện, mức độ ảnh hưởng và kết quả sau khi sửa.
- Hoàn thiện README, hướng dẫn cài đặt, checklist demo và tài liệu bàn giao.

**Nhóm file phụ trách:**

- `app/Http/Controllers/Admin/`
- `app/Http/Controllers/OrderController.php`
- `app/Http/Controllers/UserController.php`
- `resources/views/admin/`
- `tests/Feature/`
- `tests/Unit/`
- `README.md`

**Sản phẩm bàn giao:** khu vực quản trị, báo cáo kiểm thử, danh sách lỗi đã xử lý và tài liệu hướng dẫn sử dụng.

### Ma trận phối hợp

| Hạng mục | Thành viên chính | Thành viên phối hợp |
|---|---|---|
| Phân tích yêu cầu và quy trình | Thành viên 1 | Cả nhóm |
| Database và nghiệp vụ backend | Thành viên 2 | Thành viên 1, 4 |
| Giao diện khách hàng | Thành viên 3 | Thành viên 1, 2 |
| Checkout và địa chỉ giao hàng | Thành viên 2, 3 | Thành viên 4 |
| Khu vực quản trị | Thành viên 4 | Thành viên 2, 1 |
| Kiểm thử và nghiệm thu | Thành viên 4 | Cả nhóm |
| Báo cáo và thuyết trình | Thành viên 1 | Cả nhóm |

### Trách nhiệm chung

- Cập nhật tiến độ và nêu rõ khó khăn trong mỗi buổi làm việc.
- Kiểm tra thay đổi của thành viên khác trước khi tích hợp.
- Không đưa mật khẩu, token API hoặc thông tin thanh toán thật lên Git.
- Không sửa migration đã chạy; thay đổi database phải dùng migration mới.
- Mỗi chức năng phải có cách kiểm tra và người chịu trách nhiệm xác nhận.
- Khi bàn giao module phải kèm hướng dẫn chạy, dữ liệu mẫu và các giới hạn đã biết.

## 5. Kiến trúc thư mục

```text
app/
  Http/Controllers/       Controller phía khách hàng và quản trị
  Models/                 Model Eloquent
database/
  migrations/             Cấu trúc database
  seeders/                Dữ liệu mẫu
resources/views/          Giao diện Blade
routes/web.php            Route web của hệ thống
public/                   Tài nguyên public và file upload
tests/                    Feature test và Unit test
config/                   Cấu hình Laravel
storage/                  Log, cache và file runtime
```

## 6. Quy trình mua hàng

```text
Trang chủ / Cửa hàng
        ↓
Chi tiết sản phẩm
        ↓
Giỏ hàng
        ↓
Checkout
        ↓
Địa chỉ giao hàng và voucher
        ↓
COD hoặc VNPay
        ↓
Tạo đơn hàng
        ↓
Theo dõi đơn hàng
```

Địa chỉ sử dụng API v2 với cấu trúc:

```text
Tỉnh / Thành phố → Phường / Xã → Địa chỉ chi tiết
```

Frontend chỉ gọi route Laravel `/checkout/address-options`; backend Laravel gọi API địa chỉ bên ngoài để tránh phụ thuộc CORS.

## 7. Một số route quan trọng

| Route | Chức năng |
|---|---|
| `GET /` | Trang chủ |
| `GET /shop` | Danh sách sản phẩm |
| `GET /detail/{id}` | Chi tiết sản phẩm |
| `GET /cart` | Giỏ hàng |
| `GET /checkout` | Trang checkout |
| `GET /checkout/address-options` | Lấy tỉnh hoặc phường/xã |
| `POST /checkout/submit` | Tạo đơn hàng |
| `GET /account/orders/{id}` | Chi tiết đơn hàng |
| `GET /admin` | Dashboard quản trị |

## 8. Cài đặt môi trường

Yêu cầu PHP 8.3 trở lên, Composer, Node.js, npm và MySQL.

```bash
git clone <repository-url>
cd DuAnTotNghiep
composer install
copy .env.example .env
php artisan key:generate
```

Tạo database MySQL rồi cập nhật các biến `DB_*` trong `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=duandienthoai
DB_USERNAME=root
DB_PASSWORD=
```

Chạy migration, seed dữ liệu và cài frontend:

```bash
php artisan migrate --seed
npm install
npm run build
```

Khởi động ứng dụng:

```bash
php artisan optimize:clear
php artisan serve --host=127.0.0.1 --port=8000
```

Mở `http://127.0.0.1:8000` trên trình duyệt.

## 9. Cấu hình thanh toán và email

- VNPay đang dùng môi trường sandbox; không dùng thông tin này cho production.
- Có thể dùng `MAIL_MAILER=log` khi phát triển để kiểm tra email trong log.
- Không commit file `.env`, mật khẩu Gmail, khóa VNPay hoặc token API.
- Production phải cấu hình CA bundle cho PHP/cURL và không tắt xác thực SSL.

## 10. Kiểm thử và kiểm tra chất lượng

```bash
php artisan test
php artisan route:list
php artisan migrate:status
php artisan view:cache
php -l app/Http/Controllers/Client/CheckoutController.php
npm run build
```

Checklist kiểm thử chính:

- Đăng ký và đăng nhập khách hàng.
- Đăng nhập admin và kiểm tra phân quyền.
- Thêm, sửa, xóa sản phẩm trong giỏ.
- Chọn tỉnh, phường/xã và nhập địa chỉ chi tiết.
- Kiểm tra phí ship khi có và không có voucher freeship.
- Đặt đơn COD.
- Tạo link thanh toán VNPay sandbox.
- Cập nhật trạng thái đơn hàng ở admin.
- Kiểm tra dữ liệu đơn hàng sau khi đặt.

## 11. Quy ước làm việc nhóm

1. Tạo branch theo chức năng, ví dụ `feature/checkout-address` hoặc `fix/cart-total`.
2. Commit ngắn gọn, mô tả đúng thay đổi.
3. Không sửa nhiều module không liên quan trong cùng một commit.
4. Kiểm tra lint, test và giao diện trước khi merge.
5. Khi sửa database, luôn tạo migration mới thay vì sửa migration đã chạy.
6. Khi gặp lỗi, ghi lại cách tái hiện, nguyên nhân và cách kiểm tra sau khi sửa.

## 12. Hướng phát triển

- Tách phần checkout lớn thành component hoặc view partial.
- Bổ sung test cho giỏ hàng, voucher, checkout và quyền admin.
- Thêm upload ảnh an toàn và kiểm tra kích thước file.
- Dùng queue cho email xác thực và thông báo đơn hàng.
- Bổ sung tồn kho theo biến thể và cảnh báo sắp hết hàng.
- Tích hợp API vận chuyển chính thức khi triển khai production.
- Thêm dashboard biểu đồ doanh thu theo thời gian.
- Bổ sung Docker hoặc tài liệu triển khai máy chủ.

## 13. Tác giả

Đồ án tốt nghiệp - nhóm phát triển AE Phoenic Store.

Cập nhật tên, mã sinh viên, lớp và nhiệm vụ thực tế của các thành viên trước khi nộp báo cáo.
