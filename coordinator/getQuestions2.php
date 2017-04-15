  <?php
echo '<div class="panel">
                	<div class="panel-heading">
                		Abhinav Rai(AKGEC) Operating System
                		<div class="counter" style="float:right;">No of Question Selected-<a class="" href="#">123</a></div>
                	</div>
                        <!-- /.panel-heading -->
                         	<div class="dataTable_wrapper">
	                            <table class="display" >
                                    <thead>
                                        <tr>
                                            <th style="visibility:hidden">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
								        <tr>
								          <td>
								          	<div class="main">
							                    <div class="panel panel-default">
							                        <div class="panel-heading" style="font-size: 14px;font-weight: 100;">
							                            <span>Question:</span>Katappa ne Bahubali ko kyu mara???
							                        </div>
							                        <div class="panel-body" style="font-size:12px">
							                            <p><span>Answer:</span> Two main point:-
							                            1).Movie Hit karane ke liye.
							                            2).Second Part me kya dikhate.</p>
							                        </div>
							                    </div> 
							                    <div class="pull-right pull-right-new">
								                    	<button class="btn btn-primary" id="S3" onclick="undoCreateQuesBank()">Deselect</button>
								                    	&nbsp;
								                    	<button class="btn btn-danger" id="D3" onclick="deleteQuesBank()">Delete</button>
							   				 	</div>   
							                </div>

								          </td>
								        </tr>
								        <tr>
								          <td>
								          	<div class="main">
							                    <div class="panel panel-default">
							                        <div class="panel-heading" style="font-size: 14px;font-weight: 100;">
							                            <span>Question:</span>Katappa ne Bahubali ko kyu mara???
							                        </div>
							                        <div class="panel-body" style="font-size:12px">
							                            <p><span>Answer:</span> Two main point:-
							                            1).Movie Hit karane ke liye.
							                            2).Second Part me kya dikhate.</p>
							                        </div>
							                    </div> 
							                    <div class="pull-right">
								                    	<button class="btn btn-primary" id="S3" onclick="undoCreateQuesBank()">Deselect</button>
								                    	&nbsp;
								                    	<button class="btn btn-danger" id="D3" onclick="deleteQuesBank()">Delete</button>
							   				 	</div>   
							                </div>
								          </td>
								        </tr>							        
								      </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <!--
                           
                        
                        <!- /.panel-body -->
                </div>';

?>
<script>
$(document).ready(function() {
    $('table.display').DataTable();
} );

</script>
