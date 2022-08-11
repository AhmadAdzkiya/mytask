<link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/datatables/datatables.net-bs4/css/dataTables.bootstrap4.css" />
<link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/datatables/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" />

<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Completed Tasks</h2>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Completed Tasks</a></li>
                <li class="breadcrumb-item active"> All Completed Tasks</li>
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
                        All Completed Tasks
                        <a class="btn btn-success float-right" href="<?= bs('todo') ?>">
                        <span class="icon mdi mdi-skip-previous"></span> Go Back</a>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($tasks) > 0) : ?>
                                            <?php foreach ($tasks as $task) : ?>
                                                <tr>
                                                    <td class="p-name">
                                                        <?= $task->task_name ?>
                                                    </td>
                                                    <td class="p-team">
                                                        <?php
                                                        if ($task->task_img != '') :
                                                        ?>
                                                            <img src="<?= $task->task_img ?>" alt="task image" width="100">
                                                        <?php
                                                        else :
                                                        ?>
                                                            <img src="<?= base_url() ?>public/img/Task.png" alt="task image" width="100">
                                                        <?php endif;  ?>
                                                    </td>
                                                    <td>
                                                        <?= $task->description ?>
                                                    </td>
                                                    <td>
                                                        <span class="label label-primary"><?= $task->task_status ?></span>
                                                    </td>
                                                    <td>
                                                        <?= date('d-m-Y', strtotime($task->created_at)) ?>
                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>

                                        <?php else : ?>
                                            <tr>
                                                <td>
                                                    No Task Completed Yet
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>