<?php
require('model/database.php');
require('model/tasklist_db.php');
require('model/todolist_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_tasklists';
    }
}

if ($action == 'list_tasklists') {
    $todolist_id = filter_input(INPUT_GET, 'todolist_id', 
            FILTER_VALIDATE_INT);
    if ($todolist_id == NULL || $todolist_id == FALSE) {
        $todolist_id = 1;
    }
    $todolist_name = get_todolist_name($todolist_id);
    $todos = get_todos();
    $tasklists = get_tasklists_by_todolist($todolist_id);
    include('tasklist_list.php');
} else if ($action == 'delete_tasklist') {
    $tasklist_id = filter_input(INPUT_POST, 'tasklist_id', 
            FILTER_VALIDATE_INT);
    $todolist_id = filter_input(INPUT_POST, 'todolist_id', 
            FILTER_VALIDATE_INT);
    if ($todolist_id == NULL || $todolist_id == FALSE ||
            $tasklist_id == NULL || $tasklist_id == FALSE) {
        $error = "Missing or incorrect tasklist id or todolist id.";
        include('errors/error.php');
    } else { 
        delete_tasklist($tasklist_id);
        header("Location: .?todolist_id=$todolist_id");
    }
} else if ($action == 'show_add_form') {
    $todos = get_todos();
    include('tasklist_add.php');

} else if ($action == 'add_tasklist') {
    $todolist_id = filter_input(INPUT_POST, 'todolist_id', 
            FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $status = filter_input(INPUT_POST, 'status');
    if ($todolist_id == NULL || $todolist_id == FALSE || $name == NULL) {
        $error = "Invalid tasklist data. Check all fields and try again.";
        include('errors/error.php');
    } else { 
        add_tasklist($todolist_id, $name, $status);
          
        header("Location: .?todolist_id=$todolist_id");
    }
} else if ($action == 'list_todos') {
    $todos = get_todos();
    include('todolist_list.php');
} else if ($action == 'add_todolist') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid todolist name. Check name and try again.";
        include('view/error.php');
    } else {
        add_todolist($name);
        header('Location: .?action=list_todos');  
    }
} else if ($action == 'delete_todolist') {
    $todolist_id = filter_input(INPUT_POST, 'todolist_id', 
            FILTER_VALIDATE_INT);
    delete_todolist($todolist_id);
    header('Location: .?action=list_todos');      
}
?>