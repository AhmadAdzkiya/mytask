<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                All Searched Task List
                <span class="pull-right">
                    <a href="<?= bs('todo/completed_tasks/') ?>" id="loading-btn" class="btn btn-warning btn-xs"><i class="fa fa-refresh"></i> Completed Tasks</a>
                    <a class=" btn btn-success btn-xs" href="<?= base_url('todo') ?>"> All Task</a>
                </span>
                <div class="panel-body">
                    <div class="row">

                        <div class="col-md-12">
                            <form action="<?= bs('todo/search_tasks/search_tasks') ?>" method="get">
                                <div class="input-group"><input type="text" placeholder="Search Here" name="task" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-success"> Go!</button> </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table table-hover p-table">
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
                                            <img src="<?= $task->task_img ?>" alt="task image">
                                        <?php
                                        else :
                                            ?>
                                            <img src="<?= base_url() ?>public/img/Task.png" alt="task image">
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
                                    No Tasks Found
                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>
                </table>
        </section>
        <!-- page end-->


    </section>
</section>
<!--main content end-->