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
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 card">
                    <!-- Small boxes (Stat box) -->
                    <form method="post" id="add_program_form" name="add_program_form"
                          action="<?= base_url('/program-save') ?>">
                        <div class="form-group">
                            <label>Channel</label>
                            <select name="channel_id" class="form-control">
                                <option value="">Select Channel</option>
                                <?php if ($channels): ?>
                                    <?php foreach ($channels as $key => $channel): ?>
                                        <option value="<?php echo $channel['id']; ?>"><?php echo $channel['name']; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Program Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    if ($("#add_program_form").length > 0) {
        $("#add_program_form").validate({
            rules: {
                name: {
                    required: true,
                },
                channel_id: {
                    required: true
                }
            },
            messages: {},
        });
    }
</script>