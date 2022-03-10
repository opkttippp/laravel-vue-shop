const path = require('path');

module.exports = {
    mode: 'development',
    entry: './public/style/style.js',
    output: {
        filename: '[name].js',
        path: path.resolve(__dirname, './public/style'),
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                loader: 'babel-loader',
            },
            {
                test: /\.css$/,
                use: [
                    'style-loader',
                    'css-loader'
                ]
            },
            {
                test: /\.(png|jpg|jpeg|svg|gif)$/,
                type: 'asset/resource',
            },
        ],
    },
    resolve: {
        extensions: ['.js', '.vue'],
        alias: {
            'vue$': 'vue/dist/vue.esm-browser.js'
        }
    }
};
