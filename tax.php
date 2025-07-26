<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tax Calculator</title>

</head>
<body>

<div class="container">
  <h2>Tax Calculator</h2>
  <form id="taxCalculatorForm" onsubmit="calculateTax(event)">
    <label for="income">Income:</label>
    <input type="number" id="income" name="income" required><br>
    <input type="submit" value="Calculate">
    <div class="result" id="taxResult"></div>
  </form>
</div>

<script>
function calculateTax(event) {
  event.preventDefault();
  
  var income = parseFloat(document.getElementById("income").value);
  var taxAmount = 0;
  
  if (income <= 300000) {
    taxAmount = 0;
  } else if (income > 300000 && income <= 600000) {
    taxAmount = (income - 300000) * 0.05;
  } else if (income > 600000 && income <= 900000) {
    taxAmount = (300000 * 0.05) + ((income - 600000) * 0.1);
  } else if (income > 900000 && income <= 1200000) {
    taxAmount = (300000 * 0.05) + (300000 * 0.1) + ((income - 900000) * 0.15);
  } else if (income > 1200000 && income <= 1500000) {
    taxAmount = (300000 * 0.05) + (300000 * 0.1) + (300000 * 0.15) + ((income - 1200000) * 0.2);
  } else {
    taxAmount = (300000 * 0.05) + (300000 * 0.1) + (300000 * 0.15) + (300000 * 0.2) + ((income - 1500000) * 0.3);
  }
  
  var netIncome = income - taxAmount;
  
  document.getElementById("taxResult").innerHTML = "Tax Amount: Rs " + taxAmount.toFixed(2) + "<br>Net Income: Rs " + netIncome.toFixed(2);
}
</script>

</body>
</html>
