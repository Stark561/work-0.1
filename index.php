<?php
// В файле site.com/landers/land1/index.php
$base_path = __DIR__;  // Получает путь к текущей директории (land1)

// Разделяем путь на части
$path_parts = explode('/', $base_path);

// Находим индекс 'landers' в массиве частей пути
$landers_index = array_search('landers', $path_parts);

// Извлекаем все элементы массива после 'landers'
$required_path_parts = array_slice($path_parts, $landers_index + 1);

// Объединяем части пути обратно в строку
$required_path = implode('/', $required_path_parts);

// Вывод для проверки
#echo $required_path; // Выведет 'land1' или другую соответствующую часть пути
$_SESSION['required_path'] = $required_path;

// Подключаем index_core.php
include '../index_core.php';
?>
