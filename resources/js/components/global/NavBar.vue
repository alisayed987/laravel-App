<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarCenteredExample"
        aria-controls="navbarCenteredExample"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div
        class="collapse navbar-collapse justify-content-center"
        id="navbarCenteredExample"
      >
        <!-- Left links -->
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <router-link to="/" exact
              ><a class="nav-link active" aria-current="page" href="#"
                >Home</a
              ></router-link
            >
          </li>
          <li class="nav-item">
            <router-link to="/CreateAddress" exact
              ><a class="nav-link active" aria-current="page" href="#"
                >CreateAddress</a
              ></router-link
            >
          </li>
          <li class="nav-item">
            <router-link to="/UserAddresses" exact
              ><a class="nav-link active" aria-current="page" href="#"
                >UserAddresses</a
              ></router-link
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
        </ul>
      </div>
      <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
  </nav>
</template>

<script>
console.log("nav vue");
export default {};
</script>

<style>
.bg-light {
  background-color: #8fa5c2;
}
</style>