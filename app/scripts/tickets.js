class TicketCard extends HTMLElement {
    connectedCallback() {
        const name = this.getAttribute("name");
        const location = this.getAttribute("location");


        this.innerHTML = `

                        <div class="ticket-card">
                            <span class="ticket-type">${name}</span>
                            <p class="ticket-meta">${location}</p>
                            <div class="ticket-card-footer">
                                <button class="btn gray">Downloaden</button>
                            </div>
                        </div>
        `;
    }
}

customElements.define("ticket-card", TicketCard);
// created the name of the class and the custom element to be used in the html file.

