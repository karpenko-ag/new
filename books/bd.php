<?php
/*
sql - язык запросов
CREATE TABLE имя_таблицы (
имя_столбца тип_данных [NULL | NOT NULL] [другие спецификации],
имя_столбца тип_данных [NULL | NOT NULL] [другие спецификации],
имя_столбца тип_данных [NULL | NOT NULL] [другие спецификации]
)






     ---------------создание таблиц
CREATE TABLE users(
id int NOT NULL primary key auto_increment,
firstname varchar(50) NOT NULL,
lastname varchar(50) NOT NULL,
age int default 18,
info text,
gender enum('m','f') default 'm'
)

CREATE TABLE products (
 id INT UNSIGNED NOT NULL AUTO_INCREMENT , 
 name VARCHAR(50) NOT NULL , 
 price DECIMAL(10,2) NOT NULL DEFAULT '0' , 
 data INT UNSIGNED NOT NULL DEFAULT CURRENT_TIMESTAMP , 
 PRIMARY KEY (`id`)) ENGINE = InnoDB;

Добавление строк 
----------
INSERT INTO users VALUES(1,'Pupkin', 'Vasya', '25', 'info' , 'm');
INSERT INTO users(firstname, lastname, age ) VALUES ('ivanov', 'ivan', '20');
INSERT INTO users(firstname, lastname, age ) VALUES ('ivanov', 'ivan', '21');
INSERT INTO users(firstname, lastname, age ) VALUES ('ivanov', 'ivan', '22');
INSERT INTO users(firstname, lastname, age ) VALUES ('ivanov', 'ivan', '23');

удаление строк 
--------------

DELETE FROM users; // удалит все строки 
DELETE FROM users WHERE id=2; // удалит строку с id=2 
DELETE FROM users WHERE age<=21; // удалит пользователей с возрастом меньше 21 года
DELETE FROM users WHERE info IS NULL ; // проверка равеснства на нулл значение 
DELETE FROM users WHERE info IS NOT NULL; // проверка на неравенство 
DELETE FROM users WHERE lastname = 'ivan' OR lastname='ivanka';
DELETE FROM users WHERE age=> 50 AND age=< 60;

Принадлежность к диапазону (between) замена AND
-----------------------------------------------
DELETE FROM users WHERE age=> 50 AND age=< 60;
DELETE FROM users WHERE age BETWEEN 50 AND 60;

Принадлежность множеству (in) замена or
--------------------------------------
DELETE FROM users WHERE lastname='ivan' or lastname='ivanka';
DELETE FROM users WHERE lastname IN ('ivan', 'ivanka');

обновление строк
----------------
UPDATE users SET firstname='petrov';
UPDATE users SET firstname='petrov22222' WHERE id=1;

UPDATE products
SET price = price+ price*0.2; // увеличение стоимости на 20%


выборка данных 
-------------- 
SELECT * FROM users; // выведит всю таблицу 
SELECT firstname , lastname FROM users;
SELECT firstname , lastname FROM users WHERE id=5;







*/
?>
<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'test');
$res = mysqli_query($mysqli, 'SELECT * FROM books LIMIT 0, 10');

$row = mysqli_num_rows($res); // количество строк в результирующей, таблице
$col = mysqli_num_fields($res); //количество колонок


//echo mysqli_field_name($res, 1); //возвращает имя столбца по номеру
//print_r(mysqli_fetch_array($res)); //возвращает результат в виде индексированного и ассицоативного массива
//print_r(mysqli_fetch_assoc($res)); // возвращает результат в виде ассоциативного массива
//print_r(mysqli_fetch_assoc($res));
//print_r(mysqli_fetch_assoc($res));

/*for($i=0; $i<$row; $i++)
{
       $book = mysqli_fetch_assoc($res);
       echo $book['name'].'<br>';
}
*/
	
echo '<pre>';
print_r(mysqli_fetch_all($res, MYSQLI_ASSOC));
echo '</pre>';

/*
Агрегирующие функции
--------------------
MIN, MAX,COUNT,SUM,AVG
SELECT MIN(price) FROM books; // цена самой дешевой книги
COUNT(имя_столбца) //подсчитает все строки , с не NULL значением 
COUNT(*)// подчитает все строки 
SELECT COUNT(*), COUNT(dateizd) FROM books;
SELECT MAX(price), name FROM books;





*/
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
</body>
</html>