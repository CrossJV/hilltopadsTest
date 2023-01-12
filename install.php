<?php
if(!isset($pgdbhost) and !isset($pgdbname) and !isset($pgdblogin) and !isset($pgdbpassword)) require_once "config.php";
pg_connect("host=$pgdbhost dbname=$pgdbname user=$pgdblogin password=$pgdbpassword") or die ("DB connection error");

    // $query = 
    // "CREATE TABLE entity_labels(
    //     id SERIAL PRIMARY KEY, 				--id
    //     label_fk varchar,           		--id лэйбла
    //     entity_fk int          		        --id сущности
    // )";

    // if($result = pg_query($query) or die('Невозможно создать таблицу позиций')) {
    //     echo "Таблица создана<br/>";
    // }

    //  $query = 
    // "CREATE TABLE available_labels(
    //     id SERIAL PRIMARY KEY, 				--id
    //     label_name varchar           		--название лэйбла
    // )";

    // if($result = pg_query($query) or die('Невозможно создать таблицу позиций')) {
    //     echo "Таблица создана<br/>";
    // }

    // Допустимые лэйблы
    //  $query = 
    // "INSERT INTO available_labels (label_name) VALUES ('label1'), ('label2'), ('label3'), ('label4'), ('label5')
    // ";

    // if($result = pg_query($query) or die('Невозможно создать таблицу позиций')) {
    //     echo "Данные занесены<br/>";
    // }

    // $query = 
    // "CREATE TABLE entityes(
    //     id SERIAL PRIMARY KEY, 				--id
    //     entity_type int NOT null           		--тип сущности
    // )";

    // if($result = pg_query($query) or die('Невозможно создать таблицу позиций')) {
    //     echo "Таблица создана<br/>";
    // }

    //     // тестовые сущности
    //  $query = 
    // "INSERT INTO entityes (entity_type) VALUES (1), (2), (3), (2), (1)
    // ";

    // if($result = pg_query($query) or die('Невозможно создать таблицу позиций')) {
    //     echo "Данные занесены<br/>";
    // }

    


