var stripe = Stripe('pk_test_bX7R7PjozAfyQkbyA5qriONM');
var elements = stripe.elements();

var card = elements.create('card', {
    style: {
        base: {
            iconColor: '#55555',
            color: '#44444',
            lineHeight: '40px',
            fontWeight: 500,
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSize: '18px',

            '::placeholder': {
                color: '#777777',
            },
            invalid: {
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        },
    }
});

card.mount('#payment-element');

function setOutcome(result) {
    var successElement = document.querySelector('#success');
    var errorElement = document.querySelector('#error');
    successElement.classList.remove('hidden');
    errorElement.classList.remove('hidden');

    if (result.token) {
        // Use the token to create a charge or a customer
        // https://stripe.com/docs/charges
        // successElement.querySelector('.token').textContent = result.token.id;
        successElement.querySelector('.token').textContent = result.token.id;
        successElement.classList.add('hidden');
        // setLoading(true);
    } else if (result.error) {
        errorElement.textContent = result.error.message;
        errorElement.classList.add('visible');
    }

    // successElement.querySelector('.token').textContent = 'test';

    console.log(result.token.id);
}

card.on('change', function (event) {
    setOutcome(event);
});

document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault();
    var form = document.querySelector('form');
    var extraDetails = {
        name: form.querySelector('input[name=cardholder-name]').value,
    };
    stripe.createToken(card, extraDetails).then(setOutcome);
});

// Shows a success message when the payment is complete
var orderComplete = function (paymentIntentId) {
    loading(false);
    document
        .querySelector(".result-message a")
        .setAttribute(
            "href",
            "https://dashboard.stripe.com/test/payments/" + paymentIntentId
        );
    document.querySelector(".result-message").classList.remove("hidden");
    document.querySelector("button").disabled = true;
};

// Show a spinner on payment submission
var loading = function (isLoading) {
    if (isLoading) {
        // Disable the button and show a spinner
        document.querySelector("button").disabled = true;
        document.querySelector("#spinner").classList.remove("hidden");
        document.querySelector("#button-text").classList.add("hidden");
    } else {
        document.querySelector("button").disabled = false;
        document.querySelector("#spinner").classList.add("hidden");
        document.querySelector("#button-text").classList.remove("hidden");
    }
};
