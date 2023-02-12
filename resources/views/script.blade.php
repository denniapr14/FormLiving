@section('script')
<script>
    function validatePassword(id,span) {
      const password = document.getElementById(id).value;
      var span = document.getElementById(span);
      const regex = /^[a-zA-Z0-9]{6,}$/;
      if (regex.test(password)) {
        span.textContent = "Password can be used";
        span.style.color = "green"
    } else {
        span.textContent = "Password strength to low or password can't use";
        span.style.color = "red"
      }
    }
</script>


@endsection
