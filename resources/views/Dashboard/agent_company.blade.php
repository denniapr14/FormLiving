
@extends('DashboardLayout.app')
@extends('DashboardLayout.sidebar')
@extends('DashboardLayout.footer')

@section('tittle', 'FORMS | Agent Company')

@section('content')

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
          <li class="breadcrumb__category">Users</li>
          <li class="breadcrumb__item">
            <span class="breadcrumb__page">Agent Company</span>
            <span class="breadcrumb__element">List</span>
          </li>
        </ol>
      </div>
      <div class="content__row">
        <div class="card__box">
          <div class="card__header">
            <div class="card__title">
              <i class="bi bi-people"></i>
              <span>Agent Company</span>
            </div>
            <div class="agents__actions">
              <a href="#" class="btn-fd-outline btn--small" data-toggle="modal" data-target="#add-new-agent">Add New Agent <i class="bi bi-plus-lg"></i></a>
            </div>
          </div>
          <div class="actions__box">
            <div class="left__box">
              <span>Sorting By:</span>
              <div class="custom__select custom__select--outline">
                <select name="sort" id="sort">
                  <option selected>Name</option>
                  <option>Company Name</option>
                  <option>Agent Code</option>
                  <option>Email</option>
                  <option>City</option>
                  <option>Address</option>
                </select>
                <span class="custom-arrow"></span>
              </div>
            </div>
            <div class="right__box">
              <form class="form__search">
                <input class="fs__input" type="search" placeholder="Search" aria-label="Search">
                <button class="fs__button" type="submit">
                  <i class="bi bi-search"></i>
                </button>
              </form>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">
                    Name
                    <span class="sort__icon ascending active">
                      <i class="bi bi-sort-down"></i>
                    </span>
                  </th>
                  <th scope="col">Company Name</th>
                  <th scope="col">Agent Code</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">City</th>
                  <th scope="col">Address</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Agent A</td>
                  <td>Company ABC Indonesia</td>
                  <td>112233</td>
                  <td>agentA@gmail.com</td>
                  <td>+6282123456789</td>
                  <td>Jakarta</td>
                  <td>Jl.Melati</td>
                  <td>
                    <div class="d-flex flex-nowrap">
                      <a href="#" class="btn-fd-icon-outline" data-toggle="modal" data-target="#delete-alert">
                        <i class="bi bi-trash"></i>
                      </a>
                      <a href="#" class="btn-fd-icon-outline" data-toggle="modal" data-target="#add-new-agent">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Agent B</td>
                  <td>Company ABC Indonesia</td>
                  <td>332211</td>
                  <td>agentB@gmail.com</td>
                  <td>+6282123456789</td>
                  <td>Malang</td>
                  <td>Jl.Mawar</td>
                  <td>
                    <div class="d-flex flex-nowrap">
                      <a href="#" class="btn-fd-icon-outline" data-toggle="modal" data-target="#delete-alert">
                        <i class="bi bi-trash"></i>
                      </a>
                      <a href="#" class="btn-fd-icon-outline" data-toggle="modal" data-target="#add-new-agent">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                    </div>
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
              <span class="total-page">1</span>
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

  <!-- Modal delete confirmation-->
  <div class="modal modal-sweet-alert modal-sweet-alert--error fade" id="delete-alert" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="delete-alertLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="alert-icon">
            <i class="bi bi-trash"></i>
          </div>
          <h1>Delete Data?</h1>
          <p>Do you really want to delete this agent?</p>
          <a href="#" class="btn btn-outline-danger" data-dismiss="modal">Cancel</a>
          <a href="#" class="btn btn-danger" data-dismiss="modal">Delete</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal succes alert-->
  <div class="modal modal-sweet-alert modal-sweet-alert--success fade" id="success-alert" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="success-alertLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="alert-icon">
            <i class="bi bi-check-circle"></i>
          </div>
          <h1>Done!</h1>
          <p>New agent was added</p>
          <a href="#" class="btn btn-fd-primary" data-dismiss="modal">OK</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal form-->
  <div class="modal modal-form fade" id="add-new-agent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="add-new-agentLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New - Agent</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group row">
              <label for="name" class="col-sm-4 col-form-label align-self-center">
                Name
                <span class="required">Required</span>
              </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="name" placeholder="Agent Name" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="company-name" class="col-sm-4 col-form-label align-self-center">
                Company Name
                <span class="required">Required</span>
              </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="company-name" placeholder="Company Name" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="code" class="col-sm-4 col-form-label align-self-center">
                Agent Code
                <span class="required">Required</span>
              </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="code" placeholder="Agent Code" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-4 col-form-label align-self-center">
                Email
                <span class="required">Required</span>
              </label>
              <div class="col-sm-8">
                <input type="email" class="form-control" id="email" placeholder="Email" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="phone-number" class="col-sm-4 col-form-label align-self-center">
                Phone Number
                <span class="required">Required</span>
              </label>
              <div class="col-sm-8">
                <input type="number" class="form-control" id="phone-number" placeholder="Phone Number" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="city" class="col-sm-4 col-form-label align-self-center">
                City
                <span class="required">Required</span>
              </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="city" placeholder="City" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="address" class="col-sm-4 col-form-label align-self-center">
                Address
                <span class="required">Required</span>
              </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="address" placeholder="Address" required>
              </div>
            </div>
            <div class="row pt-4">
              <div class="col-md-6 col-12">
                <button class="btn-fd-outline-secondary w-100" data-dismiss="modal">Cancel</button>
              </div>
              <div class="col-md-6 col-12">
                <button class="btn-fd-primary w-100" type="submit" data-dismiss="modal" data-toggle="modal" data-target="#success-alert">Save & Publish <i class="bi bi-send"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection
