<footer class="app-footer">
    <div class="site-footer-right">
        @if (rand(1,100) == 100)
            <i class="voyager-rum-1"></i> {{ __('voyager::theme.footer_copyright2') }}
        @else
            {!! __('voyager::theme.footer_copyright') !!} 
            <p>
                <a href="https://www.linkedin.com/in/lotte-jeuris-9280a8223/" target="_blank">Lotte Jeuris</a>
                &
                <a href="https://www.linkedin.com/in/yakup-kili%C3%A7-0783a4222/" target="_blank">Yakup Kiliç</a>
            </p>
        @endif
        @php $version = Voyager::getVersion(); @endphp
        @if (!empty($version))
            - {{ $version }}
        @endif
    </div>
</footer>
