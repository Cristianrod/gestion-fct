// webpack.config.js
var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // .enableVersioning(Encore.isProduction())
    .addEntry('js/app', './assets/js/app.js')
    .addEntry('js/fct', './assets/js/fct.js')
    .addStyleEntry('css/app', './assets/css/app.scss')
    .enableSassLoader(function(sassOptions) {}, {
        resolveUrlLoader: false
    })
    .enablePostCssLoader()
    .autoProvidejQuery()
    .autoProvideVariables({ Popper: 'popper.js' })
    .createSharedEntry('vendor', ['jquery'])
;

module.exports = Encore.getWebpackConfig();
