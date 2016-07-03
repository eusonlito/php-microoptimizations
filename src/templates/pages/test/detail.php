<?php template()->show('molecules.compare', array('test1' => $test->name)); ?>

<div class="text-center">
    <h2><a href="<?= route('/test/detail/'.$test->name) ?>"><?= $test->name ?></a></h2>
    <p><?= $test->description ?></p>
    <hr>
</div>

<pre><?= highlight_string('<?php '."\n\n".$source, true) ?></pre>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Date</th>
            <th>PHP Version</th>
            <th>Loops</th>
            <th>Execution Time</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($results as $result) { ?>
        <tr>
            <th><?= $result->date ?></th>
            <th><?= $result->version ?></th>
            <th><?= $result->loop ?></th>
            <th><?= $result->time ?></th>
        </tr>
        <?php } ?>
    </tbody>
</table>
