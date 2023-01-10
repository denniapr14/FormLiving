@extends('DashboardLayout.app')
@extends('DashboardLayout.sidebar')
@extends('DashboardLayout.footer')

@section('tittle', 'FORMS | Schedule')

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
          <li class="breadcrumb__category">App</li>
          <li class="breadcrumb__item">
            <span class="breadcrumb__page">Events</span>
            <span class="breadcrumb__element">List</span>
          </li>
        </ol>
      </div>
      <div class="content__row">
        <div class="card__box">
          <div class="card__header">
            <div class="card__title">
              <i class="bi bi-calendar4-event"></i>
              <span>Events</span>
            </div>
            <div class="schedule__actions">
              <a href="#" class="btn-fd-outline btn--small" data-toggle="modal" data-target="#add-new-schedule">Create New Event <i class="bi bi-plus-lg"></i></a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Topic</th>
                  <th scope="col">
                    Host Name
                    <span class="sort__icon ascending active">
                      <i class="bi bi-sort-down"></i>
                    </span>
                  </th>
                  <th scope="col">Date</th>
                  <th scope="col">Start Time</th>
                  <th scope="col">End Time</th>
                  <th scope="col">Link</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Marketing Meet</td>
                  <td>Bambang</td>
                  <td>13/07/2022</td>
                  <td>10:00</td>
                  <td>11:30</td>
                  <td>https://google.meet.com</td>
                  <td>
                    <div class="d-flex flex-nowrap">
                      <a href="#" class="btn-fd-icon-outline" data-toggle="modal" data-target="#delete-alert">
                        <i class="bi bi-trash"></i>
                      </a>
                      <a href="#" class="btn-fd-icon-outline">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a href="#" class="btn-fd-icon-outline">
                        <i class="bi bi-send"></i>
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
          <p>Do you really want to delete this schedule?</p>
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
          <p>New schedule was added</p>
          <a href="#" class="btn btn-fd-primary" data-dismiss="modal">OK</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal form-->
  <div class="modal modal-form fade" id="add-new-schedule" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="add-new-scheduleLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New - Event</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label align-self-center">
                Category
              </label>
              <div class="col-sm-8 align-self-center">
                <span>Event</span>
              </div>
            </div>
            <div class="form-group row">
              <label for="topic" class="col-sm-4 col-form-label align-self-center">
                Topic
                <span class="required">Required</span>
              </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="topic" placeholder="Topic" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="host-name" class="col-sm-4 col-form-label align-self-center">
                Host Name
                <span class="required">Required</span>
              </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="host-name" placeholder="Host Name" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="date" class="col-sm-4 col-form-label align-self-center">
                Date
                <span class="required">Required</span>
              </label>
              <div class="col-sm-8">
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                  <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                      <div class="input-group-addon"><i class="bi bi-calendar4"></i></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="start-time" class="col-sm-4 col-form-label align-self-center">
                Start Time
                <span class="required">Required</span>
              </label>
              <div class="col-sm-8">
                <div class="input-group date" id="timepicker1" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#timepicker1"/>
                  <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                      <div class="input-group-addon"><i class="bi bi-clock"></i></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="end-time" class="col-sm-4 col-form-label align-self-center">
                End Time
                <span class="required">Required</span>
              </label>
              <div class="col-sm-8">
                <div class="input-group date" id="timepicker2" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#timepicker2"/>
                  <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                      <div class="input-group-addon"><i class="bi bi-clock"></i></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="link" class="col-sm-4 col-form-label align-self-center">
                Link
                <span class="required">Required</span>
              </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="link" placeholder="Link" required>
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
