//const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin')
const s3Plugin = require('webpack-s3-plugin');

module.exports = {
  "transpileDependencies": [
    "vuetify"
  ],
  runtimeCompiler : true,
  outputDir: 'storage/app/public/',
  configureWebpack : {
    mode: process.env.NODE_ENV,
  },
  chainWebpack: config => {
    config.plugins.delete('copy')
  },
  css: {
    extract: {
      filename: 'assets/css/[name].css',
      chunkFilename: 'assets/css/[name].css'
    }
  },
  configureWebpack: {
    output: {
      filename: 'assets/js/[name].js',
      chunkFilename: 'assets/js/[name].js'
    },
    plugins: [
        //new VuetifyLoaderPlugin(),
        new s3Plugin({
          include: /.*\.(css|js)$/,
          s3Options: {
            accessKeyId: process.env.AWS_ACCESS_KEY_ID,
            secretAccessKey: process.env.AWS_SECRET_ACCESS_KEY,
            region: process.env.AWS_DEFAULT_REGION,
          },
          s3UploadOptions: {
            Bucket: process.env.AWS_BUCKET,
            CacheControl: 'public, max-age=31536000',
            ACL: 'public-read',
          },
        })
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