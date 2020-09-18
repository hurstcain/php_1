<?php
/* Папка 5. Класс Product сделать абстрактным и добавить в него матод showImage. Создать классы Chocolate и Candy,
унаследоваться от класса Product. В конструктор Chocolate также передавать количество калорий. Метод shoImage
для Chocolate выводит div с шириной и высотой 200px с любой шоколадкой в качестве фона, а такой же метод для Candy выводит
div с шириной и высотой 100px с любой конфетой в качестве фона.
Метод showImage должен быть абстрактным и вызываться автоматически при создании нового объекта любого дочернего класса Product.
В Product реализовать метод или свойство, которое хранило бы в себе актуальное количество всех объектов всех дочерних
классов.*/

// Объявляю класс
abstract class Product
{
    // Свойства класса: название, цена, вес товара, картинка товара и ширина(и высота) картинки
    public $name;
    public $price;
    public $weight;
    public $image;
    public $imageWidth;
    // Статическая свойство, которое отвечает за общее количество продуктов. Каждый раз, когда вызывается конструкор
    // какого-либо дочернего класса, count увеличивается на единицу
    public static $count = 0;

    // Конструктор класса
    public function __construct(string $name,int $price, int $weight, string $image, string $imageWidth) {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        $this->image = $image;
        $this->imageWidth = $imageWidth;
        self::$count++;
    }

    // Метод класса, который выводит на экран информацию о товаре. Также я добавила сюда выполнение метода showImage.
    // Каждый раз, когда вызывается метод info для объекта какого-либо дочернего класса, выполняется метод showImage.
    // Мне кажется, что выполнять его при создании объекта, т.е. в конструкторе, нет смысла
    public function info() {
        $this->showImage();
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

    // Метод, который выводит на экран изображение товара
    public function showImage() {
        // Ширина и высота картинки одинаковые, в качестве фона я передаю соответствующее для каждого товара изображение
        // background-size - это размер изображения
        echo "<div style='width: {$this->imageWidth}; height: {$this->imageWidth}; background: url({$this->image}); 
                   background-size: {$this->imageWidth} {$this->imageWidth}'></div>";
    }

    // Метод, который вывоит на экран общее количество продуктов. Так как $self - статическая переменная, то мы обращаемся к ней
    // из класса Product, с помощью self
    public function showCount() {
        echo "Всего продуктов: " . self::$count . "<br>";
    }
}

// Класс, наследуемый от класса Product
class Chocolate extends Product
{
    // Собственное свойство класса, кол-во калорий
    public $calories;

    // В конструктор передаем дополнительно индивидуальное свойство данного класса - calories
    public function __construct(string $name, int $price, int $weight, string $image, string $imageWidth, int $calories)
    {
        $this->calories = $calories;
        parent::__construct($name, $price, $weight, $image, $imageWidth);
    }

    // Переопределяем метод, добавляя в него вывод колорий
    public function info() {
        $this->showImage();
        echo "Назавание товара: $this->name <br>
              Цена: $this->price руб <br>
              Вес: $this->weight г <br>
              Количество калорий: $this->calories ккал <br>";
    }

}

// Класс, наследуемый от класса Product
class Candy extends Product
{
    public function __construct(string $name, int $price, int $weight, string $image, string $imageWidth)
    {
        parent::__construct($name, $price, $weight, $image, $imageWidth);
    }
}

// Создаем экземпляры классов Chocolate и Candy
$alpenGoldOreo = new Chocolate('Alpen Gold Oreo', 150, 95, 'img-chocolate.jpg', '200px', 541);
$stepCandy = new Candy('Степ', 46, 100, 'img-candy.jpg', '100px');
// Выводим на экран количество продуктов
$stepCandy->showCount();
// Выводим на экран информацию об объектах классов Chocolate и Candy
$alpenGoldOreo->info();
$stepCandy->info();
