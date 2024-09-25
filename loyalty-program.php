
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" href="light-theme.css" id="theme-style"> -->
    <title>Service Center - BBQ Apotheke</title>
</head>
<body class="d-flex flex-column min-vh-100">

<main class="flex-grow-1 ms-3 mt-5 pt-5 me-3">
    <div class="container-md">
        <div class="row">
            <div class="col-12">
                <!-- Navigation -->
                <nav class="navbar navbar-expand-lg bg-body-tertiary-fluid fixed-top text-center" style="background-color: #e3f2fd;">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index.php"><img src="img/bbq-apotheke.jpeg" height="50px"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php"><strong>BBQ Apotheke</strong></a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Kategorien
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="category.php?u_kat_id=1">Verbandmittel</a></li>
                                        <li><a class="dropdown-item" href="category.php?u_kat_id=2">Wundverschluss</a></li>
                                        <li><a class="dropdown-item" href="category.php?u_kat_id=3">Gipsverbände</a></li>
                                        <li><a class="dropdown-item" href="category.php?u_kat_id=4">Pflaster</a></li>
                                        <li><a class="dropdown-item" href="category.php?u_kat_id=5">Medizinische Schutzkleidung</a></li>
                                        <li><a class="dropdown-item" href="category.php?u_kat_id=6">Desinfektionsmittel</a></li>
                                        <li><a class="dropdown-item" href="category.php?u_kat_id=7">Reinigung und Pflege</a></li>
                                        <li><a class="dropdown-item" href="category.php?u_kat_id=8">Papierprodukte</a></li>
                                        <li><a class="dropdown-item" href="category.php?u_kat_id=9">Wellness und Massage</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="about_us.php">Über uns</a></li>
                                <li class="nav-item"><a class="nav-link" href="contact.php">Kontakt</a></li>
                                <li class="nav-item"><a class="nav-link" href="service_center.php">Service</a></li>
                            </ul>
                        </div>
                        <ul class="navbar-nav ms-auto">
                            <form class="d-flex" action="search.php" method="get" role="search">
                                <input class="form-control me-2" type="search" name="query" placeholder="suchen" aria-label="Search">
                                <button class="btn btn-outline-primary" type="submit">Suchen</button>
                            </form>
                            <li class="nav-item">
                                <a class="nav-link" href="account.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                    </svg>
                                </a>
                            </li>
                            <li class="nav-item position-relative">
                                <a class="nav-link" href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
            </div>
            </nav>
            <div>&nbsp;</div>
            <!-- End of Navigation -->
        </div>
    </div>

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

</main>
<!-- footer -->
<div class="container-fluid mt-2" style="background-color: #e3f2fd; padding: 5px 0;"> <!-- Reduced padding -->
    <!-- footer -->
    <div class="container-fluid" style="background-color: #e3f2fd; padding: 5px 0;">
        <!-- Footer -->
        <footer class="text-dark mt-auto">
            <section>
                <div class="container mt-1">
                    <div class="row justify-content-center text-md-start text-center">
                        <!-- Column 1: BBQ Apotheke and Social Media -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mb-1">
                            <h6 class="fw-bold mb-1">BBQ Apotheke</h6>
                            <hr class="mb-2 mt-0 d-inline-block" style="width: 100%; background-color: #0491f7; height: 2px"/>
                            <div class="mb-1">
                                <span>Bleiben Sie mit uns in den sozialen Netzwerken in Verbindung:</span>
                            </div>
                            <div class="social-icons">
                                <a href="https://www.facebook.com" class="text-black me-3" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
                                <a href="https://twitter.com" class="text-black me-3" target="_blank" rel="noopener noreferrer"><i class="bi bi-twitter-x"></i></a>
                                <a href="https://www.instagram.com" class="text-black me-3" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
                                <a href="https://www.linkedin.com" class="text-black me-3" target="_blank" rel="noopener noreferrer"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>

                        <!-- Column 2: Legal -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mb-1">
                            <h6 class="fw-bold mb-1">LEGAL</h6>
                            <hr class="mb-2 mt-0 d-inline-block" style="width: 100%; background-color: #0491f7; height: 2px"/>
                            <ul class="list-unstyled">
                                <li><a href="agb.php" class="text-dark">AGB</a></li>
                                <li><a href="datenschutz.php" class="text-dark">Datenschutz</a></li>
                                <li><a href="impressum.php" class="text-dark">Impressum</a></li>
                                <li><a href="bankverbindungen.php" class="text-dark">Bankverbindungen</a></li>
                            </ul>
                        </div>

                        <!-- Column 3: Nützliche Links -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mb-1">
                            <h6 class="fw-bold mb-1">Nützliche Links</h6>
                            <hr class="mb-2 mt-0 d-inline-block" style="width: 100%; background-color: #0491f7; height: 2px"/>
                            <ul class="list-unstyled">
                                <!-- "Ihr Konto" links to account.php -->
                                <li><a href="account.php" class="text-dark">Ihr Konto</a></li>

                                <!-- "Werden Sie ein Partner" links to loyalty program section -->
                                <li><a href="loyalty-program.php#loyalty-program" data-target="loyalty-program" class="text-dark">Werden Sie ein Partner</a></li>

                                <!-- "Versandtarife" links to shipping and delivery section -->
                                <li><a href="shipping-delivery.php#shipping-delivery" data-target="shipping-delivery" class="text-dark">Versandtarife</a></li>

                                <!-- "Hilfe" links to service center section -->
                                <li><a href="contact.php" class="text-dark">Hilfe</a></li>
                            </ul>
                        </div>

                        <!-- Column 4: Kontakt -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mb-1">
                            <h6 class="fw-bold mb-1">Kontakt</h6>
                            <hr class="mb-2 mt-0 d-inline-block" style="width: 100%; background-color: #0491f7; height: 2px"/>
                            <ul class="list-unstyled">
                                <li><a href="https://www.google.de/maps/place/Wendenstra%C3%9Fe+35-43,+20097+Hamburg/@53.547543,10.0269424,17z/data=!3m1!4b1!4m6!3m5!1s0x47b18eecddd70b9d:0x6675920f2053f4ea!8m2!3d53.547543!4d10.0269424!16s%2Fg%2F11c2fby18j?entry=ttu&g_ep=EgoyMDI0MDkwMy4wIKXMDSoASAFQAw%3D%3D" class="text-dark">Hamburg, Wendenstrasse 23</a></li>
                                <li><a href="mailto:info@example.com" class="text-dark">info@example.com</a></li>
                                <li><a href="tel:+49401234567" class="text-dark">+49 40 123 45 67</a></li>
                                <li><a href="tel:+49401234568" class="text-dark">+49 40 123 45 68</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Copyright Section: Smaller text with no background change -->
            <div class="text-center py-2" style="background-color: #e3f2fd; font-size: 0.75rem;">
                © 2024 Copyright: BBQ Apotheke | Made with ❤️ in Hamburg by BBQ AE-Team
            </div>
        </footer>
    </div>
    <!-- Chat button -->
    <div id="chat-icon" class="chat-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chat-right-text-fill" viewBox="0 0 16 16">
            <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353zM3.5 3h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1m0 2.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1m0 2.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1"/>
        </svg>
    </div>

    <!-- chat window -->
    <div id="chat-box" class="chat-box" style="display: none;">
        <div class="chat-header">
            <span>Chat</span>
            <button id="close-chat" class="close-chat">X</button>
        </div>
        <div class="chat-body">
            <form id="chat-form" action="" method="POST">
                <input type="email" name="user_mail" id="user_mail" placeholder="Ihre E-Mail Adresse" required>
                <textarea name="msg_text" id="msg_text" placeholder="Wie können wir Ihnen helfen?" required></textarea>
                <button type="submit">SEND</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('chat-icon').addEventListener('click', function() {
            document.getElementById('chat-box').style.display = 'block';
        });

        document.getElementById('close-chat').addEventListener('click', function() {
            document.getElementById('chat-box').style.display = 'none';
        });
    </script>

    <!-- End of .container -->
</div>

</div>
<!-- End of .container -->

<!-- Hidden CSRF token field
<input type="hidden" id="csrf_token" value="<?//php echo $_SESSION['csrf_token']; ?>">-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="theme-switcher.js"></script>

<script>
    $(document).ready(function() {
        // Handle quantity changes
        $('.quantity-input').on('change', function() {
            var productId = $(this).data('product-id');
            var newQuantity = $(this).val();
            var csrfToken = $('#csrf_token').val();

            if (newQuantity > 0) {
                $.ajax({
                    type: 'POST',
                    url: 'cart.php',
                    data: {
                        product_id: productId,
                        quantity: newQuantity,
                        update_quantity: 1,
                        csrf_token: csrfToken
                    },
                    success: function(response) {
                        console.log("AJAX Response:", response);

                        var data = typeof response === 'string' ? JSON.parse(response) : response;

                        if (data.status === 'success') {
                            // Update the quantity and total price for the product in the DOM
                            $('input[data-product-id="' + productId + '"]').val(data.quantity);
                            $('#product-total-' + productId).text('€ ' + data.new_total.toFixed(2).replace('.', ','));

                            // Update the overall cart total
                            $('#cart-total').text('€ ' + data.total_cart_value.toFixed(2).replace('.', ','));

                            // Update the total items in the cart (red circle count)
                            if (data.total_items_in_cart > 0) {
                                $('.cart-count').text(data.total_items_in_cart).show();
                            } else {
                                $('.cart-count').hide();
                            }
                        } else {
                            alert('Error: ' + data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("AJAX Error:", status, error);
                        alert('An error occurred while updating the cart.');
                    }
                });
            } else {
                alert('Quantity must be greater than 0.');
            }
        });
    });
</script>
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

</body>
</html>




