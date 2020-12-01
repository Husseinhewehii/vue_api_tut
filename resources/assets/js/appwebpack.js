
import Form from './core/form';
import Vue from 'vue';
import axios from 'axios';
import Example from './components/Example';
// import ExampleComponent from './components/ExampleComponent';
// import NewExample from './components/NewExample';

window.axios = axios;
window.Form = Form;

const app = new Vue({
    el: '#app',

    components:{
        Example
    },

    data:{
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
            this.form.submit('post', '/projects')
                .then(data => console.log(data))
                .catch(errors => console.log(errors));

            // this.form.delete('/projects');
        }

    },
    created(){
        Event.listen('applied',()=>alert('event handled'));
    },
    mounted(){
        axios.get('/api/skills').then(response=>this.skills = response.data);
        // this.$http.get('/api/skills').then(response=>this.skills = response.data);
    }
});


module.exports = {
    //...
    performance: {
        hints: false
    }
};
