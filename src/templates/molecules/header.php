<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <button class="navbar-toggler hidden-md-up pull-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            ☰
        </button>

        <a class="navbar-brand" href="<?= route('/') ?>">PHP benchmarks and optimizations</a>

        <div class="collapse navbar-toggleable-sm" id="collapsingNavbar">
            <ul class="nav navbar-nav pull-xs-right">
                <li class="nav-item">
                    <a class="nav-link" href="<?= route('/index/about'); ?>">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
