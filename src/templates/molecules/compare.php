<?php
$test1 = isset($test1) ? $test1 : null;
$test2 = isset($test2) ? $test2 : null;
?>

<form method="get" data-action="compare">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <select class="form-control">
                    <option value="">Select a test</option>

                    <?php foreach ($TESTS as $test) { ?>
                    <option <?= ($test->name === $test1) ? 'selected' : '' ?>><?= $test->name ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <select class="form-control">
                    <option value="">Select a test</option>

                    <?php foreach ($TESTS as $test) { ?>
                    <option <?= ($test->name === $test2) ? 'selected' : '' ?>><?= $test->name ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
</form>
