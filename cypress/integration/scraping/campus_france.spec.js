describe('Scrap informations', () => {

    /** Step 1 **/
    it('Login & identity picture', () => {
        cy.login('Fifassigankoue@gmail.com', 'Aubierge2019!')

        let etatsInfosPerso = ""

        cy.get("#etatInfosPerso")
            .invoke("text")
            .then((text) => {
                etatsInfosPerso = text
            })

        cy.get("a[title='1.1 - Je saisis mes informations personnelles']")
            .click()
            .wait(5)
            .get("#completudeSituationPersonnelle")
            .click()
            .wait(3)


        let identifiantsetPhotos = ""
                cy.get("#affichageLabelEtatIdentifiantsEtFoto")
                    .invoke("text")
                    .then((text) => {
                        identifiantsetPhotos = text
                    })

        let monEmail = ""
            cy.get("#uLogin")
                .invoke("text")
                .then((text) => {
                    monEmail = text
                })

        let monIdentifiantEtudesenFrance = ""
                cy.get("#uNumCompte")
                    .invoke("text")
                    .then((text) => {
                        monIdentifiantEtudesenFrance = text
                    })

        let photoIdentite = ""
            cy.get(".photoIdentite")
                .invoke("text")
                .then((text) => {
                    photoIdentite = text
                })


    })
    it('Identity', () => {
        let etatIdentity = ""

        cy.get("#affichageLabelEtatEtatCivil")
            .invoke("text")
            .then((text) => {
                etatIdentity = text
            })


        /** liste justificatifs
        cy.get("#justificatifEtatCivilAction")
            .click()
            .wait(15)

        let justificatifsIdentite = []
        cy.get("#tableauJustificatif")
            .find("td[header='libelle']")
            .then( (element, justificatifsIdentite) => {
                justificatifsIdentite.push(element.text())
            })

        cy.get("#cancelButton")
            .click()
            .wait(2)
        **/

        let etatCivil = []
        cy.get("#fieldsetEtatCivil")
            .find("span.label")
            .then((elm) => {

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
        let elmAffichageEtatCoordonnees = cy.get("#affichageLabelEtatCoordonnees")

        if (elmAffichageEtatCoordonnees.length === 0) {
            let etatCoordonnees = null
        } else {
            let etatCoordonnees = ""

        const elmLabelEtatCoord = cy.get("#affichageLabelEtatCoordonnees")

            if (elmLabelEtatCoord.length === 0) {
                let etatCoordonnees = null
            } else {
                let etatCoordonnees = ""
                elmLabelEtatCoord.invoke("text")
                    .then((text) => {
                        etatCoordonnees = text
                    })
            }
        }

        let contactDetails = []
        cy.get("#fieldsetCoordonnees")
            .find("span.label")
            .then((elm) => {

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
            .find("span.label")
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
        cy.get("#completudeCursuslabel")
            .click()
            .wait(3)

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
            .each(($elm) => {
                let annee = $elm.find("td[headers='annee']")
                                    .first()
                                    .child()
                                    .text()

                let etatActiviteElm = $elm.find("div[class='affichageEtatActivite']")

                let statutValidation = etatActiviteElm.child(0)
                let commentaireValidation= etatActiviteElm.child(1)

                let typeActivite = ""
                    $elm.get("td[headers='etudes']")
                        .find('.italic')
                        .then((elm) => {
                            typeActivite = elm.text()
                        })

                let detailActivite = ""
                    $elm.get("td[headers='etudes']")
                        .find('.tronque')
                        .first()
                        .then((elm) => {
                            detailActivite = elm.text()
                        })

                let detailActiviteCompl = ""
                    $elm.get("td[headers='etudes']")
                        .find('.tronque')
                        .child(1)
                        .then((elm) => {
                            detailActiviteCompl = elm.text()
                        })

                let localisation = ""

                let elmLocalisation = $elm.get("td[headers='localisation']")
                                            .find('.tronque')

                let localisationLigneUne = elmLocalisation.child(0)
                let localisationLigneDeux = elmLocalisation.child(1)
                let localisationLigneTrois = elmLocalisation.child(2)
            })
        })
    it('Language skills', () => {
        cy.login('Fifassigankoue@gmail.com', 'Aubierge2019!')

        const statutLangues = cy.get("#completudeLangueslabel")
                                    .invoke("text")

        const testLangueFr = cy.get("#tableauTestLangueContainer")
                                    .child()
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
        cy.login('Fifassigankoue@gmail.com', 'Aubierge2019!')

        cy.get("a[title='1.2 - Je remplis mon panier de formations']")
            .click()
            .wait(2)

        if (cy.get("#affichageLabelEtatPanier")
            .length === 1 ) {
            let statutPanierFormation = cy.get("#affichageLabelEtatPanier")
                .invoke("text")
        } else {
            let statutPanierFormation = null
        }

        if (cy.get("div.errorBox_panier")
            .invoke("text") === "") {
            let panierFormation = null
        } else {
            let panierFormation = []

            cy.get(".table")
                .each( (elm) => {
                    let elmTitreTableau = elm.get(".titreTableau")

                    if (elmTitreTableau.length === 1) {
                        let titreTypeFormation = elmTitreTableau
                            .child(0)
                            .text()

                        let etatTypeFormation = elmTitreTableau
                            .child(1)
                            .child()
                            .text()
                    } else {
                        let titreTypeFormation = null
                        let etatTypeFormation = null
                    }

                    let listeFormations = [];
                    cy.get("tbody > tr")
                        .each( (elm) => {
                            let formation = elm.get("td[headers='formation']")
                                                .child()
                                                .child()
                                                .text()

                            let annee = elm.get("td[headers='annee']")
                                            .find("label")
                                            .first()
                                            .text()

                            let etablissement = elm.get("td[headers='etablissement']")
                                                    .find("label")
                                                    .first()
                                                    .text()

                            let ville = elm.get("td[headers='ville']")
                                .find("label")
                                .first()
                                .text()


                            listeFormations.ville = ville
                            listeFormations.etablissement = etablissement
                            listeFormations.annee = annee
                            listeFormations.formation = formation
                        })


                    let contentFormation = {
                        titre: titreTypeFormation,
                        etat: etatTypeFormation,
                        liste: listeFormations
                    }

                    panierFormation.push(contentFormation)
                })
        }
    })
    it('Folder Campus France', () => {
        cy.login('Fifassigankoue@gmail.com', 'Aubierge2019!')

        cy.get("a[title='1.3 - Je soumets mon dossier à l'espace Campus France']")
            .click()
            .wait(3)

        let listeSoumissionDossier = []
        cy.get(".infoBox_soumettreDossier")
            .find("li")
            .each((elm) => {
                listeSoumissionDossier.push(elm.text())
            })


        let statutDossier = []
        cy.get(".groupeChamps")
            .each((elm) => {
                cy.get(".corpsFieldSet")
                    .each((elm) => {
                        let name = elm.child(1)
                        let statut = elm.child(2)

                        statutDossier.push({
                            name: name,
                            statut: statut
                        })
                    })
            })
    })
})
