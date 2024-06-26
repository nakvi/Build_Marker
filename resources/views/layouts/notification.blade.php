@if (Session::has('success'))
    <div class="alert {{ Session::get('alert-class', 'alert-success') }} text-center" id="alert-message">
        {{ Session::get('success') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('alert-message').style.display = 'none';
        }, 5000);
    </script>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger text-center" id="error-message">
        {{ Session::get('error') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('error-message').style.display = 'none';
        }, 15000);
    </script>
@endif
