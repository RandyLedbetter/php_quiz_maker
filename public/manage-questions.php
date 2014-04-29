<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/db-connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php $page = "manage-questions.php"; ?>

<!-- Query database for all users -->
<?php $questions_list = get_all_questions(); ?>

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
        <h1>Manage Questions <small>Control Panel</small></h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="icon-dashboard"></i> Dashboard</a></li>
          <li class="active"><i class="icon-file-alt"></i> Manage Questions</li>
        </ol>

        <!-- Display conditional messages -->
        <?php echo user_form_success_msg(); ?>
        <?php echo delete_failure_msg(); ?>

        <div class="clearfix"></div>

       <div class="clearfix"></div>
      <div class="col-lg-12">
        <div class="row">
        <div class="panel tbp-panel-inverse">
          <div class="panel-heading">
            <h3 class="panel-title"><strong>Filter Questions</strong></h3>
          </div>
          <div class="panel-body">
            <div class="row">

              <div class="col-lg-3">
                <label class="control-label">Display</label>
                <div>
                <select class="form-control">
                  <option>All</option>
                  <option>Unused</option>
                </select>
                </div>
              </div>

              <div class="col-lg-3">
                <label class="control-label">Question Type</label>
                <div>
                <select class="form-control">
                  <option>All</option>
                  <option>Multiple Choice</option>
                  <option>Essay</option>
                </select>
                </div>
              </div>

              <div class="col-lg-3">
                <label class="control-label">Category</label>
                <div>
                <select class="form-control">
                  <option>All</option>
                </select>
                </div>
              </div>

              <div class="col-lg-3">
                <form role="form">
                  <label class="control-label">Search</label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search by Keyword">
                    <span class="input-group-btn">
                      <button class="btn btn-default"  type="button"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
             
           
        <h2>Question List</h2>
        
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped tablesorter">
              <thead>
                <tr>
                  
                  <th>Question ID <i class="fa fa-sort"></i></th>
                  <th>Question Text <i class="fa fa-sort"></i></th>
                  <th>Type <i class="fa fa-sort"></i></th>
                  <th>Assign</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody id="user-rows">     

              <?php

                while($row = mysqli_fetch_assoc($questions_list)) {

              ?>

                  <tr>
                    <td><?php echo $row['question_id']; ?></td>
                    <td><?php echo $row['question_text']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td>
                        <a href="assign-question.php?question_id=<?php echo htmlentities($row['question_id']); ?>" ><i class="fa fa-user fa-2x"></i> Assign</a>                
                    </td>
                    <td>
                        <a href="edit-question.php?question_id=<?php echo htmlentities($row['question_id']); ?>" ><i class="fa fa-edit fa-2x"></i> Edit</a>                
                    </td>
                    <td>
                        <a data-toggle="modal" data-target="#confirm-delete-modal<?php echo htmlentities($row['question_id']); ?>"><i class="fa fa-trash-o fa-2x"></i> Delete</a>
                    </td>
                  </tr>


                  <!-- Confirm Deletion Modal -->
                  <div class="modal fade" id="confirm-delete-modal<?php echo htmlentities($row['question_id']); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="confirm-delate-label">Warning!</h4>
                        </div>
                        <div class="modal-body">
                          You are about to delete a question and ALL its associated answers. This action will be irreversible.<br />
                          Do you wish to proceed?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                          <a href="delete-questions.php?question_id=<?php echo $row["question_id"]; ?>" class="btn btn-primary">Yes</a>
                        </div>
                      </div>
                    </div>
                  </div><!-- /.modal fade -->
              
              <?php
                }
              ?>
              <?php
                // Release the returned data
                mysqli_free_result($questions_list);
              ?>
        
              </tbody>
            </table>
          </div><!-- /.table-responsive -->
      </div>
    </div><!-- /.row -->

  </div><!-- /#page-wrapper -->

<?php include('../includes/layouts/footer.php'); ?>
<?php require_once("../includes/db-connection-close.php"); ?>