<?php
/* Используя в качестве основы только переменную $a, создать еще 4 других переменных, каждая из которых будет называться так же,
как изначение предыдущей. */

/* Инициализирую переменные. Чтобы использовать значение переменной в качестве имени переменной, нужно поставить
дополнительный знак доллара перед именем переменной, значение которой будет использоваться в качестве имени.
Данные переменные называются переменные переменных. */
$a = "b";
$$a = "c";
$$$a = "d";
$$$$a = "e";
$$$$$a = "f";

/* При выводе на экран значений переменных я использую настоящие имена переменных переменных. */
echo 'a = ' . $a . '<br>';
echo 'b = ' . $b . '<br>';
echo 'c = ' . $c . '<br>';
echo 'd = ' . $d . '<br>';
echo 'e = ' . $e . '<br>';

/* Вот что выводится на экран:
a = b
b = c
c = d
d = e
e = f
*/