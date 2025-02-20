function processPayment() {
    const cardNumber = document.getElementById("card-number").value;
    const cardName = document.getElementById("card-name").value;
    const expiryDate = document.getElementById("expiry-date").value;
    const cvv = document.getElementById("cvv").value;

    if (cardNumber.length !== 16 || isNaN(cardNumber)) {
        alert("Invalid card number. Please enter a 16-digit number.");
        return;
    }
    if (cvv.length !== 3 || isNaN(cvv)) {
        alert("Invalid CVV. Please enter a 3-digit number.");
        return;
    }
    if (cardName.trim() === "" || expiryDate === "") {
        alert("Please fill all required fields.");
        return;
    }

    alert("Payment successful! Your order has been placed.");
}
