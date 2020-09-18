<?php
/* Папка 6. Добавить классу Product статическое свойство companyName и константу YEAR_START. Добавить классу Product
статический метод showCompanyInfo, который выводит на экран информацию о названии компании и год начала ее деятельности.
Выведите эту информацию на экран через обращение к Product и через любой объект дочернего класса.
Реализовать магический метод set для класса Chocolate. Реализовать магический метод get для класса Candy.
Создать три интерфейса и расширить ими класс Product.*/

interface iName
{
    public function getName();
}
interface iPrice
{
    public function getPrice();
}
interface iPriceInDollar
{
    public function getDollarPrice();
}

// Объявляю класс
abstract class Product implements iName, iPrice, iPriceInDollar
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
    // Статическое свойство, название компании
    public static $companyName = 'Пятерочка';
    // Константа, год начала деятельности компании
    const YEAR_START = 2007;

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

    // Статический метод, который выводит на экран информацию о компании
    public static function showCompanyInfo() {
        echo "Название компании: ". self::$companyName . "<br>";
        echo "Год создания: ". self::YEAR_START . "<br>";
    }
    // Объявляю методы интерфейсов, которыми я рассширила класс Product
    // Метод выводит название продукта на экран
    public function getName() {
        echo "Название продукта: $this->name <br>";
    }
    // Метод выводит цену продукта на экран
    public function getPrice() {
        echo "Цена продукта $this->name: $this->price руб <br>";
    }
    // Метод выводит цену продекта в долларах
    public function getDollarPrice() {
        echo "Цена продукта $this->name: " . round($this->price/75, 1) . "$ <br>";
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

    // Магический метод get
    public function __set($name, $value)
    {
        echo "Вы не можете присвоить свойству $name значение $value <br>";
    }
}

// Класс, наследуемый от класса Product
class Candy extends Product
{
    public function __construct(string $name, int $price, int $weight, string $image, string $imageWidth)
    {
        parent::__construct($name, $price, $weight, $image, $imageWidth);
    }

    // Магический метод set
    public function __get($name)
    {
        echo "Нельзя обратиться к свойству с именем $name <br>";
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
// Вывожу информацию о компании через обращение к классу Product
Product::showCompanyInfo();
// Вывожу информацию о компании через объект класса Candy - дочернего класса Product
$stepCandy::showCompanyInfo();

// Проверяю, работают ли магические методы (работают)
$alpenGoldOreo->composition = 'аь';
echo $stepCandy->composition;
// Вывожу на экран информацию об экземплярах классов с помощью методов интерфейсов
$stepCandy->getName();
$alpenGoldOreo->getPrice();
$alpenGoldOreo->getDollarPrice();