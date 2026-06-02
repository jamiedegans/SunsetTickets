class TravelCard extends HTMLElement {
    connectedCallback() {
        const name = this.getAttribute("name");
        const location = this.getAttribute("location");
        const date = this.getAttribute("date");
        const info = this.getAttribute("info");
        const price = this.getAttribute("price");



        this.innerHTML = `
            <div class="section-box">
                <p class="ticket-meta">${date}</p>
                <h2 class="orbitron">${name}<h2>
                    <p class="td-sub midduim">${location}</p>
                    <p class="font-gray small">${info}</p>
                    <p class="btn">${price}</p>
                </div>`;
    }
}

customElements.define("travel-card", TravelCard);