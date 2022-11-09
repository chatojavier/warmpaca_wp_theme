module.exports = {
  content: [
    // https://tailwindcss.com/docs/content-configuration
    './*.php',
    './inc/**/*.php',
    './templates/**/*.php',
    './template-parts/**/*.php',
    //'./**/*.php', // recursive search for *.php (be aware on every file change it will go even through /node_modules which can be slow, read doc)
  ],
  safelist: [
    'text-center'
    //{
    //  pattern: /text-(white|black)-(200|500|800)/
    //}
  ],
  theme: {
    colors: {
      cuper: '#B56B40',
      cream: '#FFF8E3',
      grey: '#616166',
      white: '#fff',
      black: '#000',
      current: 'currentcolor'
    },
    extend: {}
  },
  plugins: []
}