<meta charset="utf-8">

<title><?= meta()->get('title'); ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?= meta()->tag('title'); ?>

<?= packer()->css(array(
    'https://fonts.googleapis.com/css?family=Montserrat:700',
    'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css',
    '/css/dataTables.bootstrap4.min.css',
    '/css/theme.css',
    '/css/custom.css',
)); ?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<script type="text/javascript">
var WWW = "<?= route('/') ?>";
</script>

<?= packer()->js(array(
    'https://code.jquery.com/jquery-2.2.4.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.2/js/tether.min.js',
    'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js',
    'https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js',
    '/js/dataTables.bootstrap4.min.js',
    '/js/jquery.matchHeight.js',
    '/js/custom.js',
)); ?>
