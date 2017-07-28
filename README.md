 A simple task list as final project. Used examples in the book and pervious work I had done in Chapter 5 specificaly the product database. 

Requirements as follows - 
1.  Working todo list creation - 15 Points - complete

2.  Working todo list edit - 15 points - complete

3.  Working todo list delete - 10 points - complete 

4.  Working todo list item creation - 15 points - complete

5.  Working todo list item update - 15 points - not completed

7.  Working todo list item delete -- 10 points - complete

8.  The application demonstrates commits that show the code for parts 1-7 i.e. 7 commits  - 10 points.

9.  The code is commented to describe your functionality - 10 Points - complete 


Database - 

The database has two tables - 1. todolist - this holds the names of the various todo lists to be tracked, and 2. tasklist that is the tasks themselves. todolist has two columns one for a numeric ID and one for the tasklist name. tasklist has four columns. tasklistID - numeric ID for a task, todoID - key to todolist table, taskName - name of task, and status - task status. 

Program - 

Errors directory contains two php programs - one to capture database errors, and one to caputre progrma errors specifically testing various inputs to ensure accurate inputs. 

Model contains three files. database.php is used to manage connectivity to mysql, tasklist_db manages all functions for task manipulation and todolist_db handles all funtions for todo list manipulation. 

View directory contains three files - standard header and footer used by all screens and a todolist_nav which dispalys all todos as links. 

main.css - Standard CSS file 

index.php - main controler program

tasklist_add - handles task adding

test.php - test program to test function calls directly 

tasklist_list - generates tasklist screen 

todolist_list - generates todo list screen 






