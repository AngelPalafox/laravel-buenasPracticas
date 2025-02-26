<template>
    <div>
      <div id="contenedor-recaptcha" class="g-recaptcha"></div>
      <!-- Mostrar errores si existen -->
      <p
        v-if="error"
        :key="index"
        class="text-red-500 text-xs italic mt-2"
      >
        {{ error }}
      </p>
    </div>
  </template>
  
  <script>
  import { onMounted, onUpdated, ref, watch } from "vue";
  
  export default {
    props: {
      setToken: {
        type: Function,
        required: true,
      },
      error: {
        type: String,
        default: null,
      },
    },
    setup(props) {
      const state = ref(false);
      const optWidgetId = ref(null);
  
      const loadRecaptchaScript = () => {
        const existingScript = document.querySelector(
          'script[src="https://www.google.com/recaptcha/api.js?render=explicit"]'
        );
  
        // Evita cargar el script si ya existe
        if (!existingScript) {
          const script = document.createElement("script");
          script.src = "https://www.google.com/recaptcha/api.js?render=explicit";
          script.async = true;
          document.head.appendChild(script);
  
          script.onload = () => {
            state.value = true;
          };
        } else {
          state.value = true;
        }
      };
  
      const renderRecaptcha = () => {
        if (state.value) {
          window.grecaptcha.ready(() => {
            if (optWidgetId.value !== null) {
              grecaptcha.reset(optWidgetId.value);
            }
            optWidgetId.value = window.grecaptcha.render("contenedor-recaptcha", {
              sitekey: import.meta.env.VITE_RECAPTCHA,
              callback: (response) => {
                props.setToken(response);
              },
            });
          });
        }
      };
  
      onMounted(() => {
        loadRecaptchaScript();
      });
  
      watch([state, () => props.error], () => {
        if(state.value) 
          renderRecaptcha();
      });
  
      return {};
    },
  };
  </script>
  
  <style>
  </style>
  