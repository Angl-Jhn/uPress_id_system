        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="dashboard">
                        <img src="../../assets/logo/wmsu-logo.svg" id="nav-logo" alt="WMSU Logo">
                        University Press
                    </a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="dashboard" class="sidebar-link">
                            <i class="fa-solid fa-chart-simple"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="transaction" class="sidebar-link">
                            <i class="fa-solid fa-right-left"></i>
                            Transactions
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="?" class="sidebar-link collapsed" data-bs-target="#layouts" data-bs-toggle="collapse"
                            aria-expanded="false">
                            <i class="fa-regular fa-id-badge"></i>
                            ID Layout Management
                        </a>
                        <ul id="layouts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="student-layout" class="sidebar-link">
                                    <i class="fa-regular fa-id-card"></i>
                                    Student
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="employee-layout" class="sidebar-link">
                                    <i class="fa-solid fa-id-card"></i>
                                    Employee
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="manage-accounts" class="sidebar-link">
                            <i class="fa-solid fa-user-tie"></i>
                            Account Management
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="form-configuration" class="sidebar-link">
                            <i class="fa-solid fa-sliders"></i>
                            Form Configuration
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="logout" class="sidebar-link">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Logout
                        </a>
                    </li>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="dash-content">
            <!-- navbar -->
            <nav class="navbar navbar-expand px-3 border-bottom border-2 border-light-subtle">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="dropdown-toggle nav-icon pe-md-4" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Welcome, <?= $_SESSION['role']; ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="my-profile" class="dropdown-item">Profile</a>
                                <a href="logout" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- end of nav -->