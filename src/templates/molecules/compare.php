<?php
$test1 = isset($test1) ? $test1 : null;
$test2 = isset($test2) ? $test2 : null;
?>

<form method="get" data-action="compare">
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <select class="form-control">
                    <?php foreach ($TESTS as $test) { ?>
                    <option <?= ($test->name === $test1) ? 'selected' : '' ?>><?= $test->name ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="form-group">
                <select class="form-control">
                    <?php foreach ($TESTS as $test) { ?>
                    <option <?= ($test->name === $test2) ? 'selected' : '' ?>><?= $test->name ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <button type="submit" class="btn btn-default btn-block">Compare</button>
            </div>
        </div>
    </div>
</form>
