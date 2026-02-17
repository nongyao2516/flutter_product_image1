<?php
header('Content-Type: application/json');

$targetDir = "../images/";   // 👉 โฟลเดอร์ images

if (!empty($_FILES['image']['name'])) {

    // ✅ ตั้งชื่อไฟล์ใหม่กันซ้ำ
    $fileName = time() . "_" . basename($_FILES['image']['name']);
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {

        echo json_encode([
            "success" => true,
            "file" => $fileName   // 👉 ส่งชื่อไฟล์กลับ Flutter
        ]);

    } else {
        echo json_encode(["success" => false]);
    }
}
