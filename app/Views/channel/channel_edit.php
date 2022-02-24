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
                    <form method="post" id="edit_channel_form" name="edit_channel_form"
                          action="<?= base_url('/channel-update') ?>">

                        <input type="hidden" name="id" id="id" value="<?php echo $channel_detail['id']; ?>">

                        <div class="form-group">
                            <label>Channel Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $channel_detail['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <select name="country_id" class="form-control">
                                <option value="">Select Country</option>
                                <?php if ($countries): ?>
                                    <?php foreach ($countries as $key => $country): ?>
                                        <option value="<?php echo $country['id']; ?>" <?php if ($channel_detail['country_id']==$country['id']): echo "selected"; ?> <?php endif; ?>><?php echo $country['country_name']; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Channel M3U8 Url</label>
                            <input type="text" name="channel_url" class="form-control" value="<?php echo $channel_detail['channel_url']; ?>">
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
    if ($("#edit_channel_form").length > 0) {
        $("#edit_channel_form").validate({
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