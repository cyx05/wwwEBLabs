<?php
//TASK1a)
$string = "ahb acb aeb aeeb abcd axeb";
$reg = '/a..b/';
preg_match_all($reg,$string,$matches);
foreach($matches[0] as $word)
{
    echo $word, " ";
}

//TASK1b)
$string2 = 'a1b2c3';
function cube($match)
{
    return $match[0]**3;
}
$string2 = preg_replace_callback('/\d/', 'cube', $string2);
echo $string2;
?>

<?php
//TASK2a)
if (!empty($_REQUEST['textar'])) {
    $text = $_REQUEST['textar'];
    $arr = array();
    $arr = str_word_count($text,  $format = 1);

    echo 'кол-во знаков ', strlen($text), ' кол-во слов ', count($arr);
}
?>

<form action="" method="GET">

    <label for = "textar">Textarea</label>
    <textarea rows = "3" name = "textar"></textarea>
    <input type = "submit" value = "Save">

</form>

<?php
// 2b),2c)
session_start();
if (isset($_POST['submit'])) {
    $_SESSION['data'] = [
        'name' => $_POST['name'],
        'age' => $_POST['age'],
        'salary' => $_POST['salary'],
        'fav song' => $_POST['fav song']
    ];
}
?>
    <form method="post">
        <p>Введите имя: <input type="text" name="name"></p>
        <p>Введите возраст: <input type="number" name="age"></p>
        <p>Введите зарплату: <input type="number" name="salary"></p>
        <p>Введите любимый трек: <input type="text" name="fav song"></p>
        <p><input type="submit" name="submit" value="Отправить"></p>
    </form>
<?php
session_start();
echo "<ul>";
foreach ($_SESSION['data'] as $key => $value) {
    echo "<li>$key: $value</li>";
}
echo "</ul>";
?>


<?php
//3a)
$categories = ['clothes', 'shoes', 'bags', 'glasses', 'hats'];
foreach ($categories as $category) {
    if (!is_dir($category)) {
        mkdir($category);
    }
}
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $category = $_POST['category'];
    $title = $_POST['title'];
    $text = $_POST['text'];
    $filename = $category . '/' . $title . '.txt';
    file_put_contents($filename, $text);
}
?>
<form method="post">
    <p>Введите email: <input type="email" name="email" required></p>
    <p>Выберите категорию: <select name="category" required>
            <?php
            foreach ($categories as $category) {
                echo "<option value='$category'>$category</option>";
            }
            ?>
        </select></p>
    <p>Введите заголовок объявления: <input type="text" name="title" required></p>
    <p>Введите текст объявления: <textarea name="text" required></textarea></p>
    <p><input type="submit" name="submit" value="Добавить"></p>
</form>
<?php
//таблица
echo "<table border='1'>";
echo "<tr><th>Email</th><th>Категория</th><th>Заголовок</th><th>Текст</th></tr>";
// Перебираем все папки категорий
foreach ($categories as $category) {
    // Перебираем все файлы в папке
    foreach (glob($category . '/*.txt') as $file) {
        $title = basename($file, '.txt');
        $text = file_get_contents($file);
        echo "<tr><td>$email</td><td>$category</td><td>$title</td><td>$text</td></tr>";
    }
}
echo "</table>";
?>







