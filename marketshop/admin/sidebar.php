<?php
include('database.php');
?>


<div class="span3">
    <div class="sidebar" style="position:fixed; width:250px" >


        <ul class="widget widget-menu unstyled">
            <li>
                <a class="collapsed" data-toggle="collapse" href="#togglePages" style="background:#24a0de; color:white;">
                    <i class="menu-icon icon-cog" style="color:white;text-shadow:none;font-weight:bolder"></i>
                    <i class="icon-chevron-down pull-right" ></i><i class="icon-chevron-up pull-right" style="color:white"></i>
                    Manage Dues
                </a>
                <ul id="togglePages" class="collapse unstyled">
                    <li>
                        <a href="pending-dues.php">
                            <i class="icon-tasks"></i>
                            Pending Dues
                            <?php
                            $status = 'Pending';
                            $ret = mysqli_query($con, "SELECT * FROM dues where status='$status'");
                            $num = mysqli_num_rows($ret); { ?><b class="label orange pull-right"><?php echo htmlentities($num); ?></b>
                            <?php } ?>
                        </a>
                    </li>
                    <li >
                        <a href="payment-history.php"  >
                            <i class="icon-inbox"></i>
                            Payment History
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="add-dues.php" style="background:#24a0de;color:white;text-shadow:none">
                    <i class="menu-icon icon-tasks" style="color:white;text-shadow:none;font-weight:bolder"></i>
                    Add Dues
                </a>
            </li>
        </ul>


        <ul class="widget widget-menu unstyled">
            <li><a href="manage-shop.php" style="background:#24a0de;color:white;text-shadow:none"><i class="menu-icon icon-cog" style="color:white;text-shadow:none;font-weight:bolder"></i>Manage Shops</a></li>
            <li><a href="manage-shopkeepers.php" style="background:#24a0de;color:white;text-shadow:none"><i class="menu-icon icon-group" style="color:white;text-shadow:none;font-weight:bolder"></i>Manage Shopkeepers</a></li>
            <li><a href="feedback.php" style="background:#24a0de;color:white;text-shadow:none"><i class="menu-icon icon-group" style="color:white;text-shadow:none;font-weight:bolder"></i>Shop Feedback</a></li>

        </ul>
        <!--/.widget-nav-->

        <ul class="widget widget-menu unstyled">

            <li>
                <a href="logout.php" style="background:mediumblue;color:white;text-shadow:none;font-weight:bolder">
                    <i class="menu-icon icon-signout" style="color:white;text-shadow:none"></i>
                    Logout
                </a>
            </li>
        </ul>

    </div>
    <!--/.sidebar-->
</div>
<!--/.span3-->