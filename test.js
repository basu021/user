// Function to calculate Jodi value
function calculateJodi(openValue, closeValue) {
    // Function to calculate the sum of digits
    function calculateSumOfDigits(value) {
        return value.toString().split('').reduce(function (acc, digit) {
            return acc + parseInt(digit);
        }, 0);
    }

    // Function to get the rightmost digit
    function getRightmostDigit(value) {
        return parseInt(value.toString().slice(-1));
    }

    // Calculate Jodi value based on open and close values
    var openSum = calculateSumOfDigits(openValue);
    var closeSum = 0;

    if (closeValue) {
        closeSum = calculateSumOfDigits(closeValue);
    }

    // Return the Jodi value
    if (closeValue) {
        return '' + getRightmostDigit(openSum) + getRightmostDigit(closeSum);
    } else {
        return getRightmostDigit(openSum).toString();
    }
}

// Example usage:
var dayOpen = "123"; // Replace with your open value
var dayClose = "232"; // Replace with your close value, or leave it empty

var dayJodi = calculateJodi(dayOpen, dayClose);
console.log("day Jodi: " + dayJodi);
