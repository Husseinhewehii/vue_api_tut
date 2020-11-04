<h1>Vue Test</h1>

<style>
    
</style>
<head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script> window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
</head>
<body>
    <div id="app" class="container">
        <tabs>
            <tab name="About" :selected="true">
                <h1>here is the content of about tab</h1>
            </tab>

            <tab name="About Us">
                <h1>here is the content of about us tab</h1>
            </tab>

            <tab name="About our culture">
                <h1>here is the content of about our culture</h1>
            </tab>
        </tabs>

        <coupon @applied="onCouponApplied"></coupon>
        <h1 v-if="couponAngewandt">coupon gerade angewandt</h1>

        <modal>
            <template slot="header">Neu Titel</template >
            <template slot="footer">
                <button class="button is-success">Save changes</button>
                <button class="button">Cancel</button>
            </template >
                main content is here
        </modal>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
</body>



