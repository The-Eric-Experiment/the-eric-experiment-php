import { v4 } from "uuid";
import { css, appendCss } from "./css";

const initialCss = css`
  @font-face {
    font-family: W95FA;
    src: url(/public/W95FA/w95fa.woff2);
  }

  .new-menu-container {
    display: flex;
    gap: 1px;
    background-color: #ffbf00;
    border: 1px solid #ffbf00;
    position: relative;
  }

  .new-menu-item {
    background: url(/public/specled.gif);
    box-shadow: inset 2px 2px 5px rgba(0, 0, 0, 0.6);
    box-sizing: border-box;
    position: relative;
    overflow: hidden;
  }

  a.new-menu-item {
    font-family: W95FA, Arial, Helvetica, sans-serif;
    padding: 5px 10px;
    color: #000000;
    display: flex;
    align-items: center;
    text-align: left;
    text-decoration: none;
    white-space: nowrap;
    transition: text-shadow 200ms ease-in-out, color 200ms ease-in-out;
  }

  a.new-menu-item span {
    z-index: 1;
  }

  a.new-menu-item:hover,
  a.new-menu-item.current {
    text-shadow: -1px -1px 0 #000000, 1px -1px 0 #000000, -1px 1px 0 #000000,
      1px 1px 0 #000000;
    color: #ffffff;
  }

  a.new-menu-item::before,
  a.new-menu-item.current:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0);
    transition: background 200ms ease-in-out; /* transition is applied for both hover and un-hover */
  }

  a.new-menu-item.current::before,
  a.new-menu-item:hover::before {
    background: rgba(0, 0, 0, 0.75);
  }

  a.new-menu-item:hover::before {
    opacity: 0.5;
    animation: breathe 2s infinite ease-in-out;
    animation-delay: 200ms;
  }

  a.new-menu-item img.default-icon {
    margin-right: 10px;
    width: 24px;
    transform-origin: center;
    z-index: 2;
    position: relative;
  }

  a.new-menu-item .rain-icon {
    display: none;
    position: absolute;
    opacity: 0;
  }

  a.new-menu-item:hover .rain-icon {
    opacity: 0;
    display: block;
    animation: rain linear infinite;
  }

  a.new-menu-item:hover img.default-icon {
    animation: defaultIconRain 1000ms linear infinite;
  }

  @keyframes defaultIconRain {
    0% {
      transform: translateY(0);
      opacity: 1;
    }
    49% {
      transform: translateY(110%);
      opacity: 1;
    }
    50% {
      transform: translateY(110%);
      opacity: 0;
    }
    51% {
      transform: translateY(-110%);
      opacity: 0;
    }
    52% {
      transform: translateY(-110%);
      opacity: 1;
    }
    100% {
      transform: translateY(0);
      opacity: 1;
    }
  }

  @keyframes rain {
    0% {
      transform: translateY(-110%);
      opacity: 1;
    }
    100% {
      transform: translateY(110%);
      opacity: 1;
    }
  }

  @keyframes breathe {
    0% {
      opacity: 0.75;
    }
    50% {
      opacity: 1;
    }
    100% {
      opacity: 0.75;
    }
  }
`;

appendCss(initialCss);

const menuContainer = document.querySelector('[data-menu-container="true"]');
const menuItems = document.querySelectorAll('[data-menu-item="true"]');
const menuItemData = Array.from(menuItems).map((menuItem) => ({
  icon: menuItem.getAttribute("data-menu-icon"),
  label: menuItem.getAttribute("data-menu-label"),
  href: menuItem.getAttribute("href"),
}));

menuContainer.innerHTML = "";

const newMenuContainer = document.createElement("div");
newMenuContainer.className = "new-menu-container";

function generateContainerItem(width) {
  const divMenuItem = document.createElement("div");
  divMenuItem.className = "new-menu-item";

  if (width) {
    divMenuItem.style.width = `${width}px`;
  }

  return divMenuItem;
}

function generateItem(itemData) {
  const divMenuItem = document.createElement("a");
  let className = "new-menu-item";
  const { icon, label, href } = itemData;

  if (
    location.pathname.toLowerCase() === href.toLowerCase() ||
    (href !== "/" &&
      location.pathname.toLowerCase().startsWith(href.toLowerCase()))
  ) {
    className += " current";
  }

  divMenuItem.className = className;
  divMenuItem.href = href;
  divMenuItem.title = label;

  divMenuItem.innerHTML = `
        ${
          icon
            ? `<img class="default-icon" src="/contents/${icon}" alt="icon">`
            : ""
        }
        ${label ? `<span>${label}</span>` : ""}`;

  return divMenuItem;
}

menuItemData.forEach((itemData) => {
  newMenuContainer.appendChild(generateItem(itemData));
});

menuContainer.appendChild(newMenuContainer);

let maxWidth = 0;

for (let menuItem of newMenuContainer.children) {
  if (menuItem.clientWidth > maxWidth) {
    maxWidth = menuItem.clientWidth;
  }
}

const gridCss = css`
  .new-menu-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(${maxWidth}px, 1fr));
  }
`;

appendCss(gridCss);

function findFillerWidth(itemWidth, items) {
  const containerWidth = menuContainer.clientWidth;
  var itemsPerRow = Math.floor(containerWidth / itemWidth);

  var lastRowItems = items.length % itemsPerRow;
  var additionalItemsNeeded =
    lastRowItems === 0 ? 0 : itemsPerRow - lastRowItems;
  return additionalItemsNeeded * items[0].offsetWidth;
}

const fillerWidth = findFillerWidth(maxWidth, [...newMenuContainer.children]);

newMenuContainer.appendChild(generateContainerItem(fillerWidth));

const clickabeItems = document.querySelectorAll("a.new-menu-item");

function offset(item, percent) {
  return Math.floor(percent * (item.clientWidth + 12)) - 12;
}

const RAIN_DROPS = [
  [0, 1000, 0],
  [0.25, 500, 250],
  [0.33, 700, 500],
  [0.48, 500, 250],
  [0.61, 600, 500],
  [0.75, 1000, 0],
  [0.9, 700, 250],
];

const rainIconsCss = [...clickabeItems]
  .flatMap((item) => {
    const itemId = v4();
    const img = item.querySelector("img");
    const iconSrc = img.src;
    return RAIN_DROPS.map(([leftPercent, dur, delay], index) => {
      const className = `rain-icon-${itemId}-${index}`;
      const rainIcon = document.createElement("img");
      rainIcon.src = iconSrc;
      rainIcon.className = `rain-icon ${className}`;
      item.appendChild(rainIcon);

      return css`
        a.new-menu-item:hover .rain-icon.${className} {
          left: ${offset(item, leftPercent)}px;
          animation-duration: ${dur}ms;
          animation-delay: ${delay}ms;
        }
      `;
    });
  })
  .join("");

appendCss(rainIconsCss);
