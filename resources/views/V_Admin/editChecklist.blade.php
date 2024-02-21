@extends('V_Admin.app')
@extends('flashdata')
@section('title','Checklist')
@section('pageTitle','Ubah Checklist')
@section('back', route('checklist.admin', [$getProjek->nama_projek]))
@section('breadcrumb', 'Checklist')
@section('breadcrumb2', 'Termin Checklist')
@section('breadcrumb3', 'Rincian Checklist Termin')

@section('content')

<div class="card">
    <div class="card-header">
        <h2 class="card-title"> <a href="{{ route('getListChecklist.admin', [$getProjek->nama_projek,Crypt::encrypt($getChecklist->id_rumah),Crypt::encrypt($getChecklist->termin_job)]) }}" class="btn btn-outline-danger"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a> Form Ubah Rincian Checklist</h2>
    </div>
    <div class="card-body">
        <form id="editForm" action="{{ route('editChecklistAction.admin', [$getProjek->nama_projek,Crypt::encrypt($getChecklist->id_rumah),Crypt::encrypt($getChecklist->termin_job),Crypt::encrypt($getChecklist->id_checklist)]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>

            <div class="form-group">
                <img id="imagePreview" src="{{ asset('Home/images/termin/'.$getChecklist->foto) }}" class="img-fluid" alt="Preview Image">
            </div>

            @if ($getChecklist->id_pengawas1 == $user->id_user_admin)
                <div class="form-group">
                    <label for="status_cek_pengawas1">Status Pengawas 1:</label>
                    <select class="form-control" id="status_cek_pengawas1" name="status_cek_pengawas1">
                        <option value="selesai" @if($getChecklist->status_cek_pengawas1 == 'selesai') selected @endif>Selesai</option>
                        <option value="belum" @if($getChecklist->status_cek_pengawas1 == 'belum') selected @endif>Belum Selesai</option>
                    </select>
                </div>
            @elseif ($getChecklist->id_pengawas2 == $user->id_user_admin)
                <div class="form-group">
                    <label for="status_cek_pengawas2">Status Pengawas 2:</label>
                    <select class="form-control" id="status_cek_pengawas2" name="status_cek_pengawas2">
                        <option value="selesai" @if($getChecklist->status_cek_pengawas2 == 'selesai') selected @endif>Selesai</option>
                        <option value="belum" @if($getChecklist->status_cek_pengawas2 == 'belum') selected @endif>Belum Selesai</option>
                    </select>
                </div>
            @else
                <div class="form-group">
                    <label for="status_cek_pengawas1">Status Pengawas 1:</label>
                    <select class="form-control" id="status_cek_pengawas1" name="status_cek_pengawas1">
                        <option value="selesai" @if($getChecklist->status_cek_pengawas1 == 'selesai') selected @endif>Selesai</option>
                        <option value="belum" @if($getChecklist->status_cek_pengawas1 == 'belum') selected @endif>Belum Selesai</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status_cek_pengawas2">Status Pengawas 2:</label>
                    <select class="form-control" id="status_cek_pengawas2" name="status_cek_pengawas2">
                        <option value="selesai" @if($getChecklist->status_cek_pengawas2 == 'selesai') selected @endif>Selesai</option>
                        <option value="belum" @if($getChecklist->status_cek_pengawas2 == 'belum') selected @endif>Belum Selesai</option>
                    </select>
                </div>

                @endif

            <!-- Repeat similar blocks for other fields -->
              <input type="text" hidden name="status_checklist" id="statusChecklist" class="form-control" placeholder="" value="{{ $getChecklist->status_checklist }}" aria-describedby="helpId">
              <input type="text" hidden name="bobot" value="{{ $getChecklist->bobot_jl }}">
            <div class="form-group">
                <label for="lat_checklist">Latitude:</label>
                <input type="text" class="form-control" id="lat_checklist" name="lat_checklist" value="{{ $getChecklist->lat_checklist }}">
            </div>

            <div class="form-group">
                <label for="long_checklist">Longitude:</label>
                <input type="text" class="form-control" id="long_checklist" name="long_checklist" value="{{ $getChecklist->long_checklist }}">
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <textarea class="form-control" id="keterangan" name="keterangan">{{ $getChecklist->keterangan }}</textarea>
            </div>

            <table style="width: 100%">
                <tr>
                    <td>
                        @if($getChecklist->id_pengawas2 != $user->id_user_admin)
                        <a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#pinModal">
                            Insert PIN
                        </a>
                        @endif
                        <div class="modal fade" id="pinModal" tabindex="-1" role="dialog" aria-labelledby="pinModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="pinModalLabel">Enter PIN</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="pinForm">
                                            <div class="form-group">
                                                <label for="pinInput">PIN:</label>
                                                <input type="password" class="form-control" id="pinInput" name="pin">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="submitPin">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                    <td>  <button type="submit" id="submitBtn" class="btn btn-outline-success float-right" {{ !$getChecklist->id_pengawas2 != $user->id_user_admin ? '' : 'disabled' }}>Submit</button>
                    </td>
                </tr>
            </table>


        </form>
    </div>
</div>


    <script>
        // JavaScript to capture latitude and longitude
        window.onload = function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            document.getElementById("lat_checklist").value = position.coords.latitude;
            document.getElementById("long_checklist").value = position.coords.longitude;
        }

        document.getElementById('foto').addEventListener('change', function(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
            };

            reader.readAsDataURL(file);
        });
    </script>

    <script>
        document.getElementById('submitPin').addEventListener('click', function() {
            var pin = document.getElementById('pinInput').value;

            // Send AJAX request to the route
            $.ajax({
                url: "{{ route('checkPinPendamping.admin',[$getChecklist->id_projek,$getChecklist->id_rumah,$getChecklist->termin_job,$getChecklist->id_checklist]) }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    pin: pin
                },
                success: function(response) {
                    if (response.success) {
                        // PIN is correct, enable the submit button
                        document.getElementById('submitBtn').removeAttribute('disabled');
                        $('#pinModal').modal('hide');
                        $('#statusChecklist').val('selesai');
                        $(document).ready(function() {
                            Toastify({
                                text:   'Pin anda benar!', // Add single quotes around the variable to make it a valid JavaScript string
                                duration: 3000,
                                gravity: "top",
                                positionLeft: false,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #8ACCA1, #458f60)",
                                stopOnFocus: true
                            }).showToast();
                        });
                    } else {
                        // PIN is incorrect, display an error message
                        $(document).ready(function() {
                            Toastify({
                                text:   'Pin yang anda masukan salah', // Add single quotes around the variable to make it a valid JavaScript string
                                duration: 3000,
                                gravity: "top",
                                positionLeft: false,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #f57a64, #912410)",
                                stopOnFocus: true
                            }).showToast();
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Handle AJAX error
                    console.error(xhr.responseText);
                }
            });
        });
    </script>

@endsection
