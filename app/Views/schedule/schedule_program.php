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
    <form method="post" id="schedule_program_form" name="schedule_program_form"
          action="<?= base_url('/schedule-save') ?>">
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Channel</label>
                            <select name="channel_id" id="channel_id" class="form-control">
                                <option value="">Select Channel</option>
                                <?php if ($channel_list): ?>
                                    <?php foreach ($channel_list as $key => $channel): ?>
                                        <option value="<?php echo $channel['id']; ?>"><?php echo $channel['name']; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" name="schedule_date" id="schedule_date" readonly class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-md-8">
                        <div class="card">
                            <h5>Programs</h5>

                            <table class="table table-bordered table-striped schedule-program-tbl"
                                   id="schedule-program-tbl">
                                <thead>
                                <tr>
                                    <th>Program</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="schedule-program-tbl-body">
                                
                                </tbody>
                            </table>

                            <div class="form-group col-md-2">
                                <button type="submit" class="btn btn-success btn-block">Save</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <h5>Select Program</h5>
                            <table class="table table-bordered table-striped" id="program-tbl">
                                <thead>
                                <tr>
                                    <th>Program</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="program-tbl-body">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </form>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    $(document).ready(function () {

        $('#schedule_date').datepicker({
            dateFormat: 'yy-mm-dd'
        });

        if ($("#schedule_program_form").length > 0) {
            $("#schedule_program_form").validate({
                rules: {
                    schedule_date: {
                        required: true,
                    },
                    'program_id[]': {
                        required: true
                    },
                    'start_time[]': {
                        required: true
                    },
                    'end_time[]': {
                        required: true
                    },
                    'image[]': {
                        required: true
                    },
                    'description[]': {
                        required: true
                    }
                },
                messages: {},
            });
        }

    });

    $(document).on('change', '#channel_id', function () {
        $.ajax({
            type: 'POST',
            url: js_base_url + '/program-list-channel',
            data: 'channel_id=' + $(this).val(),
            success: function (msg) {
                $('#program-tbl-body').html(msg);
            },
            error: function (msg) {
                alert("Failed to load program");
            }
        });
    });

    function add_program_to_tbl(program_id) {
        $.ajax({
            type: 'POST',
            url: js_base_url + '/program-detail',
            data: 'program_id=' + program_id,
            success: function (msg) {
                $('#schedule-program-tbl-body').append(msg);
                $('#program_' + program_id).remove();
            },
            error: function (msg) {
                alert("Failed to add program");
            }
        });
    }

    function delete_row(program_id) {
        $('#schedule_prg_' + program_id).remove();
    }
</script>