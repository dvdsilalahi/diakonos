{{--  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/posts">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" aria-current="page" href="/dashboard/posts">
                <span data-feather="file-text"></span>
            My posts
          </a>
        </li>
      </ul>
      @can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" aria-current="page" href="/dashboard/categories">
            <span data-feather="book-open"></span>
            Post Categories
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/event_categories*') ? 'active' : '' }}" aria-current="page" href="/dashboard/event_categories">
            <span data-feather="book-open"></span>
            Event Categories
          </a>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/members*') ? 'active' : '' }}" aria-current="page" href="/admin/members">
            <span data-feather="users"></span>
            Members
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/events*') ? 'active' : '' }}" aria-current="page" href="/admin/members">
            <span data-feather="calendar"></span>
            Events
          </a>
        </li>
      </ul>
      @endcan
    </div>
  </nav>

  --}}

        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menuDashboard">
                    <li>
                        <a href="#submenuDashboard" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Dashboard</span>
                        </h6>
                        </span> </a>
                        <ul class="collapse nav flex-column ms-1" id="submenuDashboard" data-bs-parent="#menuDashboard">
                            <li>
                                <a href="#" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class="bi bi-people"></i> <span class="ms-1 d-none d-sm-inline">Members</span> </a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class="bi bi-house-heart"></i> <span class="ms-1 d-none d-sm-inline">Communities</span> </a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class="bi bi-calendar2-week"></i> <span class="ms-1 d-none d-sm-inline">Events</span> </a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class="bi bi-wallet"></i> <span class="ms-1 d-none d-sm-inline">Finances</span> </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menuAdministration">
                    <li>
                        <a href="#submenuAdministration" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Administration</span>
                        </h6>
                        </span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenuAdministration" data-bs-parent="#menuAdministration">
                            <li class="nav-item">
                                <a href="/admin/members" class="nav-link px-0 align-middle">
                                    <i class="bi bi-people-fill"></i> <span class="ms-1 d-none d-sm-inline">Members</span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/communities" class="nav-link px-0 align-middle">
                                    <i class="bi bi-house-heart-fill"></i> <span class="ms-1 d-none d-sm-inline">Communities</span> </a>
                            </li>
                            <li>
                                <a href="/admin/events" class="nav-link px-0 align-middle">
                                    <i class="bi bi-calendar2-week-fill"></i> <span class="ms-1 d-none d-sm-inline">Events</span> </a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class="bi bi-wallet-fill"></i> <span class="ms-1 d-none d-sm-inline">Finances</span> </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menuConfiguration">
                    <li>
                    <a href="#submenuConfiguration" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Configuration</span>
                    </h6>
                        </span> </a>
                    <ul class="collapse nav flex-column ms-1" id="submenuConfiguration" data-bs-parent="#menuConfiguration">
                        <li>
                            <a href="#submenuConfiguration1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <h6><i class="bi bi-house-heart"></i><span class="ms-1 d-none d-sm-inline">Community</span></h6> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenuConfiguration1" data-bs-parent="#submenuConfiguration">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"><i class="bi bi-bookmark-check-fill"></i> Category</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"><i class="bi bi-intersect"></i> Segment</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"><i class="bi bi-globe-asia-australia"></i> Area</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#submenuConfiguration2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <h6><i class="bi bi-calendar2-week"></i> <span class="ms-1 d-none d-sm-inline">Event</span></h6> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenuConfiguration2" data-bs-parent="#submenuConfiguration">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"><i class="bi bi-bookmark-check-fill"></i> Category</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"><i class="bi bi-person-standing"></i> Duty</span></a>
                                </li>
                                <li>
                                    <a href="/admin/event-templates" class="nav-link px-0"> <span class="d-none d-sm-inline"><i class="bi bi-boxes"></i> Template</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#submenuConfiguration3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <h6><i class="bi bi-hourglass-split"></i> <span class="ms-1 d-none d-sm-inline">History</span></h6> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenuConfiguration3" data-bs-parent="#submenuConfiguration">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"><i class="bi bi-calendar2-heart-fill"></i> Moment</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"><i class="bi bi-check-circle-fill"></i> Status</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#submenuConfiguration4" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <h6><i class="bi bi-wallet-fill"></i> <span class="ms-1 d-none d-sm-inline">Finances</span></h6> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenuConfiguration4" data-bs-parent="#submenuConfiguration">
                                <li class="w-100">
                                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"><i class="bi bi-bank2"></i> Account Type</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline"><i class="bi bi-diagram-3-fill"></i> Chart of Accounts</span></a>
                                </li>
                            </ul>
                        </li>
                      </ul>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">User</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-light text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
