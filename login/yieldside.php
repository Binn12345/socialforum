
 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
  <?php if($user_data['userkey'] == '1' || $user_data['userkey'] == '3')
      {
        $hashedUserKey = password_hash($user_data['userkey'], PASSWORD_BCRYPT);
        echo'
          <a class="nav-link " href="index.php?access='.$hashedUserKey.'">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>';
      }
  ?>
  </li><!-- End Dashboard Nav -->
    

  <li class="nav-heading">Pages</li>

  
  <li class="nav-item">
    <?php if($user_data['userkey'] == '1' || $user_data['userkey'] == '2' || $user_data['userkey'] == '3')
      {
        $hashedUserKey = password_hash($user_data['userkey'], PASSWORD_BCRYPT);
        echo'
        <a class="nav-link collapsed" href="announcement.php?access='.$hashedUserKey.'">
        <i class="bi bi-file-earmark"></i>
        <span>Announcement</span>
        </a>';
      }
    ?>
  
  </li><!-- End Blank Page Nav -->

  <li class="nav-item">
  <?php if($user_data['userkey'] == '1' || $user_data['userkey'] == '3')
      {
        $hashedUserKey = password_hash($user_data['userkey'], PASSWORD_BCRYPT);
        echo'
        <a class="nav-link collapsed" href="services.php?access='.$hashedUserKey.'">
          <i class="bi bi-file-earmark"></i>
          <span>Services</span>
        </a>';
      }
  ?>
  </li><!-- End Blank Page Nav -->

</ul>

</aside><!-- End Sidebar-->