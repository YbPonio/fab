<template>
  <h1>Categories</h1>
  {{ appStore.categories }}
  <h1>Products</h1>
  {{ appStore.products }}
  <h1 @click="changeName()">Dog name: {{ appStore.dogName }}</h1>

  <p>Has published books:</p>
  <span>{{ publishedBooksMessage }}</span>
</template>

<script setup>
import api from "@/helpers/api";
import { useAppStore } from "@/stores/app";
import { onMounted, reactive, computed } from "vue";

const author = reactive({
  name: 'John Doe',
  books: [
    'Vue 2 - Advanced Guide',
    'Vue 3 - Basic Guide',
  ]
})
const appStore = useAppStore();

// a computed ref
const publishedBooksMessage = computed(() => {
  return author.books.length > 0 ? 'Yes' : 'No'
})


onMounted(refresh);

async function refresh() {
  console.log(appStore.dogName);
  appStore.categories = (await api.category.get()).data;
  appStore.products = (await api.product.get()).data;
}

function changeName() {
  appStore.dogName = "Fido";
}
</script>

<style scoped></style>
