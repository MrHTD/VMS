    <!-- NAVIGATION -->
    <nav id="mainNavbar" class="navbar navbar-vertical navbar-expand-lg scrollbar bg-dark navbar-dark">

        <!-- Theme configuration (navbar) -->
        <script>
            let navigationColor = localStorage.getItem('navigationColor'),
                navbar = document.getElementById('mainNavbar');

            if (navigationColor != null && navbar != null) {
                if (navigationColor == 'inverted') {
                    navbar.classList.add('bg-dark', 'navbar-dark');
                    navbar.classList.remove('bg-white', 'navbar-light');
                } else {
                    navbar.classList.add('bg-white', 'navbar-light');
                    navbar.classList.remove('bg-dark', 'navbar-dark');
                }
            }
        </script>
        <div class="container-fluid">

            <!-- Brand -->
            <a class="navbar-brand fs-1 fw-bold" href="#">
                VCARE
            </a>

            <!-- Navbar toggler -->
            <a href="javascript: void(0);" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#sidenavCollapse" aria-controls="sidenavCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </a>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenavCollapse">

                <!-- Navigation -->
                <ul class="navbar-nav mb-lg-7">
                    <!-- patient -->
                    <li class="nav-item dropdown">
                        <a class="nav-link <?php if ($show == 'first') {
                                                echo 'active';
                                            } ?>" href="#pagesCollapseva" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="pagesCollapse">
                            <svg width="18" height="18" class="nav-link-icon" fill="currentColor" viewBox="0 0 30 30">
                                <path d="M7.031 4.219c0 -2.33 1.889 -4.219 4.219 -4.219s4.219 1.889 4.219 4.219c0 2.33 -1.889 4.219 -4.219 4.219s-4.219 -1.889 -4.219 -4.219zm14.92 0.08c-0.732 -0.732 -1.919 -0.732 -2.652 0L14.223 9.375H8.277L3.201 4.299c-0.732 -0.732 -1.919 -0.732 -2.652 0 -0.732 0.732 -0.732 1.919 0 2.652L6.094 12.495V28.125c0 1.036 0.839 1.875 1.875 1.875h0.938c1.036 0 1.875 -0.839 1.875 -1.875V21.563h0.938v6.563c0 1.036 0.839 1.875 1.875 1.875h0.938c1.036 0 1.875 -0.839 1.875 -1.875V12.495l5.545 -5.545c0.732 -0.732 0.732 -1.919 0 -2.652z" />
                            </svg>
                            <span>Patient Details</span>
                        </a>
                        <div class="collapse <?php if ($show == 'first') {
                                                    echo 'show';
                                                } ?>" id="pagesCollapseva">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="admin_patient.php" class="nav-link <?php if ($page == 'patient') {
                                                                                    echo 'active';
                                                                                } ?>">
                                        Patients
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="admin_vaccination_report.php" class="nav-link <?php if ($page == 'report') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                        Vaccine Report
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="admin_vaccination_date.php" class="nav-link <?php if ($page == 'vdate') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                        Vaccine Date
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Vacccine -->
                    <li class="nav-item dropdown">
                        <a class="nav-link <?php if ($page == 'vaccine') {
                                                echo 'active';
                                            } ?>" href="#pagesCollapsev" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="pagesCollapse">
                            <svg width="18" height="18" fill="currentColor" class="nav-link-icon" viewBox="0 0 30 30">
                                <path d="M29.612 6.287c-0.565 -0.565 -5.339 -5.339 -5.899 -5.899c-1.181 -1.181 -2.97 0.605 -1.787 1.787l0.717 0.717l-3.447 3.447L16.206 3.35c-1.181 -1.181 -2.97 0.605 -1.787 1.787l1.378 1.378l-1.669 1.669l2.86 2.86c1.181 1.181 -0.605 2.97 -1.787 1.787l-2.86 -2.86l-1.013 1.013l2.86 2.86c1.181 1.181 -0.605 2.97 -1.787 1.787l-2.86 -2.86l-1.013 1.013l2.86 2.86c1.181 1.181 -0.605 2.97 -1.787 1.787l-2.86 -2.86l-2.563 2.563c-0.494 0.494 -0.494 1.294 0 1.787l2.056 2.056L0.387 27.825c-1.181 1.181 0.605 2.97 1.787 1.787l5.845 -5.845l2.056 2.056c0.494 0.494 1.294 0.494 1.787 0L23.484 14.202l1.378 1.378c1.171 1.171 2.985 -0.59 1.787 -1.787c-0.375 -0.375 -2.197 -2.197 -2.989 -2.989l3.447 -3.447l0.717 0.717C29.005 9.255 30.795 7.469 29.612 6.287zM21.873 9.017c-0.322 -0.322 -0.568 -0.568 -0.891 -0.891L24.429 4.679l0.891 0.891L21.873 9.017z" />
                            </svg>
                            <span>Vaccine</span>
                        </a>
                        <div class="collapse <?php if ($show == 'vaccine') {
                                                    echo 'show';
                                                } ?>" id="pagesCollapsev">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="admin_vaccine.php" class="nav-link <?php if ($page == 'vaccine') {
                                                                                    echo 'active';
                                                                                } ?>">
                                        Vaccine
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Hospital -->
                    <li class="nav-item dropdown">
                        <a class="nav-link <?php if ($page == 'hospital') {
                                                echo 'active';
                                            } ?>" href="#pagesCollapseh" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="pagesCollapse">
                            <svg width="18" height="18" fill="currentColor" class="nav-link-icon" viewBox="-1.875 0 30 30" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M26.25 28.828v1.172H0v-1.172c0 -0.388 0.315 -0.703 0.703 -0.703h1.172V7.031c0 -0.777 0.63 -1.406 1.406 -1.406h5.156V1.406c0 -0.777 0.63 -1.406 1.406 -1.406h6.563c0.777 0 1.406 0.63 1.406 1.406v4.219h5.156c0.777 0 1.406 0.63 1.406 1.406v21.094h1.172c0.388 0 0.703 0.315 0.703 0.703zM18.047 11.25h-2.344c-0.388 0 -0.703 0.315 -0.703 0.703v2.344c0 0.388 0.315 0.703 0.703 0.703h2.344c0.388 0 0.703 -0.315 0.703 -0.703v-2.344c0 -0.388 -0.315 -0.703 -0.703 -0.703zm-9.844 3.75h2.344c0.388 0 0.703 -0.315 0.703 -0.703v-2.344c0 -0.388 -0.315 -0.703 -0.703 -0.703h-2.344c-0.388 0 -0.703 0.315 -0.703 0.703v2.344c0 0.388 0.315 0.703 0.703 0.703zm6.094 7.5h-2.344c-0.388 0 -0.703 0.315 -0.703 0.703v4.922h3.75v-4.922c0 -0.388 -0.315 -0.703 -0.703 -0.703zm3.75 -5.625h-2.344c-0.388 0 -0.703 0.315 -0.703 0.703v2.344c0 0.388 0.315 0.703 0.703 0.703h2.344c0.388 0 0.703 -0.315 0.703 -0.703v-2.344c0 -0.388 -0.315 -0.703 -0.703 -0.703zm-6.797 0.703c0 -0.388 -0.315 -0.703 -0.703 -0.703h-2.344c-0.388 0 -0.703 0.315 -0.703 0.703v2.344c0 0.388 0.315 0.703 0.703 0.703h2.344c0.388 0 0.703 -0.315 0.703 -0.703v-2.344zM10.664 5.625h1.523v1.523a0.352 0.352 0 0 0 0.352 0.352h1.172a0.352 0.352 0 0 0 0.352 -0.352V5.625h1.523a0.352 0.352 0 0 0 0.352 -0.352V4.102a0.352 0.352 0 0 0 -0.352 -0.352h-1.523V2.227a0.352 0.352 0 0 0 -0.352 -0.352h-1.172a0.352 0.352 0 0 0 -0.352 0.352v1.523h-1.523a0.352 0.352 0 0 0 -0.352 0.352v1.172a0.352 0.352 0 0 0 0.352 0.352z" />
                            </svg>
                            <span>Hospital</span>
                        </a>
                        <div class="collapse <?php if ($show == 'hospital') {
                                                    echo 'show';
                                                } ?>" id="pagesCollapseh">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="admin_hospital.php" class="nav-link <?php if ($page == 'hospital') {
                                                                                        echo 'active';
                                                                                    } ?>">
                                        Hospital
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- request -->
                    <li class="nav-item dropdown">
                        <a class="nav-link <?php if ($page == 'request') {
                                                echo 'active';
                                            } ?>" href="#pagesCollapser" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="pagesCollapse">
                            <svg width="18" height="18" class="nav-link-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19.954 8.87175C19.954 8.56406 19.954 8.35893 19.954 8.1538C19.7468 4.87175 17.1568 2.20508 13.8417 1.99995C13.2201 1.99995 12.5986 1.99995 12.0806 1.99995C10.5266 1.99995 8.35108 2.20508 6.90072 2.30765C5.45036 2.41021 4.41439 3.43585 4.31079 4.76919C4.20719 6.41021 4 9.5897 4 11.9487C4 14.2051 4.20719 17.3846 4.31079 19.1282C4.41439 20.4615 5.45036 21.5897 6.79712 21.6923C8.24748 21.7948 10.423 22 11.977 22C13.5309 22 15.7065 21.7948 17.1568 21.6923C18.5036 21.5897 19.5396 20.4615 19.6432 19.1282C19.7468 17.4871 19.954 14.3076 19.954 11.9487C20.0576 11.1282 19.954 10.1025 19.954 8.87175ZM8.86906 13.1794H10.941C11.3554 13.1794 11.7698 13.4871 11.7698 14C11.7698 14.5128 11.459 14.8205 10.941 14.8205H8.86906C8.45468 14.8205 8.04029 14.5128 8.04029 14C8.04029 13.4871 8.45468 13.1794 8.86906 13.1794ZM13.0129 17.8974H8.86906C8.45468 17.8974 8.04029 17.5897 8.04029 17.0769C8.04029 16.5641 8.35108 16.2564 8.86906 16.2564H13.0129C13.4273 16.2564 13.8417 16.5641 13.8417 17.0769C13.8417 17.5897 13.4273 17.8974 13.0129 17.8974ZM15.0849 8.05124C14.3597 8.05124 13.8417 7.43585 13.8417 6.82047V3.53842C16.2245 3.74354 18.1928 5.5897 18.4 8.05124H15.0849Z" fill="currentColor" />
                            </svg>
                            <span>Request</span>
                        </a>
                        <div class="collapse <?php if ($show == 'request') {
                                                    echo 'show';
                                                } ?>" id="pagesCollapser">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="admin_request.php" class="nav-link <?php if ($page == 'request') {
                                                                                    echo 'active';
                                                                                } ?>">
                                        Requests
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link <?php if ($page == 'booking') {
                                                echo 'active';
                                            } ?>" href="#pagesCollapseb" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="pagesCollapse">
                            <svg width="18" height="18" fill="currentColor" class="nav-link-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.4115 5.89744C21.3613 5.23605 21.0744 4.6149 20.6035 4.14777C20.1326 3.68064 19.5092 3.39879 18.8474 3.35385C18.1808 3.30256 17.4218 3.25128 16.6218 3.21026V5.33333C16.6218 5.80936 16.4327 6.2659 16.0961 6.6025C15.7595 6.9391 15.303 7.12821 14.8269 7.12821C14.3509 7.12821 13.8944 6.9391 13.5578 6.6025C13.2212 6.2659 13.0321 5.80936 13.0321 5.33333V3.02564H10.4679V5.33333C10.4679 5.80936 10.2788 6.2659 9.94224 6.6025C9.60564 6.9391 9.14911 7.12821 8.67308 7.12821C8.19705 7.12821 7.74051 6.9391 7.40391 6.6025C7.06731 6.2659 6.87821 5.80936 6.87821 5.33333V3.21026C6.07821 3.21026 5.31923 3.30256 4.64231 3.35385C3.98481 3.39788 3.36546 3.67841 2.89872 4.14359C2.42761 4.61251 2.14014 5.23474 2.08846 5.89744C1.93462 7.79487 1.75 10.4923 1.75 12.5128C1.75 14.5333 1.93462 17.2308 2.08846 19.1385C2.14076 19.7964 2.42718 20.4138 2.89575 20.8786C3.36432 21.3434 3.98398 21.6248 4.64231 21.6718C6.3141 21.7949 9.44231 22 11.75 22C14.0577 22 17.1859 21.7949 18.8474 21.6718C19.5076 21.6272 20.1297 21.3468 20.6004 20.8817C21.0711 20.4167 21.3589 19.798 21.4115 19.1385C21.5654 17.2308 21.75 14.5333 21.75 12.5128C21.75 10.4923 21.5654 7.79487 21.4115 5.89744ZM11.75 15.8462H7.64744C7.44342 15.8462 7.24777 15.7651 7.10351 15.6209C6.95925 15.4766 6.87821 15.2809 6.87821 15.0769C6.87821 14.8729 6.95925 14.6773 7.10351 14.533C7.24777 14.3887 7.44342 14.3077 7.64744 14.3077H11.75C11.954 14.3077 12.1497 14.3887 12.2939 14.533C12.4382 14.6773 12.5192 14.8729 12.5192 15.0769C12.5192 15.2809 12.4382 15.4766 12.2939 15.6209C12.1497 15.7651 11.954 15.8462 11.75 15.8462ZM15.8526 11.7436H7.64744C7.44342 11.7436 7.24777 11.6625 7.10351 11.5183C6.95925 11.374 6.87821 11.1784 6.87821 10.9744C6.87821 10.7703 6.95925 10.5747 7.10351 10.4304C7.24777 10.2862 7.44342 10.2051 7.64744 10.2051H15.8526C16.0566 10.2051 16.2522 10.2862 16.3965 10.4304C16.5408 10.5747 16.6218 10.7703 16.6218 10.9744C16.6218 11.1784 16.5408 11.374 16.3965 11.5183C16.2522 11.6625 16.0566 11.7436 15.8526 11.7436Z" fill="currentColor" />
                                <path d="M9.44231 2.76923V5.33333C9.44231 5.53735 9.36126 5.733 9.21701 5.87726C9.07275 6.02152 8.87709 6.10256 8.67308 6.10256C8.46906 6.10256 8.27341 6.02152 8.12915 5.87726C7.98489 5.733 7.90385 5.53735 7.90385 5.33333V2.76923C7.90385 2.56522 7.98489 2.36956 8.12915 2.2253C8.27341 2.08104 8.46906 2 8.67308 2C8.87709 2 9.07275 2.08104 9.21701 2.2253C9.36126 2.36956 9.44231 2.56522 9.44231 2.76923Z" fill="currentColor" />
                                <path d="M15.5962 2.76923V5.33333C15.5962 5.53735 15.5151 5.733 15.3709 5.87726C15.2266 6.02152 15.0309 6.10256 14.8269 6.10256C14.6229 6.10256 14.4273 6.02152 14.283 5.87726C14.1387 5.733 14.0577 5.53735 14.0577 5.33333V2.76923C14.0577 2.56522 14.1387 2.36956 14.283 2.2253C14.4273 2.08104 14.6229 2 14.8269 2C15.0309 2 15.2266 2.08104 15.3709 2.2253C15.5151 2.36956 15.5962 2.56522 15.5962 2.76923Z" fill="currentColor" />
                            </svg>
                            <span>Booking</span>
                        </a>
                        <div class="collapse <?php if ($page == 'booking') {
                                                    echo 'show';
                                                } ?>" id="pagesCollapseb">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="admin_booking.php" class="nav-link <?php if ($page == 'booking') {
                                                                                    echo 'active';
                                                                                } ?>">
                                        Bookings
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- user -->
                    <li class="nav-item dropdown">
                        <a class="nav-link <?php if ($page == 'user') {
                                                echo 'active';
                                            } ?>" href="#pagesCollapseu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="pagesCollapse">
                            <svg width="18" height="18" fill="currentColor" class="nav-link-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.5385 11.4899C17.7949 11.4899 19.641 9.65316 19.641 7.40826C19.641 5.16336 17.7949 3.32663 15.5385 3.32663C15.4359 3.32663 15.3334 3.32663 15.2308 3.32663C15.8462 4.34704 16.2564 5.57153 16.2564 6.79602C16.2564 8.53071 15.5385 10.1634 14.4103 11.3879C14.718 11.4899 15.1282 11.4899 15.5385 11.4899Z" fill="currentColor" />
                                <path d="M17.2821 13.6326H16.2565C17.7949 14.9591 18.8206 17 18.8206 19.2448C18.8206 19.7551 18.718 20.1632 18.6154 20.5714C19.9488 20.3673 20.7693 20.0612 21.2821 19.7551C21.7949 19.4489 22.0001 18.9387 22.0001 18.3265C22.0001 15.7755 19.8462 13.6326 17.2821 13.6326Z" fill="currentColor" />
                                <path d="M9.38459 11.4898C10.6154 11.4898 11.641 11.0817 12.5641 10.2654C13.5897 9.44903 14.1025 8.1225 14.1025 6.79597C14.1025 5.77556 13.7948 4.75515 13.1795 4.04087C12.3589 2.81638 11.0256 2.00005 9.38459 2.00005C6.82049 2.00005 4.66664 4.14291 4.66664 6.69393C4.66664 9.34699 6.82049 11.4898 9.38459 11.4898Z" fill="currentColor" />
                                <path d="M12.1538 13.9389C11.8462 13.9389 11.641 13.8369 11.3333 13.8369H7.4359C4.46154 13.8369 2 16.2859 2 19.245C2 19.9593 2.30769 20.4695 2.82051 20.8777C3.64103 21.3879 5.58974 22.0001 9.38461 22.0001C13.1795 22.0001 15.0256 21.3879 15.9487 20.8777C15.9487 20.8777 16.0513 20.7757 16.1538 20.7757C16.5641 20.4695 16.8718 19.9593 16.8718 19.245C16.7692 16.592 14.8205 14.3471 12.1538 13.9389Z" fill="currentColor" />
                            </svg>
                            <span>User</span>
                        </a>
                        <div class="collapse <?php if ($show == 'user') {
                                                    echo 'show';
                                                } ?>" id="pagesCollapseu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="admin_user.php" class="nav-link <?php if ($page == 'user') {
                                                                                    echo 'active';
                                                                                } ?>">
                                        Users
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <!-- End of Navigation -->
            </div>
    </nav>