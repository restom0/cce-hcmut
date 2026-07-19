<?php
//goi trang xu ly phpvao
require_once('xldangky.php');

?>
<!DOCTYPE html>
<html lang="en">

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            <?php
            require_once('menuleft.php');
            ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                <?php
                require_once('header.php');
                ?>
                <!-- end topbar -->
                <!-- content -->
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Add user</h2>
                        </div>

                    </div>
                    <!--noi dung replace-->
                    <form method="post" action="">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputFirstName" name="fn" type="text" placeholder="Enter your first name" />
                                    <label for="inputFirstName">First name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control" id="inputLastName" name="ln" type="text" placeholder="Enter your last name" />
                                    <label for="inputLastName">Last name</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPassword" type="password" name="pws" placeholder="Create a password" />
                                    <label for="inputPassword">Password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPasswordConfirm" type="password" name="repws" placeholder="Confirm password" />
                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Create Account</button></div>
                        </div>
                    </form>
                </div>
                <!-- end content-->
            </div>
        </div>
    </div>

</body>

</html>