<?php
include_once("pdo.php");

class ProductImageModel
{
    /**
     * Lấy tất cả ảnh của một sản phẩm
     */
    public function getByProductId($productId)
    {
        $sql = "SELECT * FROM product_images WHERE product_id = ? ORDER BY sort_order ASC, id ASC";
        return pdo_query($sql, $productId);
    }

    /**
     * Lấy ảnh theo ID
     */
    public function getOne($id)
    {
        $sql = "SELECT * FROM product_images WHERE id = ?";
        $result = pdo_query_one($sql, $id);
        // Chuyển đổi image_url thành img để phù hợp với form
        if ($result) {
            $result['img'] = $result['image_url'];
        }
        return $result;
    }

    /**
     * Thêm ảnh mới
     */
    public function insert($productId, $imagePath, $sortOrder = 0)
    {
        $sql = "INSERT INTO product_images (product_id, image_url, sort_order) VALUES (?, ?, ?)";
        return pdo_execute_return_id($sql, $productId, $imagePath, $sortOrder);
    }

    /**
     * Cập nhật ảnh
     */
    public function update($id, $productId, $imagePath, $sortOrder = 0)
    {
        $sql = "UPDATE product_images SET product_id = ?, image_url = ?, sort_order = ? WHERE id = ?";
        pdo_execute($sql, $productId, $imagePath, $sortOrder, $id);
    }

    /**
     * Xóa ảnh
     */
    public function delete($id)
    {
        $sql = "DELETE FROM product_images WHERE id = ?";
        pdo_execute($sql, $id);
    }

    /**
     * Cập nhật thứ tự ảnh
     */
    public function updateSortOrder($id, $sortOrder)
    {
        $sql = "UPDATE product_images SET sort_order = ? WHERE id = ?";
        pdo_execute($sql, $sortOrder, $id);
    }

    /**
     * Xóa tất cả ảnh của sản phẩm
     */
    public function deleteByProductId($productId)
    {
        $sql = "DELETE FROM product_images WHERE product_id = ?";
        pdo_execute($sql, $productId);
    }

    /**
     * Đếm số ảnh của sản phẩm
     */
    public function countByProductId($productId)
    {
        $sql = "SELECT COUNT(*) as total FROM product_images WHERE product_id = ?";
        $result = pdo_query_one($sql, $productId);
        return $result['total'];
    }
}
