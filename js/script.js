document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contactForm");
    const confirmation = document.getElementById("confirmation");

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        let isValid = true;

        // reset messages
        document.getElementById("nomError").style.display = "none";
        document.getElementById("emailError").style.display = "none";
        document.getElementById("messageError").style.display = "none";
        document.getElementById("consentError").style.display = "none";

        // vérification du nom
        const nom = document.getElementById("nom").value.trim();
        if (nom === "") {
            document.getElementById("nomError").textContent = "Merci de remplir le nom.";
            document.getElementById("nomError").style.display = "inline";
            isValid = false;
        }

        // vérification de l’email
        const email = document.getElementById("email").value.trim();
        const emailRegex = /^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,}$/;
        if (!emailRegex.test(email)) {
            document.getElementById("emailError").textContent = "Adresse email invalide.";
            document.getElementById("emailError").style.display = "inline";
            isValid = false;
        }

        // vérification du message
        const message = document.getElementById("message").value.trim();
        if (message.length < 20) {
            document.getElementById("messageError").textContent = "Le message doit faire au moins 20 caractères.";
            document.getElementById("messageError").style.display = "inline";
            isValid = false;
        }

        // vérification consentement RGPD
        const consent = document.getElementById("consent").checked;
        if (!consent) {
            document.getElementById("consentError").textContent = "Merci d'accepter la politique de confidentialité.";
            document.getElementById("consentError").style.display = "inline";
            isValid = false;
        }

        if (!isValid) return;

                          // simule un envoi réussi
                          confirmation.style.display = "block";
        form.reset();
    });
});
// === module de filtre dynamique des projets (accessible) ===
// script qui permet de filtrer les projets (HTML, JS, WordPress, PHP...)
// et assure la conformité accessibilité (aria-label, aria-pressed, navigation clavier).

document.addEventListener("DOMContentLoaded", function () {
    // récupère le conteneur du module filtre
    const filtreProjets = document.getElementById("filtreProjets");
    if (!filtreProjets) return; // Sécurité si l'élément n'existe pas

    // ajoute un aria-label pour les lecteurs d'écran (accessibilité)
    filtreProjets.setAttribute("aria-label", "Filtrer les projets par technologie");

    // sélectionne tous les boutons du filtre
    const boutons = filtreProjets.querySelectorAll("button");
    // sélectionne tous les projets
    const projets = document.querySelectorAll(".projet");

    boutons.forEach(btn => {
        // initialise aria-pressed en cohérence avec la classe "actif"
        btn.setAttribute("aria-pressed", btn.classList.contains("actif") ? "true" : "false");

        btn.addEventListener("click", function () {
            // met à jour l'état visuel et accessibilité de tous les boutons
            boutons.forEach(b => {
                b.classList.remove("actif");
                b.setAttribute("aria-pressed", "false");
            });
            this.classList.add("actif");
            this.setAttribute("aria-pressed", "true");

            // récupère le filtre sélectionné
            const filtre = this.getAttribute("data-filtre");
            // affiche/masque les projets selon leur classe
            projets.forEach(proj => {
                if (filtre === "tous" || proj.classList.contains(filtre)) {
                    proj.style.display = "block";
                } else {
                    proj.style.display = "none";
                }
            });
        });
    });
});
