<?php include 'view/header.php'; 
// Dispalys To do and creates a table of taskslists on click. Allows for tasklist deletion

?>
<main>
    <h1>To Dos</h1>

    <aside>
        <!-- display a list of todos -->
        <h2>Task List</h2>
        <?php include 'view/todolist_nav.php'; ?>        
    </aside>

    <section>
        <!-- display a table of tasklists -->
        <h2><?php echo $todo_name; ?></h2>
        <table>
            <tr>
                <th>Task</th>
                <th class="right">Status</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($tasklists as $tasklist) : ?>
            <tr>
                <td><?php echo $tasklist['taskName']; ?></td>
                <td class="right"><?php echo $tasklist['status']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_tasklist">
                    <input type="hidden" name="tasklist_id"
                           value="<?php echo $tasklist['tasklistID']; ?>">
                    <input type="hidden" name="todolist_id"
                           value="<?php echo $tasklist['todolistID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Task</a></p>
        <p class="last_paragraph"><a href="?action=list_todos">
                List Todos</a>
        </p>        
    </section>
</main>
<?php include 'view/footer.php'; ?>