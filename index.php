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
 
 <!--Task list-->
  <div class="todo-list">
  <ul>
    <li>First task</li>
    <li>Second task</li>
    <li>Third task</li>
  </ul>
  </div>

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
	$container = $_GET["addbox"];
		echo $container;
		echo " made alive by Jesus";
}
