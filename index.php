<?php 
class Tag{
    private $tag; // хранит название тега
    private $text; // хранит текст, который будет в теге
    private $attr = array(); // будет хранить массив аттрибутов тега. Массив - т.к. аттрибутов может быть много
    
    function __construct ($name){
    	// при создании объекта инициализирум свойство, его обязательно нужно принимать в праметре функции
        $this->tag = $name;    
    }
    
    function setText($text){
        $this->text = $text;
    	return $this; // метод должен возвращать объект, чтобы можно было создавать цепочку вызовов
    }

     function setAttr($attribute, $value){
     	// при вызове метода наполняем массив $this->attr. Он будет ассоциативный. В ключе будет храниться название аттрибута, а в значении элемента массива - значение аттрибута
        $this->attr[$attribute] = $value;   
    	return $this; // метод должен возвращать объект, чтобы можно было создавать цепочку вызовов
    }
    
    function show(){
    	// сначала из массива  $this->attr формируем строку 
    	$str = '';
    	foreach ($this->attr as $key => $value) {
    		$str.= "{$key} = '{$value}' ";
    	}
		// выводим тег
    	echo "<{$this->tag}  {$str}>{$this->text}</{$this->tag}>";
    }
}

$tag = new Tag('a'); // вызывается __construct 
$tag->setText('ссылка')->setAttr('href', 'index.html')->show();
$tag->setText('ссылка')->setAttr('href', 'index.html')->show();

 ?>