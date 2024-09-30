@extends('V_Guest.app')

@extends('flashdata')
@section('title', 'Form One | Pembangunan')
@section('pageTitle', 'Rincian Pembangunan Rumah')
@section('back', route('dashboard.guest', [$getProjek->nama_projek]))
@section('breadcrumb', 'Pembangunan Rumah')
@section('breadcrumb2', 'Rincian Pembangunan Rumah')
@section('content')

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

                                @if (!empty($checklist->foto))
                                    <img src="{{ asset('Home/images/termin/' . $checklist->foto) }}" class="img-fluid"
                                        style="width: 20%" alt="">
                                @else
                                    <img src="{{ asset('Home/images/') }}/NoImg.jpg" class="img-fluid" style="width: 30%"
                                        alt="">
                                @endif

                                <p>{{ $checklist->nama_jl }}</p>
                                <button class="btn btn-sm btn-primary" type="button" style="position: absolute; top: 5px; right: 5px;" data-toggle="modal" data-target="#imageModal{{ $checklist->foto }}">
                                    View Full Screen
                                </button>
                            </div>
                        </div>
                    </li>
                    <div class="modal fade" id="imageModal{{ $checklist->foto }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="imageModalLabel">Image Full Screen</h5>
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
