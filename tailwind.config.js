const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    important: true,
    // Active dark mode on class basis
    darkMode: "class",
    i18n: {
        locales: ["en-US"],
        defaultLocale: "en-US",
      },
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            backgroundImage: {
                'step1_background_image' : "secure_url'/images/steps/step1-background.png')",
                'check': "secure_url'/icons/check.svg')",
                'landscape': "secure_url'/images/landscape/2.jpg')",
                'snow-background5': "secure_url/images/uikit/snow_background5.svg"
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
        extend: {
            backgroundColor: ["checked"],
            borderColor: ["checked"],
            inset: ["checked"],
            zIndex: ["hover", "active"],
          },
    },
    plugins: [],
    future: {
      purgeLayersByDefault: true,
    },
    plugins: [require('@tailwindcss/ui')],
};
