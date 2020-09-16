<?php

/* Папка 4. Создать класс Product и прописать в нем следующие свойства: название, цена, вес. Прописать в классе конструктор и метод,
который бы публиковал всё инфо о товаре на страницу. Создать три объекта класса Product и вывести о них
информацию на экран через соответствующий метод.
Расширить класс Product методами, которые бы выводили на экран цену товара и цену товара без учета НДС.Сделать проверку
в конструкторе на передаваемый тип данных (например, цену и вес надо передавать числом, а название - строкой).
*/

// Объявляю класс
class Product
{
    // Свойства класса: название, цена и вес товара
    public $name;
    public $price;
    public $weight;

    // Конструктор класса
    public function __construct(string $name,int $price, int $weight) {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
    }

    // Метод класса, который выводит на экран информацию о товаре
    public function info() {
        echo "Назавание товара: $this->name <br>
              Цена: $this->price руб <br>
              Вес: $this->weight г <br>";
    }

    // Метод класса, который выводит на экран цену товара с НДС
    public function priceWithNDS() {
        echo "Цена товара \"$this->name\" с НДС: $this->price руб <br>";
    }

    // Метод класса, который выводит на экран цену товара без НДС. НДС для продовольственных товаров - 10 %
    public function priceWithoutNDS() {
        echo "Цена товара \"$this->name\" без НДС: " . $this->price / 1,1 . " руб <br>";
    }
}

// Создаю экземпляры класса Product
$romashka_candy = new Product("Конфеты \"Ромашка\"", 40, 100);
$step_candy = new Product("Конфеты \"Степ\"", 80, 100);
$bounty_candy = new Product("Конфеты \"Баунти\"", 70, 100);

// Вывожу с помощью метода info информацию о каждом экземпляре класса Product
$romashka_candy->info();
$step_candy->info();
$bounty_candy->info();

// Вывожу на экран информацию о цене конфет Ромашка с НДС и без НДС
$romashka_candy->priceWithNDS();
$romashka_candy->priceWithoutNDS();