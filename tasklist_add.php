<?php include 'view/header.php'; 
// Creates add new to do lit item form sends input back to index.php and envokes add_tasklist
?>
<main>
    <h1>Add New To Do List Item</h1>
    <form action="index.php" method="post" id="add_tasklist_form">
        <input type="hidden" name="action" value="add_tasklist">

        <label>To Do List:</label>
        <select name="todo_id">
        <?php foreach ( $todos as $todo ) : ?>
            <option value="<?php echo $todo['todoID']; ?>">
                <?php echo $todo['todoName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        
        <label>Task:</label>
        <input type="text" name="name" />
        <br>

        <label>Status:</label>
        <input type="text" name="status" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Task" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_tasklists">Home</a>
    </p>

</main>
<?php include 'view/footer.php'; ?>