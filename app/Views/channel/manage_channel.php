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
                    <a href="<?php echo base_url('channel-add-view'); ?>"
                       class="btn btn-primary btn-sm">Add Channel</a>
                </div>
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="col-md-12">
                <div class="card">
                    <table class="table table-bordered table-striped" id="channel-list-tbl">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Channel</th>
                            <th>Country</th>
                            <th>Channel M3U8 Url</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($channels): ?>
                            <?php foreach ($channels as $key => $channel): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $channel['name']; ?></td>
                                    <td><?php echo $channel['country_name']; ?></td>
                                    <td><?php echo $channel['channel_url']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('channel-edit-view/' . $channel['id']); ?>"
                                           class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?php echo base_url('channel-delete/' . $channel['id']); ?>"
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

        $("#channel-list-tbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        });
    });
</script>