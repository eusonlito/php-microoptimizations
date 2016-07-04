<?php template()->show('molecules.compare', array(
    'test1' => $test1['test']->name,
    'test2' => $test2['test']->name
)); ?>

<div class="container block">
    <div class="row">
        <div class="col-sm-6">
            <?php template()->show('pages.test._detail', array(
                'test' => $test1['test'],
                'source' => $test1['source'],
                'results' => $test1['results']
            )); ?>
        </div>

        <div class="col-sm-6">
            <?php template()->show('pages.test._detail', array(
                'test' => $test2['test'],
                'source' => $test2['source'],
                'results' => $test2['results']
            )); ?>
        </div>
    </div>
</div>