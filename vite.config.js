import { defineConfig } from "vite";
import path from "path";

export default defineConfig(({ mode }) => ({
  build: {
    minify: mode === "production",
    copyPublicDir: false,
    lib: {
      entry: path.resolve(__dirname, "scripts/tee.js"),
      name: "Client",
      fileName: () => "client.js",
      formats: ["umd"], // Use UMD format for browser compatibility
    },
    outDir: path.resolve(__dirname, "dist/js"),
  },
}));
