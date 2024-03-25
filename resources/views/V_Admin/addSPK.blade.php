@extends('V_Admin.app')
@extends('flashdata')
@section('title', 'Buat SPK')
@section('pageTitle', 'Buat SPK')
@section('back', route('spk.admin', $getProjek->nama_projek))
@section('breadcrumb', 'SPK')
@section('breadcrumb2', 'Buat SPK')
@section('content')


    <div class="card">
        <div class="card-header">
            <a href="{{ route('spk.admin', [$getProjek->nama_projek]) }}" class="btn btn-outline-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>  Pembuatan Surat
        </div>
        <div class="card-body">
            <form action="{{ route('addSPKAction.admin', [$getProjek->nama_projek,Crypt::encrypt($getSPPAdd->id_spp)] ) }}" method="POST" enctype="multipart/form-data">
@csrf


            <div class="form-group">
                <label for="">Nomor SPK</label>
                <input type="text" name="no_surat_spk" id="" class="form-control" placeholder=""
                    aria-describedby="helpId">

            </div>

            <div class="form-group">
                <label for="">Berkas </label>
                <input type="file" name="file_spk" id="" class="form-control" placeholder=""
                    aria-describedby="helpId">

            </div>
            <div class="form-group">
                <label for="denah">Denah</label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="" aria-describedby="inputGroupFileAddon04"
                        aria-label="Upload" name="denah[]">
                    <div class="input-group-append">
                        <button class="btn btn-primary add-file" type="button">Add</button>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="">Tambah bangunan?</label>
                <select name="tambah_bangunan_spk" class="form-control" id="tambah_bangunan_spk">
                    <option value="">--Pilih--</option>
                    <option value="ada">Ada</option>
                    <option value="tidak ada">Tidak Ada</option>

                </select>
            </div>

            <div id="TambahBangunan" style="display: none">
                <div class="form-group">
                    <label for="">Harga Tambah Bangunan</label>
                    <input type="number" name="total_spk" id="total_spk" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Cicilan SPK</label>
                    <select name="cicilan" class="form-control" id="cicilan">
                        <option value="">Pilih Cicilan</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ $i }} Kali</option>
                        @endfor
                    </select>
                </div>
                <div id="installment-table"></div>

                <div class="form-group">
                  <label for="">Keterangan Tambah Kurang</label>
                  <textarea name="keterangan" id="" class="form-control" cols="30" rows="2"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-success">Submit</button>

        </div>
    </form>

    </div>
    <script>

        document.getElementById('cicilan').addEventListener('change', function() {
            calculateInstallments();
        });

        function calculateInstallments() {
            var total_spk = document.getElementById('total_spk').value;
            var cicilan = document.getElementById('cicilan').value;

            if (total_spk !== "" && cicilan !== "") {
                var installment_amount = parseFloat(total_spk) / parseInt(cicilan);

                var tableHTML = '<table border="1" class="text-center" style="width: 100%" ><tr><th >Cicilan</th><th>Tanggal Bayar</th><th> Harga</th></tr>';
                var dueDate = new Date(); // Start with today's date
                for (var i = 1; i <= parseInt(cicilan); i++) {
                    dueDate.setDate(dueDate.getDate() + 14); // Add 14 days (2 weeks)
                    var formattedDate = dueDate.toISOString().split('T')[0]; // Format date as YYYY-MM-DD

                    tableHTML += `<tr><td class="text-left">Cicilan ke-` + i + `</td><td class="text-left">
                        <input type="date" name="tanggal_bayar[]" class="form-control tanggal-bayar" value="` + formattedDate + `" style="width: 70%">
                        </td><td style="width: 30%"> <input type="number" name="cicilanSPK[]" class="form-control" value="`+installment_amount+`" style="width: 70%"></td></tr>`;
                }
                // Add total row at the end
                tableHTML += ` <tr>
                    <td colspan="2"><b>Total</b></td>
                    <td> Rp. `+total_spk+`</td>
                </tr>`;

                tableHTML += '</table>';

                document.getElementById('installment-table').innerHTML = tableHTML;
            } else {
                document.getElementById('installment-table').innerHTML = ''; // Clear table if values are not set
            }
        }


        function formatIndonesianDate(date) {
            var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            var day = days[date.getDay()];
            var dayOfMonth = date.getDate();
            var month = months[date.getMonth()];
            var year = date.getFullYear();
            return `${day}, ${dayOfMonth} ${month} ${year}`;
        }

        $(document).ready(function() {
            // Add file input field
            $(".add-file").click(function() {
                var html =
                    `<div class="input-group mb-3"><input type="file" class="form-control" id="" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="denah[]"><div class="input-group-append"><button class="btn btn-primary add-file" type="button">Add</button><button class="btn btn-danger remove-file" type="button">Remove</button></div></div>`;
                $(this).closest('.form-group').append(html);
            });

            // Remove file input field
            $(document).on('click', '.remove-file', function() {
                $(this).closest('.input-group').remove();
            });



            $('#tambah_bangunan_spk').change(function () {
                if ($(this).val() === 'ada') {
                    $('#TambahBangunan').show();
                } else {
                    $('#TambahBangunan').hide();
                }
            });


        });
    </script>

    <script>
        // Initialize Select2
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

@endsection
