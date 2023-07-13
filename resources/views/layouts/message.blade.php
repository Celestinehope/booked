@if(session('message'))
    <div class="alert alert-success" id="alert-message">
        {{ session('message') }}
    </div>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#alert-message').fadeOut('slow', function() {
                    $(this).remove();
                });
            }, 2000);
        });
    </script>
@endif