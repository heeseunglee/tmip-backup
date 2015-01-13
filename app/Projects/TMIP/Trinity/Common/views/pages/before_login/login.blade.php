@extends('TrinityCommonView::layouts.before_login.master')

@section('additional_js_includes')
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/jquery.validate.min.js') }}
    {{ HTML::script('TMIP/Trinity/js/libs/jquery-validation/dist/additional-methods.min.js') }}
@endsection

@section('main_content')
    <section>
        <div class="section-body">
            <div class="box style-primary">
                <div class="box-body login_box">
                    {{ HTML::image('TMIP/Trinity/img/logos/logo_The_Mandarin.png', 'TMIP', array('class' => 'login_the_mandarin_logo')) }}
                    <div class="box style-transparent">
                        <div class="box-body no-padding">
                            {{ Form::open(array('action' =>  'Trinity.session.attemptLogin',
                                                'class' => 'form-horizontal form-validate',
                                                'role' => 'form',
                                                 'novalidate' => 'novalidate')) }}
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-lg-12 col-sm-12">
                                                    {{ Form::text('account_email', '', array('id' => 'account_email', 'class' => 'form-control', 'placeholder' => '이메일', 'required' => '', 'type' => 'email')) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-lg-12 col-sm-12">
                                                    {{ Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => '암호', 'required' => '', 'type' => 'password')) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-footer">
                                            <button type="submit" class="btn btn_login_submit"><i class="text-boldest">Submit</i></button>
                                        </div>
                                    </div>
                                </div>
                            {{ Form::close() }}

                        </div>
                    </div>
                    @include('flash::message')
                </div>
            </div>
        </div>
    </section>
@endsection