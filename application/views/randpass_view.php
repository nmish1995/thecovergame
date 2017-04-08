<form method="GET">
    Выберите вид пароля:<br>
    <!--Бутстраповское радио(v4)-->
    <label class="custom-control custom-radio">
        <input id="easy" name="difficulty" type="radio" class="custom-control-input" checked>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description">Легкий</span>
    </label>
    <label class="custom-control custom-radio">
        <input id="medium" name="difficulty" type="radio" class="custom-control-input">
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description">Средний</span>
    </label>
    <label class="custom-control custom-radio">
        <input id="hard" name="difficulty" type="radio" class="custom-control-input">
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description">Сложный</span>
    </label>
    <br><br>
    Введите максимальное количество символов:<br><br>
    <div class="form-group row">
        <label for="example-number-input" class="col-2 col-form-label">
            <input type="number" value="10" id="max" maxlength="7" required="required">
        </label>
    </div><br>
    <input type="submit" name="generate" value="Генерировать">
</form>
<?php
//Отключаем вывод ошибок
function err_handler($errno, $errmsg, $filename, $linenum)
{
    if (!in_array($errno, Array(E_NOTICE, E_STRICT, E_WARNING)))
    {
        $date = date('Y-m-d H:i:s (T)');
        $f = fopen('errors.log', 'a');
        if (!empty($f)) { $err = "\r\n";
            $err .= " $date\r\n";
            $err .= " $errno\r\n";
            $err .= " $errmsg\r\n";
            $err .= " $filename\r\n";
            $err .= " $linenum\r\n";
            $err .= "\r\n";
            fwrite($f, $err);
            fclose($f);
        }
    }
}
set_error_handler('err_handler');
$max=$_GET['max'];
$easy=$_GET['easy'];
$medium=$_GET['medium'];
$hard=$_GET['hard'];
//Проверяем, какое радио было нажато и создаем переменную $chars
if($easy!=null){
    $chars="qwertyuiopasdfghjklzxcvbnm";
}
if($medium!=null){
    $chars="1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
}
if($hard!=null){
    $chars="1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM,./><?;:'][}{=-+_)(*&^%$#@!`~";
}
$size=count($chars)-1;
$password=null;
//генерируем сам пароль
while($max--){
    $password = $chars[rand(0, $size)];
}
//и выводим его на экран
if($password!=null){
    echo "<script>
new Clipboard('.btn-clipboard');
// Не забываем инициализировать библиотеку на нашей кнопке
</script>
<div class='alert alert-success' role='alert'>
<span class='glyphicon glyphicon-random' aria-hidden='true'>
</span>Ваш пароль успешно сгенирирован! 
<br><br><i><b id='password-copy'>" . $password . "</b></i><br><br>
<form method='get'>
<input type='submit' value='Генерировать повторно'>
<button class='btn-clipboard' data-clipboard-target='#password-copy'>Скопировать в буфер обмена</button>
</form>
</div>";
}
?>