<?php require('_login.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">

<title>To Do List and Notes</title>
</head>

<body>
<?php if(isset($_COOKIE['username'])) { 
	require_once("DBController.php");
	$db_handle = new DBController();	
?>
<div class="titlel">ToDo</div>
<div class="titler">Notes</div>
<div class="rowMain">
	<div class="columnr" style="background-color:#BCBCC0;">
		<div class="tabletodo">
			<div  class="rowtodo" >
				<div class="leftcol">
					<input type="text" id="txtmessageNote" >
					<button id="btnAddActionNote" name="submitNote" onClick="callCrudActionNote('add','','<?php echo $_COOKIE['username'];?>')">Create</button>
				</div>
			</div>
		</div>
		<div id="comment-list-box-note" class="tablenote">
			<?php
			$notes = $db_handle->runQuery("SELECT * FROM tp_notes where username='".$_COOKIE['username']."'");
			if(!empty($notes)) {
				foreach($notes as $k=>$v) {
				?>
				<div class="rownote" id="note_message_<?php echo $notes[$k]["id"];?>">
					<div class="leftcolnote">
						<div class="message-content-note"><?php echo $notes[$k]["note"]; ?></div>
					</div> 					
					<div class="middlecolnote">
						<button class="btnEditActionNote" name="editNote" onClick="showEditBoxNote(<?php echo $notes[$k]["id"]; ?>)">Edit</button>
					</div>
					<div class="rightcolnote">
						<button class="btnDeleteActionNote" name="deleteNote" onClick="callCrudActionNote('delete',<?php echo $notes[$k]["id"]; ?>)">Del</button>
					</div>

				</div>
				<?php
				}
			} ?>
		</div>
	</div>	
	<div class="column" style="background-color:#3E2AF5;">
		<div class="tabletodo">
			<div id="frmAdd" class="rowtodo" >
				<div class="leftcol">
					<input type="text" id="txtmessage" >
					<button id="btnAddAction" name="submit" onClick="callCrudAction('add','','','<?php echo $_COOKIE['username'];?>')">Create</button>
				</div>    
			</div>
		<div >
		<div id="comment-list-box" class="tabletodo">
			<?php
			$tasks = $db_handle->runQuery("SELECT * FROM tp_todo where username='".$_COOKIE['username']."'");
			if(!empty($tasks)) {
				foreach($tasks as $k=>$v) {
				?>
				<div class="rowtodo" id="message_<?php echo $tasks[$k]["id"];?>">
					<div class="leftcoltodo">
						<div class="message-content"><?php echo $tasks[$k]["task"]; ?></div>
					</div>  	
					<div class="statuscoltodo">
						<?php if($tasks[$k]["status"]=="COMPLETE")
								echo '<button class="btnComplete" name="status" onClick="updateStatus('.$tasks[$k]["id"].',\''.$tasks[$k]["status"].'\')">Complete</button>';
							  else echo '<button class="btnIncomplete" name="status" onClick="updateStatus('.$tasks[$k]["id"].',\''.$tasks[$k]["status"].'\')">Incomplete</button>';
						?>
					</div>
					<div class="middlecoltodo">
						<button class="btnEditAction" name="edit" onClick="showEditBox(<?php echo $tasks[$k]["id"]; ?>,'<?php echo $tasks[$k]["status"]; ?>')">Edit</button>
					</div>
					<div class="rightcoltodo">
						<button class="btnDeleteAction" name="delete" onClick="callCrudAction('delete',<?php echo $tasks[$k]["id"]; ?>,'')">Delete</button>
					</div>

				</div>
				<?php
				}
			} ?>
			
		</div>	
	</div>
</div>	

<?php } ?>

	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script src="script.js"></script>
<img src="LoaderIcon.gif" id="loaderIcon" style="display:none" />	
<footer><a href="logout.php">Logout</a></footer>
</body>
</html>
