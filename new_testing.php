<?php
	error_reporting(E_ALL);
    require ("include/header.php");
?>	
<style>
.checkbox-inline, .radio-inline {
	padding-left: 10%;
}
textarea{
	margin:2%;
}
</style>
<div class="panel-heading" align="center">
              Question Upload<br><br>
              <em>(Subject Name, Subject Code)</em>
</div>
<div class="panel-body" id="panel-body">
	<div class="col-md-9">
		<div class="panel panel-default" style="font-size:12px">
				<div class="panel-heading">
		              Section:-
				</div>
				<div class="form-group" style="">
                    <label class="radio-inline">
                        <input type="radio" name="sec" id="sec1" value="option1">A
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sec" id="sec2" value="option2">B
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sec" id="sec3" value="option3">C
                    </label>
                </div>
                <div class="panel-heading" style="font-size:14px;">
		              Upload type:-
				</div>
				<div class="form-group" style="">
                    <label class="radio-inline">
                        <input type="radio" name="upload" id="upload1" value="option1">Section wise
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="upload" id="upload2" value="option2">Question wise
                    </label>
                </div>
                <br><br><br>
                <div class="panel-heading" style="font-size:14px;">
		              Question 1
				</div>
				<div class="form-group" style="">
                    <textarea name="editor1" id="editor1" rows="10" cols="50">
               			Enter something
            		</textarea>
                </div>
                <div class="panel-heading" style="font-size:14px;">
		              Question 2
				</div>
				<div class="form-group" style="">
                    <textarea name="editor2" id="editor1" rows="10" cols="50">
               			Enter something
            		</textarea>
                </div>
                <script>
                    CKEDITOR.replace( 'editor1' );
                    CKEDITOR.replace( 'editor2' );
      		    </script>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default">
                        <div class="panel-heading">
                            Section A
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>B</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>C</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>B</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>C</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>B</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>C</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>C</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
	</div>
</div>	

<?php
	// require ("include/footer.php");
	// $conn=null;
?>

