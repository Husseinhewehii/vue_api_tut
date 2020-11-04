<h1>Vue Test</h1>

<div id="root">
    {{--<input type="text" v-model="message">--}}
    {{-- <input id="new_name" type="text" v-model="newName" v-on:keyUp="addName"> --}}
    {{--@{{ grussung }}--}}

    {{--<li v-for="name in names">@{{name}}</li>--}}

    {{--or--}}

    <li v-for="name in names" v-text="name"> </li>

    <input id="new_name" type="text" v-model="newName">
    {{-- <button id="button" v-on:click="addName">Add Name</button> --}}
    <button id="button" @click="addName">Add Name</button>
</div>


<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script>
    var apple = new Vue({
        el:'#root',
        data : {
            message : "guten tag",
            grussung : 'wie geht?',
            newName : '',
            names: ['hussein', 'yasser', 'hamza']
        },
        methods:{
            addName(){
                this.names.push(this.newName);
                this.newName = '';
            }
        }
        // ,mounted(){
        //     document.querySelector('#button').addEventListener('click',()=>{
        //         let name = document.querySelector('#new_name');
        //         apple.names.push(name.value);
        //         name.value = '';
        //     });
        // }
    })



</script>