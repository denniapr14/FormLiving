@extends('V_Admin.app')

@extends('flashdata')
@section('title','Form One | Pekerjaan')
@section('pageTitle','Tambah Rincian Pekerjaan Termin')
@section('back',route('job.admin',[$getProjek->nama_projek]) )
@section('breadcrumb','Pekerjaan')
@section('breadcrumb2','Rincian Pekerjaan Termin')
@section('breadcrumb3','Rincian Pekerjaan')
@section('breadcrumb4','Tambah Rincian Pekerjaan')
@section('content')

<section class="content" id="printcontent">
    <div class="container-fluid ">
        <div class="card">
            <div class="card-header">
                <a href="{{ url()->previous() }}" class="btn-fd-icon-outline col-1" style="height: 40px; width: 50px">
                    <i class="bi bi-arrow-left"></i></a> &nbsp;
                Tambah Pekerjaan
            </div>

            <div class="card-body">
                <form action="{{ route('addJoblistAction.admin', [$getProjek->nama_projek,Crypt::encrypt($getJob->id_job)]) }}" method="post">
                    @csrf
                    <div id="formFields">

                        <div class="form-group">
                            <label for="nama_jl">Nama Rincian Pekerjaan</label>
                            <input type="text" class="form-control" id="nama_jl" name="nama_jl[]" required>
                        </div>
                        <div class="form-group">
                            <label for="sort_jl">Pengurutan Rincian Pekerjaan</label>
                            <input type="number" class="form-control" id="sort_jl" name="sort_jl[]" required>
                        </div>

                        <div class="form-group">
                            <label for="bobot_jl">Bobot Rincian Pekerjaan </label>
                            <input type="number" class="form-control" id="bobot_jl" name="bobot_jl[]" required>
                        </div>


                    </div>
                    <button type="button" id="addButton">Add Field</button>
                    <button type="button" id="deleteButton">Delete Field</button>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<script>
    let fieldCount = 1;

    // Function to add a new set of form fields
    function addFormField() {
        const formFields = document.getElementById("formFields");
        const newFields = document.createElement("div");
        newFields.innerHTML = `

        <div class="form-group">
            <label for="nama_jl">Nama Rincian Pekerjaan</label>
            <input type="text" class="form-control" id="nama_jl" name="nama_jl[]" required>
        </div>
        <div class="form-group">
            <label for="sort_jl">Pengurutan Rincian Pekerjaan</label>
            <input type="number" class="form-control" id="sort_jl" name="sort_jl[]" required>
        </div>

        <div class="form-group">
            <label for="bobot_jl">Bobot Rincian Pekerjaan </label>
            <input type="number" class="form-control" id="bobot_jl" name="bobot_jl[]" required>
        </div>
        `;
        formFields.appendChild(newFields);
        fieldCount++;
    }

    // Function to delete the last set of form fields
    function deleteLastFormField() {
        if (fieldCount > 1) {
            const formFields = document.getElementById("formFields");
            formFields.removeChild(formFields.lastChild);
            fieldCount--;
        }
    }

    // Add event listeners to the buttons
    document.getElementById("addButton").addEventListener("click", addFormField);
    document.getElementById("deleteButton").addEventListener("click", deleteLastFormField);
</script>
<script>
    $(document).ready(function() {
            $('#dtPembayaran').DataTable();
        });
</script>

<script>
    function formatDateIndo(dateString) {
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const date = new Date(dateString);
            return date.toLocaleDateString('id-ID', options);
        }

        function formatRupiah2(angka) {
            var hasilCicilan = Math.round(parseInt((angka / 1000)) * 1000).toString(),
                sisa = hasilCicilan.length % 3,
                rupiah = hasilCicilan.substr(0, sisa),
                ribuan = hasilCicilan.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            return rupiah;
        }

        function previewImage() {
            var preview = document.querySelector('#preview');
            var file = document.querySelector('#image').files[0];
            var reader = new FileReader();

            reader.addEventListener("load", function() {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
</script>

@endsection
