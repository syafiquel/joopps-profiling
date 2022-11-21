@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="col">
                        <div class="row">
                            <div class="box box-example-square">
                            <div class="box-body">
                                    <select id="example-square" name="rating" autocomplete="off" style="display: none;">
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <div class="br-widget">
                                        <a href="#" data-rating-value="1" data-rating-text="1" class=""></a>
                                        <a href="#" data-rating-value="2" data-rating-text="2" class=""></a>
                                        <a href="#" data-rating-value="3" data-rating-text="3" class=""></a>
                                        <a href="#" data-rating-value="4" data-rating-text="4" class=""></a>
                                        <a href="#" data-rating-value="5" data-rating-text="5" class=""></a>
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
        
        $(function() {
            $('#example-square').barrating({
                theme: 'bars-square',
                showValues: true,
                showSelectedRating: false,
                onSelect: function(value, text, event) {
                    
                }
            });
            
        });
    </script>
@endsection
