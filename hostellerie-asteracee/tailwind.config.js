/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      height:{
        '147': '147px',
        '330': '330px',
        '380': '380px',
        '450': '450px'
      },
    },
  },
  plugins: [],
}
