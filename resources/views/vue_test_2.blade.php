<h1>Vue Test</h1>

<style>
    .color-blue{color:blue}
    .color-red{color:red}
    .is-loading{background-color: yellow}
</style>

<div id="root">
    {{-- <button v-bind:title="title">hover here</button> --}}
    <button :title="title" :class="{'is-loading':isLoading}" :disabled="state" @click="toggleClass">hover here</button>
    <button @click="switchIt">control the above</button>
    <h2 :class="className">Tag</h2>
</div>


<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script>
    var apple = new Vue({
        el:'#root',
        data : {
            title: 'just replaced title now',
            className: 'color-red',
            isLoading:false,
            state: false
        },
        methods:{
            toggleClass(){
                this.isLoading ? this.isLoading = false : this.isLoading = true;
            },
            switchIt(){
                this.state ? this.state = false : this.state = true;
            }
        }
       
       
    })



</script>