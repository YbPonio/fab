<template>
  <v-app>
    <v-main>
      <v-btn @click="router.push('/categories')"> To Category </v-btn>
      <v-btn @click="router.push('/')"> To Products </v-btn>
      <router-view />
    </v-main>
  </v-app>
</template>

<script setup>
import router from "./router";

//
</script>
