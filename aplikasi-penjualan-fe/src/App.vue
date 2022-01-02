<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5 text-center">
    <div class="container-fluid">
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link to="/items">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/createitem">Create Item</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <router-view />
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  /* text-align: center; */
  color: #2c3e50;
}

.navbar {
  display: flex;
  /* padding: 30px; */
}

.navbar a {
  font-weight: bold;
  color: #9db1c4;
  text-decoration: none;
  display: flex;
}
.navbar .container-fluid .collapse {
  justify-content: space-evenly;
  /* padding: 10px; */
}
ul li {
  margin: 10px 20px;
}

.navbar a.router-link-exact-active {
  color: #ffffff;
  background-color: #9db1c4;
  border-radius: 7px;
  padding: 4px;
}
a {
  transition: 0.3s;
}
</style>
