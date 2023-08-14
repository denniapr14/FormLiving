@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@extends('flashdata')
@section('tittle', 'Forms | Data pelanggan')
@section('body', '')



@section('content')




<div class="cluster">
    <div class="header-simulation mobile-only">
        <div class="ornament one">
            <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
        </div>
        <div class="nav-header">
            <!--<div class="ic-back">-->
            <!--    <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">-->
            <!--</div>-->
            <h2 class="title">
                Miliki Unit
            </h2>
            <div></div>
        </div>
        <div class="steps">
            <div class="step done">1</div>
            <div class="step active">2</div>
            <div class="step last">3</div>
        </div>
    </div>
    <div class="container">
        <div class="steps">
            <div class="step done">1</div>
            <div class="step active">2</div>
            <div class="step last">3</div>
        </div>
        <div class=>
                <livewire:userpreorder></livewire:userpreorder>
        </div>

    </div>
</div>
</div>


<script>
    const promoCodeBtns = document.querySelectorAll(".promoCodeBtn");
        const selectedPromoCodeInput = document.getElementById("selectedPromoCode");

        promoCodeBtns.forEach((promoCodeBtn) => {
            promoCodeBtn.addEventListener("click", () => {
                const promoCode = promoCodeBtn.dataset.promoCode;
                const promo = promoCodeBtn.dataset.promo;
                selectedPromoCodeInput.value = promoCode;
                console.log(promoCode);

                document.getElementById('textPromo').innerText = promo;

                $('#modelId').modal('toggle');
                $('#modelId').modal('hide');

            });
        });
</script>

<script>
    $('#cariPromo').click(function() {
            var kodePromo = document.getElementById('promo').value;
            var spaceAlert = document.getElementById('myAlert');
            $.ajax({
                url: '/simulation-data-pelanggan/cariKuponSpesial/{id_rumah}/{id_tipe}/{id_pelanggan}/'+kodePromo,
                type: 'GET',

                dataType: 'json',
                success: function(response) {

                var len = 1;
                var promo="";
                    if(response.length == 1){
                        document.getElementById('selectedPromoCode').value= kodePromo;
                       for (var i = 0; i < len; i++) {
                           promo = response[i].promo;
                            spaceAlert.innerHTML = '<div class="alert alert-success">'+promo+' berhasil digunakan</div>';
                                console.log(promo);

                       }
                        document.getElementById('textPromo').innerText = promo;

                        $('#modelId').modal('hide');
                    }
                    else{
                        spaceAlert.innerHTML = '<div class="alert alert-danger">Promo tidak ada</div>';
                        $('#modelId').modal('hide');
                    }
                    if (response!==null) {


                    }
                     else {

                        // Update the UI to show an error message
                    }
                    console.log(response);
                }
            });
        });

</script>
<!-- Modal -->


@endsection
