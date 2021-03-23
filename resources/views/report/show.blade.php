@extends ('layouts.app')
@section ('content')

<div class="main-wrap">
  <div class="container mt-5">
    <h1 class="brand-header">日報詳細</h1>
    <div class="card">
      <div class="card-header">
        {{ $daily_report->reporting_time->format("Y/m/d(D)") }}の日報
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <h2>{{ $daily_report->title }}</h2>
          <p class="blockquote-footer">{!! nl2br(e($daily_report->contents)) !!}</p>
        </blockquote>
        <div class="btn-wrapper d-flex justify-content-end">
          <a class="mr-4 btn btn-success" href="{{ route('report.edit', $daily_report->id) }}">
            Edit
          </a>
            {!! Form::open(['route' => ['report.destroy', $daily_report->id], 'method' => 'DELETE']) !!}
              {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection