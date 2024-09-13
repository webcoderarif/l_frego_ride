@extends('layout.front')

@section('title', 'Return Policy')

@section('style')
<style>
    ul {
    	margin-left: 50px;
    }
    h3	{
    	padding-top: 16px;
    	padding-bottom: 16px;
    }
</style>
@endsection

@section('content')
<div class="container my-5 text-justify">
    <h2 class="text-center">Return and Refund Policy</h2>
    <h3>Introduction</h3>
    <p>
        At [Your Website Name], we aim to provide the best food delivery service possible. However, if there is an issue with your order, we are here to help. This Return and Refund Policy outlines the conditions under which returns,
        refunds, or replacements may be applicable.
    </p>
    <h3>1. Eligibility for Returns or Refunds</h3>
    <p>Due to the perishable nature of food, we cannot accept returns in the traditional sense. However, we offer refunds or replacements in the following situations:</p>
    <ul>
        <li><strong>Incorrect Order</strong>: If you receive the wrong items in your order (e.g., wrong food, incorrect quantity).</li>
        <li><strong>Damaged or Defective Items</strong>: If your order arrives with damaged packaging or the food is spoiled, cold (if hot food), or otherwise not in a consumable state.</li>
        <li><strong>Missing Items</strong>: If an item is missing from your order.</li>
    </ul>
    <h3>2. Reporting an Issue</h3>
    <p>If you experience any of the issues listed above, please contact us immediately. You must report the issue within <strong>24 hours</strong> of receiving your order to be eligible for a refund or replacement.</p>
    <p>To report an issue, please provide:</p>
    <ul>
        <li>Your <strong>order number</strong></li>
        <li>A <strong>description</strong> of the issue</li>
        <li><strong>Photos</strong> of the damaged or incorrect items (if applicable)</li>
    </ul>
    <p>You can contact us at [<a rel="noopener">support@yourwebsite.com</a>] or call our customer service line at [+Your Contact Number].</p>
    <h3>3. Refund or Replacement Process</h3>
    <p>Once we receive your complaint, we will investigate the issue and offer one of the following resolutions:</p>
    <ul>
        <li>
            <strong>Refund</strong>: In cases of incorrect, damaged, or missing items, we will process a refund to your original payment method. The refund may take <strong>5-7 business days</strong> to appear in your account, depending on
            your bank or payment provider.
        </li>
        <li><strong>Replacement</strong>: If you prefer, we can arrange for a replacement of the incorrect or damaged items to be delivered as soon as possible, based on availability.</li>
    </ul>
    <h3>4. Non-Refundable Situations</h3>
    <p>We cannot offer refunds or replacements in the following situations:</p>
    <ul>
        <li><strong>Change of Mind</strong>: We do not offer refunds if you simply change your mind after placing the order.</li>
        <li><strong>Delivery Delays</strong>: While we strive to deliver orders within the estimated time, delays caused by factors outside our control (e.g., traffic, weather) are not eligible for refunds.</li>
        <li>
            <strong>Incorrect Address or Unavailability</strong>: If delivery is unsuccessful due to an incorrect address or if you are unavailable to receive the order, no refund will be issued. Please ensure all delivery information is
            accurate and up-to-date.
        </li>
    </ul>
    <h3>5. Cancellations</h3>
    <ul>
        <li><strong>Before Order Confirmation</strong>: If you need to cancel an order, you can do so before it is confirmed. Once an order is confirmed and being prepared, cancellation may no longer be possible.</li>
        <li><strong>Refund for Cancelled Orders</strong>: If you successfully cancel an order before confirmation, you may be eligible for a full refund. Contact customer support for assistance.</li>
    </ul>
    <h3>6. Contact Information</h3>
    <p>For any questions regarding our Return and Refund Policy, or to report an issue, you can reach us at:</p>
    <p>
        <strong>Email</strong>: support@[yourwebsite.com]<br />
        <strong>Phone</strong>: [+Your Contact Number]<br />
        <strong>Address</strong>: [Your Business Address]
    </p>
</div>
@endsection

@section('script')
<script>
    
</script>
@endsection