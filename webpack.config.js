let webpack = require('webpack');
let path = require('path');

module.exports = {
    entry: './resources/assets/js/appwebpack.js',
    output:{
        path: path.resolve(__dirname, 'public/js'),
        filename: 'appwebpack.js',
        publicPath: "./public"
    },

    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.esm.js' // 'vue/dist/vue.common.js' for webpack 1
        }
    },


    performance: {
        hints: false,
        maxEntrypointSize: 512000,
        maxAssetSize: 512000
    }
}




// http://lodexcart.lodex-solutions.com/en