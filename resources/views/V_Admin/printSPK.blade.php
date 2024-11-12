
@extends('V_Admin.app')

@extends('flashdata')
@section('title', 'Forms| SPK')
@section('pageTitle', 'SPK')
@section('back', route('spk.admin', [$getProjek->nama_projek]))
@section('breadcrumb', 'SPK')
{{-- @section('breadcrumb2', 'Tambah Produk') --}}
@section('content')

<style>
.myinput {
  height: 30px;
}

.form-inline {
  height: 30px;
}

table,
tr,
td,
th {
  height: 20px;
  border: none;
}

table.no-space td,
table.no-space tr,
table.no-space th {
  padding: 2px;
}

@media print {
  @page :footer {
    display: none
  }

  @page :header {
    display: none
  }

  @page {
    size: F4;
    margin: 5px 0 -100px 0;

  }

  p {
    line-height: 1.5;
  }

  body {
    margin: 0;

  }

  .pagebreak {
    page-break-before: always;
  }

  /* page-break-after works, as well */

  body * {
    visibility: hidden;
    font-size: 20px;
    line-height: 12px;
    color: black;
  }

  #printcontent * {
    visibility: visible;
  }

  #printcontent {
    /* position: absolute; */
    left: 0;
    right: 0;
    top: -90px;
  }

  .br-nLine {
    page-break-before: always;
  }

  .footerPrint {
    background-color: white;
    height: 100%;
    width: 100%;
    position: relative;
    page-break-before: always;

  }

  table.solid-border td,
  table.solid-border tr,
  table.solid-border th {
    border: 2px solid black;
  }

  .noprint {
    display: none;
  }


  .hidden {
    display: none;
  }

  .myinput {
    border: 0px;
    height: 20px;
  }

  .form-inline {
    height: 20px;
  }
}
</style>

<div class="content">
  <div class="content-fluid">

    <div class="col-md-12">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Collapsable</h3>

          <div class="card-tools">
            {{--  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>  --}}
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="">



          <div>
            <center>
              <p> <b>
                  SURAT PERJANJIAN KERJA
              </p></b>


              <p>

                <input type="text" name="" style="font-weight:bold" class="my-input" value="{{ $firstSPK->no_spk }}">

              </p>
              <br>
              <p>
                tentang
              </p>
              <br>
              <p style="line-height: 1.5;">
                Pekerjaan Rumah RE <br>
                Proyek Perumahan Greenland At Tidar <br>
                Malang – Jawa Timur


              </p>

            </center>
          </div>



          <div>
            <p style="line-height: 1.5;">Pada hari ini,
              <input type="text" name="" class="my-input" value="" style="width: 60px;" placeholder="masukan hari">
              tanggal
              <input type="text" name="" class="my-input" value="" placeholder="masukan tanggal">
              ,
              kami yang
              bertandatangan di bawah ini :
            </p>
            <table>




              <tr>
                <td style="width:20px;">1. </td>
                <td style="width:200px;">Nama </td>
                <td>: {{ $firstSPK->nama_plgn }}</td>

              </tr>
              <tr>
                <td></td>
                <td>Bertindak atas nama </td>
                <td>: PT. CITRA ARGO TIRTA</td>

              </tr>
              <tr>
                <td></td>
                <td>Alamat </td>
                <td>: Jl. Raya Candi VI C Blok A No. 1 Malang</td>
              </tr>
              <tr>
                <td></td>
                <td colspan="2">&nbsp </td>
              </tr>
              <tr>
                <td></td>
                <td colspan="2">Selanjutnya disebut sebagai PIHAK KESATU </td>


              </tr>
              <tr>
                <td style=""></td>
                <td></td>
                <td></td>

              </tr>
              <tr>
                <td style="">2. </td>
                <td>Nama </td>
                <td>: {{ $firstSPK->nama_subkon }}</td>

              </tr>

              <tr>
                <td></td>
                <td>Bertindak atas nama </td>
                <td>: {{ $firstSPK->perusahaan_subkon }}</td>

              </tr>
              <tr>
                <td></td>
                <td>Alamat </td>
                <td>: {{ $firstSPK->alamat_subkon }}</td>
              </tr>
              <tr>
                <td></td>
                <td colspan="2">&nbsp </td>
              </tr>
              <tr>
                <td></td>
                <td colspan="2">Selanjutnya disebut sebagai PIHAK KEDUA </td>


              </tr>
            </table>

          </div>


          <div>
            <p style="line-height: 1.5;">
              Pihak Kesatu dengan ini memberikan Pekerjaan Rumah RE di lokasi Greenland At Tidar Malang kepada Pihak
              Kedua dengan ketentuan sebagai berikut :
            </p>
          </div>

          <div>
            <center>
              <p>

                PASAL 1 <br>
                LINGKUP PEKERJAAN

              </p>
            </center>
          </div>

          <div>
            <p style="line-height: 1.5;">
              Pihak Kesatu memberikan pekerjaan kepada Pihak Kedua berupa : <br>
              Rumah tipe {{ $firstSPK->tipe }}/{{ $firstSPK->luas_tanah }} blok {{ $firstSPK->blok.' - '. $firstSPK->nomor }}<input
                type="text" class="myinput" placeholder="masukan edisi" value="{{ $firstSPK->catatan_khusus }}" required
                style="width: 30%;">

            </p>
          </div>

          <div>
            <center>
              <p>

                PASAL 2 <br>
                NILAI PEKERJAAN


              </p>
            </center>
          </div>
          <div>
            <ol>
              <li>Nilai borongan untuk pekerjaan tersebut : <br>
                <table>
                  <tr>
                    <td>Blok {{ $firstSPK->blok.' - '. $firstSPK->nomor }} tipe {{ $firstSPK->tipe }} </td>
                    <td>x </td>
                    <td>Rp.&nbsp;

                      <input type="number" class="myinput" id="hargaTipe" name="" value="" onkeyup="OnhargaTipe()">
                    </td>
                    <td>=
                      Rp.&nbsp;<input type="text" class="myinput" id="hasilTipe" name="" value=""></td>

                  </tr>
                  <tr>
                    <td></td>
                    <td> </td>
                    <td>PPN 10%
                    </td>
                    <td>= <u>Rp. <input type="number" class="myinput" id="ppn" name=""
                          value="{{ rupiah($firstSPK->ppn_spk) }}"></u>

                    </td>

                  </tr>
                  <tr>
                    <td></td>
                    <td> </td>
                    <td>Total
                    </td>
                    <td>= Rp. <input type="number" class="myinput" id="totalHarga" name="" onkeyup="hasilTotal()"
                        value="{{ rupiah($firstSPK->ppn_spk) }}">
                      <a href="#"
                        onclick="terbilangSetInput('totalHarga', 'terisi'); return convertToRupiah(document.getElementById('totalharga').value, 'textHarga1'); "
                        class="btn btn-outline-primary noprint">
                        <i class="fa fa-check"></i> </a></span></strong></span>

                  </tr>
                </table>
                <p> Terbilang :&nbsp; <input type="text" id="terisi" style="width: 80%;" readonly class="myinput">
              </li>
              <li>
                <p>Harga sudah termasuk PPh Kontraktor.</p>

              </li>
              <li>
                <p style="line-height: 1.5;">
                  Pihak Kedua tidak dapat mengajukan claim kenaikan harga borongan yang disebabkan kenaikan harga
                  dll, setelah Surat Perjanjian Kerja ini ditandatangani oleh kedua belah pihak sampai selesai
                  pelaksanaan.
                </p>
              </li>
            </ol>
          </div>

          <div>
            <center>
              <p>
                PASAL 3 <br>
                CARA PEMBAYARAN


              </p>
            </center>
          </div>

          <div>
            <ol>

              <li>
                <p style="line-height: 1.5;">Pembayaran dilaksanakan oleh Pihak Kesatu kepada Pihak Kedua sebagai
                  berikut :</p>

                <table style="top:-20px">
                  <tr>
                    <td>
                      a.
                    </td>
                    <td>Termin I</td>
                    <td>: Fisik pekerjaan 30%, dana yang dibayarkan 25% dari nilai kontrak.</td>
                  </tr>
                  <tr>
                    <td>
                      b.
                    </td>
                    <td>Termin II</td>
                    <td>: Fisik pekerjaan 55%, dana yang dibayarkan 25% dari nilai kontrak.</td>
                  </tr>
                  <tr>
                    <td>
                      a.
                    </td>
                    <td>Termin III</td>
                    <td>: Fisik pekerjaan 80%, dana yang dibayarkan 25% dari nilai kontrak.</td>
                  </tr>
                  <tr>
                    <td>
                      a.
                    </td>
                    <td>Termin IV</td>
                    <td>: Fisik pekerjaan 100%, dana yang dibayarkan 22% dari nilai kontrak.</td>
                  </tr>
                </table>
              </li>
              <li>
                <p>Pembayaran akan dipotong pajak penghasilan (PPh) sesuai dengan aturan perpajakan yang berlaku saat
                  pembayaran termin.</p>
              </li>
            </ol>
          </div>

          <div>
            <center>
              <p>
                PASAL 4 <br>
                JANGKA WAKTU


              </p>
            </center>
          </div>

          <div>
            <p style="line-height: 1.5;">Pihak Kedua menyatakan kesanggupannya untuk melaksanakan pekerjaan seperti
              tercantum dalam pasal 1 Surat
              Perjanjian ini :</p>
            <ul>
              <li>

                Jangka waktu pekerjaan mulai tanggal <input type="text" class="my-input" style="width: 150px;"
                  placeholder="masukan tanggal" name="" value=""> sampai dengan <input type="text" class="my-input"
                  style="width: 150px;" name="" placeholder="masukan tanggal" value="">
                (<input type="text" class="my-input" style="width: 20px;" name="" value=""> bulan).

              </li>
            </ul>
          </div>

          <div>
            <center>
              <p>
                PASAL 5 <br>
                PENYERAHAN DAN MASA PEMELIHARAAN PEKERJAAN


              </p>
            </center>
          </div>

          <div>
            <ol>
              <li>
                <p style="line-height: 1.5;">Penyerahan pekerjaan dalam keadaan selesai dengan baik oleh Pihak Kedua
                  kepada Pihak Kesatu dilakukan
                  melalui Berita Acara Serah Terima pekerjaan.</p>
              </li>
              <li>
                <p style="line-height: 1.5;">Masa pemeliharaan pekerjaan selama <input type="" name=""
                    style="width: 40px;" class="my-input" value=""> hari, khusus untuk masalah kebocoran masa
                  pemeliharaan sampai dengan 1 musim penghujan.
                </p>
              </li>
            </ol>
          </div>

          <div>
            <center>
              <p>
                PASAL 6 <br>
                PEKERJAAN TAMBAH KURANG


              </p>
            </center>
          </div>

          <div>
            <ol>
              <li>
                <p style="line-height: 1.5;">Apabila dalam pelaksanaan pekerjaan diperlukan pekerjaan tambah/kurang,
                  maka penyelesaiannya akan
                  diatur dalam perjanjian tambah/addendum yang merupakan bagian yang tidak dapat dipisah-pisahkan dari
                  Surat Perjanjian ini.</p>
              </li>
              <li>
                <p>Pekerjaan tambah/kurang hanya dapat dilaksanakan oleh Pihak Kedua setelah mendapat persetujuan
                  secara tertulis dari Pihak Kesatu.
                </p>
              </li>
            </ol>
          </div>
          <p style="page-break-before: always">
          <div>
            <center>
              <p>
                PASAL 7 <br>
                PENGAWASAN


              </p>
            </center>
          </div>

          <div>
            <ol>
              <li>
                <p style="line-height: 1.5;">Untuk mengawasi jalannya pekerjaan yang diborongkan, Pihak Kesatu menunjuk
                  Teknik Perencanaan dan
                  Pengawas Lapangan selaku penanggung jawab di bidang teknik dan kualitas pekerjaan (c.q Saudara
                   {{ $firstSPK->nama_ua }} ).</p>
              </li>
              <li>
                <p style="line-height: 1.5;">Pihak Kedua wajib memberikan laporan tertulis pada wakil Pihak Kesatu
                  setiap satu minggu sekali,
                  yaitu untuk menilai layak tidaknya kemajuan fisik yang dicapai di lapangan.
                </p>
              </li>
              <li>
                Petunjuk-petunjuk yang diberikan oleh Pihak Kesatu atau wakil yang ditunjuk Pihak Kesatu sehubungan
                dengan pelaksanaan pekerjaan ini baik secara tertulis apapun petunjuk langsung di tempat pekerjaan wajib
                dilaksanakan oleh Pihak Kedua.

              </li>
            </ol>
          </div>

          <div>
            <center>
              <p>
                PASAL 8 <br>
                SANKSI DAN DENDA
              </p>
            </center>
          </div>

          <div>
            <ol>
              <li>
                <p style="line-height: 1.5;">Sanksi keterlambatan penyelesaian pekerjaan dikenakan denda 2 (dua) per mil
                  dari nilai kontrak
                  setiap hari keterlambatan.</p>
              </li>
              <li>
                <p style="line-height: 1.5;">Pihak Kedua dengan ini berjanji bahwa pekerjaan tersebut tidak akan
                  diberikan kepada Pihak Ketiga,
                  tetapi dikerjakan sendiri. Apabila ternyata Pihak Kedua memberikan pekerjaan kepada Pihak Ketiga, maka
                  hal tersebut merupakan kesalahan Pihak Kedua dan dengan ini Pihak Kedua bersedia dikenakan
                  sanksi/denda sebesar 25% dari nilai kontrak.
                </p>
              </li>
              <li>
                Apabila Pihak Kedua tidak dapat melanjutkan pekerjaan, dana ditahan 3% menjadi hak Pihak Kesatu.

              </li>
            </ol>
          </div>

          <div>
            <center>
              <p>
                PASAL 9 <br>
                PENGHENTIAN PELAKSANAAN PEKERJAAN

              </p>
            </center>
          </div>

          <div>
            <ol>
              <li>
                <p style="line-height: 1.5;">Pihak Kedua tidak berhak menghentikan pekerjaan tanpa memberitahu terlebih
                  dahulu kepada Pihak
                  Kesatu.</p>
              </li>
              <li>
                <p style="line-height: 1.5;">Dalam hal Pihak Kesatu beranggapan bahwa jalannya pekerjaan menyimpang dari
                  ketentuan dan meminta
                  kepada Pihak Kedua agar pelaksanaan pekerjaan tersebut dihentikan, maka Pihak Kedua tidak berhak
                  meminta ganti rugi atau perpanjangan waktu pelaksanaan pekerjaan kepada Pihak Kesatu.
                </p>
              </li>

            </ol>
          </div>

          <div>
            <center>
              <p>
                PASAL 10 <br>
                PERSELISIHAN


              </p>
            </center>
          </div>

          <div>
            <ol>
              <li>
                <p style="line-height: 1.5;">Perselisihan pendapat Antara Pihak Kesatu dan Pihak Kedua dalam pelaksanaan
                  pekerjaan ini, pada
                  dasarnya akan diselesaikan secara musyawarah dan mufakat diantara kedua belah pihak.</p>
              </li>
              <li>
                <p style="line-height: 1.5;">Bila perselisihan tidak dapat diselesaikan melalui musyawarah sebagaimana
                  dimaksud dalam ayat 1
                  pasal ini, maka terhadap pihak yang merasa dirugikan berhak mengajukan perselisihan ini kepada
                  Pengadilan Negeri.
                </p>
              </li>

            </ol>
          </div>

          <div>
            <center>
              <p style="line-height: 1.5;">
                PASAL 11 <br>
                LAMPIRAN-LAMPIRAN
              </p>
            </center>
          </div>

          <div>
            <p style="line-height: 1.5;">Seluruh lampiran yang ada, yang berhubungan dengan Surat Perjanjian Kerja
              adalah merupakan bagian yang
              mutlak dan tidak dapat terpisahkan dengan Surat Perjanjain Kerja ini.</p>
          </div>

          <div>
            <center>
              <p>
                PASAL 12 <br>
                LAIN-LAIN

              </p>
            </center>
          </div>

          <div>
            <ol>
              <li>Segala tanggung jawab yang timbul kepada Pihak Ketiga (Leveransir dll) adalah tanggung jawab
                sepenuhnya Pihak Kedua.</li>
              <li>Segala sesuatu yang belum tercantum dalam Surat Perjanjian Kerja ini akan dibuat tersendiri atas dasar
                mufakat kedua belah pihak.</li>
              <li>Surat Perjanjian Kerja ini bersifat sementara sampai pengurusan pajak kedua belah pihak selesai.</li>
            </ol>
            <p style="line-height: 1.5;">Demikian Surat Perjanjian Kerja ini dibuat dalam rangkap dua yang sama kekuatan
              hukumnya, ditandatangani
              oleh kedua belah pihak yang sesuai dengan peraturan hukum yang berlaku.</p>
          </div>
          <div class="col-md-12">

            <table style="width: 100%;">
              <tr>
                <td>Malang, <input type="" class="my-input" name="" value=""></td>
                <td></td>

              </tr>
              <tr>
                <td>Pihak Kesatu, </td>
                <td>Pihak Kedua, </td>

              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><b>ROBERT MARTEE</b></td>
                <td><b>{{ $firstSPK->nama_subkon }}</b></td>

              </tr>
            </table>
          </div>









          <a href="#" class="btn btn-success no-print" onclick="window.print()"> <i class="fas fa-print"> Cetak
              Sekarang</i></a>
        </div>
      </div>





      <script>
      // let jumlah, getHasilTipe, hasilTotal, getHargaTipe, getTipe, getPPN;
      // getHargaTipe = document.getElementById("hargaTipe").value;
      // getTipe = document.getElementById("tipe").value;
      // getPPN = document.getElementById("ppn").value;
      // getHasilTipe = document.getElementById('hasilTipe').value;

      // function hasilTotal() {
      //   hasilTotal = getPPN + getHargaTipe;
      //   document.getElementById('totalHarga').value = hasilTotal;
      // }

      // function OnhargaTipe() {
      //   jumlah = getTipe * getHargaTipe;
      //   getHasilTipe = jumlah;
      // }

      function terbilangSet(getElId, set) {
        let getValue = document.getElementById(getElId).value;
        this.document.getElementById(set).innerHTML = ": " + terbilang(getValue) + " Rupiah";
      }

      function terbilangSetInput(getElId, set) {
        let getValue = document.getElementById(getElId).value;
        this.document.getElementById(set).value = " " + terbilang(getValue) + " Rupiah";
      }
      </script>

      <script>
      function convertToRupiah(angka, textId, textId2 = null) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
          if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        document.getElementById(textId).innerHTML = 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('') +
          ',-';


        document.getElementById(textId2).innerHTML = 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('') +
          ',-';





      }
      </script>

      @endsection
