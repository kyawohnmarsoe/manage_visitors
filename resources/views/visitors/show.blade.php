@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Visitor's Information</div>
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
                <form method="post" action="{{url('/visitors/'.$visitor->id)}}">
                            @csrf 
                            @method('PUT')

                                        <div class="form-group row">
                                            <label for="visitor_name" class="col-md-4 col-form-label text-md-right">Visitor Name</label>

                                            <div class="col-md-6">
                                                <input id="visitor_name" type="text" class="form-control @error('visitor_name') is-invalid @enderror" name="visitor_name" value="{{ $visitor->visitor_name }}"  required autocomplete="visitor_name" autofocus>

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
                                                <input id="contact_no" type="number" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ $visitor->contact_no }}"  required autocomplete="contact_no">

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
                                                <input id="block_no" type="number" class="form-control @error('block_no') is-invalid @enderror" name="block_no" value="{{ $visitor->block_no }}"  required autocomplete="block_no">

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
                                                <input id="unit_no" type="text" class="form-control @error('unit_no') is-invalid @enderror" name="unit_no" value="{{ $visitor->unit_no }}"  required autocomplete="unit_no">

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
                                                <input id="nric_no" type="text" class="form-control @error('nric_no') is-invalid @enderror" name="nric_no" value="{{ $visitor->nric_no }}"  required autocomplete="nric_no">

                                                @error('nric_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="entry_at" class="col-md-4 col-form-label text-md-right">Entry At</label>

                                            <div class="col-md-6">
                                                <input id="entry_at" type="text" class="form-control @error('entry_at') is-invalid @enderror" name="entry_at" value="{{ $visitor->entry_at }}"  required autocomplete="entry_at">

                                                @error('entry_at')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="exit_at" class="col-md-4 col-form-label text-md-right">Exit At</label>

                                            <div class="col-md-6">
                                                <input id="exit_at" type="text" class="form-control @error('exit_at') is-invalid @enderror" name="exit_at" value="{{ $visitor->exit_at }}"   autocomplete="exit_at">

                                                @error('exit_at')
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
