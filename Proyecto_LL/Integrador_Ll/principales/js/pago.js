

var stripe = Stripe('pk_test_51NIoQLDQUPQBscfR2tzBP1g3e82iQIshNgewvollq91tjBejjRY9MLcE8mkAAYYLm9MWPJZEp2acyswBeqE565Ki00qUZ8Qh0E');
var elements = stripe.elements();
var cardElement = elements.create('card');
cardElement.mount('#card-element');

var form = document.querySelector('form');
form.addEventListener('submit', function (event) {
    event.preventDefault();
    stripe.createToken(cardElement).then(function (result) {
        if (result.error) {
// Manejar el error en caso de que ocurra durante la generación del token
            console.error(result.error.message);
        } else {
// Agregar el token generado al campo hidden del formulario
            var tokenInput = document.createElement('input');
            tokenInput.setAttribute('type', 'hidden');
            tokenInput.setAttribute('name', 'stripeToken');
            tokenInput.setAttribute('value', result.token.id);
            form.appendChild(tokenInput);
            // Enviar el formulario con el token incluido
            form.submit();
        }
    });
});
