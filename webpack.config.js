var path = require('path');
var webpack = require('webpack');
const {VueLoaderPlugin} = require('vue-loader');

module.exports = {
    mode: "development",
    entry: "/src/Assets/js/app.js",
    output: {
        path: __dirname + "/public/js/",
        publicPath: '/js/',
        filename: "app.js"
    },
    watch: true,
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                options: {
                    loaders: {},
                    // other vue-loader options go here
                    compilerOptions: {
                        isCustomElement: tag => tag === 'header-nav'
                    }
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
            {
                test: /\.(css|scss|sass)$/,
                use: ['vue-style-loader', 'css-loader','sass-loader']
            },
        ]
    },
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js',
        },
        extensions: ['*', '.js', '.vue', '.json']
    },
    plugins: [
        new VueLoaderPlugin(),
        new webpack.DefinePlugin(
            { 
            __VUE_OPTIONS_API__: true, 
            __VUE_PROD_DEVTOOLS__: false 
            }
        )
    ]
}
