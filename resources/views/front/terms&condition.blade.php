@extends('layout.front')

@section('title', 'Terms and condition')

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
    <h2 class="text-center">Terms and Conditions</h2>
    <h3>Introduction</h3>
    <p>
        Welcome to [Your Website Name], a food delivery service designed to bring your favorite meals straight to your door. By accessing and using our website, you agree to comply with and be bound by the following terms and conditions. If
        you do not agree to these terms, please refrain from using our services.
    </p>
    <h3>1. Use of the Website</h3>
    <ul>
        <li>By accessing this website, you agree that you are at least 18 years old or using it under the supervision of a parent or legal guardian.</li>
        <li>You are granted limited access for the purpose of ordering food and interacting with our services. Any unauthorized use, including modifying, copying, distributing, or reverse-engineering the content, is prohibited.</li>
    </ul>
    <h3>2. Account Registration</h3>
    <ul>
        <li>To place an order, you may be required to create an account. You are responsible for maintaining the confidentiality of your login details and ensuring that all information provided is accurate and up-to-date.</li>
        <li>You must notify us immediately of any unauthorized use of your account or any other breach of security.</li>
    </ul>
    <h3>3. Orders and Payment</h3>
    <ul>
        <li>When placing an order through our platform, you agree to provide accurate and complete information. Any error in the order details may result in the order being delayed or canceled.</li>
        <li>We accept a variety of payment methods, including credit/debit cards, online banking, and other available options. Payment must be made in full before the order is processed.</li>
        <li>Prices and availability of items are subject to change without notice. We reserve the right to cancel any orders in cases of pricing errors or out-of-stock items.</li>
    </ul>
    <h3>4. Delivery</h3>
    <ul>
        <li>Delivery times are estimates and may vary due to factors beyond our control. We strive to deliver orders within the specified time frame but do not guarantee exact delivery times.</li>
        <li>You are responsible for providing a correct delivery address and being available to receive the order. If delivery is unsuccessful due to an incorrect address or unavailability, additional charges may apply for redelivery.</li>
    </ul>
    <h3>5. Cancellations and Refunds</h3>
    <ul>
        <li>Once an order has been placed and confirmed, it cannot be canceled. Refunds will only be issued in cases of incorrect orders, damaged goods, or if the order is not delivered as promised.</li>
        <li>If you receive an incorrect or defective order, please contact us within 24 hours of delivery to report the issue. We will investigate and offer a replacement or refund as appropriate.</li>
    </ul>
    <h3>6. Food Quality and Safety</h3>
    <ul>
        <li>
            We ensure that all food items are prepared in hygienic conditions and adhere to food safety regulations. However, we are not responsible for any adverse health effects caused by food allergies, unless explicitly mentioned during
            the order.
        </li>
    </ul>
    <h3>7. Promotions and Discounts</h3>
    <ul>
        <li>Promotional offers and discounts may be subject to specific terms and conditions. We reserve the right to modify or cancel promotions at any time without prior notice.</li>
        <li>Discounts and offers cannot be combined unless explicitly stated.</li>
    </ul>
    <h3>8. Intellectual Property</h3>
    <ul>
        <li>
            All content, including but not limited to images, logos, designs, text, and software, are the property of [Your Website Name] and are protected by intellectual property laws. You may not use or distribute any of this content
            without our express written consent.
        </li>
    </ul>
    <h3>9. Limitation of Liability</h3>
    <ul>
        <li>
            To the fullest extent permitted by law, [Your Website Name] and its affiliates will not be liable for any indirect, incidental, or consequential damages, including but not limited to loss of profits, data, or business arising
            out of your use of the website.
        </li>
    </ul>
    <h3>10. Governing Law</h3>
    <ul>
        <li>These terms and conditions are governed by the laws of [Your Country], and any disputes arising out of these terms shall be subject to the exclusive jurisdiction of the courts of [Your Country].</li>
    </ul>
    <h3>11. Amendments</h3>
    <ul>
        <li>We reserve the right to modify or update these terms and conditions at any time without prior notice. It is your responsibility to review these terms periodically for any changes.</li>
    </ul>
    <h3>12. Contact Information</h3>
    <ul>
        <li>
            <p>If you have any questions regarding these terms and conditions, please contact us at:</p>
            <p>
                <strong>Email</strong>: support@[yourwebsite.com]<br />
                <strong>Phone</strong>: [+Your Contact Number]<br />
                <strong>Address</strong>: [Your Business Address]
            </p>
        </li>
    </ul>
</div>
@endsection

@section('script')
<script>
    
</script>
@endsection