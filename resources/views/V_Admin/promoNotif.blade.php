@extends('V_Admin.app')
@extends('flashdata')
@section('title', 'Form One | Promo')
@section('pageTitle', 'Promo')
@section('back', route('promo.admin', [$getProjek->nama_projek]))
@section('breadcrumb', 'Promo')
{{--  @section('breadcrumb2', 'Ubah Pemesanan')  --}}

@section('content')

    <style>

    </style>

    <div class="card mb-3" id="promoPC">

        <div class="card-body">
            <div class="card-title">
                <table style="width: 100%">
                    <tr>
                        <td> <i class="bi bi-award-fill"></i>
                            <span>Promo</span>
                        </td>

                    </tr>
                </table>

            </div>



            <div class="row">

                <div id="accordian-3" class="col-md-12">
                    <form
                        action="{{ route('promoNotifAction.admin', [$getProjek->nama_projek, Crypt::encrypt($getPromo->id_promo)]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @foreach ($getKategori as $kategori)
                            <div class="card col-md-12">
                                <div class="card-header">

                                    <a class="float-left" href="#" id="heading11"data-toggle="collapse"
                                        data-target="#collapse{{ $kategori->id_kategori }}" aria-expanded="false"
                                        aria-controls="collapse1">
                                        <h5 class="m-b-0">
                                            {{ $kategori->kategori }}

                                        </h5>
                                    </a>
                                    <span class="float-right">

                                        <input type="checkbox" name="" class="selectAllCategori"
                                            id="selectAllCategori" data-category="{{ $kategori->id_kategori }}"> Pilih Semua
                                    </span>
                                </div>




                                <div id="collapse{{ $kategori->id_kategori }}" class="collapse" aria-labelledby="heading11"
                                    data-parent="#accordian-3" style="">
                                    <div class="card-body">
                                        <div class="row">


                                            @foreach ($getUserAll as $userAll)
                                                @if ($kategori->id_kategori == $userAll->id_kategori)
                                                    <div class="col-md-3">
                                                        <div class="d-flex no-block align-items-center p-15 ">
                                                            <div class="row">
                                                                <div class="">
                                                                    <input type="checkbox" name="userNotifCheckbox[]"
                                                                        id="" class="selectedUserCheckbox"
                                                                        data-category="{{ $kategori->id_kategori }}"
                                                                        value="{{ $userAll->id_user_admin }}"
                                                                        style="width: 0.5rem">
                                                                    {{--  <img
                                                                    src="{{ url('bootstrap') }}/assets/images/users/2.jpg"
                                                                    alt="user" class="rounded-circle" width="60">  --}}
                                                                </div>
                                                                <div class="m-l-10">
                                                                    <p class="m-b-3">
                                                                        <strong>
                                                                            @if ($userAll->nama_ua != null)
                                                                                {{ strlen($userAll->nama_ua) > 20 ? substr($userAll->nama_ua, 0, 20) . '...' : $userAll->nama_ua }}
                                                                            @else
                                                                                {{ $userAll->username_ua }}
                                                                            @endif

                                                                        </strong>
                                                                    </p>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @else
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="float-right">

                            <button type="submit" class="btn btn-outline-info">Selesai</button>
                        </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            let selectAllCheckboxes = document.querySelectorAll('.selectAllCategori');
            let userCheckboxes = document.querySelectorAll('.selectedUserCheckbox');

            selectAllCheckboxes.forEach(function(selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function() {
                    let category = selectAllCheckbox.dataset.category;
                    let isChecked = selectAllCheckbox.checked;

                    userCheckboxes.forEach(function(userCheckbox) {
                        if (userCheckbox.dataset.category === category) {
                            userCheckbox.checked = isChecked;
                        }
                    });
                });
            });
        });
    </script>

@endsection
