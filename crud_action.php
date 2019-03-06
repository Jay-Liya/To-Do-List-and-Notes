<?php
require_once("DBController.php");
$db_handle = new DBController();

$action = $_POST["action"];
if(!empty($action)) {
	switch($action) {
		case "add":
		    $query = "INSERT INTO tp_todo(task,username) VALUES('".$_POST["txtmessage"]."','".$_POST["username"]."')";
		    $insert_id = $db_handle->insert($query);
		    if($insert_id){
				
				echo '<div class="rowtodo" id="message_' . $insert_id . '">
					<div class="leftcoltodo">
						<div class="message-content">' . $_POST["txtmessage"] . '</div>
					</div>
					<div class="statuscoltodo">
						<button class="btnIncomplete" name="status" onClick="updateStatus(' . $insert_id . ',\'INCOMPLETE\')">Incomplete</button>
					</div>
					<div class="middlecoltodo">
						<button class="btnEditAction" name="edit" onClick="showEditBox(' . $insert_id . ',\'INCOMPLETE\')">Edit</button>
					</div>
					<div class="rightcoltodo">
						<button class="btnDeleteAction" name="delete" onClick="callCrudAction(\'delete\',' . $insert_id . ')">Delete</button>
					</div></div>';
			}
			break;
			
		case "edit":
			
		    $query = "UPDATE tp_todo set task = '".$_POST["txtmessage"]."' WHERE  id=".$_POST["message_id"];
		    $result = $db_handle->execute($query);
			if($result){
				  echo '<div class="leftcoltodo"><div class="message-content">'.$_POST["txtmessage"].
		'</div></div>'.$_POST["status"].'<div class="middlecoltodo"><button class="btnEditAction" name="edit" onClick="showEditBox('.$_POST["message_id"].')">Edit</button></div><div class="rightcoltodo"><button class="btnDeleteAction" name="delete" onClick="callCrudAction(\'delete\','.$_POST["message_id"].')">Delete</button></div>';
			}
			break;			
		
		case "delete": 
		    if(!empty($_POST["message_id"])) {
		        $query = "DELETE FROM tp_todo WHERE id=".$_POST["message_id"];
		        $result = $db_handle->execute($query);
			}
			break;
			
		case "stUpdate":
			
		    $query = "UPDATE tp_todo set status = '".$_POST["status"]."' WHERE  id=".$_POST["message_id"];
		    $result = $db_handle->execute($query);
			if($result){
				  echo 'Success';
			}
			break;
	}
}
?>