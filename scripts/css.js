export function appendCss(str) {
  const styleTag = document.createElement("style");
  styleTag.innerHTML = str;
  document.head.appendChild(styleTag);
}

export function css(strings, ...values) {
  // Combine the strings and values into a single array
  const parts = [];
  for (let i = 0; i < strings.length; i++) {
    parts.push(strings[i]);
    if (i < values.length) {
      parts.push(values[i]);
    }
  }

  // Join the parts array into a single string
  return parts.join("");
}
