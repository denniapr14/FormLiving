@extends('V_Guest.app')

@extends('flashdata')
@section('title', 'Form One | Dashboard')
@section('pageTitle', 'Dashboard')
@section('back', route('dashboard.guest', [$getProjek->nama_projek]))
@section('breadcrumb', 'Dashboard')
{{-- @section('breadcrumb2', 'Ubah Rumah') --}}
@section('content')


    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ganti Password</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('changePasswordAction.guest', $getProjek->nama_projek) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="currentPassword">Kata Kunci Lama</label>
                                <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                            </div>
                            <div class="form-group">
                                <label for="newPassword">Kata Kunci Baru</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="newPassword" name="newPassword" minlength="8" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i id="newPasswordToggle" class="fa fa-eye-slash" onclick="togglePassword('newPassword')"></i>
                                        </span>
                                    </div>
                                </div>
                                <span id="newPasswordValidation" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Validasi Kata Kunci Baru</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" minlength="8" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i id="confirmPasswordToggle" class="fa fa-eye-slash" onclick="togglePassword('confirmPassword')"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="changePasswordBtn">Change Password</button>
                        </form>
                    </div>

                    <script>
                        function togglePassword(inputId) {
                            var input = document.getElementById(inputId);
                            var icon = document.getElementById(inputId + 'Toggle');

                            if (input.type === 'password') {
                                input.type = 'text';
                                icon.classList.remove('fa-eye-slash');
                                icon.classList.add('fa-eye');
                            } else {
                                input.type = 'password';
                                icon.classList.remove('fa-eye');
                                icon.classList.add('fa-eye-slash');
                            }
                        }

                        $(document).ready(function() {
                            $('#changePasswordForm').submit(function(e) {
                                e.preventDefault();
                                var newPassword = $('#newPassword').val();
                                var confirmPassword = $('#confirmPassword').val();

                                if (newPassword !== confirmPassword) {
                                    alert('New password and confirm password do not match.');
                                    return;
                                }

                                if (!/[A-Z]/.test(newPassword) || !/[0-9]/.test(newPassword)) {
                                    $('#newPasswordValidation').text('Password must contain at least one capital letter and one number.');
                                    return;
                                }

                                if (newPassword.length < 8) {
                                    $('#newPasswordValidation').text('Password must be at least 8 characters long.');
                                    return;
                                }

                                // Perform AJAX request to change password
                                // ...
                            });

                            $('#newPassword, #confirmPassword').on('input', function() {
                                var newPassword = $('#newPassword').val();
                                var confirmPassword = $('#confirmPassword').val();
                                var changePasswordBtn = $('#changePasswordBtn');
                                var newPasswordValidation = $('#newPasswordValidation');

                                if (newPassword !== confirmPassword) {
                                    changePasswordBtn.prop('disabled', true);
                                } else {
                                    changePasswordBtn.prop('disabled', false);
                                }

                                if (!/[A-Z]/.test(newPassword) || !/[0-9]/.test(newPassword)) {
                                    newPasswordValidation.text('Password must contain at least one capital letter and one number.');
                                } else if (newPassword.length < 8) {
                                    newPasswordValidation.text('Password must be at least 8 characters long.');
                                } else {
                                    newPasswordValidation.text('');
                                }
                            });
                        });
                    </script>
                </div>

            </div>
        </div>
    </div>

@endsection
