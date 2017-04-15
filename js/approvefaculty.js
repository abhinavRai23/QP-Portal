function approve(facId,subId,id){
	 //alert(subId);
	var val =1;
       swal({
              title: "Are you sure want to approve it?",
              // text: "You will not be able to change it!",
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
                // swal("Approved!", "The subject is approved.", 1);
               $.ajax({
                
                   type:"POST",
                   url:"approveFaculty.php",
                  data:'facId='+facId+'&subId='+subId+'&val='+val+'&id='+id,
                   success:function(result){
                          
                        $("#check"+id).html(result);
                        $("#cross"+id).html(" ");
                        $("#status"+id).html("<span style='color:green'>Approved</span>");
                        sendmail(facId, subId,1);
                   }
            });
               //swal("Approved", "Subject Approved", "success");
              } 
              // else {
              //   swal("Cancelled", "Your action is not changed", "info");
              // }
            });
      
}

function disApprove(facId,subId,id){
	var val=2;
       swal({
              title: "Are you sure you want to disapprove it?",
              // text: "You will not be able to change it!",
              type: "warning",
              showCancelButton: true,

              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes",
              cancelButtonText: "No",
              closeOnConfirm: true,
              closeOnCancel: true
            },
            function(isConfirm) {
              if (isConfirm) {
               // swal("Dispproved!", "The subject is now disapproved.", "error");
              $.ajax({
             type:"POST",
             url:"approveFaculty.php",
             data:'facId='+facId+'&subId='+subId+'&val='+val+'&id='+id,
             success:function(result){
              $('#check'+id).html(" ");
                  $("#cross"+id).html(result);
                  $('#check'+id).html(" ");
                  $("#status"+id).html("<span style='color:red'>Not approved</span>");
                  sendmail(facId, subId, 2);
             }

            });
              } 
              // else {
              //   swal("Cancelled", "Your action is not changed", "info");
              // }
            });
      
}

function getfaculties() {
      var branch = document.getElementById('branchlist').value;
      // var semester = document.getElementById('semesterlist').value;

      $.ajax({
       type:"POST",
       url:"setfaculties.php",
       data:'branch='+branch,
       success:function(result){
            $("#facultylist").html(result);
       }

      });     
}

function getsubjects() {
      var branch = document.getElementById('branchlist').value;
      var semester = document.getElementById('semesterlist').value;

      $.ajax({
       type:"POST",
       url:"setsubjects.php",
       data:'branch='+branch+'&semester='+semester,
       success:function(result){
            $("#subjectlist").html(result);
       }

      });     
}
function getbranches(a) {
      var c = document.getElementById('courseId').value;
      
      $.ajax({
       type:"POST",
       url:"../common/getdata.php",
       data:'course='+c+'&t=1&all='+a,
       success:function(result){
            $("#branchlist").html(result);
       }

      });     
}
function getsems() {
      var c = document.getElementById('courseId').value;
      
      $.ajax({
       type:"POST",
       url:"../common/getdata.php",
       data:'course='+c+'&t=2',
       success:function(result){
            $("#semId").html(result);
       }

      });     
}

function sendmail(facId, subId, i) {
  if(i == 1) {
    $.ajax({
      type:"POST",
      url:"approve_mail.php",
      data:"facId="+facId+"&subId="+subId,
      success:function(result) {
        alert('Subject approval Email is sent successfully');
      }
    });
  }
}

  