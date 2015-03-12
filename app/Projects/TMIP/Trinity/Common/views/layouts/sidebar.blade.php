<div class="sidebar-back"></div>
<div class="sidebar-content">
    <div class="nav-brand">
        <a class="main-brand" href="{{ URL::route('Trinity.index') }}">
            <h1 class="text-light text-white text-left" style="margin-left: 65px;">
                <i id="icon-thecorp_svg" class="icon-thecorp_svg" style="font-size: 60px;"></i>
                <span style="position: absolute; font-size: 15px; margin-left: 3px;"><strong>The</strong></span>
                <span style="position: absolute; font-size: 15px; margin-left: 3px; margin-top: 16px;"><strong>Mandarin</strong></span>
                <span style="position: absolute; font-size: 15px; margin-left: 3px; margin-top: 32px;"><strong>Integration</strong></span>
                <span style="position: absolute; font-size: 15px; margin-left: 3px; margin-top: 48px;"><strong>Platform</strong></span>
            </h1>
        </a>
    </div>
    <?php
        $tokens = explode('/', Request::url());
    ?>
    @include('Trinity'.$tokens[3].'View::layouts.sidebar')
</div>

