<?php

// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}
 function uploadFile($file,$folderUpload)
 {
    $pathStorage = $folderUpload.time().$file['name'];
    $from = $file['tmp_name'];
    $to = PATH_ROOT. $pathStorage;

    if(move_uploaded_file($from,$to))
    {
        return $pathStorage;
    }
    return null;
    
 }
 function deleteFile($file)
 {
    $pathStorage = PATH_ROOT .$file;
    if(file_exists($pathStorage))
    {
        unlink($pathStorage);
    }
 }
 function deleteSessionError()
 {
    if(isset($_SESSION['flash']))
    {
        unset($_SESSION['flash']);
        session_unset();
    }
    
 }
 function uploadFileAlbum($file,$folderUpload,$key)
 {
    $pathStorage = $folderUpload.time().$file['name'][$key];
    $from = $file['tmp_name'][$key];
    $to = PATH_ROOT.$pathStorage;
    if(move_uploaded_file($from,$to))
    {
        return $pathStorage;
    }
    return null;
 }
 function formatProductDescription($description) {
    // Tạo một mảng các đoạn thông tin quan trọng cần tách
    $keyPhrases = [
        'Thông tin sản phẩm',
        'Chất liệu:',
        'Thiết kế',
        'Hướng dẫn bảo quản',
        'Lưu ý khi sử dụng:',
        'Tránh va đập',
        'Chế độ bảo hành',
        'Tặng kèm hộp',
        'Bảo hành trọn đời'
    ];
    
    // Thay thế những từ khóa này bằng version xuống dòng
    foreach ($keyPhrases as $phrase) {
        $description = str_replace($phrase, '<br><strong>' . $phrase . '</strong>', $description);
    }
    
    return $description;
}