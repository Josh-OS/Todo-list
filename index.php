<?php
include_once 'extlib.php';

//Add btn is clicked.
if ($_GET) {

	if ($_GET['addbox']) {

		savetodo();
 	 }
	
}



//Check a box is clicked


	if($_GET) {

		if($_GET['checkdone']) {

			//Code
			
			
			$container = file_get_contents('file_todo.csv');
			$lister =[];

			foreach(explode("\n", $container) as $contains) { //string to organized array
				if ($contains) { //To prevent warning: will prevent execution if the $contains is empty.
					[$task_list, $id] = explode(',', $contains);

					if ($id == $_GET['checkdone']) {

						$lister[] = [
							'task_list' => $task_list,
							'id' => $id
					];
					}
				}


			}


			savedone($lister);

			importFile();
			deleteById($_GET['checkdone']);
	


			$contains = NULL;			
			$lister = NULL;
			//Code
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
					'task_list' => $task_list,
					'id' => $id
				];
	
				//print on screen
				
				echo '<tr>';
				echo '<td class=checkbox>' . '<a href="?checkdone=' . $id . '">' . '<div class=divbox></div>' . '</a>'  . '</td>';
				echo '<td>' . $task_list . '</td>';
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


	
