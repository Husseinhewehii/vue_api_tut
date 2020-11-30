let webpack = require('webpack');
let path = require('path');

module.exports = {
    // mode: 'production',
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

    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: 'babel-loader'
            }
        ]
    },

    performance: {
        hints: false,
        maxEntrypointSize: 512000,
        maxAssetSize: 512000
    }
}


if(process.env.NODE_ENV === 'production'){
    modules.exports.plugins.push(
        new webpack.optimize.UglifyJsPlugin({
            sourcemap: true,
            compress:{
                warnings: false
            }
        })
    )
}




// http://lodexcart.lodex-solutions.com/en