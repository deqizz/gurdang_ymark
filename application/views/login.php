<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sistem Informasi Gudang | Y-MARK COMPUTER</title>
  
  
  
      <link rel="stylesheet" href="<?=base_url(); ?>assets/css/style.css">

  
</head>

<body>
  <div class="login-page">
  <div class="form">
    <form method="POST" class="login-form" action="<?=base_url();?>login/check">
      <input type="text" placeholder="username" name="username"/>
      <input type="password" placeholder="password" name="password"/>
      <button>login</button>
      <p class="message"><?php
              $info = $this->session->flashdata('info');
              if (!empty($info)) {
                echo $info;
               } 
            ?></p>
    </form>
  </div>
</div>
  <script src='<?=base_url(); ?>assets/js/jquery.min.js'></script>

    <script src="<?=base_url(); ?>assets/js/index.js"></script>

</body>
</html>
