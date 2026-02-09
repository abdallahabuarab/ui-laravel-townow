@extends('layouts.roadside')

@section('content')
<div class="container mt-4">
    <p class="info-text">
        Please provide your information below so that we can contact you regarding your request.
        Our team is committed to offering you the best service possible.
    </p>
</div>

<div class="container">
    <div class="form-container">
        <h2>Customer Information</h2>

        <form>

            <div class="form-group mb-3">
                <label>
                    First Name <span class="required-star">*</span>
                </label>
                <input type="text" class="form-control" placeholder="Enter your first name" required>
            </div>

            <div class="form-group mb-3">
                <label>
                    Last Name <span class="required-star">*</span>
                </label>
                <input type="text" class="form-control" placeholder="Enter your last name" required>
            </div>

            <div class="form-group mb-3">
                <label>
                    Email <span class="required-star">*</span>
                </label>
                <input type="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="form-group mb-3">
                <label>
                    Phone Number <span class="required-star">*</span>
                </label>
                <input type="text" class="form-control" placeholder="Enter your phone number" required>
            </div>

            <div class="form-group mb-3">
                <label>
                    Other Phone Number
                </label>
                <input type="text" class="form-control" placeholder="Enter another phone number">
            </div>

            <div class="form-group mb-3">
                <label>
                    Preferred Method of Communication <span class="required-star">*</span>
                </label>
                <select class="form-control" multiple required>
                    <option>Text</option>
                    <option>Call</option>
                    <option>Email</option>
                    <option>App</option>
                </select>
            </div>

            <div class="p-4">
                <button type="button" class="btn btn-primary btn-lg">
                    Submit
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
