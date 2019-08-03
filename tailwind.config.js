module.exports = {
  theme: {
    container: {
      center: true,
    },
    extend: {
      screens: {
        'print': { 'raw': 'print' },
      }
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/custom-forms'),
  ]
}
