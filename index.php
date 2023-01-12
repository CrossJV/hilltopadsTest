<?php
    require_once "controller.php";

    $entity1 = new Labels(1, 1); // передаем id сущности и тип
    $entity1->update([]); //очищает все лейблы на сущности т.к передан пустой список
    echo '<br>';
    $entity1->add(['label1', 'label2', 'label3']); // добавление лейблов к сущности
    echo '<br>';
    $entity1->get(); // получение всех лейблов сущности
    echo '<br>';
    $entity1->add(['label10', 'label2', 'label3']); // генерация ошибки т.к первый лейбл в списке недопустим 
    echo '<br>';
    $entity1->add([]); // генерация ошибки т.к список пуст
    echo '<br>';
    $entity1->get(); // получение всех лейблов сущности
    echo '<br>';
    $entity1->delete(['label3']); // удаление label3 из сущности
    echo '<br>';
    $entity1->delete([]); //генерация ошибки, т.к передан пустой список
    echo '<br>';
    $entity1->delete(['label10']); //генерация ошибки, т.к переданого лэйбла нет в сущности
    echo '<br>';
    $entity1->get(); 
    echo '<br>';
    $entity1->update(['label2', 'label4', 'label1']); // перезапись лэйблов сущности
    echo '<br>';
    $entity1->get(); 
    echo '<br>';
    

    echo '<br>';
    echo '<br>';

    $entity2 = new Labels(4, 1);
    $entity2->get(); // генерирует ошибку, так как сущность не найдена
    echo '<br>';
    $entity2->update([]); // генерирует ошибку, так как сущность не найдена
    echo '<br>';
    $entity2->add(['label1', 'label2', 'label3']); // генерирует ошибку, так как сущность не найдена
    echo '<br>';
    $entity2->delete(['label3']); // генерирует ошибку, так как сущность не найдена
