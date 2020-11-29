let webpack = require('webpack');
let path = require('path');

module.exports = {
    entry: './resources/assets/js/appwebpack.js',
    output:{
        path: path.resolve(__dirname, 'public/js'),
        filename: 'bundle.js',
        publicPath: "./public"
    }
}


// http://lodexcart.lodex-solutions.com/en