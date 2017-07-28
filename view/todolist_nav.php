
        <nav>
            <ul>
                <!-- display links for all todos -->
                <?php foreach($todos as $todo) : ?>
                <li>
                    <a href="?todo_id=<?php 
                              echo $todo['todoID']; ?>">
                        <?php echo $todo['todoName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
