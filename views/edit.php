<?php init_head(); ?>
<?php $car = $car ?? null; ?>

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
                                        <h4 class="mt0"><?php echo isset($car) ? _l('edit_car') : _l('add_car'); ?></h4>
                                    </div>
                                    <?php if (isset($car)) { ?>
                                        <div class="col-md-4">
                                            <span class="pull-right header-btn-new">
                                                <a href="<?php echo admin_url('projects/project?car_id=' . $car->id); ?>" class="btn btn-info pull-left display-block">
                                                    <?php echo _l('car_create_project'); ?>
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </a>
                                            </span>
                                        </div>
                                    <?php } ?>
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
                        <form method="post">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                value="<?= $this->security->get_csrf_hash(); ?>" />

                            <div class="form-group">
                                <label><?php echo _l('car_owner'); ?></label>
                                <select name="client_id" class="form-control">
                                    <option value=""><?php echo _l('car_owner_select'); ?></option>
                                    <?php foreach ((array) ($clients ?? []) as $client) {
                                        $client_id = is_array($client) ? ($client['userid'] ?? $client['id'] ?? '') : ($client->userid ?? $client->id ?? '');
                                        $company = is_array($client) ? ($client['company'] ?? '') : ($client->company ?? '');
                                        $first = is_array($client) ? ($client['firstname'] ?? '') : ($client->firstname ?? '');
                                        $last = is_array($client) ? ($client['lastname'] ?? '') : ($client->lastname ?? '');
                                        $name = trim($company);
                                        if ($name === '') {
                                            $name = trim($first . ' ' . $last);
                                        }
                                    ?>
                                        <option value="<?= html_escape($client_id); ?>" <?= isset($car) && $car->client_id == $client_id ? 'selected' : ''; ?>>
                                            <?= html_escape($name); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><?php echo _l('car_license_plate'); ?></label>
                                <input type="text" name="license_plate" class="form-control" value="<?= isset($car) ? $car->license_plate : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo _l('car_vin'); ?></label>
                                <input type="text" name="vin" class="form-control" value="<?= isset($car) ? $car->vin : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo _l('car_make'); ?></label>
                                <input type="text" name="make" class="form-control" value="<?= isset($car) ? $car->make : '' ?>">
                            </div>
                            <div class="form-group">
                                <label><?php echo _l('car_type'); ?></label>
                                <input type="text" name="type" class="form-control" value="<?= isset($car) ? $car->type : '' ?>">
                            </div>
                            <div class="form-group">
                                <label><?php echo _l('car_model'); ?></label>
                                <input type="text" name="model" class="form-control" value="<?= isset($car) ? $car->model : '' ?>">
                            </div>
                            <div class="form-group">
                                <label><?php echo _l('car_year'); ?></label>
                                <input type="number" name="year" class="form-control" value="<?= isset($car) ? $car->year : '' ?>">
                            </div>
                            <div class="form-group">
                                <label><?php echo _l('car_color'); ?></label>
                                <input type="text" name="color" class="form-control" value="<?= isset($car) ? $car->color : '' ?>">
                            </div>
                            <div class="form-group">
                                <label><?php echo _l('car_engine_displacement'); ?></label>
                                <input type="number" name="engine_displacement" class="form-control" value="<?= isset($car) ? $car->engine_displacement : '' ?>">
                            </div>
                            <div class="form-group">
                                <label><?php echo _l('car_fuel_type'); ?></label>
                                <select name="fuel_type" class="form-control">
                                    <?php
                                    $fuel_options = ['petrol', 'diesel', 'hybrid', 'electric', 'lpg', 'cng', 'other'];
                                    $selected_fuel = isset($car) ? $car->fuel_type : '';
                                    ?>
                                    <option value=""><?php echo _l('car_fuel_type_select'); ?></option>
                                    <?php foreach ($fuel_options as $option) { ?>
                                        <option value="<?= $option; ?>" <?= $selected_fuel === $option ? 'selected' : ''; ?>><?= _l('car_fuel_' . $option); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><?php echo _l('car_power_kw'); ?></label>
                                <input type="number" name="power_kw" class="form-control" value="<?= isset($car) ? $car->power_kw : '' ?>">
                            </div>
                            <div class="form-group">
                                <label><?php echo _l('car_engine_code'); ?></label>
                                <input type="text" name="engine_code" class="form-control" value="<?= isset($car) ? $car->engine_code : '' ?>">
                            </div>
                            <div class="form-group">
                                <label><?php echo _l('car_body_style'); ?></label>
                                <input type="text" name="body_style" class="form-control" value="<?= isset($car) ? $car->body_style : '' ?>">
                            </div>
                            <div class="form-group">
                                <label><?php echo _l('car_inspection_valid_until'); ?></label>
                                <input type="date" name="inspection_valid_until" class="form-control" value="<?= isset($car) ? $car->inspection_valid_until : '' ?>">
                            </div>
                            <div class="form-group">
                                <label><?php echo _l('car_coating_type'); ?></label>
                                <select name="coating_type" class="form-control">
                                    <?php
                                    $coating_options = ['none', 'ceramic', 'wax', 'ppf', 'other'];
                                    $selected_coating = isset($car) ? $car->coating_type : 'none';
                                    ?>
                                    <?php foreach ($coating_options as $option) { ?>
                                        <option value="<?= $option; ?>" <?= $selected_coating === $option ? 'selected' : ''; ?>><?= _l('car_coating_' . $option); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><?php echo _l('car_data_source'); ?></label>
                                <select name="data_source" class="form-control">
                                    <?php
                                    $data_sources = ['vin_decode', 'manual'];
                                    $selected_source = isset($car) ? $car->data_source : '';
                                    ?>
                                    <option value=""><?php echo _l('car_data_source_select'); ?></option>
                                    <?php foreach ($data_sources as $option) { ?>
                                        <option value="<?= $option; ?>" <?= $selected_source === $option ? 'selected' : ''; ?>><?= _l('car_data_source_' . $option); ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success"><?php echo isset($car) ? _l('update') : _l('add'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>

</body>

</html>
