<template>
  <div>
    <h3 class="mb-4">Dashboard</h3>

    <div class="row">
      <div class="col-md-4" v-for="i in 3" :key="i">
        <div class="card shadow-sm mb-3">
          <div class="card-body">
            <h5 class="card-title">Card {{ i }}</h5>
            <p class="card-text">
              Bootstrap card layout for dashboard stats.
            </p>
            <button class="btn btn-primary btn-sm">View</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>