module.exports = {
    devServer: {
        proxy: 'http://localhost:3000',
        headers: { "Access-Control-Allow-Origin": "*" }
    }
}
