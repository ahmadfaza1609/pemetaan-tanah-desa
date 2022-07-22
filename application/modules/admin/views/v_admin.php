<?php require_once 'v_head.php' ?>

<body>
    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
        <?php require_once 'v_sidebar.php' ?>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        <?php require_once 'v_header.php' ?>
        <!-- ========== header end ========== -->

        <!-- ========== content start ========== -->
        <?php require_once 'v_content.php' ?>
        <!-- ========== content end ========== -->

        <?php require_once 'v_footer.php' ?>
    </main>

    <?php require_once 'v_script.php' ?>
</body>

</html>