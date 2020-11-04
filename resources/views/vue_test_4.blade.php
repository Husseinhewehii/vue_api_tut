<h1>Vue Test</h1>

<style>
    
</style>
<head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script> window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
</head>
<body>
    <div id="app">
        <task-list></task-list>
        <br>
        <bulma-article title="hello there" body="the body here"></bulma-article>
        <br>
        <bulma-article title="hallo da" body="die körper hier"></bulma-article>
        <br>

        <modal v-if=showModal @close="showModal=false">
            Here is the content from the blade
        </modal>
        <button @click="showModal=true">Show Modal</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
</body>



