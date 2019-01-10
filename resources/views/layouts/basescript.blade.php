<script type="text/javascript">
    window.base_url  = "{{url('/')}}";
    window.base_path = "{{asset('/')}}";
</script>

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.js')}}"></script>
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/tabs.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.mb.YTPlayer.min.js')}}"></script>
<script src="{{asset('assets/js/swiper.min.js')}}"></script>
<script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/js/switcher.js')}}"></script>
<script src="{{asset('assets/js/modernizr.js')}}"></script>
<script src="{{asset('assets/js/map.js')}}"></script>
<script src="{{asset('assets/js/easy-pie-chart.min.js')}}"></script>
<script src="{{asset('assets/js/Chart.bundle.js')}}"></script>
<script src="{{asset('assets/js/utils.js')}}"></script>
<script src="{{asset('assets/js/revolution/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('assets/js/revolution/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('assets/js/revolution/revolution.addon.slicey.min8a54.js?ver=1.0.0')}}"></script>
<script src="{{asset('assets/js/revolution/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('assets/js/revolution/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('assets/js/revolution/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('assets/js/revolution/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('assets/js/revolution/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('admin/vendor/jquery-confirm/jquery-confirm.min.js')}}"></script>

<script type="text/javascript">
	function formatRupiah(angka){
		var 	bilangan = angka;
			
		var	number_string = bilangan.toString(),
			split	= number_string.split(','),
			sisa 	= split[0].length % 3,
			rupiah 	= split[0].substr(0, sisa),
			ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);
				
		if (ribuan) {
			separator = sisa ? ',' : '';
			rupiah += separator + ribuan.join(',');
		}

		if(rupiah == '') rupiah = 0;
		
		return 'Rp ' + rupiah;
	}

	function formatUang(angka){
		var 	bilangan = angka;
			
		var	number_string = bilangan.toString(),
			split	= number_string.split(','),
			sisa 	= split[0].length % 3,
			rupiah 	= split[0].substr(0, sisa),
			ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);
				
		if (ribuan) {
			separator = sisa ? ',' : '';
			rupiah += separator + ribuan.join(',');
		}

		if(rupiah == '') rupiah = 0;
		
		return rupiah;
	}
</script>
@yield('scripts')