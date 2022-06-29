class Header extends HTMLElement {
    constructor() {
      super();
    }
  
    connectedCallback() {
      this.innerHTML = `
        <header>
            <nav class="bg-indigo-600 px-12 py-3 flex text-lg">
                <div class="flex flex-grow gap-5">
                    <a href="#" class="text-white hover:text-green-500">Home</a>
                    <button id='logout' class="text-white hover:text-green-500">Logout</button>
                </div>
                <div
                    class="text-white transition ease-in delay-75 hover:uppercase hover:font-bold hover:text-orange-500 duration-200"
                >
                    <span class='user_login'></span>
                </div>
            </nav>
        </header>
      `;
    }
  }
  
  customElements.define('navbar-component', Header);
  