<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css'); ?>">
  </head>
  <body>
<div class="login-box">
  <h1>MASUK <br> SMP BARATA BENER</h1>
  
  <form action="<?php echo base_url('login/login'); ?>" method="post">
    <div class="textbox">
      <i class="fas fa-user"></i>
      <input type="text" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>">
    </div>
      <font color="red" size="2"><?php echo form_error('username'); ?></font>
      <font color="red" size="2"><?php echo $this->session->flashdata('loginu'); ?></font>

    <div class="textbox">
      <i class="fas fa-lock"></i>
      <input type="password" name="password" placeholder="Password">
    </div>
      <font color="red" size="2"><?php echo form_error('password'); ?></font>
      <font color="red" size="2"><?php echo $this->session->flashdata('loginp'); ?></font>
    <button class="btn">Masuk</button>
  </form>

  <!-- <a href="<?php echo base_url('login/register'); ?>">
    <button class="btn">Daftar</button>
   --></a>
</div>
  </body>
</html>
