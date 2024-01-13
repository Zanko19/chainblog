/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.html", "./*.css"],
  theme: {
    extend: {
      boxShadow: {
        glass: '0 4px 30px rgba(0, 0, 0, 0.1)',
      },
      backdropFilter: {
        glass: 'blur(0px)',
      },
      backdropBlur: {
        glass: 'blur(0px)',
      },
      backgroundColor: {
        'lglass': 'rgba(255, 255, 255, 0.04)',
      },
      backdropFilter: {
        'lglass': 'blur(10px)',
      },
      borderOpacity: {
        'lglass': '0.05',
      },
    },
  },
  plugins: [],
}
