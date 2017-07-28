<?php include 'view/header.php'; 
// Displays all To do lists and allows for the creation of a new list or deletion of existing list.

?>
<main>

    <h1>To Do Lists</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($todos as $todolist) : ?>
        <tr>
            <td><?php echo $todolist['todoName']; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_todo" />
                    <input type="hidden" name="todo_id"
                           value="<?php echo $todolist['todoID']; ?>"/>   
                    <input type="submit" value="Delete"/>
                </form>
            </td>
            
         <!--   <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="update_todo" />
                    <input type="hidden" name="todolist_id"
                           value="<?php echo $todolist['todoID']; ?>"/>
                    <input type="submit" value="Rename"/>
                </form>
            </td> -->
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add New To Do List</h2>
    <form id="add_todolist_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_todo" />

        <label>Name:</label>
        <input type="text" name="name" />
        <input type="submit" value="Add"/>
    </form>

    <p><a href="index.php?action=list_tasklists">Home</a></p>

</main>
<?php include 'view/footer.php'; ?>