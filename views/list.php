<?php init_head(); ?>

<div id="wrapper" class="contact_details">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <div class="flex items-center justify-between">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4 class="mt0"><?php echo _l('car_list'); ?></h4>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="pull-right header-btn-new">
                                            <a href="<?php echo admin_url('car/add'); ?>" class="btn btn-info pull-left display-block">
                                                <?php echo _l('add_car'); ?>
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><?php echo _l('id'); ?></th>
                                    <th><?php echo _l('car_license_plate'); ?></th>
                                    <th><?php echo _l('car_vin'); ?></th>
                                    <th><?php echo _l('car_make'); ?></th>
                                    <th><?php echo _l('car_model'); ?></th>
                                    <th><?php echo _l('car_owner'); ?></th>
                                    <th><?php echo _l('car_inspection_valid_until'); ?></th>
                                    <th><?php echo _l('actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($cars)) { ?>
                                    <?php foreach ($cars as $car) { ?>
                                        <tr>
                                            <td><?= $car['id'] ?></td>
                                            <td><?= $car['license_plate'] ?></td>
                                            <td><?= $car['vin'] ?></td>
                                            <td><?= $car['make'] ?></td>
                                            <td><?= $car['model'] ?></td>
                                            <td><?= html_escape($client_lookup[$car['client_id']] ?? '-'); ?></td>
                                            <td><?= $car['inspection_valid_until'] ?></td>
                                            <td>
                                                <a href="<?= admin_url('car/edit/' . $car['id']) ?>" class="btn btn-sm btn-warning"><?php echo _l('edit'); ?></a>
                                                <a href="<?= admin_url('car/delete/' . $car['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('<?php echo _l('confirm_delete'); ?>')"><?php echo _l('delete'); ?></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="8" class="text-center"><?php echo _l('no_records_found'); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>

</body>

</html>
