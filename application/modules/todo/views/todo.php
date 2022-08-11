<link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/datatables/datatables.net-bs4/css/dataTables.bootstrap4.css" />
<link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/datatables/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" />

<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Manage Tasks</h2>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Manage Tasks</a></li>
                <li class="breadcrumb-item active"> Add Manage Tasks</li>
            </ol>
        </nav>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <?php if (!empty($this->session->flashdata('success'))) : ?>
                    <div class="alert alert-contrast alert-success alert-dismissible" role="alert">
                        <div class="icon"><span class="mdi mdi-check"></span></div>
                        <div class="message">
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></button>
                            <strong> <?= $this->session->flashdata('success') ?> </strong>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="card card-table  card-border-color card-border-color-primary">
                    <div class="card-header"> <span class="icon mdi mdi-format-list-bulleted"></span>
                        Add Manage Tasks
                        <a class="btn btn-success float-right ml-3" data-toggle="modal" href="#myModal">
                            <span class="icon mdi mdi-format-indent-increase"></span> Create New Task</a>
                        <a href="<?= bs('todo/completed_tasks') ?>" class="btn btn-info float-right">
                            <span class="icon mdi mdi-assignment-check"></span> All Completed Tasks</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">


                                <table class="table table-striped table-hover table-fw-widget" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Task Name</th>
                                            <th>Task image</th>
                                            <th>Description</th>
                                            <th>Task Status</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($tasks as $task) : ?>

                                            <tr>
                                                <td class="p-name">
                                                    <?= $task->task_name ?>
                                                </td>
                                                <td class="p-team">
                                                    <?php
                                                    if ($task->task_img != '') :
                                                    ?>
                                                        <img src="<?= $task->task_img ?>" alt="task image" width="70">
                                                    <?php
                                                    else :
                                                    ?>
                                                        <img src="<?= base_url() ?>public/b-asset/img/140x140.png" alt="task image" width="60">
                                                    <?php endif;  ?>
                                                </td>
                                                <td>
                                                    <?= $task->description ?>
                                                </td>
                                                <td>
                                                    <span class="btn btn-space btn-outline-info btn-space"><?= $task->task_status ?></span>
                                                </td>
                                                <td>
                                                    <?= date('d-m-Y', strtotime($task->created_at)) ?>
                                                </td>
                                                <td>
                                                    <a href="<?= bs('todo/mark_completed/' . $task->id . '') ?>" class="btn btn-space btn-outline-success btn-space">
                                                        <span class="icon mdi mdi-badge-check"></span> Mark Completed
                                                    </a>
                                                    <a href="#update" data-toggle="modal" edit="<?= $task->id ?>" class="btn btn-outline-primary btn-space update">
                                                        <span class="icon mdi mdi-edit"></span> Edit
                                                    </a>
                                                    <a href="<?= bs('todo/delete/' . $task->id . '') ?>" class="btn btn-space btn-outline-danger btn-space">
                                                        <span class="icon mdi mdi-delete"></span> Delete
                                                    </a>
                                                </td>
                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade colored-header colored-header-primary" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-colored">
                    <h3 class="modal-title"> Create New Task </h3>
                    <button class="close md-close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"> </span></button>
                </div>
                <div class="modal-body">
                    <form action="<?= bs('todo/store') ?>" method="post" enctype="multipart/form-data" class="form-horizontal row-border">
                        <div class="form-group">
                            <label>Task Title</label>
                            <input type="text" class="form-control" name="task_title" placeholder="Enter Task Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="desc" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image (Optional).</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary md-close" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary md-close" type="submit">Proceed</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade colored-header colored-header-primary" id="update" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-colored">
                    <h3 class="modal-title"> Update Task </h3>
                    <button class="close md-close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"> </span></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= bs('todo/update') ?>" enctype="multipart/form-data" class="form-horizontal row-border">
                        <div class="form-group">
                            <label>Task Title</label>
                            <input type="text" class="form-control" name="task_title" id="title" value="" placeholder="Enter Task Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="desc" class="form-control" id="desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image (Optional).</label>
                            <input type="file" class="form-control" name="image">
                            <input type="hidden" name="old_img" value="" id="old_img">
                            <input type="hidden" name="task_id" value="" id="task_id">
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary md-close" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary md-close" type="submit">Proceed</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("body").on('click', '.update', function(event) {
                event.preventDefault();
                // body...
                var id = $(this).attr('edit');

                $.ajax({

                    url: "<?php bs('todo/edit') ?>/" + id,

                    success: function(success) {
                        var obj = $.parseJSON(success);
                        $("#task_id").val(obj.id);
                        $("#title").val(obj.task_name);
                        $("#desc").val(obj.description);
                        $("#old_img").val(obj.task_img);
                    }

                })
            })
        });
    </script>