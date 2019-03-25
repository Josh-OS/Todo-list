<?php
include_once 'extlib.php';

//Add btn is clicked.
if ($_GET) { //To prevent warning: will prevent execution if $_GET is empty.

	if ($_GET['addbox']) {

		//Code
		
		//TO CSV
		$container = $_GET; //GET to array
		$container['id'] = uniqid(); //append generated id

		file_put_contents('file_todo.csv', (implode(',', $container) . "\n"), FILE_APPEND);

		//Code
 	 }
	
}



//Check a box is clicked


	if($_GET) {

		if($_GET['checkdone']) {

			//Code
			
			
			$container = file_get_contents('file_todo.csv');
			$lister =[];
			$newcontainer =[]; //added
			foreach(explode("\n", $container) as $contains) { //string to organized array
				if ($contains) { //To prevent warning: will prevent execution if the $contains is empty.
					[$task_list, $id] = explode(',', $contains);

					if ($id == $_GET['checkdone']) {

						$lister[] = [
							'task_list' => $task_list,
							'id' => $id
					];
					}
				//$newcontainer = explode(',', $contains); //added

				}
				
				//New array for CSVA
				$newcontainer[] = [//added
					'task_list' => $task_list,
					'id' => $id
				];



			}


			file_put_contents('DONE.csv', (implode(',', $lister[0]) . "\n"), FILE_APPEND);
		//	echo $lister[0]['id'];

			importFile();
			deleteById($_GET['checkdone']);
	
		//	var_dump($newcontainer);
		//	var_dump(importFile());


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


	
