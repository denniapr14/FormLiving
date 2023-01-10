@extends('DashboardLayout.app')
@extends('DashboardLayout.sidebar')
@extends('DashboardLayout.footer')

@section('tittle', 'FORMS | Sales Analytic')

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
        <ol class="breadcrumb__box">
          <li class="breadcrumb__category"><h4>SALES ANALYTIC</h4></li>
        </ol>
      </div>

      <div class="content__row content__row--analytic">
        <div class="analytic__column column-4">
          <div class="card__analytic card__analytic--sales">
            <div class="card__icon">
              <img src="{{url('Dashboard')}}/images/content/sales.svg" alt="sales-img">
            </div>
            <div class="card__text">
              <p>Annual sales income</p>
              <h4>Rp 230.000.000.000.000</h4>
            </div>
          </div>
        </div>
        <div class="analytic__column column-3">
          <div class="card__analytic card__analytic--fees">
            <div class="card__icon">
              <img src="{{url('Dashboard')}}/images/content/fees.svg" alt="sales-img">
            </div>
            <div class="card__text">
              <p>Annual fees</p>
              <h4>Rp 75.000.000</h4>
            </div>
          </div>
        </div>
        <div class="analytic__column column-2">
          <div class="card__analytic card__analytic--transactions">
            <div class="card__icon">
              <img src="{{url('Dashboard')}}/images/content/transactions.svg" alt="sales-img">
            </div>
            <div class="card__text">
              <p>Annual transacions</p>
              <h4>502</h4>
            </div>
          </div>
        </div>
        <div class="analytic__column column-1">
          <div class="card__analytic card__analytic--report">
            <div class="card__text">
              <p>Report</p>
            </div>
            <div class="card__icon">
              <img src="{{url('Dashboard')}}/images/content/report.svg" alt="sales-img">
            </div>
          </div>
        </div>
      </div>

      <div class="content__row mb-3">
        <div class="card__box">
          <div class="card__header align-items-start">
            <div class="card__title">
              <div class="d-flex flex-column">
                <p>Revenue graph from the previos month</p>
                <h3>+ Rp 105.000.000.000</h3>
              </div>
            </div>

            <div class="d-flex">
              <div class="custom__select custom__select--outline custom__select--outline-small mr-3">
                <select name="sort" id="sort">
                  <option selected>This Month</option>
                  <option>This Year</option>
                </select>
                <span class="custom-arrow"></span>
              </div>
              <div class="custom__select custom__select--outline custom__select--outline-small">
                <select name="sort" id="sort">
                  <option selected>2021 - 2022</option>
                  <option>2020 - 2021</option>
                </select>
                <span class="custom-arrow"></span>
              </div>
            </div>
          </div>
          <div>
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>

      <div class="content__row">
        <div class="content__column">
          <div class="card__box card__box--normal mb-3">
            <div class="card__header">
              <div class="card__title">
                <i class="bi bi-house-door"></i>
                <span>Top Performers</span>
              </div>
              <div class="custom__select custom__select--outline custom__select--outline-small">
                <select name="sort" id="sort">
                  <option selected>This Month</option>
                  <option>This Year</option>
                </select>
                <span class="custom-arrow"></span>
              </div>
            </div>
            <div class="analytic-listing">
              <div class="analytic-listing__column">
                <div class="listing__avatar">
                  <img src="{{url('Dashboard')}}/images/content/avatar-1.png" alt="">
                  <span class="ranking">1</span>
                </div>
                <div class="listing__name">Bayu</div>
                <div class="listing__acquisition">101B | 15 Trans</div>
              </div>
              <div class="analytic-listing__column">
                <div class="listing__avatar">
                  <img src="{{url('Dashboard')}}/images/content/avatar-1.png" alt="">
                  <span class="ranking">2</span>
                </div>
                <div class="listing__name">Adjie</div>
                <div class="listing__acquisition">90B | 10 Trans</div>
              </div>
              <div class="analytic-listing__column">
                <div class="listing__avatar">
                  <img src="{{url('Dashboard')}}/images/content/avatar-1.png" alt="">
                  <span class="ranking">3</span>
                </div>
                <div class="listing__name">Ahmad</div>
                <div class="listing__acquisition">80B | 11 Trans</div>
              </div>
              <div class="analytic-listing__column">
                <div class="listing__avatar">
                  <img src="{{url('Dashboard')}}/images/content/avatar-1.png" alt="">
                </div>
                <div class="listing__name">Sellacious</div>
                <div class="listing__acquisition">72B | 12 Trans</div>
              </div>
              <div class="analytic-listing__column">
                <div class="listing__avatar">
                  <img src="{{url('Dashboard')}}/images/content/avatar-1.png" alt="">
                </div>
                <div class="listing__name">Jasmine</div>
                <div class="listing__acquisition">50B | 22 Trans</div>
              </div>
            </div>
          </div>
          <div class="card__box card__box--normal">
            <div class="card__header">
              <div class="card__title">
                <i class="bi bi-house-door"></i>
                <span>Total Fees</span>
              </div>
              <div class="custom__select custom__select--outline custom__select--outline-small">
                <select name="sort" id="sort">
                  <option selected>This Month</option>
                  <option>This Year</option>
                </select>
                <span class="custom-arrow"></span>
              </div>
            </div>
            <div class="analytic-listing">
              <div class="analytic-listing__column">
                <div class="listing__avatar">
                  <img src="{{url('Dashboard')}}/images/content/avatar-1.png" alt="img">
                </div>
                <div class="listing__name">Bayu</div>
                <div class="listing__acquisition">101B | 15 Trans</div>
              </div>
              <div class="analytic-listing__column">
                <div class="listing__avatar">
                  <img src="{{url('Dashboard')}}/images/content/avatar-1.png" alt="img">
                </div>
                <div class="listing__name">Adjie</div>
                <div class="listing__acquisition">90B | 10 Trans</div>
              </div>
              <div class="analytic-listing__column">
                <div class="listing__avatar">
                  <img src="{{url('Dashboard')}}/images/content/avatar-1.png" alt="img">
                </div>
                <div class="listing__name">Ahmad</div>
                <div class="listing__acquisition">80B | 11 Trans</div>
              </div>
              <div class="analytic-listing__column">
                <div class="listing__avatar">
                  <img src="{{url('Dashboard')}}/images/content/avatar-1.png" alt="img">
                </div>
                <div class="listing__name">Sellacious</div>
                <div class="listing__acquisition">72B | 12 Trans</div>
              </div>
              <div class="analytic-listing__column">
                <div class="listing__avatar">
                  <img src="{{url('Dashboard')}}/images/content/avatar-1.png" alt="img">
                </div>
                <div class="listing__name">Jasmine</div>
                <div class="listing__acquisition">50B | 22 Trans</div>
              </div>
            </div>
          </div>
        </div>

        <div class="content__column">
          <div class="card__box">
            <div class="card__header">
              <div class="card__title">
                <i class="bi bi-house-door"></i>
                <span>Top Selling Product</span>
              </div>
              <div class="custom__select custom__select--outline custom__select--outline-small">
                <select name="sort" id="sort">
                  <option selected>Residence</option>
                  <option>Apartment</option>
                  <option>Hotel</option>
                  <option>Mall</option>
                </select>
                <span class="custom-arrow"></span>
              </div>
            </div>
            <div class="product-listing">
              <div class="product__item">
                <div class="product__card">
                  <div class="product__img">
                    <img src="{{url('Dashboard')}}/images/content/product-1.png" alt="product-1">
                  </div>
                  <p>TP | 4 unit | nilai harga</p>
                </div>
              </div>
              <div class="product__item">
                <div class="product__card">
                  <div class="product__img">
                    <img src="{{url('Dashboard')}}/images/content/product-1.png" alt="product-1">
                  </div>
                  <p>TP | 4 unit | nilai harga</p>
                </div>
              </div>
              <div class="product__item">
                <div class="product__card">
                  <div class="product__img">
                    <img src="{{url('Dashboard')}}/images/content/product-1.png" alt="product-1">
                  </div>
                  <p>TP | 4 unit | nilai harga</p>
                </div>
              </div>
              <div class="product__item">
                <div class="product__card">
                  <div class="product__img">
                    <img src="{{url('Dashboard')}}/images/content/product-1.png" alt="product-1">
                  </div>
                  <p>TP | 4 unit | nilai harga</p>
                </div>
              </div>
              <div class="product__item">
                <div class="product__card">
                  <div class="product__img">
                    <img src="{{url('Dashboard')}}/images/content/product-1.png" alt="product-1">
                  </div>
                  <p>TP | 4 unit | nilai harga</p>
                </div>
              </div>
              <div class="product__item">
                <div class="product__card">
                  <div class="product__img">
                    <img src="{{url('Dashboard')}}/images/content/product-1.png" alt="product-1">
                  </div>
                  <p>TP | 4 unit | nilai harga</p>
                </div>
              </div>
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


@endsection

