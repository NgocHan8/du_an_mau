<?php

class SanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham($limit = null)
    {
        $sql = 'SELECT sanpham.*, danhmuc.ten_danh_muc
        FROM sanpham
        INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id';
        if ($limit) {
            $sql .= ' LIMIT :limit';
        }
        $stmt = $this->conn->prepare($sql);
        // Nếu có limit, bind giá trị
        if ($limit) {
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getDetailSanPham($id)
    {
        $sql = 'SELECT sanpham.*, danhmuc.ten_danh_muc
        FROM sanpham
        INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id
        WHERE sanpham.id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
    public function getDanhMuc()
    {
        $sql = 'SELECT * FROM danhmuc';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getSanPhamByDanhMuc($idDanhMuc)
    {
        $query = "SELECT * FROM sanpham WHERE danh_muc_id = :danh_muc_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':danh_muc_id' => $idDanhMuc]);
        return $stmt->fetchAll();
    }

    public function getListSanPhamDanhMuc($danh_muc_id)
    {
        $sql = 'SELECT sanpham.*, danhmuc.ten_danh_muc
        FROM sanpham
        INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id
        WHERE sanpham.danh_muc_id = ' . $danh_muc_id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function searchSanPham($keyword)
    {
        // Chuyển keyword về chữ thường và tách thành các từ
        $keyword = mb_strtolower(trim($keyword), 'UTF-8');
        $searchWords = explode(' ', $keyword);
        // Tạo các điều kiện tìm kiếm cho từng từ
        $conditions = [];
        $params = [];

        foreach ($searchWords as $index => $word) {
            $paramName1 = ":keyword{$index}a";
            $paramName2 = ":keyword{$index}b";
            $word = "%$word%";
            $conditions[] = "(LOWER(sanpham.ten_san_pham) LIKE $paramName1 OR LOWER(sanpham.mo_ta) LIKE $paramName2)";
            $params[$paramName1] = $word;
            $params[$paramName2] = $word;
        }
        $whereClause = implode(' OR ', $conditions);
        $sql = "SELECT DISTINCT sanpham.*, danhmuc.ten_danh_muc
        FROM sanpham
        INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id
        WHERE $whereClause";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
    public function getDanhMucById($id)
    {
        $sql = 'SELECT * FROM danhmuc WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function getBinhLuanFromSanPham($id)
    {
        $sql = 'SELECT binh_luan.*, tai_khoan.ho_ten,tai_khoan.anh_dai_dien
        FROM binh_luan
        INNER JOIN tai_khoan ON binh_luan.tai_khoan_id = tai_khoan.id
        WHERE binh_luan.san_pham_id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll();
    }
    public function getLatestSanPham($limit)
    {
        $sql = "SELECT * FROM sanpham ORDER BY ngay_nhap DESC LIMIT :limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
