<div class="text-center">
    <h2><a href="<?= route('/test/detail/'.$test->getName()) ?>"><?= $test->getName() ?></a></h2>
    <p><?= $test->getDescription() ?></p>
    <hr>
</div>

<pre><?= highlight_string('<?php '."\n\n".$test->getSource(), true) ?></pre>