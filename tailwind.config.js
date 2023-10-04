/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      margin: {
        '160': '160px',
      },
      fontFamily: {
        poppins: ['Poppins', 'sans']
      }
    },
  },
  plugins: [],
}

