<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('dist/css/lib/bootstrap.min.css');?>" type="text/css" rel="stylesheet">
    <!-- Swipe core CSS -->
    <link href="<?php echo base_url('dist/css/swipe.min.css'); ?>" type="text/css" rel="stylesheet">
    <!-- Favicon -->
    <link href="<?php echo base_url('dist/img/favicon.png'); ?>" type="image/png" rel="icon">
  </head>
  <body>
    <main>
      <div class="layout">
        
        <div class="sidebar" id="sidebar"></div>
        
          
        <div class="main">
          <div class="tab-content" id="nav-tabContent">
            <!-- Start of Babble -->
            <div class="babble tab-pane fade active show" id="list-chat" role="tabpanel" aria-labelledby="list-chat-list">
              <!-- Start of Chat -->
              <div class="chat" id="chat1">
                <div class="top">
                  <div class="container">
                    <div class="col-md-12">
                      <div class="inside">
                        <a href="#"><img class="avatar-md" src="<?php echo base_url('dist/img/avatars/avatar-female-5.jpg'); ?>" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar"></a>
                        <div class="status">
                          <i class="material-icons online">fiber_manual_record</i>
                        </div>
                        <div class="data">
                          <h5><a href="#">Keith Morris</a></h5>
                          <span>Active now</span>
                        </div>

                        <!-- <button class="btn connect d-md-block d-none" name="1"><i class="material-icons md-30">phone_in_talk</i></button>
                        <button class="btn connect d-md-block d-none" name="1"><i class="material-icons md-36">videocam</i></button>
                        <button class="btn d-md-block d-none"><i class="material-icons md-30">info</i></button> -->
                        <div class="dropdown">
                          <a href="<?php echo base_url('login/home'); ?>" type="button" class="dropdown-item connect" >Kembali Menu Utama</a>
                          <!-- <button class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-30">more_vert</i></button> -->
                          <!-- <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item connect" name="1"><i class="material-icons">phone_in_talk</i>Voice Call</button>
                            <button class="dropdown-item connect" name="1"><i class="material-icons">videocam</i>Video Call</button>
                            <hr>
                            <button class="dropdown-item"><i class="material-icons">clear</i>Clear History</button>
                            <button class="dropdown-item"><i class="material-icons">block</i>Block Contact</button>
                            <button class="dropdown-item"><i class="material-icons">delete</i>Delete Contact</button>
                          </div> -->
                        </div>
                      
                      </div>
                    </div>
                  </div>
                </div>
                <div class="content" id="content">
                  <div class="container">
                    <div class="col-md-12">
                      <div class="date">
                        <hr>
                        <span>Yesterday</span>
                        <hr>
                      </div>
                      <div class="message">
                        <img class="avatar-md" src="<?php echo base_url('dist/img/avatars/avatar-female-5.jpg');?>" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                        <div class="text-main">
                          <div class="text-group">
                            <div class="text">
                              <p>We've got some killer ideas kicking about already.</p>
                            </div>
                          </div>
                          <span>09:46 AM</span>
                        </div>
                      </div>
                      <div class="message me">
                        <div class="text-main">
                          <div class="text-group me">
                            <div class="text me">
                              <p>Can't wait! How are we coming along with the client?</p>
                            </div>
                          </div>
                          <span>11:32 AM</span>
                        </div>
                      </div>
                      <div class="message">
                        <img class="avatar-md" src="<?php echo base_url('dist/img/avatars/avatar-female-5.jpg'); ?>" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                        <div class="text-main">
                          <div class="text-group">
                            <div class="text">
                              <p>Coming along nicely, we've got a draft for the client quarries completed.</p>
                            </div>
                          </div>
                          <span>02:56 PM</span>
                        </div>
                      </div>
                      <div class="message me">
                        <div class="text-main">
                          <div class="text-group me">
                            <div class="text me">
                              <p>Roger that boss!</p>
                            </div>
                          </div>
                          <div class="text-group me">
                            <div class="text me">
                              <p>I have already started gathering some stuff for the mood boards, excited to start!</p>
                            </div>
                          </div>
                          <span>10:21 PM</span>
                        </div>
                      </div>
                      <div class="message">
                        <img class="avatar-md" src="<?php echo base_url('dist/img/avatars/avatar-female-5.jpg'); ?>" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                        <div class="text-main">
                          <div class="text-group">
                            <div class="text">
                              <p>Great start guys, I've added some notes to the task. We may need to make some adjustments to the last couple of items - but no biggie!</p>
                            </div>
                          </div>
                          <span>11:07 PM</span>
                        </div>
                      </div>
                      <div class="date">
                        <hr>
                        <span>Today</span>
                        <hr>
                      </div>
                      <div class="message me">
                        <div class="text-main">
                          <div class="text-group me">
                            <div class="text me">
                              <p>Well done all. See you all at 2 for the kick-off meeting.</p>
                            </div>
                          </div>
                          <span>10:21 PM</span>
                        </div>
                      </div>
                      
                      
                      
                    </div>
                  </div>
                </div>
                <div class="container">
                  <div class="col-md-12">
                    <div class="bottom">
                      <form class="position-relative w-100">
                        <textarea class="form-control" placeholder="Start typing for reply..." rows="1"></textarea>
                        <button class="btn emoticons"><i class="material-icons">insert_emoticon</i></button>
                        <button type="submit" class="btn send"><i class="material-icons">send</i></button>
                      </form>
                      <label>
                        <input type="file">
                        <span class="btn attach d-sm-block d-none"><i class="material-icons">attach_file</i></span>
                      </label> 
                    </div>
                  </div>
                </div>
              </div>
              <!-- End of Chat -->
              
            </div>
            <!-- End of Babble -->
            
            
          </div>
        </div>
      </div> <!-- Layout -->
    </main>
    <!-- Bootstrap/Swipe core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('dist/js/jquery-3.3.1.slim.min.js'); ?>" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('dist/js/vendor/jquery-slim.min.js'); ?>"><\/script>')</script>
    <script src="<?php echo base_url('dist/js/vendor/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('dist/js/swipe.min.js');?>"></script>
    <script src="<?php echo base_url('dist/js/bootstrap.min.js'); ?>"></script>
    <!-- <script>
      function scrollToBottom(el) { el.scrollTop = el.scrollHeight; }
      scrollToBottom(document.getElementById('content'));
    </script> -->
  </body>

</html>