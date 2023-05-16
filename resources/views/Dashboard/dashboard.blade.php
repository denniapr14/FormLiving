@extends('DashboardLayout.app')
@extends('DashboardLayout.sidebar')
@extends('DashboardLayout.footer')

@section('tittle', 'FORMS | Dashboard')

@section('content')

<!-- start: main -->
<section class="main-content" id="main-content">

  <!-- start: navbar -->
  <div class="navbar-content">
    <a href="#" class="navbar__sidebar-toggler">
      <i class="bi bi-chevron-double-left"></i>
    </a>
    <div class="navbar__right">
      <div class="navbar__items">
        <a href="" class="navbar__link">
          <i class="bi bi-search"></i>
        </a>
        <a href="" class="navbar__link">
          <i class="bi bi-check2-square"></i>
        </a>
        <a href="" class="navbar__link">
          <i class="bi bi-translate"></i>
        </a>
        <a href="" class="navbar__link">
          <i class="bi bi-bell"></i>
          <div class="badge">12</div>
        </a>
      </div>
      <div class="divider"></div>
      <div class="profile__box">
        <div class="profile__info">
          <div class="profile__name">Bambang Gunawan</div>
          <div class="profile__role">Admin</div>
        </div>
        <div class="profile__avatar">
          <img src="{{url('Dashboard')}}/images/content/avatar.png" alt="user-avatar">
        </div>
      </div>
    </div>
  </div>
  <!-- end: navbar -->

  <!-- start: content -->
  <div class="content__wrapper">

    <div class="content__row">
      <div class="content__column">
        <div class="card__box greeting__box">
          <div class="greeting__text">Good Morning 🌞, Super Admin.</div>
          <div class="greeting__date">Monday, 13 June 2022</div>
          <div class="greeting__question">Would you like to see today's sales analysis?</div>
          <a href="/sales-analytic.html" class="btn-fd-outline">See Sales Analytic</a>
          <img src="{{url('Dashboard')}}/images/content/sun_illustration.png" alt="sun_illustration">
        </div>
      </div>
      <div class="content__column">
        <div class="card__box dashboard__box">
          <div class="card__header">
            <div class="card__title">
              <i class="bi bi-lightning-charge"></i>
              <span>Summary</span>
            </div>
            <div class="custom__select custom__select--outline custom__select--outline-small mr-3">
              <select name="sort" id="sort">
                <option selected>Monthly</option>
                <option>Yearly</option>
              </select>
              <span class="custom-arrow"></span>
            </div>
          </div>
          <div class="transaction__listing">
            <div class="transaction__column">
              <div class="transaction__icon transaction__icon--web-page">
                <i class="bi bi-file-earmark-code"></i>
              </div>
              <div class="transaction__count">14</div>
              <div class="transaction__title">Unit Sold</div>
            </div>
            <div class="transaction__column">
              <div class="transaction__icon transaction__icon--customer">
                <i class="bi bi-person"></i>
              </div>
              <div class="transaction__count">51</div>
              <div class="transaction__title">Customer</div>
            </div>
            <div class="transaction__column">
              <div class="transaction__icon transaction__icon--agents">
                <i class="bi bi-person-workspace"></i>
              </div>
              <div class="transaction__count">5</div>
              <div class="transaction__title">Agents</div>
            </div>
            <div class="transaction__column">
              <div class="transaction__icon transaction__icon--invoice">
                <i class="bi bi-file-earmark-pdf"></i>
              </div>
              <div class="transaction__count">30</div>
              <div class="transaction__title">Sales Inhouse</div>
            </div>
            <div class="transaction__column">
              <div class="transaction__icon transaction__icon--order-forms">
                <i class="bi bi-file-earmark-font"></i>
              </div>
              <div class="transaction__count">16</div>
              <div class="transaction__title">Invoice Sent</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="content__row mb-3">
      <div class="card__box">
        <div class="card__header">
          <div class="card__title">
            <i class="bi bi-file-earmark-pdf"></i>
            <span>Invoices</span>
            <a href="/invoices.html" class="btn-fd-outline btn--small">View All</a>
          </div>
          <div class="invoices__actions">
            <a href="#" class="btn-fd-outline btn--small" data-toggle="modal" data-target="#delete-alert">Delete Data</a>
            <a href="#" class="btn-fd-outline btn--small">Resend Data</a>
            <a href="#" class="btn-fd-outline btn--small">Download Data</a>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col"><input class="custom-checkbox custom-checkbox--all" type="checkbox" name="checkall" id="checkall"></th>
                <th scope="col">Invoice ID</th>
                <th scope="col">Name</th>
                <th scope="col" style="width:20px">Email</th>
                <th scope="col">Created Date</th>
                <th scope="col">Order</th>
                <th scope="col">Due Date</th>
                <th scope="col">Invoice</th>
                <th scope="col">Order Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <input class="custom-checkbox"  type="checkbox" name="check">
                </td>
                <td>INV-10001</td>
                <td>
                  <span class="client__name">Client X</span>
                  <span class="client__handled">by Agent (Bambang)</span>
                </td>
                <td>lorem@gmail.com</td>
                <td>01/06/2022</td>
                <td>
                  <div class="badge badge--secondary">processed</div>
                </td>
                <td>02/06/2022</td>
                <td>
                  <div class="d-flex flex-nowrap">
                    <a href="#" class="btn-fd-icon-outline">
                      <i class="bi bi-trash"></i>
                    </a>
                    <a href="#" class="btn-fd-icon-outline">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="#" class="btn-fd-icon-outline">
                      <i class="bi bi-send"></i>
                    </a>
                    <a href="#" class="btn-fd-icon-outline">
                      <i class="bi bi-download"></i>
                    </a>
                  </div>
                </td>
                <td>
                  <label class="custom-dropdown">
                    <div class="cd-button">
                      Actions
                    </div>
                    <input type="checkbox" class="cd-input">
                    <ul class="cd-menu">
                      <li>Marks as delayed</li>
                      <li>Marks as processed</li>
                      <li>Marks as finished</li>
                      <li>Marks as failed</li>
                    </ul>
                  </label>
                </td>
              </tr>
              <tr>
                <td>
                  <input class="custom-checkbox"  type="checkbox" name="check">
                </td>
                <td>INV-10001</td>
                <td>
                  <span class="client__name">Client X</span>
                  <span class="client__handled">by Agent (Bambang)</span>
                </td>
                <td>lorem@gmail.com</td>
                <td>01/06/2022</td>
                <td>
                  <div class="badge badge--success">finished</div>
                </td>
                <td>02/06/2022</td>
                <td>
                  <div class="d-flex flex-nowrap">
                    <a href="#" class="btn-fd-icon-outline">
                      <i class="bi bi-trash"></i>
                    </a>
                    <a href="#" class="btn-fd-icon-outline">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="#" class="btn-fd-icon-outline">
                      <i class="bi bi-send"></i>
                    </a>
                    <a href="#" class="btn-fd-icon-outline">
                      <i class="bi bi-download"></i>
                    </a>
                  </div>
                </td>
                <td>
                  <label class="custom-dropdown">
                    <div class="cd-button">
                      Actions
                    </div>
                    <input type="checkbox" class="cd-input">
                    <ul class="cd-menu">
                      <li>Marks as delayed</li>
                      <li>Marks as processed</li>
                      <li>Marks as finished</li>
                      <li>Marks as failed</li>
                    </ul>
                  </label>
                </td>
              </tr>
              <tr>
                <td>
                  <input class="custom-checkbox"  type="checkbox" name="check">
                </td>
                <td>INV-10001</td>
                <td>
                  <span class="client__name">Client X</span>
                  <span class="client__handled">by Agent (Bambang)</span>
                </td>
                <td>lorem@gmail.com</td>
                <td>01/06/2022</td>
                <td>
                  <div class="badge badge--danger">failed</div>
                </td>
                <td>02/06/2022</td>
                <td>
                  <div class="d-flex flex-nowrap">
                    <a href="#" class="btn-fd-icon-outline">
                      <i class="bi bi-trash"></i>
                    </a>
                    <a href="#" class="btn-fd-icon-outline">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="#" class="btn-fd-icon-outline">
                      <i class="bi bi-send"></i>
                    </a>
                    <a href="#" class="btn-fd-icon-outline">
                      <i class="bi bi-download"></i>
                    </a>
                  </div>
                </td>
                <td>
                  <label class="custom-dropdown">
                    <div class="cd-button">
                      Actions
                    </div>
                    <input type="checkbox" class="cd-input">
                    <ul class="cd-menu">
                      <li>Marks as delayed</li>
                      <li>Marks as processed</li>
                      <li>Marks as finished</li>
                      <li>Marks as failed</li>
                    </ul>
                  </label>
                </td>
              </tr>
              <tr>
                <td>
                  <input class="custom-checkbox"  type="checkbox" name="check">
                </td>
                <td>INV-10001</td>
                <td>
                  <span class="client__name">Client X</span>
                  <span class="client__handled">by Agent (Bambang)</span>
                </td>
                <td>lorem@gmail.com</td>
                <td>01/06/2022</td>
                <td>
                  <div class="badge badge--warning">delayed</div>
                </td>
                <td>02/06/2022</td>
                <td>
                  <div class="d-flex flex-nowrap">
                    <a href="#" class="btn-fd-icon-outline">
                      <i class="bi bi-trash"></i>
                    </a>
                    <a href="#" class="btn-fd-icon-outline">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="#" class="btn-fd-icon-outline">
                      <i class="bi bi-send"></i>
                    </a>
                    <a href="#" class="btn-fd-icon-outline">
                      <i class="bi bi-download"></i>
                    </a>
                  </div>
                </td>
                <td>
                  <label class="custom-dropdown">
                    <div class="cd-button">
                      Actions
                    </div>
                    <input type="checkbox" class="cd-input">
                    <ul class="cd-menu">
                      <li>Marks as delayed</li>
                      <li>Marks as processed</li>
                      <li>Marks as finished</li>
                      <li>Marks as failed</li>
                    </ul>
                  </label>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center align-items-center pt-3">
          <div class="custom__select mr-4">
            <select name="Country" id="country">
              <option value="10">10 per page</option>
              <option value="20">20 per page</option>
              <option value="30">30 per page</option>
              <option value="40">40 per page</option>
              <option value="50">50 per page</option>
            </select>
            <span class="custom-arrow"></span>
          </div>
          <div class="pagination mr-4">
            <span class="current-page">1</span>/
            <span class="total-page">3</span>
          </div>
          <a href="#" class="btn-fd-arrow btn-fd-arrow--previous disabled mr-4">
            <i class="bi bi-chevron-left"></i>
          </a>
          <a href="" class="btn-fd-arrow btn-fd-arrow--next">
            <i class="bi bi-chevron-right"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="content__row">

      <div class="content__column content__column--4">
        <div class="card__box card__box--green">
          <div class="card__header">
            <div class="card__title">
              <div>
                <i class="bi bi-webcam"></i>
                <span>Newly Event</span>
              </div>
              <div class="card__details">Event invitation for this week</div>
            </div>
            <div class="card__badge">1</div>
          </div>
          <div class="card__body">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <div class="schedule__wrapper">
                      <div class="schedule__icon schedule__icon--topic">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="d-inline">
                        <div class="schedule__title">Marketing & Agency Meetup</div>
                        <div class="schedule__details">Laporan akhir bulanan</div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="schedule__wrapper">
                      <div class="schedule__icon schedule__icon--date">
                        <i class="bi bi-calendar4-event"></i>
                      </div>
                      <div class="d-inline">
                        <div class="schedule__title">Senin, 13 Juni 2022</div>
                        <div class="schedule__details">10:00 WIB - 12.00 WIB</div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="schedule__wrapper">
                      <div class="schedule__icon schedule__icon--link">
                        <i class="bi bi-geo-alt"></i>
                      </div>
                      <div class="d-inline">
                        <div class="schedule__title">Google Meet</div>
                        <div class="schedule__details"><a href="#">Click the link here</a></div>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card__footer">
            <a href="#" class="btn-fd-outline">Create New Event</a>
            <a href="#" class="btn-fd-outline">Join Event</a>
          </div>
        </div>
      </div>

      <div class="content__column content__column--6">
        <div class="card__box">
          <div class="card__header">
            <div class="card__title">
              <div>
                <i class="bi bi-file-earmark-pdf"></i>
                <span>Order Form</span>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"><input class="custom-checkbox custom-checkbox--all" type="checkbox" name="checkall" id="checkall"></th>
                  <th scope="col">No Order Form</th>
                  <th scope="col">Agent ID</th>
                  <th scope="col">Client Name</th>
                  <th scope="col">No. Hp</th>
                  <th scope="col">Project Name</th>
                  <th scope="col">Order Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <input class="custom-checkbox"  type="checkbox" name="check" checked>
                  </td>
                  <td>ORF-10001</td>
                  <td>AG-0000001</td>
                  <td>Client A</td>
                  <td>08965123455</td>
                  <td>Araya Hotel</td>
                  <td>
                    <div class="badge badge--success">verified</div>
                  </td>
                  <td>
                      <a href="#" class="btn-fd-icon-outline" data-toggle="modal" data-target="#order-information">
                        <i class="bi bi-eye"></i>
                      </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input class="custom-checkbox"  type="checkbox" name="check">
                  </td>
                  <td>ORF-10002</td>
                  <td>AG-0000001</td>
                  <td>Client B</td>
                  <td>08965123466</td>
                  <td>Araya Hotel</td>
                  <td>
                    <div class="badge">unverified</div>
                  </td>
                  <td>
                      <a href="#" class="btn-fd-icon-outline" data-toggle="modal" data-target="#order-information">
                        <i class="bi bi-eye"></i>
                      </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

  </div>
  <!-- end: content -->

  <!-- start: footer -->
  <section class="footer mt-3">
    <div class="content__row">
      <div class="col-12 p-0">
        <div class="card__box">
          <p class="m-0">Designed by <a class="footer__link" title="Wolftagon" href="https://www.wolftagon.com/">Wolftagon</a></p>
        </div>
      </div>
    </div>
  </section>
  <!-- end: footer -->

</section>
<!-- end: main -->

<!-- Modal -->
<div class="modal modal-sweet-alert modal-sweet-alert--error fade" id="delete-alert" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="delete-alertLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="alert-icon">
          <i class="bi bi-trash"></i>
        </div>
        <h1>Delete Data?</h1>
        <p>You will not able to recover all this invoice!</p>
        <a href="#" class="btn btn-outline-danger" data-dismiss="modal">Cancel</a>
        <a href="#" class="btn btn-danger" data-dismiss="modal">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Change Confirmation-->
<div class="modal modal-sweet-alert modal-sweet-alert--warning fade" id="change-alert" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="change-alertLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="alert-icon">
          <i class="bi bi-exclamation-circle"></i>
        </div>
        <h1>Are you sure want to change status this invoice?</h1>
        <p>You will not able to recover all this invoice!</p>
        <a href="#" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</a>
        <a href="#" class="btn btn-warning" data-dismiss="modal">Change</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal order information-->
<div class="modal modal-form fade" id="order-information" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="order-informationLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Order Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label align-self-center">
              No. Order Form
            </label>
            <div class="col-sm-8 align-self-center">
              <span>ORF-10001</span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label align-self-center">
              Agent ID
            </label>
            <div class="col-sm-8 align-self-center">
              <span>AG-0000001</span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label align-self-center">
              Agent Name
            </label>
            <div class="col-sm-8 align-self-center">
              <span>Bambang</span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label align-self-center">
              Client Name
            </label>
            <div class="col-sm-8 align-self-center">
              <span>Client A</span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label align-self-center">
              No. Hp
            </label>
            <div class="col-sm-8 align-self-center">
              <span>08965123455</span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label align-self-center">
              Project Name
            </label>
            <div class="col-sm-8 align-self-center">
              <span>Araya Hotel</span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label align-self-center">
              Price
            </label>
            <div class="col-sm-8 align-self-center">
              <span>1.300.000.000</span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label align-self-center">
              Fee Received
            </label>
            <div class="col-sm-8 align-self-center">
              <span>1.300.000</span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label align-self-center">
              Status
            </label>
            <div class="col-sm-8 align-self-center">
              <div class="badge badge--success">verified</div>
            </div>
          </div>
          <div class="row pt-4">
            <div class="col-12">
              <button class="btn-fd-primary w-100" type="submit" data-dismiss="modal">Close</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection
