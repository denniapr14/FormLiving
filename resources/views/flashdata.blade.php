@section('flashdata')
@if ($message = Session::get('success'))
    <script>
        $(document).ready(function() {
        Toastify({
            text:   '{{ $message }}', // Add single quotes around the variable to make it a valid JavaScript string
            duration: 3000,
            gravity: "top",
            positionLeft: false,
            close: true,
            backgroundColor: "linear-gradient(to right, #8ACCA1, #458f60)",
            stopOnFocus: true
        }).showToast();
    });
    </script>
@endif
@if ($message = Session::get('successPromo'))
<script>
    $(document).ready(function() {
        // Get the success message from the session (you may need to adjust the session key)
        var successMessage = "{{ session('successPromo') }}";

        if (successMessage) {
            // Create a Toastify notification with the success message
            var notification = Toastify({
                text: successMessage,
                duration: 20000,
                gravity: "top",
                positionLeft: false,
                close: true,
                backgroundColor: "linear-gradient(to right, #8ACCA1, #458f60)",
                stopOnFocus: true,
                className: "success-toast", // Add a custom class for styling
                onClick: function() {
                    // Copy the promo code to the clipboard when the notification is clicked
                    copyToClipboard(successMessage);
                }
            });

            // Show the notification
            notification.showToast();
        }
    });

    // Function to copy text to clipboard
    function copyToClipboard(text) {
        var tempInput = document.createElement("input");
        tempInput.value = text;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
        $(document).ready(function() {
            Toastify({
                text:   'Kode Promo telah disalin!', // Add single quotes around the variable to make it a valid JavaScript string
                duration: 3000,
                gravity: "top",
                positionLeft: false,
                close: true,
                backgroundColor: "linear-gradient(to right, #8ACCA1, #458f60)",
                stopOnFocus: true
            }).showToast();
        });
    }

</script>

@endif
@if ($message = Session::get('error'))
    <script>
        $(document).ready(function() {
            Toastify({
                text:   '{{ $message }}', // Add single quotes around the variable to make it a valid JavaScript string
                duration: 3000,
                gravity: "top",
                positionLeft: false,
                close: true,
                backgroundColor: "linear-gradient(to right, #8ACCA1, #b2f7c0)",
                stopOnFocus: true
            }).showToast();
        });
    </script>
@endif

{{--
    @if ($message = Session::get('warning'))

    @endif

    @if ($message = Session::get('info'))

    @endif

    @if ($errors->any())

    @endif  --}}


    {{--  @if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please check the form below for errors</strong>
  {{ implode('', $errors->all(':message')) }}
  {{--  <strong>{{ dd($errors->any()) }}</strong>  --}}
    {{--  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif  --}}
@endsection
