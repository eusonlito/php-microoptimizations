<div class="box">
    <?php template()->show('molecules.compare', array('test1' => $test->name)); ?>

    <?php template()->show('pages.test._detail', array(
        'test' => $test,
        'source' => $source,
        'results' => $results
    )); ?>
</div>