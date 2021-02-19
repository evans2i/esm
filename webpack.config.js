const path = require('path');
const plugin = require('tailwindcss/plugin')

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
    },
};



