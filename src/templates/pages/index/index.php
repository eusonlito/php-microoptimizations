<form method="get">
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <select name="test1" class="form-control">
                    <?php foreach ($tests as $name) { ?>
                    <option><?= $name ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="form-group">
                <select name="test2" class="form-control">
                    <?php foreach ($tests as $name) { ?>
                    <option><?= $name ?></option>
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

<?php foreach ($tests as $test) { ?>
<div class="text-center">
    <h2><a href="<?= route('/test/detail/'.$name) ?>"><?= $name ?></a></h2>
    <p><?= $test->getDescription() ?></p>
    <a href="<?= route('/test/detail/'.$name) ?>" class="btn btn-default btn-lg">Details</a>
    <hr>
</div>
<?php } ?>