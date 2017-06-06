<?php
/*
Задача 1 БД “поставщики” (продолжение)
Дописать сохранение товаров (название, описание, путь к фото, цена, дата добавления). Фото загружать через форму. Проверять размер фото (в пикселях). Плюс сделать на фото наложение заданного логотипа (обработать сам файл картинки).
*/


if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['company']) && !empty(($_FILES['up']))) {

// Функция getimagesize() определяет размер изображения GIF, JPG, PNG, SWF, PSD, TIFF или BMP и 
// возвращает размеры, тип файла и высоту/ширину текстовой строки, используемой внутри нормального 
// HTML-тэга IMG. array getimagesize (string filename [, array imageinfo])

    $size = getimagesize($_FILES['up']['tmp_name']);
    if (($size[2] < 4) && ($size[0] <= 1000) && ($size[1] <= 1000)) {
        $dir = 'img/';
        $name = $_FILES['up']['name'];
        $created = date('d_m_y_H_i_s');
        $dir = $dir . '_' . $created;
        move_uploaded_file($_FILES['up']['tmp_name'], $dir . $_FILES['up']['name']);
        $img_path = $dir . $_FILES['up']['name'];
        $stamp=imagecreatefrompng('auto.png');
        $img=imagecreatefromjpeg($img_path);
        $mar_r=10;
        $mar_b=10;
        $sx=imagesx($stamp);
        $sy=imagesy($stamp);
        imagecopy($img,$stamp,10, 10,0, 0, imagesx($stamp), imagesy($stamp));
        imagegif($img, $img_path);
        $supplier3_id=$_POST['company'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $created = date('d.m.y H:i:s');
        include('connection.php');
        $stmt = mysqli_prepare($mysqli, "INSERT INTO `ITEMS` (supplier3_id, title, description, img_path, price, created) VALUES (?, ?, ?, ?, ?, ?)");
        var_dump($stmt);
        mysqli_stmt_bind_param($stmt, 'isssss', $supplier3_id, $title, $description, $img_path, $price, $created);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($mysqli);
        $true = 'Запись добавлена';
        echo json_encode($true);
    } else {
        $error = 'Изображение не коректное Мах высота и ширины 1000';
        echo json_encode($error);
    }
} else {
    $error = ['success' => false, ['errors' => 'is empty']];
    echo json_encode($error);
}

?>
