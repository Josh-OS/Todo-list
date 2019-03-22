

<html>
 <head>
  <title>Task To Do</title>
  <link rel="stylesheet" type="text/css" href="todocss.css">
 </head>
</html>

<body>
 
 <!--Main Pad-->
 <div class="pad">
 <h3 class="title">To Do</h3>
 
<!--Todo list (table)-->
<?php
  echo '<!--Task list-->';
  echo '<div class="todo-list">';
  echo '<ul>';
  echo '  <li>First task</li>';
  echo '  <li>Second task</li>';
  echo '  <li>Third task</li>';
  echo ' </ul>';
  echo '</div>';
?>

  <div class="adder">
   <form action="" method="get">
    <input type="text" name="addbox">
    <span class="sub"><input type="submit" class="sub" value="ADD"></span>
   </form>
  </div>

 </div>
</body>
</html>


<?php

//Add btn is clicked.
  if ($_GET['addbox']) {

	//TO CSV
	$container = $_GET; //GET to array
	$container['id'] = uniqid(); //append generated id

	file_put_contents('file_todo.csv', (implode(',', $container) . "\n"), FILE_APPEND);

	//CSV TO SCREEN
	$container = file_get_contents('file_todo.csv');
	$lister =[];

	foreach(explode("\n", $container) as $container) { //string to organized array
		[$id, $task_list] = explode(',', $container);

		$lister[] = [
			'id' => $id,
			'task_list' => $task_list
		];
	}
	var_dump($lister);
	echo "$task_list";

}

	
