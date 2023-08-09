@section('sidebar')

<!-- start: sidebar -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar__header">
    <a class="sidebar__brand" href="/">
      <img src="{{url('Dashboard')}}/images/logo/forms-logo.png" alt="FORMS">
      <span>FORMS</span>
    </a>
  </div>
  <div class="sidebar__nav">
    <ul class="nav__links">
        <li class="nav__divider">
            <div class="divider__title">Project </div>
            <hr class="separate">
        </li>

        @foreach ($projekUser as $projekUser)
        @if ($projekUser->nama_projek == "Greenland")
        <li class="nav__item dropdown">
            <a class="nav__link" href="#">
               Greenland
            </a>
            <ul class=" dropdown__menu">

                <li class="nav__item">
                    <a class="nav__link" href="/dashboard-admin/{{ $projekUser->nama_projek }}">
                        <i class="bi bi-speedometer2"></i>
                        <span class="" >Dashboard</span>
                    </a>
                </li>



                @if ($user->kategori == "SuperAdmin" ||
                $user->kategori =="AdminAccounting" ||
                $user->kategori =="AdminFormsLiving")
                <li class="nav__item">
                    <a class="nav__link" href="/rumah-admin/{{ $projekUser->nama_projek }}">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span class="" >Rumah</span>
                    </a>
                </li>
                @endif

                @if (
                    $user->kategori == "SuperAdmin" ||
                    $user->kategori =="AdminAccounting" ||
                    $user->kategori =="AdminFormsLiving"
                    )
                <li class="nav__item">
                    <a class="nav__link" href="/surat-pemesanan-rumah-admin/{{ $projekUser->nama_projek }}">
                        <i class="bi bi-file"></i>
                        <span class="" >Surat Pemesanan Rumah</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        @if ($projekUser->nama_projek == "Kalm")

        <li class="nav__item dropdown">
            <a class="nav__link" href="#">
               Kalm
            </a>
            <ul class=" dropdown__menu">

                <li class="nav__item">
                    <a class="nav__link" href="/dashboard-admin/{{ $projekUser->nama_projek }}">
                        <i class="bi bi-speedometer2"></i>
                        <span class="" >Dashboard</span>
                    </a>
                </li>


                @if ($user->kategori == "SuperAdmin" ||
                $user->kategori =="AdminAccounting" ||
                $user->kategori =="AdminFormsLiving")
                <li class="nav__item">
                    <a class="nav__link" href="/rumah-admin/{{ $projekUser->nama_projek }}">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span class="" >Rumah</span>
                    </a>
                </li>
                @endif

                @if (
                    $user->kategori == "SuperAdmin" ||
                    $user->kategori =="AdminAccounting" ||
                    $user->kategori =="AdminFormsLiving"
                    )
                <li class="nav__item">
                    <a class="nav__link" href="/surat-pemesanan-rumah-admin/{{ $projekUser->nama_projek }}">
                        <i class="bi bi-file"></i>
                        <span class="" >Surat Pemesanan Rumah</span>
                    </a>
                </li>
                @endif
                @if (
                    $user->kategori == "SuperAdmin" ||
                    $user->kategori =="AdminAccounting"||
                    $user->kategori =="AdminFormsLiving"
                    )
                <li class="nav__item">
                    <a class="nav__link" href="{{ route('preOrder.admin',$projekUser->nama_projek) }}">
                        <i class="bi bi-file"></i>
                        <span class="" >Pre Order</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif


        @endforeach

        @if (
            $user->kategori == "SuperAdmin" ||
            $user->kategori =="AdminFormsLiving"
            )

            <li class="nav__divider">
                <div class="divider__title">Optional</div>
                <hr class="separate">
              </li>
              <li class="nav__item">
                <a class="nav__link" href="/user-sales-agent-admin">
                  <i class="fas fa-users    "></i>
                  <span>User Sales / Agent</span>
                </a>
              </li>
        @endif

    </ul>


</div>
</aside>
<!-- end: sidebar -->

@endsection
