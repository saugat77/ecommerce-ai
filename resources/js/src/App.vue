<template>
  <div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
      <a class="navbar-brand" href="#">My App</a>
     

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
        </ul>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container mt-4">
      <router-view />
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center p-3 mt-5">
      © 2026 My App
    </footer>
  </div>
</template>