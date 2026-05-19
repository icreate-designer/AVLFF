<?php
/**
 * Template Name: Faire un Don
 *
 * Place this file in your alvff-theme/ folder.
 * Then in WordPress admin: Pages → Edit page → Page Attributes → Template → "Faire un Don"
 */
get_header();
?>



<section class="py-7 bg-danger">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="text-center mb-0 text-white" style="font-size:54pt;"><span class="bx bx-heart"></span></p>
            <h1 class="text-center text-white fw-bold">Faites un Don</h1>
            <p class="text-center text-white">Votre générosité nous permet de protéger et d'accompagner les femmes et les filles vulnérables.</p>
        </div>
    </div>
</div>
</section>

<!-- Page body -->
<section class="don-page">
    <div class="container">
        <div class="row g-4">

            <!-- ── Left: Donation Form ── -->
            <div class="col-lg-8 px-5">
                <div class="don-card">
                    <h5 class="fw-bold mb-4" style="font-size:1.15rem;">Choisissez votre don</h5>

                    <!-- Frequency -->
                    <p class="section-label">Fréquence</p>
                    <div class="freq-toggle" id="freqToggle">
                        <button class="freq-btn active" data-freq="unique">Don Unique</button>
                        <button class="freq-btn" data-freq="mensuel">Don Mensuel</button>
                    </div>

                    <!-- Currency -->
                    <div class="currency-select-wrap mb-3">
                        <label for="currencySelect">Devise</label>
                        <select class="form-control" id="currencySelect">
                            <option value="EUR" data-symbol="€" data-amounts="10,25,50,100,250,500" selected>€ EUR — Euro</option>
                            <option value="USD" data-symbol="$" data-amounts="10,25,50,100,250,500">$ USD — Dollar US</option>
                            <option value="GBP" data-symbol="£" data-amounts="10,25,50,100,250,500">£ GBP — Livre Sterling</option>
                            <option value="XAF" data-symbol="FCFA" data-amounts="5000,10000,25000,50000,100000,250000">FCFA XAF — Franc CFA</option>
                            <option value="CAD" data-symbol="CA$" data-amounts="10,25,50,100,250,500">CA$ CAD — Dollar Canadien</option>
                            <option value="CHF" data-symbol="CHF" data-amounts="10,25,50,100,250,500">CHF — Franc Suisse</option>
                        </select>
                    </div>

                    <!-- Amounts -->
                    <p class="section-label">Montant</p>
                    <div class="amount-grid" id="amountGrid">
                        <button class="amount-btn" data-amount="10">€10</button>
                        <button class="amount-btn" data-amount="25">€25</button>
                        <button class="amount-btn active" data-amount="50">€50</button>
                        <button class="amount-btn" data-amount="100">€100</button>
                        <button class="amount-btn" data-amount="250">€250</button>
                        <button class="amount-btn" data-amount="500">€500</button>
                    </div>

                    <!-- Custom amount -->
                    <div class="custom-amount-wrap">
                        <span class="currency-symbol">€</span>
                        <input type="number" id="customAmount" class="form-control" placeholder="Autre montant" min="1">
                    </div>

                    <!-- Payment method -->
                    <p class="section-label">Mode de paiement</p>
                    <div class="payment-grid" id="paymentGrid">
                        <button class="pay-btn active" data-pay="card">
                            <span class="pay-icon"><i class="bx bx-credit-card"></i></span>
                            Card
                        </button>
                        <button class="pay-btn" data-pay="paypal">
                            <span class="pay-icon"><i class="bx bxl-paypal"></i></span>
                            PayPal
                        </button>
                        <button class="pay-btn" data-pay="orange">
                            <span class="pay-icon orange"><i class="bx bx-mobile"></i></span>
                            Orange
                        </button>
                        <button class="pay-btn" data-pay="mtn">
                            <span class="pay-icon mtn"><i class="bx bx-mobile"></i></span>
                            MTN
                        </button>
                    </div>

                    <!-- Card fields (shown by default) -->
                    <div class="card-fields" id="cardFields">
                        <div class="mb-3">
                            <label>Numéro de carte</label>
                            <input type="text" class="form-control" placeholder="1234 5678 9012 3456" maxlength="19" id="cardNumber">
                        </div>
                        <div class="row g-3">
                            <div class="col-6">
                                <label>Date d'expiration</label>
                                <input type="text" class="form-control" placeholder="MM/YY" maxlength="5" id="cardExpiry">
                            </div>
                            <div class="col-6">
                                <label>CVV</label>
                                <input type="text" class="form-control" placeholder="123" maxlength="4" id="cardCvv">
                            </div>
                        </div>
                    </div>

                    <!-- Mobile money fields (hidden by default) -->
                    <div class="card-fields d-none" id="mobileFields">
                        <div class="mb-3">
                            <label>Numéro de téléphone</label>
                            <input type="tel" class="form-control" placeholder="6XX XXX XXX">
                        </div>
                    </div>

                    <!-- PayPal note (hidden by default) -->
                    <div class="d-none" id="paypalNote">
                        <p class="text-muted" style="font-size:.85rem;">
                            <i class="bx bxl-paypal me-1" style="color:#003087;"></i>
                            Vous serez redirigé vers PayPal pour finaliser votre paiement.
                        </p>
                    </div>

                    <!-- Donor info -->
                    <p class="donor-info-label">Vos informations</p>
                    <div class="donor-info">
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label>Prénom</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                            <div class="col-6">
                                <label>Nom</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="">
                        </div>
                    </div>

                    <!-- Submit -->
                    <button class="btn-donate" id="donateBtn">
                        <i class="bx bx-heart"></i>
                        <span id="donateBtnLabel">Faire un don de €50</span>
                    </button>
                    <p class="secure-note">
                        <i class="bx bx-shield-quarter"></i> Paiement 100% sécurisé
                    </p>
                </div>
            </div>

            <!-- ── Right: Sidebar ── -->
            <div class="col-lg-4">
                <div class="don-sidebar">

                    <!-- Impact -->
                    <div class="impact-card">
                        <h5>Votre impact</h5>

                        <div class="impact-item">
                            <div class="impact-check"><i class="bx bx-check"></i></div>
                            <div>
                                <p class="impact-amount mb-0">€25</p>
                                <p class="impact-desc mb-0">Un mois d'accompagnement psychosocial pour une survivante</p>
                            </div>
                        </div>

                        <div class="impact-item">
                            <div class="impact-check"><i class="bx bx-check"></i></div>
                            <div>
                                <p class="impact-amount mb-0">€50</p>
                                <p class="impact-desc mb-0">Une formation professionnelle pour une femme</p>
                            </div>
                        </div>

                        <div class="impact-item">
                            <div class="impact-check"><i class="bx bx-check"></i></div>
                            <div>
                                <p class="impact-amount mb-0">€100</p>
                                <p class="impact-desc mb-0">Fournitures scolaires pour 5 filles pendant un an</p>
                            </div>
                        </div>

                        <div class="impact-item">
                            <div class="impact-check"><i class="bx bx-check"></i></div>
                            <div>
                                <p class="impact-amount mb-0">€250</p>
                                <p class="impact-desc mb-0">Financement d'un atelier de sensibilisation communautaire</p>
                            </div>
                        </div>
                    </div>
                    <!-- Transparency -->
                    <div class="transparency-card">
                        <div class="shield-wrap">
                            <i class="bx bx-shield"></i>
                        </div>
                        <h5>Transparence totale</h5>
                        <p class="text-white">95% de vos dons vont directement aux programmes sur le terrain.</p>
                    </div>

                    <!-- Photo -->
                    <div class="photo-card">
                        <img
                            src="<?php bloginfo('template_directory'); ?>/assets/img/image_test.jpg"
                            alt="Action terrain ALVFF"
                            onerror="this.style.display='none'"
                        >
                    </div>

                </div>
            </div>

        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

<script>
(function () {
    /* ── Currency state ── */
    var selectedSymbol = '€';
    var selectedAmount = 50;

    /* ── Frequency toggle ── */
    document.querySelectorAll('#freqToggle .freq-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            document.querySelectorAll('#freqToggle .freq-btn').forEach(function (b) { b.classList.remove('active'); });
            btn.classList.add('active');
        });
    });

    /* ── Update donate button label ── */
    function updateDonateBtn() {
        var fmt = selectedSymbol.length > 2
            ? selectedAmount.toLocaleString() + ' ' + selectedSymbol
            : selectedSymbol + selectedAmount.toLocaleString();
        document.getElementById('donateBtnLabel').textContent = 'Faire un don de ' + fmt;
    }

    /* ── Rebuild amount buttons ── */
    function rebuildAmountGrid(amounts, symbol) {
        var grid = document.getElementById('amountGrid');
        var defaultIndex = 2; // third button active by default
        grid.innerHTML = '';
        amounts.forEach(function (amt, i) {
            var btn = document.createElement('button');
            btn.className = 'amount-btn' + (i === defaultIndex ? ' active' : '');
            btn.dataset.amount = amt;
            var label = symbol.length > 2
                ? amt.toLocaleString() + '\u00A0' + symbol
                : symbol + amt.toLocaleString();
            btn.textContent = label;
            btn.addEventListener('click', function () {
                document.querySelectorAll('#amountGrid .amount-btn').forEach(function (b) { b.classList.remove('active'); });
                btn.classList.add('active');
                selectedAmount = parseInt(btn.dataset.amount, 10);
                document.getElementById('customAmount').value = '';
                updateDonateBtn();
            });
            grid.appendChild(btn);
        });
        selectedAmount = parseInt(amounts[defaultIndex], 10);
    }

    /* ── Currency selector ── */
    document.getElementById('currencySelect').addEventListener('change', function () {
        var opt = this.options[this.selectedIndex];
        selectedSymbol = opt.dataset.symbol;
        var amounts = opt.dataset.amounts.split(',').map(Number);
        // Update the custom-amount currency symbol
        document.querySelector('.currency-symbol').textContent = selectedSymbol.length > 2 ? '' : selectedSymbol;
        document.getElementById('customAmount').placeholder = selectedSymbol.length > 2
            ? 'Autre montant (' + selectedSymbol + ')'
            : 'Autre montant';
        rebuildAmountGrid(amounts, selectedSymbol);
        document.getElementById('customAmount').value = '';
        updateDonateBtn();
    });

    /* ── Custom amount ── */
    document.getElementById('customAmount').addEventListener('input', function () {
        if (this.value) {
            document.querySelectorAll('#amountGrid .amount-btn').forEach(function (b) { b.classList.remove('active'); });
            selectedAmount = parseInt(this.value, 10) || 0;
            updateDonateBtn();
        }
    });

    /* ── Payment method ── */
    document.querySelectorAll('#paymentGrid .pay-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            document.querySelectorAll('#paymentGrid .pay-btn').forEach(function (b) { b.classList.remove('active'); });
            btn.classList.add('active');
            var method = btn.dataset.pay;
            document.getElementById('cardFields').classList.toggle('d-none',   method !== 'card');
            document.getElementById('mobileFields').classList.toggle('d-none', method !== 'orange' && method !== 'mtn');
            document.getElementById('paypalNote').classList.toggle('d-none',   method !== 'paypal');
        });
    });

    /* ── Card number formatting ── */
    document.getElementById('cardNumber').addEventListener('input', function () {
        var v = this.value.replace(/\D/g, '').substring(0, 16);
        this.value = v.replace(/(.{4})/g, '$1 ').trim();
    });

    /* ── Expiry formatting ── */
    document.getElementById('cardExpiry').addEventListener('input', function () {
        var v = this.value.replace(/\D/g, '').substring(0, 4);
        if (v.length >= 3) v = v.substring(0, 2) + '/' + v.substring(2);
        this.value = v;
    });

    /* ── Init amount buttons with click handlers ── */
    document.querySelectorAll('#amountGrid .amount-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            document.querySelectorAll('#amountGrid .amount-btn').forEach(function (b) { b.classList.remove('active'); });
            btn.classList.add('active');
            selectedAmount = parseInt(btn.dataset.amount, 10);
            document.getElementById('customAmount').value = '';
            updateDonateBtn();
        });
    });

    updateDonateBtn();
})();
</script>

<?php get_footer(); ?>