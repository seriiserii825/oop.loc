Парадигма - это образ жизни, образ мышления и совокупность правил и принципов.

-------------------

Галя взглядом прожегла кирпич.
Строитель и кривые кирпичи.

===========================

Парадигмы

-----------------
Императив

- Приказы, команды(делай, брось, положи)
- Бездумный исполнитель(компьютер, который ничего не умеет делать, только исполняет приказы)

a := 5;
b := 8;
c := a + b;
print c;

Открой фотошопо
Создай документ
Залей фон

------------------

Декларативное программирование(соглашение, что нужно сделать)

SELECT * FROM users ORDER BY name LIMIT 10;

Сделай дизайн по примерно такому макету .... дизайн (мы говорим что сделать, но не говорим как)

sum(5, 3)

getUserNames(10, 'name') - загрузи 10 пользователей с группировкой по полю name.

---------------------

Лапшикод - это когда большая куча кода, и никто не понимает, как разделять ее на куски.

----------------------
Структурное программирование

Управляющие конструкции:
- последованность
- ветвления
- циклы

---------------------------

<?php
function map($func, $items)
{
	$result = [];

	foreach ($items as $item) {
		$result[] = $func($item);
	}
	return $result;
}
