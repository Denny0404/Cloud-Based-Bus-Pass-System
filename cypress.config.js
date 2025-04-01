const { defineConfig } = require("cypress");

module.exports = defineConfig({
  e2e: {
    baseUrl: "https://blue-aardvark-631260.hostingersite.com",
    video: true,
    reporter: "mochawesome",
    reporterOptions: {
      reportDir: "cypress/reports",
      overwrite: true,
      html: true,
      json: true
    },

    setupNodeEvents(on, config) {
      // Implement node event listeners here
    }
  }
});
