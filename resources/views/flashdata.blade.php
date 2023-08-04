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
