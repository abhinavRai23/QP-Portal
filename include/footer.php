</div>      
            </div>
        </div>
      </div>
  </div>      
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<script type="text/javascript" src="../js/jquery.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.js"></script>
<script>
        $(function () {
            Example.init({
                "selector": ".bb-alert"
            });
        });

    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });

  $(document).ready(function() {
        $('.subtable').dataTable({
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
        });
    });
  $(document).ready(function() {
        $('#subtable').dataTable({
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
        });
    });
  function matchpassword() {
    var newp = $('#newp').val();
    var cnfnewp = $('#cnfnewp').val();
    var oldp = $('#oldp').val();

    if(newp != cnfnewp) {
        $('#msgp').html("<span style='color:red'>Confirm Password do not match</span>");
      return false;
    }

    if(oldp == '') {
      $('#msgp').html("<span style='color:red'>Old Password cannot be left empty</span>");
      return false;
    }

  }
  function matchrpassword() {
    var newrp = $('#newrp').val();
    var cnfnewrp = $('#cnfnewrp').val();
    var oldp = $('#oldrp').val();
    if(newrp != cnfnewrp) {
        $('#msgp').html("<span style='color:red'>Confirm Registration Passwords do not match</span>");
      return false;
    }

    if(oldrp == '') {
      $('#msgrp').html("<span style='color:red'>Old Password cannot be left empty</span>");
      return false;
    }

  }

      var x = window.innerHeight;
      var logo =document.getElementById('container-fluid').clientHeight;
      var nav =document.getElementById('nav').clientHeight;
      var header = document.getElementsByClassName('panel-heading')[0].clientHeight;
      // document.getElementById("panel-body").style.minHeight = x-logo-nav-header+"px";
      finalvalue = x-logo-nav-55-header+"px";
      $('#panel-body').css("min-height", finalvalue);
</script>
<script type="text/javascript" src="../js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="../js/approvefaculty.js"></script>
<script type="text/javascript" src="../js/deletefaculty.js"></script>
<script type="text/javascript" src="../js/sweetalert.js"></script>
<script type="text/javascript" src="../js/example.js"></script>
  </body>
  <?php $conn = null;?>
</html>