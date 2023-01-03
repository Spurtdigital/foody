let mix = require('laravel-mix');
let path = require('path');

require('laravel-mix-purgecss');

mix.webpackConfig(webpack => {
   return {
       plugins: [
           new webpack.ProvidePlugin({
               $: 'jquery',
               jQuery: 'jquery',
               'window.jQuery': 'jquery',
           })
       ]
   };
});

mix
   .extract(['@fancyapps/fancybox', 'slick-slider'])
   .js('assets/js/app.js', 'js')
   .js('assets/js/builder.js', 'js')
   .sass('assets/scss/app.scss', 'css')
   .options({
      processCssUrls: false
   })
   .copyDirectory('assets/images', 'dist/images')
   .setPublicPath('dist')
   .purgeCss({
      // enabled: true,
      content: [path.join(__dirname, './**/*.php')],
      css: [path.join(__dirname, './dist/css/app.css')],
      safelist: [
         /^btn-/, 
         /^href/, 
         /^is-/, 
         /^fancybox-/, 
         /^gform_/, 
         /^ginput_/, 
         /^lock/,
         /^block/,
         /^wpadminbar/,
         /^panel/,
      ]
   });