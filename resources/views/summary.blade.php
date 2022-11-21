@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Score Summary') }}</div>

                <div class="card-body">
                    <p><ol>
                        <li>Attribute Profiling: {{ $attribute_score }}/65</li>
                        <li>Education Level: {{ $education_score }}/10</li>
                        <li>Working Experience: {{ $experience_score }}/20</li>
                        <li>Professional Affiliation: {{ $affiliation_score }}/5</li>
                        <li>Total Score:{{ $total_score }}/100</li>
                    </ol></p>
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
