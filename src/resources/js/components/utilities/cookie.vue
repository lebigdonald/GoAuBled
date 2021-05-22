<template>
  <footer>
    <cookie-law buttonText="accepter" message="Bienvenue sur Goaubled, nous utilisons des cookies sur notre site. veuillez valider pour continuer" theme="dark-lime"></cookie-law>
  </footer>
</template>

<script>
  import CookieLaw from 'vue-cookie-law'
  export default {
    components: { CookieLaw }
  }
</script>