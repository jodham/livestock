<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?= base_url("static/images/favicon.ico")?>">
    <title> 
    <?php if(!empty($title)){
        echo $title;
        }else{?>
         Juelga
        <?php }?>
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url("static/css1/dashboard.css") ?>">
    <!-- <link rel="stylesheet" type="text/css" href="<?//base_url("static/css1/auth.css") ?>"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url("static/css1/form.css") ?>">
    <!-- <link rel="stylesheet" type="text/css" href="<?//base_url("static/css1/nav.css") ?>"> -->
    <link rel="stylesheet" type="text/css" href="<?=base_url("static/css1/table.css") ?>">

</head>
<body  style="background: #E3F2FD;">
<?php if($this->session->userdata('logged')):?>
<div id="" class="sidebar">
    <div class="logo-details">
      <a href="<?= base_url()?>">
        <i><img src="<?= base_url("static/assets/juelgaicon.png")?>"></i>
        <span class="logo_name">Juelga</span>
      </a>
    </div>
      <ul class="nav-links">
        <li>
          <a href="<?= base_url()?>" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url()."pig/pigs"?>">
            <i class='bx bx-box' ></i>
            <span class="links_name">Pigs</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url("pig/pen")?>">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Pig Pens</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Vaccination</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Diseases</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Feeds</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('user/users')?>">
            <i class='bx bx-user' ></i>
            <span class="links_name">Users</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url("pig/fate")?>">
            <i class='bx bx-message' ></i>
            <span class="links_name">Fate</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="links_name">Notification</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Growth</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="<?= base_url("welcome/logout")?>">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
    </ul>
</div>
<?php endif;?>
<section class="home-section">
<?php if($this->session->userdata('logged')):?>
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="<?=  getPhotoUrl(get_logged_user_id())?>" alt="profile">
        <span class="admin_name">Hi, <?= getUserName(get_logged_user_id())?></span>
      </div>
    </nav>
<?php endif;?>
    <?php if(!empty($content))
        if($this->session->flashdata('success')){
          echo '<div class="row flash-message fade-out">
          <div class="message-container message-row col-md-12 d-flex justify-content-center">
            <div class="message p-2 bg-success text-white success-message text-center" id="message">
              '. $this->session->flashdata('success'). '
            
            </div>
            </div>
            </div>';
        }

        if($this->session->flashdata('error')){
          echo '<div class="row flash-message fade-out">
          <div class="message-container message-row col-md-12 d-flex justify-content-center">
            <div class="message p-2 bg-danger text-white error-message text-center" id="message">
              '. $this->session->flashdata('error'). '
              
            </div>
            </div>
            </div>';
        }
      {echo $content;}
     ?>
  </section>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript"
          src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
        </script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
        <script src="<?= base_url("static/js/ck.js")?>"></script>
  <script>
    // Variable declarations
    const sidebar = document.querySelector(".sidebar");
    const sidebarBtn = document.querySelector(".sidebarBtn");
    const sidebarClose = document.querySelector("#sidebar-close");
    const menu = document.querySelector(".menu-content");
    const menuItems = document.querySelectorAll(".submenu-item");
    const subMenuTitles = document.querySelectorAll(".submenu .menu-title");

    // Sidebar toggle function
    function toggleSidebar() {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else {
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    }

    // Sidebar button click event
    sidebarBtn.onclick = toggleSidebar;

    // Close sidebar event
    sidebarClose.addEventListener("click", () => sidebar.classList.toggle("close"));

    // Menu item click events
    menuItems.forEach((item, index) => {
      item.addEventListener("click", () => {
        menu.classList.add("submenu-active");
        item.classList.add("show-submenu");
        menuItems.forEach((item2, index2) => {
          if (index !== index2) {
            item2.classList.remove("show-submenu");
          }
        });
      });
    });

    // Submenu title click events
    subMenuTitles.forEach((title) => {
      title.addEventListener("click", () => {
        menu.classList.remove("submenu-active");
      });
    });
</script>
            

</body>
</html>