/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.{js,jsx,html,php,css}"],
  theme: {
    extend: {
      colors: {
        primary: "#FFD700",
      },
    },
  },
  plugins: [
    {
      tailwindcss: {},
      autoprefixer: {},
    },
  ],
};
