<?php template()->show('molecules.compare') ?>

<div class="container block">
    <div class="row">
        <div class="col-sm-8">
            <h4 class="text-xs-center">All tests</h4>

            <div class="list-group">
                <?php foreach ($TESTS as $test) { ?>
                <a href="<?= route('/test/detail/'.$test->name) ?>" class="list-group-item">
                    <div class="card-block">
                        <h4 class="list-group-item-heading"><?= $test->name ?></h4>
                        <p class="list-group-item-text"><?= $test->description ?></p>
                    </div>
                </a>
                <?php } ?>
            </div>
        </div>

        <div class="col-sm-4">
            <h4 class="text-xs-center">Common comparisons</h4>

            <div class="list-group">
                <?php foreach (App\Repository\TestComparison::get() as $group) { ?>
                <a href="<?= route('/test/compare/'.$group[0].'/'.$group[1]); ?>" class="list-group-item">
                   <?= $group[0]; ?> vs <?= $group[1]; ?>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
