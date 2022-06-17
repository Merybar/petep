@extends('voyager::master')

@section('page_title', __('voyager::generic.view').' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }} {{ ucfirst($dataType->getTranslatedAttribute('display_name_singular')) }} &nbsp;

        @can('edit', $dataTypeContent)
            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
                <i class="glyphicon glyphicon-pencil"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.edit') }}</span>
            </a>
          
        @endcan
        @can('delete', $dataTypeContent)
            @if($isSoftDeleted)
                <a href="{{ route('voyager.'.$dataType->slug.'.restore', $dataTypeContent->getKey()) }}" title="{{ __('voyager::generic.restore') }}" class="btn btn-default restore" data-id="{{ $dataTypeContent->getKey() }}" id="restore-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.restore') }}</span>
                </a>
            @else
                <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger delete" data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
                </a>
            @endif
        @endcan
        @can('browse', $dataTypeContent)
        <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
            <i class="glyphicon glyphicon-list"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.return_to_list') }}</span>
        </a>
        @endcan

        @can('edit', $dataTypeContent)
            <a href="/Animalpdf/{{$dataTypeContent->getKey() }}" class="btn btn-info">
                <i class="glyphicon glyphicon-th-large"></i> <span class="hidden-xs hidden-sm">Pdf</span>
            </a>
          
        @endcan


    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
@php
    use App\Models\Log;
    $log = Log:: with('medication')->where('animal_id', '=', $dataTypeContent->id)->orderBy('id', 'DESC')->first(); 

@endphp
    <div class="page-content read container-fluid">
        <div class="row">
            
            <h1><img src="{{Storage::url($dataTypeContent->image)}}" alt="" style="width: 45px; margin:10px"> {{$dataTypeContent->name}}</h1>
            <div class="col-md-12">

               <div class="row align-self-start">

                    <div class="panel-body" style="padding-top:0;">
                            <div class="card " style="width: 25rem; margin:2px">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h3 class="card-title">Basic Info <a href="#collapseInfo" data-toggle="collapse" role="button"> ^</a></h3> 
                                        </div>
                                    </div>
                                    <div id="collapseInfo" class="collapse">
                                        <p class="card-text">
                                            <b>Birthday:</b> {{$dataTypeContent->age}} <br>
                                            <b>Breed:</b> {{$dataTypeContent->breed->name}} <br>
                                            <b>Size:</b> {{$log->size}} cm <br>
                                            <b>Weight:</b> {{$log->weight}} g <br>
                                            <b>Insurance number:</b> {{$dataTypeContent->insuranceNumber}} <br>
                                            <b>Chipnumber:</b> {{$dataTypeContent->chipnumber}}  <br>
                                            <b>Remarks:</b> {{$dataTypeContent->remarks}} 
                                        </p>
                                        <a href="/admin/animals/{{$dataTypeContent->id}}/edit"  class="btn btn-primary">Edit</a> 
                                        <a href="/update/pet/{{$dataTypeContent->id}}" class="btn btn-primary">Update</a> 
                                        <a href="#" class="btn btn-primary">Delete</a>
                                    </div>
                                </div>
                            </div>

                            <br>
                        
                            <div class="card " style="width: 25rem; margin:2px">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h3 class="card-title">Medication <a href="#collapseMeds" data-toggle="collapse" role="button"> ^</a> </h3>  
                                        </div>
                                    </div>
                                    <div id="collapseMeds" class="collapse">
                                        @foreach ($log->medication as $row)
                                            <p class="card-text">{{$row->name}} : {{$row->price}} euro</p>
                                        @endforeach
                                        <a href="/admin/medications/{{$dataTypeContent->id}}/edit"  class="btn btn-primary">Edit</a>
                                    </div>
                                </div>
                            </div>

                            <br>
                        
                            <div class="card" style="width: 25rem; margin:2px">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h3 class="card-title">Graphs <a href="#collapseGraph" data-toggle="collapse" role="button"> ^</a></h3> 
                                        </div>
                                    </div>
                                    <div id="collapseGraph" class="collapse">
                                        <div>
                                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                            <canvas id="myChart" width="400" height="400"></canvas>
                                            <script>
                                                const ctx = document.getElementById('myChart').getContext('2d');
                                                const myChart = new Chart(ctx, {
                                                    type: 'line',
                                                    data: {
                                                        labels: ['12Nov', '15Nov', '23Nov', '4Dec', '16Dec', '20Dec'],
                                                        datasets: [{
                                                            label: 'Weight',
                                                            data: [12, 19, 3, 5, 2, 3],
                                                            backgroundColor: [
                                                                'rgba(255, 99, 132, 0.2)',
                                                                'rgba(54, 162, 235, 0.2)',
                                                                'rgba(255, 206, 86, 0.2)',
                                                                'rgba(75, 192, 192, 0.2)',
                                                                'rgba(153, 102, 255, 0.2)',
                                                                'rgba(255, 159, 64, 0.2)'
                                                            ],
                                                            borderColor: [
                                                                'rgba(255, 99, 132, 1)',
                                                                'rgba(54, 162, 235, 1)',
                                                                'rgba(255, 206, 86, 1)',
                                                                'rgba(75, 192, 192, 1)',
                                                                'rgba(153, 102, 255, 1)',
                                                                'rgba(255, 159, 64, 1)'
                                                            ],
                                                            borderWidth: 1
                                                        },
                                                        {
                                                            label: 'Size',
                                                            data: [13, 18, 14, 20, 21, 20],
                                                            backgroundColor: [
                                                                'rgba(255, 99, 132, 0.2)',
                                                                'rgba(54, 162, 235, 0.2)',
                                                                'rgba(255, 206, 86, 0.2)',
                                                                'rgba(75, 192, 192, 0.2)',
                                                                'rgba(153, 102, 255, 0.2)',
                                                                'rgba(255, 159, 64, 0.2)'
                                                            ],
                                                            borderColor: [
                                                                'rgba(255, 99, 132, 1)',
                                                                'rgba(54, 162, 235, 1)',
                                                                'rgba(255, 206, 86, 1)',
                                                                'rgba(75, 192, 192, 1)',
                                                                'rgba(153, 102, 255, 1)',
                                                                'rgba(255, 159, 64, 1)'
                                                            ],
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
                                            </script>

                                        </div>
                                        <a href="#" class="btn btn-primary">Weight</a>
                                        <a href="#" class="btn btn-primary">Size</a> <br> <br>
                                    </div>
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
