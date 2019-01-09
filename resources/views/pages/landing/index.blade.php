@extends('layouts.app')

@section('content')
<div class="main-image-section" style="background-image:url(assets/img/slider/slide22.jpg);">
    <div class="main-image-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
                    <div class="center-holder">
                        <h2> KITABISNIS </h2>
                        <h4 style="color:white"> Bisnis Kita, KitaBisnis </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-block-grey">
    <div class="container">
        <div class="section-heading center-holder">
            <h3>Doing the right thing at the right time</h3>
            <div class="section-heading-line"></div>
        </div>
        <div class="row mt-60">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="serv-section-2">
                    <div class="serv-section-2-icon"> <i class="icon-diamond"></i> </div>
                    <div class="serv-section-desc">
                        <h4>Planning</h4>
                        <h5>Business Planning</h5> </div>
                    <div class="section-heading-line-left"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="serv-section-2 serv-section-2-act">
                    <div class="serv-section-2-icon serv-section-2-icon-act"> <i class="icon-settings"></i> </div>
                    <div class="serv-section-desc">
                        <h4>Management</h4>
                        <h5>Retirement Planning</h5> </div>
                    <div class="section-heading-line-left"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="serv-section-2">
                    <div class="serv-section-2-icon"> <i class="icon-checked"></i> </div>
                    <div class="serv-section-desc">
                        <h4>Accumulation</h4>
                        <h5>Support and Sell</h5> </div>
                    <div class="section-heading-line-left"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-block">
    <div class="container">
        <div class="section-heading">
            <h5>Projek Terkini</h5>
            <div class="section-heading-line-left"></div>
        </div>
        <div class="row mt-30">
            @foreach($project as $p)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="shop-grid">
                    <div class="shop-grid-info" style="padding-bottom:10px">
                        <div class="row" style="padding-bottom:10px">
                            <div class="col-md-7 col-sm-7 col-xs-7 pr-0">
                                <h4><a href="{{url('project',$p->slug)}}">{{$p->project_name}}</a></h4>
                                <span>{{$p->description}}</span>
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
        </div>
    </div>
</div>
@endsection
