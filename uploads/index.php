<head>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script>
</head>
<body>
    <h1>Question Upload</h1>
    <h3>Questions</h3>
    <form method="POST" action="">
    <p>
    <textarea id="A1Q" name="A1Q" rows="10" cols="80"></textarea>
    </p>
    <h3>answer</h3>
    <p>
    <textarea id="A1A" name="A1A" rows="10" cols="80"></textarea>
    </p>
    <input type="submit" name="submit" value="sumbit">
    </form>
      <script type="text/javascript" src="k.js"></script>
  

</body>
</html>

<?php

$test = "QA1";
$test = str_split($test);
print_r($test);

if(isset($_POST['submit'])){
    $ques = array("A1Q", "A1A", "A2Q", "A2A", "A3Q", "A3A", "A4Q", "A4A", "A5Q", "A5A", "A6Q", "A6A", "A7Q", "A7A", "A8Q", "A8A", "A9Q", "A9A", "A0Q", "A0A", "B1Q", "B1A", "B2Q", "B2A", "B3Q", "B3A", "B4Q", "B4A", "B5Q", "B5A", "C1Q", "C1A", "C2Q", "C2A", "C3Q", "C3A");
    echo count($ques);
    for($i=0;$i<count($ques);$i++){
        $t = $ques[$i];
        $t = str_split($t);
        $sec = $t[0];
        $num = $t[1];
        if($num==0)
            $num=10;
        $type = $t[2];
        echo 'Section:'.$sec.', '.$type.'.'.$num;
        echo '<br>';
        echo $_POST[$ques[$i]];
        echo '<hr>';
    }
}



?>

