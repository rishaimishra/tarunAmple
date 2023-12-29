<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Custom Modal</title>
    <style>
        /* Overlay style */
        .overlay {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
        }

        /* Modal-like container style */
        .modal-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Modal-like container (visible by default) -->
<div class="overlay" id="customModal">
    <div class="modal-container">
        <h2>Custom Modal</h2>
        <!-- Your content goes here -->
        @foreach($data as $row)
            @php
                $img = DB::table('product_images')->where('product_id', @$row->product_id)->first();
            @endphp
            <div class="sidebar-cart-item">
                <a href="{{ url('/productdetail/' . $row->product_id) }}" target="_blank" class="product-image">
                    <img src="{{ 'https://amplepoints.com/product_images/' . $row->product_id . '/' . $img->image_name }}" alt="Product Image">
                </a>
                <div class="product-info">
                    <a href="{{ url('/productdetail/' . $row->product_id) }}" title="{{ $row->item_added }}" class="product-name">
                        {{ $row->item_added }}
                    </a>
                    <div class="product-price">
                        <span>Price: {{ $currencySymbol . $row->amount }}</span>
                    </div>
                    <div class="product-quantity">
                        <span>Qty: {{ $row->quantity }}</span>
                    </div>
                </div>
                <div class="remove-cart-item">
                    <button class="btn-remove" onclick="remove_this_item('{{ $row->id }}', '{{ $usrmakey }}')">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
            </div>
        @endforeach
        <!-- End of your content -->

        <div >
    <h5 >
        Total
        <span class="totalitemamount">{{ $currencySymbol .$itemsTotal }}</span>
    </h5>
    @if (!empty($usrmakey))
        <div >
            <a href="javascript:void(0);" onclick="processCheckout('{{ $usrmakey }}');"
               class="btn btn-primary btn-checkout">
                CHECKOUT
            </a>
        </div>
    @else
        <div >
            <a href="{{ url('/checkout') }}" class="btn btn-primary btn-checkout">
                CHECKOUT
            </a>
        </div>
    @endif
</div>


        <!-- Close button -->
        <button onclick="closeCustomModal()">Close</button>
    </div>
</div>

<script>
    // Function to close the custom modal
    function closeCustomModal() {
        document.getElementById('customModal').style.display = 'none';
    }
</script>

</body>
</html>
