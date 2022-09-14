 <div class="dashboard_log">
                    <?php
                            $sql_get="SELECT * FROM message WHERE user_id='".$_SESSION['id']."' AND status='0' ";
                            $result= $connection->query($sql_get);
                            $row = mysqli_num_rows($result)

                        ?>
                                <div class="d-flex align-items-center">
                                    <a href="read.php"><span><i class="fa fa-envelope me-4 text-success"> <?php echo $row; ?> Message</i></span></a>

                                    <div class="profile_log dropdown">
                                        <div class="user" data-toggle="dropdown">
                                            <span class="thumb"><i class="mdi mdi-account"></i></span>
                                            <span class="name"><?php echo $_SESSION['name']; ?></span>
                                            <span class="arrow"><i class="la la-angle-down"></i></span>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="accounts" class="dropdown-item">
                                                <i class="mdi mdi-account"></i> Account
                                            </a>
                                            <a href="history" class="dropdown-item">
                                                <i class="la la-book"></i> History
                                            </a>
                                            <a href="settings" class="dropdown-item">
                                                <i class="la la-cog"></i> Setting
                                            </a>
                                            <a href="logout" class="dropdown-item">
                                                <i class="la la-lock"></i> Logout
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>