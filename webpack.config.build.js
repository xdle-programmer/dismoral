const { merge } = require('webpack-merge');
const baseConfig = require('./webpack.config.base');
const TerserPlugin = require('terser-webpack-plugin');
const path = require('path');
const fs = require('fs');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = merge(baseConfig, {
    mode: 'production',
    watch: false,
    output: {
        filename: '[name]-[hash].js',
        path: path.resolve(__dirname, './public/app'),
        clean: true,
    },
    module: {
        rules: [
            {
                test: /\.(png|jpg|svg|ttf|eot|woff|woff2)$/,
                type: 'asset/resource',
                generator: {
                    filename: (normalModule) => {
                        let filePath = normalModule.module.resourceResolveData.relativePath;
                        filePath = filePath.replace('./public/', '../');
                        return filePath;
                    },
                    emit: false,
                },
            },
        ]
    },
    optimization: {
        minimize: true,
        minimizer: [
            new TerserPlugin({
                parallel: true,
                extractComments: false,
                terserOptions: {
                    ecma: undefined,
                    parse: {},
                    compress: {
                        pure_funcs: ['console.log']
                    },
                    mangle: true, // Note `mangle.properties` is `false` by default.
                    module: false,
                    // Deprecated
                    output: null,
                    format: {
                        comments: false,
                    },
                    toplevel: false,
                    nameCache: null,
                    ie8: false,
                    keep_classnames: undefined,
                    keep_fnames: false,
                    safari10: false,
                },
            }),
        ],
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: '[name]-[hash].css',
        }),
    ],

});

