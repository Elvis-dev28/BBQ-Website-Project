<?php
$title = "Service Center";
include_once "header.php";
?>


<div class="container">
    <div class="row">
        <!-- links column -->
        <div class="col-md-3 mb-3">
            <div class="service-menu">
                <h4 class="fw-bold">Service-Center</h4>
                <ul class="list-unstyled">
                    <li><a href="#service-overview"" data-target="service-overview" class="text-dark">Serviceübersicht</a></li>
                    <li><a href="#shipping-delivery" data-target="shipping-delivery" class="text-dark">Versand & Lieferung</a></li>
                    <li><a href="#returns-refunds" data-target="returns-refunds" class="text-dark">Rücksendung & Rückerstattung</a></li>
                    <li><a href="#my-account" data-target="my-account" class="text-dark">Mein Kundenkonto</a></li>
                    <li><a href="#payment-options" data-target="payment-options" class="text-dark">Zahlungsmöglichkeiten</a></li>
                    <li><a href="#loyalty-program"" data-target="loyalty-program" class="text-dark">Treueprogramm & Gutscheine</a></li>
                </ul>
            </div>
        </div>

        <!-- rechts column -->
        <div class="col-md-9">
            <div id="service-overview" class="content-section">
                <h2>Serviceübersicht</h2>
                <p>Willkommen im Servicebereich von BBQ Apotheke! Hier finden Sie alle wichtigen Informationen und Dienstleistungen, die wir für Sie bereitstellen. Unser Ziel ist es, Ihnen das bestmögliche Einkaufserlebnis zu bieten und sicherzustellen, dass Sie alle benötigten Informationen leicht finden können.</p>
                <p>Unsere Dienstleistungen im Überblick:</p>
                <ul>
                    <li>Versand & Lieferung: Erfahren Sie mehr über unsere schnellen und zuverlässigen Versandoptionen, sowie die Lieferzeiten für Ihre Bestellungen.</li>
                    <li>Rücksendung & Rückerstattung: Lesen Sie alles über unsere unkomplizierte Rückgabe- und Rückerstattungsrichtlinie. Ihre Zufriedenheit ist unser oberstes Ziel.</li>
                    <li>Mein Kundenkonto: Verwalten Sie Ihre Bestellungen, aktualisieren Sie Ihre persönlichen Daten und verfolgen Sie Ihre Bestellungen in Echtzeit.</li>
                    <li>Zahlungsmöglichkeiten: Wir bieten Ihnen eine Vielzahl sicherer Zahlungsmethoden, um Ihren Einkauf so bequem wie möglich zu gestalten.</li>
                    <li>Treueprogramm & Gutscheine: Nutzen Sie unsere exklusiven Angebote und sparen Sie bei jedem Einkauf. Werden Sie Teil unseres Treueprogramms und profitieren Sie von einzigartigen Rabatten.</li>
                </ul>
                <p>Bei Fragen oder Anliegen steht Ihnen unser Kundenservice jederzeit zur Verfügung. Zögern Sie nicht, uns zu kontaktieren, wenn Sie Unterstützung benötigen!</p>
            </div>

            <div id="shipping-delivery" class="content-section" style="display: none;">
                <h2>Versand & Lieferung</h2>
                <p>DPD Standardversand nach Deutschland (ohne Inseln)</p>
                <p>Lieferbare Artikel sind in der Regel innerhalb von 24 bis 48 Stunden bei Ihnen. Die Versandkosten betragen 4,90 EUR zzgl. Mehrwertsteuer, ab 100,00 EUR Netto-Bestellwert ist der Versand für Sie kostenlos. Über anfallende Insel-Zuschläge werden Sie separat informiert.</p>
                <p>DPD Expressversand nach Deutschland: Der Zuschlag für eine Expresslieferung bis 12:00 Uhr am nächsten Werktag beträgt 19,50 EUR zzgl. Mehrwertsteuer, für eine Lieferung bis 8:30 Uhr 45,00 EUR zzgl. Mehrwertsteuer.</p>
                <p>Praxisdienst Collect: Praxisdienst Collect ist für Kunden, die sich in einem Umkreis von 100 km rund um unser Logistik-Zentrum befinden. Diese können ihre Ware auf Wunsch aus unserer Abholstation Praxisdienst Collect abholen.</p>
            </div>

            <div id="returns-refunds" class="content-section" style="display: none;">
                <h3>Rücksendung & Rückerstattung</h3>
                <p>Bestellungen von Praxisdienst können Sie innerhalb von 14 Tagen nach Erhalt der Ware kostenlos zurücksenden. Davon ausgenommen sind steril verpackte Produkte, In-vitro-Diagnostika, Anfertigungen nach Kundenwunsch und Leibwäsche. Und so geht es:</p>

                <h3>Wie muss ich meine Artikel verpacken?</h3>
                <p>Bitte verpacken Sie die Ware sorgfältig in der Originalverpackung (möglichst im ursprünglichen Versandkarton), um Beschädigungen auf dem Transportweg zu vermeiden.</p>

                <h3>Wie kann ich meine Rücksendung aufgeben (Kunden mit Kundenkonto)?</h3>
                <p>• Melden Sie sich im Praxisdienst Online Shop unter “Mein Konto” mit Ihren persönlichen Zugangsdaten an.</p>
                <p>• Im Bereich “Bestellungen” können Sie alle getätigten Bestellungen einsehen und die Artikel, die Sie zurückgeben möchten, durch das Anhaken des Kästchens “Artikel retournieren” markieren.</p>
                <p>• Per E-Mail erhalten Sie nun von uns ein DPD-Retouren-Etikett. Drucken Sie dieses bitte aus und kleben Sie es auf das Paket. Das Retouren Paket kann in jedem beliebigen DPD-Paketshop abgegeben werden.</p>
                <p>• Anhand Ihrer Postleitzahl ermittelt unser System die DPD-Paketshops in Ihrer Nähe und zeigt Ihnen diese als mögliche Abgabeorte an.</p>

                <h3>Wie kann ich meine Rücksendung aufgeben (Kunden ohne Kundenkonto)?</h3>
                <p>• Falls Sie als Gast ohne Registrierung bestellt haben, schicken Sie uns bitte eine Mail an info@praxisdienst.de unter Angabe Ihrer Kundennummer sowie der Rechnungsnummer und teilen Sie uns bitte mit, welchen Artikel Sie retournieren möchten.</p>
                <p>• Per E-Mail erhalten Sie nun von uns ein DPD-Retouren-Etikett. Drucken Sie dieses bitte aus und kleben Sie es auf das Paket. Das Retouren Paket kann in jedem beliebigen DPD-Paketshop abgegeben werden.</p>
                <p>• Anhand Ihrer Postleitzahl ermittelt unser System die DPD-Paketshops in Ihrer Nähe und zeigt Ihnen diese als mögliche Abgabeorte an.</p>

                <h3>Wann erhalte ich meine Rückerstattung?</h3>
                <p>Wir schreiben Ihnen den Warenwert innerhalb von 14 Tagen nach Erhalt der Ware gut.</p>
            </div>

            <div id="my-account" class="content-section" style="display: none;">
                <h2>Mein Kundenkonto</h2>
                <p>Wenn Sie bei Praxisdienst bestellen möchten, ist es hilfreich ein Kundenkonto einzurichten. Dieses erspart Ihnen bei zukünftigen Bestellungen nicht nur die erneute Eingabe Ihrer Adressdaten, sondern bietet darüber hinaus zahlreiche Möglichkeiten Ihre Bestellungen einzusehen, den aktuellen Lieferstatus zu erfahren oder Rücksendungen zu veranlassen.</p>

                <p>Klicken Sie dazu auf “Anmelden” im oberen/rechten Bereich der Seite und gehen Sie danach auf “Jetzt registrieren”. Um die Registrierung abzuschließen, füllen Sie bitte alle mit * gekennzeichneten Felder aus. Bestätigen Sie Ihre Eingaben und schon sind Sie fertig.</p>

                <p>Selbstverständlich können Sie auch als Gast ohne Registrierung bei Praxisdienst bestellen.</p>
            </div>

            <div id="payment-options" class="content-section" style="display: none;">
                <h2>Zahlungsmöglichkeiten</h2>
                <p>Bankverbindungen: Um Ihnen die Abwicklung des Zahlungsverkehrs so einfach wie möglich zu gestalten, stellen wir Ihnen eine Reihe von Bankverbindungen zur Verfügung. In vielen Fällen können wir auch unseren Kunden aus dem Ausland eine lokale Bankverbindung anbieten.</p>
            </div>

            <div id="loyalty-program" class="content-section" style="display: none;">
                <h2>Treueprogramm & Gutscheine</h2>
                <p>Mit Praxisdienst PLUS erhalten Sie bei jedem Kauf 5 % Rabatt auf den Warenwert und das bereits ab dem allerersten Einkauf. Neben der Ersparnis genießen Sie als PLUS Mitglied weitere Vorteile.</p>
                <p>Der Praxisdienst-Geschenkgutschein ist die ideale Geschenkidee für Ärzte, Medizinstudenten und andere Angestellte im Gesundheitswesen. Der Gutschein wird Ihnen wahlweise per Post oder digital via E-Mail zugeschickt.</p>
            </div>
        </div>
    </div>
</div>
<script>
    // Function to hide all sections and show the selected one
    function showSection(sectionId) {
        document.querySelectorAll('.content-section').forEach(section => {
            section.style.display = 'none';
        });
        document.getElementById(sectionId).style.display = 'block';
    }

    // Function to handle smooth scrolling with a 20px offset
    function scrollToSection(sectionId) {
        const targetElement = document.getElementById(sectionId);
        if (targetElement) {
            const offsetPosition = targetElement.getBoundingClientRect().top + window.scrollY - 80; // Adjust by 20px

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    }

    // Attach click event to all service-menu anchors
    document.querySelectorAll('.service-menu a').forEach(anchor => {
        anchor.addEventListener('click', function(event) {
            event.preventDefault();
            const target = this.getAttribute('href').substring(1);
            showSection(target);  // Show the section
            scrollToSection(target);  // Smooth scroll to it
        });
    });

    // On page load, check if there's a hash in the URL and show the appropriate section
    window.addEventListener('load', function() {
        const hash = window.location.hash.substring(1);
        if (hash) {
            showSection(hash);
            scrollToSection(hash);
        } else {
            showSection('service-overview');  // Show the default section if no hash
        }
    });
</script>
<?php
include_once "footer.php";
?>




