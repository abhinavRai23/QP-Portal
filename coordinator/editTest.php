<?php
	include '../include/secure_coord.php';
	require ("../include/header.php");


?>	
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit_question_modal" >Q</button>

       <!-- MOdal box -->
        <div class="modal fade" id="edit_question_modal" role="dialog">
                <div class="modal-dialog" style="width:55%;">

                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" id="close_modal_click">&times;</button>
                            <h4 class="modal-title" style="color:rgb(126, 126, 126);">Edit </h4>
                        </div>
                        <div class="modal-body" style="min-height:475px;padding:0px;">
                            <iframe name="my_iframe" frameborder="0" width="99%" style="position: absolute; height: 100%;"></iframe>
                        </div>
                    </div>

                </div>
        </div>
<form name="edit_id" action="../uploads/editQuestion.php" method="post" target="my_iframe">
  <input type="hidden" name="ques_id" id="ques_id" value="3">
</form>
<form name="edit_id2" action="../uploads/editQuestion.php" method="post" target="my_iframe">
  <input type="hidden" name="ques_id" id="ques_id" value="71">
</form>

<!-- when the form is submitted, the server response will appear in this iframe -->
<div class="form-group" style="margin-bottom:0px;">
                                <textarea name="keyQ" id="keyQ" rows="10" cols="50">
                                    answer
                                </textarea>
                            </div>
                            <button class="btn" id="edit_btn_id">Edit</button>
                            <div id="question">faseffsf</div>
                            <div id="answer">fesfffzsd</div>
<div id="testdiv">fdgngfn</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#edit_btn_id").click(function(){
            $(document.edit_id).submit();
            $('#edit_question_modal').modal('show');  
        });
    });

</script>
<?php
	require ("../include/footer.php");
?>