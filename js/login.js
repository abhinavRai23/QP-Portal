function logf() {
	bootbox.dialog({
                title: "Login",
                message: '<div class="row"><div class="col-md-12 "><form role="form" method="POST"><fieldset><div class="form-group"><input class="form-control" placeholder="Email" name="user" id="user" type="text" autofocus=""></div><div class="form-group"><input class="form-control" id="pass" placeholder="Password" name="password" type="password" value=""></div><a data-dismiss="modal" data-toggle="modal" data-target="#myModal">*Forgot Password</a></fieldset></form></div></div>',
                // message: '<frame src="facultylogin.php"></frame>',
                size: 'small',
                buttons: {
                    success: {
                        label: "Login",
                        className: "btn-success",
                        callback: function () {
                            var user = $('#user').val();
                            var password = $('#pass').val();
                            $.ajax({
                                url: 'facultylogin.php',
                                type: 'POST',
                                data: 'user='+user+'&password='+password,
                                success: function(result) {
                                    // alert(result);
                                    window.location = "home.php";
                                    // alert(result+"/"+password);

                                }
                            });
                        }
                    }
                }
            }
        );
}

function logc() {
    bootbox.dialog({
                title: "Login",
                message: '<div class="row"><div class="col-md-12 "><form role="form" method="POST"><fieldset><div class="form-group"><input class="form-control" placeholder="Email" name="user" id="user" type="text" autofocus=""></div><div class="form-group"><input class="form-control" id="pass" placeholder="Password" name="password" type="password" value=""></div><a data-dismiss="modal" data-toggle="modal" data-target="#myModal">*Forgot Password</a></fieldset></form></div></div>',
                // message: '<frame src="facultylogin.php"></frame>',
                size: 'small',
                buttons: {
                    success: {
                        label: "Login",
                        className: "btn-success",
                        callback: function () {
                            var user = $('#user').val();
                            var password = $('#pass').val();
                            $.ajax({
                                url: 'collegelogin.php',
                                type: 'POST',
                                data: 'user='+user+'&password='+password,
                                success: function(result) {
                                    // alert(result);
                                    window.location = "home.php";
                                    // alert(result+"/"+password);
                                }
                            });
                        }
                    }
                }
            }
        );
}