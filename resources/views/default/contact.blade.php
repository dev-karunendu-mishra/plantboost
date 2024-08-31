<x-default-app-layout :siteSettings="$siteData">
    <div class="container">
        <h1 class="text-center">Contact Us</h1>

        <p><span><strong>Plantboost.in</strong> provide the best customized luxurious products to our online customers
                at very affordable prices. We have a team of young Entrepreneurs having years of expertise in creating
                and selling the best customized products that suit your expectations, needs, and style. We have the
                motive to provide your home a guaranteed decoration without Compromise.
            </span></p>
        <ul>
            <ul>
                <li><span>Unique Products with Beautiful Designs</span></li>
                <li><span>Affordable Pricing</span></li>
                <li><span>24x7 Customer Support</span></li>
                <li><span>Live Chat Support</span></li>
                <li><span>Secured and Fast Shipping</span></li>
            </ul>
        </ul>
        <p><span>If you want to know more about us or have any specific question that it is not on our </span><a
                href="{{url('faqs')}}"><b>FAQ </b></a><span><a href="{{url('faqs')}}"></a>page, Do not hesitate
                to</span><b>
                Contact
                Us</b><span>.</span></p>
        <p><i class="fa fa-envelope-o"></i> <strong><span>{{!empty($siteData) ? $siteData->email : 'support@plantboost.in'}}</span></strong></p>
        <p><i class="fa fa-phone"></i> <strong><span>{{!empty($siteData) ? $siteData->mobile : '9999999999'}}</span></strong></p>
    </div>
</x-default-app-layout>