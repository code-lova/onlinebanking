
  <body>
    <div id="db-wrapper">
      <!-- navbar vertical -->
       <!-- Sidebar -->
 <nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <!-- Brand logo -->
        <a class="navbar-brand" href="dashboard">
            <img src="assets/images/brand/logo/logo.svg" alt="" />

        </a>
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link has-arrow  active " href="dashboard">
                    <img src="assets/images/01.png" alt="admin" width="50px"> 
                   <?php echo $_SESSION['name']; ?>
                </a>

            </li>

        
        

         <!-- Nav item -->
         <li class="nav-item">
            <div class="navbar-heading">Control Panel</div>
        </li>

<!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link has-arrow  active " href="dashboard">
                    <i data-feather="home" class="nav-icon icon-xs me-2"></i> 
                    Dashboard
                </a>

            </li>

             <!-- Nav item -->
             <li class="nav-item">
                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navPages" aria-expanded="false" aria-controls="navPages">
                    <i
                    data-feather="user"

                    class="nav-icon icon-xs me-2">
                </i> Customers</a>

                <div id="navPages" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="customers">
                                All customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link has-arrow"  href="add_customer" >
                                Add customer
                                </a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link " href="activate_customer">
                                Activate customer
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="kyc">
                                Activate KYC
                            </a>
                        </li>
                         
                    </ul>
                </div>
            </li>


                            <!-- Nav item -->
                            <li class="nav-item">
                                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navUtilities" aria-expanded="false" aria-controls="navUtilities">
                                    <i data-feather="database" class="nav-icon icon-xs me-2" >
                                </i> Transactions
                                </a>
                                <div id="navUtilities" class="collapse " data-bs-parent="#sideNavbar">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link " href="debits" aria-expanded="false">
                                                  Cash Debits
                                            </a>
                                        </li>
                                         
                                            <li class="nav-item">
                                                <a class="nav-link " href="complete" aria-expanded="false">
                                                     Completed
                                                </a>
                                            </li>
                                            
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navauth" aria-expanded="false" aria-controls="navauth">
                                    <i data-feather="lock" class="nav-icon icon-xs me-2" >
                                </i> Authentication
                                </a>
                                <div id="navauth" class="collapse " data-bs-parent="#sideNavbar">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link " href="account_imf" aria-expanded="false">
                                                 IMF
                                            </a>
                                        </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="account_cot" aria-expanded="false">
                                                     COT
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="account_ipn" aria-expanded="false">
                                                     IPN
                                                </a>
                                            </li>
                                            
                                        </li>
                                    </ul>
                                </div>
                            </li>




                        <!-- Nav item -->
                        
                       <li class="nav-item">
                            <a class="nav-link " href="request">
                                <i data-feather="folder" class="nav-icon icon-xs me-2">
                                </i>
                                Request/Complains
                            </a>
                        </li>

                        
                         <li class="nav-item">
                            <a class="nav-link " href="tickets">
                                <i data-feather="bell" class="nav-icon icon-xs me-2">
                                </i>
                                Tickets
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="message">
                                <i data-feather="mail" class="nav-icon icon-xs me-2">
                                </i>
                                Sent Messages
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="settings">
                                <i data-feather="settings" class="nav-icon icon-xs me-2">
                                </i>
                                Settings
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="about_us">
                                <i data-feather="help-circle" class="nav-icon icon-xs me-2">
                                </i>
                                About Us
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="contact">
                                <i data-feather="clipboard" class="nav-icon icon-xs me-2">
                                </i>
                                Contact Us
                            </a>
                        </li>
                            <!-- Nav item -->
                            
                                       

                                         <!-- Nav item -->
                        <li class="nav-item">
                            <div class="navbar-heading">Logout</div>
                        </li>

                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link has-arrow " href="signout" >
                                <i data-feather="globe" class="nav-icon icon-xs me-2" >
                            </i>  Signout
                            </a>
                         </li>
                    </ul>
                </div>
            </nav>