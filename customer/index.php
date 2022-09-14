<?php include('includes/header.php'); ?>

    <div id="main-wrapper">

        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <nav class="navbar">

                           <?php include('includes/mobilelogo.php'); ?>

                           <?php include('includes/profilenav.php'); ?>

                           <?php include('includes/sidebar.php'); ?>

                           <?php include('includes/sidebarfooter.php'); ?>

                           <?php include('includes/greetings.php'); ?>


        <div class="content-body">
            <div class="container">

    <div class="wpb_raw_code wpb_raw_js" >
        <div class="wpb_wrapper">
            <iframe src="https://fxpricing.com/fx-widget/ticker-tape-widget.php?id=1,2,3,5,14,20&d_mode=compact-name" width="100%" height="85" style="border: unset;"></iframe>
        </div>
    </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="widget-card">
                        <?php 

                            $query = "SELECT * FROM users WHERE id ='".$_SESSION['id']. "'";
                            $result = $connection->query($query);

                            if (mysqli_num_rows($result) > 0) 
                            {
                            while ($row = mysqli_fetch_assoc($result)) 
                            {
                                        
                        ?>
                                    <div class="widget-title">
                                        <h5>Offshore Account No.</h5>
                                        <p><span><i class="fa fa-bank"></i></span></p>
                                    </div>
                                    <div class="widget-info">
                                        <h3 class="text-primary"><?php echo $row['account_no']; ?></h3>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <?php 

                        }
                    }else
                        {
                        echo "No Record Found";
                        }
                      ?>

                        <?php
                            $query = "SELECT SUM(amount) AS count FROM debits WHERE user_id = '".$_SESSION['name']."'";
                            $result= $connection->query($query);

                            $record = $result->fetch_array();
                            $total = $record['count'];

                        ?>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="widget-card">
                                    <div class="widget-title">
                                        <h5>Expenses</h5>
                                       <p><span><i class="fa fa-money"></i></span></p>
                                    </div>
                                    <div class="widget-info">
                                        <h3 class="text-danger">$<?php echo $total; ?> <?php {echo ".00";}   ?></h3>
                                        <p>USD</p>
                                    </div>
                                </div>
                            </div>
                             <?php 

                           $query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."' ";
                           $result = $connection->query($query);

                           
                            ?>

                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="widget-card">
                                     <?php
                                        if (mysqli_num_rows($result) > 0) 
                                            {
                                                while ($row = mysqli_fetch_assoc($result)) 
                                            {
                                    ?>
                                    <div class="widget-title">
                                        <h5>Offshore Business</h5>
                                        <p><span><i class="fa fa-diamond"></i></span></p>
                                    </div>
                                    <div class="widget-info">
                                        <h3 class="text-dark">$<?php echo $row['checking_balance']; ?> <?php {echo ".00";}   ?></h3>
                                        <p>USD</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="widget-card">
                                    <div class="widget-title">
                                        <h5>Offshore Personal</h5>
                                        <p><span><i class="fa fa-ravelry"></i></span></p>
                                    </div>
                                    <div class="widget-info">
                                        <h3 class="text-dark">$<?php echo $row['savings_balance']; ?> <?php {echo ".00";}   ?></h3>
                                        <p>USD</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <?php 

                                  }
                              }

                              else
                              {
                                echo "Your account Balance is Empty";
                              }

                          ?>


                        <div class="col-xl-12 col-lg-12 col-xxl-12">
                                <div class="row">
                                    <div class="col-xl-4">
        <?php
            $query = "SELECT SUM(amount) AS count FROM debits WHERE user_id = '".$_SESSION['name']."' AND status='0' ORDER BY id ";
            $result= $connection->query($query);

            $record = $result->fetch_array();
            $total = $record['count'];

          ?>
                                        <div class="widget-card">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="widget-stat">
                                                    <div class="coin-title">
                                                        <span><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></span>
                                                        <h5 class="d-inline-block ms-2 mb-3">Pending Transaction
                                                            <span>(24h)MAX</span>
                                                        </h5>
                                                    </div>
                                                    <h4>USD <?php echo $total; ?> <?php {echo ".00";}   ?><span class="badge bg-warning ms-2">
                                                            Pending</span>
                                                    </h4>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="widget-card">
                    <?php 

                         $query = "SELECT SUM(savings_balance) AS count FROM users WHERE id ='".$_SESSION['id']. "'";
                         $result= $connection->query($query);

                         $record = $result->fetch_array();
                         $credit = $record['count'];
                                               


                        $query = "SELECT SUM(checking_balance) AS count FROM users WHERE id ='".$_SESSION['id']. "'";
                        $result= $connection->query($query);

                        $record = $result->fetch_array();
                        $total = $record['count'];

                        $actual =  $credit + $total;
                ?>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="widget-stat">
                                                    <div class="coin-title">
                                                        <span><i class="fa fa-exchange"></i></span>
                                                        <h5 class="d-inline-block ms-2 mb-3">Total Balance
                                                            <span>(B/P)</span>
                                                        </h5>
                                                    </div>
                                                    <h4>USD <?php echo $actual; ?> <span class="badge bg-success ms-2">
                                                            +0.1%</span>
                                                    </h4>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="widget-card">
                                            <?php
                                              $query= "SELECT * FROM kycdoc WHERE user_id='".$_SESSION['id']."' AND status = '1' ";
                                              $result = mysqli_query($connection, $query);
                                              $row = mysqli_fetch_assoc($result);
                                            ?>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="widget-stat">
                                                    <div class="coin-title">
                                                        <span><i class="fa fa-handshake-o"></i></span>
                                                        <h5 class="d-inline-block ms-2 mb-3">KYC Verification
                                                            <span> 
                                                            <?php
                                                                
                                                                if ($row)
                                                                {
                                                                  echo "<b class='text-success'>VERIFIED</b>";
                                                                }else
                                                                {
                                                                  echo "<b class='text-warning'> Pending</b>";
                                                                }
                                                              ?>        
                                                          </span>
                                                        </h5>
                                                    </div>
                                                    <h4>
                                                        <?php
                                                            
                                                             if ($row)
                                                            {
                                                                echo "<span class='badge bg-success ms-2'>VERIFIED</span>";
                                                            }else
                                                            {
                                                            echo "<span class='badge bg-danger ms-2'>Not Verified</span>";
                                                            }
                                                        ?>      
                                                       
                                                    </h4>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="row">

                            <div class="col-xl-12 col-lg-12 col-xxl-12">
                                <div class="card profile_chart transparent">
                                 
                                    <div class="card-header">
                                        <div class="chart_current_data">
                                            <h3>Total Inv <span>2021</span></h3>
                                            <p class="text-success">148,903,839,281 <span>USD (+25%)</span></p>
                                        </div>
                                        <div class="duration-option">
                                            <a id="all" class="active">ALL</a>
                                            <a id="one_month" class="">1M</a>
                                            <a id="six_months">6M</a>
                                            <a id="one_year" class="">1Y</a>
                                            <a id="ytd" class="">YTD</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="timeline-chart"></div>
                                        <div class="chart-content text-center">
                                            <div class="row">
                                                <div class="col-xl-4 col-sm-6 col-6">
                                                    <div class="chart-stat">
                                                        <p class="mb-1">Per 24hr Volume</p>
                                                        <strong>$1236548.325</strong>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6 col-6">
                                                    <div class="chart-stat">
                                                        <p class="mb-1">Market Cap</p>
                                                        <strong>19B USD</strong>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6 col-6">
                                                    <div class="chart-stat">
                                                        <p class="mb-1">Circulating</p>
                                                        <strong>29.4M USD</strong>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6 col-6">
                                                    <div class="chart-stat">
                                                        <p class="mb-1">All Time High</p>
                                                        <strong>19.783.06 USD</strong>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6 col-6">
                                                    <div class="chart-stat">
                                                        <p class="mb-1">Typical hold </p>
                                                        <strong>88 days</strong>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6 col-6">
                                                    <div class="chart-stat">
                                                        <p class="mb-1">Trading activity </p>
                                                        <strong>70% buy </strong>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-xl-4 col-sm-6 col-6">
                                                    <div class="chart-stat">
                                                        <p class="mb-1">Popularity </p>
                                                        <strong>#1 most held </strong>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6 col-6">
                                                    <div class="chart-stat">
                                                        <p class="mb-1">Popularity </p>
                                                        <strong>#1 most held </strong>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>




    <?php include('includes/mainfooter.php'); ?>
