import { defineConfig } from "vite";
import { resolve } from "node:path";

// One website, four real pages. Each page has its own HTML file (and URL).
export default defineConfig({
  build: {
    rollupOptions: {
      input: {
        home: resolve(__dirname, "index.html"),
        gerome: resolve(__dirname, "gerome/index.html"),
        leah: resolve(__dirname, "leah/index.html"),
        marvin: resolve(__dirname, "marvin/index.html"),
      },
    },
  },
});
