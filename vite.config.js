/**
 * Path: /vite.config.js
 * Filename: vite.config.js | Version: v7.8.0
 * Agent: DevOps-V
 * Status: Production
 * Logic: Vite 6 configuration with Tailwind 4, Kirby integration, and Rancher Desktop HMR polling
 */

import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';
import kirby from 'vite-plugin-kirby';

export default defineConfig({
  plugins: [
    tailwindcss(),
    kirby({
      watch: [
        './site/(templates|snippets|controllers|models)/**/*.php',
        './content/**/*'
      ]
    })
  ],

  build: {
    outDir: './public/dist',
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: 'src/main.js'
    }
  },

  server: {
    host: '0.0.0.0',
    port: 3000,
    strictPort: true,
    hmr: {
      clientPort: 3000,
      protocol: 'ws',
      host: 'localhost'
    },
    watch: {
      usePolling: true,  // CRITICAL: Required for Rancher Desktop file system detection
      interval: 100
    },
    origin: 'http://localhost:3000',
    cors: true
  }
});