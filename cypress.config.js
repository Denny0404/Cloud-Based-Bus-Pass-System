const { defineConfig } = require("cypress");

module.exports = defineConfig({
  e2e: {
    baseUrl: "http://localhost:3000",
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
