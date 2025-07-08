document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contactForm");
    const confirmation = document.getElementById("confirmation");

    form.addEventListener("submit", function (event) {
        event.preventDefault();
        let isValid = true;

        // Reset messages
        document.getElementById("nomError").style.display = "none";
        document.getElementById("emailError").style.display = "none";
        document.getElementById("messageError").style.display = "none";
        document.getElementById("consentError").style.display = "none";

        const nom = document.getElementById("nom").value.trim();
        const email = document.getElementById("email").value.trim();
        const message = document.getElementById("message").value.trim();
        const consent = document.getElementById("consent").checked;

        const emailRegex = /^[\\w.-]+@[\\w.-]+\\.[a-zA-Z]{2,}$/;

        if (nom === "") {
            document.getElementById("nomError").textContent = "Merci de remplir le nom.";
            document.getElementById("nomError").style.display = "inline";
            isValid = false;
        }

        if (!emailRegex.test(email)) {
            document.getElementById("emailError").textContent = "Adresse email invalide.";
            document.getElementById("emailError").style.display = "inline";
            isValid = false;
        }

        if (message.length < 20) {
            document.getElementById("messageError").textContent = "Le message doit faire au moins 20 caractères.";
            document.getElementById("messageError").style.display = "inline";
            isValid = false;
        }

        if (!consent) {
            document.getElementById("consentError").textContent = "Merci d'accepter la politique de confidentialité.";
            document.getElementById("consentError").style.display = "inline";
            isValid = false;
        }

        if (!isValid) return;

                          const formData = new FormData(form);

        fetch("contact.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            confirmation.style.color = "green";
            confirmation.textContent = data;
            confirmation.style.display = "block";
            form.reset();
        })
        .catch(error => {
            confirmation.style.color = "red";
            confirmation.textContent = "Erreur lors de l’envoi du message. Veuillez réessayer.";
            confirmation.style.display = "block";
        });
    });
});
