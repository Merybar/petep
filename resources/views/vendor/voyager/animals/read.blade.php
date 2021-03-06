@extends('voyager::master')

@section('page_title', __('voyager::generic.view').' '.$dataType->getTranslatedAttribute('display_name_singular'))

    @section('page_header')
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }} {{ ucfirst($dataType->getTranslatedAttribute('display_name_singular')) }} &nbsp;

            
            


        </h1>
        @include('voyager::multilingual.language-selector')
    @stop

   {{--create necessary parameters for this view --}}
    @section('content')
        @php
            use Carbon\Carbon;
            use App\Models\Log;
            $log = Log::with('medication')->where('animal_id', '=', $dataTypeContent->id)->orderBy('id', 'DESC')->first(); 
            $logs = Log::with('medication')->where('animal_id','=', $dataTypeContent->id)->orderBy('created_at')->get();
            $birthday = Carbon::create($dataTypeContent->birthday) -> format('d F Y');
            $now = Carbon::now();
            $age = $now -> diffInMonths($birthday);

            if($age>11){
                $age = $now -> diffInYears($birthday);
                $age = ("{$age} years");
            }else if($age==0){
                $age = $now -> diffInDays($birthday);
                $age = ("{$age} days");
            }else{
                $age = ("{$age} months");
            };
            $graphData=[];
            $graphWeight=[];
            $graphSize=[];
        @endphp
        
        
        {{-- prepare dataa for the graph in the third card --}}
        @foreach ($logs as $data)
            @php
                $time = Carbon::create($data->created_at)->format('d M Y');
                array_push($graphData, $time) ;
                array_push($graphWeight, $data->weight);
                array_push($graphSize, $data->size);
            @endphp
        @endforeach
        @php
            $graphData = json_encode($graphData);
            $graphWeight = json_encode($graphWeight);
            $graphSize = json_encode($graphSize);
        @endphp

        {{-- start content container --}}
        <div class="page-content read container-fluid">
            <div class="row">
                
                {{--first card: Basic info --}}
                <h1><img src="{{Storage::url($dataTypeContent->image)}}" alt="" class="animalImage"> {{$dataTypeContent->name}}</h1>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                        <h3 class="card-title col-sm-9">Basic Info</h3>
                                        <h3 class="col-sm-3"><a href="#collapseInfo" data-toggle="collapse" role="button"> <i class="voyager-angle-down"></i></a></h3>
                                </div>
                                <div id="collapseInfo" class="collapse">
                                    <p class="card-text">
                                        <b>Name:</b> {{$dataTypeContent->name}} <br>
                                        <b>Birthday:</b> {{$birthday}} <br>
                                        <b>Age:</b> {{$age}} old<br>
                                        <b>Breed:</b> {{$dataTypeContent->breed->name}} <br>
                                        <b>Insurance number:</b> {{$dataTypeContent->insuranceNumber}} <br>
                                        <b>Chipnumber:</b> {{$dataTypeContent->chipnumber}}  <br>

                                        {{-- message if there has not yet been a log--}}
                                        @if (is_null($log))
                                            You have not added any logs yet for {{$dataTypeContent->name}}. <br> 
                                        @else                                    
                                            <b>Size:</b> {{$log->size}} cm <br>       
                                        @endif

                                        @if (is_null($log))

                                        @else
                                            <b>Weight:</b> {{$log->weight}} kg <br>
                                        @endif
                                    
                                        @if (is_null($log))   
                                            There are currently no remarks for {{$dataTypeContent->name}}.                                           
                                        @else
                                            <b>Remarks:</b> {{$log->remarks}}                                 
                                        @endif
                                    </p>

                                    {{--card footer with buttons --}}
                                    <div class=" card-footer">
                                        @can('edit', $dataTypeContent)
                                            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-primary">
                                                <i class="glyphicon glyphicon-pencil"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.edit') }}</span>
                                            </a>
                                        
                                        @endcan
                                        <a href="/admin/logs/create" class="btn btn-primary">
                                            <i class="voyager-plus"></i> <span class="hidden-xs hidden-sm">Update</span>
                                        </a>
                                    
                                        @can('delete', $dataTypeContent)
                                            @if($isSoftDeleted)
                                                <a href="{{ route('voyager.'.$dataType->slug.'.restore', $dataTypeContent->getKey()) }}" title="{{ __('voyager::generic.restore') }}" class="btn btn-default restore" data-id="{{ $dataTypeContent->getKey() }}" id="restore-{{ $dataTypeContent->getKey() }}">
                                                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.restore') }}</span>
                                                </a>
                                            @else
                                                <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-primary delete" data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                                                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
                                                </a>
                                            @endif
                                        @endcan
        
                                        @can('edit', $dataTypeContent)
                                            <a href="/Animalpdf/{{$dataTypeContent->getKey() }}" class="btn btn-primary">
                                                <i class="glyphicon glyphicon-th-large"></i> <span class="hidden-xs hidden-sm">Pdf</span>
                                            </a>
                                        
                                        @endcan
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    {{--second card: medication --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h3 class="card-title col-sm-9">Medication</h3>
                                    <h3 class="col-sm-3"><a href="#collapseMeds" data-toggle="collapse" role="button"> <i class="voyager-angle-down"></i></a></h3>
                                </div>
                                <div id="collapseMeds" class="collapse">
                                    {{-- message if there is no medication in the most recent log (2) or if there has not been any logs (1)--}}
                                    @if (is_null($log)) {{--1 --}}
                                        <p>You have not yet filled any logs for {{$dataTypeContent->name}}.</p> 
                                    @elseif(!$log->medication->isEmpty())
                                        <ul>
                                            @foreach ($log->medication as $row)
                                                <li class="card-text" style="font-size:18px">{{$row->name}} : {{$row->price}} euro</li>
                                            @endforeach
                                        </ul>
                                    @else   {{-- 2--}}                               
                                        <p>{{$dataTypeContent->name}} is currently not taking any medication.</p>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                

                    {{--third card: graph --}}
                    <div  class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h3 class="card-title col-sm-9">Graphs</h3>
                                    <h3 class="col-sm-3"><a href="#collapseGraph" data-toggle="collapse" role="button"> <i class="voyager-angle-down"></i></a></h3>
                                </div>
                                <div id="collapseGraph" class="collapse">
                                    <div>
                                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                        <canvas id="myChart" width="400" height="400"></canvas>
                                    </div>

                                    {{-- message if there have not yet been any logs --}}
                                    @if (is_null($log))
                                        <p>Add a log to use this graph.</p> 
                                    @else
                                        <div class="buttonBox">
                                            <a class="btn btn-info" onclick="toggleChart(0)">Weight</a>
                                            <a class="btn btn-info" onclick="toggleChart(1)">Size</a>
                                        </div>
                                    @endif

                                    {{--necessary script for the graph --}}
                                    <script>
                                        const ctx = document.getElementById('myChart').getContext('2d');
                                        const myChart = new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                                labels: {!!$graphData!!},
                                                datasets: [{
                                                    label: 'Weight',
                                                    data: {!!$graphWeight!!},
                                                    hidden:false,
                                                    backgroundColor: '#6f5b8a',
                                                    borderColor: '#6f5b8a',
                                                    borderWidth: 1
                                                },
                                                {
                                                    label: 'Size',
                                                    data: {!!$graphSize!!},
                                                    hidden:false,
                                                    backgroundColor: '#5b678a',
                                                    borderColor: '#5b678a',
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });

                                        //function to toggle the different datasets
                                        function toggleChart(value){
                                            const visible = myChart.getDataVisibility(value);
                                            myChart.toggleDataVisibility(value)
                                            if(visible === true){
                                                myChart.setDatasetVisibility(value, false)
                                            }
                                            if(visible === false){
                                                myChart.setDatasetVisibility(value, true)
                                            }
                                            myChart.update();
                                        }                                            
                                    </script>
                                </div>
                            </div>
                        </div>  
                    </div>
                    
                </div>
            </div>
        </div>

        {{-- Single delete modal --}}
        <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-danger pull-right delete-confirm"
                                value="{{ __('voyager::generic.delete_confirm') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}">
                        </form>
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @stop

    @section('javascript')
        @if ($isModelTranslatable)
            <script>
                $(document).ready(function () {
                    $('.side-body').multilingual();
                });
            </script>
        @endif
        <script>
            var deleteFormAction;
            $('.delete').on('click', function (e) {
                var form = $('#delete_form')[0];

                if (!deleteFormAction) {
                    // Save form action initial value
                    deleteFormAction = form.action;
                }

                form.action = deleteFormAction.match(/\/[0-9]+$/)
                    ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                    : deleteFormAction + '/' + $(this).data('id');

                $('#delete_modal').modal('show');
            });

        </script>
    @stop
