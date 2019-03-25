<?php

function importFile()
{
    $contents = file_get_contents('file_todo.csv');

    $rows = explode("\n", $contents);
    $tasks = [];

    foreach($rows as $field) {
        [$task_list, $id] = explode(",", $field);

       $tasks[] = [
            'task_list' => $task_list,
            'id' => $id,
        ];
    }

    return $tasks;
}

function exportFile($contents)
{
    $rows = null;

    foreach($contents as $content) {
        if ($content['id']) {
            $field .= implode(',', $content) . "\n";
        }
    }

    file_put_contents('file_todo.csv', $field);
}

function deleteById($id)
{
    $contents = importFile();

    foreach($contents as $index => $content) {
        if ($content['id'] === $id) {
            unset($contents[$index]);

            exportFile($contents);
        }
    }
}
