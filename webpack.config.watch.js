const {merge} = require('webpack-merge');
const baseConfig = require('./webpack.config.base');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const path = require('path');

module.exports = merge(baseConfig, {
    mode: 'development',
    watch: true,
    module: {
        rules: [
            {
                test: /\.(png|jpg|svg|ttf|eot|woff|woff2)$/,
                type: 'asset/resource',
                generator: {
                    filename: (normalModule) => {
                        let filePath = normalModule.module.resourceResolveData.relativePath;
                        filePath = filePath.replace('./public/', '');
                        return filePath;
                    },
                    emit: false,
                },
            },
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: '[name].css',
        }),
    ],
});
