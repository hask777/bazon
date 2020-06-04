module.exports = {
    theme: {
        extend: {
            width:{
                '96':'24rem',
                '20%': '20%',
                '30%': '30%',
                '40%': '40%',
                '50%': '50%',
                '60%': '60%',
                '70%': '70%',
                '80%': '80%',
                '90%': '90%',
                '100': '100%'
            }
        },
        spinner: (theme) => ({
                default: {
                color: '#dae1e7', // color you want to make the spinner
                size: '1em', // size of the spinner (used for both width and height)
                border: '2px', // border-width of the spinner (shouldn't be bigger than half the spinner's size)
                speed: '500ms', // the speed at which the spinner should rotate
                },        
            }),
        },
    variants: {},
    plugins: [
         require('tailwindcss-spinner')(), // no options to configure
    ],
}
