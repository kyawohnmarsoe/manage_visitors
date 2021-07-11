@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register New Visitors</div>
                @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                    </div>
                @endif
                @if (session('err'))
                    <div class="alert alert-danger" role="alert">
                    {{ session('err') }}
                    </div>
                @endif
               
                <div class="card-body">
                            <form method="POST" action="{{ route('visitors.store') }}" >
                                        @csrf

                                        <div class="form-group row">
                                            <label for="visitor_name" class="col-md-4 col-form-label text-md-right">Visitor Name</label>

                                            <div class="col-md-6">
                                                <input id="visitor_name" type="text" class="form-control @error('visitor_name') is-invalid @enderror" name="visitor_name" value="{{ old('visitor_name') }}"  required autocomplete="visitor_name" autofocus>

                                                @error('visitor_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="contact_no" class="col-md-4 col-form-label text-md-right">Contact No.</label>

                                            <div class="col-md-6">
                                                <input id="contact_no" type="number" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no') }}"  required autocomplete="contact_no">

                                                @error('contact_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="block_no" class="col-md-4 col-form-label text-md-right">Block No.</label>

                                            <div class="col-md-6">
                                                <input id="block_no" type="number" class="form-control @error('block_no') is-invalid @enderror" name="block_no" value="{{ old('block_no') }}"  required autocomplete="block_no">

                                                @error('block_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="unit_no" class="col-md-4 col-form-label text-md-right">Unit No.</label>

                                            <div class="col-md-6">
                                                <input id="unit_no" type="text" class="form-control @error('unit_no') is-invalid @enderror" name="unit_no" value="{{ old('unit_no') }}"  required autocomplete="unit_no">

                                                @error('unit_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nric_no" class="col-md-4 col-form-label text-md-right">Last 3 Digits of NRIC</label>

                                            <div class="col-md-6">
                                                <input id="nric_no" type="text" class="form-control @error('nric_no') is-invalid @enderror" name="nric_no" value="{{ old('nric_no') }}"  required autocomplete="nric_no">

                                                @error('nric_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                      
                                        
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Submit
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
