<?php

namespace App\Helpers;

class HtmlHelper
{
    /**
     * Sanitize HTML description - loại bỏ tags nguy hiểm
     * Cho phép: b, i, br, img, p, ul, li, a
     */
    public static function sanitizeDescription($html)
    {
        if (!$html) {
            return '';
        }

        // Loại bỏ script tags và nội dung bên trong
        $html = preg_replace('#<script[^>]*>.*?</script>#is', '', $html);
        
        // Loại bỏ style tags
        $html = preg_replace('#<style[^>]*>.*?</style>#is', '', $html);
        
        // Loại bỏ event handlers (onclick, onerror, etc)
        $html = preg_replace('#\s*on\w+\s*=\s*["\']?[^"\'>\s]*["\']?#i', '', $html);
        
        // Loại bỏ javascript: protocol
        $html = preg_replace('#\s*javascript\s*:#i', '', $html);
        
        // Loại bỏ data: protocol
        $html = preg_replace('#\s*data\s*:#i', '', $html);
        
        // Cho phép các tags an toàn
        $allowed_tags = '<b><i><br><img><p><ul><li><a><em><strong><span>';
        $html = strip_tags($html, $allowed_tags);
        
        // Xử lý img tags để thêm style an toàn
        $html = preg_replace_callback(
            '#<img\s+src\s*=\s*["\']?([^"\'>\s]+)["\']?([^>]*)>#i',
            function($matches) {
                $src = $matches[1];
                // Kiểm tra src không chứa javascript
                if (stripos($src, 'javascript:') !== false || stripos($src, 'data:') !== false) {
                    return '';
                }
                return '<img src="' . htmlspecialchars($src, ENT_QUOTES, 'UTF-8') . '" style="max-width: 100%; height: auto; margin: 10px 0;" alt="Product Image">';
            },
            $html
        );
        
        // Xử lý a tags để thêm target="_blank"
        $html = preg_replace_callback(
            '#<a\s+href\s*=\s*["\']?([^"\'>\s]+)["\']?([^>]*)>#i',
            function($matches) {
                $href = $matches[1];
                // Kiểm tra href không chứa javascript
                if (stripos($href, 'javascript:') !== false || stripos($href, 'data:') !== false) {
                    return '';
                }
                return '<a href="' . htmlspecialchars($href, ENT_QUOTES, 'UTF-8') . '" target="_blank">';
            },
            $html
        );
        
        return $html;
    }
}
