class Header extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        this.innerHTML = `
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Aflauto</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarColor01">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a id="to_home" type="button" class="nav-link active">Home</a>
                            </li>
                            <li class="nav-item">
                                <a id="to_profil" type="button" class="nav-link">Mon profil</a>
                            </li>
                            <li class="nav-item">
                                <a id="to_cars" type="button" class="nav-link">Mes véhicules</a>
                            </li>
                            <li class="nav-item">
                                <a id="logout" type="button" class="nav-link">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="text-white">
                    <a id="to_profil">
                        <span class='user_login cursor-pointer fw-bold me-5'></span>
                    </a>
                </div>
            </nav>
        </header>
      `;
    }
}

customElements.define('navbar-component', Header);


