import { defineStore } from "pinia";

export const usePaginationStore = defineStore("pagination", {
  state: () => ({
    currentPage: 1,
    itemsPerPage: 5,
    totalItems: 0,
    totalPages: 0,
  }),

  //   getters: {
  //     paginatedItems: (state) => (items) => {
  //       const start = (state.currentPage - 1) * state.itemsPerPage;
  //       const end = start + state.itemsPerPage;
  //       return items.slice(start, end);
  //     },
  //   },
});
