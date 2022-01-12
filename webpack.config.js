var path = require('path');
var webpack = require('webpack');
const {VueLoaderPlugin} = require('vue-loader')

module.exports = {
    mode: "development",
    entry: "/src/Assets/js/app.js",
    output: {
        path: __dirname + "/public/js/",
        publicPath: '/js/',
        filename: "app.js"
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                options: {
                    loaders: {}
                    // other vue-loader options go here
                }
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: "babel-loader",
                }
            },
            //img loader
            {
                test: /\.(svg|png|jpe?g|)$/i,
                use: {
                    loader: "file-loader",
                    options: {
                        name: '../img/[name].[ext]',
                    },
                },
            },
        ]
    },
    plugins: [
        new VueLoaderPlugin()
    ]
}
