  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="assets/images/logo.png" alt="Chain App Dev">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="index.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="active"' : ''; ?>>หน้าหลัก</a></li>
              <li class="scroll-to-section"><a href="#services">บริการของเรา</a></li>
              <li class="scroll-to-section"><a href="#about">สแกนบัตร</a></li>
              <li class="scroll-to-section "><a href="receipt.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'receipt.php') ? 'class="active"' : ''; ?>>แสกนข้อความ</a></li>
              <li class="scroll-to-section"></li>
              <!-- <li>
                <div class="gradient-button"><a id="modal_trigger" href="#modal"><i class="fa fa-sign-in-alt"></i> Sign In Now</a></div>
              </li> -->
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->