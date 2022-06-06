<section class="head-menu">
    <div class="flex">
      <div class="s1">
        <?php 
        $profile_name = 'Profile';
        if(APP_AUTH_USERS::user_log_status() == true){
          $profile_name = '<a href="/profile/'. APP_AUTH_USERS::logData('id').'">' . APP_AUTH_USERS::logData('fname') . ' '. APP_AUTH_USERS::logData('lname') . '</a>';
        }
        ?>
        <p><?php echo $profile_name; ?></p>
      </div>
      <div class="s2 flex flex-basis">
        <div class="m1">
          <h3><i id="toggle_sidebar" class="fa-solid fa-bars"></i> Menu</h3>
        </div>
        <div class="m2">

          <h3 id="right_logo">LOCALNII</h3>
          <h3 id="right_sidebar"><i id="right_sidebar_btn" class="fa-solid fa-bars"></i></h3>

        </div>
      </div>
    </div>
  </section>

  <section class="sidebar">

    <div class="side-profile">
      <?php 
      $side_avatar = '/assets/icons/img/gamer.png';
      if(APP_AUTH_USERS::user_log_status() == false){
        $side_avatar = '/assets/icons/main/icon.png';
      }
      ?>
      <img src="<?php echo $side_avatar; ?>">
    </div>

    <ul class="vertical-menu">
      <li><a href="/"><i class="fa-solid fa-house"></i> Home</a></li>
      <li><a href="/problems"><i class="fa-solid fa-circle-xmark"></i> Problems</a></li>
      <li><a href="/docs"><i class="fa-solid fa-book"></i> Docs</a></li>
      <li><a href="/users"><i class="fa-solid fa-users"></i> Users</a></li>
      
      <!-- <li><a href="#"><i class="fa-solid fa-gear"></i> Settings</a></li> -->
      <?php if(APP_AUTH_USERS::user_log_status() == false){ ?>
        <li><a href="/login"><i class="fa-solid fa-right-to-bracket"></i></i> Login</a></li>
        <li><a href="/register"><i class="fa-solid fa-address-card"></i> Register</a></li>
      <?php }else{ ?>
        <li><a href="/func/auth/?logout=success"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
      <?php } ?>

      <li class="light"><a href="/about-us" ><i class="fa-solid fa-circle-info"></i> About us</a></li>
      <li class="light"><a href="/terms-conditions" ><i class="fa-solid fa-shield"></i> Terms&conditions</a></li>
      <li class="light"><a href="/contact" ><i class="fa-solid fa-headset"></i> Contact us</a></li>

    </ul>
  </section>