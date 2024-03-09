/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.js",
      "./resources/**/*.blade.php",
  ],
  theme: {
    container: {
        center: true,
    },
    extend: {
        fontFamily: {
            open_sans: ['var(--font-open-sans)', "sans-serif"],
            open_sans_sb: ['var(--font-open-sans-sb)', "sans-serif"],
            montserrat: ['var(--font-montserrat)', "sans-serif"],
            montserrat_m: ['var(--font-montserrat-med)', "sans-serif"],
            montserrat_sb: ['var(--font-montserrat-sb)', "sans-serif"],
            montserrat_b: ['var(--font-montserrat-b)', "sans-serif"],
        },
        screens: {
            sm: "576px",
            md: "768px",
            lg: "992px",
            xl: "1200px",
            "2xl": "1360px",
        },
        colors: {
            accent: {
                100: "rgba(var(--color-accent-rgb), 0.2)",
                200: "rgba(var(--color-accent-rgb), 0.4)",
                300: "rgba(var(--color-accent-rgb), 0.6)",
                400: "rgba(var(--color-accent-rgb), 0.8)",
                500: "rgba(var(--color-accent-rgb), 1)", // main
            },
            silver: {
                400: "rgba(var(--color-silver-rgb), 0.2)",
                500: "rgba(var(--color-silver-rgb), 0.4)", // main
                600: "rgba(var(--color-silver-rgb), 0.6)",
                700: "rgba(var(--color-silver-rgb), 0.8)",
                800: "rgba(var(--color-silver-rgb), 1)",
            },
            lightblue: {
                100: "rgba(var(--color-lightblue-rgb), 0.2)",
                200: "rgba(var(--color-lightblue-rgb), 0.4)",
                300: "rgba(var(--color-lightblue-rgb), 0.6)",
                400: "rgba(var(--color-lightblue-rgb), 0.8)",
                500: "rgba(var(--color-lightblue-rgb), 1)", // main
            },
            darkslateblue: {
                100: "rgba(var(--color-darkslateblue-rgb), 0.2)",
                200: "rgba(var(--color-darkslateblue-rgb), 0.4)",
                300: "rgba(var(--color-darkslateblue-rgb), 0.6)",
                400: "rgba(var(--color-darkslateblue-rgb), 0.8)",
                500: "rgba(var(--color-darkslateblue-rgb), 1)", // main
            },
            darkblue: {
                100: "rgba(var(--color-darkblue-rgb), 0.2)",
                200: "rgba(var(--color-darkblue-rgb), 0.4)",
                300: "rgba(var(--color-darkblue-rgb), 0.6)",
                400: "rgba(var(--color-darkblue-rgb), 0.8)",
                500: "rgba(var(--color-darkblue-rgb), 1)", // main
            },
        },
    },
  },
  plugins: [
      require('@tailwindcss/forms'),
  ],
}

