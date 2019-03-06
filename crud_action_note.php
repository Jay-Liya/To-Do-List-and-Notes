<?php
require_once("DBController.php");
$db_handle = new DBController();

$action = $_POST["action"];
if(!empty($action)) {
	switch($action) {
		case "add":
		    $query = "INSERT INTO tp_notes(note,username) VALUES('".$_POST["txtmessageNote"]."','".$_POST["username"]."')";
		    $insert_id = $db_handle->insert($query);
		    if($insert_id){
				
				echo '<div class="rownote" id="note_message_' . $insert_id . '">
					<div class="leftcolnote">
						<div class="message-content-note">' . $_POST["txtmessageNote"] . '</div>
					</div>
					</div>
					<div class="middlecolnote">
						<button class="btnEditActionNote" name="editNote" onClick="showEditBoxNote(' . $insert_id . ')">Edit</button>
					</div>
					<div class="rightcolnote">
						<button class="btnDeleteActionNote" name="deleteNote" onClick="callCrudActionNote(\'delete\',' . $insert_id . ')">Del</button>
					</div></div>';
			}
			break;
			
		case "edit":
			
		    $query = "UPDATE tp_notes set note = '".$_POST["txtmessageNote"]."' WHERE  id=".$_POST["message_id"];
		    $result = $db_handle->execute($query);
			if($result){
				  echo '<div class="leftcolnote"><div class="message-content-note">'.$_POST["txtmessageNote"].
		'</div></div><div class="middlecolnote"><button class="btnEditActionNote" name="editNote" onClick="showEditBoxNote('.$_POST["message_id"].')">Edit</button></div><div class="rightcolnote"><button class="btnDeleteActionNote" name="deleteNote" onClick="callCrudActionNote(\'delete\','.$_POST["message_id"].')">Del</button></div>';
			}
			break;			
		
		case "delete": 
		    if(!empty($_POST["message_id"])) {
		        $query = "DELETE FROM tp_notes WHERE id=".$_POST["message_id"];
		        $result = $db_handle->execute($query);
			}
			break;
	}
}
?>