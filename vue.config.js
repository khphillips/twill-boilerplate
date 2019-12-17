//const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin')

module.exports = {
  "transpileDependencies": [
    "vuetify"
  ],
  runtimeCompiler : true,
  outputDir: 'public/assets/',
  configureWebpack : {
    mode: process.env.NODE_ENV,
  },
  chainWebpack: config => {
    config.plugins.delete('copy')
  },
  css: {
    extract: {
      filename: 'css/[name].css',
      chunkFilename: 'css/[name].css'
    }
  },
  configureWebpack: {
    output: {
      filename: 'js/[name].js',
      chunkFilename: 'js/[name].js'
    },
    plugins: [
        //new VuetifyLoaderPlugin(),
    ]
  },
  pages: {
    index: {
      // entry for the page
      entry: 'resources/js/app.js',
      // the source template
      template: 'webpack-public/_index.html',
      // output as dist/index.html
      filename: '_index.html',
      // when using title option,
      // template title tag needs to be <title><%= htmlWebpackPlugin.options.title %></title>
      title: 'Index Page',
      // chunks to include on this page, by default includes
      // extracted common chunks and vendor chunks.
      //chunks: ['chunk-vendors', 'chunk-common', 'index']
    }
  }
}