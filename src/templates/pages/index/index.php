<div class="box">
    <?php template()->show('molecules.compare') ?>

    <?php foreach ($TESTS as $test) { ?>
    <div class="text-center">
        <h2><a href="<?= route('/test/detail/'.$test->name) ?>"><?= $test->name ?></a></h2>
        <p><?= $test->description ?></p>
        <a href="<?= route('/test/detail/'.$test->name) ?>" class="btn btn-default btn-lg">Details</a>
        <hr>
    </div>
    <?php } ?>
</div>