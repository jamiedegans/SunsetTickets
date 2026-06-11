class TravelCard extends HTMLElement {
    connectedCallback() {
        const name = this.getAttribute("name");
        const location = this.getAttribute("location");
        const info = this.getAttribute("info");
        const price = this.getAttribute("price");


        this.innerHTML = `
         <div class="section-box">
                <p class="midduim font-gray">${location}</p>
                <p class="midduim font-gray">${name}</p>
                <p class="font-gray small">${info}</p>
                <div class="login-veld">
                    <p class="btn">${price}</p>
                    <button class="btn white">kopen brokie</button>
                </div>
            </div>

        `;
    }
}

customElements.define("travel-card", TravelCard);