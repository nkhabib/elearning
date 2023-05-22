

<html>
<head>
  <title> Chat Exmaples! </title>
  <script src="<?php echo base_url('assets/js/jquery/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/chat.js');?>"></script>
</head>
<body>
  <section class="content">
    
    <div class="row">

      <div class="col-md-12">
        <div class="box">
          
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $judul; ?></h3>
            <h4>Pengguna Online : <?php echo $online; ?></h4>
          </div>

          <div class="box-body">
            <textarea id="received" rows="10" cols="80">
            </textarea>
            <form>
              <textarea id="text" type="text" name="user" rows="2" cols="80"></textarea>
              <div class="btn btn-default btn-file">
              
                <i class="fa fa-paperclip"></i>
                <input id="file" type="file" name="file">
                
              </div>
              <input type="submit" value="Kirim">
            </form>
          
          </div>
        
        </div>
      </div>
      
    </div>
    
  </section>
   
</body>
</html>