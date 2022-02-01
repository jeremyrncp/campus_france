import scrapingDto from './scrapingDto'

describe('Scrap informations', () => {
    /** Step 1 **/
    /**
    it('Login & identity picture', () => {
        cy.login('Fifassigankoue@gmail.com', 'Aubierge2019!')

        cy.get("#etatInfosPerso")
            .invoke("text")
            .then((text) => {
                scrapingDto.etatsInfosPerso = text
            })

        cy.get("a[title='1.1 - Je saisis mes informations personnelles']")
            .click()
            .wait(5)
            .get("#completudeSituationPersonnelle")
            .click()
            .wait(3)


        scrapingDto.identifiantsetPhotos = ""
                cy.get("#affichageLabelEtatIdentifiantsEtFoto")
                    .invoke("text")
                    .then((text) => {
                        scrapingDto.identifiantsetPhotos = text
                    })

            cy.get("#uLogin")
                .invoke("text")
                .then((text) => {
                    scrapingDto.monEmail = text
                })

                cy.get("#uNumCompte")
                    .invoke("text")
                    .then((text) => {
                        scrapingDto.monIdentifiantEtudesenFrance = text
                    })

            cy.get(".photoIdentite")
                .invoke("text")
                .then((text) => {
                    scrapingDto.photoIdentite = text
                })


    })
    it('Identity', () => {
        cy.get("#affichageLabelEtatEtatCivil")
            .invoke("text")
            .then((text) => {
                scrapingDto.etatIdentity = text
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

        cy.get("#fieldsetEtatCivil")
            .find("span.label")
            .each((elm) => {
                let label = elm
                    .text()
                    .trim()

                scrapingDto.etatCivil.push(label + "#" + elm.parent().siblings(".champConsult").text().trim())
            })
    })**/
/**
    it('Contact details', () => {
        let elmAffichageEtatCoordonnees = cy.get("#affichageLabelEtatCoordonnees")

        if (elmAffichageEtatCoordonnees.length === 0) {
            scrapingDto.etatCoordonnees = null
        } else {
            scrapingDto.etatCoordonnees = ""

        const elmLabelEtatCoord = cy.get("#affichageLabelEtatCoordonnees")

            if (elmLabelEtatCoord.length === 0) {
                scrapingDto.etatCoordonnees = null
            } else {
                scrapingDto.etatCoordonnees = ""
                elmLabelEtatCoord.invoke("text")
                    .then((text) => {
                        scrapingDto.etatCoordonnees = text
                    })
            }
        }

        cy.get("#fieldsetCoordonnees")
            .find("span.label")
            .each((elm) => {

                let label = elm
                    .text()
                    .trim()

                let valeur = elm
                    .parent()
                    .siblings()

                if (valeur.length === 0) {
                    valeur = null
                } else {
                    valeur = valeur.text().trim()
                }

                scrapingDto.contactDetails.push(label.trim() + "#" + valeur)
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

                statutParticulier.push(label + "#" + valeur)
            })
    })
    **/

    /** Step 2 **/
    it("My background and my diplomas", () => {
        cy.login('Fifassigankoue@gmail.com', 'Aubierge2019!')

        cy.get("#completudeCursuslabel")
            .click()
            .wait(6)

        const statutParcoursDiplomes = cy.get("#completudeCursuslabel")
                                            .invoke("text")

        cy.get("#scanLisibleCV")
            .parent(2)
            .siblings(2)
            .find("div")
            .then((elm) => {
                scrapingDto.statutCV = elm.text()
            });

        cy.get("#tableauParcours")
            .find("tr")
            .each(($elm) => {
                scrapingDto.annee = $elm.find("td[headers='annee']")
                                    .children()
                                    .text()
                                    .trim()

                let etatActiviteElm = $elm.find("div[class='affichageEtatActivite']")

                scrapingDto.statutValidation = etatActiviteElm.children(0).text()
                scrapingDto.commentaireValidation= etatActiviteElm.children(1).text()

                    console.log($elm.find("td[headers='etudes']")
                        .find('.italic')
                        .text())

                    $elm.get("td[headers='etudes']")
                        .text()
                        .trim()
                        .then((elm) => {
                            scrapingDto.detailActivite = elm.text()
                        })

                    $elm.get("td[headers='etudes']")
                        .find('.tronque')
                        .children(1)
                        .then((elm) => {
                            scrapingDto.detailActiviteCompl = elm.text()
                        })

                let elmLocalisation = $elm.get("td[headers='localisation']")
                                            .find('.tronque')

                scrapingDto.localisationLigneUne = elmLocalisation.child(0)
                scrapingDto.localisationLigneDeux = elmLocalisation.child(1)
                scrapingDto.localisationLigneTrois = elmLocalisation.child(2)
            })
        })
    it('Language skills', () => {
        cy.login('Fifassigankoue@gmail.com', 'Aubierge2019!')

        scrapingDto.statutLangues = cy.get("#completudeLangueslabel")
                                    .invoke("text")

        if (cy.get("#tableauTestLangueContainer").length === 0) {
            scrapingDto.testLangueFr = null
        } else {
            scrapingDto.testLangueFr = cy.get("#tableauTestLangueContainer")
                .children()
                .invoke("text")
        }

        if (cy.get("#blocNiveauFr").length === 0) {
            scrapingDto.statutNiveauFr = null
        } else {
            scrapingDto.statutNiveauFr = cy.get("#blocNiveauFr")
                .find("div")
                .get(1)
                .children(0)
                .invoke("text")
        }

        scrapingDto.scolariteFrance = cy.get("#scolarite")
                                    .invoke("text")

        scrapingDto.etudeduFrancais = cy.get("#etude")
                                    .invoke("text")

        scrapingDto.sejourEnFrance = cy.get("#popinAjoutSej")
                                    .siblings(1)
                                    .children(3)
                                    .children()
                                    .invoke("text")


        scrapingDto.statutNiveauAnglais = cy.get("#affichageLabelEtatNiveauAnglais")
                                        .invoke("text")


        scrapingDto.scolaritenglais = cy.get("#scolariteAnglais")
                                    .invoke("text")

        scrapingDto.examenAnglais = cy.get("#examenAnglais")
                                    .invoke("text")

        scrapingDto.autreLangue = cy.get("#autreLangue")
                                .invoke("text")
    })

    it('Wallet diplomas', () => {
        cy.login('Fifassigankoue@gmail.com', 'Aubierge2019!')

        cy.get("a[title='1.2 - Je remplis mon panier de formations']")
            .click()
            .wait(2)

        if (cy.get("#affichageLabelEtatPanier")
            .length === 1 ) {
            scrapingDto.statutPanierFormation = cy.get("#affichageLabelEtatPanier")
                .invoke("text")
        } else {
            scrapingDto.statutPanierFormation = null
        }

        if (cy.get("div.errorBox_panier")
            .invoke("text") === "") {
            scrapingDto.panierFormation = null
        } else {
            cy.get(".table")
                .each( (elm) => {
                    let elmTitreTableau = elm.get(".titreTableau")

                    if (elmTitreTableau. String.note) {
                        let titreTypeFormation = elmTitreTableau
                            .children(0)
                            .text()

                        let etatTypeFormation = elmTitreTableau
                            .children(1)
                            .children()
                            .text()
                    } else {
                        let titreTypeFormation = null
                        let etatTypeFormation = null
                    }

                    let listeFormations = [];
                    cy.get("tbody > tr")
                        .each( (elm) => {
                            let formation = elm.get("td[headers='formation']")
                                                .children()
                                                .children()
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

                    scrapingDto.panierFormation.push(contentFormation)
                })
        }
    })
    it('Folder Campus France', () => {
        cy.login('Fifassigankoue@gmail.com', 'Aubierge2019!')

        cy.get("a[title=\"1.3 - Je soumets mon dossier à l'espace Campus France\"]")
            .click()
            .wait(3)

        if (cy.get(".infoBox_soumettreDossier") === undefined) {
            let listeSoumissionDossier = null
        } else {
            cy.get(".infoBox_soumettreDossier")
                .find("li")
                .each((elm) => {
                    scrapingDto.listeSoumissionDossier.push(elm.text())
                })
        }


        cy.get(".groupeChamps")
            .each((elm) => {
                cy.get(".corpsFieldSet")
                    .each((elm) => {
                        let name = elm.child(1)
                        let statut = elm.child(2)

                        scrapingDto.statutDossier.push({
                            name: name,
                            statut: statut
                        })
                    })
            })
    })

    it('Send API Request', () => {
        console.log(scrapingDto)
        cy.request('http://127.0.0.1:8000/api/scraping', scrapingDto)
    })
})
