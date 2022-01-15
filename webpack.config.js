const path = require('path');
const SVGSpritemapPlugin = require('svg-spritemap-webpack-plugin');
const { VueLoaderPlugin } = require('vue-loader');

module.exports = {
    entry: {
        main: path.resolve(__dirname, './src/js/index.js'),
        admin: path.resolve(__dirname, './src/admin/admin.js')
    },
    output: {
        filename: '[name].js',
        path: path.resolve(__dirname, 'dist')
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                },
            },
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            outputPath: './css/',
                            name: '[name].min.css',
                        },
                    },
                    'sass-loader'
                ],
            },
            {
                test: /\.css$/i,
                use: ["style-loader", "css-loader"],
            },
            {
                test: /\.svg$/i,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            outputPath: './svg',
                            name: '[name].svg'
                        },
                    },
                ],
            },
        ],
    },
    plugins: [
        new SVGSpritemapPlugin(
            'src/svg/**/*.svg',
            {
                output: {
                    filename: '/svg/spritemap.svg'
                }
            }
        ),
        new VueLoaderPlugin()
    ],
    resolve: {
        extensions: [".vue", ".js"],
    },
};