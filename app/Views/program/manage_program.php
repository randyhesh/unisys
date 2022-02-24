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
                    <a href="<?php echo base_url('program-add-view'); ?>"
                       class="btn btn-primary btn-sm">Add Program</a>
                </div>
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="col-md-12">
                <div class="card">
                    <table class="table table-bordered table-striped" id="program-list-tbl">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Channel</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($programs): ?>
                            <?php foreach ($programs as $key => $program): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $program['name']; ?></td>
                                    <td><?php echo $program['channel_name']; ?></td>                                    
                                    <td>
                                        <a href="<?php echo base_url('program-edit-view/' . $program['id']); ?>"
                                           class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?php echo base_url('program-delete/' . $program['id']); ?>"
                                           class="btn btn-danger btn-sm">Delete</a>
                                    </td>
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

        $("#program-list-tbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        });
    });
</script>