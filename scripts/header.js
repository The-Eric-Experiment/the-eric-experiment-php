// header

// Select the table with the ID 'header'
var table = document.getElementById("header");

// Loop through the table's attributes
var attributes = table.attributes;
for (var i = attributes.length - 1; i >= 0; --i) {
  var attributeName = attributes[i].name;

  // Remove attribute if it's not the ID
  if (attributeName !== "id") {
    table.removeAttribute(attributeName);
  }
}

// Create a new style element
var style = document.createElement("style");

// Set the content of the style element
style.innerHTML = `
  #header {
    width: 900px;
    border-spacing: 0;
    border-collapse: collapse;
    background: url(/public/starfiel.gif)
  }

  #header > tbody > tr:first-child {
    background: url(/public/top-bg-900.png);
    background-position: bottom left;
    background-repeat: no-repeat;
  }
`;

// Append the style element to the head
document.head.appendChild(style);
