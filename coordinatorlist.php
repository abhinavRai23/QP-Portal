<?php require 'include/headerindex.php';?>
<style>
.checkbox-inline, .radio-inline {
    padding-left: 10%;
}
textarea{
    margin:2%;
}
.s_no{
    padding-top: 15px !important;
}
.btn{
    padding:3px 12px;
}
th{
    vertical-align: middle !important;
}
thead{
    background-color: #f2f2f2; 
}
</style>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%;">
List of Branch Coordinators Approved By The University
</div>


<div class="panel-body" id="panel-body" style="font-size:13px;">
	<!--<div class="table-responsive">
    	<table class="table table-striped">
        	<thead>
                <tr class="grid_head">
                    <th width="5%">S.No.</th>
                    <th>Branches to Coordinate for questioner</th>
                    <th>Name of Coordinator</th>
                    <th>Designation</th>
                    <th>Institute</th>
                    <th>Email-id</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>1.</td>
                <td>Computer Science &amp; Information Technology, MCA</td>
                <td>Dr. R. Sundaresan</td>
                <td>Director</td>
                <td>Galgotia College Gr. Noida</td>
                <td> r.sundaresan@galgotiacollege.edu<br>director@galgotiacollege.edu</td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Civil/Environment Engineering</td>
                <td>Dr. J. Girish</td>
                <td>Director</td>
                <td>KIET Ghaziabad</td>
                <td>j.girish@kiet.edu</td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Electrical Engineering and Electrical and Electronics Engineering</td>
                <td>Dr. B.K.Chauhan/Dr.Surendra Kumar</td>
                <td>Director</td>
                <td>ABES Ghaziabad</td>
                <td>director@abesit.in</td>
            </tr>
            <tr>
                <td>4.</td>
                <td>Electronics/Electronics &amp; Instruments Engineering</td>
                <td>Dr. R.K. Agarwal</td>
                <td>Director</td>
                <td>AKGEC Ghaziabad</td>
                <td>directorakg@akgec.org</td>
            </tr>
            <tr>
                <td>5.</td>
                <td>Mechanical Engineering and related branches</td>
                <td>Dr. K Kamal<br>Dr. Rajesha</td>
                <td>Principal</td>
                <td>JSSATE Noida</td>
                <td>principal@jssaten.ac.in</td>
            </tr>
	     <tr>
                <td>6.</td>
                <td>Fashion Technology</td>
                <td>Dr. Mridula Sharma</td>
                <td>Director</td>
                <td>FMG Institute Gr. Noida</td>
                <td>director@fmginstitute.edu.in</td>
            </tr>
	    <tr>
                <td>7.</td>
                <td>MBA</td>
                <td>Dr. R.K. Singhal</td>
                <td>Professor</td>
                <td>ABES Ghaziabad</td>
                <td>assodean.fm@uptu.ac.in</td>
            </tr>
	    <tr>
                <td>8.</td>
                <td>Chemical Engineering and Food Technology</td>
                <td>Prof. R.P. Singh</td>
                <td>Ex-director</td>
                <td>HBTI Kanpur</td>
                <td>rpshbti@rediffmail.com</td>
            </tr>
	    <tr>
                <td>9.</td>
                <td>Pharmacy</td>
                <td>Dr. Amresh Gupta</td>
                <td>Director</td>
                <td>Goel Institute of Pharmacy, Lko</td>
                <td>assodean.fp@uptu.ac.in</td>
            </tr>
	    <tr>
                <td>10.</td>
                <td>Biotechnology Engineering</td>
                <td>Dr. A.S. Vidyarthi</td>
                <td>Director</td>
                <td>IET Lko</td>
                <td>a.s.vidyarthi@gmail.com<br>director@ietlucknow.edu</td>
            </tr>
	    <tr>
                <td>11.</td>
                <td>Architecture</td>
                <td>Prof. Vandana Sehgal</td>
                <td>Associate Professor</td>
                <td>Faculty of Arch. Dr.APJAKTU</td>
                <td>assodean.fappd@uptu.ac.in</td>
            </tr>
	     <tr>
                <td>12.</td>
                <td>Textile Technology</td>
                <td>Prof. Alok Shakyawar</td>
                <td>Director</td>
                <td>UPTTI Kanpur</td>
                <td>dbshakya_67@yahoo.co.in<br>dbshakya_67@gmail.com</td>
            </tr>
	     <tr>
                <td>13.</td>
                <td>Agriculture Engineering</td>
                <td>Dr. Rajmani Maurya</td>
                <td>Associate Professor</td>
                <td>ND University Faizabad</td>
                <td>Dr.rajmanimaurya@gmail.com</td>
            </tr>
	     <tr>
                <td>14.</td>
                <td>Carpet Technology</td>
                <td>Prof. K K Goswami</td>
                <td>Director</td>
                <td>IICT Bhadohi</td>
                <td>dr_kk_goswami@rediffmail.com</td>
        </tr>
	     <tr>
                <td>15.</td>
                <td>Hotel Management</td>
                <td>Prof. Sanjay Singh</td>
				<td>HOD Hotel Management</td>
                <td>BBDNITM Lko</td>
                <td>bbdbhm@gmail.com</td>
         </tr>
	    <tr>
                <td>16.</td>
                <td>Applied Sciences</td>
                <td>Dr. Alok Mishra</td>
                <td>Director</td>
                <td>AITM, Lko</td>
                <td>dralokmishra12@gmail.com</td>
        </tr>
            </tbody>
        </table>
</div>-->
<div class="table-responsive">
        <table class='table table-striped table-bordered table-hover' id='subtable'>
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Name</th>
                    <th>Institute</th>
                    <th>Branches</th>
                    <th>Email ID</th>
                </tr>
            </thead>

            <?php
                
                $count = 0;
                $headlist = $obj->get_Coord($conn);
                while($row = $headlist->fetch()) {
                    $count++;
                    $class = ($count%2)?'even':'odd';
                    $name = $row['name'];
                    $collegeName = $obj->get_college_name($conn,$row['collegeId']);
                    $emailId = $row['email'];
                    $ass_branches = $obj->get_assigned_branches_by_id($conn,$row['id'])->fetchAll(PDO::FETCH_COLUMN);

                    $txtBranch = '';
                    foreach ($ass_branches as $branch) {
                        $txtBranch .= $branch.', ';
                    }
                    $txtBranch = substr($txtBranch, 0,strlen($txtBranch)-2);

                    echo "<tr class='$class'>";
                    echo "<td>".$count."</td>";
                    echo "<td>".$name."</td>";
                    echo "<td>".$collegeName." ($row[collegeId])</td>";
                    echo "<td>".((strlen($txtBranch)!=0)?$txtBranch:'No Branches Alloted')."</td>";
                    echo "<td>".$emailId."</td>";
                   echo "</tr>";
                }
            ?>
        </table>
    </div>


</div>      
<?php require 'include/footerindex.php';?>