@extends('layouts.dashboard')

@section('content')
    <div class="content-panel">
        @if(isset($sub_menu))
        @include('dashboard.partials.sub-sidebar')
        @endif
        <div class="content-wrapper">
            <div class="header sub-header">
                <span class="uppercase">
                    <i class="ion ion-ios-information-outline"></i> {{ trans('dashboard.photos.photos') }}
                </span>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @include('partials.errors')
                    <div class="striped-list">
                        @foreach($photos as $photo)
                        <div class="row striped-list-item">
                            <div class="col-xs-1">
                                {{ $photo->id }} 
                            </div>
                            <div class="col-xs-7">
                                <img src="{{ $photo->image }}" style="width: 150px;">
                            </div>
                            <div class="col-xs-1">
                                <a href="{{ route('user.home', $photo->user->username) }}" target="_blank">{{ $photo->user->username }}</a>
                            </div>
                            <div class="col-xs-3 text-right">
                                <a href="/dashboard/photo/{{ $photo->id }}" class="btn-danger btn-sm confirm-action" data-method='delete'>{{ trans('forms.delete') }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                     <div class="text-right">
                    <!-- Pager -->
                    {!! $photos->appends(Request::except('page', '_pjax'))->render() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
@stop
