function deleteme(facId,subId,val) {
	swal({
              title: "Are you sure want to delete it?",
              text: "You will not be able to change it!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#5cb85c",
              cancelButtonColor: "#f0f0f0",
              // confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes",
              cancelButtonText: "No",
              closeOnConfirm: true,
              closeOnCancel: true
            },
            function(isConfirm) {
              if (isConfirm) {
                swal("", "The subject is now deleted.", "error");
               $.ajax({  
			type:"POST",
			url:"deletefaculty.php",
			data:'facId='+facId+'&subId='+subId,
			success:function(result){
				$('#delete'+val).html("Deleted");
			}

		});
               // swal("Approved", "Subject Approved", "success");
              } else {
                swal("","Subject is not deleted", "success");
              }
            });
}

function deletehead(collegeId) {
  if(confirm("Are you sure you want to delete the College Head ")) {
    $.ajax({  
      type:"POST",
      url:"deletehead.php",
      data:'collegeId='+collegeId,
      success:function(result){
        window.location = "../examcontroller/view_collegeheads.php";
      }

    });
  } 
}

function deletecoord(userId) {
  if(confirm("Are you sure you want to delete the Branch Coordinator")) {
    $.ajax({  
      type:"POST",
      url:"deletecoord.php",
      data:'userId='+userId,
      success:function(result){
        window.location = "../examcontroller/view_coord.php";
      }

    });
  } 
}

function deletebranch(cid, bid, i) {
  if(confirm("Are you sure you want to delete the Branch ")) {
    $.ajax({  
      type:"POST",
      url:"deletebranch.php",
      data:'cid='+cid+'&bid='+bid,
      success:function(result){
        // window.location = "../examcontroller/allot_coord.php";
        $('#delete'+i).html("Deleted");
      }
    });
  } 
}

function deletesubject(bid, sid, i) {
  v = 0;
  if(confirm("Are you sure you want to delete the Subject ")) {
    $.ajax({  
      type:"POST",
      url:"deletesubject.php",
      data:'sid='+sid+'&bid='+bid+'&v='+v+'&i='+i,
      success:function(result){
        // window.location = "../examcontroller/allot_coord.php";
        $('#delete'+i).html(result);
        $('#active'+i).html("<span style='color:red'>Subject Deleted</span>");
      }
    });
  } 
}

function undeletesubject(bid, sid, i) {
  v = 1;
  if(confirm("Are you sure you want to reactivate the Subject ")) {
    $.ajax({  
      type:"POST",
      url:"deletesubject.php",
      data:'sid='+sid+'&bid='+bid+'&v='+v+'&i='+i,
      success:function(result){
        // window.location = "../examcontroller/allot_coord.php";
        $('#delete'+i).html(result);
        $('#active'+i).html("<span style='color:rgba(119,6,165,0.75)'>Subject is Active </span>");
      }
    });
  } 
}