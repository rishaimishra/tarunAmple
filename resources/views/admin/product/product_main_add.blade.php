@extends('admin.admin_includes.layout')
{{-- head section --}}
@section('head')
@include('admin.admin_includes.admin_head')
{{-- Include additional CSS or scripts if needed --}}
@endsection
{{-- title section --}}
@section('title')
<title>Amplepoint | Product Add</title>
@endsection
{{-- sidebar section --}}
@section('sideber')
@include('admin.admin_includes.admin_sideber')
@endsection

@section('content')
@include('includes.message')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">Product Add</h4>
                </div>
            </div>

            <div class="card-body">
                <form method="post" action="{{-- {{ route('admin.category.store') }} --}}" enctype="multipart/form-data" class="form-horizontal" id="categoryForm">
                    @csrf

                    <!-- Step 1 -->
                    <div id="step1" class="tab-pane fade show active">
                        @include('admin.product.basic_details') {{-- Step 1 --}}
                    </div>

                    <!-- Step 2 -->
                    <div id="step2" class="tab-pane fade">
                        @include('admin.product.chose_category') {{-- Step 2 --}}
                    </div>

                     {{-- Step 3 --}}
                    <div class="tab-pane fade" id="step3">
                        @include('admin.product.pricing_details') {{-- Step 3 --}}
                    </div>

                    {{-- Step 4 --}}
                    <div class="tab-pane fade" id="step4">
                        @include('admin.product.chose_product_slider') {{-- Step 4 --}}
                    </div>

                    {{-- Step 5 --}}
                    <div class="tab-pane fade" id="step5">
                        @include('admin.product.chose_product_images') {{-- Step 5 --}}
                    </div>

                   

                    <!-- Submit button for the entire form -->
                    <button type="submit" class="btn btn-primary">Submit All Steps</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.admin_includes.admin_script')

    <script>
        $(document).ready(function () {
            $("#categoryForm").validate({
                // Add validation rules for all steps
                rules: {
                    // Rules for step 1 fields
                    'step1_field': 'required',
                    // ... other step 1 fields ...

                    // Rules for step 2 fields
                    'step2_field': 'required',
                    // ... other step 2 fields ...

                    // Repeat for other steps
                },
                // Add messages for all steps
                messages: {
                    // Messages for step 1 fields
                    'step1_field': {
                        required: 'Step 1 field is required',
                    },
                    // ... other step 1 fields ...

                    // Messages for step 2 fields
                    'step2_field': {
                        required: 'Step 2 field is required',
                    },
                    // ... other step 2 fields ...

                    // Repeat for other steps
                }
            });

            // Additional custom validation if needed
        });
    </script>
@endsection
