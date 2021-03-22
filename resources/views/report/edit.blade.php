@extends ('layouts.app')
@section ('content')

<div class="main-wrap">
  <div class="container">
    <h1 class="brand-header">日報編集</h1>
    {!! Form::open(['route' => ['report.update', $daily_report->id], 'method' => 'PUT']) !!}
      <div class="form-group form-size-small @if ($errors->has('reporting_time')) has-error @endif">
        {!! Form::date('reporting_time', $daily_report->reporting_time->format('Y-m-d'), ['class' => 'form-control']) !!}
        @if ($errors->has('reporting_time'))
          <span class="help-block alert-danger">{{ $errors->first('reporting_time') }}</span>
        @endif
      </div>
      <div class="form-group @if ($errors->has('title')) has-error @endif">
        {!! Form::text('title', $daily_report->title, ['class' => 'form-control']) !!}
        @if ($errors->has('title'))
          <span class="help-block alert-danger">{{ $errors->first('title') }}</span>
        @endif
      </div>
      <div class="form-group @if ($errors->has('contents')) has-error @endif">
        {!! Form::textarea('contents', $daily_report->contents, ['class' => 'form-control', 'rows'=> '10', 'cols'=> '50']) !!}
        @if ($errors->has('contents'))
          <span class="help-block alert-danger">{{ $errors->first('contents') }}</span>
        @endif
      </div>
      {!! Form::button('Update', ['class' => 'btn btn-success pull-right', 'type' => 'submit']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection
