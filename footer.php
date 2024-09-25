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
                                <span>Bleiben Sie mit uns in Verbindung:</span>
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
