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
                    <form method="post" id="add_channel_form" name="add_channel_form"
                          action="<?= base_url('/channel-save') ?>">
                        <div class="form-group">
                            <label>Channel Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <select name="country_id" class="form-control">
                                <option value="">Select Country</option>
                                <?php if ($countries): ?>
                                    <?php foreach ($countries as $key => $country): ?>
                                        <option value="<?php echo $country['id']; ?>"><?php echo $country['country_name']; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Channel M3U8 Url</label>
                            <input type="text" name="channel_url" class="form-control">
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
    if ($("#add_channel_form").length > 0) {
        $("#add_channel_form").validate({
            rules: {
                name: {
                    required: true,
                },
                country_id: {
                    required: true
                },
                channel_url: {
                    required: true
                },
            },
            messages: {},
        });
    }
</script>