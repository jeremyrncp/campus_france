describe('Login', () => {
    it('Login to Etudes en France', () => {
        let login = ''
        let password = ''

        cy.visit('https://pastel.diplomatie.gouv.fr/etudesenfrance/dyn/public/authentification/login.html')

        cy.get('#username-ariaLabel')
            .siblings()
            .type(login)

        cy.get('#username-ariaLabel')
            .parent()
            .find("input[type='password']")
            .type(password)

        cy.get("input[class='submit']")
            .click()
            .wait(5)
    })
})

describe('Scrap informations', () => {
    it('Personal data', () => {

    })
})