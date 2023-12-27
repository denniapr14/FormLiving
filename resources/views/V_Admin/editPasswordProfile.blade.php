@extends('V_Admin.app')

@extends('flashdata')
@section('title','Form One | Ubah Password')
@section('pageTitle','Ubah Password')
@section('back',route('updatePasswordProfile.admin',Crypt::encrypt($getUser->id_user_admin)) )
@section('breadcrumb','Ubah Password')

@section('content')
{{-- aawww --}}
    <!-- start: main -->


    <!-- start: navbar -->

    <!-- end: navbar -->

    <!-- start: content -->




            <div class="card">
                <div class="card-body">
                    <div class="card-title">

                        Ubah Password

                    </div>
                    <form action="{{ route('updatePasswordProfileAction.admin', Crypt::encrypt($getUser->id_user_admin)) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="username" id="" class="form-control" value="{{ $getUser->username_ua }}" readonly placeholder="Masukan Nama" aria-describedby="helpId">
                          </div>
                        <div class="form-group">
                            <input type="password" name="password" required class="form-control" id="password" placeholder="Masukan Password">
                            <small id="alertPassword" style="color: red"></small>
                        </div>
                        <div class="form-group">
                            <input type="password" name="re-password" required class="form-control" id="rePassword" placeholder="Tulis Ulang Password">
                            <small id="alertRePassword" style="color: red"></small>
                        </div>

                        <button type="submit" id="submitBtn" class="btn btn-primary" disabled>Submit</button>




                    </form>

                </div>

            </div>


        <script>

            var passwordInput = document.getElementById("password");
            var rePasswordInput = document.getElementById("rePassword");

            // Attach oninput event listeners
            passwordInput.addEventListener("input", validatePassword);
            rePasswordInput.addEventListener("input", validatePassword);

            function validatePassword() {
                var password = passwordInput.value;
                var rePassword = rePasswordInput.value;

                // Reset error messages
                document.getElementById("alertPassword").textContent = "";
                document.getElementById("alertRePassword").textContent = "";

                // Password validation criteria: at least one uppercase letter, one number, one symbol
                var passwordRegex = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+])[a-zA-Z0-9!@#$%^&*()_+]+$/;

                if (!password.match(passwordRegex)) {
                    document.getElementById("alertPassword").textContent = "Password must contain at least one uppercase letter, one number, and one symbol.";
                    return;
                }

                if (password !== rePassword) {
                    document.getElementById("alertRePassword").textContent = "Passwords do not match.";
                    return;
                }else{
                    document.getElementById('submitBtn').disabled = false;
                }

                // Clear the error messages if all validations pass
                document.getElementById("alertPassword").textContent = "";
                document.getElementById("alertRePassword").textContent = "";
            }
        </script>

    @endsection
