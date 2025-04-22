const minPeopleOfTable = 1;
const classNameDesk4People = ".desk-4";
const classNameDesk6People = ".desk-6";
const classNameDesk8People = ".desk-8";

function createPeople(counter) {
  const contPerson = document.createElement("div");
  contPerson.className = `cont-person person-${counter}`;

  const personElement = document.createElementNS(
    "http://www.w3.org/2000/svg",
    "svg"
  );
  personElement.setAttributeNS(null, "viewBox", "0 0 42 40");
  personElement.innerHTML = `<g transform="rotate(180 21 20)" fill-rule="nonzero" fill="none">
          <path d="M14.673 39.246c1.647.173 3.917-1.113 4.09-2.76.173-1.648-1.797-3.206-3.445-3.38-1.648-.172-5.61.762-5.784 2.41-.173 1.647 3.49 3.557 5.139 3.73Zm14.399-1.111c-1.698.552-4.342-.183-4.854-1.759-.512-1.575 1.248-3.56 2.946-4.111 1.698-.552 6.053-.555 6.565 1.021.512 1.576-2.959 4.298-4.657 4.85v-.001Z" fill="#FBD9AD" />
          <path d="M21 22.087h10.278C29.308 27.27 28.55 30.304 29 31.19c1.507 2.959 4.97 5.274 5.69 4.7C39.17 32.317 42 27.117 42 21 42 9.402 32.598 0 21 0S0 9.402 0 21c0 5.288 6.23 11.583 9 15.463 0 0 4.195-.12 4.932-5.274.208-1.45-.103-4.484-.932-9.102h8Z" fill="#000" />
          <path d="M21 22.087h10.278C29.308 27.27 28.55 30.304 29 31.19c1.507 2.959 4.97 5.274 5.69 4.7C39.17 32.317 42 27.117 42 21 42 9.402 32.598 0 21 0S0 9.402 0 21c0 5.288 6.23 11.583 9 15.463 0 0 4.195-.12 4.932-5.274.208-1.45-.103-4.484-.932-9.102h8Z" fill="#EE8A7D" />
          <circle fill="#FBD9AD" cx="21" cy="10" r="8" />
          <path d="M20.977 13.478c4.418 0 8.023-4.249 8.023-5.324C29 3.736 25.418 0 21 0s-8 6.267-8 8.154c0 1.887 3.558 5.324 7.977 5.324Z" fill="#3A3A3A" />
        </g>`;

  contPerson.appendChild(personElement);
  return contPerson;
}

function upQuantity(classNameDesk, maxPeople) {
  const element = document.querySelector(classNameDesk).classList;
  const counterItem = +document.querySelector(`${classNameDesk}-text-counter`)
    .textContent;
  if (counterItem < maxPeople) {
    const resultCounterItem = counterItem + 1;
    element.remove("quantity-" + counterItem);
    element.add(`quantity-${resultCounterItem}`);
    document.querySelector(
      `${classNameDesk}-text-counter`
    ).innerHTML = resultCounterItem;
  }
}

function lowerQuantity(classNameDesk) {
  const element = document.querySelector(classNameDesk).classList;
  const counterItem = +document.querySelector(`${classNameDesk}-text-counter`)
    .textContent;
  if (counterItem > minPeopleOfTable) {
    const resultCounterItem = counterItem - 1;
    element.remove(`quantity-${counterItem}`);
    element.add(`quantity-${resultCounterItem}`);
    document.querySelector(
      `${classNameDesk}-text-counter`
    ).innerHTML = resultCounterItem;
  }
}

function init(classItem, quantity) {
  for (let i = 0; i < quantity; i++) {
    document.querySelector(`${classItem}`).appendChild(createPeople(i));
  }
}

window.onload = function () {
  init(classNameDesk4People, 4);
  init(classNameDesk6People, 6);
  init(classNameDesk8People, 8);
};
