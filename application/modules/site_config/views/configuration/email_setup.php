<div class="static-content-wrapper">
    <div class="static-content">
        <div class="page-content">
            <ol class="breadcrumb">
              <li class=""><a href="">Home</a></li>
              <li class=""><a href="">Users</a></li>
              <li class="active"><a href="">Create Users</a></li>
            </ol>
            <div class="container-fluid">

              <div class="panel panel-info" data-widget='{"draggable": "false"}'>
                <div class="panel-heading">
                  <i class="fa fa-envelope"></i> Email Members</h2>
                  <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12">
                      <form action="<?= base_url('site_config/Set_up') ?>" method="post" class="form-horizontal row-border">
                <div class="form-group">
                  <label class="col-sm-2 control-label text-info">Usernames to Email </label>
                  <div class="col-sm-8">
                    <input type="text" name="site_name" class="form-control" placeholder="Enter Usersname to Email">
                    <div class="help-block">
                      The title of your site, used for email.
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label text-info">Admin Email</label>
                  <div class="col-sm-8">
                    <input type="text" name="admin_email" class="form-control" placeholder="example@gmail.com">
                    <div class="help-block">
                      Your administrator email address. DEFAULT is 'admin@example.com'.
                    </div>
                  </div>
                </div>
                
                
                <div class="form-group">
                  <label class="col-sm-2 control-label text-info"></label>
                  <div class="col-sm-8">
                    <button type="submit" class="btn btn-toolbar">Set Up</button>
                  </div>
                </div>
              </form>
                    </div>
                  </div>
                </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>

