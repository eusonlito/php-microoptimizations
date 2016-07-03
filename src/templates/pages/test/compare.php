<?php template()->show('molecules.compare', array(
    'test1' => $test1['test']->name,
    'test2' => $test2['test']->name,
)); ?>

<div class="row">
    <?php foreach (array($test1, $test2) as $data) { ?>
    <div class="col-sm-6">
        <div class="text-center" data-mh="comparation-header">
            <h2><a href="<?= route('/test/detail/'.$data['test']->name) ?>"><?= $data['test']->name ?></a></h2>
            <p><?= $data['test']->description ?></p>
        </div>

        <hr /><br />

        <pre data-mh="comparation-source"><?= highlight_string('<?php '."\n\n".$data['source'], true) ?></pre>

        <br />

        <table class="table table-hover" data-mh="comparation-results">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>PHP Version</th>
                    <th>Loops</th>
                    <th>Execution Time</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data['results'] as $result) { ?>
                <tr>
                    <th><?= $result->date ?></th>
                    <th><?= $result->version ?></th>
                    <th><?= $result->loop ?></th>
                    <th><?= $result->time ?></th>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php } ?>
</div>