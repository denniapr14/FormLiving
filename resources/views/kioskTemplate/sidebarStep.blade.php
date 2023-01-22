@section('sidebar')

<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('Home') }}/images/kiosk/logo-forms-living1.svg" alt="">
    </div>
    <div class="steps-kiosk">

        @if(Request::segment(2) == 'simulasi-kluster')
        <div class="step active">1</div>
        @else
        <div class="step">1</div>
        @endif


        @if(Request::segment(2) == 'simulasi-pilih-unit')
        <div class="step active">2</div>
        @else
        <div class="step">2</div>
        @endif



        @if (Request::segment(2) == 'simulasi-tipe')
        <div class="step active">3</div>
        @else
        <div class="step">3</div>
        @endif


        @if(Request::segment(2) == 'simulasi-modifikasi')
        <div class="step active">4</div>
        @else
        <div class="step">4</div>
        @endif

        @if (Request::segment(2) == 'simulasi-pembayaran')
        <div class="step active">5</div>
        @else
        <div class="step">5</div>
        @endif

        @if (Request::segment(2) == 'simulasi-harga')
        <div class="step active">6</div>
        @else
        <div class="step">6</div>
        @endif

        @if(Request::segment(2) == 'simulasi-order')
        <div class="step active">7</div>
        @else
        <div class="step">7</div>
        @endif

        @if(Request::segment(2)=='simulasi-data-konfirmasi')
        <div class="step active">8</div>

        @else
        <div class="step">8</div>
        @endif

    </div>
</div>


@endsection
