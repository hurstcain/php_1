/* С помощью условий и циклов вывести таблицу умножения в удобночитаемом формате. */

/* HTML код, где я вывожу текст на экран с определенными характеристиками (размер шрифта 5, шривт Arial)
и с табуляцией (&#9). */
<pre><font size="5" face="Arial">&#9Таблица умножения</font>
</pre>
<?php
/* Двойной цикл, в котором я вывожу на экран таблицу умножения для каждого числа от 1 до 10.*/
for ($i = 1; $i <= 10; $i++) {
    for ($j = 1; $j <= 10; $j++)
        echo "$i * $j = " . $i * $j . "<br>";
    echo "<br>";
}