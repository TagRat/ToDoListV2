<?php
function get_todos() {
    global $db;
    $query = 'SELECT * FROM todolist
              ORDER BY todoID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_todo_name($todo_id) {
    global $db;
    $query = 'SELECT * FROM todolist
              WHERE todoID = :todo_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':todo_id', $todo_id);
    $statement->execute();    
    $todo = $statement->fetch();
    $statement->closeCursor();    
    $todo_name = $todo['todoName'];
    return $todo_name;
}

function add_todo($name) {
    global $db;
    $query = 'INSERT INTO todolist (todoName)
              VALUES (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_todo($todo_id) {
    global $db;
    $query = 'DELETE FROM todolist
              WHERE todoID = :todo_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':todo_id', $todo_id);
    $statement->execute();
    $statement->closeCursor();
}
?>