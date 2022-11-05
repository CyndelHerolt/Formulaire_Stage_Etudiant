
import {Controller} from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ["output"]
    static values = {url: String}

    async connect() {

        //On créé une variable nommée html qui va récupérer l'url dans la vue index.html.twig
        const html = await fetch(this.urlValue)
        //On envoie le contenu de la page dont l'url a été récupéré (modal_vous.html.twig) dans le span "data-formulaire-target"
        this.outputTarget.innerHTML = await html.text()
        console.log(html)
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {})
        myModal.show()
    }
}