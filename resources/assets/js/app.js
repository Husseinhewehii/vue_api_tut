
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('articles', require('./components/Articles.vue'));


Vue.component('progress-view',{
    data(){
        return{
            completionRate:1202
        };
    }
})


// window.Event = new Vue();
window.Event = new class{
    constructor(){
        this.vue = new Vue();
    }
    fire(event, data=null){
        this.vue.$emit(event,data);
    }
    listen(event, callback){
        this.vue.$on(event,callback);
    }
}

Vue.component('coupon',{
    template: '<input placeholder="enter coupon" @blur="onCouponAngewandt">',
    methods:{
        onCouponAngewandt(){
            // this.$emit('applied');
            Event.fire('applied');
        }
    }
})

Vue.component('tabs',{
    template:`
    <div>
        <div class="tabs">
            <ul>
                <li  v-for="tab in tabs" :class="{'is-active':tab.isActive}">
                    <a :href=tab.href @click="selectTab(tab)">{{tab.name}}</a>
                </li>
            </ul>
        </div>

        <div class="tabs-details">
            <slot></slot>
        </div>
    </div>
    `,
    // mounted(){
    //     console.log(this.$children);
    // }
    data(){
        return {tabs:[]}
    }
    ,
    created(){
        this.tabs = this.$children;
    },
    methods:{
        selectTab(selectedTab){
            this.tabs.forEach(tab => {
               tab.isActive = tab.name == selectedTab.name; 
            });
        }
    }
})

Vue.component('tab',{
    template:`
    <div v-show="isActive">
        <slot></slot>
    </div>
    `,
    props:{
        name:{required:true},
        selected:{default:false}
    },
    data(){
        return{
            isActive:false
        }
    },
    computed:{
        href(){
             return '#'+this.name.toLowerCase().replace(/ /g,'-');
        }
    },
    mounted(){
        this.isActive = this.selected
    }
})

// Vue.component('modal',{
//     props:["title","body"],
//     data(){
//         return{
//             zeigModal:true
//         }
//     },
//     template:`
//         <div class="modal is-active" v-show="zeigModal">
//             <div class="modal-background"></div>
//             <div class="modal-content">
//               <div class="box">
//                   <p>
//                       <slot></slot>
//                   </p>
//               </div>
//             </div>
            
//             <button class="modal-close is-large" @click="$emit('close')" aria-label="close"></button>
//         </div>
//         `
// })


Vue.component('modal',{

    data(){
        return{
            zeigModal:true
        }
    },
    template:`
        <div class="modal is-active">
            <div class="modal-background"></div>
            <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">
                <slot name="header"></slot>
                </p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <slot></slot>
            </section>
            <footer class="modal-card-foot">
                <slot name="footer"></slot>
            </footer>
            </div>
        </div>
        `
})



Vue.component('bulma-article',{
    props:["title","body"],
    data(){
        return{
            isVisible:true
        }
    },
    template:`
            <article class="message" v-show=isVisible>
        <div class="message-header">
            <p>{{title}}</p>
            <button class="delete" @click="isVisible = false" aria-label="delete"></button>
        </div>
        <div class="message-body">
            {{body}}
        </div>
        </article>
    `,
    methods:{
        hideModal(){
            this.isVisible = false;
        }
    }
})
Vue.component('articles', require('./components/Articles.vue').default);
Vue.component('navbar', require('./components/Navbar.vue').default);
Vue.component('task-list',{
    template:'<div><task v-for="task in tasks">{{task.description}}</task></div>',
    data(){
        return {
             msg:"herzlich willkommen",
             tasks:[
                {description: 'go to store', completed:false},
                {description: 'go to shop', completed:false},
                {description: ' hospital', completed:true},
                {description: 'train in gym', completed:true},
                {description: 'travel from station', completed:false},
            ]
        };
    }
});

Vue.component('task',{
    template:'<li><slot></slot></li>',
    
});
// Vue.component('agencies', require('./components/Agencies.vue').default);


class Errors {
    constructor(){
        this.errors = {};
    }

    get(field){
        if(this.errors[field]){
           return this.errors[field][0];
        }
    }

    has(field){
        return this.errors.hasOwnProperty(field);
    }

    any(){
        return Object.keys(this.errors).length > 0;
    }

    record(errors){
        this.errors = errors;
    }

    clear(field){
        if (field) {
            delete this.errors[field];
            return ;
            }
        this.errors = {};
    }
}

class Form {
    constructor(data){
        // console.log(data);
        this.originalData = data;
        for (let field in data){
            this[field] = data[field];
        }
        this.fehler = new Errors();
    }



    data(){
        let data = Object.assign({}, this);

        delete data.originalData;
        delete data.fehler;

        return data;
    }


    reset(){
        for (let field in this.originalData)
        {
            this[field] = '';
        }
    }

    submit(requestType, url){
        axios[requestType](url, this.data())
            .then(this.onSuccess.bind(this))
            .catch(this.onFail.bind(this))
    }

    onSuccess(response) {
        alert(response.data.message);
        this.fehler.clear();
        this.reset();
    }

    onFail(error) {
        this.fehler.record(error.response.data.errors);
    }
}


// Vue.prototype.$http = axios;
const app = new Vue({
    el: '#app',
    data:{     
        // showModal:false,
        // couponAngewandt : false,
        // skills: [],

        form: new Form({
            name: '',
            description: '',
        }),
    },
    methods:{
        onCouponApplied(){
            this.couponAngewandt = true;
        },
        onSubmit(){
           this.form.submit('post', '/projects');
        }

        // ,
        // onSuccess(response){
        //     alert(response.data.message)
        //     this.name = '';
        //     this.description = '';
        // }
    },
    created(){
        Event.listen('applied',()=>alert('event handled'));
    },
    mounted(){
        axios.get('/api/skills').then(response=>this.skills = response.data);
        // this.$http.get('/api/skills').then(response=>this.skills = response.data);
    }
});
