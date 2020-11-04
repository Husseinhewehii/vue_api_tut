<h1>Vue Test</h1>

<style>
    
</style>

<div id="root">
    <h1 v-text="new Date()"></h1>
    <h2>@{{reveresedMessage}}</h2>

    <h2>all tasks</h2>
    <ul>
        <li v-for="task in tasks"  v-text='task.description'></li>
    </ul>

    <h2>complete tasks</h2>
    <ul>
        <li v-for="task in tasks" v-if='task.completed' v-text='task.description'></li>
    </ul>

    <h2>incomplete tasks</h2>
    <ul>
        <li v-for="task in incompleteTasks" v-text='task.description'></li>
    </ul>

</div>


<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script>
    var apple = new Vue({
        el:'#root',
        data : {
            msg:"willkommen",
            tasks:[
                {description: 'go to store', completed:false},
                {description: 'go to shop', completed:false},
                {description: ' hospital', completed:true},
                {description: 'train in gym', completed:true},
                {description: 'travel from station', completed:false},
            ]
        },
        methods:{
            
        },
        computed:{
            reveresedMessage(){ 
                return this.msg.split('').reverse().join('');
            },
            incompleteTasks(){
                return this.tasks.filter(task => !task.completed);

                // return this.tasks.filter(function(task){
                //     return !task.completed;
                // });
            }
        }
       
       
    })



</script>