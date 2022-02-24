<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= esc($title) ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row col-md-12">
                <div class="col-md-2 pull-right">
                    <a href="<?php echo base_url('schedule-program'); ?>"
                       class="btn btn-danger btn-sm">Schedule Programmes</a>
                </div>
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="col-md-12">
                <div class="card">
                    <table class="table table-bordered table-striped" id="schedule-list-tbl">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Channel</th>
                            <th>Program</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($schedules): ?>
                            <?php foreach ($schedules as $key => $schedule): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $schedule['channel_name']; ?></td>
                                    <td><?php echo $schedule['program_name']; ?></td>
                                    <td><?php echo date('Y-m-d', strtotime($schedule['date'])); ?></td>
                                    <td><?php echo date('H:i A', strtotime($schedule['start_time'])); ?></td>
                                    <td><?php echo date('H:i A', strtotime($schedule['end_time'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    $(document).ready(function () {

        $("#schedule-list-tbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        });
    });
</script>