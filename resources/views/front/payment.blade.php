<x-front-layout>
    <div class="mysr-form mt-5 mb-5"></div>
    @push('css')
        <!-- Moyasar Styles -->
        <link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.5.5/moyasar.css">

        <!-- Moyasar Scripts -->
        <script src="https://polyfill.io/v3/polyfill.min.js?features=fetch"></script>
        <script src="https://cdn.moyasar.com/mpf/1.5.5/moyasar.js"></script>
    @endpush
    @push('js')
        <script>
            Moyasar.init({
                // Required
                // Specify where to render the form
                // Can be a valid CSS selector and a reference to a DOM element
                element: '.mysr-form',

                // Required
                // Amount in the smallest currency unit
                // For example:
                // 10 SAR = 10 * 100 Halalas
                // 10 KWD = 10 * 1000 Fils
                // 10 JPY = 10 JPY (Japanese Yen does not have fractions)
                amount: {{$order->grandtotal*100}},

                // Required
                // Currency of the payment transation
                currency: 'SAR',

                // Required
                // A small description of the current payment process
                description: 'طلب من متجر أطفالنا',

                // Required
                publishable_api_key: "{{config("moyasar.publishable_api_key")}}",

                // Required
                // This URL is used to redirect the user when payment process has completed
                // Payment can be either a success or a failure, which you need to verify on you system (We will show this in a couple of lines)
                callback_url: "{{url(route('checkout.callback',$order->transaction_id))}}",

                // Optional
                // Required payments methods
                // Default: ['creditcard', 'applepay', 'stcpay']
                methods: [
                    'creditcard',
                    'stcpay'
                ],

                metadata: {
                        'order_id': "{{$order->transaction_id}}"
                    }
            });
        </script>
    @endpush
</x-front-layout>
