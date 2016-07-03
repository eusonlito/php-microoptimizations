        </div>
    </div>
</div>

<footer role="contentinfo">
    <div class="container">
        <p class="text-center">
            <a href="https://github.com/eusonlito/php-microoptimizations" target="_blank">GitHub</a>
        </p>
    </div>
</footer>

<script type="text/javascript">
var WWW = "<?= route('/') ?>";
</script>

<?= packer()->js(array(
    'https://code.jquery.com/jquery-2.2.0.min.js',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
    '/js/jquery.matchHeight.js',
    '/js/custom.js'
)); ?>
