

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
	//CSV TO SCREEN
	echo '<div class="todo-list">';
	$container = file_get_contents('file_todo.csv');
	$lister =[];

	foreach(explode("\n", $container) as $contains) { //string to organized array
		[$id, $task_list] = explode(',', $contains);

		$lister[] = [
			'id' => $id,
			'task_list' => $task_list
		];
	}
	echo $lister['id'];
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


  }

?>

	
