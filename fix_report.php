<?php
$source = __DIR__ . '/report-input.docx';
$output = __DIR__ . '/Bao-cao-tot-nghiep_AEPhoenic_da_sua_final-xac-minh.docx';
$temporary = $output . '.tmp';

$paragraphs = [
    '3.1. Tổng quan hệ thống',
    'Hệ thống thương mại điện tử được xây dựng nhằm hỗ trợ quy trình mua bán trực tuyến từ đầu đến cuối, bao gồm quản lý sản phẩm, giỏ hàng, đặt hàng, thanh toán, theo dõi đơn hàng, quản lý tài khoản khách hàng và xử lý dịch vụ hậu mãi. Hệ thống được triển khai theo mô hình web hiện đại, với giao diện người dùng thân thiện và phần quản trị tập trung vào việc quản lý dữ liệu và hoạt động kinh doanh.',
    'Hệ thống hiện tại hỗ trợ đầy đủ các chức năng cơ bản của một cửa hàng điện tử như: tìm kiếm sản phẩm, xem chi tiết, thêm vào giỏ hàng, áp dụng mã giảm giá, thanh toán, theo dõi trạng thái đơn hàng, quản lý thông tin cá nhân và xử lý yêu cầu trả hàng, bảo hành.',
    '',
    '3.2. Các chức năng chính của hệ thống',
    '',
    '3.2.1. Quản lý người dùng và tài khoản',
    'Hệ thống cho phép khách hàng đăng ký, đăng nhập, đăng xuất, cập nhật thông tin cá nhân và đổi mật khẩu. Người dùng còn có thể xem lịch sử đơn hàng và theo dõi trạng thái của từng đơn hàng. Quá trình xác thực email và khôi phục mật khẩu được hỗ trợ để tăng tính bảo mật và trải nghiệm sử dụng.',
    '',
    '3.2.2. Quản lý sản phẩm và danh mục',
    'Quản trị viên có thể quản lý danh mục sản phẩm, thuộc tính sản phẩm, biến thể và hình ảnh mô tả. Mỗi sản phẩm có thể có nhiều phiên bản khác nhau theo màu sắc, dung lượng, cấu hình và trạng thái tồn kho. Hệ thống hỗ trợ cập nhật thông tin sản phẩm, trạng thái hoạt động và dữ liệu liên quan đến cơ sở dữ liệu sản phẩm.',
    '',
    '3.2.3. Giỏ hàng, ưu đãi và thanh toán',
    'Khách hàng có thể thêm sản phẩm vào giỏ hàng, cập nhật số lượng, xóa sản phẩm và áp dụng voucher trong quá trình thanh toán. Hệ thống hỗ trợ thanh toán trực tiếp và thanh toán qua VNPay, đồng thời lưu trữ thông tin đơn hàng và giao dịch để quản lý việc thanh toán hiệu quả hơn.',
    '',
    '3.2.4. Đơn hàng và theo dõi trạng thái',
    'Sau khi đặt hàng, khách hàng có thể theo dõi trạng thái của đơn hàng theo từng giai đoạn: chờ xác nhận, đã xác nhận, đang vận chuyển, hoàn tất, hủy hoặc hoàn tiền. Hệ thống cung cấp giao diện xem chi tiết đơn hàng, lịch sử giao dịch và khả năng đánh giá sản phẩm sau khi nhận hàng.',
    '',
    '3.3. Dịch vụ hỗ trợ khách hàng',
    '',
    '3.3.1. Trả hàng và hoàn tiền',
    'Hệ thống hỗ trợ khách hàng gửi yêu cầu trả hàng đối với đơn hàng đã hoàn tất trong thời hạn hợp lệ. Yêu cầu chỉ được chấp nhận khi đơn hàng đáp ứng điều kiện theo quy định, như đã hoàn tất, còn trong thời gian cho phép trả hàng và không có yêu cầu tương tự đang xử lý. Quản trị viên sẽ xét duyệt và xác nhận phương án hoàn tiền hoặc xử lý tiếp theo.',
    '',
    '3.3.2. Bảo hành và sửa chữa',
    'Khách hàng có thể gửi yêu cầu bảo hành bằng cách nhập IMEI và mô tả lỗi sản phẩm. Hệ thống kiểm tra lịch sử mua hàng, trạng thái IMEI, thời hạn bảo hành và các yêu cầu đang xử lý trước khi tiếp nhận. Khi yêu cầu được duyệt, IMEI được chuyển sang trạng thái bảo hành và tiến độ xử lý có thể được cập nhật theo từng bước.',
    '',
    '3.4. Quản trị hệ thống',
    'Phần quản trị của hệ thống bao gồm quản lý danh mục, sản phẩm, biến thể, IMEI, đơn hàng, voucher, banner, phản hồi khách hàng và thống kê doanh thu. Quản trị viên có thể theo dõi hoạt động kinh doanh, kiểm tra tình trạng đơn hàng, xử lý yêu cầu bảo hành và hoàn trả, đồng thời duy trì dữ liệu và cấu trúc hệ thống theo hướng ổn định và dễ mở rộng.',
    '',
    '3.5. Cơ sở dữ liệu và kiến trúc dữ liệu',
    'Hệ thống hiện đang sử dụng mô hình dữ liệu cập nhật phù hợp với trạng thái triển khai thực tế. Các bảng dữ liệu chính bao gồm users, orders, products, categories, product_variants, product_imeis, return_requests, warranty_claims, inventory_transactions và các bảng hỗ trợ liên quan. Việc thay đổi tên bảng từ các cấu trúc legacy cũ như nguoidung, hoadon, posts, imeis nhằm mục đích đồng bộ với mô hình dữ liệu hiện tại, giảm độ phức tạp, nâng cao tính nhất quán và dễ bảo trì trong thời gian dài.',
    '',
    '3.6. Kết luận',
    'Hệ thống thương mại điện tử hiện tại đáp ứng được các yêu cầu cơ bản của một nền tảng bán hàng trực tuyến hiện đại, từ quản lý sản phẩm, đơn hàng, thanh toán, tài khoản khách hàng đến dịch vụ hậu mãi như trả hàng và bảo hành. Với cấu trúc chức năng rõ ràng, dữ liệu được tổ chức hợp lý và khả năng mở rộng tốt, hệ thống có tiềm năng phát triển mạnh mẽ trong tương lai.',
];

$escapeXml = static function (string $value): string {
    return strtr($value, [
        '&' => '&amp;',
        '<' => '&lt;',
        '>' => '&gt;',
        '"' => '&quot;',
        "'" => '&apos;',
    ]);
};

$documentXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<w:document xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main">
  <w:body>';

foreach ($paragraphs as $paragraphText) {
    if ($paragraphText === '') {
        $documentXml .= '<w:p/>';
        continue;
    }

    $documentXml .= '<w:p><w:r><w:t xml:space="preserve">' . $escapeXml($paragraphText) . '</w:t></w:r></w:p>';
}

$documentXml .= '<w:sectPr>
      <w:pgSz w:w="12240" w:h="15840"/>
      <w:pgMar w:top="1440" w:right="1440" w:bottom="1440" w:left="1440" w:header="720" w:footer="720" w:gutter="0"/>
    </w:sectPr>
  </w:body>
</w:document>';

$sourceZip = new ZipArchive();
if ($sourceZip->open($source) !== true) {
    throw new RuntimeException('Cannot open source');
}

$newZip = new ZipArchive();
if ($newZip->open($temporary, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
    throw new RuntimeException('Cannot create output');
}

for ($i = 0; $i < $sourceZip->numFiles; $i++) {
    $name = $sourceZip->getNameIndex($i);
    $content = $sourceZip->getFromName($name);
    if ($name === 'word/document.xml') {
        $newZip->addFromString($name, $documentXml);
    } else {
        $newZip->addFromString($name, $content);
    }
}

$sourceZip->close();
$newZip->close();

if (file_exists($output)) {
    unlink($output);
}

rename($temporary, $output);

echo "CREATED $output\n";
