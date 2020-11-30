import Errors from "./errors";

class Form {
    constructor(data){
        this.originalData = data;
        for (let field in data){
            this[field] = data[field];
        }
        this.fehler = new Errors();
    }


    data(){
        // let data = Object.assign({}, this);
        //
        // delete data.originalData;
        // delete data.fehler;

        let data = {};

        for (let property in this.originalData){
            data[property] = this[property];
        }

        return data;
    }


    reset(){
        this.fehler.clear();
        for (let field in this.originalData)
        {
            this[field] = '';
        }
    }


    post(url){
        return this.submit('post',url)
    }

    delete(url){
        return this.submit('delete',url)
    }


    submit(requestType, url){

        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);
                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data.errors);
                    reject(error.response.data.errors);
                })
        });

        // axios[requestType](url, this.data())
        //     .then(this.onSuccess.bind(this))
        //     .catch(this.onFail.bind(this))
    }

    onSuccess(data) {
        alert(data.message);
        this.reset();
    }
    // onSuccess(response) {
    //     alert(response.data.message);
    //     this.fehler.clear();
    //     this.reset();
    // }

    onFail(errors) {
        this.fehler.record(errors);
    }
    // onFail(error) {
    //     this.fehler.record(error.response.data.errors);
    // }
}

export default Form;