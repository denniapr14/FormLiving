@extends('V_Guest.app')

@extends('flashdata')
@section('title', 'Form One | Pembangunan')
@section('pageTitle', 'Rincian Pembangunan Rumah')
@section('back', route('dashboard.guest', [$getProjek->nama_projek]))
@section('breadcrumb', 'Pembangunan Rumah')
@section('breadcrumb2', 'Rincian Pembangunan Rumah')
@section('content')

<style>
.image-container {
    position: relative; /* Agar tombol dapat diposisikan secara absolut di dalam container */
    width: 40%; /* Lebar penuh kontainer */
    overflow: hidden; /* Agar konten yang melampaui batas tidak terlihat */
}

.zoom-button {
    position: absolute; /* Memungkinkan tombol untuk diposisikan di dalam container */
    top: 50%; /* Posisi vertikal di tengah */
    left: 50%; /* Posisi horizontal di tengah */
    transform: translate(-50%, -50%); /* Menggeser tombol agar tepat di tengah */
    padding: 10px; /* Padding tombol */
    z-index: 1; /* Mengatur lapisan agar tombol terlihat di atas gambar */
    opacity: 0; /* Sembunyikan tombol secara default */
    transition: opacity 0.3s ease; /* Transisi untuk efek muncul */
    width: 30%;
}

.image-container img {
    transition: filter 0.3s ease; /* Transisi untuk efek gelap */
}

/* Efek ketika gambar dihover */
.image-container:hover img {
    filter: brightness(50%); /* Gelapkan gambar */
}

.image-container:hover .zoom-button {
    opacity: 1; /* Tampilkan tombol saat hover */
}
@media (max-width: 767px) {
    .zoom-button {
        top: 1rem; /* Jarak dari atas */
        left: 65%; /* Jarak dari kanan */
        transform: none; /* Hilangkan transformasi untuk posisi default */
    }

    .image-container .zoom-button {
        opacity: 1; /* Tampilkan tombol saat hover pada perangkat mobile */
    }
}

/* Media Query untuk perangkat desktop */
@media (min-width: 768px) {
    .zoom-button {
        top: 50%; /* Posisi vertikal di tengah */
        left: 50%; /* Posisi horizontal di tengah */
        transform: translate(-50%, -50%); /* Menggeser tombol agar tepat di tengah */
    }

    .image-container:hover img {
        filter: brightness(50%); /* Gelapkan gambar */
    }
}
</style>

    <div class="card">
        <div class="card-body">
            <ul class="timeline timeline-left">
                @foreach ($getChecklistAll as $checklist)
                    <li class="timeline-inverted timeline-item">
                        <div class="timeline-badge success" style="z-index: 0;"> <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Forms Living</h4>
                                <p><small class="text-muted"><i class="fa fa-clock-o"></i>
                                        {{ tgl_indo($checklist->tgl_update) }}</small>
                                </p>
                            </div>
                            <div class="timeline-body">
                                @if (!empty($checklist->foto) && file_exists(public_path('Home/images/termin/' . $checklist->foto)))
                                <div class="position-relative image-container">
                                    <button class="btn btn-success zoom-button"
                                        data-toggle="modal" data-target="#imageModal{{ $checklist->id_checklist }}">
                                        <i class="fas fa-search-plus"></i>
                                    </button>
                                    <img src="{{ asset('Home/images/termin/' . $checklist->foto) }}"
                                        class="img-fluid" style="width: 100%" alt="">
                                </div>


                            @else
                                {{--  <div class="position-relative" style="width: 30%;">
                                    <img src="{{ asset('Home/images/NoImg.jpg') }}" class="img-fluid" style="width: 100%" alt="">
                                </div>  --}}
                            @endif

                                <p>{{ $checklist->nama_jl }}</p>
                                {{--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal{{ $checklist->id_checklist }}" data-whatever="@mdo">Open modal for @mdo</button>
                                <button class="btn btn-sm btn-primary" type="button" style="position: absolute; top: 5px; right: 5px;" data-toggle="modal" data-target="#imageModal{{ $checklist->foto }}">
                                    View Full Screen
                                </button>  --}}
                            </div>
                        </div>
                    </li>
                    <div class="modal fade bs-example-modal-lg" id="imageModal{{ $checklist->id_checklist }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="imageModalLabel">Gambar {{ $checklist->nama_jl }}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body text-center">
                                  <img id="" src="{{ asset('Home/images/termin/' . $checklist->foto) }}" class="img-fluid" alt="Checklist Image">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                        </div>
                    </div>

                @endforeach

            </ul>
        </div>
    </div>


    <script>
        function openFullScreen(imgSrc) {
            let fullScreenDiv = document.getElementById('fullScreenImage');
            let fullImage = document.getElementById('fullImage');

            // Set the source of the full-screen image
            fullImage.src = imgSrc;

            // Show the full-screen container
            fullScreenDiv.style.display = 'flex';
        }

        function closeFullScreen() {
            // Hide the full-screen container
            document.getElementById('fullScreenImage').style.display = 'none';
        }
    </script>

@endsection
