@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Job Role') }}</label>

                            <div class="col-md-6">
                                <input name="job" class="form-control" list="jobListOptions" id="jobList" required autocomplete="off" placeholder="Type to search or select dropdown">
                                <datalist id="jobListOptions">
                                    <option>Select a Job</option>
                                    @foreach($jobs as $job)
                                        <option data-value={{ $job->id }} value="{{ $job->name }}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Education Level') }}</label>

                            <div class="col-md-6">
                                <input name="education" class="form-control" list="educationListOptions" id="educationList" required  autocomplete="off" placeholder="Type to search or select dropdown">
                                <datalist id="educationListOptions">
                                    <option>Select an Education Level</option>
                                    @foreach($educations as $education)
                                        <option data-value={{ $education->id }} value="{{ $education->name }}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Working Experience') }}</label>

                            <div class="col-md-6">
                                <input name="experience" class="form-control" list="experienceListOptions" id="experienceList" required  autocomplete="off" placeholder="Type to search or select dropdown">
                                <datalist id="experienceListOptions">
                                    <option>Select a working experience</option>
                                    <option data-value=1 value="More than 1 year"></option>
                                    <option data-value=3 value="More than 3 years"></option>
                                    <option data-value=5 value="More than 5 years"></option>
                                    <option data-value=10 value="More than 10 years"></option>
                                    <option data-value=15 value="More than 15 years"></option>
                                </datalist>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Professional Affiliation') }}</label>

                            <div class="col-md-6">
                                <input name="affiliation" class="form-control" list="affiliationListOptions" id="affiliationList" required  autocomplete="off" placeholder="Type to search or select dropdown">
                                <datalist id="affiliationListOptions">
                                    <option>Select professional affiliation</option>
                                    <option data-value=1 value="Yes"></option>
                                    <option data-value=0 value="No"></option>
                                </datalist>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
        
        $(function() {
            var job, jobVal, education, educationVal, experience, experienceVal, affiliation, affiliationVal;
            $('#jobList').change(function() {
                var job = $(this).val();
                var jobVal = $('#jobListOptions [value="' + job + '"]').data('value');
                console.log(jobVal);
            });
            $('#educationList').change(function() {
                var education = $(this).val();
                var educationVal = $('#educationListOptions [value="' + education + '"]').data('value');
                console.log(educationVal);
            });
            $('#experienceList').change(function() {
                var experience = $(this).val();
                var experienceVal = $('#experienceListOptions [value="' + experience + '"]').data('value');
                console.log(experienceVal);
            });
            $('#affiliationList').change(function() {
                var affiliation = $(this).val();
                var affiliationVal = $('#affiliationListOptions [value="' + affiliation + '"]').data('value');
                console.log(affiliationVal);
            });
            
        });
    </script>
@endsection
