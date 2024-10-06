<?php
// الحصول على نوع النموذج
$formType = $_GET['form'];

// الحصول على البيانات المدخلة
$data = json_decode(file_get_contents('php://input'), true);

// التحقق من البيانات
if ($data) {
    // إعداد البيانات للتخزين
    $dataLine = implode(',', $data) . "\n"; // تحويل البيانات إلى سطر CSV

    // تحديد اسم الملف بناءً على نوع النموذج
    $fileName = $formType . '.txt';

    // حفظ البيانات في الملف
    file_put_contents($fileName, $dataLine, FILE_APPEND | LOCK_EX);

    // استجابة JSON
    echo json_encode(['status' => 'success', 'message' => 'Data saved successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
}
?>
