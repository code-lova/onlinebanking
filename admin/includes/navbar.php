<!-- Page content -->
      <div id="page-content">
        <div class="header classList">
  <!-- navbar -->
  <nav class="navbar-classic navbar navbar-expand-lg">
    <a id="nav-toggle" href="#"><i
        data-feather="menu"

        class="nav-icon me-2 icon-xs"></i></a>
    <div class="ms-lg-3">
      <!-- Form -->
      <div class="input-group">
       <form action="search_result" method="GET">
        <input type="search"  name="search" required class="form-control" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" placeholder="Search Customer">
      </form>
    </div>
    </div>
    <!--Navbar nav -->
    <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
      <li class="dropdown stopevent">
        <a class="btn btn-light btn-icon rounded-circle indicator
          indicator-primary text-muted" href="#" role="button"
          id="dropdownNotification" data-bs-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <i class="icon-xs" data-feather="bell"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"
          aria-labelledby="dropdownNotification">
          <div class="">
            <div class="border-bottom px-3 pt-2 pb-3 d-flex
              justify-content-between align-items-center">
              <p class="mb-0 text-dark fw-medium fs-4">Notifications</p>
              <a href="#" class="text-muted">
                <span>
                  <i class="me-1 icon-xxs" data-feather="settings"></i>
                </span>
              </a>
            </div>
            <!-- List group -->
            <ul class="list-group list-group-flush notification-list-scroll">
              <!-- List group item -->
              <li class="list-group-item bg-light">
                <a href="#" class="text-muted">
                    <h5 class="fw-bold mb-1">New Login</h5>
                    <p class="mb-0">
                      Admin just logged in now show time here.
                    </p>
                </a>
          </li>
        </ul>
       
      <!-- List -->
      <li class="dropdown ms-2">
        <a class="rounded-circle" href="#" role="button" id="dropdownUser"
          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="avatar avatar-md avatar-indicators avatar-online">
            <img src="assets/images/01.png" alt="admin" width="50px" 
              class="rounded-circle" />
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end"
          aria-labelledby="dropdownUser">
          <div class="px-4 pb-0 pt-2">


            <div class="lh-1 ">
              <h5 class="mb-1"><?php echo $_SESSION['name']; ?></h5>
            </div>
            <div class=" dropdown-divider mt-3 mb-2"></div>
          </div>

          <ul class="list-unstyled">

            
            <li>
              <a class="dropdown-item" href="settings">
                <i class="me-2 icon-xxs dropdown-item-icon"
                  data-feather="settings"></i>Account Settings
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="signout">
                <i class="me-2 icon-xxs dropdown-item-icon"
                  data-feather="power"></i>Sign Out
              </a>
            </li>
          </ul>

        </div>
      </li>
    </ul>
  </nav>
</div>
