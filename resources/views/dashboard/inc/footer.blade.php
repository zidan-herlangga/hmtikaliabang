<footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }} <a
            href="{{ route('frontend.home') }}">{{ config('app.sitesettings')::first()?->site_title ?? 'HMTI Kaliabang' }}</a>.</strong>
    Hak Cipta Dilindungi.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 2.1.0
    </div>
</footer>
