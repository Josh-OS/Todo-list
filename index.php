<?php
//Add btn is clicked.
	if ($_GET) { //To prevent warning: will prevent execution if $_GET is empty.

		if ($_GET['addbox']) {

			//TO CSV
			$container = $_GET; //GET to array
			$container['id'] = uniqid(); //append generated id

			file_put_contents('file_todo.csv', (implode(',', $container) . "\n"), FILE_APPEND);


  }
	

	}
?>


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
	if (file_exists('file_todo.csv')) { //To prevent error: check first if file exists.

		$container = file_get_contents('file_todo.csv');
		$lister =[];

		echo '<table class=tlist>'; //create table

		foreach(explode("\n", $container) as $contains) { //string to organized array
			if ($contains) { //To prevent warning: will prevent execution if the $contains is empty.
				[$task_list, $id] = explode(',', $contains);
	
				$lister[] = [
					'id' => $id,
					'task_list' => $task_list
				];
	
				//print on screen
				
				echo '<tr>';
				echo '<th class=checkbox>' . $id . '</th>';
				echo '<th>' . $task_list . '</th>';
				echo '</tr>';
	


			}
				

		}

		echo '</table>'; //end table

	}
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


	
