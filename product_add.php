<?php include 'view/header.php'; ?>
<main>
    <h1>Add New To Do List Item</h1>
    <form action="index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_product">

        <label>To Do List:</label>
        <select name="category_id">
        <?php foreach ( $categories as $category ) : ?>
            <option value="<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
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
        <a href="index.php?action=list_products">Home</a>
    </p>

</main>
<?php include 'view/footer.php'; ?>