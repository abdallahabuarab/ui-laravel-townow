@extends('layouts.roadside')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
<div class="container my-4">
    
    <div class="card request-details-card p-4 p-md-5">
       <div class="mb-4">
            <h3 class="customer-info-title">Customer Information</h3>
            <h5 class="text-secondary">
                Please provide your information below so that we can contact you regarding your request.
                Our team is committed to offering you the best service possible.
            </h5>
       </div>
        <div class="form-container">
            <form>
    
                <div class="form-group mb-3">
                    <label class="fw-bold mb-2">
                        First Name <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" placeholder="Enter your first name" required>
                </div>
    
                <div class="form-group mb-3">
                    <label class="fw-bold mb-2">
                        Last Name <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" placeholder="Enter your last name" required>
                </div>
    
                <div class="form-group mb-3">
                    <label class="fw-bold mb-2">
                        Email <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" placeholder="Enter your email" required>
                </div>
    
                <div class="form-group mb-3">
                    <label class="fw-bold mb-2">
                        Phone Number <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" placeholder="Enter your phone number" required>
                </div>
    
                <div class="form-group mb-3">
                    <label class="fw-bold mb-2">
                        Other Phone Number
                    </label>
                    <input type="text" class="form-control" placeholder="Enter another phone number">
                </div>
    
                <div class="form-group mb-3">
                    <label class="fw-bold mb-2">
                        Preferred Method of Communication <span class="text-danger">*</span>
                    </label>
                    <select class="form-control communication-select" id="communication" name="communication" multiple="multiple" required>
                        <option value="Text">Text</option>
                        <option value="Call">Call</option>
                        <option value="Email">Email</option>
                        <option value="App">App</option>
                    </select>
                </div>
    
                <div class="pt-2 pt-md-4">
                    <button type="button" class="btn btn-blue btn-pill w-100 mt-0 mt-md-2">
                        Submit
                    </button>
                </div>
    
            </form>
        </div>

    </div>

</div>
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.communication-select').select2({
                theme: 'bootstrap-5',
                placeholder: 'Select communication methods',
                allowClear: true,
                closeOnSelect: false
            });
        });
    </script>
@endpush
@endsection
