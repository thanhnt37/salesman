@extends('layouts.admin.application', ['menu' => 'contacts'] )

@section('metadata')
@stop

@section('styles')
    <link rel="stylesheet"
          href="{!! \URLHelper::asset('libs/datetimepicker/css/bootstrap-datetimepicker.min.css', 'admin') !!}">
@stop

@section('scripts')
    <script src="{{ \URLHelper::asset('libs/moment/moment.min.js', 'admin') }}"></script>
    <script src="{{ \URLHelper::asset('libs/datetimepicker/js/bootstrap-datetimepicker.min.js', 'admin') }}"></script>
    <script>
        $('.datetime-field').datetimepicker({'format': 'YYYY-MM-DD HH:mm:ss', 'defaultDate': new Date()});

        $(document).ready(function () {

        });
    </script>
@stop

@section('title')
@stop

@section('header')
    Contacts
@stop

@section('breadcrumb')
    <li><a href="{!! action('Admin\ContactController@index') !!}"><i class="fa fa-files-o"></i> Contacts</a></li>
    @if( $isNew )
        <li class="active">New</li>
    @else
        <li class="active">{{ $contact->id }}</li>
    @endif
@stop

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="@if($isNew) {!! action('Admin\ContactController@store') !!} @else {!! action('Admin\ContactController@update', [$contact->id]) !!} @endif" method="POST" enctype="multipart/form-data">
        @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
        {!! csrf_field() !!}

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <a href="{!! URL::action('Admin\ContactController@index') !!}"
                       class="btn btn-block btn-default btn-sm"
                       style="width: 125px;">@lang('admin.pages.common.buttons.back')</a>
                </h3>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            <label for="name">@lang('admin.pages.contacts.columns.name')</label>
                            <input disabled type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : $contact->name }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group @if ($errors->has('email')) has-error @endif">
                            <label for="email">@lang('admin.pages.contacts.columns.email')</label>
                            <input disabled type="text" class="form-control" id="email" name="email" value="{{ old('email') ? old('email') : $contact->email }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @if ($errors->has('domain')) has-error @endif">
                            <label for="domain">@lang('admin.pages.contacts.columns.domain')</label>
                            <input disabled type="text" class="form-control" id="domain" name="domain" value="{{ old('domain') ? old('domain') : $contact->domain }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @if ($errors->has('messages')) has-error @endif">
                            <label for="messages">@lang('admin.pages.contacts.columns.messages')</label>
                            <textarea disabled name="messages" class="form-control" rows="15" placeholder="@lang('admin.pages.contacts.columns.messages')">{{ old('messages') ? old('messages') : $contact->messages }}</textarea>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
@stop
