@extends('layouts.admin.app')

@section('content')
<section class="statistic statistic2 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--green">
                    <h2 class="number">{{$data['submit']}}</h2>
                    <span class="desc">Projek Diajukan</span>
                    <div class="icon">
                        <i class="zmdi zmdi-edit"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--orange">
                    <h2 class="number">{{$data['done']}}</h2>
                    <span class="desc">Projek Selesai</span>
                    <div class="icon">
                        <i class="zmdi zmdi-check-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--blue">
                    <h2 class="number">{{$data['reject']}}</h2>
                    <span class="desc">Projek Ditolak</span>
                    <div class="icon">
                        <i class="zmdi zmdi-close-circle-o"></i>
                    </div>
                </div>
            </div>
            @if(Auth::user()->role == 'admin')
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--red">
                    <h2 class="number">{{$data['invest']}}</h2>
                    <span class="desc">Projek Diinvestasikan</span>
                    <div class="icon">
                        <i class="zmdi zmdi-money"></i>
                    </div>
                </div>
            </div>
            @else
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--red">
                    <h2 class="number">{{rupiah(Auth::user()->balance)}}</h2>
                    <span class="desc">Saldo Anda</span>
                    <div class="icon">
                        <i class="zmdi zmdi-money"></i>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection