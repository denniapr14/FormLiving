@extends('V_Admin.app')
@extends('flashdata')
@section('title', 'Form One | Kirim Notifikasi Promo')
@section('pageTitle', 'Kirim Notifikasi Promo')
@section('back', route('promo.admin', [$getProjek->nama_projek]))
@section('breadcrumb', 'Promo')

@section('breadcrumb2', 'Notifikasi User')
@section('breadcrumb3', 'Kirim Notifikasi Promo')

@section('content')

    <style>
        @media (max-width: 500px) {
            #promoMobile {
                display: block;
            }

            #promoPC {
                display: none;
            }
        }

        @media (min-width: 501px) {
            #promoMobile {
                display: none;
            }

            #promoPC {
                display: block;
            }
        }
    </style>

    <div class="card mb-3" id="promoPC">

        <div class="card-body">
            <div class="card-title">
                <table style="width: 100%">
                    <tr>
                        <td> <i class="bi bi-award-fill"></i>
                            <span>Kirim Notifikasi Promo</span>
                        </td>

                    </tr>
                </table>

            </div>



            <div class="row">

                <div id="accordian-3" class="col-md-12">
                    <form action="{{ route('sendPromoNotifAction.admin',[$getProjek->nama_projek, Crypt::encrypt($getPromo->id_promo)]) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @foreach ($getUserNotif as $userNotif)

                        <label for="" class="btn btn-outline-info">
                            @if ($userNotif->nama_ua != null)
                            {{ $userNotif->nama_ua }}

                            @else
                            {{ $userNotif->username_ua }}
                            @endif
                        </label>
                        <input type="text" name="id_user_admin[]" value="{{ $userNotif->id_user_admin }}" hidden>

                        @endforeach
                        <div class="form-group">
                          <label for="">Notifikasi</label>
                          <input type="text" name="nameNotif" id="" class="form-control" placeholder="" aria-describedby="helpId">

                        </div>
                        <div class="form-group">
                          <label for="">Detail Notifikasi</label>
                          <textarea name="deskripsiNotif" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                </form>
                </div>

            </div>


        </div>

    </div>


    <script>
        $(document).ready(function() {
            $('#promo').DataTable({
                lengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, 'All'],
                ],
            });
        });
        $(document).ready(function() {
            $('#promoMobileTable').DataTable({
                lengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, 'All'],
                ],
            });
        });
    </script>

    <script>
        // Add a script to handle the "Select All" functionality
        document.addEventListener('DOMContentLoaded', function () {
            let selectAllCheckboxes = document.querySelectorAll('.selectAllCategori');
            let userCheckboxes = document.querySelectorAll('.selectedUserCheckbox');

            selectAllCheckboxes.forEach(function (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function () {
                    let category = selectAllCheckbox.dataset.category;
                    let isChecked = selectAllCheckbox.checked;

                    userCheckboxes.forEach(function (userCheckbox) {
                        if (userCheckbox.dataset.category === category) {
                            userCheckbox.checked = isChecked;
                        }
                    });
                });
            });
        });
    </script>

@endsection
