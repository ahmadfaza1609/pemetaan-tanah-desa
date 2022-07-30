<div class="navbar-logo">
    <a href="#">
        <img src="<?= base_url() ?>style-admin/assets/images/logo/logoKabBengkalis.png" width="20%" alt="logo" />
        <span>Pemetaan Dan Arsip </br> Desa Bantan Tengah</span>
    </a>
</div>
<nav class="sidebar-nav">
    <ul>
        <li class="nav-item">
            <a href="<?= base_url() ?>">
                <span class="icon">
                    <svg width="22" height="22" viewBox="0 0 22 22">
                        <path
                            d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                    </svg>
                </span>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-item-has-children">
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_2" aria-controls="ddmenu_2"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.8334 1.83325H5.50008C5.01385 1.83325 4.54754 2.02641 4.20372 2.37022C3.8599 2.71404 3.66675 3.18036 3.66675 3.66659V18.3333C3.66675 18.8195 3.8599 19.2858 4.20372 19.6296C4.54754 19.9734 5.01385 20.1666 5.50008 20.1666H16.5001C16.9863 20.1666 17.4526 19.9734 17.7964 19.6296C18.1403 19.2858 18.3334 18.8195 18.3334 18.3333V7.33325L12.8334 1.83325ZM16.5001 18.3333H5.50008V3.66659H11.9167V8.24992H16.5001V18.3333Z" />
                    </svg>
                </span>
                <span class="text">Pemetaan</span>
            </a>
            <ul id="ddmenu_2" class="collapse dropdown-nav">
                <li>
                    <a href="<?= base_url('lahan/index') ?>"> Data Tanah </a>
                </li>
                <li>
                    <a href="blank-page.html"> Galeri </a>
                </li>
            </ul>
        </li>
        <li class="nav-item nav-item-has-children">
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_3" aria-controls="ddmenu_3"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.9067 14.2908L15.2808 11.9167H6.41667V10.0833H15.2808L12.9067 7.70917L14.2083 6.41667L18.7917 11L14.2083 15.5833L12.9067 14.2908ZM17.4167 2.75C17.9029 2.75 18.3692 2.94315 18.713 3.28697C19.0568 3.63079 19.25 4.0971 19.25 4.58333V8.86417L17.4167 7.03083V4.58333H4.58333V17.4167H17.4167V14.9692L19.25 13.1358V17.4167C19.25 17.9029 19.0568 18.3692 18.713 18.713C18.3692 19.0568 17.9029 19.25 17.4167 19.25H4.58333C3.56583 19.25 2.75 18.425 2.75 17.4167V4.58333C2.75 3.56583 3.56583 2.75 4.58333 2.75H17.4167Z" />
                    </svg>
                </span>
                <span class="text">Pengarsipan</span>
            </a>
            <ul id="ddmenu_3" class="collapse dropdown-nav">
                <li>
                    <a href="<?= base_url('jenis_surat/get_arsip') ?>"> Data Arsip </a>
                </li>
            </ul>
        </li>
        <span class="divider">
            <hr />
        </span>
        <li class="nav-item nav-item-has-children">
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_4" aria-controls="ddmenu_4"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.66675 4.58325V16.4999H19.2501V4.58325H3.66675ZM5.50008 14.6666V6.41659H8.25008V14.6666H5.50008ZM10.0834 14.6666V11.4583H12.8334V14.6666H10.0834ZM17.4167 14.6666H14.6667V11.4583H17.4167V14.6666ZM10.0834 9.62492V6.41659H17.4167V9.62492H10.0834Z" />
                    </svg>
                </span>
                <span class="text">Master Data </span>
            </a>
            <ul id="ddmenu_4" class="collapse dropdown-nav">
                <li>
                    <a href="<?= base_url('data_rt/') ?>"> Data RT </a>
                </li>
                <li>
                    <a href="<?= base_url('data_rw/') ?>"> Data RW </a>
                </li>
                <li>
                    <a href="<?= base_url('data_dusun/') ?>"> Data Dusun </a>
                </li>
                <li>
                    <a href="<?= base_url('jenis_surat/') ?>"> Data Jenis Surat </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="tables.html">
                <span class="icon">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.58333 3.66675H17.4167C17.9029 3.66675 18.3692 3.8599 18.713 4.20372C19.0568 4.54754 19.25 5.01385 19.25 5.50008V16.5001C19.25 16.9863 19.0568 17.4526 18.713 17.7964C18.3692 18.1403 17.9029 18.3334 17.4167 18.3334H4.58333C4.0971 18.3334 3.63079 18.1403 3.28697 17.7964C2.94315 17.4526 2.75 16.9863 2.75 16.5001V5.50008C2.75 5.01385 2.94315 4.54754 3.28697 4.20372C3.63079 3.8599 4.0971 3.66675 4.58333 3.66675ZM4.58333 7.33341V11.0001H10.0833V7.33341H4.58333ZM11.9167 7.33341V11.0001H17.4167V7.33341H11.9167ZM4.58333 12.8334V16.5001H10.0833V12.8334H4.58333ZM11.9167 12.8334V16.5001H17.4167V12.8334H11.9167Z" />
                    </svg>
                </span>
                <span class="text">User</span>
            </a>
        </li>
        <span class="divider">
            <hr />
        </span>

        <li class="nav-item">
            <a href="notification.html">
                <span class="icon">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.16667 19.25H12.8333C12.8333 20.2584 12.0083 21.0834 11 21.0834C9.99167 21.0834 9.16667 20.2584 9.16667 19.25ZM19.25 17.4167V18.3334H2.75V17.4167L4.58333 15.5834V10.0834C4.58333 7.24171 6.41667 4.76671 9.16667 3.94171V3.66671C9.16667 2.65837 9.99167 1.83337 11 1.83337C12.0083 1.83337 12.8333 2.65837 12.8333 3.66671V3.94171C15.5833 4.76671 17.4167 7.24171 17.4167 10.0834V15.5834L19.25 17.4167ZM15.5833 10.0834C15.5833 7.51671 13.5667 5.50004 11 5.50004C8.43333 5.50004 6.41667 7.51671 6.41667 10.0834V16.5H15.5833V10.0834Z" />
                    </svg>
                </span>
                <span class="text">Notifications</span>
            </a>
        </li>
    </ul>
</nav>
<!-- ======== sidebar-nav end =========== -->