<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DailyReportRequest;
use App\Models\DailyReport;
use Auth;

class DailyReportController extends Controller
{
    private $daily_report;

    public function __construct(DailyReport $instanceClass)
    {
        $this->daily_report = $instanceClass;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reportingTime = $request->input('reporting_time');

        $query = $this->daily_report->query();

        if (!empty($reportingTime)) {
            $query->where('reporting_time', 'LIKE', "{$reportingTime}%");
        }

        $daily_reports = $query->orderBy('reporting_time', 'desc')->paginate(DailyReport::List);

        return view('report.index', compact('daily_reports', 'reportingTime'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DailyReportRequest $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();

        $this->daily_report->fill($inputs)->save();

        return redirect()->route('report.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daily_report = $this->daily_report->find($id);
        return view('report.show', compact('daily_report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $daily_report = $this->daily_report->find($id);

        return view('report.edit', compact('daily_report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DailyReportRequest $request, $id)
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();

        $this->daily_report->find($id)->fill($inputs)->save();

        return redirect()->route('report.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->daily_report->find($id)->delete();

        return redirect()->route('report.index');
    }
}
