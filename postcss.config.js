module.exports = {
    plugins: [
        require('postcss-import')(),
        require('postcss-cssnext')(),
        require('postcss-nested-ancestors')(),
        require('postcss-nested')(),
        //require('css-mqpacker')(),
        //require('postcss-focus')()
    ]
}