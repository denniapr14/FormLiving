@extends('HomeLayout.app')
@extends('HomeLayout.navbar')

@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@extends('script')
@extends('flashdata')
@section('tittle','Forms | Daftar Sales')
@section('body','')


@section('content')
<style>
    span {
        color: red;
    }
</style>


<div class="container-fluid pb-0 login">
    <div class="row">
        <div class="col-12 col-lg-6 ps-0 d-none d-lg-block">
            <img src="{{ asset('Home') }}/images/img-sign-up.png" class="w-100" alt="Sign In">
        </div>
        <div class="col-12 col-lg-6">
            <div class="login-content">
                <div class="ornament one">
                    <img src="{{ asset('Home') }}/images/img-ornament2.png" alt="">
                </div>
                <div class="ornament two">
                    <img src="{{ asset('Home') }}/images/img-ornament2.png" alt="">
                </div>
                <div class="logo">
                    <img src="{{ asset('Home') }}/images/logo-forms-living1.png" alt="">
                </div>

                <div class="forms">
                    <form method="POST" action="{{ route('sign-up.action') }}">
                        @csrf
                        <h5>Register Account</h5>
                        <h6>NB : Required *</h6>
                        <div class="mb-3 form-group">
                            <label for="full-name" class="form-label">Nama Lengkap <span>*</span></label>
                            <input type="text" class="form-control" name="nama" id="full-name" value="{{ old('nama') }}"
                                placeholder="Full Name">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="username" class="form-label">Username<span>*</span></label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" placeholder="Username" value="{{ old('username') }}">
                        </div>
                        @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3 form-group">
                            <label for="email" class="form-label">Email <span>*</span></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                value="{{ old('email') }}">

                        </div>
                        <div class="mb-3 form-group">
                            <label for="phone" class="form-label">Nomor Telepon <span>*</span></label>
                            <input type="tel" class="form-control" name="phone" id="phone"
                                placeholder="Nomor Handphone Aktif" value="{{ old('phone') }}">

                        </div>

                        <div class="mb-3 form-group">
                            <label for="date" class="form-label">Tempat dan Tanggal Lahir <span>*</span></label>
                            <input type="text" class="form-control" name="tempatLahir" id="" placeholder="Tempat Lahir"
                                value="{{ old('tempatLahir') }}">
                            <br>
                            <input type="text" class="form-control" name="tanggalLahir" onclick="(this.type='date')"
                                onblur="(this.type='text')" id="" placeholder="Tanggal Lahir" style="cursor:pointer"
                                value="{{ old('tanggalLahir') }}">
                        </div>

                        <div class="mb-3 form-group">
                            <label for="kelamin" class="form-label">Jenis Kelamin <span>*</span></label>
                            <select name="kelamin" class="form-select form-control" id="">
                                <option value=""> - Pilih jenis Kelamin - </option>
                                <option value="Laki - Laki" {{ (Input::old("kelamin")=='Laki - Laki' ? "selected" :"")
                                    }}>
                                    Laki - Laki </option>
                                <option value="Perempuan" {{ (Input::old("kelamin")=='Perempuan' ? "selected" :"") }}>
                                    Perempuan </option>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="kelamin" class="form-label">Affiliasi <span>*</span></label>
                            <select name="userTipe" class="form-select form-control" id="">
                                <option value=""> - Pilih Afiliasi - </option>
                                <option value="pelanggan">Self Service</option>
                                <option value="sales">Sales Inhouse</option>
                                <option value="agentWithCompany"> Agen(Xavier marks premier)</option>
                                <option value="agentWithoutCompany"> Non Affiliated Agent</option>
                            </select>

                        </div>


                        <div class="mb-3 form-group">
                            <label for="password" class="form-label">Password <span>*</span></label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" onkeypress="validatePassword('password','spanPwd')">
                            <span id="spanPwd"></span>
                        </div>
                        <div mb-3 form-group>
                            <input type="checkbox" onclick="javacript:EnableDisableButton(this);" />
                            <small>saya menyetujui dan mengisi data saya dengan benar untuk dipergunakan sebagai
                                registrasi</small>
                        </div>
                        <button type="submit" id="btnsignup" class="btn btn-primary w-100 mb-3" disabled>Sign
                            Up</button>
                        <p class="light-grey-color mb-0">Already have an account?
                            <a href="/login" class="primary-color">Sign In</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>

<script type="text/javascript">
    const inputFields = document.querySelectorAll("input, select");
    const submitButton = document.getElementById("btnsignup");
    
    for (let i = 0; i < inputFields.length; i++) {
      inputFields[i].addEventListener("input", () => {
        let allFilled = true;
        for (let j = 0; j < inputFields.length; j++) {
          if (!inputFields[j].value) {
            allFilled = false;
            break;
          }
        }
        if (allFilled) {
          submitButton.removeAttribute("disabled");
        } else {
          submitButton.setAttribute("disabled", "");
        }
      });
    }

  function EnableDisableButton(cb) {

    if (cb.checked == 1) {
         document.getElementById('btnsignup').disabled = false;
    }

    if (cb.checked == 0) {
       document.getElementById('btnsignup').disabled = true;
    }
  }
</script>

@endsection