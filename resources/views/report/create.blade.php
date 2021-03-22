@extends ('layouts.app')
@section ('content')

<div class="main-wrap">
  <div class="container">
    <h2 class="brand-header">日報作成</h2>
    {!! Form::open(['route' => 'report.store']) !!}
      <div class="form-group form-size-small @if ($errors->has('reporting_time')) has-error @endif">
        {!! Form::date('reporting_time', date('Y-m-d'), ['class' => 'form-control']) !!}
        @if ($errors->has('reporting_time'))
          <span class="help-block alert-danger">{{ $errors->first('reporting_time') }}</span>
        @endif
      </div>
      <div class="form-group @if ($errors->has('title')) has-error @endif">
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
        @if ($errors->has('title'))
          <span class="help-block alert-danger">{{ $errors->first('title') }}</span>
        @endif
      </div>
      <div class="form-group @if ($errors->has('contents')) has-error @endif">
        {!! Form::textarea('contents', null, ['class' => 'form-control', 'rows'=> '10', 'cols'=> '50', 'placeholder' => 'Content']) !!}
        @if ($errors->has('contents'))
          <span class="help-block alert-danger">{{ $errors->first('contents') }}</span>
        @endif
      </div>
      {!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection
