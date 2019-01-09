@extends('layouts.app')

@section('content')
<div class="section-block" style="padding-top:1em">
 <div class="container">
    <div class="row">
       <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="section-heading mt-15">
             <h4>Masuk</h4>
             <div class="section-heading-line-left"></div>
          </div>
          <div class="contact-form-box mt-30">
             <form class="contact-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <input type="email" name="email" placeholder="Email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <input type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Kata Sandi">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label class="form-check-label" for="remember">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="width:auto">
                            Ingat Saya
                        </label>
                    </div>
                   <div class="col-md-3 col-md-offset-9 mb-30">
                      <div class="center-holder"><button type="submit">Masuk</button></div>
                   </div>
                </div>
             </form>
          </div>
       </div>
       <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="section-heading mt-15">
             <h4>Daftar</h4>
             <div class="section-heading-line-left"></div>
          </div>
          <div class="contact-form-box mt-30">
             <form class="contact-form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <input id="name" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Nama" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <input type="email" name="email" placeholder="Email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <input type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Kata Sandi">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <input type="password" name="password_confirmation" required placeholder="Konfirmasi Kata Sandi">
                    </div>
                   <div class="col-md-3 col-md-offset-9 mb-30">
                      <div class="center-holder"><button type="submit">Daftar</button></div>
                   </div>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>
</div>
@endsection
