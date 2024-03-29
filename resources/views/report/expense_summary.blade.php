@extends('layouts.admin')
@section('page-title')
    {{__('Expense Summary')}}
@endsection

@push('theme-script')
    <script src="{{ asset('url/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
@endpush
@push('script-page')
    <script>
        var e = $("#chart-sales");
        !function (e) {
            var t = {
                chart: {width: "100%", zoom: {enabled: !1}, toolbar: {show: !1}, shadow: {enabled: !1}},
                stroke: {width: 6, curve: "smooth"},
                series: [{name: "{{__('Expense')}}", data: {!! json_encode($chartExpenseArr) !!}}],
                xaxis: {labels: {format: "MMM", style: {colors: PurposeStyle.colors.gray[600], fontSize: "14px", fontFamily: PurposeStyle.fonts.base, cssClass: "apexcharts-xaxis-label"}}, axisBorder: {show: !1}, axisTicks: {show: !0, borderType: "solid", color: PurposeStyle.colors.gray[300], height: 6, offsetX: 0, offsetY: 0}, type: "text", categories: {!! json_encode($monthList) !!}},
                yaxis: {labels: {style: {color: PurposeStyle.colors.gray[600], fontSize: "12px", fontFamily: PurposeStyle.fonts.base}}, axisBorder: {show: !1}, axisTicks: {show: !0, borderType: "solid", color: PurposeStyle.colors.gray[300], height: 6, offsetX: 0, offsetY: 0}},
                fill: {type: "solid"},
                markers: {size: 4, opacity: .7, strokeColor: "#fff", strokeWidth: 3, hover: {size: 7}},
                grid: {borderColor: PurposeStyle.colors.gray[300], strokeDashArray: 5},
                dataLabels: {enabled: !1}
            }, a = (e.data().dataset, e.data().labels, e.data().color), n = e.data().height, o = e.data().type;
            t.colors = [PurposeStyle.colors.theme[a]], t.markers.colors = [PurposeStyle.colors.theme[a]], t.chart.height = n || 350, t.chart.type = o || "line";
            var i = new ApexCharts(e[0], t);
            setTimeout(function () {
                i.render()
            }, 400)
        }($("#chart-sales"));
    </script>
    <script type="text/javascript" src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>
    <script>
        var year = '{{$currentYear}}';
        var filename = $('#filename').val();

        function saveAsPDF() {
            var element = document.getElementById('printableArea');
            var opt = {
                margin: 0.3,
                filename: filename,
                image: {type: 'jpeg', quality: 1},
                html2canvas: {scale: 4, dpi: 72, letterRendering: true},
                jsPDF: {unit: 'in', format: 'A2'}
            };
            html2pdf().set(opt).from(element).save();

        }
    </script>
@endpush

@section('action-button')
    <div class="row d-flex justify-content-end">
        <div class="col">
            {{ Form::open(array('route' => array('report.expense.summary'),'method' => 'GET','id'=>'report_expense_summary')) }}
            <div class="all-select-box">
                <div class="btn-box">
                    {{ Form::label('year', __('Year'),['class'=>'text-type']) }}
                    {{ Form::select('year',$yearList,isset($_GET['year'])?$_GET['year']:'', array('class' => 'form-control select2')) }}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="all-select-box">
                <div class="btn-box">
                    {{ Form::label('category', __('Category'),['class'=>'text-type']) }}
                    {{ Form::select('category',$category,isset($_GET['category'])?$_GET['category']:'', array('class' => 'form-control select2')) }}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="all-select-box">
                <div class="btn-box">
                    {{ Form::label('vender', __('Vendor'),['class'=>'text-type']) }}
                    {{ Form::select('vender',$vender,isset($_GET['vender'])?$_GET['vender']:'', array('class' => 'form-control select2')) }}
                </div>
            </div>
        </div>
        <div class="col-auto my-auto">
            <a href="#" class="apply-btn" onclick="document.getElementById('report_expense_summary').submit(); return false;" data-toggle="tooltip" data-original-title="{{__('apply')}}">
                <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
            </a>
            <a href="{{route('report.expense.summary')}}" class="reset-btn" data-toggle="tooltip" data-original-title="{{__('Reset')}}">
                <span class="btn-inner--icon"><i class="fas fa-trash-restore-alt"></i></span>
            </a>
            <a href="#" class="action-btn" onclick="saveAsPDF()" data-toggle="tooltip" data-original-title="{{__('Download')}}">
                <span class="btn-inner--icon"><i class="fas fa-download"></i></span>
            </a>
        </div>
    </div>
    {{ Form::close() }}
@endsection

@section('content')
    <div id="printableArea">
        <div class="row mt-3">
            <div class="col">
                <input type="hidden" value="{{$filter['category'].' '.__('Expense Summary').' '.'Report of'.' '.$filter['startDateRange'].' to '.$filter['endDateRange']}}" id="filename">
                <div class="card p-4 mb-4">
                    <h5 class="report-text gray-text mb-0">{{__('Report')}} :</h5>
                    <h5 class="report-text mb-0">{{__('Expense Summary')}}</h5>
                </div>
            </div>
            @if($filter['category']!= __('All'))
                <div class="col">
                    <div class="card p-4 mb-4">
                        <h5 class="report-text gray-text mb-0">{{__('Category')}} :</h5>
                        <h5 class="report-text mb-0">{{$filter['category'] }}</h5>
                    </div>
                </div>
            @endif
            @if($filter['vender']!= __('All'))
                <div class="col">
                    <div class="card p-4 mb-4">
                        <h5 class="report-text gray-text mb-0">{{__('Vendor')}} :</h5>
                        <h5 class="report-text mb-0">{{$filter['vender'] }}</h5>
                    </div>
                </div>
            @endif
            <div class="col">
                <div class="card p-4 mb-4">
                    <h5 class="report-text gray-text mb-0">{{__('Duration')}} :</h5>
                    <h5 class="report-text mb-0">{{$filter['startDateRange'].' to '.$filter['endDateRange']}}</h5>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12" id="chart-container">
                <div class="card">
                    <div class="scrollbar-inner">
                        <div id="chart-sales" data-color="primary" data-height="300"></div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0" id="dataTable-manual">
                                    <thead>
                                    <tr>
                                        <th>{{__('Category')}}</th>
                                        @foreach($monthList as $month)
                                            <th>{{$month}}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="13" class="text-dark"><span>{{__('Payment :')}}</span></td>
                                    </tr>
                                    @foreach($expenseArr as $i=>$expense)
                                        <tr>
                                            <td>{{$expense['category']}}</td>
                                            @foreach($expense['data'] as $j=>$data)
                                                <td>{{\Auth::user()->priceFormat($data)}}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="13" class="text-dark"><span>{{__('Bill :')}}</span></td>
                                    </tr>
                                    @foreach($billArray as $i=>$bill)
                                        <tr>
                                            <td>{{$bill['category']}}</td>
                                            @foreach($bill['data'] as $j=>$data)
                                                <td>{{\Auth::user()->priceFormat($data)}}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="13" class="text-dark"><span>{{__('Expense = Payment + Bill :')}}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">{{__('Total')}}</td>
                                        @foreach($chartExpenseArr as $i=>$expense)
                                            <td>{{\Auth::user()->priceFormat($expense)}}</td>
                                        @endforeach
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


