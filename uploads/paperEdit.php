<?php



include '../include/secure_coord.php';
include '../common/session.php';
include '../common/connectionPDO.php';
include '../common/queries.php';
$obj = new Queries();
if(!isset($_POST['fromId']) && !isset($_POST['edit_save'])){
    die();
}
if(isset($_POST['fromId'])){
    $id2 = $id = $_POST['fromId'];
    if(isset($_POST['toId']))
    $id2 = $_POST['toId'];
    if(isset($_POST['fromId']) && isset($_POST['toId']))
        $p = $obj->get_ques_by_id($conn,$id)->fetch();
    else
        $p = $obj->get_s_ques_by_id($conn,$id)->fetch();
        
    $q = $p['ques'];
    $a = $p['ans'];

echo <<<code
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.css">
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script>
<style>
    .col-sm-11{padding-left:0px;padding-right:0px;}
    a{background-color: rgb(226, 226, 226);}
</style>
</head>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<body>
    <div class="col-sm-11">
        <form action="" method="POST"><br>
        <input type="hidden" name="id" value="$id2">
                <ul class="nav nav-pills">
                                <li class="active"><a href="#rc_editor1" data-toggle="tab" aria-expanded="true">Question</a>
                                </li>
                                <li class=""><a href="#rc_editor2" data-toggle="tab" aria-expanded="false">Answer</a>
                                </li>
                </ul>
                <br>
                <div class="panel tab-content">
                    <div class="tab-pane fade active in" id="rc_editor1">
                        <textarea id="editor1" name="editor1">
                            $q
                        </textarea>
                        </div>
                        <div class="tab-pane fade" id="rc_editor2">
                            <textarea id="editor2" name="editor2">
                                $a
                            </textarea>
                        </div>
            
        </div>
        <input type="submit" class="btn btn-success pull-right" value="Save" name="edit_save">
        </form>
              
    </div>
</body>
</html>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'editor1', {
    filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );

var editor = CKEDITOR.replace( 'editor2', {
    filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );
</script>
code;
	
}


?>


<?php
if(isset($_POST['edit_save'])){
    echo '<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
';
    $id = $_POST['id'];
    $ques = $_POST['editor1'];
    $ans = $_POST['editor2'];
    $run = $conn->prepare("UPDATE question_set SET ques=:ques, ans=:ans WHERE id=:id");
    $run->bindParam(':ques', $ques);
    $run->bindParam(':ans', $ans);
    $run->bindParam(':id', $id);
    
    if($run->execute()){
            echo "<br><br><br><br><br><h4 align='center' style='color:green;'>Question successfully submitted.</h4>";
            $z = "Q_A_".$id;
            echo"<script>$('#$z',parent.document).attr('class','btn btn-success');</script>";
    }
}


?>
