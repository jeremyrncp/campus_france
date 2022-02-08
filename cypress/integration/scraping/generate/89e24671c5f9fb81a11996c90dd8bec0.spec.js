const scrapingDto = {
    "statutStatutParticulier": "",
    "statutParticulier": [],
    "etatInfosPerso": "",
    "etatIdentity": "",
    "identifiantsetPhotos": "",
    "monEmail": "",
    "monIdentifiantEtudesenFrance": "",
    "photoIdentite": "",
    "etatCoordonnees": "",
    "contactDetails": [],
    "etatCivil": [],
    "statutParcoursDiplomes": "Complété",
    "statutCV": "Ok",
    "etudes": [],
    "statutLangues": "",
    "testLangueFr": "",
    "statutNiveauFr": "",
    "scolariteFrance": "",
    "etudeduFrancais": "",
    "sejourEnFrance": "",
    "statutNiveauAnglais": "",
    "scolariteAnglais": "",
    "examenAnglais": "",
    "autreLangue": "",
    "statutPanierFormation": "",
    "panierFormation": [],
    "listeSoumissionDossier": [],
    "statutDossier": []
}

describe('Scrap informations', () => {
    it('Login & identity picture', () => {
        cy.login('Fifassigankoue@gmail.com', 'Aubierge2019!')

        cy.get("#etatInfosPerso")
            .invoke("text")
            .then((text) => {
                scrapingDto.etatInfosPerso = text
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
         **/


        const listLabel = ['Nom de famille', 'Prénom', 'Autre nom (patronyme)', 'Sexe', 'Date de naissance', "Type de pièce d'identité",
            "Pays et territoires de naissance", "Numéro de pièce d'identité", "Lieu de naissance", "Pays de délivrance de la pièce d'identité",
            "Pays et territoires de nationalité", "Date limite de validité", "Je suis en situation de handicap"];

        let key = 0;
        cy.get("#fieldsetEtatCivil")
            .find("div.champConsult")
            .each((elm) => {

                let valeur = elm
                    .text()
                    .trim()

                scrapingDto.etatCivil.push({
                    label: listLabel[key],
                    value: valeur
                })

                key ++;
            })
    })
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
        cy.get("#affichageLabelEtatStatutParticulier")
            .invoke("text")
            .then((text) => {
                scrapingDto.statutStatutParticulier = text
            })

        let statutParticulier = []
        cy.get("#fieldsetStatutParticulier")
            .find("span.label")
            .each((elm, contactDetails) => {

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

                scrapingDto.statutParticulier.push(label + "#" + valeur)
            })
    })
    it("My background and my diplomas", () => {
        cy.login('Fifassigankoue@gmail.com', 'Aubierge2019!')

        cy.get("a[title='1.1 - Je saisis mes informations personnelles']")
            .click()
            .wait(5)
            .get("#completudeCursuslabel")
            .click()
            .wait(6)

        cy.get("#completudeCursuslabel")
            .invoke("text")
            .then((text) => {
                scrapingDto.statutParcoursDiplomes = text
            })

        cy.get("#scanLisibleCV")
            .parent(2)
            .siblings(2)
            .find("div")
            .then((elm) => {
                let tempoCV = elm.text().trim().split('\n')
                scrapingDto.statutCV = tempoCV[0]
            });

        let tempoObj = {}

        cy.get("#tableauParcours")
            .find("tr")
            .each(($elm) => {
                tempoObj.annee = $elm.find("td[headers='annee']")
                    .children()
                    .text()
                    .trim()
                    .substr(0,4)

                let etatActiviteElm = $elm.find("div[class='affichageEtatActivite']")

                tempoObj.statutValidation = etatActiviteElm.children(0).text()
                tempoObj.commentaireValidation = etatActiviteElm.children(1).text()

                tempoObj.detailActivite = $elm.find("td[headers='etudes']")
                    .first()
                    .text()

                tempoObj.detailActiviteCompl = $elm.find("td[headers='etudes']")
                    .find('.tronque')
                    .children(1)
                    .text()


                let elmLocalisation = $elm.find("td[headers='localisation']")
                    .first()
                    .text()

                scrapingDto.etudes.push({
                    annee: tempoObj.annee.trim().replace(/(\n)+/g, ""),
                    statutValidation: tempoObj.statutValidation.trim().replace(/(\n)+/g, ""),
                    commentaireValidation: tempoObj.commentaireValidation.trim().replace(/(\n)+/g, ""),
                    detailActivite: tempoObj.detailActivite.trim().replace(/(\n)+/g, ""),
                    detailActiviteCompl: tempoObj.detailActiviteCompl.trim().replace(/(\n)+/g, ""),
                    localisation: elmLocalisation.trim().replace(/(\n)+/g, "")
                })
            })
    })
    it('Language skills', () => {
        cy.login('Fifassigankoue@gmail.com', 'Aubierge2019!')

        cy.get("a[title='1.1 - Je saisis mes informations personnelles']")
            .click()
            .wait(5)
            .get("#completudeLangueslabel")
            .click()
            .wait(6)

        cy.get("#completudeLangueslabel")
            .invoke("text")
            .then((text) => {
                scrapingDto.statutLangues = text.trim()
            })

        cy.get("#tableauTestLangueContainer")
            .should('exist')
            .children()
            .invoke("text")
            .then((text) => {
                scrapingDto.testLangueFr = text.trim()
            })


        /**
         cy.get("#blocNiveauFr")
         .find("div")
         .siblings()
         .children()
         .invoke("text")
         .then((text) => {
                scrapingDto.statutNiveauFr = text.trim()
            })
         **/

        cy.get("#scolarite")
            .invoke("text")
            .then((text) => {
                scrapingDto.scolariteFrance = text.trim()
            })

        cy.get("#etude")
            .invoke("text")
            .then((text) => {
                scrapingDto.etudeduFrancais = text.trim()
            })

        cy.get("#popinAjoutSej")
            .siblings("fieldset")
            .next()
            .next()
            .find("div.labelInfos")
            .invoke("text")
            .then((text) => {
                scrapingDto.sejourEnFrance = text.trim()
            })


        cy.get("#affichageLabelEtatNiveauAnglais")
            .invoke("text")
            .then((text) => {
                scrapingDto.statutNiveauAnglais = text.trim()
            })


        if (cy.get("#scolariteAnglais").should('not.exist')) {
            scrapingDto.scolaritAnglais = null
        } else {
            cy.get("#scolariteAnglais")
                .invoke("text")
                .then((text) => {
                    scrapingDto.scolaritAnglais = text.trim()
                })
        }

        if (cy.get("#examenAnglais").should('not.exist')) {
            scrapingDto.examenAnglais = null
        } else {
            cy.get("#examenAnglais")
                .invoke("text")
                .then((text) => {
                    scrapingDto.examenAnglais = text.trim()
                })
        }

        if (cy.get("#autreLangue").should('not.exist')) {
            scrapingDto.autreLangue = null
        } else {
            cy.get("#autreLangue")
                .invoke("text")
                .then((text) => {
                    scrapingDto.autreLangue = text.trim()
                })
        }
    })
    it('Wallet diplomas', () => {
        cy.login('Fifassigankoue@gmail.com', 'Aubierge2019!')

        cy.get("a[title='1.2 - Je remplis mon panier de formations']")
            .click()
            .wait(2)

        if (cy.get("#affichageLabelEtatPanier")
            .should('exist')) {
            cy.get("#affichageLabelEtatPanier")
                .invoke("text")
                .then((text) => {
                    scrapingDto.statutPanierFormation = text
                })
        } else {
            scrapingDto.statutPanierFormation = null
        }

        let listeFormations = []
        if (cy.get("div.errorBox_panier").should('be.empty')) {
            cy.get("#tableauDemandes")
                .get("tbody")
                .find('tr')
                .each((elm) => {
                    let formation = elm.find("td[headers='formation']")
                        .children()
                        .children()
                        .text()
                        .trim()

                    let annee = elm.find("td[headers='annee']")
                        .find("label")
                        .first()
                        .text()
                        .trim()

                    let etablissement = elm.find("td[headers='etablissement']")
                        .find("label")
                        .first()
                        .text()
                        .trim()

                    let ville = elm.find("td[headers='ville']")
                        .find("label")
                        .first()
                        .text()
                        .trim()

                    scrapingDto.panierFormation.push({
                        ville: ville,
                        etablissement: etablissement,
                        annee: annee,
                        formation: formation
                    })
                })
        } else {
            scrapingDto.panierFormation = null
        }
    })
    it('Candidate folder Campus France', () => {
        cy.login('Fifassigankoue@gmail.com', 'Aubierge2019!')

        cy.get("a[title=\"1.3 - Je soumets mon dossier à l'espace Campus France\"]")
            .click()
            .wait(10)


        cy.get(".infoBox_soumettreDossier").invoke("text").then( (text) => {
            if (text !== "") {
                cy.get(".infoBox_soumettreDossier")
                    .find("li")
                    .each((elm) => {
                        scrapingDto.listeSoumissionDossier.push(elm.text().trim())
                    })
            }
        });

        cy.get("#afficheFormulaire")
            .find("fieldset")
            .find(".corpsFieldSet")
            .each((element) => {
                if (element.find("div").get(2) !== undefined) {
                    scrapingDto.statutDossier.push({
                        name: element.find("div").get(1).innerText,
                        statut: element.find("div").get(2).innerText
                    })
                }
        })
    })
    it('Send API Request', () => {
        cy.request('POST', 'https://campus-france-9addo.ondigitalocean.app/api/scraping?usernameEtudes=Fifassigankoue@gmail.com', scrapingDto)
    })
})
