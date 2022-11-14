<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="task">
        <h2>1. Дана строка 'london is the capital of great britain'. Сделайте из нее строку 'London Is The Capital Of Great Britain'.</h2> 
        
        <?php         
        header('Content-type: text/html; charset=utf8_unicode_ci');   
        function upWords($str)
        {
            echo "<p>Заданная строка: '{$str}'</p>";

            return ucwords($str); //ucwords переводит первые буквы слова в верхний регистр
        }  
        echo "<p>" . upWords('London Is The Capital Of Great Britain') . "</p>";   
        ?>
    </div>
    <div class="task">
        <h2>2. Дана строка 'html &#60;b&#62;css&#60;/b&#62; php'. Удалите теги из этой строки. С помощью функции explode запишите каждое слово этой строки в отдельный элемент массива.</h2>

        <?php
        function deleteEl($str)
        {
            echo "<p>Заданная строка: {$str}</p>";
            $str = strip_tags($str); //strip_tags удаляет теги из строки
            echo "<p>Строка без тегов: {$str}</p>";
            echo "<p>";
            return explode(' ', $str);
        }  
        print_r(deleteEl("html <b>css</b> php"));
        echo "</p>";
        ?>
    </div>
    <div class="task">
        <h2>
            3. Дана строка. Перемешайте символы этой строки в случайном порядке.
        </h2>

        <?php
        function mixStr($str)
        {
            echo "<p>Заданная строка: {$str}</p>";

            return "<p>" . str_shuffle($str) . "</p>"; //str_shuffle переставляет символы в строке случайным образом
        }  
        echo mixStr('Lorem Ipsum is simply dummy text of the printing and typesetting industry.'); 
        ?>
    </div>
    <div class="task">
        <h2>
            4. Найдите количество дней в текущем месяце. Скрипт должен работать независимо от месяца, в котором он запущен.
        </h2>
        <form method="GET" class="secForm">
            <label>
                Введите месяц и год:
                <input type="number" name="month" placeholder="Введите месяц" required>
                <input type="number" name="year" placeholder="Введите год" required>
            </label>
            <button type="submit" name="butDay">Определить кол-во дней в месяце</button>
        </form>
        
        <?php
        function dayInMonth($month, $year)
        {
            
            if ($_GET['month'] == '' && $_GET['year'] == '') {
                echo "<p>Вы ничего не ввели</p>";
            } else{
                $number = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                if ($number == 31) {
                    $numberText = $number . " день.";
                } else{
                    $numberText = $number . " дней.";
                }

                switch ($month) {
                    case 1:
                        $month = 'январе';
                        break;
                    case 2:
                        $month = 'феврале';
                        break;
                    case 3:
                        $month = 'марте';
                        break;
                    case 4:
                        $month = 'апреле';
                        break;
                    case 5:
                        $month = 'мае';
                        break;
                    case 6:
                        $month = 'июне';
                        break;
                    case 7:
                        $month = 'июле';
                        break;
                    case 8:
                        $month = 'августе';
                        break;
                    case 9:
                        $month = 'сентябре';
                        break;
                    case 10:
                        $month = 'октябре';
                        break;
                    case 11:
                        $month = 'ноябре';
                        break;
                    case 12:
                        $month = 'декабре';
                        break;
                }

                return "<p>В {$month} {$year} года {$numberText}";
            }            
        }  
        echo dayInMonth($_GET['month'], $_GET['year']);
        ?>
    </div>
    <div class="task">
        <h2>
            5. Выведите текущую дату-время в форматах '2025-12-31', '31.12.2025', '31.12.13', '12:59:59', timestamp. 
        </h2>
        
        <?php
        function dateFormat($dateNow)
        {
            echo "<p>";

            return $dateNow;
        }  
        echo dateFormat(date("Y-m-d")) . "</p>"; 
        echo dateFormat(date("d.m.Y")) . "</p>"; 
        echo dateFormat(date("d.m.y")) . "</p>"; 
        echo dateFormat(date("H:i:s")) . "</p>"; 
        echo dateFormat(time()) . "</p>"; 
        ?>
    </div>
    <div class="task">
        <h2>
            6. В переменной $date лежит дата в формате '2025-12-31'. Прибавьте к этой дате 2 дня, 1 месяц и 3 дня, 1 год. Отнимите от этой даты 3 дня.
        </h2>
        
        <?php
            $date = date_create('2025-12-31');
            echo "<p>Заданная дата: " . date_format($date, 'd.m.Y') . "</p>";
            $date1 = date_modify($date, '2 day');
            echo "<p>Дата + 2 дня: " . date_format($date1, 'd.m.Y') . "</p>";
            $date = date_create('2025-12-31');
            $date2 = date_modify($date, '3 day 1 month');
            echo "<p>Дата + 3 дня и 1 месяц: " . date_format($date2, 'd.m.Y') . "</p>";
            $date = date_create('2025-12-31');
            $date3 = date_modify($date, '1 year');
            echo "<p>Дата + 1 год: " . date_format($date3, 'd.m.Y') . "</p>";
            $date = date_create('2025-12-31');
            $date4 = date_modify($date, '-3 day');
            echo "<p>Дата - 3 дня: " . date_format($date4, 'd.m.Y') . "</p>";
        ?>
    </div>
    <div class="task">
        <h2>
            7. Дана строка с буквами и цифрами, например, '1a2b3c4b5d6e7f8g9h0'. Удалите из нее все цифры. То есть в нашем случае должна получится строка 'abcbdefgh'.
        </h2>        
        
        <?php  
        function delNum($str)
        {
            echo "<p>Заданная строка: {$str}</p>";
            $strWithoutNum = preg_replace('/\d/','',$str); //preg_replace выполняет поиск и замену по регулярному выражению
                                                           //preg_replace('что', 'на что','откуда')

            return "<p>Строка без чисел: " . $strWithoutNum . "</p>";
        }  
        echo delNum('1a2b3c4b5d6e7f8g9h0'); 
        ?>
    </div>
    <div class="task">
        <h2>
            8. Даны числа 4, -2, 5, 19, -130, 0, 10. Найдите минимальное и максимальное число.
        </h2>
        
        <?php
        function minNum($numStr) 
        {
            echo "<p>Заданные числа: {$numStr}</p>";
            $arrNum = explode(', ', $numStr);
            $minEasy = min($arrNum);
            $maxEasy = max($arrNum);
            echo "<p>Минимальное число через ф-цию min() = {$minEasy}</p>" . "<p>Максимально число через ф-цию max() = {$maxEasy}</p>";

            $min = 0;
            $max = 0;
            for ($i = 0; $i < count($arrNum); $i++) { 
                if ($arrNum[$i] > $max) {
                    $max = $arrNum[$i];
                }
                if ($arrNum[$i] < $min) {
                    $min = $arrNum[$i];
                }
            }            

            return "<p>Минимальное число = {$min}</p>" . "<p>Максимальное число = {$max}</p>";
        }
        echo minNum('4, -2, 5, 19, -130, 0, 10') . "</p>";
        ?>
    </div>
    <div class="task">
        <h2>
            9. Выведите на экран случайное число от 1 до 100.
        </h2>
        
        <?php
        function randNumbers($min, $max)
        {
            $randNums = rand($min, $max);

            return "<p>Слычайное число от 1 до 100 = " . $randNums . "</p>";
        }          
        echo randNumbers(1, 100);
        ?>
    </div>
    <div class="task">
        <h2>
        10. Создайте ассоциативный массив дней недели. Ключами в нем должны служить номера дней от начала недели (понедельник - должен иметь ключ 1, вторник - 2 и т.д.). Выведите на экран текущий день недели.
        </h2>        
        <?php            
        function dayArr($n)
        {                
            $dayArr = [
                1 => 'Понедельник',
                2 => 'Вторник',
                3 => 'Среда',
                4 => 'Четверг',
                5 => 'Пятница',
                6 => 'Суббота',
                7 => 'Воскресенье'
            ];
            echo "<p>";
            
            if ($n == 0) {
                $n = 7;
            }

            return $dayArr[$n];
        }
        echo "Сегодня " . dayArr(date('w')) . "</p>";
        
        ?>
    </div>    
    <div class="task">
        <h2>
        11. Дан двухмерный массив с числами, например [[1, 2, 3], [4, 5], [6]]. Найдите сумму элементов этого массива. Массив, конечно же, может быть произвольным.
        </h2>        
        <?php    
        //считает только двумерный массив        
        function countNum($arr) {  
            $sum = 0;
            for ($i = 0; $i < count($arr); $i++){
                echo "<p>Сумма элементов " . ($i+1) . "-го массива равна " . array_sum($arr[$i]) . "</p>";
                $sum+=array_sum($arr[$i]);
            }
            return $sum;
        }
        echo "<p>Сума всех элементов двумерного массива равна " . countNum([[1, 2, 3], [4, 5], [6]]) . "</p>";

        function countArr($arr)
        {
            $sum = 0;
            foreach ($arr as $v) {
                if (is_array($v)) {
                    $sum += countArr($v);
                } else{
                    $sum += $v;
                }
            }

            return $sum;
        }
        echo "<br>";
        echo "<p>Сумма элементов многомерного массива = " . countArr([1,2,3,[1,2,[3,[4,5,6]]]]) . "</p>";
        ?>
    </div>    
    <div class="task">
        <h2>
        12. Есть массив $array = array(1,1,1,2,2,2,2,3), необходимо вывести 1,2,3, то есть вывести без дублей при помощи лишь одного цикла и без использования функций PHP.
        </h2> 
        
        <?php            
        function removeDuplicates($arr)
        {
            $withoutDuplicates = [];
            foreach ($arr as $v) {
                if (!in_array($v, $withoutDuplicates)) {
                    $withoutDuplicates[] = $v;
                }
            }
            echo "<p>Массив без дубликатов: ";

            return $withoutDuplicates;
        }
        print_r(removeDuplicates([1,1,1,2,2,2,2,3]));
        echo "</p>";
        ?>
    </div>    
    <div class="task">
        <h2>
        13. Используя ассоциативный массив, добавить на страницу навигационное меню. Заполните массив соблюдая сл. условия: название индексов являются именем файла (без расширения), на который ссылается меню; значения массива явл. названиями пунктов меню.
        </h2> 

        <?php            
        function navMenu($arr)
        {
            echo "<ul>";

            foreach ($arr as $key => $value) {
                echo "<li><a href=\"{$key}.php\">{$value}</a></li>";
            }

            echo "</ul>";
        }
        navMenu([
            'index' => 'Home',
            'about' => 'About',
            'services' => 'Services',
            'catalog' => 'Catalog',
            'contacts' => 'Contacts'
        ]);
        ?>
    </div>    
    <div class="task">
        <h2>
        14. Вывести на черном фоне n красных квадратов случайного размера в случайной позиции в браузере.

        </h2>        
        <?php                   
        function randSquare($n) {
            echo "<div style=\"background:#000;position:relative;height:700px;width:100%\">";

            for ($i = 0; $i < $n; $i++) { 
                $leftPos = rand(0, 93);
                $topPos = rand(0, 85);
                $widthSquare = rand(10, 100);

                echo "<div style=\"position:absolute;width:{$widthSquare}px;height:{$widthSquare}px;left:{$leftPos}%;top:{$topPos}%;background:#ff0000;\"></div>";
            }

            echo "</div>";
        }
        randSquare(rand(1, 20));
        ?>
    </div>    
    <div class="task">
        <h2>
        15. Дана строка с любыми символами. Для примера пусть будет '1234567890'. Нужно разбить эту строку в массив таким образом: array('1', '23', '456', '7890') и так далее пока символы в строке не закончатся.
        </h2>        
        <?php            
        function pyramidNum($str)
        {
            $arr = [];
            for ($i = 1; $i <= strlen($str); $i++) { 
                $arr[] = substr($str, 0, $i);
                $str = substr_replace($str, '', 0, $i);
            }
            echo('<pre><p>');
            return $arr;
            
        }
        print_r(pyramidNum('123456789012345678901234567890123456'));
        echo('</p></pre>');
        ?>
    </div>    
    <div class="task">
        <h2>
        16. Найдите сумму элементов массива между двумя нулями (первым и последним нулями в массиве). Если двух нулей нет в массиве, то выведите ноль. В массиве может быть более 2х нулей. Пример массива: [48,9,0,4,21,2,1,0,8,84,76,8,4,13,2] или [1,8,0,13,76,8,7,0,22,0,2,3,2]
        </h2>
        
        <?php  
        function sumBetweenZeros($arr)
        {
            $startNull = 0;
            $endNull = 0;
            for ($i = 0; $i < count($arr); $i++) { 
                if ($arr[$i] == 0) {
                    $startNull = $i;
                    break;
                } else{
                    $result = 0;
                }
            }

            for ($i = count($arr) - 1; $i > 0; $i--) { 
                if ($arr[$i] == 0) {
                    $endNull = $i;
                    break;
                } else{
                    $result = 0;
                }
            }

            if ($startNull == $endNull) {
                $result = 0;
            } else{
                for ($j = $startNull; $j < $endNull; $j++) { 
                    $result += $arr[$j];
                }
            }

            return $result;
        }  
        echo "<p>Сумма между нулей = " . sumBetweenZeros([48,9,0,4,21,2,1,0,8,84,76,8,4,13,2]) . "</p>";
        ?>
    </div>    
    <div class="task">
        <h2>
        17. Сделайте функцию, которая будет генерировать случайный цвет в hex (dechex) формате (типа #ffffff).
        </h2>        
        <?php            
        function colorHex()
        {
            $colSymb = '0123456789abcdef';
            $color = $colSymb[rand(0,15)] . $colSymb[rand(0,15)] . $colSymb[rand(0,15)] . $colSymb[rand(0,15)] . $colSymb[rand(0,15)] . $colSymb[rand(0,15)];

            return "#" . $color;
        }
        echo "<p style=\"color:" . colorHex() . "\">Рандомный цвет: " . colorHex() . "</p>";
        ?>
    </div>    
    <div class="task">
        <h2>
        18. Дана строка '332 441 550'. Найдите все места, где есть два одинаковых идущих подряд цифры и замените их на '!'.
        </h2> 
               
        <?php            
        function replaceDupl($str)
        {
            for ($i = 0; $i < strlen($str); $i++){
                if ($str[$i] == $str[$i + 1]){
                    $str[$i] = '!';
                    $str[$i + 1] = '!';
                }
            }

            return $str;
        }
        echo "<p>" . replaceDupl('332 441 550') . "</p>";
        ?>
    </div>  
    <div class="task">
        <h2>
        19. Напишите ф-цию строгой проверки ввода номер телефона в международном формате ([код страны] [код города или сети] [номер телефона]) и упрощенной проверки ввода простого номера с кодом и без него. Функция должна возвращать true или false.
        </h2> 
        <form method="GET" class="secForm">
            <label>
                Введите номер телефона:
                <input type="text" name="phoneNum" placeholder="+375(xx)xxxxxxx">
            </label>
            <button type="submit" name="butTel">Проверить</button>
        </form>
        <?php            
        function testTel($tel)
        {
            if (preg_match("/^[\+]{1}[\d]{1,3}\([\d]{2,3}\)[\d]{5,7}$/", $tel)) {
                echo "<p>Телефон введен в правильном формате</p>";
            } else if($tel == ''){
                echo "<p>Вы ничего не ввели</p>";
            } else{
                echo "<p>Телефон введен неверно</p>";
            }

            return $tel;
        }
        echo "<p>" . testTel($_GET['phoneNum']) . "</p>";
        ?>
    </div>  
    <div class="task">
        <h2>
        20. Напишите ф-цию, которая должна проверить правильность ввода адреса эл. почты.
        </h2> 
        <form method="GET" class="secForm">
            <label>
                Введите Email:
                <input type="text" name="email" placeholder="info@gmail.com">
            </label>
            <button type="submit" name="butEmail">Проверить</button>
        </form>
        <?php            
        function testEmail($email)
        {
            if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,11})$/i", $email)) {
                echo "<p>Email введен в правильном формате</p>";
            } else if($email == ''){
                echo "<p>Вы ничего не ввели</p>";
            } else{
                echo "<p>Email введен неверно</p>";
            }

            return $email;
        }
        echo "<p>" . testEmail($_GET['email']) . "</p>";
        ?>
    </div>    
</body>
</html>