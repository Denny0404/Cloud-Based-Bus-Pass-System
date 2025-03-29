const Data = require('../utility/data'); // Ensure correct path to `data.js`

describe('template spec', () => {
    it('Booking bus pass', () => {
        const nameGenerator = new Data();
        const name = nameGenerator.generate();
        const numberGenerator = new Data('number', 10);
        const phoneNumber = numberGenerator.generate();

        cy.visit('http://localhost/busspasssystem/index.html');
        // home page
        cy.contains('Book Now!').click();

        // customer details
        cy.get('[id="name"]').type(name);
        cy.get('[id="email"]').type(name + '@testing.com');
        cy.get('[id="number"]').type(phoneNumber);
        cy.get('[type="password"]').type(phoneNumber);
        cy.get('[id="date"]').type('2025-05-05');
        cy.get('[name="dest"]').select('Brampton');
        cy.get('[type="submit"]').click();

        //payment details
        cy.get('[name="cardname"]').clear().type(name);
        cy.get('[id="ccnum"]').type('4556-5565-5544-5456');
        cy.get('[id="expmonth"]').type('08');
        cy.get('[id="expyear"]').type('2028');
        cy.get('[id="cvv"]').type('202');
        cy.get('[type="submit"]').click();

        //pass details
        cy.get('.mb-4').eq(0).invoke('text').then((text) => {
            cy.log('Captured ID:', text.trim()); // Debug log
            cy.wrap(text.trim()).as('storedID'); // Store it as an alias
        });

        // Home page for validation
        cy.visit('http://localhost/busspasssystem/index.html');
        cy.viewport('macbook-16');

        // Click 'Manage Pass' and ensure it worked
        cy.get('[role="navigation"]').contains('Manage Pass').click({ force: true });

        // Retrieve the stored ID and type it
        cy.get('@storedID').then((storedID) => {
            cy.log('Stored ID to be entered:', storedID); // Debug log
            cy.get('[id="pass_id"]').eq(0).should('be.visible').type(storedID.trim(), { delay: 100 });
        });
        cy.get('[id="pass_id"]').eq(1).type(phoneNumber);
        cy.get('[type="submit"]').eq(0).click();

    });
    it('Booking bus pass and renew bus pass', () => {
        const nameGenerator = new Data();
        const name = nameGenerator.generate();
        const numberGenerator = new Data('number', 10);
        const phoneNumber = numberGenerator.generate();

        cy.visit('http://localhost/busspasssystem/index.html');
        // home page
        cy.contains('Book Now!').click();

        // customer details
        cy.get('[id="name"]').type(name);
        cy.get('[id="email"]').type(name + '@testing.com');
        cy.get('[id="number"]').type(phoneNumber);
        cy.get('[type="password"]').type(phoneNumber);
        cy.get('[id="date"]').type('2025-05-05');
        cy.get('[name="dest"]').select('Brampton');
        cy.get('[type="submit"]').click();

        //payment details
        cy.get('[name="cardname"]').clear().type(name);
        cy.get('[id="ccnum"]').type('4556-5565-5544-5456');
        cy.get('[id="expmonth"]').type('08');
        cy.get('[id="expyear"]').type('2028');
        cy.get('[id="cvv"]').type('202');
        cy.get('[type="submit"]').click();

        //pass details
        cy.get('.mb-4').eq(0).invoke('text').then((text) => {
            cy.log('Captured ID:', text.trim()); // Debug log
            cy.wrap(text.trim()).as('storedID'); // Store it as an alias
        });

        // Home page for validation
        cy.visit('http://localhost/busspasssystem/index.html');
        cy.viewport('macbook-16');

        // Click 'Manage Pass' and ensure it worked
        cy.get('[role="navigation"]').contains('Manage Pass').click({ force: true });

        // Retrieve the stored ID and type it
        cy.get('@storedID').then((storedID) => {
            cy.log('Stored ID to be entered:', storedID); // Debug log
            cy.get('[id="pass_id"]').eq(0).should('be.visible').type(storedID.trim(), { delay: 100 });
        });
        cy.get('[id="pass_id"]').eq(1).type(phoneNumber);
        cy.get('[type="submit"]').eq(0).click();

        // pass renew details
        cy.get('[type="date"]').type('2025-06-05');
        cy.get('[type="submit"]').eq(1).click();

        //payment details
        cy.get('[name="cardname"]').clear().type(name);
        cy.get('[id="ccnum"]').type('4556-5565-5544-5456');
        cy.get('[id="expmonth"]').type('08');
        cy.get('[id="expyear"]').type('2028');
        cy.get('[id="cvv"]').type('202');
        cy.get('[type="submit"]').click();

        // Home page for validation
        cy.visit('http://localhost/busspasssystem/index.html');
        cy.viewport('macbook-16');

        // Click 'Manage Pass' and ensure it worked
        cy.get('[role="navigation"]').contains('Manage Pass').click({ force: true });

        // Retrieve the stored ID and type it
        cy.get('@storedID').then((storedID) => {
            cy.log('Stored ID to be entered:', storedID); // Debug log
            cy.get('[id="pass_id"]').eq(0).should('be.visible').type(storedID.trim(), { delay: 100 });
        });
        cy.get('[id="pass_id"]').eq(1).type(phoneNumber);
        cy.get('[type="submit"]').eq(0).click();
    });
    it('Booking pass and suspend bus pass', () => {
        const nameGenerator = new Data();
        const name = nameGenerator.generate();
        const numberGenerator = new Data('number', 10);
        const phoneNumber = numberGenerator.generate();

        cy.visit('http://localhost/busspasssystem/index.html');
        // home page
        cy.contains('Book Now!').click();

        // customer details
        cy.get('[id="name"]').type(name);
        cy.get('[id="email"]').type(name + '@testing.com');
        cy.get('[id="number"]').type(phoneNumber);
        cy.get('[type="password"]').type(phoneNumber);
        cy.get('[id="date"]').type('2025-05-05');
        cy.get('[name="dest"]').select('Brampton');
        cy.get('[type="submit"]').click();

        //payment details
        cy.get('[name="cardname"]').clear().type(name);
        cy.get('[id="ccnum"]').type('4556-5565-5544-5456');
        cy.get('[id="expmonth"]').type('08');
        cy.get('[id="expyear"]').type('2028');
        cy.get('[id="cvv"]').type('202');
        cy.get('[type="submit"]').click();

        //pass details
        cy.get('.mb-4').eq(0).invoke('text').then((text) => {
            cy.log('Captured ID:', text.trim()); // Debug log
            cy.wrap(text.trim()).as('storedID'); // Store it as an alias
        });

        // Home page for validation
        cy.visit('http://localhost/busspasssystem/index.html');
        cy.viewport('macbook-16');

        // Click 'Manage Pass' and ensure it worked
        cy.get('[role="navigation"]').contains('Manage Pass').click({ force: true });

        // Retrieve the stored ID and type it
        cy.get('@storedID').then((storedID) => {
            cy.log('Stored ID to be entered:', storedID); // Debug log
            cy.get('[id="pass_id"]').eq(0).should('be.visible').type(storedID.trim(), { delay: 100 });
        });
        cy.get('[id="pass_id"]').eq(1).type(phoneNumber);
        cy.get('[type="submit"]').eq(0).click();

        //// pass suspend details
        cy.get('[type="submit"]').eq(2).click();

        //click home button
        cy.get('[type="submit"]').eq(0).click();
    });

});
