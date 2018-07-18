
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User List </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12">
          	<!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalLoginForm">
              <i class="fa fa-user-plus"></i>
              Add User
            </button>


            <!-- Modal -->

        <!-- Modal HTML Markup -->
        <div id="ModalLoginForm" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Add User</h1>
                    </div>
                    <div class="modal-body">
                        <!-- form start -->
                        
                        <?php echo form_open('User/signup') ?>
                      <fieldset>
                          <!-- <legend class="text-center">User Registration</legend> -->
                          
                          <?php echo $this->session->flashdata('msg'); ?>
                          <div class="form-group">
                              <div class="row colbox">
                                  <div class="col-12">
                                      <label for="txt_name" class="control-label">Username</label>
                                      <input class="form-control" id="txt_name" name="txt_name" placeholder="Name" type="text" value="<?php echo set_value('txt_name'); ?>" /> 
                                      <span class="text-danger"><?php echo form_error('txt_name'); ?></span>
                                  </div>
                              </div>
                          </div>
                          <!-- user email -->
                          <div class="form-group">
                              <div class="row colbox">
                                  <div class="col-12">
                                      <label for="txt_email" class="control-label"> Email</label>
                                      <input class="form-control" id="txt_email" name="txt_email" placeholder="Email" value="<?php echo set_value('txt_email'); ?>" type="email" />  
                                      <span class="text-danger"><?php echo form_error('txt_email'); ?></span>
                                  </div>
                              </div>
                          </div>
                          <!-- user password -->
                          <div class="form-group">
                              <div class="row colbox">
                                  <div class="col-12">
                                      <label for="txt_password" class="control-label"> Password</label>
                                      <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" value="<?php echo set_value('txt_password'); ?>"/>  
                                      <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
                                  </div>
                              </div>
                          </div>
                          
                          <!-- user confirm password -->
                          <div class="form-group">
                              <div class="row colbox">
                                  <div class="col-12">
                                      <label for="txt_confirm_password" class="control-label">Confirm Password</label>
                                      <input class="form-control" id="txt_confirm_password" name="txt_confirm_password" placeholder="Confirm Password" type="password" value="<?php echo set_value('txt_confirm_password'); ?>"/> 
                                      <span class="text-danger"><?php echo form_error('txt_confirm_password'); ?></span>
                                  </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="row colbox">
                                  <div class="col-12">
                                      <!-- <label for="txt_email" class="control-label"> Email</label> -->
                                      <input class="form-control" id="txt_type" name="txt_type"  value="user" type="hidden" />  
                                  </div>
                              </div>
                          </div>

                          <br>
                          <!-- sigup button -->
                          <div class="form-gruop">
                              <div class="row colbox">
                                  <div class="col-12">
                                      <input id="btn_signup" name="btn_signup" type="submit" class="btn btn-primary col-3 " value="Signup" />
                                      <!-- <br><br> -->
                                      <input type="reset" id="btn_reset" name="btn_reset" class="btn btn-default col-3 float-right" value="Cancel"/>
                                  </div>
                              </div>
                          </div>
                      </fieldset>
                      <?php echo form_close(); ?>




                    <!-- form end -->
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

                <!-- Modal -->



             <!-- <div class="col-12 mt-5 ">
               <div class="bg-light pl-2" style="box-shadow: 0 14px 28px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.22);">
                 jfgh
               </div>
             </div>  
             <div class="col-12 mt-5">
               <div class="bg-light" style="box-shadow: 0 14px 28px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.22);">
                 jfgh
               </div> -->
               <div class="table-responsive mt-5">          
                <table id="userlist" class="display" style="width:100%">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Email</th>
                              
                              <th>Edit</th>
                              <th>Delete</th>
                              
                          </tr>
                      </thead>
                  </table>
                </div>
             </div>  
          </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    $('#userlist').DataTable({
        "ajax": {
            url : "<?php echo site_url("user/show_user") ?>",
            type : 'GET'
        },
    });
});
</script>

 