<h1>Vue Test</h1>

<div id="root">
    {{--<input type="text" v-model="message">--}}
    {{--@{{ grussung }}--}}

    {{--<li v-for="name in names">@{{name}}</li>--}}

    {{--or--}}

    <li v-for="name in names" v-text="name"> </li>

    <input id="new_name" type="text">
    <button id="button">Add Name</button>
</div>


<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script>
    var apple = new Vue({
        el:'#root',
        data : {
            message : "guten tag",
            grussung : 'wie geht?',
            names: ['hussein', 'yasser', 'hamza']
        }
        ,mounted(){
            document.querySelector('#button').addEventListener('click',()=>{
                let name = document.querySelector('#new_name');
                apple.names.push(name.value);
                name.value = '';
            });
        }
    })



</script>