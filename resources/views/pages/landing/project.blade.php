@extends('layouts.app')

@section('content')
<div class="section-block" style="padding-top: 2em">
   <div class="container">
      <div class="row">
         <div class="col-md-7 col-sm-7 col-xs-12">
         	<h3 style="padding-bottom: .1em">{{$project->project_name}}</h3>
         	<h6 style="padding-bottom: 1em;font-weight: 300">
         		<span class="fa fa-calendar"></span> {{getFullDateDayTime($project->created_at)}}
         	</h6>

            <div class="project-single-box-img" style="max-height: 420px;overflow: hidden;"><img src="{{asset('project/images') .'/'. $project->images[0]->image}}" alt="img" style="max-height: 420px;object-fit:cover;overflow: hidden;"></div>
         </div>
         <div class="col-md-5 col-sm-5 col-xs-12" style="padding-top: 4em">
            <div class="project-single-box-info">
               <div class="project-info-shortcode">
                  <div class="row">
                     <div class="col-md-3 col-sm-3 col-xs-12 pr-0">
                        <div class="project-info-shortcode-icon"><i class="fa fa-user"></i></div>
                     </div>
                     <div class="col-md-9 col-sm-9 col-xs-12 pl-0">
                        <div class="project-info-shortcode-text">
                           <h5>Pembuat Projek</h5>
                           <p>{{$project->user->name}}</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="project-info-shortcode">
                  <div class="row">
                     <div class="col-md-3 col-sm-3 col-xs-12 pr-0">
                        <div class="project-info-shortcode-icon"><i class="fa fa-tags"></i></div>
                     </div>
                     <div class="col-md-9 col-sm-9 col-xs-12 pl-0">
                        <div class="project-info-shortcode-text">
                           <h5>Tags</h5>
                           <p>{{str_replace(',',', ',$project->tags)}}</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="project-info-shortcode">
                  <div class="row">
                     <div class="col-md-3 col-sm-3 col-xs-12 pr-0">
                        <div class="project-info-shortcode-icon"><i class="fa fa-money"></i></div>
                     </div>
                     <div class="col-md-9 col-sm-9 col-xs-12 pl-0">
                        <div class="project-info-shortcode-text">
                           <h5>Permohonan Dana</h5>
                           <p>{{rupiah($project->target)}}</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="project-info-shortcode">
                  <div class="row">
                     <div class="col-md-3 col-sm-3 col-xs-12 pr-0">
                        <div class="project-info-shortcode-icon"><i class="fa fa-calendar"></i></div>
                     </div>
                     <div class="col-md-9 col-sm-9 col-xs-12 pl-0">
                        <div class="project-info-shortcode-text">
                           <h5>Waktu Projek</h5>
                           <p>{{getFullDate($project->timeline_start)}} - {{getFullDate($project->timeline_end)}}</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="project-info-shortcode pb-0">
                  <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12" style="padding-right: 3em;padding-left: 3em">
                        <div class="progress-text">
                           <div class="row">
                              <div class="col-md-6 col-sm-6 col-xs-6"> Proses </div>
                              <div class="col-md-6 col-sm-6 col-xs-6 text-right"> {{round(($project->invest / $project->target) * 100,1)}}% </div>
                           </div>
                        </div>
                        <div class="progress progress-bold" style="background: #dedede">
                           <div class="progress-bar custom-bar wow slideInLeft animated" role="progressbar" aria-valuenow="{{round(($project->invest / $project->target) * 100,1)}}" aria-valuemin="0" aria-valuemax="100" style="width:{{round(($project->invest / $project->target) * 100,1)}}%"> </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
      	<div class="col-md-7 col-xs-12">
      		<div class="project-single-bottom-text mt-50">
      		   <div class="section-single-heading">
      		      <h4>Deskripsi Projek</h4>
      		      <div class="text-content-big mt-20">
      		         <p>{{$project->description}}</p>
      		      </div>
      		      <div class="row">
      		         <div class="col-md-6 col-sm-6 col-xs-12">
      		         	<h4>Dokumen Pendukung</h4>
      		            <ul class="primary-list mt-30">
      		            	@foreach($project->docs as $docs)
      		               <li><a href="{{url('project/document') . '/' . $docs->project_file}}" target="_blank"><i class="fa fa-file"></i> Project Document</a></li>
      		              @endforeach
      		            </ul>
      		         </div>
      		      </div>
      		   </div>
      		</div>
      	</div>

      	<div class="col-md-5 col-sm-5 col-xs-12" style="padding-top: 3em">
            <div class="project-single-box-info" style="background: #ececec;">
               <div class="project-info-shortcode">
                  <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12" style="padding-right: 3em;padding-left: 3em">
                        <div class="project-info-shortcode-text">
                           <h5 style="text-align: center;">Mari Bantu Projek Ini!</h5>
                           <h6 style="text-align: center;padding-top:10px">Dengan Profit {{$project->percentage}}% dari dana yang Anda Investasikan.</h6>
                           <h6 style="text-align: center;padding-top:20px">Masukkan jumlah investasi yang akan Anda investasikan. Setiap nilai uang yang diberikan akan bermanfaat bagi pembuat projek.</h6>
                           <h6 style="text-align: center;padding-top:10px">Maksimal Investasi : {{rupiah($project->target)}}</h6>

                           <input type="text" id="investment" name="" class="form-control" placeholder="Contoh : 1.000.000" style="margin-top: 20px;text-align: center;border-radius: .8em;color:black">
                           <h6 style="text-align: center;padding-top:20px">Setelah Projek ini selesai Anda akan mendapatkan sekitar.</h6>
                           <input type="text" id="hasil" name="" class="form-control" value="Rp 0" readonly="" style="margin-top: 10px;text-align: center;border-radius: .8em;background: white;color:black">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <button id="invest" class="btn btn-success" style="margin-top: 20px; width: 100%;border-radius: .8em;padding-top: 10px;padding-bottom: 10px;color:white">Investasikan Sekarang!</button>
         </div>
      </div>
   </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/vendor/cleave/cleave.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var cleaveNumeral = new Cleave('#investment', {
		    numeral: true,
		    numeralThousandsGroupStyle: 'thousand',
		});
	});

	$('#investment').on('keyup',function(){
		var val = parseFloat($(this).val().replace('Rp ','').replace(/,/g,''));

		var max = parseFloat("{{$project->target}}");

		if(val > max){
			$(this).val(formatUang(max));
			val = max;
		}

		var persen = parseFloat("{{$project->percentage}}");

		var hasil = (val * persen) / 100;

		var akhir = val + hasil;

		$('#hasil').val(formatRupiah(akhir.toFixed(2)));
	});

	$('#invest').click(function(){
		var val = parseFloat($('#investment').val().replace('Rp ','').replace(/,/g,''));

		if($('#investment').val() == 0 || $('#investment').val() == '' || $('#investment').val() == 'NaN'){
			$.alert('Yang bener aja nge invest 0');
			return;
		}

		window.location.href = "{{url('project/order',$project->slug)}}/"+val;
 	});
</script>
@endsection