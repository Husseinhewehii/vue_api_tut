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
        <progress-view inline-template>
            <div>
                <h1>your progress is @{{completionRate}}</h1>
                <p><button @click="completionRate+=10">update completion rate</button></p>
            </div>
        </progress-view>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
</body>



