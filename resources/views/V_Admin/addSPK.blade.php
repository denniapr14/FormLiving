@ -0,0 +1,107 @@
@extends('V_Admin.app')
@extends('flashdata')
@section('title', 'SPK')
@section('pageTitle', 'SPK')
@section('back', route('spk.admin', $getProjek->nama_projek))
@section('breadcrumb', 'SPK')
{{--  @section('breadcrumb2', 'Tambah Produk')  --}}
@section('content')


    <div class="card">

        <div class="card-body">


            <div class="form-group">
                <label for="id_rumah">Rumah</label>
                <select name="id_rumah" id="">
                    <option value="">Pilih Rumah</option>
                    {{--  Data Foreach  --}}
                </select>
            </div>
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
                    <input type="text" name="total_spk" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Cicilan SPK</label>
                    <select name="" class="form-control" id="">
                        <option value="">Pilih Cicilan</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ $i }} Kali</option>
                        @endfor
                    </select>

                </div>
            </div>

        </div>
    </div>
    <script>

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

@endsection
