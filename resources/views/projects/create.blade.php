<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script> window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div id="app" class="container">
        
        <form action="/projects" method="post" @submit.prevent="onSubmit" @keydown="form.fehler.clear($event.target.name)">
            <example></example>
            <div class="control">
                <label for="name" class="label">Project Name: </label>
                <input type="text" name="name" class="input" id="name" v-model="form.name">
                {{--<input type="text" name="name" class="input" id="name" v-model="name" @keydown="fehler.clear('name')">--}}
                <span class="help is-danger" v-if="form.fehler.has('name')" v-text="form.fehler.get('name')"></span>
            </div>

            <div class="control">
                <label for="description" class="label">Project Description: </label>
                <input type="text" name="description" class="input" id="description" v-model="form.description">
                {{--<input type="text" name="description" class="input" id="description" v-model="description" @keydown="fehler.clear('description')">--}}
                <span class="help is-danger" v-if="form.fehler.has('description')" v-text="form.fehler.get('description')" ></span>
            </div>

            <div class="control">
                <button class="button is-primary" :disabled="form.fehler.any()">Create</button>
            </div>

        </form>
    </div>

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js" integrity="sha512-DZqqY3PiOvTP9HkjIWgjO6ouCbq+dxqWoJZ/Q+zPYNHmlnI2dQnbJ5bxAHpAMw+LXRm4D72EIRXzvcHQtE8/VQ==" crossorigin="anonymous"></script>--}}
    <script  src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    {{--<script  src="https://unpkg.com/vue@2.1.6/dist/vue.js">--}}
    <script src="https://unpkg.com/axios/dist/axios.min.js">
    <script  src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script  src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script  src="{{ asset('js/app.js') }}"></script>
</body>
</html>
<script>

</script>