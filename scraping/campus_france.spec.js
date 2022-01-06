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
    /** Step 1 **/
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

    /** Step 2 **/
    it("My background and my diplomas", () => {
        const statutParcoursDiplomes = cy.get("#completudeCursuslabel")
                                            .invoke("text")

        let statutCV = "";
        cy.get("#scanLisibleCV")
            .parent(2)
            .siblings(2)
            .find("div")
            .then((elm) => {
               statutCV = elm.text()
            });

        let etudes = []
        cy.get("#tableauParcours")
            .find("tr")
            .each((elm) => {
                let annee = elm.get("td[headers='annees']")
                                    .child()
                                    .child()
                                    .text()

                let etatActiviteElm = elm.get("div[class='affichageEtatActivite']")

                let statutValidation = etatActiviteElm.child(0)
                let commentaireValidation= etatActiviteElm.child(1)

                let typeActivite = ""
                    elm.get("td[headers='etudes']")
                        .find('.italic')
                        .then((elm) => {
                            typeActivite = elm.text()
                        })

                let detailActivite = ""
                    elm.get("td[headers='etudes']")
                        .find('.tronque')
                        .first()
                        .then((elm) => {
                            detailActivite = elm.text()
                        })

                let detailActiviteCompl = ""
                elm.get("td[headers='etudes']")
                    .find('.tronque')
                    .child(1)
                    .then((elm) => {
                        detailActiviteCompl = elm.text()
                    })

                let localisation = ""

                let elmLocalisation = elm.get("td[headers='localisation']")
                                            .find('.tronque')

                let localisationLigneUne =   elmLocalisation.child(0)
                let localisationLigneDeux =   elmLocalisation.child(1)
                let localisationLigneTrois =   elmLocalisation.child(2)

            })


        })
    it('Language skills', () => {
        const statutLangues = cy.get("#completudeLangueslabel")
                                    .invoke("text")

        const testLangueFr = cy.get("#tableauTestLangueContainer")
                                    .child(0)
                                    .invoke("text")

        const statutNiveauFr = cy.get("#blocNiveauFr")
                            .find("div")
                            .get(1)
                            .child(0)
                            .invoke("text")

        const scolariteFrance = cy.get("#scolarite")
                                    .invoke("text")

        const etudeduFrancais = cy.get("#etude")
                                    .invoke("text")

        const sejourEnFrance = cy.get("#popinAjoutSej")
                                    .siblings(1)
                                    .child(3)
                                    .child()
                                    .invoke("text")


        const statutNiveauAnglais = cy.get("#affichageLabelEtatNiveauAnglais")
                                        .invoke("text")


        const scolaritenglais = cy.get("#scolariteAnglais")
                                    .invoke("text")

        const examenAnglais = cy.get("#examenAnglais")
                                    .invoke("text")

        const autreLangue = cy.get("#autreLangue")
                                .invoke("text")
    })

    it('Wallet diplomas', () => {
        cy.get("a[title='1.2 - Je remplis mon panier de formations']")
            .click()
            .wait(3)

        if (cy.get("#affichageLabelEtatPanier")
            .length === 1 ) {
            let statutPanierFormation = cy.get("#affichageLabelEtatPanier")
                .invoke("text")
        } else {
            let statutPanierFormation = null
        }

        if (cy.get("div.errorBox_panier")
            .length === 0) {
            let panierFormation = null
        } else {
            /** @todo list formations **/
        }
    })
})