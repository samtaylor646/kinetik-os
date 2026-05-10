import { defineConfig } from 'vite'
import kirby from 'vite-plugin-kirby'

export default defineConfig({
  root: 'src',
  base: '/',
  build: {
    outDir: '../public/dist',
    emptyOutDir: true,
    manifest: true
  },
  plugins: [kirby()]
})
