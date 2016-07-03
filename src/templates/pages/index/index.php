<div class="box">
    <?php template()->show('molecules.compare') ?>

    <div class="col-sm-8">
        <?php foreach ($TESTS as $test) { ?>
        <div class="text-center">
            <h2><a href="<?= route('/test/detail/'.$test->name) ?>"><?= $test->name ?></a></h2>
            <p><?= $test->description ?></p>
            <a href="<?= route('/test/detail/'.$test->name) ?>" class="btn btn-default btn-lg">Details</a>
            <hr>
        </div>
        <?php } ?>
    </div>

    <div class="col-sm-4">
        <h3 class="text-center">Common comparisons</h3>

        <div class="list-group">
            <?php foreach (App\Repository\TestComparison::get() as $group) { ?>
            <a href="<?= route('/test/compare/'.$group[0].'/'.$group[1]); ?>" class="list-group-item">
                <strong><?= $group[0]; ?></strong> vs <strong><?= $group[1]; ?></strong>
            </a>
            <?php } ?>
        </div>
    </div>
</div>