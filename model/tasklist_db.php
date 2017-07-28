<?php
function get_tasklists_by_todo($todo_id) {
    global $db;
    $query = 'SELECT * FROM tasklist
              WHERE todoID = :todo_id
              ORDER BY tasklistID';
    $statement = $db->prepare($query);
    $statement->bindValue(":todo_id", $todo_id);
    $statement->execute();
    $tasklists = $statement->fetchAll();
    $statement->closeCursor();
    return $tasklists;
}

function get_tasklist($tasklist_id) {
    global $db;
    $query = 'SELECT * FROM tasklist
       WHERE tasklistID = :tasklist_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":tasklist_id", $tasklist_id);
    $statement->execute();
    $tasklist = $statement->fetch();
    $statement->closeCursor();
    return $tasklist;
}

function delete_tasklist($tasklist_id) {
    global $db;
    $query = 'DELETE FROM tasklist
              WHERE tasklistID = :tasklist_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':tasklist_id', $tasklist_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_tasklist($todo_id, $name, $status) {
    global $db;
    $query = 'INSERT INTO tasklist
                 (todoID, taskName, status)
              VALUES
                 (:todo_id, :name, :status)';
    $statement = $db->prepare($query);
    $statement->bindValue(':todo_id', $todo_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':status', $status);
    $statement->execute();
    $statement->closeCursor();
}
?>