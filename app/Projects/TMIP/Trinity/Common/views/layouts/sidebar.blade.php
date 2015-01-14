<div id="sidebar">
    <div class="sidebar-back"></div>
    <div class="sidebar-content">
        <div class="nav-brand">
            <a class="main-brand" href="{{ URL::route('Trinity.index') }}">
                {{ HTML::image('TMIP/Trinity/img/logos/logo_sidebar_top.png') }}
            </a>
        </div>
        <?php
            $tokens = explode('/', Request::url());
        ?>
        @include('Trinity'.$tokens[3].'View::layouts.sidebar')
    </div>
</div>