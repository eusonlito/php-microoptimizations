<div class="text-xs-center" data-mh="comparation-header">
    <h2><a href="<?= route('/test/detail/'.$test->name) ?>"><?= $test->name ?></a></h2>
    <p><?= $test->description ?></p>
</div>

<pre data-mh="comparation-source"><?= highlight_string('<?php '."\n\n".$source, true) ?></pre>

<table class="table table-hover datatable">
    <thead>
        <tr>
            <th>PHP</th>
            <th>Loops</th>
            <th>Seconds</th>
            <th>Percent</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($results as $result) { ?>
        <tr>
            <td><?= $result->version ?></td>
            <td><?= number_format($result->loop, 0, ',', '.') ?></td>
            <td><?= sprintf('%0.6f', $result->time) ?></td>

            <?php if ($result->percent == 100) { ?>
            <td class="text-xs-center bg-success"><?= $result->percent ?>%</td>
            <?php } else { ?>
            <td class="text-xs-center bg-danger">+<?= $result->percent ?>%</td>
            <?php } ?>
        </tr>
        <?php } ?>
    </tbody>

    <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </tfoot>
</table>
