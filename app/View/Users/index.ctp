<?php
echo "<a href='users/add'>ADD</a>";
if($data == NULL){
	echo "DATA EMPTY";
} else{
	echo "<table>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>Name</th>";
	echo "<th>Email</th>";
	echo "<th width='50'>Edit</th>";
	echo "<th width='50'>Delete</th>";
	echo "</tr>";
	foreach($data as $item){
		echo "<tr>";
		echo "<td>".$item['User']['id']."</td>";
		echo "<td>".$item['User']['first_name']."</td>";
		echo "<td>".$item['User']['email']."</td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "</tr>";
	}
	echo "</table>";
}