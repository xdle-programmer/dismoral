const path = require('path');
const fs = require('fs');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

let excludeDirName = '__exclude__';
let getFiles = function (dir, files_, extension) {
    files_ = files_ || [];
    let files = fs.readdirSync(dir);
    let regular = new RegExp('.\\.' + extension + '$');

    for (let i in files) {

        let name = dir + '/' + files[i];
        if (fs.statSync(name)
            .isDirectory() && name.indexOf(excludeDirName) === -1) {
            getFiles(name, files_, extension);
        } else if (regular.test(name)) {
            files_.push(name);
        }
    }

    return files_;
};

// Файлы стилей верстки
let styleMarkupArray = [];
getFiles(path.resolve(__dirname, './resources/markup'), styleMarkupArray, 'scss');
getFiles(path.resolve(__dirname, './resources/markup'), styleMarkupArray, 'css');

// Js файлы верстки, включая точку входа
let jsMarkupArray = [path.resolve(__dirname, './resources/index.js')];
getFiles(path.resolve(__dirname, './resources/markup'), jsMarkupArray, 'js');


let fullArray = jsMarkupArray.concat(styleMarkupArray);


module.exports = {
    mode: 'development',
    entry: {
        main: fullArray,
    },
    output: {
        filename: '[name].js',
        path: path.resolve(__dirname, './public'),
    },
    devtool: 'source-map',
    module: {
        rules: [
            {
                test: /\.js$/,
                loader: 'babel-loader',
                exclude: '/node_modules/'
            },
            {
                test: /\.css$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                ],
            },
            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                    },
                    {
                        loader: 'sass-loader',
                    }
                ],
            },
        ]
    },
};
