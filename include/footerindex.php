</div>      
            </div>
        </div>
      </div>
  </div>      
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<script type="text/javascript" src="js/jquery.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>

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
        $('#subtable').dataTable({
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],iDisplayLength: -1
        });
    });
</script>
<script type="text/javascript">
      var x = window.innerHeight;
      var logo =document.getElementById('container-fluid').clientHeight;
      var nav =document.getElementById('nav').clientHeight;
      var header = document.getElementsByClassName('panel-heading')[0].clientHeight;
      // document.getElementById("panel-body").style.minHeight = x-logo-nav-header+"px";
      finalvalue = x-logo-55-nav-header+"px";
      $('#panel-body').css("min-height", finalvalue);
</script>
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="js/bootbox.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="js/example.js"></script>
  </body>
  <?php $conn = null;?>
</html>