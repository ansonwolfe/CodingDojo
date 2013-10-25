<?php
	
	$users = array(array(["first_name" => "Michael", "last_name" => "Choi", "nick_name" => "Sensei"]),
					(array(["first_name" => "Toni", "last_name" => "Choi", "nick_name" => "Sensei"]),
					(array(["first_name" => "Derek", "last_name" => "Choi", "nick_name" => "Sensei"]),
					(array(["first_name" => "Emily", "last_name" => "Choi", "nick_name" => "Sensei"]),
					(array(["first_name" => "Kim", "last_name" => "Choi", "nick_name" => "Sensei"]));


	class HTML_Helper {		

		function print_table() {
			echo "<table>
					<thead>
						<tr>
							<td>"
		}


	}
?>

<<?php

$users = array(
    ["first_name" => "Michael", "last_name" => "Choi", "nick_name" => "Sensei"],
    ["first_name" => "Emily", "last_name" => "Burnett", "nick_name" => "Dictator"],
    ["first_name" => "Derek", "last_name" => "Tor", "nick_name" => "IKEA"],
    ["first_name" => "Toni", "last_name" => "Chau", "nick_name" => "Lucy"],
    ["first_name" => "Bonnie", "last_name" => "Lai", "nick_name" => "Bon"]
        );

$states = array("CA", "WA", "UT", "TX", "AZ", "NY");

class HTML_Helper{

var $first_name;
var $last_name;
var $nickname;

    function print_table(){
        global $users;
        echo "<table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Nickname</th>
                    </tr>   
                </thead>
            <tbody>
                ";
                foreach ($users as $user)
                {
                    echo "<tr>";
                    echo "<td>" . $user['first_name']. "</td>"; 
                    echo "<td>" . $user['last_name']. "</td>"; 
                    echo "<td>" . $user['nick_name']. "</td>"; 
                    echo "</tr>";
                }
            echo "</tbody></table>";
    }

    function print_select(){
        global $states;
        echo "<select>";
            foreach($states as $state)
            {
                echo "<option value='state'>". $state. "</option>";
            }
            echo "</select>";
    }
}

$table = new HTML_Helper;
// make the class NOW that has the same properties of HTML_Helper
$table -> print_table($users);
// you want this object to use function(print_table) in this class

$print = new HTML_Helper;
$print -> print_select($states);


?>
