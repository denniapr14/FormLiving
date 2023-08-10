@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle', 'Forms | Simulasi Kluster')
@section('body', '')

@section('content')

    <style>
        .collapsible {
            border: 1px solid #ccc;
            margin-bottom: 10px;
            border-radius: 15px;
            transition: all .5s;

        }

        .collapsible-btn {
            background-color: #198754;
            border: none;
            padding: 10px;
            border-radius: 15px;
            cursor: pointer;
            width: 100%;
            text-align: left;
            color: white;
        }

        .collapsible-content {
            display: none;
            padding: 10px;
            border-radius: 15px;
            transition: all .5s;
        }

    </style>
    <div class="cluster">
        <div class="header-simulation mobile-only">
            <div class="ornament one">
                <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
            </div>
            <div class="nav-header">
                <a href="/Greenland" class="ic-back">
                    <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">
                </a>
                <h2 class="title">
                    Pilih Unit
                </h2>
                <div></div>
            </div>
            <div class="steps">
                <div class="step active">1</div>
                <div class="step">2</div>
                <div class="step last">3</div>
            </div>
        </div>

        <div class="container">
            <div class="steps">
                <div class="step active">1</div>
                <div class="step">2</div>
                <div class="step last">3</div>
            </div>

            <div class="choose-cluster">
                <h2 class="title">
                    Pilih Unit
                </h2>
                @foreach ($cluster as $cluster)
                    <div class="collapsible">
                        <button class="collapsible-btn">
                            @if ($cluster->logo_img!= null || $cluster->logo_img != "")
                            <img style="max-height: 60px; "
                            src="{{ asset('Home') }}/images/logo_cluster/{{ $cluster->logo_img }}" alt="">
                            @else
                            <b>
                                {{ $cluster->nama_cluster }}

                            </b>

                            @endif

                        </button>
                        <div class="collapsible-content">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($rumah as $home)
                                        @if ($home->codecluster == $cluster->codecluster)
                                            <div class="col-6 col-lg-3">
                                               
                                                    <div class="item">
                                                        <div class="item-image">
                                                            @if ($home->nama_img != null)
                                                                <img src="{{ asset('home') }}/images/rumah/{{ $home->nama_img }}"
                                                                    alt="">
                                                            @else
                                                                <img src="{{ asset('home') }}/images/60.jpg" alt="">
                                                            @endif
                                                        </div>
                                                        <div class="item-title">{{ $home->blok }} - {{ $home->nomor }}
                                                        </div>
                                                        <div class="avail">Luas Tanah :
                                                            {{ $home->luas_tanah }}m<sup>2</sup></div>
                                                            <hr/>
                                                            <div class="btn-group desktop-only">
                                                                <a href="/PreOrderUser/R" class="btn btn-sm btn-primary custom-button"> Book Refund</a>
                                                                <a href="/PreOrderUser/NR" class="btn btn-sm btn-success custom-button"> Book Non-Refund</a>
                                                            </div>
                                                            <div style="" class="btn-group mobile-only">
                                                                <a href="/PreOrderUser/R" class="btn btn-sm btn-primary custom-button"> Book Refund</a>
                                                                <a href="/PreOrderUser/NR" class="btn btn-sm btn-success custom-button"> Book Non-Refund</a>
                                                            </div>
                                                    </div>                                                   
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

            {{--  <div class="btn-groups">
            <a href="/cluster" type="button" class="btn btn-grey">Kembali</a>
            <a href="/simulation-select-unit" type="button" class="btn btn-primary">Lanjutkan</a>
        </div>  --}}
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".collapsible-btn");

            buttons.forEach(button => {
                button.addEventListener("click", function() {
                    const content = this.nextElementSibling;
                    content.style.display = content.style.display === "block" ? "none" : "block";
                });
            });
        });

        $(".check-radio-unit").hide();
        $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            var inputValue = "radio-"+$(this).attr("id");
        $("#" + inputValue).toggle();
    });
});

    </script>

@endsection
