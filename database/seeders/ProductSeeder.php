<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 13 Chính Hãng',
  'slug' => 'iphone-13-chinh-hang',
  'sku' => 'SP0001',
  'description' => '<h3 style="margin: 20px 0px 15px; padding: 0px; font-style: normal; font-variant: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 20px; line-height: 28px; font-family: Arial, Helvetica, sans-serif; color: rgb(16, 16, 16); outline: 0px; text-align: justify;">Trong khi sức hút đến từ bộ 4 phiên bản iPhone 12 vẫn chưa nguội đi, thì hãng điện thoại Apple đã mang đến cho người dùng một siêu phẩm mới <a href="https://www.thegioididong.com/dtdd-apple-iphone-13-series" target="_blank" title="Tham khảo iPhone 13 series tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255); font: 20px / 18px Arial, Helvetica, sans-serif; outline: 0px;">iPhone 13 series</a> với nhiều cải tiến thú vị sẽ mang lại những trải nghiệm hấp dẫn nhất cho người dùng.</h3><h3 style="margin: 20px 0px 15px; padding: 0px; font-style: normal; font-variant: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 20px; line-height: 28px; font-family: Arial, Helvetica, sans-serif; color: rgb(16, 16, 16); outline: 0px; text-align: justify;">Hiệu năng vượt trội nhờ chip Apple A15 Bionic</h3><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Con chip <a href="https://www.thegioididong.com/hoi-dap/tim-hieu-chip-apple-a15-bionic-suc-manh-cuc-khung-duoc-he-1339072" target="_blank" title="Tìm hiểu về con chip Apple A15 Bionic" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">Apple A15 Bionic</a> siêu mạnh được sản xuất trên quy trình 5 nm giúp <a href="https://www.thegioididong.com/dtdd/iphone-13" target="_blank" title="Tham khảo điện thoại iPhone 13 chính hãng tại thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 13</a> đạt hiệu năng ấn tượng, với CPU nhanh hơn 50%, GPU nhanh hơn 30% so với các đối thủ trong cùng phân khúc.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Sau thành công của iPhone 13, Apple tiếp tục nâng cấp với <a href="https://www.thegioididong.com/dtdd-apple-iphone-16-series" target="_blank" title="Tham khảo iPhone 16 tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 16</a>, nổi bật với chip Apple A18 Bionic tiên tiến. Chip này không chỉ tăng tốc độ xử lý mà còn cải thiện đáng kể hiệu quả năng lượng. Đây chính là lựa chọn lý tưởng cho những ai đòi hỏi hiệu năng vượt trội từ thiết bị của mình.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a class="preventdefault" href="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-1-1.jpg" rel="nofollow noopener" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);"><img alt="Chip Apple A15 Bionic mạnh mẽ - iPhone 13 128GB" data-src="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-1-1.jpg" class=" lazyloaded" title="Chip Apple A15 Bionic mạnh mẽ - iPhone 13 128GB" src="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-1-1.jpg" style="margin: 0px 0px 0px -10px; padding: 0px; border: 0px; width: calc(100% + 20px) !important;"></a></p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Nhờ hiệu năng được cải tiến, người dùng có được những trải nghiệm tốt hơn trên <a href="https://www.thegioididong.com/dtdd" target="_blank" title="Tham khảo điện thoại kinh doanh tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">điện thoại</a> khi dùng các ứng dụng chỉnh sửa ảnh hay chiến các tựa game đồ họa cao mượt mà.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a class="preventdefault" href="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-2.jpg" rel="nofollow noopener" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);"><img alt="Đồ họa mượt mà - iPhone 13 128GB" data-src="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-2.jpg" class=" lazyloaded" title="Đồ họa mượt mà - iPhone 13 128GB" src="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-2.jpg" style="margin: 0px 0px 0px -10px; padding: 0px; border: 0px; width: calc(100% + 20px) !important;"></a></p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">iPhone 13 trang bị bộ nhớ trong 128 GB dung lượng lý tưởng cho phép bạn thỏa thích lưu trữ mọi nội dung theo ý muốn mà không lo nhanh đầy bộ nhớ. Nếu bạn cần không gian lưu trữ lớn hơn, phiên bản <a href="https://www.thegioididong.com/dtdd/iphone-13-256gb" target="_blank" title="iPhone 13 256GB" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 13 256GB</a> hoặc bản 512GB sẽ là lựa chọn đáng cân nhắc, đáp ứng tốt nhu cầu lưu trữ ảnh, video và ứng dụng.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a class="preventdefault" href="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-19.jpg" rel="nofollow noopener" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);"><img alt="Dung lượng bộ nhớ - iPhone 13 128GB" data-src="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-19.jpg" class=" lazyloaded" title="Dung lượng bộ nhớ - iPhone 13 128GB" src="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-19.jpg" style="margin: 0px 0px 0px -10px; padding: 0px; border: 0px; width: calc(100% + 20px) !important;"></a></p><h3 style="margin: 20px 0px 15px; padding: 0px; font-style: normal; font-variant: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 20px; line-height: 28px; font-family: Arial, Helvetica, sans-serif; color: rgb(16, 16, 16); outline: 0px; text-align: justify;">Tốc độ 5G tốt hơn&nbsp;</h3><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Mạng 5G được cải thiện chất lượng với nhiều băng tần hơn, với 5G giúp điện thoại xem trực tuyến hay tải xuống các ứng dụng và tài liệu đều đạt tốc độ nhanh chóng. Không chỉ vậy, siêu phẩm mới này còn có chế độ dữ liệu thông minh, tự động phát hiện và giảm tải tốc độ mạng để tiết kiệm năng lượng khi không cần dùng tốc độ cao.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a class="preventdefault" href="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-4.jpg" rel="nofollow noopener" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);"><img alt="Hỗ trợ kết nối 5G hiện đại - iPhone 13 128GB" data-src="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-4.jpg" class=" lazyloaded" title="Hỗ trợ kết nối 5G hiện đại - iPhone 13 128GB" src="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-4.jpg" style="margin: 0px 0px 0px -10px; padding: 0px; border: 0px; width: calc(100% + 20px) !important;"></a></p>',
  'thumbnail' => 'image/products/1788336464-GR2EZHjP.webp',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0001-V1',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 13,
  'image' => 'image/variants/1788336822-4Wno6dBF.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0001-V2',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 15,
  'image' => 'image/iphone13_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0001-V3',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 12,
  'image' => 'image/iphone13_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 14 Chính Hãng',
  'slug' => 'iphone-14-chinh-hang',
  'sku' => 'SP0002',
  'description' => '<h3 style="margin: 20px 0px 15px; padding: 0px; font-style: normal; font-variant: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 20px; line-height: 28px; font-family: Arial, Helvetica, sans-serif; color: rgb(16, 16, 16); outline: 0px; text-align: justify;"><a href="https://www.thegioididong.com/dtdd/iphone-14" target="_blank" title="Tham khảo điện thoại iPhone 14 tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255); font: 20px / 18px Arial, Helvetica, sans-serif; outline: 0px;">iPhone 14 128GB</a> được xem là mẫu smartphone bùng nổ của nhà táo trong năm 2022, ấn tượng với ngoại hình trẻ trung, màn hình chất lượng đi kèm với những cải tiến về hệ điều hành và thuật toán xử lý hình ảnh, giúp máy trở thành cái tên thu hút được đông đảo người dùng quan tâm tại thời điểm ra mắt.</h3><h3 style="margin: 20px 0px 15px; padding: 0px; font-style: normal; font-variant: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 20px; line-height: 28px; font-family: Arial, Helvetica, sans-serif; color: rgb(16, 16, 16); outline: 0px; text-align: justify;">iPhone 14 sở hữu thiết kế cao cấp</h3><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Với phiên bản tiêu chuẩn thì nhà Apple vẫn giữ nguyên kiểu dáng thiết kế so với thế hệ tiền nhiệm, vẫn là mặt lưng phẳng cùng bộ khung vuông giúp máy trở nên hiện đại hơn.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a class="preventdefault" href="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-100323-101502.jpg" rel="nofollow noopener" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);"><img alt="Thiết kế hiện đại - iPhone 14 128GB" data-src="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-100323-101502.jpg" class=" lazyloaded" title="Thiết kế hiện đại - iPhone 14 128GB" src="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-100323-101502.jpg" style="margin: 0px 0px 0px -10px; padding: 0px; border: 0px; width: calc(100% + 20px) !important;"></a></p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a href="https://www.thegioididong.com/dtdd-apple-iphone-14-series" target="_blank" title="Tham khảo iPhone 14 tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 14</a> có kích thước chiều ngang là 71.5 mm nên máy có thể dễ dàng nằm gọn trong lòng bàn tay mỗi khi sử dụng, điều này làm cho <a href="https://www.thegioididong.com/dtdd" target="_blank" title="Tham khảo điện thoại di động đang kinh doanh tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">điện thoại</a> trở nên phù hợp hơn với nhiều đối tượng người dùng hơn, kể cả những bạn nữ có bàn tay nhỏ nhắn.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a class="preventdefault" href="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-camera.jpg" rel="nofollow noopener" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);"><img alt="Camera - iPhone 14 128GB" data-src="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-camera.jpg" class=" lazyloaded" title="Camera - iPhone 14 128GB" src="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-camera.jpg" style="margin: 0px 0px 0px -10px; padding: 0px; border: 0px; width: calc(100% + 20px) !important;"></a></p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Mặt lưng của điện thoại được thiết kế từ kính cường lực và hoàn thiện theo kiểu nhẵn bóng, theo mình thì cách làm này giúp cho iPhone 14 trông cuốn hút hơn, bên cạnh đó máy cũng khá bền bỉ có thể mang lại khả năng chống chịu các vết xước được tốt hơn.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Có một lưu ý nhỏ ở phần thiết kế là máy khá dễ bám dấu vân tay, điều này càng thêm lộ rõ ở những phiên bản có màu đậm như đen và đỏ, còn ở các phiên bản màu sáng như xanh dương, trắng và tím nhạt thì điều này cũng được cải thiện.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Tuy nhiên đây cũng là điều thường gặp trên các mẫu điện thoại có mặt lưng kính nên mình cũng không xem đây là điểm trừ dành cho iPhone 14, bằng cách trang bị thêm ốp lưng là ta đã có thể khắc phục hoàn toàn tình trạng trên và còn tăng thêm độ bền cho điện thoại.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Năm nay Apple cho ra mắt hai phiên bản có màu mới dành cho iPhone 14 là tím nhạt và xanh dương, theo mình thấy thì màu xanh này có màu dịu nhẹ hơn so với iPhone 13. Vậy nên nhờ màu sắc mà mình có thể dễ dàng phân biệt giữa hai dòng điện thoại, nếu muốn mọi người xung quanh biết được rằng bạn đang sở hữu iPhone 14 thì hai màu sắc này sẽ là sự lựa chọn rất phù hợp.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Trong khi iPhone 14 128GB vẫn là một lựa chọn phổ biến với ngoại hình trẻ trung và hiệu năng ổn định, thì <a href="https://www.thegioididong.com/dtdd/iphone-16" target="_blank" title="Tham khảo iPhone 16 128GB tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 16 128GB</a> đã ra mắt mang đến những cải tiến vượt trội. Nếu bạn đang tìm kiếm những tính năng mới nhất và công nghệ tiên tiến nhất, iPhone 16 128GB có thể là một lựa chọn tốt hơn, đem lại trải nghiệm người dùng cao cấp và hiện đại hơn.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><i style="margin: 0px; padding: 0px;">Thậm chí, với sự xuất hiện của dòng </i><i style="margin: 0px; padding: 0px;"><a href="https://www.thegioididong.com/dtdd-apple-iphone-17-series" target="_blank" title="Tham khảo iPhone 17 series chính hãng, giá tốt tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 17</a></i><i style="margin: 0px; padding: 0px;">, trải nghiệm smartphone lại được nâng lên một tầm cao mới. Các phiên bản như </i><i style="margin: 0px; padding: 0px;"><a href="https://www.thegioididong.com/dtdd/iphone-17-pro" target="_blank" title="Tham khảo iPhone 17 Pro 256GB tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 17 Pro</a></i><i style="margin: 0px; padding: 0px;"> và </i><i style="margin: 0px; padding: 0px;"><a href="https://www.thegioididong.com/dtdd/iphone-17-pro-max" target="_blank" title="Tham khảo iPhone 17 Pro Max tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 17 Pro Max</a></i><i style="margin: 0px; padding: 0px;"> đã chính thức ra mắt, với những công nghệ đột phá về chip và camera, khẳng định vị thế dẫn đầu của Apple trong ngành.</i></p><h3 style="margin: 20px 0px 15px; padding: 0px; font-style: normal; font-variant: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 20px; line-height: 28px; font-family: Arial, Helvetica, sans-serif; color: rgb(16, 16, 16); outline: 0px; text-align: justify;">Giải trí đã mắt hơn trên màn hình chất lượng của iPhone 14</h3><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Máy sử dụng tấm nền OLED nên màu sắc mà máy mang lại rất có chiều sâu, màu sắc hiển thị với độ chính xác màu cao nên sẽ không bị quá ảo như trên những tấm nền khác mà ta hay gặp là AMOLED và Super AMOLED.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Xem thêm: <a href="https://www.thegioididong.com/hoi-dap/man-hinh-oled-la-gi-905762" target="_blank" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">Màn hình OLED là gì? Có gì nổi bật? Thiết bị nào có màn hình OLED?</a></p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Trên iPhone 14 vẫn sẽ sử dụng màn hình kiểu tai thỏ, màn hình Dynamic Island chỉ xuất hiện trên dòng sản phẩm Pro của hãng, như <a href="https://www.thegioididong.com/dtdd/iphone-14-pro" target="_blank" title="Tham khảo điện thoại iPhone 14 Pro tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 14 Pro</a> và <a href="https://www.thegioididong.com/dtdd/iphone-14-pro-max" target="_blank" title="Tham khảo điện thoại iPhone 14 Pro Max tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 14 Pro Max</a>.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Màn hình của <a href="https://www.thegioididong.com/dtdd-apple-iphone" target="_blank" title="Tham khảo điện thoại iPhone đang kinh doanh tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone</a> này có <span style="margin: 0px; padding: 0px;">kích thước 6.1 inch, </span>độ phân giải 1170 x 2532 Pixels, mật độ điểm ảnh mà máy mang đến khá cao, theo như hãng công bố thì iPhone 14 có mật độ điểm ảnh khoảng 460 ppi.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Điều mà mình khá ấn tượng trên màn hình của iPhone 14 là về độ sáng, máy khá ổn định khi sử dụng điện thoại ở những môi trường có độ sáng cao như ngoài trời nắng cũng trở nên dễ dàng hơn.</p>',
  'thumbnail' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0002-V1',
  'price' => '16490000.00',
  'sale_price' => '15990000.00',
  'stock' => 34,
  'image' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0002-V2',
  'price' => '19490000.00',
  'sale_price' => '18990000.00',
  'stock' => 25,
  'image' => 'image/iphone14_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 15 Chính Hãng',
  'slug' => 'iphone-15-chinh-hang',
  'sku' => 'SP0003',
  'description' => '<div class="flex flex-col" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; display: flex !important; flex-direction: column !important;"><div class="flex items-center justify-between gap-2.5" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; display: flex !important; align-items: center !important; justify-content: space-between !important; gap: 0.625rem !important;"><h2 class="text-textOnWhitePrimary b2-semibold pc:h4-semibold" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; font-size: 28px !important; color: rgb(9, 13, 20) !important; line-height: 36px !important;">Mô tả sản phẩm</h2></div></div><div class="" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none;"><div class="overflow-hidden transition-all duration-500 [&amp;_blockquote]:m-[revert] [&amp;_dl]:m-[revert] [&amp;_dd]:m-[revert] [&amp;_h1]:m-[revert] [&amp;_h2]:m-[revert] [&amp;_h3]:m-[revert] [&amp;_h4]:m-[revert] [&amp;_h5]:m-[revert] [&amp;_h6]:m-[revert] [&amp;_hr]:m-[revert] [&amp;_p]:m-[revert] [&amp;_pre]:m-[revert] [&amp;_h2]:h6-semibold [&amp;_h3]:b2-semibold [&amp;_h3]:pc:b1-semibold [&amp;_img]:![width:100%] [&amp;_img]:![height:100%] [&amp;_table]:![border-width:thin] [&amp;_tbody]:![border-width:thin] [&amp;_thead]:![border-width:thin] [&amp;_tr]:![border-width:thin] [&amp;_td]:![border-width:thin] [&amp;_th]:![border-width:thin] [&amp;_table_tr_td]:px-2 [&amp;_table_tr_td]:py-1 [&amp;_ol]:m-[revert] [&amp;_ol]:list-[revert] [&amp;_ol]:p-[revert] [&amp;_ul]:m-[revert] [&amp;_ul]:list-[revert] [&amp;_ul]:p-[revert] [&amp;_a]:text-blue-blue-7 [&amp;_a]:hover:text-blue-blue-6 [&amp;_figure]:![width:100%] [&amp;_figure]:overflow-x-auto [&amp;_figure]:![display:block] [&amp;_iframe]:![width:100%] [&amp;_iframe]:![height:300px] pc:[&amp;_iframe]:![height:600px]" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; transition-duration: 0.5s !important; transition-property: all !important; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important;"><p style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin-bottom: 11px; text-align: justify; margin-top: revert !important; margin-right: revert !important; margin-left: revert !important;"><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;">Với iPhone 15, bạn sẽ được tận hưởng những trải nghiệm cao cấp trên một thiết bị bền bỉ và thanh lịch. Sản phẩm gây ấn tượng với màn hình Dynamic Island, camera độ phân giải siêu cao cùng nhiều chế độ quay chụp xuất sắc. Nhờ cổng USB-C, trải nghiệm kết nối của iPhone 15 thực sự khác biệt so với các thế hệ trước.</span></p><figure class="image" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/2023_9_13_638302015849272512_iPhone_15_Pink_Pure_Back_iPhone_15_Pink_Pure_Front_2up_Screen__USEN.jpg" alt="Trải nghiệm cao cấp trên iPhone 15" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 536px; width: 804px;"></figure><p style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin-bottom: 11px; text-align: center; margin-top: revert !important; margin-right: revert !important; margin-left: revert !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/1/iphone-15-html-1.png" alt="Hình ảnh iPhone 15 1" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 838.203px; width: 804px;"></p><figure class="image" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/1/iphone-15-html-2.png" alt="Hình ảnh iPhone 15 (2)" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 865.297px; width: 804px;"></figure><figure class="image" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/1/iphone-15-html-3.png" alt="Hình ảnh iPhone 15 (3)" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 836.781px; width: 804px;"></figure></div></div>',
  'thumbnail' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0003-V1',
  'price' => '19990000.00',
  'sale_price' => '19490000.00',
  'stock' => 33,
  'image' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0003-V2',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 16,
  'image' => 'image/iphone15_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 16 Chính Hãng',
  'slug' => 'iphone-16-chinh-hang',
  'sku' => 'SP0004',
  'description' => '<div class="flex flex-col" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; display: flex !important; flex-direction: column !important;"><div class="flex items-center justify-between gap-2.5" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; display: flex !important; align-items: center !important; justify-content: space-between !important; gap: 0.625rem !important;"><h2 class="text-textOnWhitePrimary b2-semibold pc:h4-semibold" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; font-size: 28px !important; color: rgb(9, 13, 20) !important; line-height: 36px !important;">Mô tả sản phẩm</h2></div></div><div class="" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none;"><div class="overflow-hidden transition-all duration-500 [&amp;_blockquote]:m-[revert] [&amp;_dl]:m-[revert] [&amp;_dd]:m-[revert] [&amp;_h1]:m-[revert] [&amp;_h2]:m-[revert] [&amp;_h3]:m-[revert] [&amp;_h4]:m-[revert] [&amp;_h5]:m-[revert] [&amp;_h6]:m-[revert] [&amp;_hr]:m-[revert] [&amp;_p]:m-[revert] [&amp;_pre]:m-[revert] [&amp;_h2]:h6-semibold [&amp;_h3]:b2-semibold [&amp;_h3]:pc:b1-semibold [&amp;_img]:![width:100%] [&amp;_img]:![height:100%] [&amp;_table]:![border-width:thin] [&amp;_tbody]:![border-width:thin] [&amp;_thead]:![border-width:thin] [&amp;_tr]:![border-width:thin] [&amp;_td]:![border-width:thin] [&amp;_th]:![border-width:thin] [&amp;_table_tr_td]:px-2 [&amp;_table_tr_td]:py-1 [&amp;_ol]:m-[revert] [&amp;_ol]:list-[revert] [&amp;_ol]:p-[revert] [&amp;_ul]:m-[revert] [&amp;_ul]:list-[revert] [&amp;_ul]:p-[revert] [&amp;_a]:text-blue-blue-7 [&amp;_a]:hover:text-blue-blue-6 [&amp;_figure]:![width:100%] [&amp;_figure]:overflow-x-auto [&amp;_figure]:![display:block] [&amp;_iframe]:![width:100%] [&amp;_iframe]:![height:300px] pc:[&amp;_iframe]:![height:600px]" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; transition-duration: 0.5s !important; transition-property: all !important; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important;"><figure class="image" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/800x0/iphone_16_1_adbd8a84f3.jpg" alt="iphone-16-1.jpg" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 929.625px; width: 804px;"></figure><figure class="image" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/iphone_16_2_a2a42b298d.jpg" alt="iphone-16-2.jpg" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 951.125px; width: 804px;"></figure><figure class="image" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/iphone_16_3_d0e1eb87ef.jpg" alt="iphone-16-3.jpg" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 1048.19px; width: 804px;"></figure><figure class="image" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/iphone_16_5_6544aed046.jpg" alt="iphone-16-5.jpg" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 1190.67px; width: 804px;"></figure><figure class="image" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/iphone_16_6_5f9dfaf2d4.jpg" alt="iphone-16-6.jpg" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 1055.48px; width: 804px;"></figure></div></div>',
  'thumbnail' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0004-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 15,
  'image' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 18,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0004-V2',
  'price' => '25990000.00',
  'sale_price' => '25490000.00',
  'stock' => 32,
  'image' => 'image/iphone16_white.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 2,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 17 Pro Max Chính Hãng',
  'slug' => 'iphone-17-pro-max-chinh-hang',
  'sku' => 'SP0005',
  'description' => 'iPhone 17 Pro Max Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.<div><img src="http://127.0.0.1:8000/image/products/description/1788367959-WEbwx39H1CBJ.jpg" alt="i_Phone_17_pro_relay_new_1_088e24a646.jpg" class="description-image" draggable="true" style="max-width: 100%; height: auto; display: block; margin: 15px 0px;"><p><br></p><br></div>',
  'thumbnail' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0005-V1',
  'price' => '34990000.00',
  'sale_price' => '34490000.00',
  'stock' => 32,
  'image' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0005-V2',
  'price' => '39990000.00',
  'sale_price' => '39490000.00',
  'stock' => 38,
  'image' => 'image/iphone17promax_titanium.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 11,
  1 => 19,
  2 => 24,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 1,
  'name' => 'iPad Gen 10 WiFi Chính Hãng',
  'slug' => 'ipad-gen-10-wifi-chinh-hang-6',
  'sku' => 'SP0006',
  'description' => 'iPad Gen 10 WiFi Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0006-V1',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 35,
  'image' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0006-V2',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 36,
  'image' => 'image/ipad10_pink_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0006-V3',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 11,
  'image' => 'image/ipad10_silver_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0006-V4',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 15,
  'image' => 'image/ipad10_yellow_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0006-V5',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 25,
  'image' => 'image/ipad10_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0006-V6',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 23,
  'image' => 'image/ipad10_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0006-V7',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 16,
  'image' => 'image/ipad10_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0006-V8',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 10,
  'image' => 'image/ipad10_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A35 Chính Hãng',
  'slug' => 'samsung-galaxy-a35-chinh-hang-7',
  'sku' => 'SP0007',
  'description' => 'Samsung Galaxy A35 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0007-V1',
  'price' => '7490000.00',
  'sale_price' => '6990000.00',
  'stock' => 11,
  'image' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 8,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A55 Chính Hãng',
  'slug' => 'samsung-galaxy-a55-chinh-hang',
  'sku' => 'SP0008',
  'description' => '<p style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; text-align: justify; margin: revert !important;"><a href="https://fptshop.com.vn/dien-thoai/samsung-galaxy-a56" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-decoration: inherit; color: rgb(48, 109, 228) !important; --tw-text-opacity: 1 !important;"><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;">Samsung Galaxy A56</span></a><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;"> thuyết phục người dùng với bộ công cụ AI mạnh mẽ, tích hợp nhiều tính năng hiện đại, dễ sử dụng, cùng hiệu năng vượt trội từ vi xử lý Exynos 1580. Ngoài ra, thiết bị còn được hỗ trợ cập nhật phần mềm lên đến 6 năm, mang lại trải nghiệm ổn định và lâu dài, giúp người dùng yên tâm sử dụng.</span></p><figure class="image" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; width: 804px; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/800x0/galaxy_a56_5g_7e70432387.jpg" alt="Samsung Galaxy A56 5G (ảnh 1)" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 458.266px; width: 804px;"></figure><h3 style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-variant-ligatures: none; text-align: justify; font-size: 16px !important; margin: revert !important; line-height: 24px !important;"><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;">Thiết kế mới trẻ trung và cao cấp</span></h3><p style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; text-align: justify; margin: revert !important;">Samsung Galaxy A56 sở hữu thiết kế hoàn toàn mới với cụm camera Island, sắp xếp theo phong cách tuyến tính hiện đại, tinh tế và đẳng cấp hơn. Khung viền máy được hoàn thiện từ chất liệu kim loại cứng cáp, tạo cảm giác chắc chắn, bền bỉ. Tổng thể thiết bị được thiết kế mỏng nhẹ với độ dày chỉ 7.4mm và trọng lượng 198g, giúp cầm nắm thoải mái và tiện lợi khi sử dụng. Kết hợp với bộ sưu tập màu sắc thời trang, hiện đại là Đen Marble, Xám Marble, Xanh Marble, Samsung Galaxy A56 giúp người dùng dễ dàng chọn được màu sắc yêu thích của mình.</p><figure class="image" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; width: 804px; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/800x0/samsung_galaxy_a56_11_76bf894f2c.png" alt="Samsung Galaxy A56 5G (ảnh 1)" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 535.656px; width: 804px;"></figure><h3 style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-variant-ligatures: none; text-align: justify; font-size: 16px !important; margin: revert !important; line-height: 24px !important;"><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;">Trải nghiệm bộ tính năng AI tinh gọn và thông minh nhất</span></h3><p style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; text-align: justify; margin: revert !important;">Galaxy A56 được Samsung bộ tính năng Awesome Intelligence - một hệ thống AI thông minh, mạnh mẽ và tinh gọn nhất từng có trên <a href="https://fptshop.com.vn/dien-thoai/galaxy-a-series" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-decoration: inherit; color: rgb(48, 109, 228) !important; --tw-text-opacity: 1 !important;">dòng Galaxy A</a>. Đây cũng là lần đầu tiên Samsung tích hợp nhiều công nghệ AI tiên tiến như vậy vào một thiết bị tầm trung, giúp nâng cao trải nghiệm sử dụng và tối ưu hóa sự tiện lợi cho người dùng. Được hỗ trợ bởi <a href="https://fptshop.com.vn/tin-tuc/danh-gia/one-ui-7-1-182725" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-decoration: inherit; color: rgb(48, 109, 228) !important; --tw-text-opacity: 1 !important;">One UI 7</a>, các tính năng AI mới trên Galaxy A56 5G mang đến khả năng tìm kiếm, chỉnh sửa ảnh và cá nhân hóa một cách dễ dàng, giúp mọi thao tác trở nên nhanh chóng, trực quan và hiệu quả hơn.</p><p style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; text-align: justify; margin: revert !important;">Những tính năng AI thông minh trên Galaxy A56:</p><ul style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; list-style-type: revert !important; margin: revert !important; padding: revert !important;"><li style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify;"><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;">Khoanh tròn để tìm kiếm cải tiến: </span>Cho phép người dùng tìm kiếm thông tin nhanh chóng, hiệu quả hơn bằng cách khoanh tròn, nhấn vào chủ thể hoặc nhập nội dung trực tiếp trên màn hình. Công nghệ AI sẽ tự động nhận diện số điện thoại, địa chỉ email và URL, giúp người dùng thao tác nhanh gọn chỉ với một lần chạm.</li><li style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify;"><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;">Object Eraser – Xóa đối tượng thông minh:</span> AI giúp bạn chỉnh sửa ảnh dễ dàng hơn bằng cách tự động phát hiện và đề xuất loại bỏ các chi tiết không mong muốn trong bức ảnh. Nhờ đó, người dùng có thể tạo ra những bức ảnh hoàn hảo mà không cần đến các ứng dụng chỉnh sửa khác.</li></ul><figure class="image" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 0px; width: 804px; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/800x0/samsung_galaxy_a56_9_ca8a5d9904.png" alt="Samsung Galaxy A56 5G (ảnh 2)" loading="lazy" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; height: 535.656px; width: 804px;"></figure>',
  'thumbnail' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0008-V1',
  'price' => '9990000.00',
  'sale_price' => '9490000.00',
  'stock' => 25,
  'image' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 14,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy M54 Chính Hãng',
  'slug' => 'samsung-galaxy-m54-chinh-hang-9',
  'sku' => 'SP0009',
  'description' => 'Samsung Galaxy M54 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0009-V1',
  'price' => '8290000.00',
  'sale_price' => '7790000.00',
  'stock' => 31,
  'image' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S23 FE Chính Hãng',
  'slug' => 'samsung-galaxy-s23-fe-chinh-hang-10',
  'sku' => 'SP0010',
  'description' => 'Samsung Galaxy S23 FE Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0010-V1',
  'price' => '10990000.00',
  'sale_price' => '10490000.00',
  'stock' => 13,
  'image' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 9,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Chính Hãng',
  'slug' => 'samsung-galaxy-s24-chinh-hang-11',
  'sku' => 'SP0011',
  'description' => 'Samsung Galaxy S24 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0011-V1',
  'price' => '18990000.00',
  'sale_price' => '18490000.00',
  'stock' => 16,
  'image' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Plus Chính Hãng',
  'slug' => 'samsung-galaxy-s24-plus-chinh-hang-12',
  'sku' => 'SP0012',
  'description' => 'Samsung Galaxy S24 Plus Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0012-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 28,
  'image' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Ultra Chính Hãng',
  'slug' => 'samsung-galaxy-s24-ultra-chinh-hang-13',
  'sku' => 'SP0013',
  'description' => 'Samsung Galaxy S24 Ultra Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0013-V1',
  'price' => '26990000.00',
  'sale_price' => '26490000.00',
  'stock' => 17,
  'image' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Flip5 Chính Hãng',
  'slug' => 'samsung-galaxy-z-flip5-chinh-hang-14',
  'sku' => 'SP0014',
  'description' => 'Samsung Galaxy Z Flip5 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0014-V1',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 28,
  'image' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 15,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Fold5 Chính Hãng',
  'slug' => 'samsung-galaxy-z-fold5-chinh-hang-15',
  'sku' => 'SP0015',
  'description' => 'Samsung Galaxy Z Fold5 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0015-V1',
  'price' => '29990000.00',
  'sale_price' => '29490000.00',
  'stock' => 35,
  'image' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Tab S9 Chính Hãng',
  'slug' => 'samsung-galaxy-tab-s9-chinh-hang-16',
  'sku' => 'SP0016',
  'description' => 'Samsung Galaxy Tab S9 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0016-V1',
  'price' => '16990000.00',
  'sale_price' => '16490000.00',
  'stock' => 18,
  'image' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 10,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Tab S10 Chính Hãng',
  'slug' => 'samsung-galaxy-tab-s10-chinh-hang-17',
  'sku' => 'SP0017',
  'description' => 'Samsung Galaxy Tab S10 Chính Hãng đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0017-V1',
  'price' => '20990000.00',
  'sale_price' => '20490000.00',
  'stock' => 39,
  'image' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 13 LL/A Mỹ',
  'slug' => 'iphone-13-lla-my',
  'sku' => 'SP0018',
  'description' => '<h3 style="margin: 20px 0px 15px; padding: 0px; font-style: normal; font-variant: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 20px; line-height: 28px; font-family: Arial, Helvetica, sans-serif; color: rgb(16, 16, 16); outline: 0px; text-align: justify;">Trong khi sức hút đến từ bộ 4 phiên bản iPhone 12 vẫn chưa nguội đi, thì hãng điện thoại Apple đã mang đến cho người dùng một siêu phẩm mới <a href="https://www.thegioididong.com/dtdd-apple-iphone-13-series" target="_blank" title="Tham khảo iPhone 13 series tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255); font: 20px / 18px Arial, Helvetica, sans-serif; outline: 0px;">iPhone 13 series</a> với nhiều cải tiến thú vị sẽ mang lại những trải nghiệm hấp dẫn nhất cho người dùng.</h3><h3 style="margin: 20px 0px 15px; padding: 0px; font-style: normal; font-variant: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 20px; line-height: 28px; font-family: Arial, Helvetica, sans-serif; color: rgb(16, 16, 16); outline: 0px; text-align: justify;">Hiệu năng vượt trội nhờ chip Apple A15 Bionic</h3><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Con chip <a href="https://www.thegioididong.com/hoi-dap/tim-hieu-chip-apple-a15-bionic-suc-manh-cuc-khung-duoc-he-1339072" target="_blank" title="Tìm hiểu về con chip Apple A15 Bionic" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">Apple A15 Bionic</a> siêu mạnh được sản xuất trên quy trình 5 nm giúp <a href="https://www.thegioididong.com/dtdd/iphone-13" target="_blank" title="Tham khảo điện thoại iPhone 13 chính hãng tại thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 13</a> đạt hiệu năng ấn tượng, với CPU nhanh hơn 50%, GPU nhanh hơn 30% so với các đối thủ trong cùng phân khúc.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Sau thành công của iPhone 13, Apple tiếp tục nâng cấp với <a href="https://www.thegioididong.com/dtdd-apple-iphone-16-series" target="_blank" title="Tham khảo iPhone 16 tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 16</a>, nổi bật với chip Apple A18 Bionic tiên tiến. Chip này không chỉ tăng tốc độ xử lý mà còn cải thiện đáng kể hiệu quả năng lượng. Đây chính là lựa chọn lý tưởng cho những ai đòi hỏi hiệu năng vượt trội từ thiết bị của mình.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a class="preventdefault" href="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-1-1.jpg" rel="nofollow noopener" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);"><img alt="Chip Apple A15 Bionic mạnh mẽ - iPhone 13 128GB" data-src="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-1-1.jpg" class=" lazyloaded" title="Chip Apple A15 Bionic mạnh mẽ - iPhone 13 128GB" src="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-1-1.jpg" style="margin: 0px 0px 0px -10px; padding: 0px; border: 0px; width: calc(100% + 20px) !important;"></a></p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Nhờ hiệu năng được cải tiến, người dùng có được những trải nghiệm tốt hơn trên <a href="https://www.thegioididong.com/dtdd" target="_blank" title="Tham khảo điện thoại kinh doanh tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">điện thoại</a> khi dùng các ứng dụng chỉnh sửa ảnh hay chiến các tựa game đồ họa cao mượt mà.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a class="preventdefault" href="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-2.jpg" rel="nofollow noopener" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);"><img alt="Đồ họa mượt mà - iPhone 13 128GB" data-src="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-2.jpg" class=" lazyloaded" title="Đồ họa mượt mà - iPhone 13 128GB" src="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-2.jpg" style="margin: 0px 0px 0px -10px; padding: 0px; border: 0px; width: calc(100% + 20px) !important;"></a></p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">iPhone 13 trang bị bộ nhớ trong 128 GB dung lượng lý tưởng cho phép bạn thỏa thích lưu trữ mọi nội dung theo ý muốn mà không lo nhanh đầy bộ nhớ. Nếu bạn cần không gian lưu trữ lớn hơn, phiên bản <a href="https://www.thegioididong.com/dtdd/iphone-13-256gb" target="_blank" title="iPhone 13 256GB" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 13 256GB</a> hoặc bản 512GB sẽ là lựa chọn đáng cân nhắc, đáp ứng tốt nhu cầu lưu trữ ảnh, video và ứng dụng.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a class="preventdefault" href="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-19.jpg" rel="nofollow noopener" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);"><img alt="Dung lượng bộ nhớ - iPhone 13 128GB" data-src="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-19.jpg" class=" lazyloaded" title="Dung lượng bộ nhớ - iPhone 13 128GB" src="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-19.jpg" style="margin: 0px 0px 0px -10px; padding: 0px; border: 0px; width: calc(100% + 20px) !important;"></a></p><h3 style="margin: 20px 0px 15px; padding: 0px; font-style: normal; font-variant: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 20px; line-height: 28px; font-family: Arial, Helvetica, sans-serif; color: rgb(16, 16, 16); outline: 0px; text-align: justify;">Tốc độ 5G tốt hơn&nbsp;</h3><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Mạng 5G được cải thiện chất lượng với nhiều băng tần hơn, với 5G giúp điện thoại xem trực tuyến hay tải xuống các ứng dụng và tài liệu đều đạt tốc độ nhanh chóng. Không chỉ vậy, siêu phẩm mới này còn có chế độ dữ liệu thông minh, tự động phát hiện và giảm tải tốc độ mạng để tiết kiệm năng lượng khi không cần dùng tốc độ cao.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a class="preventdefault" href="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-4.jpg" rel="nofollow noopener" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);"><img alt="Hỗ trợ kết nối 5G hiện đại - iPhone 13 128GB" data-src="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-4.jpg" class=" lazyloaded" title="Hỗ trợ kết nối 5G hiện đại - iPhone 13 128GB" src="https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-4.jpg" style="margin: 0px 0px 0px -10px; padding: 0px; border: 0px; width: calc(100% + 20px) !important;"></a></p>',
  'thumbnail' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0018-V1',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 23,
  'image' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0018-V2',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 13,
  'image' => 'image/iphone13_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0018-V3',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 38,
  'image' => 'image/iphone13_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 14 LL/A Mỹ',
  'slug' => 'iphone-14-lla-my',
  'sku' => 'SP0019',
  'description' => '<h3 style="margin: 20px 0px 15px; padding: 0px; font-style: normal; font-variant: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 20px; line-height: 28px; font-family: Arial, Helvetica, sans-serif; color: rgb(16, 16, 16); outline: 0px; text-align: justify;"><a href="https://www.thegioididong.com/dtdd/iphone-14" target="_blank" title="Tham khảo điện thoại iPhone 14 tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255); font: 20px / 18px Arial, Helvetica, sans-serif; outline: 0px;">iPhone 14 128GB</a> được xem là mẫu smartphone bùng nổ của nhà táo trong năm 2022, ấn tượng với ngoại hình trẻ trung, màn hình chất lượng đi kèm với những cải tiến về hệ điều hành và thuật toán xử lý hình ảnh, giúp máy trở thành cái tên thu hút được đông đảo người dùng quan tâm tại thời điểm ra mắt.</h3><h3 style="margin: 20px 0px 15px; padding: 0px; font-style: normal; font-variant: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 20px; line-height: 28px; font-family: Arial, Helvetica, sans-serif; color: rgb(16, 16, 16); outline: 0px; text-align: justify;">iPhone 14 sở hữu thiết kế cao cấp</h3><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Với phiên bản tiêu chuẩn thì nhà Apple vẫn giữ nguyên kiểu dáng thiết kế so với thế hệ tiền nhiệm, vẫn là mặt lưng phẳng cùng bộ khung vuông giúp máy trở nên hiện đại hơn.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a class="preventdefault" href="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-100323-101502.jpg" rel="nofollow noopener" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);"><img alt="Thiết kế hiện đại - iPhone 14 128GB" data-src="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-100323-101502.jpg" class="lazyloaded description-image" title="Thiết kế hiện đại - iPhone 14 128GB" src="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-100323-101502.jpg" style="margin: 0px 0px 0px -10px; padding: 0px; border: 0px; width: calc(100% + 20px) !important; max-width: 100%;" draggable="true"></a></p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a href="https://www.thegioididong.com/dtdd-apple-iphone-14-series" target="_blank" title="Tham khảo iPhone 14 tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 14</a> có kích thước chiều ngang là 71.5 mm nên máy có thể dễ dàng nằm gọn trong lòng bàn tay mỗi khi sử dụng, điều này làm cho <a href="https://www.thegioididong.com/dtdd" target="_blank" title="Tham khảo điện thoại di động đang kinh doanh tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">điện thoại</a> trở nên phù hợp hơn với nhiều đối tượng người dùng hơn, kể cả những bạn nữ có bàn tay nhỏ nhắn.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a class="preventdefault" href="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-camera.jpg" rel="nofollow noopener" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);"><img alt="Camera - iPhone 14 128GB" data-src="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-camera.jpg" class="lazyloaded description-image" title="Camera - iPhone 14 128GB" src="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-camera.jpg" style="margin: 0px 0px 0px -10px; padding: 0px; border: 0px; width: calc(100% + 20px) !important; max-width: 100%;" draggable="true"></a></p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Mặt lưng của điện thoại được thiết kế từ kính cường lực và hoàn thiện theo kiểu nhẵn bóng, theo mình thì cách làm này giúp cho iPhone 14 trông cuốn hút hơn, bên cạnh đó máy cũng khá bền bỉ có thể mang lại khả năng chống chịu các vết xước được tốt hơn.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Có một lưu ý nhỏ ở phần thiết kế là máy khá dễ bám dấu vân tay, điều này càng thêm lộ rõ ở những phiên bản có màu đậm như đen và đỏ, còn ở các phiên bản màu sáng như xanh dương, trắng và tím nhạt thì điều này cũng được cải thiện.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Tuy nhiên đây cũng là điều thường gặp trên các mẫu điện thoại có mặt lưng kính nên mình cũng không xem đây là điểm trừ dành cho iPhone 14, bằng cách trang bị thêm ốp lưng là ta đã có thể khắc phục hoàn toàn tình trạng trên và còn tăng thêm độ bền cho điện thoại.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Năm nay Apple cho ra mắt hai phiên bản có màu mới dành cho iPhone 14 là tím nhạt và xanh dương, theo mình thấy thì màu xanh này có màu dịu nhẹ hơn so với iPhone 13. Vậy nên nhờ màu sắc mà mình có thể dễ dàng phân biệt giữa hai dòng điện thoại, nếu muốn mọi người xung quanh biết được rằng bạn đang sở hữu iPhone 14 thì hai màu sắc này sẽ là sự lựa chọn rất phù hợp.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Trong khi iPhone 14 128GB vẫn là một lựa chọn phổ biến với ngoại hình trẻ trung và hiệu năng ổn định, thì <a href="https://www.thegioididong.com/dtdd/iphone-16" target="_blank" title="Tham khảo iPhone 16 128GB tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 16 128GB</a> đã ra mắt mang đến những cải tiến vượt trội. Nếu bạn đang tìm kiếm những tính năng mới nhất và công nghệ tiên tiến nhất, iPhone 16 128GB có thể là một lựa chọn tốt hơn, đem lại trải nghiệm người dùng cao cấp và hiện đại hơn.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><i style="margin: 0px; padding: 0px;">Thậm chí, với sự xuất hiện của dòng </i><i style="margin: 0px; padding: 0px;"><a href="https://www.thegioididong.com/dtdd-apple-iphone-17-series" target="_blank" title="Tham khảo iPhone 17 series chính hãng, giá tốt tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 17</a></i><i style="margin: 0px; padding: 0px;">, trải nghiệm smartphone lại được nâng lên một tầm cao mới. Các phiên bản như </i><i style="margin: 0px; padding: 0px;"><a href="https://www.thegioididong.com/dtdd/iphone-17-pro" target="_blank" title="Tham khảo iPhone 17 Pro 256GB tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 17 Pro</a></i><i style="margin: 0px; padding: 0px;"> và </i><i style="margin: 0px; padding: 0px;"><a href="https://www.thegioididong.com/dtdd/iphone-17-pro-max" target="_blank" title="Tham khảo iPhone 17 Pro Max tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 17 Pro Max</a></i><i style="margin: 0px; padding: 0px;"> đã chính thức ra mắt, với những công nghệ đột phá về chip và camera, khẳng định vị thế dẫn đầu của Apple trong ngành.</i></p><h3 style="margin: 20px 0px 15px; padding: 0px; font-style: normal; font-variant: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 20px; line-height: 28px; font-family: Arial, Helvetica, sans-serif; color: rgb(16, 16, 16); outline: 0px; text-align: justify;">Giải trí đã mắt hơn trên màn hình chất lượng của iPhone 14</h3><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Máy sử dụng tấm nền OLED nên màu sắc mà máy mang lại rất có chiều sâu, màu sắc hiển thị với độ chính xác màu cao nên sẽ không bị quá ảo như trên những tấm nền khác mà ta hay gặp là AMOLED và Super AMOLED.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Xem thêm: <a href="https://www.thegioididong.com/hoi-dap/man-hinh-oled-la-gi-905762" target="_blank" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">Màn hình OLED là gì? Có gì nổi bật? Thiết bị nào có màn hình OLED?</a></p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Trên iPhone 14 vẫn sẽ sử dụng màn hình kiểu tai thỏ, màn hình Dynamic Island chỉ xuất hiện trên dòng sản phẩm Pro của hãng, như <a href="https://www.thegioididong.com/dtdd/iphone-14-pro" target="_blank" title="Tham khảo điện thoại iPhone 14 Pro tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 14 Pro</a> và <a href="https://www.thegioididong.com/dtdd/iphone-14-pro-max" target="_blank" title="Tham khảo điện thoại iPhone 14 Pro Max tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 14 Pro Max</a>.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Màn hình của <a href="https://www.thegioididong.com/dtdd-apple-iphone" target="_blank" title="Tham khảo điện thoại iPhone đang kinh doanh tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone</a> này có <span style="margin: 0px; padding: 0px;">kích thước 6.1 inch, </span>độ phân giải 1170 x 2532 Pixels, mật độ điểm ảnh mà máy mang đến khá cao, theo như hãng công bố thì iPhone 14 có mật độ điểm ảnh khoảng 460 ppi.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Điều mà mình khá ấn tượng trên màn hình của iPhone 14 là về độ sáng, máy khá ổn định khi sử dụng điện thoại ở những môi trường có độ sáng cao như ngoài trời nắng cũng trở nên dễ dàng hơn.</p>',
  'thumbnail' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0019-V1',
  'price' => '16490000.00',
  'sale_price' => '15990000.00',
  'stock' => 37,
  'image' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0019-V2',
  'price' => '19490000.00',
  'sale_price' => '18990000.00',
  'stock' => 32,
  'image' => 'image/iphone14_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 15 LL/A Mỹ',
  'slug' => 'iphone-15-lla-my',
  'sku' => 'SP0020',
  'description' => '<div class="flex flex-col" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; display: flex !important; flex-direction: column !important;"><div class="flex items-center justify-between gap-2.5" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; display: flex !important; align-items: center !important; justify-content: space-between !important; gap: 0.625rem !important;"><h2 class="text-textOnWhitePrimary b2-semibold pc:h4-semibold" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; line-height: 36px !important; color: rgb(9, 13, 20) !important; font-size: 28px !important;">Mô tả sản phẩm</h2></div></div><div class="" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none;"><div class="overflow-hidden transition-all duration-500 [&amp;_blockquote]:m-[revert] [&amp;_dl]:m-[revert] [&amp;_dd]:m-[revert] [&amp;_h1]:m-[revert] [&amp;_h2]:m-[revert] [&amp;_h3]:m-[revert] [&amp;_h4]:m-[revert] [&amp;_h5]:m-[revert] [&amp;_h6]:m-[revert] [&amp;_hr]:m-[revert] [&amp;_p]:m-[revert] [&amp;_pre]:m-[revert] [&amp;_h2]:h6-semibold [&amp;_h3]:b2-semibold [&amp;_h3]:pc:b1-semibold [&amp;_img]:![width:100%] [&amp;_img]:![height:100%] [&amp;_table]:![border-width:thin] [&amp;_tbody]:![border-width:thin] [&amp;_thead]:![border-width:thin] [&amp;_tr]:![border-width:thin] [&amp;_td]:![border-width:thin] [&amp;_th]:![border-width:thin] [&amp;_table_tr_td]:px-2 [&amp;_table_tr_td]:py-1 [&amp;_ol]:m-[revert] [&amp;_ol]:list-[revert] [&amp;_ol]:p-[revert] [&amp;_ul]:m-[revert] [&amp;_ul]:list-[revert] [&amp;_ul]:p-[revert] [&amp;_a]:text-blue-blue-7 [&amp;_a]:hover:text-blue-blue-6 [&amp;_figure]:![width:100%] [&amp;_figure]:overflow-x-auto [&amp;_figure]:![display:block] [&amp;_iframe]:![width:100%] [&amp;_iframe]:![height:300px] pc:[&amp;_iframe]:![height:600px]" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; transition-duration: 0.5s !important; transition-property: all !important; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important;"><p style="margin-bottom: 11px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify; margin-top: revert !important; margin-right: revert !important; margin-left: revert !important;"><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;">Với iPhone 15, bạn sẽ được tận hưởng những trải nghiệm cao cấp trên một thiết bị bền bỉ và thanh lịch. Sản phẩm gây ấn tượng với màn hình Dynamic Island, camera độ phân giải siêu cao cùng nhiều chế độ quay chụp xuất sắc. Nhờ cổng USB-C, trải nghiệm kết nối của iPhone 15 thực sự khác biệt so với các thế hệ trước.</span></p><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/2023_9_13_638302015849272512_iPhone_15_Pink_Pure_Back_iPhone_15_Pink_Pure_Front_2up_Screen__USEN.jpg" alt="Trải nghiệm cao cấp trên iPhone 15" loading="lazy" class="description-image" draggable="true" style="height: 536px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><p style="margin-bottom: 11px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: center; margin-top: revert !important; margin-right: revert !important; margin-left: revert !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/1/iphone-15-html-1.png" alt="Hình ảnh iPhone 15 1" loading="lazy" class="description-image" draggable="true" style="height: 838.203px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></p><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/1/iphone-15-html-2.png" alt="Hình ảnh iPhone 15 (2)" loading="lazy" class="description-image" draggable="true" style="height: 865.297px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/1/iphone-15-html-3.png" alt="Hình ảnh iPhone 15 (3)" loading="lazy" class="description-image" draggable="true" style="height: 836.781px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure></div></div>',
  'thumbnail' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0020-V1',
  'price' => '19990000.00',
  'sale_price' => '19490000.00',
  'stock' => 22,
  'image' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0020-V2',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 16,
  'image' => 'image/iphone15_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 16 LL/A Mỹ',
  'slug' => 'iphone-16-lla-my',
  'sku' => 'SP0021',
  'description' => '<div class="flex flex-col" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; display: flex !important; flex-direction: column !important;"><div class="flex items-center justify-between gap-2.5" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; display: flex !important; align-items: center !important; justify-content: space-between !important; gap: 0.625rem !important;"><h2 class="text-textOnWhitePrimary b2-semibold pc:h4-semibold" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; line-height: 36px !important; color: rgb(9, 13, 20) !important; font-size: 28px !important;">Mô tả sản phẩm</h2></div></div><div class="" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none;"><div class="overflow-hidden transition-all duration-500 [&amp;_blockquote]:m-[revert] [&amp;_dl]:m-[revert] [&amp;_dd]:m-[revert] [&amp;_h1]:m-[revert] [&amp;_h2]:m-[revert] [&amp;_h3]:m-[revert] [&amp;_h4]:m-[revert] [&amp;_h5]:m-[revert] [&amp;_h6]:m-[revert] [&amp;_hr]:m-[revert] [&amp;_p]:m-[revert] [&amp;_pre]:m-[revert] [&amp;_h2]:h6-semibold [&amp;_h3]:b2-semibold [&amp;_h3]:pc:b1-semibold [&amp;_img]:![width:100%] [&amp;_img]:![height:100%] [&amp;_table]:![border-width:thin] [&amp;_tbody]:![border-width:thin] [&amp;_thead]:![border-width:thin] [&amp;_tr]:![border-width:thin] [&amp;_td]:![border-width:thin] [&amp;_th]:![border-width:thin] [&amp;_table_tr_td]:px-2 [&amp;_table_tr_td]:py-1 [&amp;_ol]:m-[revert] [&amp;_ol]:list-[revert] [&amp;_ol]:p-[revert] [&amp;_ul]:m-[revert] [&amp;_ul]:list-[revert] [&amp;_ul]:p-[revert] [&amp;_a]:text-blue-blue-7 [&amp;_a]:hover:text-blue-blue-6 [&amp;_figure]:![width:100%] [&amp;_figure]:overflow-x-auto [&amp;_figure]:![display:block] [&amp;_iframe]:![width:100%] [&amp;_iframe]:![height:300px] pc:[&amp;_iframe]:![height:600px]" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; transition-duration: 0.5s !important; transition-property: all !important; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important;"><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/800x0/iphone_16_1_adbd8a84f3.jpg" alt="iphone-16-1.jpg" loading="lazy" class="description-image" draggable="true" style="height: 929.625px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/iphone_16_2_a2a42b298d.jpg" alt="iphone-16-2.jpg" loading="lazy" class="description-image" draggable="true" style="height: 951.125px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/iphone_16_3_d0e1eb87ef.jpg" alt="iphone-16-3.jpg" loading="lazy" class="description-image" draggable="true" style="height: 1048.19px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/iphone_16_5_6544aed046.jpg" alt="iphone-16-5.jpg" loading="lazy" class="description-image" draggable="true" style="height: 1190.67px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/iphone_16_6_5f9dfaf2d4.jpg" alt="iphone-16-6.jpg" loading="lazy" class="description-image" draggable="true" style="height: 1055.48px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure></div></div>',
  'thumbnail' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0021-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 24,
  'image' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 18,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0021-V2',
  'price' => '25990000.00',
  'sale_price' => '25490000.00',
  'stock' => 11,
  'image' => 'image/iphone16_white.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 2,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 17 Pro Max LL/A Mỹ',
  'slug' => 'iphone-17-pro-max-lla-my-22',
  'sku' => 'SP0022',
  'description' => 'iPhone 17 Pro Max LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0022-V1',
  'price' => '34990000.00',
  'sale_price' => '34490000.00',
  'stock' => 36,
  'image' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0022-V2',
  'price' => '39990000.00',
  'sale_price' => '39490000.00',
  'stock' => 39,
  'image' => 'image/iphone17promax_titanium.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 11,
  1 => 19,
  2 => 24,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 1,
  'name' => 'iPad Gen 10 WiFi LL/A Mỹ',
  'slug' => 'ipad-gen-10-wifi-lla-my-23',
  'sku' => 'SP0023',
  'description' => 'iPad Gen 10 WiFi LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0023-V1',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 21,
  'image' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0023-V2',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 17,
  'image' => 'image/ipad10_pink_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0023-V3',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 38,
  'image' => 'image/ipad10_silver_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0023-V4',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 40,
  'image' => 'image/ipad10_yellow_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0023-V5',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 38,
  'image' => 'image/ipad10_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0023-V6',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 19,
  'image' => 'image/ipad10_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0023-V7',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 28,
  'image' => 'image/ipad10_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0023-V8',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 22,
  'image' => 'image/ipad10_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A35 LL/A Mỹ',
  'slug' => 'samsung-galaxy-a35-lla-my-24',
  'sku' => 'SP0024',
  'description' => 'Samsung Galaxy A35 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0024-V1',
  'price' => '7490000.00',
  'sale_price' => '6990000.00',
  'stock' => 19,
  'image' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 8,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A55 LL/A Mỹ',
  'slug' => 'samsung-galaxy-a55-lla-my-25',
  'sku' => 'SP0025',
  'description' => 'Samsung Galaxy A55 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0025-V1',
  'price' => '9990000.00',
  'sale_price' => '9490000.00',
  'stock' => 28,
  'image' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 14,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy M54 LL/A Mỹ',
  'slug' => 'samsung-galaxy-m54-lla-my-26',
  'sku' => 'SP0026',
  'description' => 'Samsung Galaxy M54 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0026-V1',
  'price' => '8290000.00',
  'sale_price' => '7790000.00',
  'stock' => 27,
  'image' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S23 FE LL/A Mỹ',
  'slug' => 'samsung-galaxy-s23-fe-lla-my-27',
  'sku' => 'SP0027',
  'description' => 'Samsung Galaxy S23 FE LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0027-V1',
  'price' => '10990000.00',
  'sale_price' => '10490000.00',
  'stock' => 28,
  'image' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 9,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 LL/A Mỹ',
  'slug' => 'samsung-galaxy-s24-lla-my-28',
  'sku' => 'SP0028',
  'description' => 'Samsung Galaxy S24 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0028-V1',
  'price' => '18990000.00',
  'sale_price' => '18490000.00',
  'stock' => 32,
  'image' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Plus LL/A Mỹ',
  'slug' => 'samsung-galaxy-s24-plus-lla-my-29',
  'sku' => 'SP0029',
  'description' => 'Samsung Galaxy S24 Plus LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0029-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 14,
  'image' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Ultra LL/A Mỹ',
  'slug' => 'samsung-galaxy-s24-ultra-lla-my-30',
  'sku' => 'SP0030',
  'description' => 'Samsung Galaxy S24 Ultra LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0030-V1',
  'price' => '26990000.00',
  'sale_price' => '26490000.00',
  'stock' => 14,
  'image' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Flip5 LL/A Mỹ',
  'slug' => 'samsung-galaxy-z-flip5-lla-my-31',
  'sku' => 'SP0031',
  'description' => 'Samsung Galaxy Z Flip5 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0031-V1',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 17,
  'image' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 15,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Fold5 LL/A Mỹ',
  'slug' => 'samsung-galaxy-z-fold5-lla-my-32',
  'sku' => 'SP0032',
  'description' => 'Samsung Galaxy Z Fold5 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0032-V1',
  'price' => '29990000.00',
  'sale_price' => '29490000.00',
  'stock' => 23,
  'image' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Tab S9 LL/A Mỹ',
  'slug' => 'samsung-galaxy-tab-s9-lla-my-33',
  'sku' => 'SP0033',
  'description' => 'Samsung Galaxy Tab S9 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0033-V1',
  'price' => '16990000.00',
  'sale_price' => '16490000.00',
  'stock' => 36,
  'image' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 10,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Tab S10 LL/A Mỹ',
  'slug' => 'samsung-galaxy-tab-s10-lla-my-34',
  'sku' => 'SP0034',
  'description' => 'Samsung Galaxy Tab S10 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0034-V1',
  'price' => '20990000.00',
  'sale_price' => '20490000.00',
  'stock' => 29,
  'image' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 13 ZA/A',
  'slug' => 'iphone-13-zaa-35',
  'sku' => 'SP0035',
  'description' => 'iPhone 13 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0035-V1',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 31,
  'image' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0035-V2',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 23,
  'image' => 'image/iphone13_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0035-V3',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 22,
  'image' => 'image/iphone13_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 14 ZA/A',
  'slug' => 'iphone-14-zaa',
  'sku' => 'SP0036',
  'description' => '<h3 style="margin: 20px 0px 15px; padding: 0px; font-style: normal; font-variant: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 20px; line-height: 28px; font-family: Arial, Helvetica, sans-serif; color: rgb(16, 16, 16); outline: 0px; text-align: justify;"><a href="https://www.thegioididong.com/dtdd/iphone-14" target="_blank" title="Tham khảo điện thoại iPhone 14 tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255); font: 20px / 18px Arial, Helvetica, sans-serif; outline: 0px;">iPhone 14 128GB</a> được xem là mẫu smartphone bùng nổ của nhà táo trong năm 2022, ấn tượng với ngoại hình trẻ trung, màn hình chất lượng đi kèm với những cải tiến về hệ điều hành và thuật toán xử lý hình ảnh, giúp máy trở thành cái tên thu hút được đông đảo người dùng quan tâm tại thời điểm ra mắt.</h3><h3 style="margin: 20px 0px 15px; padding: 0px; font-style: normal; font-variant: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 20px; line-height: 28px; font-family: Arial, Helvetica, sans-serif; color: rgb(16, 16, 16); outline: 0px; text-align: justify;">iPhone 14 sở hữu thiết kế cao cấp</h3><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Với phiên bản tiêu chuẩn thì nhà Apple vẫn giữ nguyên kiểu dáng thiết kế so với thế hệ tiền nhiệm, vẫn là mặt lưng phẳng cùng bộ khung vuông giúp máy trở nên hiện đại hơn.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a class="preventdefault" href="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-100323-101502.jpg" rel="nofollow noopener" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);"><img alt="Thiết kế hiện đại - iPhone 14 128GB" data-src="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-100323-101502.jpg" class=" lazyloaded" title="Thiết kế hiện đại - iPhone 14 128GB" src="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-100323-101502.jpg" style="margin: 0px 0px 0px -10px; padding: 0px; border: 0px; width: calc(100% + 20px) !important;"></a></p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a href="https://www.thegioididong.com/dtdd-apple-iphone-14-series" target="_blank" title="Tham khảo iPhone 14 tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 14</a> có kích thước chiều ngang là 71.5 mm nên máy có thể dễ dàng nằm gọn trong lòng bàn tay mỗi khi sử dụng, điều này làm cho <a href="https://www.thegioididong.com/dtdd" target="_blank" title="Tham khảo điện thoại di động đang kinh doanh tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">điện thoại</a> trở nên phù hợp hơn với nhiều đối tượng người dùng hơn, kể cả những bạn nữ có bàn tay nhỏ nhắn.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><a class="preventdefault" href="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-camera.jpg" rel="nofollow noopener" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);"><img alt="Camera - iPhone 14 128GB" data-src="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-camera.jpg" class=" lazyloaded" title="Camera - iPhone 14 128GB" src="https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-camera.jpg" style="margin: 0px 0px 0px -10px; padding: 0px; border: 0px; width: calc(100% + 20px) !important;"></a></p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Mặt lưng của điện thoại được thiết kế từ kính cường lực và hoàn thiện theo kiểu nhẵn bóng, theo mình thì cách làm này giúp cho iPhone 14 trông cuốn hút hơn, bên cạnh đó máy cũng khá bền bỉ có thể mang lại khả năng chống chịu các vết xước được tốt hơn.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Có một lưu ý nhỏ ở phần thiết kế là máy khá dễ bám dấu vân tay, điều này càng thêm lộ rõ ở những phiên bản có màu đậm như đen và đỏ, còn ở các phiên bản màu sáng như xanh dương, trắng và tím nhạt thì điều này cũng được cải thiện.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Tuy nhiên đây cũng là điều thường gặp trên các mẫu điện thoại có mặt lưng kính nên mình cũng không xem đây là điểm trừ dành cho iPhone 14, bằng cách trang bị thêm ốp lưng là ta đã có thể khắc phục hoàn toàn tình trạng trên và còn tăng thêm độ bền cho điện thoại.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Năm nay Apple cho ra mắt hai phiên bản có màu mới dành cho iPhone 14 là tím nhạt và xanh dương, theo mình thấy thì màu xanh này có màu dịu nhẹ hơn so với iPhone 13. Vậy nên nhờ màu sắc mà mình có thể dễ dàng phân biệt giữa hai dòng điện thoại, nếu muốn mọi người xung quanh biết được rằng bạn đang sở hữu iPhone 14 thì hai màu sắc này sẽ là sự lựa chọn rất phù hợp.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Trong khi iPhone 14 128GB vẫn là một lựa chọn phổ biến với ngoại hình trẻ trung và hiệu năng ổn định, thì <a href="https://www.thegioididong.com/dtdd/iphone-16" target="_blank" title="Tham khảo iPhone 16 128GB tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 16 128GB</a> đã ra mắt mang đến những cải tiến vượt trội. Nếu bạn đang tìm kiếm những tính năng mới nhất và công nghệ tiên tiến nhất, iPhone 16 128GB có thể là một lựa chọn tốt hơn, đem lại trải nghiệm người dùng cao cấp và hiện đại hơn.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;"><i style="margin: 0px; padding: 0px;">Thậm chí, với sự xuất hiện của dòng </i><i style="margin: 0px; padding: 0px;"><a href="https://www.thegioididong.com/dtdd-apple-iphone-17-series" target="_blank" title="Tham khảo iPhone 17 series chính hãng, giá tốt tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 17</a></i><i style="margin: 0px; padding: 0px;">, trải nghiệm smartphone lại được nâng lên một tầm cao mới. Các phiên bản như </i><i style="margin: 0px; padding: 0px;"><a href="https://www.thegioididong.com/dtdd/iphone-17-pro" target="_blank" title="Tham khảo iPhone 17 Pro 256GB tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 17 Pro</a></i><i style="margin: 0px; padding: 0px;"> và </i><i style="margin: 0px; padding: 0px;"><a href="https://www.thegioididong.com/dtdd/iphone-17-pro-max" target="_blank" title="Tham khảo iPhone 17 Pro Max tại Thegioididong.com" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 17 Pro Max</a></i><i style="margin: 0px; padding: 0px;"> đã chính thức ra mắt, với những công nghệ đột phá về chip và camera, khẳng định vị thế dẫn đầu của Apple trong ngành.</i></p><h3 style="margin: 20px 0px 15px; padding: 0px; font-style: normal; font-variant: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 20px; line-height: 28px; font-family: Arial, Helvetica, sans-serif; color: rgb(16, 16, 16); outline: 0px; text-align: justify;">Giải trí đã mắt hơn trên màn hình chất lượng của iPhone 14</h3><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Máy sử dụng tấm nền OLED nên màu sắc mà máy mang lại rất có chiều sâu, màu sắc hiển thị với độ chính xác màu cao nên sẽ không bị quá ảo như trên những tấm nền khác mà ta hay gặp là AMOLED và Super AMOLED.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Xem thêm: <a href="https://www.thegioididong.com/hoi-dap/man-hinh-oled-la-gi-905762" target="_blank" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">Màn hình OLED là gì? Có gì nổi bật? Thiết bị nào có màn hình OLED?</a></p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Trên iPhone 14 vẫn sẽ sử dụng màn hình kiểu tai thỏ, màn hình Dynamic Island chỉ xuất hiện trên dòng sản phẩm Pro của hãng, như <a href="https://www.thegioididong.com/dtdd/iphone-14-pro" target="_blank" title="Tham khảo điện thoại iPhone 14 Pro tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 14 Pro</a> và <a href="https://www.thegioididong.com/dtdd/iphone-14-pro-max" target="_blank" title="Tham khảo điện thoại iPhone 14 Pro Max tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone 14 Pro Max</a>.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Màn hình của <a href="https://www.thegioididong.com/dtdd-apple-iphone" target="_blank" title="Tham khảo điện thoại iPhone đang kinh doanh tại Thế Giới Di Động" rel="" style="margin: 0px; padding: 0px; text-decoration: none; transition: 0.2s; color: rgb(41, 151, 255);">iPhone</a> này có <span style="margin: 0px; padding: 0px;">kích thước 6.1 inch, </span>độ phân giải 1170 x 2532 Pixels, mật độ điểm ảnh mà máy mang đến khá cao, theo như hãng công bố thì iPhone 14 có mật độ điểm ảnh khoảng 460 ppi.</p><p style="margin: 0px 0px 15px; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.5; color: rgb(16, 16, 16); font-family: Arial, Helvetica, sans-serif; text-align: justify;">Điều mà mình khá ấn tượng trên màn hình của iPhone 14 là về độ sáng, máy khá ổn định khi sử dụng điện thoại ở những môi trường có độ sáng cao như ngoài trời nắng cũng trở nên dễ dàng hơn.</p>',
  'thumbnail' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0036-V1',
  'price' => '16490000.00',
  'sale_price' => '15990000.00',
  'stock' => 35,
  'image' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0036-V2',
  'price' => '19490000.00',
  'sale_price' => '18990000.00',
  'stock' => 31,
  'image' => 'image/iphone14_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 15 ZA/A',
  'slug' => 'iphone-15-zaa',
  'sku' => 'SP0037',
  'description' => '<div class="flex flex-col" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; display: flex !important; flex-direction: column !important;"><div class="flex items-center justify-between gap-2.5" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; display: flex !important; align-items: center !important; justify-content: space-between !important; gap: 0.625rem !important;"><h2 class="text-textOnWhitePrimary b2-semibold pc:h4-semibold" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; line-height: 36px !important; color: rgb(9, 13, 20) !important; font-size: 28px !important;">Mô tả sản phẩm</h2></div></div><div class="" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none;"><div class="overflow-hidden transition-all duration-500 [&amp;_blockquote]:m-[revert] [&amp;_dl]:m-[revert] [&amp;_dd]:m-[revert] [&amp;_h1]:m-[revert] [&amp;_h2]:m-[revert] [&amp;_h3]:m-[revert] [&amp;_h4]:m-[revert] [&amp;_h5]:m-[revert] [&amp;_h6]:m-[revert] [&amp;_hr]:m-[revert] [&amp;_p]:m-[revert] [&amp;_pre]:m-[revert] [&amp;_h2]:h6-semibold [&amp;_h3]:b2-semibold [&amp;_h3]:pc:b1-semibold [&amp;_img]:![width:100%] [&amp;_img]:![height:100%] [&amp;_table]:![border-width:thin] [&amp;_tbody]:![border-width:thin] [&amp;_thead]:![border-width:thin] [&amp;_tr]:![border-width:thin] [&amp;_td]:![border-width:thin] [&amp;_th]:![border-width:thin] [&amp;_table_tr_td]:px-2 [&amp;_table_tr_td]:py-1 [&amp;_ol]:m-[revert] [&amp;_ol]:list-[revert] [&amp;_ol]:p-[revert] [&amp;_ul]:m-[revert] [&amp;_ul]:list-[revert] [&amp;_ul]:p-[revert] [&amp;_a]:text-blue-blue-7 [&amp;_a]:hover:text-blue-blue-6 [&amp;_figure]:![width:100%] [&amp;_figure]:overflow-x-auto [&amp;_figure]:![display:block] [&amp;_iframe]:![width:100%] [&amp;_iframe]:![height:300px] pc:[&amp;_iframe]:![height:600px]" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; transition-duration: 0.5s !important; transition-property: all !important; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important;"><p style="margin-bottom: 11px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify; margin-top: revert !important; margin-right: revert !important; margin-left: revert !important;"><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;">Với iPhone 15, bạn sẽ được tận hưởng những trải nghiệm cao cấp trên một thiết bị bền bỉ và thanh lịch. Sản phẩm gây ấn tượng với màn hình Dynamic Island, camera độ phân giải siêu cao cùng nhiều chế độ quay chụp xuất sắc. Nhờ cổng USB-C, trải nghiệm kết nối của iPhone 15 thực sự khác biệt so với các thế hệ trước.</span></p><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/2023_9_13_638302015849272512_iPhone_15_Pink_Pure_Back_iPhone_15_Pink_Pure_Front_2up_Screen__USEN.jpg" alt="Trải nghiệm cao cấp trên iPhone 15" loading="lazy" class="description-image" draggable="true" style="height: 536px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><p style="margin-bottom: 11px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: center; margin-top: revert !important; margin-right: revert !important; margin-left: revert !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/1/iphone-15-html-1.png" alt="Hình ảnh iPhone 15 1" loading="lazy" class="description-image" draggable="true" style="height: 838.203px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></p><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/1/iphone-15-html-2.png" alt="Hình ảnh iPhone 15 (2)" loading="lazy" class="description-image" draggable="true" style="height: 865.297px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/1/iphone-15-html-3.png" alt="Hình ảnh iPhone 15 (3)" loading="lazy" class="description-image" draggable="true" style="height: 836.781px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure></div></div>',
  'thumbnail' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0037-V1',
  'price' => '19990000.00',
  'sale_price' => '19490000.00',
  'stock' => 25,
  'image' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0037-V2',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 40,
  'image' => 'image/iphone15_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 16 ZA/A',
  'slug' => 'iphone-16-zaa',
  'sku' => 'SP0038',
  'description' => '<div class="flex flex-col" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; display: flex !important; flex-direction: column !important;"><div class="flex items-center justify-between gap-2.5" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; display: flex !important; align-items: center !important; justify-content: space-between !important; gap: 0.625rem !important;"><h2 class="text-textOnWhitePrimary b2-semibold pc:h4-semibold" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; line-height: 36px !important; color: rgb(9, 13, 20) !important; font-size: 28px !important;">Mô tả sản phẩm</h2></div></div><div class="" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none;"><div class="overflow-hidden transition-all duration-500 [&amp;_blockquote]:m-[revert] [&amp;_dl]:m-[revert] [&amp;_dd]:m-[revert] [&amp;_h1]:m-[revert] [&amp;_h2]:m-[revert] [&amp;_h3]:m-[revert] [&amp;_h4]:m-[revert] [&amp;_h5]:m-[revert] [&amp;_h6]:m-[revert] [&amp;_hr]:m-[revert] [&amp;_p]:m-[revert] [&amp;_pre]:m-[revert] [&amp;_h2]:h6-semibold [&amp;_h3]:b2-semibold [&amp;_h3]:pc:b1-semibold [&amp;_img]:![width:100%] [&amp;_img]:![height:100%] [&amp;_table]:![border-width:thin] [&amp;_tbody]:![border-width:thin] [&amp;_thead]:![border-width:thin] [&amp;_tr]:![border-width:thin] [&amp;_td]:![border-width:thin] [&amp;_th]:![border-width:thin] [&amp;_table_tr_td]:px-2 [&amp;_table_tr_td]:py-1 [&amp;_ol]:m-[revert] [&amp;_ol]:list-[revert] [&amp;_ol]:p-[revert] [&amp;_ul]:m-[revert] [&amp;_ul]:list-[revert] [&amp;_ul]:p-[revert] [&amp;_a]:text-blue-blue-7 [&amp;_a]:hover:text-blue-blue-6 [&amp;_figure]:![width:100%] [&amp;_figure]:overflow-x-auto [&amp;_figure]:![display:block] [&amp;_iframe]:![width:100%] [&amp;_iframe]:![height:300px] pc:[&amp;_iframe]:![height:600px]" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; transition-duration: 0.5s !important; transition-property: all !important; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important;"><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/800x0/iphone_16_1_adbd8a84f3.jpg" alt="iphone-16-1.jpg" loading="lazy" class="description-image" draggable="true" style="height: 929.625px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/iphone_16_2_a2a42b298d.jpg" alt="iphone-16-2.jpg" loading="lazy" class="description-image" draggable="true" style="height: 951.125px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/iphone_16_3_d0e1eb87ef.jpg" alt="iphone-16-3.jpg" loading="lazy" class="description-image" draggable="true" style="height: 1048.19px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/iphone_16_5_6544aed046.jpg" alt="iphone-16-5.jpg" loading="lazy" class="description-image" draggable="true" style="height: 1190.67px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/iphone_16_6_5f9dfaf2d4.jpg" alt="iphone-16-6.jpg" loading="lazy" class="description-image" draggable="true" style="height: 1055.48px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure></div></div>',
  'thumbnail' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0038-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 30,
  'image' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 18,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0038-V2',
  'price' => '25990000.00',
  'sale_price' => '25490000.00',
  'stock' => 32,
  'image' => 'image/iphone16_white.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 2,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 17 Pro Max ZA/A',
  'slug' => 'iphone-17-pro-max-zaa',
  'sku' => 'SP0039',
  'description' => 'iPhone 17 Pro Max ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.<div><img src="http://127.0.0.1:8000/image/products/description/1788368263-2l6oxQYqTtWm.jpg" alt="i_Phone_17_pro_relay_new_1_088e24a646.jpg" class="description-image" draggable="true" style="max-width: 100%; height: auto; display: block; margin: 15px 0px;"><p><br></p><br></div>',
  'thumbnail' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0039-V1',
  'price' => '34990000.00',
  'sale_price' => '34490000.00',
  'stock' => 12,
  'image' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0039-V2',
  'price' => '39990000.00',
  'sale_price' => '39490000.00',
  'stock' => 19,
  'image' => 'image/iphone17promax_titanium.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 11,
  1 => 19,
  2 => 24,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 1,
  'name' => 'iPad Gen 10 WiFi ZA/A',
  'slug' => 'ipad-gen-10-wifi-zaa-40',
  'sku' => 'SP0040',
  'description' => 'iPad Gen 10 WiFi ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0040-V1',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 29,
  'image' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0040-V2',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 31,
  'image' => 'image/ipad10_pink_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0040-V3',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 40,
  'image' => 'image/ipad10_silver_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0040-V4',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 34,
  'image' => 'image/ipad10_yellow_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0040-V5',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 17,
  'image' => 'image/ipad10_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0040-V6',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 37,
  'image' => 'image/ipad10_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0040-V7',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 17,
  'image' => 'image/ipad10_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0040-V8',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 17,
  'image' => 'image/ipad10_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A35 ZA/A',
  'slug' => 'samsung-galaxy-a35-zaa-41',
  'sku' => 'SP0041',
  'description' => 'Samsung Galaxy A35 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0041-V1',
  'price' => '7490000.00',
  'sale_price' => '6990000.00',
  'stock' => 18,
  'image' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 8,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A55 ZA/A',
  'slug' => 'samsung-galaxy-a55-zaa-42',
  'sku' => 'SP0042',
  'description' => 'Samsung Galaxy A55 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0042-V1',
  'price' => '9990000.00',
  'sale_price' => '9490000.00',
  'stock' => 36,
  'image' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 14,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy M54 ZA/A',
  'slug' => 'samsung-galaxy-m54-zaa-43',
  'sku' => 'SP0043',
  'description' => 'Samsung Galaxy M54 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0043-V1',
  'price' => '8290000.00',
  'sale_price' => '7790000.00',
  'stock' => 18,
  'image' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S23 FE ZA/A',
  'slug' => 'samsung-galaxy-s23-fe-zaa-44',
  'sku' => 'SP0044',
  'description' => 'Samsung Galaxy S23 FE ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0044-V1',
  'price' => '10990000.00',
  'sale_price' => '10490000.00',
  'stock' => 37,
  'image' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 9,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 ZA/A',
  'slug' => 'samsung-galaxy-s24-zaa-45',
  'sku' => 'SP0045',
  'description' => 'Samsung Galaxy S24 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0045-V1',
  'price' => '18990000.00',
  'sale_price' => '18490000.00',
  'stock' => 12,
  'image' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Plus ZA/A',
  'slug' => 'samsung-galaxy-s24-plus-zaa-46',
  'sku' => 'SP0046',
  'description' => 'Samsung Galaxy S24 Plus ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0046-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 31,
  'image' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Ultra ZA/A',
  'slug' => 'samsung-galaxy-s24-ultra-zaa-47',
  'sku' => 'SP0047',
  'description' => 'Samsung Galaxy S24 Ultra ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0047-V1',
  'price' => '26990000.00',
  'sale_price' => '26490000.00',
  'stock' => 14,
  'image' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Flip5 ZA/A',
  'slug' => 'samsung',
  'sku' => 'SP0048',
  'description' => 'Samsung Galaxy Z Flip5 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0048-V1',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 20,
  'image' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 15,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Fold5 ZA/A',
  'slug' => 'samsung-galaxy-z-fold5-zaa-49',
  'sku' => 'SP0049',
  'description' => 'Samsung Galaxy Z Fold5 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0049-V1',
  'price' => '29990000.00',
  'sale_price' => '29490000.00',
  'stock' => 17,
  'image' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Tab S9 ZA/A',
  'slug' => 'samsung-galaxy-tab-s9-zaa-50',
  'sku' => 'SP0050',
  'description' => 'Samsung Galaxy Tab S9 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0050-V1',
  'price' => '16990000.00',
  'sale_price' => '16490000.00',
  'stock' => 14,
  'image' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 10,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Tab S10 ZA/A',
  'slug' => 'samsung-galaxy-tab-s10-zaa-51',
  'sku' => 'SP0051',
  'description' => 'Samsung Galaxy Tab S10 ZA/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0051-V1',
  'price' => '20990000.00',
  'sale_price' => '20490000.00',
  'stock' => 35,
  'image' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 13 Like New 99%',
  'slug' => 'iphone-13-like-new-99-52',
  'sku' => 'SP0052',
  'description' => 'iPhone 13 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0052-V1',
  'price' => '11192000.00',
  'sale_price' => '10692000.00',
  'stock' => 22,
  'image' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0052-V2',
  'price' => '11192000.00',
  'sale_price' => '10692000.00',
  'stock' => 13,
  'image' => 'image/iphone13_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0052-V3',
  'price' => '12792000.00',
  'sale_price' => '12292000.00',
  'stock' => 39,
  'image' => 'image/iphone13_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 14 Like New 99%',
  'slug' => 'iphone-14-like-new-99-53',
  'sku' => 'SP0053',
  'description' => 'iPhone 14 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0053-V1',
  'price' => '13192000.00',
  'sale_price' => '12692000.00',
  'stock' => 36,
  'image' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0053-V2',
  'price' => '15592000.00',
  'sale_price' => '15092000.00',
  'stock' => 20,
  'image' => 'image/iphone14_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 15 Like New 99%',
  'slug' => 'iphone-15-like-new-99',
  'sku' => 'SP0054',
  'description' => '<div class="flex flex-col" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; display: flex !important; flex-direction: column !important;"><div class="flex items-center justify-between gap-2.5" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; display: flex !important; align-items: center !important; justify-content: space-between !important; gap: 0.625rem !important;"><h2 class="text-textOnWhitePrimary b2-semibold pc:h4-semibold" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; line-height: 36px !important; color: rgb(9, 13, 20) !important; font-size: 28px !important;">Mô tả sản phẩm</h2></div></div><div class="" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none;"><div class="overflow-hidden transition-all duration-500 [&amp;_blockquote]:m-[revert] [&amp;_dl]:m-[revert] [&amp;_dd]:m-[revert] [&amp;_h1]:m-[revert] [&amp;_h2]:m-[revert] [&amp;_h3]:m-[revert] [&amp;_h4]:m-[revert] [&amp;_h5]:m-[revert] [&amp;_h6]:m-[revert] [&amp;_hr]:m-[revert] [&amp;_p]:m-[revert] [&amp;_pre]:m-[revert] [&amp;_h2]:h6-semibold [&amp;_h3]:b2-semibold [&amp;_h3]:pc:b1-semibold [&amp;_img]:![width:100%] [&amp;_img]:![height:100%] [&amp;_table]:![border-width:thin] [&amp;_tbody]:![border-width:thin] [&amp;_thead]:![border-width:thin] [&amp;_tr]:![border-width:thin] [&amp;_td]:![border-width:thin] [&amp;_th]:![border-width:thin] [&amp;_table_tr_td]:px-2 [&amp;_table_tr_td]:py-1 [&amp;_ol]:m-[revert] [&amp;_ol]:list-[revert] [&amp;_ol]:p-[revert] [&amp;_ul]:m-[revert] [&amp;_ul]:list-[revert] [&amp;_ul]:p-[revert] [&amp;_a]:text-blue-blue-7 [&amp;_a]:hover:text-blue-blue-6 [&amp;_figure]:![width:100%] [&amp;_figure]:overflow-x-auto [&amp;_figure]:![display:block] [&amp;_iframe]:![width:100%] [&amp;_iframe]:![height:300px] pc:[&amp;_iframe]:![height:600px]" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; transition-duration: 0.5s !important; transition-property: all !important; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important;"><p style="margin-bottom: 11px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: justify; margin-top: revert !important; margin-right: revert !important; margin-left: revert !important;"><span style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-weight: bolder;">Với iPhone 15, bạn sẽ được tận hưởng những trải nghiệm cao cấp trên một thiết bị bền bỉ và thanh lịch. Sản phẩm gây ấn tượng với màn hình Dynamic Island, camera độ phân giải siêu cao cùng nhiều chế độ quay chụp xuất sắc. Nhờ cổng USB-C, trải nghiệm kết nối của iPhone 15 thực sự khác biệt so với các thế hệ trước.</span></p><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/2023_9_13_638302015849272512_iPhone_15_Pink_Pure_Back_iPhone_15_Pink_Pure_Front_2up_Screen__USEN.jpg" alt="Trải nghiệm cao cấp trên iPhone 15" loading="lazy" class="description-image" draggable="true" style="height: 536px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><p style="margin-bottom: 11px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; text-align: center; margin-top: revert !important; margin-right: revert !important; margin-left: revert !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/1/iphone-15-html-1.png" alt="Hình ảnh iPhone 15 1" loading="lazy" class="description-image" draggable="true" style="height: 838.203px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></p><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/1/iphone-15-html-2.png" alt="Hình ảnh iPhone 15 (2)" loading="lazy" class="description-image" draggable="true" style="height: 865.297px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/1/iphone-15-html-3.png" alt="Hình ảnh iPhone 15 (3)" loading="lazy" class="description-image" draggable="true" style="height: 836.781px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure></div></div>',
  'thumbnail' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0054-V1',
  'price' => '15992000.00',
  'sale_price' => '15492000.00',
  'stock' => 36,
  'image' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0054-V2',
  'price' => '18392000.00',
  'sale_price' => '17892000.00',
  'stock' => 24,
  'image' => 'image/iphone15_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 16 Like New 99%',
  'slug' => 'iphone-16-like-new-99',
  'sku' => 'SP0055',
  'description' => '<div class="flex flex-col" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none; display: flex !important; flex-direction: column !important;"><div class="flex items-center justify-between gap-2.5" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; display: flex !important; align-items: center !important; justify-content: space-between !important; gap: 0.625rem !important;"><h2 class="text-textOnWhitePrimary b2-semibold pc:h4-semibold" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; line-height: 36px !important; color: rgb(9, 13, 20) !important; font-size: 28px !important;">Mô tả sản phẩm</h2></div></div><div class="" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: __Inter_48b81b, __Inter_Fallback_48b81b; font-size: 14px; font-variant-ligatures: none;"><div class="overflow-hidden transition-all duration-500 [&amp;_blockquote]:m-[revert] [&amp;_dl]:m-[revert] [&amp;_dd]:m-[revert] [&amp;_h1]:m-[revert] [&amp;_h2]:m-[revert] [&amp;_h3]:m-[revert] [&amp;_h4]:m-[revert] [&amp;_h5]:m-[revert] [&amp;_h6]:m-[revert] [&amp;_hr]:m-[revert] [&amp;_p]:m-[revert] [&amp;_pre]:m-[revert] [&amp;_h2]:h6-semibold [&amp;_h3]:b2-semibold [&amp;_h3]:pc:b1-semibold [&amp;_img]:![width:100%] [&amp;_img]:![height:100%] [&amp;_table]:![border-width:thin] [&amp;_tbody]:![border-width:thin] [&amp;_thead]:![border-width:thin] [&amp;_tr]:![border-width:thin] [&amp;_td]:![border-width:thin] [&amp;_th]:![border-width:thin] [&amp;_table_tr_td]:px-2 [&amp;_table_tr_td]:py-1 [&amp;_ol]:m-[revert] [&amp;_ol]:list-[revert] [&amp;_ol]:p-[revert] [&amp;_ul]:m-[revert] [&amp;_ul]:list-[revert] [&amp;_ul]:p-[revert] [&amp;_a]:text-blue-blue-7 [&amp;_a]:hover:text-blue-blue-6 [&amp;_figure]:![width:100%] [&amp;_figure]:overflow-x-auto [&amp;_figure]:![display:block] [&amp;_iframe]:![width:100%] [&amp;_iframe]:![height:300px] pc:[&amp;_iframe]:![height:600px]" style="border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; transition-duration: 0.5s !important; transition-property: all !important; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important;"><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/800x0/iphone_16_1_adbd8a84f3.jpg" alt="iphone-16-1.jpg" loading="lazy" class="description-image" draggable="true" style="height: 929.625px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/iphone_16_2_a2a42b298d.jpg" alt="iphone-16-2.jpg" loading="lazy" class="description-image" draggable="true" style="height: 951.125px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/iphone_16_3_d0e1eb87ef.jpg" alt="iphone-16-3.jpg" loading="lazy" class="description-image" draggable="true" style="height: 1048.19px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/iphone_16_5_6544aed046.jpg" alt="iphone-16-5.jpg" loading="lazy" class="description-image" draggable="true" style="height: 1190.67px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure><figure class="image" style="margin: 0px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px; overflow-x: auto !important;"><img src="https://cdn2.fptshop.com.vn/unsafe/iphone_16_6_5f9dfaf2d4.jpg" alt="iphone-16-6.jpg" loading="lazy" class="description-image" draggable="true" style="height: 1055.48px; border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; width: 804px;"></figure></div></div>',
  'thumbnail' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0055-V1',
  'price' => '18392000.00',
  'sale_price' => '17892000.00',
  'stock' => 21,
  'image' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 18,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0055-V2',
  'price' => '20792000.00',
  'sale_price' => '20292000.00',
  'stock' => 17,
  'image' => 'image/iphone16_white.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 2,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 17 Pro Max Like New 99%',
  'slug' => 'iphone-17-pro-max-like-new-99',
  'sku' => 'SP0056',
  'description' => '<img src="http://127.0.0.1:8000/image/products/description/1788368640-Qn82sZQbAoJm.jpg" alt="i_Phone_17_pro_relay_new_1_088e24a646.jpg" class="description-image" draggable="true" style="max-width: 100%; height: auto; display: block; margin: 15px 0px;"><p><br></p>',
  'thumbnail' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0056-V1',
  'price' => '27992000.00',
  'sale_price' => '27492000.00',
  'stock' => 23,
  'image' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0056-V2',
  'price' => '31992000.00',
  'sale_price' => '31492000.00',
  'stock' => 37,
  'image' => 'image/iphone17promax_titanium.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 11,
  1 => 19,
  2 => 24,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 1,
  'name' => 'iPad Gen 10 WiFi Like New 99%',
  'slug' => 'ipad-gen-10-wifi-like-new-99-57',
  'sku' => 'SP0057',
  'description' => 'iPad Gen 10 WiFi Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0057-V1',
  'price' => '7192000.00',
  'sale_price' => '6692000.00',
  'stock' => 40,
  'image' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0057-V2',
  'price' => '7192000.00',
  'sale_price' => '6692000.00',
  'stock' => 21,
  'image' => 'image/ipad10_pink_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0057-V3',
  'price' => '7192000.00',
  'sale_price' => '6692000.00',
  'stock' => 10,
  'image' => 'image/ipad10_silver_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0057-V4',
  'price' => '7192000.00',
  'sale_price' => '6692000.00',
  'stock' => 34,
  'image' => 'image/ipad10_yellow_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0057-V5',
  'price' => '10392000.00',
  'sale_price' => '9892000.00',
  'stock' => 32,
  'image' => 'image/ipad10_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0057-V6',
  'price' => '10392000.00',
  'sale_price' => '9892000.00',
  'stock' => 16,
  'image' => 'image/ipad10_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0057-V7',
  'price' => '10392000.00',
  'sale_price' => '9892000.00',
  'stock' => 28,
  'image' => 'image/ipad10_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0057-V8',
  'price' => '10392000.00',
  'sale_price' => '9892000.00',
  'stock' => 32,
  'image' => 'image/ipad10_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A35 Like New 99%',
  'slug' => 'samsung-galaxy-a35-like-new-99-58',
  'sku' => 'SP0058',
  'description' => 'Samsung Galaxy A35 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0058-V1',
  'price' => '5992000.00',
  'sale_price' => '5492000.00',
  'stock' => 15,
  'image' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 8,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A55 Like New 99%',
  'slug' => 'samsung-galaxy-a55-like-new-99-59',
  'sku' => 'SP0059',
  'description' => 'Samsung Galaxy A55 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0059-V1',
  'price' => '7992000.00',
  'sale_price' => '7492000.00',
  'stock' => 34,
  'image' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 14,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy M54 Like New 99%',
  'slug' => 'samsung-galaxy-m54-like-new-99-60',
  'sku' => 'SP0060',
  'description' => 'Samsung Galaxy M54 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0060-V1',
  'price' => '6632000.00',
  'sale_price' => '6132000.00',
  'stock' => 15,
  'image' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S23 FE Like New 99%',
  'slug' => 'samsung-galaxy-s23-fe-like-new-99-61',
  'sku' => 'SP0061',
  'description' => 'Samsung Galaxy S23 FE Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0061-V1',
  'price' => '8792000.00',
  'sale_price' => '8292000.00',
  'stock' => 34,
  'image' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 9,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Like New 99%',
  'slug' => 'samsung-galaxy-s24-like-new-99-62',
  'sku' => 'SP0062',
  'description' => 'Samsung Galaxy S24 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0062-V1',
  'price' => '15192000.00',
  'sale_price' => '14692000.00',
  'stock' => 17,
  'image' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Plus Like New 99%',
  'slug' => 'samsung-galaxy-s24-plus-like-new-99-63',
  'sku' => 'SP0063',
  'description' => 'Samsung Galaxy S24 Plus Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0063-V1',
  'price' => '18392000.00',
  'sale_price' => '17892000.00',
  'stock' => 23,
  'image' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Ultra Like New 99%',
  'slug' => 'samsung-galaxy-s24-ultra-like-new-99-64',
  'sku' => 'SP0064',
  'description' => 'Samsung Galaxy S24 Ultra Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0064-V1',
  'price' => '21592000.00',
  'sale_price' => '21092000.00',
  'stock' => 17,
  'image' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Flip5 Like New 99%',
  'slug' => 'samsung-galaxy-z-flip5-like-new-99-65',
  'sku' => 'SP0065',
  'description' => 'Samsung Galaxy Z Flip5 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0065-V1',
  'price' => '12792000.00',
  'sale_price' => '12292000.00',
  'stock' => 16,
  'image' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 15,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Fold5 Like New 99%',
  'slug' => 'samsung-galaxy-z-fold5-like-new-99-66',
  'sku' => 'SP0066',
  'description' => 'Samsung Galaxy Z Fold5 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0066-V1',
  'price' => '23992000.00',
  'sale_price' => '23492000.00',
  'stock' => 34,
  'image' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Tab S9 Like New 99%',
  'slug' => 'samsung-galaxy-tab-s9-like-new-99-67',
  'sku' => 'SP0067',
  'description' => 'Samsung Galaxy Tab S9 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0067-V1',
  'price' => '13592000.00',
  'sale_price' => '13092000.00',
  'stock' => 32,
  'image' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 10,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Tab S10 Like New 99%',
  'slug' => 'samsung-galaxy-tab-s10-like-new-99-68',
  'sku' => 'SP0068',
  'description' => 'Samsung Galaxy Tab S10 Like New 99% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0068-V1',
  'price' => '16792000.00',
  'sale_price' => '16292000.00',
  'stock' => 36,
  'image' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 13 Lướt 98%',
  'slug' => 'iphone-13-luot-98-69',
  'sku' => 'SP0069',
  'description' => 'iPhone 13 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0069-V1',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 21,
  'image' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0069-V2',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 28,
  'image' => 'image/iphone13_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0069-V3',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 34,
  'image' => 'image/iphone13_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 14 Lướt 98%',
  'slug' => 'iphone-14-luot-98-70',
  'sku' => 'SP0070',
  'description' => 'iPhone 14 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0070-V1',
  'price' => '16490000.00',
  'sale_price' => '15990000.00',
  'stock' => 17,
  'image' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0070-V2',
  'price' => '19490000.00',
  'sale_price' => '18990000.00',
  'stock' => 22,
  'image' => 'image/iphone14_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 15 Lướt 98%',
  'slug' => 'iphone-15-luot-98-71',
  'sku' => 'SP0071',
  'description' => 'iPhone 15 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0071-V1',
  'price' => '19990000.00',
  'sale_price' => '19490000.00',
  'stock' => 12,
  'image' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0071-V2',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 26,
  'image' => 'image/iphone15_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 16 Lướt 98%',
  'slug' => 'iphone-16-luot-98-72',
  'sku' => 'SP0072',
  'description' => 'iPhone 16 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0072-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 20,
  'image' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 18,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0072-V2',
  'price' => '25990000.00',
  'sale_price' => '25490000.00',
  'stock' => 32,
  'image' => 'image/iphone16_white.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 2,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 17 Pro Max Lướt 98%',
  'slug' => 'iphone-17-pro-max-luot-98-73',
  'sku' => 'SP0073',
  'description' => 'iPhone 17 Pro Max Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0073-V1',
  'price' => '34990000.00',
  'sale_price' => '34490000.00',
  'stock' => 21,
  'image' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0073-V2',
  'price' => '39990000.00',
  'sale_price' => '39490000.00',
  'stock' => 10,
  'image' => 'image/iphone17promax_titanium.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 11,
  1 => 19,
  2 => 24,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 1,
  'name' => 'iPad Gen 10 WiFi Lướt 98%',
  'slug' => 'ipad-gen-10-wifi-luot-98-74',
  'sku' => 'SP0074',
  'description' => 'iPad Gen 10 WiFi Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0074-V1',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 15,
  'image' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0074-V2',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 35,
  'image' => 'image/ipad10_pink_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0074-V3',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 27,
  'image' => 'image/ipad10_silver_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0074-V4',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 15,
  'image' => 'image/ipad10_yellow_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0074-V5',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 35,
  'image' => 'image/ipad10_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0074-V6',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 11,
  'image' => 'image/ipad10_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0074-V7',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 19,
  'image' => 'image/ipad10_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0074-V8',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 28,
  'image' => 'image/ipad10_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A35 Lướt 98%',
  'slug' => 'samsung-galaxy-a35-luot-98-75',
  'sku' => 'SP0075',
  'description' => 'Samsung Galaxy A35 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0075-V1',
  'price' => '7490000.00',
  'sale_price' => '6990000.00',
  'stock' => 30,
  'image' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 8,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A55 Lướt 98%',
  'slug' => 'samsung-galaxy-a55-luot-98-76',
  'sku' => 'SP0076',
  'description' => 'Samsung Galaxy A55 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0076-V1',
  'price' => '9990000.00',
  'sale_price' => '9490000.00',
  'stock' => 27,
  'image' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 14,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy M54 Lướt 98%',
  'slug' => 'samsung-galaxy-m54-luot-98-77',
  'sku' => 'SP0077',
  'description' => 'Samsung Galaxy M54 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0077-V1',
  'price' => '8290000.00',
  'sale_price' => '7790000.00',
  'stock' => 10,
  'image' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S23 FE Lướt 98%',
  'slug' => 'samsung-galaxy-s23-fe-luot-98-78',
  'sku' => 'SP0078',
  'description' => 'Samsung Galaxy S23 FE Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0078-V1',
  'price' => '10990000.00',
  'sale_price' => '10490000.00',
  'stock' => 20,
  'image' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 9,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Lướt 98%',
  'slug' => 'samsung-galaxy-s24-luot-98-79',
  'sku' => 'SP0079',
  'description' => 'Samsung Galaxy S24 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0079-V1',
  'price' => '18990000.00',
  'sale_price' => '18490000.00',
  'stock' => 25,
  'image' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Plus Lướt 98%',
  'slug' => 'samsung-galaxy-s24-plus-luot-98-80',
  'sku' => 'SP0080',
  'description' => 'Samsung Galaxy S24 Plus Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0080-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 14,
  'image' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Ultra Lướt 98%',
  'slug' => 'samsung-galaxy-s24-ultra-luot-98-81',
  'sku' => 'SP0081',
  'description' => 'Samsung Galaxy S24 Ultra Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0081-V1',
  'price' => '26990000.00',
  'sale_price' => '26490000.00',
  'stock' => 15,
  'image' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Flip5 Lướt 98%',
  'slug' => 'samsung-galaxy-z-flip5-luot-98-82',
  'sku' => 'SP0082',
  'description' => 'Samsung Galaxy Z Flip5 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0082-V1',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 18,
  'image' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 15,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Fold5 Lướt 98%',
  'slug' => 'samsung-galaxy-z-fold5-luot-98-83',
  'sku' => 'SP0083',
  'description' => 'Samsung Galaxy Z Fold5 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0083-V1',
  'price' => '29990000.00',
  'sale_price' => '29490000.00',
  'stock' => 33,
  'image' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Tab S9 Lướt 98%',
  'slug' => 'samsung-galaxy-tab-s9-luot-98-84',
  'sku' => 'SP0084',
  'description' => 'Samsung Galaxy Tab S9 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0084-V1',
  'price' => '16990000.00',
  'sale_price' => '16490000.00',
  'stock' => 28,
  'image' => 'image/samsung_tab_s9_beige.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 10,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Tab S10 Lướt 98%',
  'slug' => 'samsung-galaxy-tab-s10-luot-98-85',
  'sku' => 'SP0085',
  'description' => 'Samsung Galaxy Tab S10 Lướt 98% đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0085-V1',
  'price' => '20990000.00',
  'sale_price' => '20490000.00',
  'stock' => 28,
  'image' => 'image/6936a29f1020f_tabs10.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 13 Nguyên Seal',
  'slug' => 'iphone-13-nguyen-seal-86',
  'sku' => 'SP0086',
  'description' => 'iPhone 13 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0086-V1',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 14,
  'image' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0086-V2',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 36,
  'image' => 'image/iphone13_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0086-V3',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 18,
  'image' => 'image/iphone13_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 14 Nguyên Seal',
  'slug' => 'iphone-14-nguyen-seal-87',
  'sku' => 'SP0087',
  'description' => 'iPhone 14 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0087-V1',
  'price' => '16490000.00',
  'sale_price' => '15990000.00',
  'stock' => 32,
  'image' => 'image/iphone14_midnight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 12,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0087-V2',
  'price' => '19490000.00',
  'sale_price' => '18990000.00',
  'stock' => 38,
  'image' => 'image/iphone14_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 13,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 15 Nguyên Seal',
  'slug' => 'iphone-15-nguyen-seal-88',
  'sku' => 'SP0088',
  'description' => 'iPhone 15 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0088-V1',
  'price' => '19990000.00',
  'sale_price' => '19490000.00',
  'stock' => 20,
  'image' => 'image/iphone15_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 17,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0088-V2',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 26,
  'image' => 'image/iphone15_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 17,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 16 Nguyên Seal',
  'slug' => 'iphone-16-nguyen-seal-89',
  'sku' => 'SP0089',
  'description' => 'iPhone 16 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0089-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 40,
  'image' => 'image/iphone16_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 18,
  2 => 22,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0089-V2',
  'price' => '25990000.00',
  'sale_price' => '25490000.00',
  'stock' => 27,
  'image' => 'image/iphone16_white.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 2,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 17 Pro Max Nguyên Seal',
  'slug' => 'iphone-17-pro-max-nguyen-seal-90',
  'sku' => 'SP0090',
  'description' => 'iPhone 17 Pro Max Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0090-V1',
  'price' => '34990000.00',
  'sale_price' => '34490000.00',
  'stock' => 38,
  'image' => 'image/iphone17promax_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0090-V2',
  'price' => '39990000.00',
  'sale_price' => '39490000.00',
  'stock' => 32,
  'image' => 'image/iphone17promax_titanium.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 11,
  1 => 19,
  2 => 24,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 3,
  'brand_id' => 1,
  'name' => 'iPad Gen 10 WiFi Nguyên Seal',
  'slug' => 'ipad-gen-10-wifi-nguyen-seal-91',
  'sku' => 'SP0091',
  'description' => 'iPad Gen 10 WiFi Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0091-V1',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 36,
  'image' => 'image/ipad10_blue_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0091-V2',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 19,
  'image' => 'image/ipad10_pink_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0091-V3',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 16,
  'image' => 'image/ipad10_silver_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0091-V4',
  'price' => '8990000.00',
  'sale_price' => '8490000.00',
  'stock' => 38,
  'image' => 'image/ipad10_yellow_64.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 21,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0091-V5',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 29,
  'image' => 'image/ipad10_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0091-V6',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 37,
  'image' => 'image/ipad10_pink.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0091-V7',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 20,
  'image' => 'image/ipad10_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 16,
  2 => 23,
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0091-V8',
  'price' => '12990000.00',
  'sale_price' => '12490000.00',
  'stock' => 10,
  'image' => 'image/ipad10_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 16,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A35 Nguyên Seal',
  'slug' => 'samsung-galaxy-a35-nguyen-seal-92',
  'sku' => 'SP0092',
  'description' => 'Samsung Galaxy A35 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0092-V1',
  'price' => '7490000.00',
  'sale_price' => '6990000.00',
  'stock' => 20,
  'image' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 8,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A55 Nguyên Seal',
  'slug' => 'samsung-galaxy-a55-nguyen-seal-93',
  'sku' => 'SP0093',
  'description' => 'Samsung Galaxy A55 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0093-V1',
  'price' => '9990000.00',
  'sale_price' => '9490000.00',
  'stock' => 19,
  'image' => 'image/samsung_a55_navy.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 14,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy M54 Nguyên Seal',
  'slug' => 'samsung-galaxy-m54-nguyen-seal-94',
  'sku' => 'SP0094',
  'description' => 'Samsung Galaxy M54 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0094-V1',
  'price' => '8290000.00',
  'sale_price' => '7790000.00',
  'stock' => 27,
  'image' => 'image/samsung_m54_silver.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 6,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S23 FE Nguyên Seal',
  'slug' => 'samsung-galaxy-s23-fe-nguyen-seal-95',
  'sku' => 'SP0095',
  'description' => 'Samsung Galaxy S23 FE Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0095-V1',
  'price' => '10990000.00',
  'sale_price' => '10490000.00',
  'stock' => 38,
  'image' => 'image/samsung_s23_fe_cream.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 9,
  1 => 18,
  2 => 22,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Nguyên Seal',
  'slug' => 'samsung-galaxy-s24-nguyen-seal-96',
  'sku' => 'SP0096',
  'description' => 'Samsung Galaxy S24 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0096-V1',
  'price' => '18990000.00',
  'sale_price' => '18490000.00',
  'stock' => 14,
  'image' => 'image/samsung_s24_yellow.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 5,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Plus Nguyên Seal',
  'slug' => 'samsung-galaxy-s24-plus-nguyen-seal-97',
  'sku' => 'SP0097',
  'description' => 'Samsung Galaxy S24 Plus Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0097-V1',
  'price' => '22990000.00',
  'sale_price' => '22490000.00',
  'stock' => 22,
  'image' => 'image/samsung_s24_plus_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy S24 Ultra Nguyên Seal',
  'slug' => 'samsung-galaxy-s24-ultra-nguyen-seal-98',
  'sku' => 'SP0098',
  'description' => 'Samsung Galaxy S24 Ultra Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0098-V1',
  'price' => '26990000.00',
  'sale_price' => '26490000.00',
  'stock' => 24,
  'image' => 'image/samsung_s24_ultra_gray.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 7,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Flip5 Nguyên Seal',
  'slug' => 'samsung-galaxy-z-flip5-nguyen-seal-99',
  'sku' => 'SP0099',
  'description' => 'Samsung Galaxy Z Flip5 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0099-V1',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 25,
  'image' => 'image/samsung_zflip5_mint.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 15,
  1 => 18,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy Z Fold5 Nguyên Seal',
  'slug' => 'samsung-galaxy-z-fold5-nguyen-seal-100',
  'sku' => 'SP0100',
  'description' => 'Samsung Galaxy Z Fold5 Nguyên Seal đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0100-V1',
  'price' => '29990000.00',
  'sale_price' => '29490000.00',
  'stock' => 35,
  'image' => 'image/samsung_zfold5_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 3,
  1 => 19,
  2 => 23,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 1,
  'name' => 'iPhone 13 Chính Hãng VN/A',
  'slug' => 'iphone-13-chinh-hang-vna-sp0131',
  'sku' => 'SP0131',
  'description' => 'iPhone 13 Chính Hãng VN/A đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0131-V1',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 24,
  'image' => 'image/iphone13_black.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0131-V2',
  'price' => '13990000.00',
  'sale_price' => '13490000.00',
  'stock' => 28,
  'image' => 'image/iphone13_blue.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
),
                    ],
                    [
                        'data' => array (
  'sku' => 'SP0131-V3',
  'price' => '15990000.00',
  'sale_price' => '15490000.00',
  'stock' => 37,
  'image' => 'image/iphone13_starlight.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 2,
  'name' => 'Samsung Galaxy A35 LL/A Mỹ',
  'slug' => 'samsung-galaxy-a35-lla-my-sp0132',
  'sku' => 'SP0132',
  'description' => 'Samsung Galaxy A35 LL/A Mỹ đảm bảo chất lượng, nguyên zin, bảo hành 12 tháng tại Thanh Thảo Mobile.',
  'thumbnail' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'SP0132-V1',
  'price' => '7490000.00',
  'sale_price' => '6990000.00',
  'stock' => 19,
  'image' => 'image/samsung_a35_lilac.jpg',
  'status' => 1,
),
                        'attribute_value_ids' => array (
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 6,
  'brand_id' => 1,
  'name' => 'Ốp lưng MagSafe',
  'slug' => 'op-lung-magsafe',
  'sku' => 'OPLUNGMAGSAFE-TSKB',
  'description' => 'Ốp lưng trong suốt dành cho iPhone, thiết kế mỏng nhẹ, hỗ trợ sạc MagSafe, bảo vệ máy khỏi trầy xước và va đập nhẹ. Các nút bấm được thiết kế chính xác, không ảnh hưởng đến thao tác sử dụng.<div><img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/o/p/op-lung-iphone-16-pro-max-likgus-ai-glaze-with-magsafe_9_.png" alt="Ốp lưng iPhone 16 Pro Max Likgus AI Glaze With Magsafe - 2"></div>',
  'thumbnail' => 'image/products/1788459980-1wwjTuz6.webp',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'OPLUNGMAGSAFE-TSKB-DIBB',
  'price' => '199000.00',
  'sale_price' => '190000.00',
  'stock' => 100,
  'image' => 'image/variants/1788459980-itQbQU7P.webp',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 6,
  'brand_id' => 1,
  'name' => 'Cáp USB-C to USB-C 60W',
  'slug' => 'cap-usb-c-to-usb-c-60w',
  'sku' => 'CAPUSBCTOUSBC60W-JIAH',
  'description' => 'Cáp USB-C to USB-C hỗ trợ sạc nhanh công suất lên đến 60W, phù hợp với iPhone sử dụng cổng USB-C và nhiều thiết bị điện tử khác. Dây cáp chắc chắn, hỗ trợ truyền dữ liệu tốc độ cao.<div><img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRm0SGBUEqv8PoYSFx4LbUx__q-9vzaBsV_Tc-MXDoW4Yn0oR0jca-s4J3LmUCwIdnnOX2GrPxdjZfkwgrmpu8hCMNIUtq63e5BT1bmexWbBU3G0Sm6feWHLQ" alt="Hình ảnh sản phẩm 2/5"></div>',
  'thumbnail' => 'image/products/1788461735-l99fWZz1.webp',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'CAPUSBCTOUSBC60W-JIAH-0MA7',
  'price' => '249000.00',
  'sale_price' => '240000.00',
  'stock' => 100,
  'image' => 'image/variants/1788461735-dDiHJLXj.webp',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 4,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 6,
  'brand_id' => 1,
  'name' => 'Củ sạc nhanh USB-C 20W',
  'slug' => 'cu-sac-nhanh-usb-c-20w',
  'sku' => 'CUSACNHANHUSBC20W-TVOK',
  'description' => 'Củ sạc USB-C 20W nhỏ gọn, hỗ trợ công nghệ sạc nhanh, phù hợp sử dụng cho iPhone và các thiết bị có hỗ trợ USB-C. Thiết kế tiện lợi để mang theo khi đi học, đi làm hoặc du lịch.<div><img src="https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcQUpbOBf3mNe5DsFzCF3mMeSpQywF1vni5IXZC_4CctUqMF9oyEVh1hAU59vblTbr1lNIgX99Y_rcJJEVdFL9uCeKiVKwznIAOuEdIsflS_eNKwCUtEo2dT" alt="Hình ảnh sản phẩm 2/5"></div>',
  'thumbnail' => 'image/products/1788461781-2L06TT3Y.webp',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'CUSACNHANHUSBC20W-TVOK-IYYC',
  'price' => '399000.00',
  'sale_price' => '390000.00',
  'stock' => 100,
  'image' => 'image/variants/1788461781-qmXW1oL0.webp',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 2,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 6,
  'brand_id' => 1,
  'name' => 'Pin dự phòng MagSafe 10.000mAh',
  'slug' => 'pin-du-phong-magsafe-10000mah',
  'sku' => 'PINDUPHONGMAGSAFE10000MAH-LDFG',
  'description' => 'Pin dự phòng dung lượng 10.000mAh, thiết kế nhỏ gọn, hỗ trợ sạc không dây tương thích MagSafe. Phù hợp sử dụng khi đi học, đi làm hoặc đi du lịch.<div><img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcSkCUOB4pqi0cdlvJT8ixvx_ZQR8KFs-nZRQz5NSe3RLSB4wfNfUwTb3tWEqtC2vNzLO7tUSEmwQ1tqIOeAHsStepYdGJvOp3t3m4WfAk1VxXLlt2hWrAbo5cBnGGKww5e4kcQY8HBn_A&amp;usqp=CAc"></div>',
  'thumbnail' => 'image/products/1788461853-VH0xyagB.webp',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'PINDUPHONGMAGSAFE10000MAH-LDFG-OX8I',
  'price' => '699000.00',
  'sale_price' => '688000.00',
  'stock' => 100,
  'image' => 'image/variants/1788461853-mfnbRQhY.webp',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 2,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 6,
  'brand_id' => 2,
  'name' => 'Ốp lưng Samsung Galaxy S24 Ultra chống sốc',
  'slug' => 'op-lung-samsung-galaxy-s24-ultra-chong-soc',
  'sku' => 'OPLUNGSAMSUNGGALAXYS24ULTRACHONGSOC-NRWX',
  'description' => 'Ốp lưng dành cho Samsung Galaxy S24 Ultra, thiết kế chống sốc với các góc được gia cố, giúp bảo vệ điện thoại trước những va chạm và trầy xước trong quá trình sử dụng.<div><img src="https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcTJIjjdjBg9mOimaUD5cX87ThHEknDWQD9G5PCGT1GTD1SRaeDDSp7hDnrP9MjQ6DPaHMd0te9rjN4qkuuhXxp6deZUIZQajG3LI_RYpFqj4peEqk54ZVVBRA" alt="Hình ảnh sản phẩm 5/5"></div>',
  'thumbnail' => 'image/products/1788461908-yjrTfxuz.webp',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'OPLUNGSAMSUNGGALAXYS24ULTRACHONGSOC-NRWX-JCZW',
  'price' => '179000.00',
  'sale_price' => '170000.00',
  'stock' => 100,
  'image' => 'image/variants/1788461908-0kXWUsid.webp',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 6,
  'brand_id' => 2,
  'name' => 'Cáp USB-C to USB-C Samsung 45W',
  'slug' => 'cap-usb-c-to-usb-c-samsung-45w',
  'sku' => 'CAPUSBCTOUSBCSAMSUNG45W-NHMS',
  'description' => 'Cáp sạc USB-C to USB-C hỗ trợ công suất lên đến 45W, phù hợp với các thiết bị Samsung Galaxy hỗ trợ sạc nhanh. Dây cáp bền, đầu kết nối chắc chắn và hỗ trợ truyền dữ liệu.<div><img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcQbQ5k9CBEX2sLuqsskcoyhAUJqATmCPi9KrANrAbggfHkZX0veU1X12efhLhpYfkUF9YGDxH4itTCPNR4yjL7tkIpt4k1zbg4n6-5GiHVu4kYlkJ-yF5IVdxLMo625VWv8JF7X3YdNYmc&amp;usqp=CAc"></div>',
  'thumbnail' => 'image/products/1788461957-hmQVpSCO.webp',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'CAPUSBCTOUSBCSAMSUNG45W-NHMS-5RKT',
  'price' => '299000.00',
  'sale_price' => '290000.00',
  'stock' => 100,
  'image' => 'image/variants/1788461957-P4CaWrtn.webp',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 6,
  'brand_id' => 2,
  'name' => 'Củ sạc nhanh Samsung 45W',
  'slug' => 'cu-sac-nhanh-samsung-45w',
  'sku' => 'CUSACNHANHSAMSUNG45W-TBUP',
  'description' => 'Củ sạc nhanh USB-C công suất 45W, phù hợp với các dòng Samsung Galaxy hỗ trợ sạc nhanh. Thiết kế nhỏ gọn, dễ dàng mang theo và sử dụng tại nhà hoặc văn phòng.<div><img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRbt_7_fYTm2mvMMjwOYuZ9tcIXVAhNmPz0glUTcKPSnkap2nQpHwDzEeRpclUwj3einMU6DmGN1CxRQ_o7dzrkOyWgZdHKLEF7oBWYtWOwhG0S8fhGgH7w" alt="Hình ảnh sản phẩm 2/3"></div>',
  'thumbnail' => 'image/products/1788461998-ppxM8YFf.webp',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'CUSACNHANHSAMSUNG45W-TBUP-NLGI',
  'price' => '699000.00',
  'sale_price' => '690000.00',
  'stock' => 100,
  'image' => 'image/variants/1788461998-NdNehhZK.webp',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 6,
  'brand_id' => 2,
  'name' => 'Pin dự phòng Samsung 10.000mAh',
  'slug' => 'pin-du-phong-samsung-10000mah',
  'sku' => 'PINDUPHONGSAMSUNG10000MAH-LSCS',
  'description' => 'Pin dự phòng dung lượng 10.000mAh, thiết kế nhỏ gọn, hỗ trợ sạc nhanh qua cổng USB-C. Có thể sử dụng để sạc điện thoại Samsung và nhiều thiết bị điện tử khác.<div><img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcQh_uC_NRdZOA9PV3giFhHhXgqUUi3JZumYg6LO6q3NLCuhtbe0Dxw7cxo0bd_REDlaanurf87N7gwtdGN7VPG09DYu_DC5ik1YCSUfL3iyjfDaiRu5k2QPzLE" alt="Hình ảnh sản phẩm 2/5"></div>',
  'thumbnail' => 'image/products/1788462034-xBkZ7Srt.webp',
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'PINDUPHONGSAMSUNG10000MAH-LSCS-RXRR',
  'price' => '549000.00',
  'sale_price' => '500000.00',
  'stock' => 100,
  'image' => 'image/variants/1788462034-mlDbT72v.webp',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 2,
),
                    ],
                ],
            ],
            [
                'data' => array (
  'category_id' => 1,
  'brand_id' => 9,
  'name' => 'Asus',
  'slug' => 'asus',
  'sku' => 'ASUS-CAXJ',
  'description' => NULL,
  'thumbnail' => NULL,
  'status' => 1,
),
                'variants' => [
                    [
                        'data' => array (
  'sku' => 'ASUS-CAXJ-G9AA',
  'price' => '100000.00',
  'sale_price' => NULL,
  'stock' => 11111,
  'image' => 'image/variants/1788465480-nBzAKzwZ.png',
  'status' => 1,
),
                        'attribute_value_ids' => array (
  0 => 1,
  1 => 16,
  2 => 21,
),
                    ],
                ],
            ],
        ];

        foreach ($products as $productData) {
            $product = Product::updateOrCreate(
                ['slug' => $productData['data']['slug']],
                $productData['data']
            );

            $variantSkus = array_map(
                fn (array $variantData): string => $variantData['data']['sku'],
                $productData['variants']
            );

            if ($variantSkus) {
                ProductVariant::where('product_id', $product->id)
                    ->whereNotIn('sku', $variantSkus)
                    ->delete();
            } else {
                ProductVariant::where('product_id', $product->id)->delete();
            }

            foreach ($productData['variants'] as $variantData) {
                $variant = ProductVariant::updateOrCreate(
                    ['sku' => $variantData['data']['sku']],
                    array_merge($variantData['data'], ['product_id' => $product->id])
                );

                $variant->attributeValues()->sync($variantData['attribute_value_ids']);
            }
        }
    }
}