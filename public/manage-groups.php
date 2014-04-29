<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/db-connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php $page = "manage-groups.php"; ?>

<!-- Query database for all users -->
<?php $users_list = get_all_users(); ?>

<?php include('../includes/layouts/header.php'); ?>

<body>

<div id="wrapper">

  <!-- Sidebar -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Test Builder Pro - Admin</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <?php include('../includes/layouts/admin-side-nav.php'); ?>

      <ul class="nav navbar-nav navbar-right navbar-user">
        <li class="dropdown user-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
            <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
  <div id="page-wrapper">
    
    <div class="row">
      <div class="col-lg-12">
        <h1>Manage Groups <small>Control Panel</small></h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="icon-dashboard"></i> Dashboard</a></li>
          <li class="active"><i class="icon-file-alt"></i> Manage Groups</li>
        </ol>

        <!-- Display conditional messages -->
        <?php echo user_form_success_msg(); ?>
        <?php echo delete_failure_msg(); ?>

        <div class="clearfix"></div>

        <div class="row">
          <div class="col-lg-4 pull-right">
            <form role="form">
              <label>Find Group by Name</label>
              <div class="form-group input-group">
                <input type="text" class="form-control" placeholder="Enter Group Name">
                <span class="input-group-btn">
                  <button class="btn btn-default"  type="button"><i class="fa fa-search"></i></button>
                </span>
              </div>
            </form>
          </div>
        </div>

        <h2>Group List</h2>
        
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped tablesorter">
              <thead>
                <tr>
                  
                  <th>Group ID <i class="fa fa-sort"></i></th>
                  <th>Group Name <i class="fa fa-sort"></i></th>
                  <th>Number of Members <i class="fa fa-sort"></i></th>
                  <th>Assign</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody id="user-rows">     

              <?php

                $row = mysqli_fetch_assoc($users_list);

              ?>

                  <tr>
                    <td>1</td>
                    <td>CSCI 101</td>
                    <td>27</td>
                    <td>
                        <a href="assign-group.php" ><i class="fa fa-user fa-2x"></i> Assign</a>                
                    </td>
                    <td>
                        <a href="edit-group.php?user_id=<?php echo htmlentities($row['user_id']); ?>" ><i class="fa fa-edit fa-2x"></i> Edit</a>                
                    </td>
                    <td>
                        <a data-toggle="modal" data-target="#confirm-delete-modal"><i class="fa fa-trash-o fa-2x"></i> Delete</a>
                    </td>
                  </tr>

                  <tr>
                    <td>5</td>
                    <td>EDU 217</td>
                    <td>45</td>
                    <td>
                        <a href="assign-group.php" ><i class="fa fa-user fa-2x"></i> Assign</a>                
                    </td>
                    <td>
                        <a href="edit-group.php?user_id=<?php echo htmlentities($row['user_id']); ?>" ><i class="fa fa-edit fa-2x"></i> Edit</a>                
                    </td>
                    <td>
                        <a data-toggle="modal" data-target="#confirm-delete-modal"><i class="fa fa-trash-o fa-2x"></i> Delete</a>
                    </td>
                  </tr>

                  <tr>
                    <td>6</td>
                    <td>MAT 501</td>
                    <td>33</td>
                    <td>
                        <a href="assign-group.php" ><i class="fa fa-user fa-2x"></i> Assign</a>                
                    </td>
                    <td>
                        <a href="edit-group.php?user_id=<?php echo htmlentities($row['user_id']); ?>" ><i class="fa fa-edit fa-2x"></i> Edit</a>                
                    </td>
                    <td>
                        <a data-toggle="modal" data-target="#confirm-delete-modal"><i class="fa fa-trash-o fa-2x"></i> Delete</a>
                    </td>
                  </tr>

                

                  <!-- Confirm Deletion Modal -->
                  <div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="confirm-delate-label">Warning!</h4>
                        </div>
                        <div class="modal-body">
                          You are about to delete a user. This action will be irreversible.<br />
                          Do you wish to proceed?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                          <a href="delete-user.php?user_id=<?php echo $row["user_id"]; ?>" class="btn btn-primary">Yes</a>
                        </div>
                      </div>
                    </div>
                  </div><!-- /.modal fade -->
              
              <?php
                // Release the returned data
                mysqli_free_result($users_list);
              ?>
        
              </tbody>
            </table>
          </div><!-- /.table-responsive -->
      </div>
    </div><!-- /.row -->

  </div><!-- /#page-wrapper -->

<?php include('../includes/layouts/footer.php'); ?>
<?php require_once("../includes/db-connection-close.php"); ?>