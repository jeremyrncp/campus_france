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
    it('Login & identity picture', () => {

        const etatsInfosPerso = cy.get("#etatInfosPerso")
            .invoke("text")

        cy.find("a[title='1.1 - Je saisis mes informations personnelles']")
            .click()


        const identifiantsetPhotos = cy.get("#affichageLabelEtatIdentifiantsEtFoto")
            .invoke("text")

        const monEmail = cy.get("#uLogin")
                            .invoke("text")

        const monIdentifiantEtudesenFrance = cy.get("#uNumCompte")
                                                .invoke("text")

        const photoIdentite = cy.get(".photoIdentite")
                                    .invoke("text")

    })

    it('Identity', () => {
        const etatIdentity = cy.get("#affichageLabelEtatEtatCivil")
            .invoke("text")

        /** liste justificatifs **/
        cy.get("#justificatifEtatCivilAction")
            .click()
            .wait(32)

        let justificatifsIdentite = []
        cy.get("#tableauJustificatif")
            .find("td[header='libelle']")
            .then( (element, justificatifsIdentite) => {
                justificatifsIdentite.push(element.text())
            })

        cy.get("#cancelButton")
            .click()
            .wait(2)


        let etatCivil = []
        cy.get("#fieldsetEtatCivil")
            .find("span[class='label']")
            .then((elm, etatCivil) => {

                let label = elm
                            .text()

                let valeur = elm
                            .parent()
                            .siblings()
                            .text()

                etatCivil.label = valeur
            })
    })

    it('Contact details', () => {
        const etatCoordonnees = cy.get("#affichageLabelEtatCoordonnees")
            .invoke("text")

        let contactDetails = []
        cy.get("#fieldsetCoordonnees")
            .find("span[class='label']")
            .then((elm, contactDetails) => {

                let label = elm
                    .text()

                let valeur = elm
                    .parent()
                    .siblings()

                if (valeur.length === 0) {
                    valeur = null
                } else {
                    valeur = valeur.text()
                }

                contactDetails.label = valeur
            })
    })

    it('Particular statut', () => {
       const statutStatutPaticulier =  cy.get("#affichageLabelEtatStatutParticulier")
            .invoke("text")

        let statutParticulier = []
        cy.get("#fieldsetStatutParticulier")
            .find("span[class='label']")
            .then((elm, contactDetails) => {

                let label = elm
                    .text()

                let valeur = elm
                    .parent()
                    .siblings()

                if (valeur.length === 0) {
                    valeur = null
                } else {
                    valeur = valeur.text()
                }

                statutParticulier.label = valeur
            })
    })
})