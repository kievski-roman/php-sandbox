<?php

require_once 'TodoApp.php';

$command = $argv[1] ?? null;
$param = $argv[2] ?? null;

$app = new TodoApp();

switch ($command) {
    case 'add':
        if ($param) {
            $app->add($param);
        } else {
            echo "❗ Введи текст задачі.\n";
        }
        break;

    case 'list':
        $app->list();
        break;

    case 'remove':
        if (is_numeric($param)) {
            $app->remove((int) $param);
        } else {
            echo "❗ Введи номер задачі для видалення.\n";
        }
        break;

    default:
        echo "👋 Команди: add [текст], list, remove [номер]\n";
}




