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
        <div class="divider__title">Home </div>
        <hr class="separate">
      </li>
      @if(Route::current()->getName() == 'dashboard-admin')
      <li class="nav__item">
        <a class="nav__link active" href="/dashboard-admin">
          <i class="bi bi-house-door"></i>
          <span>Dashboard</span>
        </a>
      </li>
      @else
      <li class="nav__item">
        <a class="nav__link" href="/dashboard-admin">
          <i class="bi bi-house-door"></i>
          <span>Dashboard</span>
        </a>
      </li>
      @endif

      @if(Route::current()->getName() == 'sales-analytic')
      <li class="nav__item">
        <a class="nav__link active" href="/sales-analytic">
          <i class="bi bi-pie-chart"></i>
          <span>Sales Analytic</span>
        </a>
      </li>
      @else
      <li class="nav__item">
        <a class="nav__link" href="/sales-analytic">
          <i class="bi bi-pie-chart"></i>
          <span>Sales Analytic</span>
        </a>
      </li>
      @endif



      <li class="nav__divider">
        <div class="divider__title">Pages</div>
        <hr class="separate">
      </li>
      <li class="nav__item dropdown">
        <a class="nav__link" href="#">
          <i class="bi bi-file-earmark-code"></i>
          <span>Living Project Page</span>
        </a>
        <ul class="dropdown__menu">
          <li>
            <a class="dropdown__item" href="/home.html">Home.html</a>
          </li>
          <li>
            <a class="dropdown__item" href="/greenland.html">Greendland.html</a>
          </li>
        </ul>
      </li>
      <li class="nav__divider">
        <div class="divider__title">Properties</div>
        <hr class="separate">
      </li>
      <li class="nav__item">
        <a class="nav__link" href="/projects.html">
          <i class="bi bi-house"></i>
          <span>Projects</span>
        </a>
      </li>
      <li class="nav__item dropdown">
        <a class="nav__link" href="#">
          <i class="bi bi-house"></i>
          <span>Residence</span>
        </a>
        <ul class="dropdown__menu">
          <li>
            <a class="dropdown__item" href="/housing.html">Residence A</a>
          </li>
        </ul>
      </li>
      <li class="nav__item dropdown">
        <a class="nav__link" href="#">
          <i class="bi bi-house"></i>
          <span>Apartment</span>
        </a>
        <ul class="dropdown__menu">
          <li>
            <a class="dropdown__item" href="/apartment.html">Apartment A</a>
          </li>
        </ul>
      </li>
      <li class="nav__item dropdown">
        <a class="nav__link" href="#">
          <i class="bi bi-house"></i>
          <span>Hotel</span>
        </a>
        <ul class="dropdown__menu">
          <li>
            <a class="dropdown__item" href="/hotel.html">Hotel A</a>
          </li>
        </ul>
      </li>
      <li class="nav__item dropdown">
        <a class="nav__link" href="#">
          <i class="bi bi-house"></i>
          <span>Mall</span>
        </a>
        <ul class="dropdown__menu">
          <li>
            <a class="dropdown__item" href="/mall.html">Mall A</a>
          </li>
        </ul>
      </li>
      <li class="nav__divider">
        <div class="divider__title">App</div>
        <hr class="separate">
      </li>
      <li class="nav__item">
        <a class="nav__link" href="/schedule.html">
          <i class="bi bi-calendar4-event"></i>
          <span>Events</span>
        </a>
      </li>
      <li class="nav__divider">
        <div class="divider__title">Modifications</div>
        <hr class="separate">
      </li>
      <li class="nav__item">
        <a class="nav__link" href="/interior.html">
          <i class="bi bi-lamp"></i>
          <span>Interior</span>
        </a>
      </li>
      <li class="nav__item">
        <a class="nav__link" href="/exterior.html">
          <i class="bi bi-shop-window"></i>
          <span>Exterior</span>
        </a>
      </li>
      <li class="nav__item">
        <a class="nav__link" href="/miscellaneous.html">
          <i class="bi bi-boxes"></i>
          <span>Miscellaneous</span>
        </a>
      </li>
      <li class="nav__divider">
        <div class="divider__title">Transactions</div>
        <hr class="separate">
      </li>
      <li class="nav__item">
        <a class="nav__link" href="/order-form.html">
          <i class="bi bi-file-earmark-pdf"></i>
          <span>Order Form</span>
        </a>
      </li>
      <li class="nav__item dropdown">
        <a class="nav__link" href="#">
          <i class="bi bi-file-earmark-pdf"></i>
          <span>Invoice</span>
        </a>
        <ul class="dropdown__menu">
          <li>
            <a class="dropdown__item" href="/invoices.html">Invoice Booking Fee</a>
          </li>
          <li>
            <a class="dropdown__item" href="/invoice-down-payment.html">Invoice Down Payment</a>
          </li>
        </ul>
      </li>
      <li class="nav__item">
        <a class="nav__link" href="/voucher.html">
          <i class="bi bi-ticket-perforated"></i>
          <span>Voucher</span>
        </a>
      </li>
      <li class="nav__item">
        <a class="nav__link" href="/payment-method.html">
          <i class="bi bi-credit-card"></i>
          <span>Bank Partner</span>
        </a>
      </li>
      <li class="nav__item">
        <a class="nav__link" href="/commission-fees.html">
          <i class="bi bi-gear"></i>
          <span>Commission Fees</span>
        </a>
      </li>
      <li class="nav__divider">
        <div class="divider__title">Users</div>
        <hr class="separate">
      </li>
      <li class="nav__item">
        <a class="nav__link" href="/customer.html">
          <i class="bi bi-people"></i>
          <span>Customer</span>
        </a>
      </li>
      <li class="nav__item">
        <a class="nav__link" href="/agents.html">
          <i class="bi bi-people"></i>
          <span>Principal Agent Company</span>
        </a>
      </li>
      <li class="nav__item">
        <a class="nav__link" href="/agent-company.html">
          <i class="bi bi-people"></i><p></p>
          <span>Agent Company</span>
        </a>
      </li>
      <li class="nav__item">
        <a class="nav__link" href="/agent-perorangan.html">
          <i class="bi bi-people"></i>
          <span>Agent Perorangan</span>
        </a>
      </li>
      <li class="nav__item">
        <a class="nav__link" href="/sales-inhouse.html">
          <i class="bi bi-people"></i>
          <span>Sales Inhouse</span>
        </a>
      </li>
      <li class="nav__divider">
        <div class="divider__title">Others</div>
        <hr class="separate">
      </li>
      <li class="nav__item">
        <a class="nav__link" href="/access-control.html">
          <i class="bi bi-shield-lock"></i>
          <span>Access Control</span>
        </a>
      </li>
      <li class="nav__item">
        <a class="nav__link" href="/settings-profile.html">
          <i class="bi bi-gear"></i>
          <span>Account Settings</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
<!-- end: sidebar -->

@endsection
