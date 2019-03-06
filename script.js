function getStatusBtn(st,id){
  
  if(st=="COMPLETE")
    return '<div class="statuscoltodo"><button class="btnComplete" name="status"'+
        'onClick="updateStatus('+id+',\''+st+'\')">Complete</button></div>';
  else
    return '<div class="statuscoltodo"><button class="btnIncomplete" name="status"'+
        'onClick="updateStatus('+id+',\''+st+'\')">Incomplete</button></div>';
}

function showEditBox(id,st) {
  
  var currentMessage = $("#message_" + id + " .message-content").html();
  var editMarkUp = '<div class="leftcoltodo"><div class="message-content">'+
    '<input type="text" id="txtmessage_'+id+'" value="'+currentMessage+
    '"></div></div>'+getStatusBtn(st,id)+'<div class="middlecoltodo"><button name="ok" onClick="callCrudAction(\'edit\','+id+',\''+st+'\')">Save</button>'+
    '</div><div class="rightcoltodo"><button name="cancel" onClick="cancelEdit(\''+currentMessage+'\','+id+',\''+st+'\',\'\')">Cancel</button></div>';
  $("#message_" + id).html(editMarkUp);
  
}

function cancelEdit(message,id,st) {
  
  var editMarkUp = '<div class="leftcoltodo"><div class="message-content">'+message+
    '</div></div>'+getStatusBtn(st,id)+'<div class="middlecoltodo"><button class="btnEditAction" name="edit" onClick="showEditBox('+id+',\''+st+'\')">Edit</button>'+
    '</div><div class="rightcoltodo"><button class="btnDeleteAction" name="delete" onClick="callCrudAction(\'delete\','+id+',\'\',\'\')">Delete</button></div>';
  $("#message_" + id).html(editMarkUp);
}

function updateStatus(id,st) {
  
  if(st=="COMPLETE") st="INCOMPLETE";
  else st="COMPLETE";
  callCrudAction("stUpdate",id,st,'');
  $("#message_" + id + " .statuscoltodo").html(getStatusBtn(st,id));
  $("#message_" + id + " .middlecoltodo").html('<button class="btnEditAction" name="edit" onClick="showEditBox('+id+',\''+st+'\')">Edit</button>');
}

function callCrudAction(action,id,st,username) {
  $("#loaderIcon").show();
  var queryString;
  switch(action) {
    case "add":
      queryString = 'action='+action+'&username='+username+'&txtmessage='+ $("#txtmessage").val();      
    break;
    case "edit":
      queryString = 'action='+action+'&status='+getStatusBtn(st,id)+'&message_id='+ id + '&txtmessage='+ $("#txtmessage_"+id).val();
    break;
    case "delete":
      queryString = 'action='+action+'&message_id='+ id;
    break;
    case "stUpdate":
      queryString = 'action='+action+'&status='+st+'&message_id='+ id;
    break;
  }  
  jQuery.ajax({
  url: "crud_action.php",
  data:queryString,
  type: "POST",
  success:function(data){
    switch(action) {
      case "add":
        $("#comment-list-box").append(data);
      break;
      case "edit":
        $("#message_" + id ).html(data);
      break;
      case "delete":
        $('#message_'+id).fadeOut();
      break;
      case "stUpdate":
        $("#message_" + id + " .statuscoltodo" ).html(getStatusBtn(st,id));
      break;
    }
    $("#txtmessage").val('');
    $("#loaderIcon").hide();
  },
  error:function (){}
  });
}

/********************* For Note ***********************************/

function showEditBoxNote(id) {
  
  var currentMessage = $("#note_message_" + id + " .message-content-note").html();
  var editMarkUp = '<div class="leftcolnote"><div class="message-content-note">'+
    '<input type="text" id="txtmessageNote_'+id+'" value="'+currentMessage+
    '"></div></div><div class="middlecolnote"><button name="ok" onClick="callCrudActionNote(\'edit\','+id+')">Save</button>'+
    '</div><div class="rightcolnote"><button name="cancelNote" onClick="cancelEditNote(\''+currentMessage+'\','+id+')">Cancel</button></div>';
  $("#note_message_" + id).html(editMarkUp);
  
}

function cancelEditNote(message,id) {
  
  var editMarkUp = '<div class="leftcolnote"><div class="message-content-note">'+message+
    '</div></div><div class="middlecolnote"><button class="btnEditActionNote" name="editNote" onClick="showEditBoxNote('+id+')">Edit</button>'+
    '</div><div class="rightcolnote"><button class="btnDeleteActionNote" name="deleteNote" onClick="callCrudActionNote(\'delete\','+id+',\'\')">Del</button></div>';
  $("#note_message_" + id).html(editMarkUp);
}

function callCrudActionNote(action,id,username) {
  $("#loaderIcon").show();
  var queryString;
  switch(action) {
    case "add":
      queryString = 'action='+action+'&username='+username+'&txtmessageNote='+ $("#txtmessageNote").val();      
    break;
    case "edit":
      queryString = 'action='+action+'&message_id='+ id + '&txtmessageNote='+ $("#txtmessageNote_"+id).val();
    break;
    case "delete":
      queryString = 'action='+action+'&message_id='+ id;      
    break;    
  }  
  jQuery.ajax({
  url: "crud_action_note.php",
  data:queryString,
  type: "POST",
  success:function(data){
    switch(action) {
      case "add":
        $("#comment-list-box-note").append(data);
      break;
      case "edit":
        $("#note_message_" + id ).html(data);
      break;
      case "delete":
        $('#note_message_'+id).fadeOut();
      break;      
    }
    $("#txtmessageNote").val('');
    $("#loaderIcon").hide();
  },
  error:function (){}
  });
}