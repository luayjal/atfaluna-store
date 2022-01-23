</div>
<!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->
</div>
</div>
<!-- [ Main Content ] end -->
<!-- Warning Section start -->
<!-- Older IE warning message -->
<!--[if lt IE 11]>
<div class="ie-warning">
<h1>Warning!!</h1>
<p>You are using an outdated version of Internet Explorer, please upgrade
   <br/>to any of the following web browsers to access this website.
</p>
<div class="iew-container">
    <ul class="iew-download">
        <li>
            <a href="http://www.google.com/chrome/">
                <img src="assets/images/browser/chrome.png" alt="Chrome">
                <div>Chrome</div>
            </a>
        </li>
        <li>
            <a href="https://www.mozilla.org/en-US/firefox/new/">
                <img src="assets/images/browser/firefox.png" alt="Firefox">
                <div>Firefox</div>
            </a>
        </li>
        <li>
            <a href="http://www.opera.com">
                <img src="assets/images/browser/opera.png" alt="Opera">
                <div>Opera</div>
            </a>
        </li>
        <li>
            <a href="https://www.apple.com/safari/">
                <img src="assets/images/browser/safari.png" alt="Safari">
                <div>Safari</div>
            </a>
        </li>
        <li>
            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                <img src="assets/images/browser/ie.png" alt="">
                <div>IE (11 & above)</div>
            </a>
        </li>
    </ul>
</div>
<p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->

<!-- Required Js -->

<script src="{{ asset('dashboard/assets/js/vendor-all.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/select2.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/ripple.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/menu-setting.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

@if(session('status'))

<script>
swal("{{ session('status') }}");
</script>
@endif
<script>
    var expanded = false;

    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>
</body>
@yield('scripts')
</html>
