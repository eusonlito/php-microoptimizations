<?php template()->show('molecules.compare') ?>

<div class="container block">
    <div class="row">
        <div class="col-sm-8">
            <h4 class="text-xs-center">All tests</h4>

            <div class="form-group">
                <input type="search" value="" placeholder="Filter..." class="form-control" data-filter="#main-list > a" />
            </div>

            <div class="list-group" id="main-list">
                <?php foreach ($TESTS as $test) { ?>
                <a href="<?= route('/test/detail/'.$test->name) ?>" class="list-group-item">
                    <h4 class="list-group-item-heading"><?= $test->name ?></h4>
                    <p class="list-group-item-text"><?= $test->description ?></p>
                </a>
                <?php } ?>
            </div>
        </div>

        <div class="col-sm-4">
            <h4 class="text-xs-center">Top comparisons</h4>

            <div class="list-group">
                <?php foreach ($top as $group) { ?>
                <a href="<?= route('/test/compare/'.$group->name1.'/'.$group->name2); ?>" class="list-group-item">
                   <?= $group->name1; ?> vs <?= $group->name2; ?>
                </a>
                <?php } ?>
            </div>

            <br /><h4 class="text-xs-center">Common comparisons</h4>

            <div class="list-group">
                <?php foreach ($common as $group) { ?>
                <a href="<?= route('/test/compare/'.$group[0].'/'.$group[1]); ?>" class="list-group-item">
                   <?= $group[0]; ?> vs <?= $group[1]; ?>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
