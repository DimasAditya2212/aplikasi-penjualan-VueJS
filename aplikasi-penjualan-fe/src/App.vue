<template>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <button
        class="navbar-toggler mb-2 mt-1 navbar-light mx-auto"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown"
        aria-expanded="false"
        aria-label="Toggle navigation"
        style="
          background-color: #ffe4e173;
          border: 1px solid #bda8a5;
          box-shadow: 0px 0px 1px #888888;
        "
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center" id="navbarDropdown">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <router-link to="/">Home</router-link>
          </li>
          <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown"> Items </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <router-link to="/items" class="dropdown-item"
                >Item Data</router-link
              >

              <router-link to="/createitem" class="dropdown-item"
                >Create Item</router-link
              >
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <router-view />
</template>

<style>
#app {
  font-family: "Poppins", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  /* text-align: center; */
  color: #2c3e50;
}

.navbar {
  display: flex;
  background-color: rgba(238, 250, 255, 0.705);
  margin-bottom: 0;
  padding: 5px;
}

.dropdown-menu {
  padding: 20px;
}

.navbar a {
  font-weight: bold;
  color: #9db1c4;
  text-decoration: none;
  display: absolute;
  /* background-color: fuchsia; */
  padding: 2px 6px;
  border-radius: 10px;
}
.navbar .container-fluid .collapse {
  justify-content: space-evenly;
  /* padding: 10px; */
}
ul li {
  margin: 10px 20px;
}

.navbar-toggler:hover {
  background-color: #ffe4e1;
}

.dropdown-toggle {
  cursor: pointer;
}
.dropdown-toggle:active {
  background-color: rgb(85, 143, 143);
  border-bottom: 1px solid slategray;
  border-radius: 5px;
  transition: 0.3s;
}

.navbar a.router-link-exact-active {
  color: #ffffff;
  /* background-color: #9db1c4; */
  background-color: rgb(85, 143, 143);
  border-bottom: 1px solid slategray;
  border-radius: 5px;
  transition: 0.3s;
  padding: 4px;
}

.navbar a:hover {
  background-color: rgba(164, 202, 212, 0.123);
}
a {
  transition: 0.15s;
}
</style>
