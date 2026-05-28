class TicketCard extends HTMLElement {
    connectedCallback() {
        const ticket = this.getAttribute("ticket");
        const location = this.getAttribute("location");
        const date = this.getAttribute("date");


        this.innerHTML = `
        <div class="card-container">
            <p class="font-gray small roboto">${ticket}</p>
            <h4>Electric Dreams</h4>
            <p class="font-gray small roboto">${location}</p>
            <div class="next-row">
                <p class="font-gray small roboto">${date}</p>
                <button class="btn gray">download</button>
            </div>
        </div>
        `;
    }
}

customElements.define("ticket-card", TicketCard);
// created the name of the class and the custom element to be used in the html file.

