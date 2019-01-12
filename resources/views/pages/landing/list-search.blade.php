@extends('layouts.app')

@section('content')
<div class="section-block" style="padding-top: 2em">
   <div class="container">
      <div class="section-heading">
         <h5>Daftar Projek dengan Nama Projek : <b>{{$search}}</b></h5>
         <div class="section-heading-line-left"></div>
      </div>
      <div class="row mt-30">
      	@foreach($project as $p)
         <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="shop-grid">
                  <div class="shop-grid-info" style="padding-bottom:10px">
                      <div class="row" style="padding-bottom:10px">
                          <div class="col-md-7 col-sm-7 col-xs-7 pr-0" style="overflow: hidden;text-overflow: ellipsis;color:#5f5f5f">
                              <h4><a href="{{url('project',$p->slug)}}">{{$p->project_name}}</a></h4>
                              <span style="color:#5f5f5f;white-space: nowrap;">{{$p->description}}</span>
                          </div>
                          <div class="col-md-5 col-sm-5 col-xs-5 pl-0">
                              <h5 style="font-size: 1em">{{rupiah($p->target)}}</h5> </div>
                      </div>
                      <div class="progress" style="border-radius:3rem;margin-bottom:0">
                          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{round(($p->invest / $p->target) * 100,1)}}"
                          aria-valuemin="0" aria-valuemax="100" style="width:{{round(($p->invest / $p->target) * 100,1)}}%">
                              {{round(($p->invest / $p->target) * 100,1)}}%
                          </div>
                      </div>
                  </div>
                  <div class="shop-grid-img"><img src="{{asset('project/images') .'/'. $p->images[0]->image}}" alt="img"></div>
              </div>
         </div>
         @endforeach
         {{ $project->links() }}
      </div>
   </div>
</div>
@endsection