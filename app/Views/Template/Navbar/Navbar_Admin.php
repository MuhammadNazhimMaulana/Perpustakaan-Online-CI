<!-- Awal Navabr -->

<div class="sidebar">
    <div class="logo_content">
        <div class="logo">
            <i class='bx bx-library'></i>
            <div class="logo_name">Bonevian</div>
        </div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav_list">
        <li>
            <i class='bx bx-search'></i>
            <input type="text" placeholder="Cari...">
            <!-- <span class="tooltip">Dashboard</span> -->
        </li>
        <li>
            <a href="<?= base_url('/admin') ?>">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <!-- <span class="tooltip">Dashboard</span> -->
        </li>
        <li>
            <a href="<?= site_url('admin/profile') ?>">
                <i class='bx bx-user'></i>
                <span class="link_name">Pengguna</span>
            </a>
            <!-- <span class="tooltip">Dashboard</span> -->
        </li>
        <li>
            <a href="<?= base_url('admin/book') ?>">
                <i class='bx bxs-book'></i>
                <span class="link_name">Buku</span>
            </a>
            <!-- <span class="tooltip">Dashboard</span> -->
        </li>
        <li>
            <a href="<?= base_url('admin/writer') ?>">
                <i class='bx bxs-pencil'></i>
                <span class="link_name">Penulis</span>
            </a>
            <!-- <span class="tooltip">Dashboard</span> -->
        </li>
        <li>
            <a href="<?= base_url('admin/editor') ?>">
                <i class='bx bx-pen'></i>
                <span class="link_name">Editor</span>
            </a>
            <!-- <span class="tooltip">Dashboard</span> -->
        </li>
        <li>
            <a href="<?= base_url('admin/publisher') ?>">
                <i class='bx bx-building'></i>
                <span class="link_name">Penerbit</span>
            </a>
            <!-- <span class="tooltip">Dashboard</span> -->
        </li>
        <li>
            <a href="<?= base_url('admin/rack') ?>">
                <i class='bx bx-spreadsheet'></i>
                <span class="link_name">Rak</span>
            </a>
            <!-- <span class="tooltip">Dashboard</span> -->
        </li>
        <li>
            <a href="<?= base_url('admin/borrow') ?>">
                <i class='bx bx-repeat'></i>
                <span class="link_name">Peminjaman</span>
            </a>
            <!-- <span class="tooltip">Dashboard</span> -->
        </li>
        <li>
            <a href="<?= base_url('admin/return') ?>">
                <i class='bx bx-repeat'></i>
                <span class="link_name">Pengembalian</span>
            </a>
            <!-- <span class="tooltip">Dashboard</span> -->
        </li>
    </ul>
    <div class="profile_content">
        <div class="profile">
            <div class="profile_details">
                <img src="#" alt="#">
                <div class="name_job">
                    <div class="name">Bonevian</div>
                    <div class="job">Web Developer</div>
                </div>
            </div>
            <a href="<?= site_url('Auth/Authorisasi/logout') ?>"><i class='bx bx-log-out' id="log_out"></i></a>
        </div>
    </div>
</div>

<script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");
    let searchBtn = document.querySelector(".bx-search");

    btn.onclick = function() {
        sidebar.classList.toggle("active");
    }

    searchBtn.onclick = function() {
        sidebar.classList.toggle("active");
    }
</script>

<!-- Akhir Navbar -->