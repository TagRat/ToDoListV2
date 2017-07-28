<?php
// Pulls in required files for funtions and database connectivity

require('model/database.php');
require('model/tasklist_db.php');
require('model/todolist_db.php');

// default action on initial page load 

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_tasklists';
    }
}

// additional action repsonses that take form or button input and pass parameters to needed funtions - tests for required input as needed

if ($action == 'list_tasklists') {
    $todo_id = filter_input(INPUT_GET, 'todo_id', 
            FILTER_VALIDATE_INT);
    if ($todo_id == NULL || $todo_id == FALSE) {
        $todo_id = 1;
    }
    $todo_name = get_todo_name($todo_id);
    $todos = get_todos();
    $tasklists = get_tasklists_by_todo($todo_id);
    include('tasklist_list.php');
} else if ($action == 'delete_tasklist') {
    $tasklist_id = filter_input(INPUT_POST, 'tasklist_id', 
            FILTER_VALIDATE_INT);
    if ($tasklist_id == NULL || $tasklist_id == FALSE) {
        $error = "Missing or incorrect tasklist id or todo id.";
        echo "$todo_id, $tasklist_id";
        include('errors/error.php');
    } else { 
        delete_tasklist($tasklist_id);
        header("Location: .?todo_id=$todo_id");
    }
} else if ($action == 'show_add_form') {
    $todos = get_todos();
    include('tasklist_add.php');

} else if ($action == 'add_tasklist') {
    $todo_id = filter_input(INPUT_POST, 'todo_id', 
            FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $status = filter_input(INPUT_POST, 'status');
    if ($todo_id == NULL || $todo_id == FALSE || $name == NULL) {
        $error = "Invalid tasklist data. Check all fields and try again.";
        include('errors/error.php');
    } else { 
        add_tasklist($todo_id, $name, $status);
          
        header("Location: .?todo_id=$todo_id");
    }
} else if ($action == 'list_todos') {
    $todos = get_todos();
    include('todolist_list.php');
} else if ($action == 'add_todo') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid todo name. Check name and try again.";
        echo "$error";
      include('errors/error.php');
    } else {
        add_todo($name);
      header('Location: .?action=list_todos');  
    }
} else if ($action == 'delete_todo') {
    $todo_id = filter_input(INPUT_POST, 'todo_id', 
            FILTER_VALIDATE_INT);
    delete_todo($todo_id);
    header('Location: .?action=list_todos');      
}
?>