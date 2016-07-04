<?php template()->show('molecules.compare', array('test1' => $test->name)); ?>

<div class="container block">
    <?php template()->show('pages.test._detail', array(
        'test' => $test,
        'source' => $source,
        'results' => $results
    )); ?>
</div>