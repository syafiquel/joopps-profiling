@extends('layouts.app')

@section('content')
<div id="result" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-info mb-6">
                <div class="d-flex card-header bg-info text-white">{{ __('Result') }}</div>

                <div class="card-body">
                <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div> <canvas id="chart-line" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        var names = @json($attribute_names, JSON_PRETTY_PRINT);
        var scores = {!! json_encode($attribute_scores) !!};
	 var expected_scores = {!! json_encode($expected_scores) !!};
        var userName = "{{ $user_name }}";
        var userJob = "{{ $user_job }}";
        var ctx = $("#chart-line");
        const radarData = {
            labels: names,
            datasets: [{
                    data: scores,
                    label: "Actual Score",
                    borderColor: "#458af7",
                    backgroundColor: '#458af7',
                    fill: false
                }, {
                    data: expected_scores,
                    label: "Expected Score",
                    borderColor: "#3cba9f",
                    fill: false,
                    backgroundColor: '#3cba9f'
                }],
        };
        const options = {
            plugins: {
                title: {
                    display: true,
                    text: 'Attribute Test Score Details of ' + userJob + ' job position'
                },
                subtitle: {
                    display: true,
                    text: 'Candidate: ' + userName
                },
                elements: {
                    line: {
                        borderWidth: 3
                    },
                    point: {
                        pointRadius: 5
                    }
                },
                scales: {

                    r: {
                        angleLines: {
                            lineWidth: 2
                        },
                        grid: {
                            circular: true,
                            lineWidth: 2
                        }
                    }
                }
            }
        };
        const config = {
            type: 'radar',
            data: radarData,
            options: options
        };
        let resultChart = new Chart(ctx, config);
        
    });
</script>
@endsection
