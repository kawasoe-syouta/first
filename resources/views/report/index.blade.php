@extends('layouts.app')
@section ('content')

<div class="main-wrap">
  <div class="container text-center">
    <h2 class="brand-header">日報一覧</h2>
    <div class="btn-wrapper">
      {{--  TODO 日報検索機能  --}}
      {!! Form::open(['route' => 'report.index', 'class' => 'btn-group', 'method' => 'GET']) !!}
        {!! Form::month('reporting_time', null, ['class' => 'form-control']) !!}
        {!! Form::button('<i class="fa fa-search"></i>', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
      {!! Form::close() !!}
      <a class = "btn btn-success" href="{{ route('report.create') }}"><i class="fa fa-plus"></i></a>
    </div>
    <table class="table table-striped mt-4">
      <thead>
        <tr>
          <th class="col-xs-2">Date</th>
          <th class="col-xs-3">Title</th>
          <th class="col-xs-5">Content</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($daily_reports as $daily_report)
        <tr>
          <td>{{ $daily_report->reporting_time->format('Y-m-d') }}</td>
          <td>{{ mb_strimwidth($daily_report->title, 0, 20, '...') }}</td>
          <td>{{ mb_strimwidth($daily_report->contents, 0, 30, '...') }}</td>
          <td class="col-xs-2"><a href="{{ route('report.show', $daily_report->id) }}"><i class="fa fa-book"></i></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div aria-label="Page navigation example" class="d-flex justify-content-center">
      {{ $daily_reports->appends(Request::query())->links() }}
    </div>
  </div>
</div>
@endsection