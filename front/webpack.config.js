const webpack = require('webpack')
const path = require('path')
const nodeEnv = process.env.NODE_ENV
const ExtractTextPlugin = require('extract-text-webpack-plugin')
const CopyWebpackPlugin = require('copy-webpack-plugin');


const plugins = [
  new webpack.DefinePlugin({
    'process.env': { NODE_ENV: JSON.stringify(nodeEnv) }
  }),
  new ExtractTextPlugin('[name].css'),
  new CopyWebpackPlugin([
    { 
      from: './src/static',
      to: 'imgs' 
    }
  ])
]

if (nodeEnv === 'pro') {
  const UglifyJsPlugin = require('uglifyjs-webpack-plugin')
  plugins.push(new UglifyJsPlugin())
}

module.exports = {
  devtool: 'source-map',
  entry: {
    filemap: './src/main.js'
  },
  output: {
    path: path.resolve(__dirname, '_build'),
    filename: 'bundle.js',
    publicPath: ''
  },
  module: {
    loaders: [{
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'babel-loader',
        query: {
          presets: ['es2015']
        }
      }, {
        test: /\.vue$/,
        loader: 'vue-loader'
      },
      {
        test: /\.woff2?(\?v=[0-9]\.[0-9]\.[0-9])?$/,
        use: 'url-loader'
      },
      {
        test: /\.(ttf|eot|svg)(\?[\s\S]+)?$/,
        use: 'file-loader'
      },
      { 
        test: /\.(jpe?g|gif|png|svg|woff|ttf|wav|mp3)$/, 
        loader: "file-loader"
      },
      {
        test: /\.css$/,
        use: [ 'style-loader', 'css-loader' ]
      }
    ]
  },
  node: {
    console: true,
    fs: 'empty',
    net: 'empty',
    tls: 'empty'
  },
  plugins: plugins
}