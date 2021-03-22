<?php 
require_once './testConnected.php';

/*Любая цепочка методов, заканчивающаяся на find_one() вернет либо единичный экземпляр класса ORM представляющий ряд из базы данных по указанному запросу, или false если не было найдено удовлетворяющих запросу записей.

Чтобы найти одиночную запись, где столбец name имеет значение “Fred Bloggs”:

*/
$person = ORM::for_table('athletes')->where('name', 'Fred Bloggs')->find_one();

// Чтобы найти единичную запись по ID, вы можете передать ID прямо в метод find_one:

$person = ORM::for_table('athletes')->find_one(8);

##############################

/*Множество записей
Любая цепочка методов, заканчивающаяся на find_many() вернет массив экземпляров ORM-класса, по одному для каждой удовлетворяющей запросу строки. Если не было найдено ни одной строки, то будет возвращен пустой массив.
 */
// по факту здесь написано выбери всё из таблиый country_medals
 $country_id = ORM::for_table('country_medals')->find_many();
// сделаем выбор из таблицы country_medals 
$country_id = ORM:: for_table('country_medals')->where('country_id', 12 )->find_many();
foreach($country_id as $value){
    $value->team ;
    $value->sport_type_id ;
    $value->country_id ;
   
}

###########


//Множество записей как результирующий набор 

//Вы так же можете найти множество записей в качестве результирующих наборов вместо массива экземплятров Idiorm. Это дает преимущество в том, что вы можете запустить пакетные операции на наборе результатов.


$medals = ORM::for_table('country_medals')->find_many();
foreach ($medals as $gold) {
    $gold->medal_type_id = 1;
    $gold->save();
}
/* или 
 Чтобы это сделать, замените любой вызов метода find_many() методом find_result_set().
*/
ORM:: for_table('country_medals')->find_result_set() 
  ->set ('medal_type_id',1)
  ->save();

/*Результирующий набор ведет себя так же, как и массив, так что вы можете использовать на нем count() и foreach как и с массивом.*/

ORM :: for_table('country_medals')->find_result_set(); //- это выражение -массив 

foreach (ORM :: for_table('country_medals')->find_result_set() as $medals){
    echo $medals->medal_type_id;
}
echo count(ORM::for_table('country_medals')->find_result_set());

//Множество записей как ассоциативный массив
//Так же вы можете найти множество записей в виде ассоциативного массива, вместо экземпляров Idiorm. Для этого замените любой вызов метода find_many() на метод find_array().
$medal = ORM::for_table('country_medals')->where('country_id', 12) -> find_array();

//Для подсчета числа строк, возвращаемых запросом
$all_medals = ORM::for_table('country_medals')->count();


/* Равенство

    where ('name','Fred')  равно WHERE name="Fred"
    where_not_equal  равно WHERE name != "Fred" 

    Можно указать множество столбцов и их значений в пределах одного вызова
    в этом случае используется ассоциативный массив ключи используются как названия столбцов 
*/

// выбери всё из столбца где совпадают эти два элемента массива
$people = ORM::for_table('athletes')->where(array(
    'name' => 'Александров' ,
    'sure_name'=> 'Александр',

))->find_many();


/*
Меньше чем / больше чем: where_lt, where_gt, where_lte, where_gte
Есть четыре метода, доступные для неравенств:

Меньше чем
$people = ORM::for_table('person')->where_lt('age', 10)->find_many();

Больше чем 
$people = ORM::for_table('person')->where_gt('age', 5)->find_many();

Меньше или равен
$people = ORM::for_table('person')->where_lte('age', 10)->find_many();
 
Больше или равен
$people = ORM::for_table('person')->where_gte('age', 5)->find_many();

*/

?>

