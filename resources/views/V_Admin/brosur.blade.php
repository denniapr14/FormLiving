@extends('V_Admin.app')
@extends('flashdata')
@section('title','Penjawalan')
@section('pageTitle','Penjadwalan')
@section('back',route('brosur.admin',[$getProjek->nama_projek ]) )
@section('breadcrumb','Penjawalan')
{{--  @section('breadcrumb2','Tambah Produk')  --}}
@section('content')

<div class="card mb-3">
    <div class="card-body">
        <div class="card-title">
            <table style="width: 100%">
                <tr>
                    <td> <i class="bi bi-map"></i>
                        <span>Brosur {{ $getProjek->nama_projek }}</span>
                    </td>
                    <td>
                        <div class="float-right">
                            @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminTeknik')
                            <a href="#" class="btn btn-outline-info btn--small" style="float: right" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-plus" aria-hidden="true"></i> Brosur
                             </a>
                             <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                      <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">Tambah Brosur</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                         </button>
                                      </div>
                                      <div class="modal-body">
                                         <!-- Form untuk menambahkan brosur -->
                                         <form action="{{ route('addBrosurAction.admin', $getProjek->nama_projek) }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <!-- id_projek -->
                                            <div class="form-group">
                                               <label for="id_projek">ID Projek</label>
                                               <input type="text" class="form-control" id="id_projek" name="id_projek" value="{{ $getProjek->id_projek }}" readonly>
                                            </div>

                                            <!-- codecluster -->


                                            <!-- nama_brosur -->
                                            <div class="form-group">
                                               <label for="nama_brosur">Nama Brosur</label>
                                               <input type="text" class="form-control" id="nama_brosur" name="nama_brosur" required>
                                            </div>

                                            <!-- brosur_file -->
                                            <div class="form-group">
                                               <label for="brosur_file">Brosur File</label>
                                               <input type="file" class="form-control" id="brosur_file" name="brosur_file" required>
                                            </div>

                                            <!-- link_brosur -->
                                            <div class="form-group">
                                               <label for="link_brosur">Link Brosur</label>
                                               <textarea class="form-control" id="link_brosur" name="link_brosur" rows="3" required></textarea>
                                            </div>

                                            <!-- status_brosur -->
                                            <div class="form-group">
                                               <label for="status_brosur">Status Brosur</label>
                                               <select class="form-control" id="status_brosur" name="status_brosur" required>
                                                  <option value="Aktif">Aktif</option>
                                                  <option value="Nonaktif">Nonaktif</option>
                                               </select>
                                            </div>


                                            <div class="form-group">
                                               <label for="tgl_input_brosur">Tanggal Input Brosur</label>
                                               <input type="text" class="form-control" id="tgl_input_brosur" name="tgl_input_brosur" value="{{ now() }}" readonly>
                                            </div>

                                            <!-- Submit Button -->
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                         </form>
                                      </div>
                                   </div>
                                </div>
                             </div>
                            @else
                            @endif
                        </div>

                    </td>
                </tr>
            </table>

        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                   <tr>
                      <th>ID Brosur</th>
                      <th>ID Projek</th>

                      <th>Nama Brosur</th>
                      <th>Brosur File</th>
                      <th>Link Brosur</th>
                      <th>Status Brosur</th>
                      <th>Tanggal Input Brosur</th>
                      <th>Pengaturan</th>
                   </tr>
                </thead>
                <tbody>
                   @foreach ($getBrosur as $brosur)
                      <tr>
                         <td>{{ $brosur->id_brosur }}</td>
                         <td>{{ $brosur->nama_projek }}</td>

                         <td>{{ $brosur->nama_brosur }}</td>
                         <td>{{ $brosur->brosur_file }}</td>
                         <td>{{ $brosur->link_brosur }}</td>
                         <td>{{ $brosur->status_brosur }}</td>
                         <td>{{ $brosur->tgl_input_brosur }}</td>
                         <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $brosur->id_brosur }}">
                                <i class="fas fa-edit    "></i>
                            </button>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $brosur->id_brosur }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Brosur</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                            </button>
                                         </div>
                                         <div class="modal-body">
                                        <form action="{{ route('editBrosurAction.admin',[$getProjek->nama_projek,$brosur->id_brosur] ) }}" method="POST" enctype="multipart/form-data">
                                            @csrf


                                            <!-- Fields for editing -->
                                            <div class="form-group">
                                                <label for="nama_brosur">Nama Brosur</label>
                                                <input type="text" class="form-control" id="nama_brosur" name="nama_brosur" value="{{ $brosur->nama_brosur }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="brosur_file">Brosur File</label>
                                                <input type="text" class="form-control" id="brosur_file" name="brosur_file" value="{{ $brosur->brosur_file }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="link_brosur">Link Brosur</label>
                                                <textarea class="form-control" id="link_brosur" name="link_brosur" rows="3" required>{{ $brosur->link_brosur }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="status_brosur">Status Brosur</label>
                                                <select class="form-control" id="status_brosur" name="status_brosur" required>
                                                    <option value="Aktif" {{ $brosur->status_brosur == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                    <option value="Nonaktif" {{ $brosur->status_brosur == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                                </select>
                                            </div>

                                            <!-- Submit Button -->
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                      </tr>
                   @endforeach
                </tbody>
             </table>

        </div>


    </div>
</div>



@endsection
