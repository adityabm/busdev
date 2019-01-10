@extends('layouts.app')

@section('content')
<div class="section-block" style="padding-top: 2em">
   <div class="container">
      <div class="row">
         <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="row">
               <div class="shop-cart-box" id="1">
                  <div class="col-md-3 col-sm-3 col-xs-12">
                     <div class="shop-cart-box-img"> <img src="{{asset('project/images') .'/'. $project->images[0]->image}}" alt="img"> </div>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <div class="shop-cart-box-info">
                        <h4>{{$project->project_name}}</h4>
                        <span>{{$project->description}}</span> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="shop-cart-info-price clearfix">
               <ul class="right-info-price">
                  <li>
                     Total: 
                     <h6>{{rupiah($pay)}}</h6>
                  </li>
                  <li>
                     Biaya Administrasi: 
                     <h6>Rp 6.500,00</h6>
                  </li>
               </ul>
               <div class="total-price">
                  <p>Total: <strong>{{rupiah($pay + 6500)}}</strong></p>
               </div>
            </div>
            <div class="mt-25 right-holder">
            	<a href="{{url('/')}}" class="primary-button button-md" style="background: #acacac">Batal</a>
            	<a href="#" data-toggle="modal" data-target="#myModal" class="primary-button button-md" data-backdrop="static" data-keyboard="false">Proses Sekarang</a>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Proses Payment</h4>
      </div>
      <div class="modal-body">
        <center style="color:black;font-size: 1.5em" id="demo">Nomor VA : 8871{{rand()}}</center>
        <center style="color:black;font-size: 1.5em">Nomor VA : 8871{{rand()}}</center>
        <p style="color:black;font-size: 1em;text-align: center">
        	*Mohon Melakukan Pembayaran Sebelum Tanggal {{getFullDateDay(date('Y-m-d',strtotime('+1 days')))}}
        </p>
        <p style="color:black;font-size: 1em;padding-top:10px">
        	Tata Cara Pembayaran<br>
        	1. Install Aplikasi Mandiri Online <br>
        	2. Masukkan User ID dan PIN, kemudian klik ’Masuk’ <br>
        	3. Pilih Menu ’Bayar’ <br>
        	4. Klik ’Buat Pembayaran Baru’ untuk mengeluarkan pilihan menu <br>
        	5. Pilih ’Multipayment’ <br>
        	6. Pilih ‘Penyedia Jasa’ <br>
        	7. Pilih ’KitaBisnis’ <br>
        	8.  Masukkan Nomer VA (Virtual Account) KitaBisnis (Contoh: 8871222818xxx) dan klik ‘Tambah Sebagai Nomor Baru’ <br>
        	9. Pilih ’Konfirmasi’ ( ’Nama Pembayaran’ bersifat optional) <br>
        	10. Masukkan nominal pembayaran sesuai dengan order (Contoh : 459088), lalu klik ’Lanjut’ <br>
        	11. Konfirmasi pembayaran akan muncul berupa pembayaran ke KitaBisnis, nomer VA, dan total tagihan. Klik ’Konfirmasi’ jika benar <br>
        	12. Transaksi selesai. Mohon simpan bukti transaksi.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="bayar">Saya Sudah Melakukan Pembayaran</button>
      </div>
    </div>

  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$('#bayar').click(function(){
		$.confirm({
		    title: 'Apakah Anda Yakin?',
		    typeAnimated: true,
		    buttons: {
		        no: function () {
		        },
		        yes: function () {
		          var bayar = "{{$pay}}";
		          $.post("{{url('project/order/proses')}}",{id:"{{$project->id}}",bayar:bayar,_token:$('meta[name="csrf-token"]').attr('content')},function(data){
		          	if(data.success){
		          		$.alert(data.message + "<br><br>Tunggu hingga halaman merefresh sendiri.");

		          		setInterval(function(){
		          			window.location.href = "{{url('/')}}";
		          		}, 2000);
		          	}
		          });
		        }
		    }
		});
		
	});
</script>
<script>
// Set the date we're counting down to
var countDownDate = new Date("{{date('Y-m-d H:i:s',strtotime('+1 days'))}}").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)) + (days * 24);
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
@endsection