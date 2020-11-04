

Vue.component('task',{
    template:'<li>static entry</li>'
});

new Vue({
    el:"#root",
    data : {
        msg:"willkommen",
        tasks:[
            {description: 'go to store', completed:false},
            {description: 'go to shop', completed:false},
            {description: ' hospital', completed:true},
            {description: 'train in gym', completed:true},
            {description: 'travel from station', completed:false},
        ]
    }
});